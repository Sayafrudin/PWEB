<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function Validasi(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:20',
            'email' => 'required|email:rfc,dns',
            'pass' => 'required|min:6|max:20',
        ]);
        
        return $request->all();
        
    }
}
