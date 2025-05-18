@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Daftar Pengguna</h1>
        <a href="{{ route('user.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow transition duration-200">
            + Tambah Pengguna Baru
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left bg-white shadow rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <th class="px-6 py-4 border-b">No</th>
                    <th class="px-6 py-4 border-b">Nama</th>
                    <th class="px-6 py-4 border-b">NPM</th>
                    <th class="px-6 py-4 border-b">Kelas</th>
                    <th class="px-6 py-4 border-b">Foto</th>
                    <th class="px-6 py-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr class="hover:bg-gray-50 text-center border-b">
                        <td class="px-6 py-4">{{ $user->id }}</td>
                        <td class="px-6 py-4">{{ $user->nama }}</td>
                        <td class="px-6 py-4">{{ $user->npm }}</td>
                        <td class="px-6 py-4">{{ $user->nama_kelas ?? 'Tidak ada kelas' }}</td>
                        <td class="px-6 py-4">
                            @if ($user->foto)
                                <img src="{{ asset($user->foto) }}" alt="Foto {{ $user->nama }}" class="w-12 h-12 object-cover rounded-full mx-auto">
                            @else
                                <span class="text-gray-400 italic">Tidak ada foto</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('users.show', $user->id) }}" 
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm shadow transition duration-200">
                                Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-8">Belum ada pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
