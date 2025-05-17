@extends('layouts.app')

@section('content')
    <h1>Daftar Minuman</h1>
    <a href="{{ route('minuman.create') }}" class="btn btn-primary">Tambah Minuman</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($minumans as $minuman)
                <tr>
                    <td>{{ $minuman->nama }}</td>
                    <td>{{ $minuman->stok }}</td>
                    <td>{{ $minuman->deskripsi }}</td>
                    <td>{{ $minuman->harga }}</td>
                    <td>
                    <td>
                    @if($minuman->foto)
                    <img src="{{ asset('storage/foto_minuman/' . $minuman->foto) }}" width="100">
                    @else
                    tidak memiliki foto
                    @endif
                    </td>
                    <td>
                        <a href="{{ route('minuman.edit', $minuman->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('minuman.destroy', $minuman->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
