@include('layout.header')
    <h3>Tambah Penerbit</h3>
    <form action="{{ route('penerbit.update', $penerbit->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nama Penerbit</label>
            <input type="text" name="nama_penerbit" value="{{ $penerbit->nama_penerbit }}" placeholder="Masukkan nama penerbit">
        </div>
        <button type="submit" class="tombol">Update</button>
    </form>

@include('layout.footer')
