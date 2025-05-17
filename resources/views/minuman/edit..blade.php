@extends('layouts.app')

@section('content')
    <h1>Edit Minuman</h1>

    <form action="{{ route('minuman.update', $minuman->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="form-group">
            <label for="nama">Nama Minuman</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $minuman->nama }}" required>
        </div>

        <!-- Stok -->
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ $minuman->stok }}" required>
        </div>

        <!-- Deskripsi -->
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $minuman->deskripsi }}</textarea>
        </div>

        <!-- Harga -->
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $minuman->harga }}" required>
        </div>

        <!-- Foto -->
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
            <img src="{{ asset('storage/'.$minuman->foto) }}" alt="Foto Minuman" width="100" class="mt-2">
        </div>

        <button type="submit" class="btn btn-primary">Update Minuman</button>
    </form>
@endsection
