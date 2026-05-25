<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Menampilkan semua data event (READ)
     */
    public function index()
    {
        // Mengambil data event beserta kategorinya, diurutkan dari yang terbaru
        $events = Event::with('category')->latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Menampilkan form untuk tambah event baru (CREATE - Halaman Form)
     */
    public function create()
    {
        // Ambil data kategori untuk pilihan dropdown di form
        $categories = Category::all();
        return view('admin.events.create', compact('categories'));
    }

    /**
     * Menyimpan data event baru ke database (CREATE - Proses Simpan)
     */
    public function store(Request $request)
    {
        // Proses validasi input dari user
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Simpan data ke database
        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail event tertentu (Optional)
     */
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    /**
     * Menampilkan form untuk mengedit event (UPDATE - Halaman Form)
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('admin.events.edit', compact('event', 'categories'));
    }

    /**
     * Menyimpan perubahan data event ke database (UPDATE - Proses Simpan)
     */
    public function update(Request $request, Event $event)
    {
        // Validasi input data edit
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Update data lama dengan data baru
        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Data event berhasil diperbarui!');
    }

    /**
     * Menghapus data event dari database (DELETE)
     */
    public function destroy(Event $event)
    {
        // Hapus data dari database
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus secara permanen!');
    }
}