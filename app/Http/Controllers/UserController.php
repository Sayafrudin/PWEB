<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|min:3|max:20',
                'email' => 'required|email:rfc,dns',
                'phone' => ['required', 'regex:/^(\+62|62|0)8[1-9][0-9]{7,11}$/'],
            ],
            [
                'nama.required' => 'Nama harus diisi!',
                'nama.min' => 'Minimal 3 karakter',
                'nama.max' => 'Maksimal 20 karakter',
                'email.required' => 'Email harus diisi!',
                'email.email' => 'Email tidak valid',
                'phone.required' => 'Telp harus diisi!',
                'phone.regex' => 'Format telp tidak valid, Minimal 10 digit & Maksimal 14 digit',
            ],
        );

        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $result = $user->save();

        if ($result) {
            return redirect('soal4')->with('alert', 'Data user berhasil ditambahkan');
        } else {
            return redirect('soal4')->with('alert', 'Data user gagal ditambahkan');
        }
    }
}