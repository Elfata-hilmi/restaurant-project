@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Merchandise</h1>
    <a href="{{ route('merchandise.create') }}" class="btn btn-primary mb-3">Tambah Merchandise</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($merchandises as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->stok }}</td>
                <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('merchandise.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('merchandise.destroy', $item->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
