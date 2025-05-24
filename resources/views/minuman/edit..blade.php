<!-- resources/views/minuman/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Minuman</h1>

    <form action="{{ route('minuman.update', $minuman->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $minuman->nama }}" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ $minuman->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $minuman->harga }}" required>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
            @if ($minuman->foto)
                <img src="{{ asset('image/' . $minuman->foto) }}" width="100" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
