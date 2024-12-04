<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormController2;
use App\Http\Controllers\FormController3;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('intro');
});

Route::get('/soal1', function () {
    return view('accountForm');
});

Route::post('validasi', [FormController::class, 'Validasi']);

Route::get('/soal2', function () {
    return view('accountForm2');
});

Route::post('validasi2', [FormController2::class, 'Validasi2']);

Route::get('/soal3', function () {
    return view('accountForm3');
});

Route::post('validasi3', [FormController3::class, 'Validasi3']);

Route::get('/soal4', function () {
    return view('accountForm4');
});

// Route::middleware(['CheckBerat'])->get('/restricted', function () {
//     return 'Kategori berat badan berhasil diperiksa';
// });

Route::get('/test-error', function () {
    abort(500, 'Something went wrong!');
});


Route::get('/custom-error', function () {
    throw new \App\Exceptions\CustomException('This is a custom exception!');
});

Route::get('/forbidden', function () {
    abort(403, 'You are not authorized to access this page.');
});

Route::get('/form', function () {
    return view('form');
});

Route::post('/submit', function (Illuminate\Http\Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);
    return 'Form submitted successfully!';
});

Route::get('/test-log', function () {
    Log::info('User accessed the page', ['user_id' => 1, 'ip' => request()->ip()]);
    return 'Log message with context has been written to the log file!';
});

Route::get('/slack-log', function () {
    Log::channel('slack')->emergency('A emergency error has occurred!');
    return 'Emergency log sent to Slack!';
});

Route::get('/custom-log', function () {
    Log::channel('custom')->info('Ini Adalah Custom Log');
    return 'Custom log telah dibuat';
});

Route::post('adduser', [UserController::class, 'addUser']);

Route::get('/user/{id}', function ($id) {
    return view('user', ['id' => $id]);
});