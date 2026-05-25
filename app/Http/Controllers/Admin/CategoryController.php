<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category; 
use Illuminate\Http\Request;
use Illuminate\Support\Str; // 🌟 WAJIB DIPANGGIL: Untuk generate slug otomatis

class CategoryController extends Controller
{
    /**
     * Menampilkan halaman daftar kategori + Fitur Pencarian UTS
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $categories = Category::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->latest()->paginate(10);

        return view('admin.categories.index', compact('categories', 'search'));
    }

    /**
     * Form Tambah Kategori
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Simpan Kategori Baru
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        // 🌟 OTOMATIS GENERATE SLUG DARI NAMA KATEGORI
        $data['slug'] = Str::slug($request->name);

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Form Edit Kategori
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update Kategori
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        // 🌟 OTOMATIS UPDATE SLUG JUGA JIKA NAMA DIUBAH
        $data['slug'] = Str::slug($request->name);

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Hapus Kategori
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}