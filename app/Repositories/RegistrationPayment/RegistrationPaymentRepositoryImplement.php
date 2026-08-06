<?php

namespace App\Repositories\RegistrationPayment;

use App\Models\RegistrationPayment;
use Illuminate\Support\Facades\DB;

class RegistrationPaymentRepositoryImplement implements RegistrationPaymentRepository
{
    public function getAll(array $filters = [])
    {
        return RegistrationPayment::with([
                'registration.courseClass'
            ])
            ->when(
                $filters['search'] ?? null,
                function ($query, $search) {

                    $query->whereHas(
                        'registration',
                        function ($q) use ($search) {

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
                            );

                        }
                    );

                }
            )
            ->when(
                $filters['status'] ?? null,
                function ($query, $status) {

                    $query->where(
                        'status',
                        $status
                    );

                }
            )
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }



    public function findById(int $id)
    {
        return RegistrationPayment::with([
                'registration.courseClass'
            ])
            ->findOrFail($id);
    }



    public function findByRegistrationId(int $registrationId)
    {
        return RegistrationPayment::with([
                'registration.courseClass'
            ])
            ->where(
                'registration_id',
                $registrationId
            )
            ->latest()
            ->first();
    }



    public function create(array $data)
    {
        return RegistrationPayment::create($data);
    }



    public function update(
        int $id,
        array $data
    ) {
        $payment = $this->findById($id);

        $payment->update($data);

        return $payment;
    }



    public function delete(int $id)
    {
        $payment = $this->findById($id);

        return $payment->delete();
    }





    /**
     * Approve Payment
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



            // Cegah approve ulang
            if (
                $payment->status !== 'waiting_verification'
            ) {

                return $payment;

            }



            // Update payment
            $payment->update([

                'status' => 'verified',

                'verified_by' => $verifiedBy,

                'verified_at' => now(),

                

            ]);



            // Update registration
            $payment->registration->update([

                'status' => 'accepted',

            ]);



            return $payment->fresh([

                'registration.courseClass'

            ]);

        });

    }







    /**
     * Reject Payment
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



            // Cegah reject ulang
            if (
                $payment->status !== 'waiting_verification'
            ) {

                return $payment;

            }



            // Update payment
            $payment->update([

                'status' => 'rejected',

                'verified_by' => $verifiedBy,

                'verified_at' => now(),

                'rejection_reason' => $rejectionReason,

            ]);



            // Kembalikan user ke tahap pembayaran
            $payment->registration->update([

                'status' => 'payment_rejected',

            ]);



            return $payment->fresh([

                'registration.courseClass'

            ]);

        });

    }


    public function createOrUpdate(array $data)
    {
        $payment = RegistrationPayment::where(
            'registration_id',
            $data['registration_id']
        )
        ->latest('id')
        ->first();

        if ($payment) {

            // hapus bukti lama
            if (
                $payment->payment_proof &&
                \Storage::disk('public')->exists($payment->payment_proof)
            ) {
                \Storage::disk('public')->delete($payment->payment_proof);
            }

            $payment->update([

                'payment_method' => $data['payment_method'],

                'amount' => $data['amount'],

                'payment_proof' => $data['payment_proof'],

                'status' => 'waiting_verification',

                'verified_by' => null,

                'verified_at' => null,

                'rejection_reason' => null,

            ]);

            return $payment->fresh();

        }

        return RegistrationPayment::create($data);
    }



    public function getPending()
    {
        return RegistrationPayment::with([
                'registration.courseClass'
            ])
            ->where(
                'status',
                'waiting_verification'
            )
            ->latest()
            ->get();
    }





    public function getVerified()
    {
        return RegistrationPayment::with([
                'registration.courseClass'
            ])
            ->where(
                'status',
                'verified'
            )
            ->latest()
            ->get();
    }





    public function getRejected()
    {
        return RegistrationPayment::with([
                'registration.courseClass'
            ])
            ->where(
                'status',
                'rejected'
            )
            ->latest()
            ->get();
    }
}