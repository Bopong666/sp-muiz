<?php

use Illuminate\Http\Request;
use App\Http\Livewire\LoginTest;
use App\Http\Livewire\OptComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\GejalaComponent;
use App\Http\Livewire\ProfileComponent;
use App\Http\Livewire\RiwayatComponent;
use App\Http\Livewire\KonsultasiComponent;
use App\Http\Livewire\BasisPengetahuanComponent;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->back();
    }
    return view('auth.login');
})->name('login');


Route::post('/login', function (Request $request) {
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->with(
        'loginError',
        'Username atau Password salah',
    );
});


Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('/', function () {
    return view('halaman');
})->name('utama');
Route::get('/konsultasi', KonsultasiComponent::class)->name('konsultasi');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/opt', OptComponent::class)->name('opt');
    Route::get('/gejala', GejalaComponent::class)->name('gejala');
    Route::get('/basis_pengetahuan', BasisPengetahuanComponent::class)->name('basis_pengetahuan');
    Route::get('/riwayat', RiwayatComponent::class)->name('riwayat');
    Route::get('/profil', ProfileComponent::class)->name('profil');
});
Route::get('/logintest', LoginTest::class)->name('logintest');
Route::get('/berhasil', function(){
    return view('berhasil');
});
