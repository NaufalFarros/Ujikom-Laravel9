<?php

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
});

Route::get('/artikel', function () {
    return view('pages.artikel.index');
});

Route::get('/artikel/tambah', function () {
    return view('pages.artikel.create');
})->name('artikel.create');

Route::get('/artikel/edit', function () {
    return view('pages.artikel.edit');
})->name('artikel.edit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


