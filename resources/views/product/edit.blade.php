@extends('layouts.app') <!-- Ganti jika nama layout Anda berbeda -->

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Makanan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Makanan</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="photo">Foto</label>
            <input type="file" name="photo" class="form-control-file">
            @if ($product->photo)
                <div class="mt-2">
                    <img src="{{ asset('image/' . $product->photo) }}" width="120" alt="Foto Makanan">
                </div>
            @endif
        </div>

        <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
