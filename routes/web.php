<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\PartnerController; // ⬅️ Memanggil PartnerController baru
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CategoryController;

// =============================================
// USER AREA - Menggunakan HomeController
// =============================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/katalog', [HomeController::class, 'katalog'])->name('katalog');
Route::get('/bantuan', [HomeController::class, 'bantuan'])->name('bantuan');
Route::get('/contact', [HomeController::class, 'kontak'])->name('kontak');

// =============================================
// EVENT FLOW - Menggunakan EventController
// =============================================
Route::get('/event/detail', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

// =============================================
// ADMIN AREA - Menggunakan prefix 'admin'
// =============================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Mengotomatiskan semua fungsi CRUD Event
    Route::resource('events', AdminEventController::class);
    
    // BARIS BARU UTS: Mengotomatiskan semua fungsi CRUD Partner
    Route::resource('partners', PartnerController::class);
    
    // TAMBAHKAN BARIS INI: Mengotomatiskan semua fungsi CRUD Kategori
    Route::resource('categories', CategoryController::class);
    
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
});
    Route::get('/jalankan-migrasi-cloud', function() {
    try {
        // 1. Buat file database baru jika belum ada
        $dbPath = database_path('database.sqlite');
        if (!file_exists($dbPath)) {
            touch($dbPath);
        }

        // 2. Bersihkan total skema database lama di cloud demi keamanan
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--force' => true]);

        // 3. Paksa jalankan SQL mentah untuk menyuntikkan kolom category_id ke tabel partners
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE partners ADD COLUMN category_id INTEGER NULL');

        // 4. Isi ulang data seeder kategori
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);

        return "BOOM! DATABASE SUKSES DIPAKSA UPDATE DAN SIAP PAKAI!";
    } catch (\Exception $e) {
        return "Gagal karena: " . $e->getMessage();
    }
});