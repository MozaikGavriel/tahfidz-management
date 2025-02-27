<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\TahfidzController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\ReportCardController;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;

// Route default
Route::get('/', function () {
    return redirect('/login');
});

// Rute autentikasi
Auth::routes();

// Rute dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Rute Santri
Route::resource('santri', SantriController::class)->except(['show']);
Route::get('/santri/{id}', [SantriController::class, 'show'])->name('santri.show');
Route::delete('admin/santri/{santri}', [SantriController::class, 'destroy'])->name('admin.santri.delete');
Route::post('/santri/delete-multiple', [SantriController::class, 'deleteMultiple'])->name('santri.delete-multiple');

// Rute Tahfidz
Route::resource('tahfidz', TahfidzController::class);
Route::put('/tahfidz/{tahfidz}', [TahfidzController::class, 'update'])->name('tahfidz.update');
Route::get('tahfidz/exportPDF', [TahfidzController::class, 'exportPDF'])->name('tahfidz.exportPDF');
Route::get('tahfidz/exportExcel', [TahfidzController::class, 'exportExcel'])->name('tahfidz.exportExcel');
Route::get('/tahfidz', [TahfidzController::class, 'index'])->name('tahfidz.index');
Route::get('/tahfidz/create', [TahfidzController::class, 'create'])->name('tahfidz.create');
Route::post('/tahfidz', [TahfidzController::class, 'store'])->name('tahfidz.store');
Route::get('/tahfidz/{tahfidz}/edit', [TahfidzController::class, 'edit'])->name('tahfidz.edit');
Route::put('/tahfidz/{tahfidz}', [TahfidzController::class, 'update'])->name('tahfidz.update');
Route::delete('/tahfidz/{tahfidz}', [TahfidzController::class, 'destroy'])->name('tahfidz.destroy');

// Rute Whatsapp
Route::resource('whatsapp', WhatsappController::class);
Route::post('/send-whatsapp-notification', [WhatsappController::class, 'sendWhatsappNotification']);
Route::post('/send-tahfidz-notification', [TahfidzController::class, 'sendTahfidzNotification']);
Route::get('/get-tahfidz-data/{santri_id}', [WhatsappController::class, 'getTahfidzData']);

//invoice laporan
Route::resource('report-cards', ReportCardController::class);
Route::get('/report-cards/{id}/generate', [ReportCardController::class, 'generate'])->name('report-cards.generate');
Route::get('/report-cards/{id}/view', [ReportCardController::class, 'view'])->name('report-cards.view');
Route::delete('/report-cards/{id}', [ReportCardController::class, 'destroy'])->name('report-cards.destroy');

// Rute logout
// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect('/login');
// })->name('logout');