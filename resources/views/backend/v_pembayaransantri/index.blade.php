@extends('backend.layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Kelola Pembayaran</h2>
        <div class="flex space-x-2 mt-4 md:mt-0">
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-plus mr-2"></i> Konfirmasi Pembayaran
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Pembayaran</p>
                    <p class="text-2xl font-bold text-gray-800">{{ \ ?? 0 }}</p>
                </div>
                <div class="bg-indigo-50 p-3 rounded-lg text-indigo-600">
                    <i class="fas fa-money-bill-wave fa-2x"></i>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Hari Ini</p>
                    <p class="text-2xl font-bold text-gray-800">{{ \ ?? 0 }}</p>
                </div>
                <div class="bg-blue-50 p-3 rounded-lg text-blue-600">
                    <i class="fas fa-calendar-check fa-2x"></i>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Pending</p>
                    <p class="text-2xl font-bold text-gray-800">{{ \ ?? 0 }}</p>
                </div>
                <div class="bg-amber-50 p-3 rounded-lg text-amber-600">
                    <i class="fas fa-clock fa-2x"></i>
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
                        <th class="px-6 py-4 font-semibold text-gray-700">No. Transaksi</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Santri</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Jumlah</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-4 font-semibold text-gray-700 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse(\ ?? [] as \)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 text-gray-600 font-medium font-mono text-sm">{{ \->no_transaksi }}</td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-gray-800">{{ \->santri->nama }}</div>
                            <div class="text-xs text-gray-500">{{ \->created_at->format('d M Y H:i') }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm font-bold text-gray-800">Rp {{ number_format(\->jumlah, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                             @if(\->status == 'Berhasil')
                                <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Berhasil</span>
                            @elseif(\->status == 'Pending')
                                <span class="px-3 py-1 text-xs font-semibold text-amber-700 bg-amber-100 rounded-full">Pending</span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">{{ \->status }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                             <div class="flex justify-end space-x-2">
                                <a href="#" class="text-indigo-600 hover:bg-indigo-50 p-2 rounded-lg transition" title="Print Kwitansi"><i class="fas fa-print"></i></a>
                                <a href="#" class="text-blue-600 hover:bg-blue-50 p-2 rounded-lg transition"><i class="fas fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-receipt text-gray-300 text-5xl mb-4"></i>
                            <p>Belum ada data pembayaran.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
