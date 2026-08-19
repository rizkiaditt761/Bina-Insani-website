<?php

namespace App\Repositories\RegistrationPayment;

use App\Models\RegistrationPayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RegistrationPaymentRepositoryImplement
    implements RegistrationPaymentRepository
{
    /**
     * Base query untuk payment.
     */
    protected function query()
    {
        return RegistrationPayment::query()
            ->with([
                'registration.courseClass',
            ]);
    }


    /**
     * Get payments dengan search, filter, dan pagination.
     */
    public function getAll(array $filters = [])
    {
        return $this->query()

            ->when(
                !empty($filters['search']),
                function ($query) use ($filters) {

                    $search = trim($filters['search']);

                    $query->whereHas(
                        'registration',
                        function ($registrationQuery) use ($search) {

                            $registrationQuery->where(function ($q) use ($search) {

                                $q->where(
                                    'registration_number',
                                    'like',
                                    "%{$search}%"
                                )

                                ->orWhere(
                                    'full_name',
                                    'like',
                                    "%{$search}%"
                                )

                                ->orWhere(
                                    'email',
                                    'like',
                                    "%{$search}%"
                                )

                                ->orWhere(
                                    'phone',
                                    'like',
                                    "%{$search}%"
                                );

                            });

                        }
                    );

                }
            )

            ->when(
                !empty($filters['status']),
                function ($query) use ($filters) {

                    $query->where(
                        'status',
                        $filters['status']
                    );

                }
            )

            ->latest('id')

            ->paginate(10)

            ->withQueryString();
    }


    /**
     * Find payment by ID.
     */
    public function findById(int $id)
    {
        return $this->query()
            ->findOrFail($id);
    }


    /**
     * Find payment berdasarkan registration.
     */
    public function findByRegistrationId(int $registrationId)
    {
        return $this->query()

            ->where(
                'registration_id',
                $registrationId
            )

            ->latest('id')

            ->first();
    }


    /**
     * Create payment.
     */
    public function create(array $data)
    {
        return RegistrationPayment::create($data);
    }


    /**
     * Update payment.
     */
    public function update(
        int $id,
        array $data
    ) {
        $payment = $this->findById($id);

        $payment->update($data);

        return $payment->fresh([
            'registration.courseClass',
        ]);
    }


    /**
     * Delete payment.
     */
    public function delete(int $id)
    {
        return DB::transaction(function () use ($id) {

            $payment = $this->findById($id);

            /*
             * Hapus file bukti pembayaran
             * jika masih tersedia.
             */
            if (
                $payment->payment_proof &&
                Storage::disk('public')->exists(
                    $payment->payment_proof
                )
            ) {
                Storage::disk('public')->delete(
                    $payment->payment_proof
                );
            }


            /*
             * Jika payment sedang menunggu verifikasi,
             * registration dikembalikan ke waiting_payment.
             */
            if (
                $payment->registration &&
                $payment->registration->status === 'waiting_verification'
            ) {
                $payment->registration->update([
                    'status' => 'waiting_payment',
                ]);
            }


            return $payment->delete();

        });
    }


    /**
     * Approve payment.
     */
    public function approve(
        int $id,
        int $verifiedBy
    ) {
        return DB::transaction(function () use (
            $id,
            $verifiedBy
        ) {

            $payment = $this->findById($id);


            /*
             * Jangan proses ulang payment
             * yang sudah bukan waiting verification.
             */
            if (
                $payment->status !== 'waiting_verification'
            ) {
                return $payment;
            }


            /*
             * Update payment.
             */
            $payment->update([
                'status' => 'verified',
                'verified_by' => $verifiedBy,
                'verified_at' => now(),
                'rejection_reason' => null,
            ]);


            /*
             * Update registration menjadi accepted.
             */
            if ($payment->registration) {
                $payment->registration->update([
                    'status' => 'accepted',
                ]);
            }


            return $payment->fresh([
                'registration.courseClass',
            ]);

        });
    }


    /**
     * Reject payment.
     */
    public function reject(
        int $id,
        int $verifiedBy,
        ?string $rejectionReason = null
    ) {
        return DB::transaction(function () use (
            $id,
            $verifiedBy,
            $rejectionReason
        ) {

            $payment = $this->findById($id);


            /*
             * Jangan proses ulang payment
             * yang sudah bukan waiting verification.
             */
            if (
                $payment->status !== 'waiting_verification'
            ) {
                return $payment;
            }


            /*
             * Update payment.
             */
            $payment->update([
                'status' => 'rejected',
                'verified_by' => $verifiedBy,
                'verified_at' => now(),
                'rejection_reason' => $rejectionReason,
            ]);


            /*
             * Registration diberi status khusus
             * agar peserta dapat melakukan pembayaran ulang.
             */
            if ($payment->registration) {
                $payment->registration->update([
                    'status' => 'payment_rejected',
                ]);
            }


            return $payment->fresh([
                'registration.courseClass',
            ]);

        });
    }


    /**
     * Create payment baru atau update payment terakhir
     * milik registration.
     */
    public function createOrUpdate(array $data)
    {
        return DB::transaction(function () use ($data) {

            $payment = RegistrationPayment::query()

                ->where(
                    'registration_id',
                    $data['registration_id']
                )

                ->latest('id')

                ->first();


            /*
             * Jika sudah pernah ada payment,
             * gunakan payment yang sama.
             */
            if ($payment) {

                /*
                 * Hapus bukti pembayaran lama.
                 */
                if (
                    $payment->payment_proof &&
                    Storage::disk('public')->exists(
                        $payment->payment_proof
                    )
                ) {
                    Storage::disk('public')->delete(
                        $payment->payment_proof
                    );
                }


                $payment->update([

                    'payment_method' =>
                        $data['payment_method'],

                    'amount' =>
                        $data['amount'],

                    'payment_proof' =>
                        $data['payment_proof'],

                    'status' =>
                        'waiting_verification',

                    'verified_by' =>
                        null,

                    'verified_at' =>
                        null,

                    'rejection_reason' =>
                        null,

                ]);


                return $payment->fresh([
                    'registration.courseClass',
                ]);
            }


            /*
             * Belum pernah ada payment.
             */
            return RegistrationPayment::create([

                'registration_id' =>
                    $data['registration_id'],

                'payment_method' =>
                    $data['payment_method'],

                'amount' =>
                    $data['amount'],

                'payment_proof' =>
                    $data['payment_proof'],

                'status' =>
                    $data['status'] ?? 'waiting_verification',

                'verified_by' =>
                    $data['verified_by'] ?? null,

                'verified_at' =>
                    $data['verified_at'] ?? null,

                'rejection_reason' =>
                    $data['rejection_reason'] ?? null,

            ]);

        });
    }


    /**
     * Count payment waiting verification.
     */
    public function getPendingCount(): int
    {
        return RegistrationPayment::query()
            ->where(
                'status',
                'waiting_verification'
            )
            ->count();
    }


    /**
     * Count payment verified.
     */
    public function getVerifiedCount(): int
    {
        return RegistrationPayment::query()
            ->where(
                'status',
                'verified'
            )
            ->count();
    }


    /**
     * Count payment rejected.
     */
    public function getRejectedCount(): int
    {
        return RegistrationPayment::query()
            ->where(
                'status',
                'rejected'
            )
            ->count();
    }
}