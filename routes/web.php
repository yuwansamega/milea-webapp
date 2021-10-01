<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AdminController;


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
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('beranda');
});
Route::get('/data-profil', function () {
    return view('data-profil');
});
Route::get('/lengkapi-profil', function () {
    return view('lengkapi-profil');
});
Route::get('/daftar-kegiatan', function () {
    return view('daftar-kegiatan');
});
Route::get('/{page}', function ($page) {
    return view($page);
});
Route::get('/detail-kegiatan', function () {
    return view('detail-kegiatan');
});Route::get('/riwayat', function () {
    return view('riwayat');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

//For Booth
Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', [PanelController::class, 'index'])->name('dashboard');
    // Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    
});

//For User
// Route::group(['middleware' => ['auth', 'role:user']], function(){
//     Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    
// });

//For Admin
// Route::group(['middleware' => ['auth', 'role:admin']], function(){
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
// });

require __DIR__.'/auth.php';

