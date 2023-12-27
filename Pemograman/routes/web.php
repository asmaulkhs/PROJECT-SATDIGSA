<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;

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
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth', 'role:1,2,3,4'])->group(function () {
    Route::get('/unit-dashboard', [DashboardController::class,'index']);
    Route::get('/inbox', [InboxController::class,'index']);
    Route::get('inbox/{surat:id}', [InboxController::class,'show']);
    Route::get('/inbox-diterima', [InboxController::class,'indexyes']);
    Route::get('inbox-diterima/{surat:id}', [InboxController::class,'show']);
    Route::get('/inbox-ditolak', [InboxController::class,'indexno']);
    Route::get('inbox-ditolak/{surat:id}', [InboxController::class,'show']);
    Route::get('/inbox/{surat:id}/acc', [InboxController::class,'update'])->name('inboxacc');
    Route::get('/unit-bantuan',function(){
        return view('unit.bantuan',[
            'title'=> 'Bantuan'
        ]);
    });
});

Route::middleware(['auth', 'role:5'])->group(function () {
    Route::get('/TU-dashboard', [DashboardController::class,'index']);
    Route::get('/arsip', [SuratController::class,'index']);
    Route::get('arsip/{surat:id}', [SuratController::class, 'show']);
    Route::get('arsip/{surat:id}/acc', [SuratController::class, 'acc']);
    Route::get('arsip/{surat:id}/edit', [SuratController::class, 'edit']);
    Route::put('arsip/{surat:id}/update', [SuratController::class, 'update']);
    Route::get('/input', [InputController::class,'index']);
    Route::post('/input', [InputController::class,'store']);
    Route::get('/pengajuan', [SuratController::class,'ajuindex']);
    Route::get('pengajuan/{surat:id}', [SuratController::class,'show']);
    Route::get('/TU-bantuan',function(){
        return view('tatausaha.bantuan',[
            'title'=> 'Bantuan'
        ]);
    });
});

Route::middleware(['auth', 'role:1,2,3,4,5,6'])->group(function () {
    Route::get('/jadwal', [JadwalController::class,'index']);
    Route::get('/report', [ReportController::class,'index']);
    Route::post('/report/export-pdf', [ReportController::class, 'exportPDF']);
});

Route::middleware(['auth', 'role:6'])->group(function () {
    Route::get('/resepsionis-dashboard', [DashboardController::class,'index']);
    Route::get('/resepsionis-bantuan',function(){
        return view('resepsionis.bantuan',[
            'title'=> 'Bantuan'
        ]);
    });
    Route::get('/tamu',[TamuController::class,'index']);
    Route::get('/tamu/{surat:id}',[TamuController::class,'show']);
    Route::get('/tamu/{surat:id}/hadir',[TamuController::class,'hadir']);
});

Route::middleware(['auth','role:7'])->group(function(){
    Route::get('/admin', [AdminController::class,'index']);
    Route::get('/kelola-akun', [AdminController::class,'show']);
    Route::delete('/kelola-akun/{user:id}', [AdminController::class,'deleteUser']);
    Route::get('/kelola-akun/{user:id}',[AdminController::class,'kelola']);
    Route::put('/kelola-akun/{user:id}',[AdminController::class,'edit']);
    Route::get('/tambah-akun',[AdminController::class,'tambah']);
    Route::post('/tambah-akun',[AdminController::class,'store']);
});

// Route::get('/unit-dashboard', function () {
//     return view('unit.dashboard');
// });

// Route::get('/TU-dashboard', function () {
//     return view('tatausaha.dashboard');
// });


// Route::get('/arsip', [SuratController::class,'index'] ); 
// Route::get('arsip/{surat:id}', [SuratController::class, 'show']);
// Route::get('arsip/{surat:id}/acc', [SuratController::class, 'acc']);
// Route::get('arsip/{surat:id}/edit', [SuratController::class, 'edit']);
// Route::put('arsip/{surat:id}/update', [SuratController::class, 'update']);

// Route::get('/inbox', [InboxController::class,'index']);
// Route::get('inbox/{surat:id}', [InboxController::class,'show']);
// Route::get('/inbox/{surat:id}/acc', [InboxController::class,'update']);

// Route::get('/input', [InputController::class,'index']);
// Route::post('/input', [InputController::class,'store']);