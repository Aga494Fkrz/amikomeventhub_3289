@extends('layouts.admin')

@section('page_title', 'Kelola Event')
@section('page_subtitle', 'Semua daftar acara yang tersedia dalam sistem.')

@section('content')
<div class="mb-6 flex justify-end">
    <a href="{{ route('admin.events.create') }}" class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-700 transition">
        + Tambah Event Baru
    </a>
</div>

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-400 uppercase text-xs font-bold tracking-wider border-b">
                    <th class="px-8 py-4">No</th>
                    <th class="px-8 py-4">Judul Event</th>
                    <th class="px-8 py-4">Harga & Stok</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($events as $index => $event)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-6 font-bold text-slate-400">{{ $events->firstItem() + $index }}</td>
                    <td class="px-8 py-6">
                        <p class="font-black text-slate-800">{{ $event->title }}</p>
                        <p class="text-xs text-slate-400">{{ $event->category->name ?? '-' }} • {{ $event->date }}</p>
                    </td>
                    <td class="px-8 py-6">
                        <p class="font-bold text-indigo-600">Rp {{ number_format($event->price, 0, ',', '.') }}</p>
                        <p class="text-xs text-slate-400">Stok: {{ $event->stock }}</p>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="px-3 py-2 bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-500 hover:text-white transition font-bold text-sm">
                                Edit
                            </a>
                            
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus acara ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition font-bold text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-8 py-10 text-center text-slate-500">Belum ada acara yang ditambahkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-8 py-6 bg-slate-50/50 border-t">
        {{ $events->links() }}
    </div>
</div>
@endsection