<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
        @error('nama')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" value="{{ old('npm') }}" required>
        @error('npm')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <label for="kelas">Kelas:</label>
        <select id="kelas" name="kelas_id" required>
            <option value="" disabled selected>Pilih Kelas</option>
            @foreach($kelas as $k)
                <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>
        @error('kelas_id')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>