<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;
use Exception;

class report extends Exception
{

    public function report()
    {
        // Melaporkan error (bisa mengirim ke log, layanan eksternal, dll.)
        Log::error($exception->getMessage());
        parent::report($exception);

    }

    public function render($request)
    {
        // Menampilkan tampilan error kustom
        return response()->view('errors.custom', [], 500);
    }


}
