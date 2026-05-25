<?php

namespace App\Http\Controllers;

use App\Models\Partner; // 🌟 BARIS BARU: Memanggil model Partner agar kueri database bisa berjalan
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (beranda) - Diubah untuk Soal 4 UTS
     */
    public function index()
    {
        // 🌟 BARIS BARU: Mengambil semua data partner beserta kategori pendukungnya dari database
        $partners = Partner::with('category')->latest()->get();

        // 🌟 DIUBAH: Mengirimkan variabel $partners ke dalam file welcome.blade.php
        return view('welcome', compact('partners'));
    }

    /**
     * Menampilkan halaman profil praktikan
     */
    public function profil()
    {
        return view('profil');
    }

    /**
     * Menampilkan halaman katalog event
     */
    public function katalog()
    {
        return view('katalog');
    }

    /**
     * Menampilkan halaman bantuan / FAQ
     */
    public function bantuan()
    {
        return view('bantuan');
    }

    /**
     * Menampilkan halaman kontak
     */
    public function kontak()
    {
        return view('contact');
    }
}