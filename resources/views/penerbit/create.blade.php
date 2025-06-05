@include('layout.header')
    <h3>Tambah Penerbit</h3>
    <form action="{{ route('penerbit.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nama Penerbit</label>
            <input type="text" name="nama_penerbit" placeholder="Masukkan nama penerbit">
        </div>
        <button type="submit" class="tombol">Simpan</button>
    </form>

@include('layout.footer')
