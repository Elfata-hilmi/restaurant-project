<!-- resources/views/minuman/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Minuman</h1>
    <a href="{{ route('minuman.create') }}" class="btn btn-primary">+ Tambah Minuman</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($minumans as $minuman)
                <tr>
                    <td>{{ $minuman->nama }}</td>
                    <td>{{ $minuman->deskripsi }}</td>
                    <td>{{ $minuman->harga }}</td>
                    <td>
                        @if ($minuman->foto)
                            <img src="{{ asset('image/' . $minuman->foto) }}" width="100">
                        @else
                            Tidak ada foto
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('minuman.edit', $minuman->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('minuman.destroy', $minuman->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
