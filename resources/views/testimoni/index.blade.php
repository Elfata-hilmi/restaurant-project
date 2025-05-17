@extends('layouts.app')

@section('title', 'Daftar Testimoni')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Testimoni</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Isi Testimoni</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($testimonis as $testimoni)
                <tr>
                    <td>{{ $testimoni->user->name ?? 'User Tidak Ditemukan' }}</td>
                    <td>{{ $testimoni->isi }}</td>
                    <td>{{ $testimoni->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada testimoni.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @auth
        @if (auth()->user()->role === 'user') {{-- hanya user bisa tambah --}}
            <a href="{{ route('testimoni.create') }}" class="btn btn-primary">Tambah Testimoni</a>
        @endif
    @endauth
</div>
@endsection
