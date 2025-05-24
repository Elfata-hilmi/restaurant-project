@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Merchandise</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('merchandise.create') }}" class="btn btn-primary mb-3">Tambah Merchandise</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($merchandises as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->deskripsi ?? '-' }}</td>
                <td>
                    @if($item->image)
                        <img src="{{ asset('images/' . $item->image) }}" width="80">
                    @else
                        <div class="text-muted">Tidak ada gambar</div>
                    @endif
                </td>
                <td>
                    <a href="{{ route('merchandise.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('merchandise.destroy', $item->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada merchandise.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
