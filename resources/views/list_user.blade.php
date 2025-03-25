@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Pengguna</h1>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">No</th>
                <th class="border border-gray-300 px-4 py-2">Nama</th>
                <th class="border border-gray-300 px-4 py-2">NPM</th>
                <th class="border border-gray-300 px-4 py-2">Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
                <tr class="text-center">
                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->nama }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->npm }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->nama_kelas ?? 'Tidak ada kelas' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
