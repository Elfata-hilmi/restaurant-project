@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pegawai</h1>
    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
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
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $pegawai->alamat }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
