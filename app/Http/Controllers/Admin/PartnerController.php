<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Category;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    // ⬇️ BAGIAN INDEX INI SUDAH DI-UPDATE UNTUK FITUR PENCARIAN
    public function index(Request $request)
    {
        $search = $request->input('search');

        $partners = Partner::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('link', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.partners.index', compact('partners', 'search'));
    }

    public function create()
    {
        // Mengambil data kategori untuk dropdown pilihan di form tambah partner
        $categories = Category::all();
        return view('admin.partners.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        Partner::create($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner baru berhasil ditambahkan!');
    }

    public function edit(Partner $partner)
    {
        $categories = Category::all();
        return view('admin.partners.edit', compact('partner', 'categories'));
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Data partner berhasil diperbarui!');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil dihapus!');
    }
}