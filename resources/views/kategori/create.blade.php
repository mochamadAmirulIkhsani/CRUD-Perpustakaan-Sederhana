@include('layout.header')
    <h3>Tambah Kategori</h3>
    <form action="{{ route('kategori.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nama Kategori</label>
            <input type="text" name="nama_kategori" placeholder="Masukkan nama kategori">
        </div>
        <button type="submit" class="tombol">Simpan</button>
    </form>

@include('layout.footer')
