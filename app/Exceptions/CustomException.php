<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;
use Exception;

class CustomException extends Exception
{

    public function report()
    {
        // Melaporkan error (bisa mengirim ke log, layanan eksternal, dll.)
        Log::alert('CustomException telah ter-triggered!');
    }

    public function render($request)
    {
        // Menampilkan tampilan error kustom
        return response()->view('errors.custom', [], 500);
    }


}
