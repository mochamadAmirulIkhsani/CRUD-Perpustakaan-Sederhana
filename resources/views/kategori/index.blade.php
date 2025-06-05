<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Manajmenen Data Buku</title>
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>
<body>
<div class="container">
    <h1>Manajemen Data Buku</h1>
    <div class="nav">
        <ul>
            <li><a href="/kategori">Kategori</a></li>
            <li><a href="/penerbit">Penerbit</a></li>
            <li><a href="/buku">Buku</a></li>
        </ul>
    </div>
    <h3>Kategori</h3>
    <a href="{{ route('kategori.create') }}" class="tombol">Tambah</a>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allKategori as $key => $row)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $row->nama_kategori }}</td>
                <td>
                    <form action="{{ route('kategori.destroy', $row->id) }}" method="POST">
                        <a href="{{ route('kategori.show', $row->id) }}" class="tombol">Detail</a>
                        <a href="{{ route('kategori.edit', $row->id) }}" class="tombol">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="tombol">Hapus</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    <div class="footer">&copy; 2024 Amirul Ikhsani</div>
</div>
</body>
</html>
