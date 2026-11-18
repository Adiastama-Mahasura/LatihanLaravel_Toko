@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<div class="page-header">
    <div>
        <h2>Tambah Kategori</h2>
        <p>Masukkan data kategori baru</p>
    </div>
</div>

<div class="card form-card">

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

        <div class="form-group">


            <label>Nama Kategori</label>
            <input type="text"
                name="nama_kategori"
                value="{{ old('nama_kategori') }}" placeholder="Contoh: Elektronik">

            @error('nama_kategori')
            <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi"
                rows="4"
                placeholder="Masukkan deskripsi kategori">{{ old('deskripsi') }}</textarea>

            @error('deskripsi')
            <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-action">
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection