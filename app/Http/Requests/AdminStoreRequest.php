<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::guard('admin_users')->check();
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:50',
            'email'    => 'required|string|email|max:50|unique:admin_users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'      => 'Nama wajib diisi.',
            'name.max'           => 'Nama tidak boleh lebih dari 50 karakter.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.max'          => 'Email tidak boleh lebih dari 50 karakter.',
            'email.unique'       => 'Email sudah terdaftar, gunakan email lain.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password harus minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
    }
}
