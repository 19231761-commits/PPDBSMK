@extends('backend.layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Kelola Pendaftaran</h2>
        <div class="flex space-x-2 mt-4 md:mt-0">
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-plus mr-2"></i> Tambah Pendaftar
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Pendaftar</p>
                    <p class="text-2xl font-bold text-gray-800">{{ \ ?? 0 }}</p>
                </div>
                <div class="bg-indigo-50 p-3 rounded-lg text-indigo-600">
                    <i class="fas fa-users fa-2x"></i>
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
                    <i class="fas fa-user-plus fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-6">
        <form action="" method="GET" class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4">
            <div class="flex-1 relative">
                <input type="text" name="search" placeholder="Cari nama atau nomor pendaftaran..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            <div class="w-full md:w-48">
                <select name="jurusan" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                    <option value="">Semua Jurusan</option>
                    @foreach(\ ?? [] as \)
                        <option value="{{ \->id }}">{{ \->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-900 transition font-medium">Filter</button>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-gray-700">No. Pendaftaran</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Nama</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Jurusan</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-4 font-semibold text-gray-700 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse(\ ?? [] as \)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 text-gray-600 font-medium font-mono text-sm">{{ \->no_pendaftaran }}</td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-gray-800">{{ \->nama }}</div>
                            <div class="text-xs text-gray-500">{{ \->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ \->jurusan->nama }}</td>
                        <td class="px-6 py-4">
                            @if(\->status == 'Lulus')
                                <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Lulus</span>
                            @elseif(\->status == 'Pending')
                                <span class="px-3 py-1 text-xs font-semibold text-amber-700 bg-amber-100 rounded-full">Pending</span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">{{ \->status }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end space-x-2">
                                <a href="#" class="text-indigo-600 hover:bg-indigo-50 p-2 rounded-lg transition" title="View Detail"><i class="fas fa-eye"></i></a>
                                <a href="#" class="text-blue-600 hover:bg-blue-50 p-2 rounded-lg transition" title="Edit"><i class="fas fa-edit"></i></a>
                                <button class="text-red-600 hover:bg-red-50 p-2 rounded-lg transition" title="Delete"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-folder-open text-gray-300 text-5xl mb-4"></i>
                                <p class="text-gray-500 font-medium">Belum ada data pendaftar.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(\ ?? null)
        <div class="px-6 py-4 border-t border-gray-100">
            {{ \->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
