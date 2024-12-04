<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController3 extends Controller
{
    public function Validasi3(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:20',
            'email' => 'required|email:rfc,dns',
            'pass' => 'required|min:6|max:20',
            'confirm_pass' => 'required|same:pass|min:6|max:20'

        ], [
            'nama.required' => 'Nama harus diisi!',
            'nama.min' => 'Minimal 3 karakter',
            'nama.max' => 'Maksimal 20 karakter',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email tidak valid',
            'pass.required' => 'Password harus diisi!',
            'pass.min' => 'Password harus minimal 6 karakter',
            'confirm_pass.same' => 'Password dan Konfirmasi Password harus sama!',
            'confirm_pass.required' => 'Konfirmasi Password harus diisi!',

        ]);
        
        return $request->all();
        
    }
}