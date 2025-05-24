<form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}" required>
    </div>
    <div class="mb-3">
        <label>Divisi</label>
        <input type="text" name="divisi" class="form-control" value="{{ $pegawai->divisi }}" required>
    </div>
    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        @if($pegawai->foto)
            <img src="{{ asset('image/' . $pegawai->foto) }}" alt="Foto Pegawai" width="150" class="mt-2">
        @endif
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
</form>
