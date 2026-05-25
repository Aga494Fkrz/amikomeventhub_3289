@extends('layouts.admin')

@section('title', 'Admin - Edit Kategori')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <h1 class="text-xl font-black text-slate-800">Edit Kategori</h1>
        <p class="text-slate-500 text-sm mt-1">Ubah data informasi kategori pilihan Anda.</p>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Kategori</label>
                <input type="text" name="name" value="{{ $category->name }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-600 transition" required>
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.categories.index') }}" class="px-5 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold text-sm hover:bg-slate-200 transition">Batal</a>
                <button type="submit" class="px-5 py-3 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">Perbarui Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection