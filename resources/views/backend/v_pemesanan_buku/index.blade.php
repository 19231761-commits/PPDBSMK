@extends('backend.layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Kelola Pemesanan Buku</h2>
        <div class="flex space-x-2 mt-4 md:mt-0">
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-plus mr-2"></i> Tambah Pesanan
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Pesanan Buku</p>
                    <p class="text-2xl font-bold text-gray-800">{{ \ ?? 0 }}</p>
                </div>
                <div class="bg-indigo-50 p-3 rounded-lg text-indigo-600">
                    <i class="fas fa-book fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-gray-700">No. Pesanan</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Santri</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Paket Buku</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-4 font-semibold text-gray-700 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse(\ ?? [] as \)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 text-gray-600 font-medium font-mono text-sm">#{{ \->id }}</td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-gray-800">{{ \->santri->nama }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ \->paket_buku }}</td>
                        <td class="px-6 py-4">
                             @if(\->status == 'Sudah Diambil')
                                <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Sudah Diambil</span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold text-amber-700 bg-amber-100 rounded-full">Belum Diambil</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                             <div class="flex justify-end space-x-2">
                                <a href="#" class="text-blue-600 hover:bg-blue-50 p-2 rounded-lg transition"><i class="fas fa-edit"></i></a>
                                <button class="text-red-600 hover:bg-red-50 p-2 rounded-lg transition"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-book-open text-gray-300 text-5xl mb-4"></i>
                            <p>Belum ada pesanan buku.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
