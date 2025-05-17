@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Merchandise</h1>
    <form action="{{ route('merchandise.update', $merchandise->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $merchandise->nama }}" required>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ $merchandise->kategori }}" required>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $merchandise->stok }}" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" step="0.01" name="harga" class="form-control" value="{{ $merchandise->harga }}" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ $merchandise->deskripsi }}</textarea>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('merchandise.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
