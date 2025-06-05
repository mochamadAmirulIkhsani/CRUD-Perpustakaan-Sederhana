@include('layout.header')
    <h3>Tambah Buku</h3>
    <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Judul Buku:</label>
            <input type="text" name="judul" placeholder="Masukkan nama buku">
        </div>
        <div class="form-group">
            <label for="">Pengarang:</label>
            <input type="text" name="pengarang" placeholder="Masukkan nama pengarang">
        </div>
        <div class="form-group">
            <label for="">Tahun Terbit Buku:</label>
            <input type="text" name="tahun_terbit" placeholder="Masukkan tahun terbit">
        </div>
        <div class="form-group">
            <label for="">Penerbit:</label>
            <select name="penerbit_id" id="">
                @foreach ($penerbit as $p)
                <option value="{{ $p->id }}">{{ $p->nama_penerbit }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Kategori:</label>
            <select name="kategori_id">
                @foreach ($kategori as $k)
                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Gambar Sampul:</label>
            <input type="file" name="file_cover" id="">
        </div>
        <button type="submit" class="tombol">Simpan</button>
    </form>

@include('layout.footer')
