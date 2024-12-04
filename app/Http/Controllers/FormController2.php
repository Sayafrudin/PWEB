<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController2 extends Controller
{
    public function Validasi2(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|min:3|max:20',
                'email' => 'required|email:rfc,dns',
                'pass' => 'required|min:6|max:20',
            ],
            [
                'nama.required' => 'Nama harus diisi!',
                'nama.min' => 'Minimal 3 karakter',
                'nama.max' => 'Maksimal 20 karakter',
                'email.required' => 'Email harus diisi!',
                'email.email' => 'Email tidak valid',
                'pass.required' => 'Password harus diisi!',
                'pass.min' => 'Password harus minimal 6 karakter',
            ],
        );

        return $request->all();
    }
}
