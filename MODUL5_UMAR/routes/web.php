<?php
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('landing');
});

Route::get('/landing', function () {
    return view('landing');
})->name('landing');

Route::resource('dosen', DosenController::class);
Route::resource('mahasiswa', MahasiswaController::class);



