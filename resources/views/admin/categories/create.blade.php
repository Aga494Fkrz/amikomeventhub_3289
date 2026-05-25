@extends('layouts.admin')

@section('title', 'Admin - Tambah Kategori')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <h1 class="text-xl font-black text-slate-800">Tambah Kategori Baru</h1>
        <p class="text-slate-500 text-sm mt-1">Buat kategori baru untuk mengelompokkan event dan partner.</p>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Kategori</label>
                <input type="text" name="name" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-600 transition" placeholder="Masukkan nama kategori..." required>
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.categories.index') }}" class="px-5 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold text-sm hover:bg-slate-200 transition">Batal</a>
                <button type="submit" class="px-5 py-3 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">Simpan Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection