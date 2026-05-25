@extends('layouts.admin')

@section('title', 'Admin - Kelola Kategori')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">Kelola Kategori</h1>
            <p class="text-slate-500 font-medium text-sm mt-1">Daftar kategori aktif untuk pengelompokan Event dan Partners</p>
        </div>
    </div>

    <div class="bg-white border border-slate-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-100 text-slate-500 text-[11px] font-bold uppercase tracking-wider">
                        <th class="px-6 py-4 w-16">ID</th>
                        <th class="px-6 py-4">Nama Kategori</th>
                        <th class="px-6 py-4">Tanggal Dibuat</th>
                        <th class="px-6 py-4 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 text-sm">
                    @forelse($categories as $category)
                        <tr class="hover:bg-slate-50/50 transition duration-150">
                            <td class="px-6 py-4 font-semibold text-slate-400">#{{ $category->id }}</td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-800">{{ $category->name }}</span>
                            </td>
                            <td class="px-6 py-4 text-slate-500 font-medium">
                                {{ $category->created_at ? $category->created_at->format('d M Y') : 'Bawaan Sistem' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-bold">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                    Aktif & Terhubung
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="max-w-sm mx-auto space-y-2">
                                    <p class="text-slate-400 font-bold">Belum ada kategori</p>
                                    <p class="text-slate-400 text-xs font-medium">Silakan tambahkan data melalui seeder database atau database manager.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection