@extends('layouts.app') <!-- Sesuaikan jika layout Anda berbeda -->

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Makanan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">+ Tambah Makanan</a>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Makanan</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>
                                @if ($product->photo)
                                    <img src="{{ asset('image/' . $product->photo) }}" width="80" alt="Foto Makanan">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus makanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if ($products->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data makanan</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
