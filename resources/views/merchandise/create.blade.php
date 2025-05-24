@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Merchandise</h1>
    <form action="{{ route('merchandise.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" step="0.01" name="harga" class="form-control" value="{{ old('harga') }}" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('merchandise.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
