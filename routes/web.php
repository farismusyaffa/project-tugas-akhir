<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\DataIndikatorController;
use App\Http\Controllers\InteraksiPeltoPlController;
use App\Http\Controllers\InteraksiPltoPelController;
use App\Http\Controllers\InteraksiPeltoPelController;


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
    return view('login');
});
Route::post('/masuk', [MasukController::class, 'masuk']);
// Route::get('/masukklien', [MasukController::class, 'viewMasukKlien'])->name('login')->middleware('guest');
// Route::post('/masukklien', [MasukController::class, 'masukKlien']);
Route::post('/keluar', [MasukController::class, 'keluar']);
Route::get('/daftarklien', [DaftarController::class, 'viewDaftarKlien'])->name('login')->middleware('guest');
Route::post('/daftarklien', [DaftarController::class, 'StoreDaftarKlien']);
// Route::get('/masukfasilitator', [MasukController::class, 'viewMasukFasilitator'])->name('login')->middleware('guest');
// Route::post('/masukfasilitator', [MasukController::class, 'masukFasilitator']);
Route::get('/daftarfasilitator', [DaftarController::class, 'viewDaftarFasilitator'])->name('login')->middleware('guest');
Route::post('/daftarfasilitator', [DaftarController::class, 'StoreDaftarFasilitator']);
// Route::group(['middleware'=>'auth:user,fasilitator'], function(){
//     Route::get('/beranda', [PlatformController::class, 'index']);
//     Route::get('/strategi/{id}',[PlatformController::class,'show']);
//     Route::get('/indikator/{id}',[IndikatorController::class,'show']);
//     Route::get('/dataindikator/{id}',[DataIndikatorController::class,'show']);
//     Route::get('/dashboard/{id}',[IndikatorController::class,'showIndikator']);
//     Route::get('/dashboarddataindikator/{id}',[DataIndikatorController::class,'showDashboard']);
// });
// Klien
Route::group(['middleware'=>'auth:user'], function(){
    Route::get('/berandaklien', [PlatformController::class, 'index']);
    Route::get('/strategiklien/{id}',[PlatformController::class,'show']);
    Route::post('/tambahplatform',[PlatformController::class,'store']);
    Route::delete('/hapusplatform/{id}',[PlatformController::class,'destroy']);
    Route::put('/editplatform/{id}',[PlatformController::class,'update']);
    Route::put('/unggahgambar/{id}',[PlatformController::class,'updateGambar']);


    Route::post('/tambahpelanggan/{nama}',[PelangganController::class,'store']);
    Route::delete('/hapuspelanggan/{id}',[PelangganController::class,'destroy']);
    Route::put('/editpelanggan/{id}',[PelangganController::class,'update']);

    Route::post('/tambahinteraksiPltoPel/{nama}',[InteraksiPltoPelController::class,'store']);
    Route::delete('/hapusinteraksiPltoPel/{id}',[InteraksiPltoPelController::class,'destroy']);
    Route::put('/editinteraksiPltoPel/{id}',[InteraksiPltoPelController::class,'update']);

    Route::post('/tambahinteraksiPeltoPl/{nama}',[InteraksiPeltoPlController::class,'store']);
    Route::delete('/hapusinteraksiPeltoPl/{id}',[InteraksiPeltoPlController::class,'destroy']);
    Route::put('/editinteraksiPeltoPl/{id}',[InteraksiPeltoPlController::class,'update']);

    Route::post('/tambahinteraksiPeltoPel/{nama}',[InteraksiPeltoPelController::class,'store']);
    Route::delete('/hapusinteraksiPeltoPel/{id}',[InteraksiPeltoPelController::class,'destroy']);
    Route::put('/editinteraksiPeltoPel/{id}',[InteraksiPeltoPelController::class,'update']);

    Route::get('/indikatorklien/{id}',[IndikatorController::class,'show']);
    Route::post('/tambahindikator',[IndikatorController::class,'store']);
    Route::delete('/hapusindikator/{id}',[IndikatorController::class,'destroy']);
    Route::put('/editindikator/{id}',[IndikatorController::class,'update']);

    Route::get('/dataindikatorklien/{id}',[DataIndikatorController::class,'show']);
    Route::post('/tambahdataindikator',[DataIndikatorController::class,'store']);
    Route::delete('/hapusdataindikator/{id}',[DataIndikatorController::class,'destroy']);
    Route::put('/editdataindikator/{id}',[DataIndikatorController::class,'update']);

    Route::get('/dashboardklien/{id}',[IndikatorController::class,'showIndikator']);
    Route::get('/dashboarddataindikatorklien/{id}',[DataIndikatorController::class,'showDashboard']);

    Route::post('/tambahkomentar/klien',[KomentarController::class,'storeKlien']);
    Route::delete('/hapuskomentar/{id}/klien',[KomentarController::class,'destroyKlien']);
});

// Fasilitator
Route::group(['middleware'=>'auth:fasilitator'], function(){
    Route::get('/berandafasilitator', [PlatformController::class, 'indexFasilitator']);
    Route::get('/strategifasilitator/{id}',[PlatformController::class,'showFasilitator']);
    Route::get('/indikatorfasilitator/{id}',[IndikatorController::class,'showFasilitator']);
    Route::get('/dataindikatorfasilitator/{id}',[DataIndikatorController::class,'showFasilitator']);
    Route::get('/dashboardfasilitator/{id}',[IndikatorController::class,'showIndikatorFasilitator']);
    Route::get('/dashboarddataindikatorfasilitator/{id}',[DataIndikatorController::class,'showDashboardFasilitator']);


    Route::post('/tambahkomentar/fasilitator',[KomentarController::class,'storeFasilitator']);
    Route::delete('/hapuskomentar/{id}/fasilitator',[KomentarController::class,'destroyFasilitator']);
});
//Admin
Route::group(['middleware'=>'auth:admin'], function(){
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/klien', [AdminController::class, 'showKlien']);
    Route::get('/fasilitator', [AdminController::class, 'showFasilitator']);

});