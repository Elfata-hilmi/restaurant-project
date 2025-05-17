@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pegawai</h1>
    <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Divisi</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawais as $pegawai)
                <tr>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->divisi }}</td>
                    <td>{{ $pegawai->alamat }}</td>
                    <td>
                        <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
