@extends('layouts.app')

@section('title', 'Tambah Testimoni')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Testimoni</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('testimoni.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="isi" class="form-label">Isi Testimoni</label>
            <textarea name="isi" id="isi" rows="5" class="form-control" required
