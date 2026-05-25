@extends('layouts.admin')

@section('page_title', 'Tambah Event Baru')
@section('page_subtitle', 'Masukkan detail acara baru yang akan diselenggarakan.')

@section('content')
<div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm max-w-3xl">
    <form action="{{ route('admin.events.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase">Judul Event</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full px-5 py-4 bg-slate-50 border-2 rounded-2xl outline-none" required>
        </div>
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase">Kategori</label>
            <select name="category_id" class="w-full px-5 py-4 bg-slate-50 border-2 rounded-2xl outline-none" required>
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full px-5 py-4 bg-slate-50 border-2 rounded-2xl outline-none" required>{{ old('description') }}</textarea>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 uppercase">Tanggal & Waktu Acara</label>
                <input type="datetime-local" name="date" value="{{ old('date') }}" class="w-full px-5 py-4 bg-slate-50 border-2 rounded-2xl outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 uppercase">Lokasi Tempat</label>
                <input type="text" name="location" value="{{ old('location') }}" class="w-full px-5 py-4 bg-slate-50 border-2 rounded-2xl outline-none" required>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 uppercase">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price', 0) }}" class="w-full px-5 py-4 bg-slate-50 border-2 rounded-2xl outline-none" required min="0">
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 uppercase">Kapasitas (Stok)</label>
                <input type="number" name="stock" value="{{ old('stock', 1) }}" class="w-full px-5 py-4 bg-slate-50 border-2 rounded-2xl outline-none" required min="1">
            </div>
        </div>
        <div class="pt-4 flex justify-end gap-4 border-t">
            <a href="{{ route('admin.events.index') }}" class="px-6 py-3 bg-slate-100 text-slate-600 font-bold rounded-2xl hover:bg-slate-200 transition">Batal</a>
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-700 transition">Simpan Data</button>
        </div>
    </form>
</div>
@endsection