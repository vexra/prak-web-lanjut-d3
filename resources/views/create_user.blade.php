@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg mt-10">
    <h2 class="text-2xl font-bold mb-6 text-center">Tambah User</h2>

    <form action="{{ route('user.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" 
                   class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500"
                   required>
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="npm" class="block text-sm font-medium text-gray-700">NPM:</label>
            <input type="text" id="npm" name="npm" value="{{ old('npm') }}" 
                   class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500"
                   required>
            @error('npm')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700">foto:</label>
            <input type="file" id="foto" name="foto" value="{{ old('foto') }}" 
                   class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500"
                   required>
            @error('foto')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas:</label>
            <select id="kelas" name="kelas_id" required
                    class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm bg-white focus:ring focus:ring-blue-300 focus:border-blue-500">
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" 
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">
            Submit
        </button>
    </form>
</div>
@endsection
