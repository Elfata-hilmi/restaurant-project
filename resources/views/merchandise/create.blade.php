@extends('layouts/app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Detail Produk: {{ $product->name }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($product->image)
                                <img src="{{ asset('images/'.$product->image) }}" class="img-fluid">
                            @else
                                <div class="text-center py-4 bg-light">Tidak ada gambar</div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <th>Nama Produk</th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $product->description ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Stok</th>
                                    <td>{{ $product->stock }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $product->category }}</td>
                                </tr>
                            </table>
                            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                            <a class="btn btn-secondary" href="{{ route('products.index') }}">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
