@extends('layouts.admin')

@section('title', 'Admin - Tambah Partner Baru')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.partners.index') }}" class="p-2 bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 rounded-xl transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight">Tambah Partner Baru</h1>
            <p class="text-slate-500 text-sm font-medium">Formulir registrasi mitra kerja sama UTS Modul</p>
        </div>
    </div>

    <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
        <form action="{{ route('admin.partners.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Partner / Instansi <span class="text-red-500">*</span></label>
                <input type="text" name="name" required placeholder="Masukkan nama resmi mitra" class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-600 transition @error('name') border-red-500 @enderror">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Kategori Partner <span class="text-red-500">*</span></label>
                <select name="category_id" required class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-600 bg-white transition @error('category_id') border-red-500 @enderror">
                    <option value="">-- Hubungkan Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Tautan URL / Website Partner (Opsional)</label>
                <input type="url" name="link" placeholder="https://example.com" class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-600 transition @error('link') border-red-500 @enderror">
                @error('link') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 flex gap-3 border-t border-slate-100">
                <button type="submit" class="flex-1 py-3.5 bg-indigo-600 text-white rounded-xl font-bold text-sm shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">
                    Simpan Partner
                </button>
                <a href="{{ route('admin.partners.index') }}" class="px-6 py-3.5 bg-slate-100 text-slate-600 font-bold text-sm rounded-xl hover:bg-slate-200 transition text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection