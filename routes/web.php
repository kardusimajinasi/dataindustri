<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/input', [App\Http\Controllers\InputDataUserController::class, 'input']);

Route::get('/tambahData', [App\Http\Controllers\InputDataAdminController::class, 'index']);
Route::get('/TambahData', [App\Http\Controllers\InputDataUserController::class, 'index']);
Route::get('/tambahdata', [App\Http\Controllers\InputDataSuperAdminController::class, 'index']);

Route::get('/verifikasiperusahaan', [App\Http\Controllers\InputDataAdminController::class, 'verifikasi']);
Route::get('/verifikasiPerusahaan', [App\Http\Controllers\InputDataSuperAdminController::class, 'verifikasi']);

Route::get('/datastatistik', [App\Http\Controllers\InputDataSuperAdminController::class, 'statistik']);
Route::get('/dataStatistik', [App\Http\Controllers\InputDataAdminController::class, 'statistik']);
Route::get('/DataStatistik', [App\Http\Controllers\InputDataUserController::class, 'statistik']);

Route::get('/datastatistik/cari', [App\Http\Controllers\InputDataSuperAdminController::class, 'search']);
Route::get('/dataStatistik/cari', [App\Http\Controllers\InputDataAdminController::class, 'search']);
Route::get('/DataStatistik/cari', [App\Http\Controllers\InputDataUserController::class, 'search']);

Route::post('/TambahData/save', [App\Http\Controllers\InputDataUserController::class, 'save']);
Route::post('/tambahData/save', [App\Http\Controllers\InputDataAdminController::class, 'save']);
Route::post('/tambahdata/save', [App\Http\Controllers\InputDataSuperAdminController::class, 'save']);


Route::post('/UbahData/saveEdit/{id_perusahaan}', [App\Http\Controllers\InputDataUserController::class, 'saveEdit']);
Route::post('/ubahData/saveEdit/{id_perusahaan}', [App\Http\Controllers\InputDataAdminController::class, 'saveEdit']);
Route::post('/ubahdata/saveEdit/{id_perusahaan}', [App\Http\Controllers\InputDataSuperAdminController::class, 'saveEdit']);

Route::get('/DataPerusahaan', [App\Http\Controllers\InputDataUserController::class, 'data'])->name('dataUser');
Route::get('/dataPerusahaan', [App\Http\Controllers\InputDataAdminController::class, 'data'])->name('dataAdmin');
Route::get('/dataPerusahaan/{id_perusahaan}', [App\Http\Controllers\InputDataAdminController::class, 'data'])->name('dataAdmin');
Route::get('/dataperusahaan', [App\Http\Controllers\InputDataSuperAdminController::class, 'data'])->name('dataSuperAdmin');
Route::get('/dataperusahaan/{id_perusahaan}', [App\Http\Controllers\InputDataSuperAdminController::class, 'data'])->name('dataSuperAdmin');


Route::get('/DetailPerusahaan/{id}', [App\Http\Controllers\InputDataUserController::class, 'show'])->name('DetailPerusahaan');
Route::get('/EditPerusahaan/{id_perusahaan}', [App\Http\Controllers\InputDataUserController::class, 'edit'])->name('dataUser');
Route::get('/DeletePerusahaan/{id_perusahaan}', [App\Http\Controllers\InputDataUserController::class, 'destroy'])->name('dataUser');

Route::get('/detailPerusahaan/{id}', [App\Http\Controllers\InputDataAdminController::class, 'show'])->name('detailPerusahaan');
Route::get('/editPerusahaan/{id_perusahaan}', [App\Http\Controllers\InputDataAdminController::class, 'edit'])->name('dataPerusahaan');
Route::get('/deletePerusahaan/{id_perusahaan}', [App\Http\Controllers\InputDataAdminController::class, 'destroy'])->name('dataPerusahaan');
Route::get('/verifikasiperusahaan/{id_perusahaan}', [App\Http\Controllers\InputDataAdminController::class, 'verifikasi'])->name('dataPerusahaan');
Route::get('/cetakdataperusahaan/{id}', [App\Http\Controllers\InputDataAdminController::class, 'cetakData'])->name('detailPerusahaan');

Route::get('/detailperusahaan/{id}', [App\Http\Controllers\InputDataSuperAdminController::class, 'show'])->name('detailperusahaan');
Route::get('/editperusahaan/{id_perusahaan}', [App\Http\Controllers\InputDataSuperAdminController::class, 'edit'])->name('dataperusahaan');
Route::get('/deleteperusahaan/{id_perusahaan}', [App\Http\Controllers\InputDataSuperAdminController::class, 'destroy'])->name('dataperusahaan');
Route::get('/verifikasiPerusahaan/{id_perusahaan}', [App\Http\Controllers\InputDataSuperAdminController::class, 'verifikasi'])->name('dataperusahaan');
Route::get('/CetakDataPerusahaan/{id}', [App\Http\Controllers\InputDataSuperAdminController::class, 'cetakData'])->name('detailperusahaan');

Route::post('/TambahData/kelurahan', [App\Http\Controllers\InputDataUserController::class, 'kelurahan'])->name('getAjaxKelurahan');
Route::post('/tambahData/kelurahan', [App\Http\Controllers\InputDataAdminController::class, 'kelurahan'])->name('getAjaxKelurahan');
Route::post('/tambahdata/kelurahan', [App\Http\Controllers\InputDataSuperAdminController::class, 'kelurahan'])->name('getAjaxKelurahan');

Route::post('/EditPerusahaan/kelurahan', [App\Http\Controllers\InputDataUserController::class, 'kelurahan'])->name('getAjaxKelurahan');
Route::post('/editPerusahaan/kelurahan', [App\Http\Controllers\InputDataAdminController::class, 'kelurahan'])->name('getAjaxKelurahan');
Route::post('/editperusahaan/kelurahan', [App\Http\Controllers\InputDataSuperAdminController::class, 'kelurahan'])->name('getAjaxKelurahan');

Route::get('/statistik', [App\Http\Controllers\StatistikController::class, 'statistik']);
Route::get('/statistik/cari', [App\Http\Controllers\StatistikController::class, 'search']);

//Route::post('/inputUser/kbli', [App\Http\Controllers\InputDataUserController::class, 'kbli'])->name('getAjaxKBLI');
// Route::get('/inputUser/search',f [App\Http\Controllers\InputDataUserController::class, 'search'])->name('selectKBLI');
// Route::get('search', [App\Http\Controllers\InputDataUserController::class, 'index']);
// Route::get('searchkbli', [App\Http\Controllers\InputDataUserController::class, 'selectSearch']);


Auth::routes();

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('adminHome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('superAdmin/home', [App\Http\Controllers\HomeController::class, 'superadminHome'])->name('superadminHome');

Route::resource('users', UserController::class);
