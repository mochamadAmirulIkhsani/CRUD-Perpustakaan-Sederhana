@include('layout.header')
    <h3>Edit Buku</h3>
    <form action="{{ route('buku.update', $buku->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Judul Buku:</label>
            <input type="text" name="judul" value="{{ $buku->judul }}" placeholder="Masukkan nama buku">
        </div>
        <div class="form-group">
            <label for="">Pengarang:</label>
            <input type="text" name="pengarang" value="{{ $buku->pengarang }}" placeholder="Masukkan nama pengarang">
        </div>
        <div class="form-group">
            <label for="">Tahun Terbit Buku:</label>
            <input type="text" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" placeholder="Masukkan tahun terbit">
        </div>
        <div class="form-group">
            <label for="">Penerbit:</label>
            <select name="penerbit_id" id="">
                @foreach ($penerbit as $p)
                <option value="{{ $p->id }}" {{ ($p->id == $buku->penerbit_id) ? 'selected' : '' }} >{{ $p->nama_penerbit }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Kategori:</label>
            <select name="kategori_id">
                @foreach ($kategori as $k)
                <option value="{{ $k->id }}" {{ ($k->id == $buku->kategori_id) ? 'selected' : '' }} >{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="tombol">Update</button>
    </form>

@include('layout.footer')
