@extends('layouts.app') <!-- Ganti dengan layout utama Anda jika berbeda -->

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Makanan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nama Makanan</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama makanan" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi makanan" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" name="price" class="form-control" placeholder="Masukkan harga makanan" required>
        </div>

        <div class="form-group">
            <label for="photo">Foto</label>
            <input type="file" name="photo" class="form-control-file">
        </div>

        <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
