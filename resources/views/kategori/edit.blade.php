@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')

<div class="page-header">
    <div>
        <h2>Edit Kategori</h2>
        <p>Ubah informasi kategori</p>
    </div>
</div>

<div class="card form-card">

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text"
                   name="nama_kategori"
                   value="{{ old('nama_kategori', $kategori->nama_kategori) }}">

            @error('nama_kategori')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="4">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>

            @error('deskripsi')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-action">
            <button type="submit" class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection