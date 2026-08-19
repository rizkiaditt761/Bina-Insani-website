<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    protected ProfileService $profileService;

    public function __construct(
        ProfileService $profileService
    ) {
        $this->profileService = $profileService;
    }

    /**
     * Profile page
     */
    public function index()
    {
        $user = $this->profileService->getProfile(
            Auth::id()
        );

        return view(
            'admin.profile.index',
            compact('user')
        );
    }

    /**
     * Update profile
     */
    public function update(Request $request)
    {
        $userId = Auth::id();

        /*
        |--------------------------------------------------------------------------
        | UPDATE PASSWORD
        |--------------------------------------------------------------------------
        */

        if ($request->input('form_type') === 'password') {

            $validated = $request->validate([
                'current_password' => [
                    'required',
                    'current_password',
                ],

                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                ],
            ], [
                'current_password.required' =>
                    'Password saat ini wajib diisi.',

                'current_password.current_password' =>
                    'Password saat ini tidak sesuai.',

                'password.required' =>
                    'Password baru wajib diisi.',

                'password.min' =>
                    'Password baru minimal 8 karakter.',

                'password.confirmed' =>
                    'Konfirmasi password baru tidak sesuai.',
            ]);

            $this->profileService->updateProfile(
                $userId,
                [
                    'password' => Hash::make(
                        $validated['password']
                    ),
                ]
            );

            return redirect()
                ->route('admin.profile')
                ->with(
                    'success',
                    'Password berhasil diperbarui.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE PROFILE
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($userId),
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ], [
            'name.required' =>
                'Nama lengkap wajib diisi.',

            'email.required' =>
                'Email wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'email.unique' =>
                'Email tersebut sudah digunakan.',

            'profile_photo.image' =>
                'File yang dipilih harus berupa gambar.',

            'profile_photo.mimes' =>
                'Foto profil harus berformat JPG, JPEG, PNG, atau WEBP.',

            'profile_photo.max' =>
                'Ukuran foto profil maksimal 2 MB.',
        ]);


        $user = $this->profileService->getProfile(
            $userId
        );


        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];


        /*
        |--------------------------------------------------------------------------
        | PROFILE PHOTO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            /*
            | Hapus foto lama
            */

            if (
                $user->profile_photo &&
                Storage::disk('public')->exists(
                    $user->profile_photo
                )
            ) {
                Storage::disk('public')->delete(
                    $user->profile_photo
                );
            }


            /*
            | Simpan foto baru
            */

            $data['profile_photo'] = $request
                ->file('profile_photo')
                ->store('profiles', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | SAVE PROFILE
        |--------------------------------------------------------------------------
        */

        $this->profileService->updateProfile(
            $userId,
            $data
        );


        return redirect()
            ->route('admin.profile')
            ->with(
                'success',
                'Profil berhasil diperbarui.'
            );
    }
}