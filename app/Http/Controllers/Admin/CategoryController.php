<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category; // 🌟 Pastikan memanggil Model Category di atas
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Menampilkan halaman daftar kategori
     */
    public function index()
    {
        // 1. Ambil semua data kategori dari database
        $categories = Category::all();

        // 2. Lempar data ke file view index kategori
        // (Pastikan kamu sudah punya file resources/views/admin/categories/index.blade.php)
        return view('admin.categories.index', compact('categories'));
    }

    // Fungsi lain seperti create, store, edit, update bisa dibiarkan di bawahnya...
}