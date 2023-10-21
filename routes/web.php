<?php

use App\Http\Controllers\AutocompleteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\eventdesacontroller;
use App\Http\Controllers\informasidesacontroller;
use App\Http\Controllers\wisatadesacontroller;
use App\Http\Controllers\kulinerdesacontroller;
use App\Http\Controllers\pakettripcontroller;
use App\Http\Controllers\beritadesacontroller;
use App\Http\Controllers\detailcontroller;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\usercontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route untuk masuk ke Home User
Route::get('/', [homecontroller::class, 'index'])->name('home');


//Route Login, Register, dan Lupa Passowrd
Route::get('/login', function () {return view('Login/login');})->name('login');
Route::post('/postlogin',[LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/register', function () {return view('Login/register');})->name('register');
Route::post('/postregister',[RegisterController::class, 'postregister'])->name('postregister');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::get('/forgot', function () {return view('Login/forgot');})->name('forgot');
Route::get('/recover', function () {return view('Login/recover');})->name('recover');

//halaman User
Route::get('/userberitadesa', [usercontroller::class, 'beritadesa'])->name('userberitadesa');
Route::get('/userinformasidesa', [usercontroller::class, 'informasidesa'])->name('userinformasidesa');
Route::get('/userwisata', [usercontroller::class, 'wisata'])->name('userwisata');
Route::get('/userkulinerdesa', [usercontroller::class, 'kulinerdesa'])->name('userkulinerdesa');
Route::get('/usereventdesa', [usercontroller::class, 'eventdesa'])->name('usereventdesa');
Route::get('/trip', [usercontroller::class, 'tripdesa'])->name('trip');

//Pemesanan
Route::post('/pemesanan_post',[usercontroller::class, 'pesanan'])->name('pemesanan_post');

//Detail --Fitur User--
Route::get('/detailpesanan', [detailcontroller::class, 'detailpesanan'])->name('detailpesanan');
Route::get('/detailberita/{id}',[detailcontroller::class, 'detailberita'])->name('detailberita');
Route::get('/detailevent/{id}',[detailcontroller::class, 'detailevent'])->name('detailevent');
Route::get('/detailwisata/{id}',[detailcontroller::class, 'detailwisata'])->name('detailwisata');
Route::get('/detailkuliner/{id}',[detailcontroller::class, 'detailkuliner'])->name('detailkuliner');
Route::get('/detailtrip/{id}',[detailcontroller::class, 'detailtrip'])->name('detailtrip');

//Route untuk membatasi user tidak bisa masuk kedalam halaman Dashboard admin
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function(){
    Route::get('/admin', function () {return view('HomeAdmin');})->name('admin');
    //Dashboard Admin
    Route::get('/dashboard',[informasidesacontroller::class, 'index'])->name('dashboard');
    //Event desa
    Route::get('/eventdesa',[eventdesacontroller::class, 'index'])->name('eventdesa');
    Route::get('/eventdesa_insert',[eventdesacontroller::class, 'create'])->name('eventdesa_insert');
    Route::post('/eventdesa_post',[eventdesacontroller::class, 'store'])->name('eventdesa_post');
    Route::get('/eventdesa_edit/{id}',[eventdesacontroller::class, 'edit'])->name('eventdesa_edit');
    Route::post('/eventdesa_post_edit/{id}',[eventdesacontroller::class, 'update'])->name('eventdesa_post_edit');
    Route::get('/eventdesa_delete/{id}',[eventdesacontroller::class, 'destroy'])->name('eventdesa_delete');
    //Berita desa
    Route::get('/beritadesa',[beritadesacontroller::class, 'index'])->name('beritadesa');
    Route::get('/beritadesa_insert',[beritadesacontroller::class, 'create'])->name('beritadesa_insert');
    Route::post('/beritadesa_post',[beritadesacontroller::class, 'store'])->name('beritadesa_post');
    Route::get('/beritadesa_edit/{id}',[beritadesacontroller::class, 'edit'])->name('beritadesa_edit');
    Route::post('/beritadesa_post_edit/{id}',[beritadesacontroller::class, 'update'])->name('beritadesa_post_edit');
    Route::get('/beritadesa_delete/{id}',[beritadesacontroller::class, 'destroy'])->name('beritadesa_delete');
    //Informasi desa 
    Route::get('/informasidesa',[informasidesacontroller::class, 'index'])->name('informasidesa');
    Route::get('/informasidesa_edit/{id}',[informasidesacontroller::class, 'edit'])->name('informasidesa_edit');
    Route::post('/informasidesa_post_edit/{id}',[informasidesacontroller::class, 'update'])->name('informasidesa_post_edit');
    //wisata desa
    Route::get('/wisatadesa',[wisatadesacontroller::class, 'index'])->name('wisatadesa');
    Route::get('/wisatadesa_insert',[wisatadesacontroller::class, 'create'])->name('wisatadesa_insert');
    Route::post('/wisatadesa_post',[wisatadesacontroller::class, 'store'])->name('wisatadesa_post');
    Route::get('/wisatadesa_edit/{id}',[wisatadesacontroller::class, 'edit'])->name('wisatadesa_edit');
    Route::post('/wisatadesa_post_edit/{id}',[wisatadesacontroller::class, 'update'])->name('wisatadesa_post_edit');
    Route::get('/wisatadesa_delete/{id}',[wisatadesacontroller::class, 'destroy'])->name('wisatadesa_delete');
    //Kuliner Desa
    Route::get('/kulinerdesa',[kulinerdesacontroller::class, 'index'])->name('kulinerdesa');
    Route::get('/kulinerdesa_insert',[kulinerdesacontroller::class, 'create'])->name('kulinerdesa_insert');
    Route::post('/kulinerdesa_post',[kulinerdesacontroller::class, 'store'])->name('kulinerdesa_post');
    Route::get('/kulinerdesa_edit/{id}',[kulinerdesacontroller::class, 'edit'])->name('kulinerdesa_edit');
    Route::post('/kulinerdesa_post_edit/{id}',[kulinerdesacontroller::class, 'update'])->name('kulinerdesa_post_edit');
    Route::get('/kulinerdesa_delete/{id}',[kulinerdesacontroller::class, 'destroy'])->name('kulinerdesa_delete');
    //Trip
    Route::get('/pakettrip',[pakettripcontroller::class, 'index'])->name('tripdesa');
    Route::get('/pakettrip_insert',[pakettripcontroller::class, 'create'])->name('pakettrip_insert');
    Route::post('/pakettrip_post',[pakettripcontroller::class, 'store'])->name('pakettrip_post');
    Route::get('/pakettrip_edit/{id}',[pakettripcontroller::class, 'edit'])->name('pakettrip_edit');
    Route::post('/pakettrip_post_edit/{id}',[pakettripcontroller::class, 'update'])->name('pakettrip_post_edit');
    Route::get('/pakettrip_delete/{id}',[pakettripcontroller::class, 'destroy'])->name('pakettrip_delete');
    //Pesanan
    Route::get('/pesanan',[detailcontroller::class, 'pemesanan'])->name('pesanan');});
