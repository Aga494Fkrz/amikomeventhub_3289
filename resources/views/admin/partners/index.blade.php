@extends('layouts.admin')

@section('title', 'Admin - Kelola Partner UTS')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <div>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight">Manajemen Partner & Sponsor</h1>
            <p class="text-slate-500 text-sm font-medium mt-1">Kelola data mitra kerja sama pendukung AmikomEventHub</p>
        </div>
        <a href="{{ route('admin.partners.create') }}" class="px-5 py-3 bg-indigo-600 text-white rounded-xl font-bold text-sm shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Partner Baru
        </a>
    </div>

    <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm">
        <form action="{{ route('admin.partners.index') }}" method="GET" class="flex gap-3">
            <div class="flex-1 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama partner di sini..." class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-600 transition">
                <div class="absolute left-3.5 top-3.5 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
            <button type="submit" class="px-6 py-3 bg-slate-800 text-white font-bold text-sm rounded-xl hover:bg-slate-900 transition">
                Cari Data
            </button>
            @if(request('search'))
                <a href="{{ route('admin.partners.index') }}" class="px-4 py-3 bg-slate-100 text-slate-600 font-bold text-sm rounded-xl hover:bg-slate-200 transition flex items-center">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-slate-400 text-xs font-bold uppercase tracking-wider">
                        <th class="px-6 py-4">Nama Partner</th>
                        <th class="px-6 py-4">Kategori Modul</th>
                        <th class="px-6 py-4">Link Website</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
                    @forelse($partners as $partner)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-4 font-bold text-slate-900">{{ $partner->name }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 bg-indigo-50 text-indigo-700 text-xs font-bold rounded-md">
                                    {{ $partner->category->name ?? 'Umum / Tanpa Kategori' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500">
                                @if($partner->link)
                                    <a href="{{ $partner->link }}" target="_blank" class="text-blue-600 hover:underline flex items-center gap-1">
                                        {{ Str::limit($partner->link, 30) }} ↗
                                    </a>
                                @else
                                    <span class="text-slate-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.partners.edit', $partner->id) }}" class="p-2 text-slate-400 hover:text-indigo-600 rounded-lg hover:bg-slate-100 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus partner ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-red-600 rounded-lg hover:bg-slate-100 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-400 font-medium">
                                Tidak ada data partner ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($partners->hasPages())
            <div class="p-6 border-t border-slate-100 bg-slate-50/50">
                {{ $partners->links() }}
            </div>
        @endif
    </div>
</div>
@endsection