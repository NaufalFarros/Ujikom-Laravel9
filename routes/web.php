<?php

use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    // auth jika masih login
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth.login');
});

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');

Route::get('/artikel/tambah', [ArtikelController::class, 'create'])->name('artikel.create');
Route::post('/artikel/tambah', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel/edit/{id}',[ArtikelController::class, 'edit'])->name('artikel.edit');
Route::post('/artikel/edit/{id}',[ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/artikel/delete/{id}',[ArtikelController::class, 'destroy'])->name('artikel.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


