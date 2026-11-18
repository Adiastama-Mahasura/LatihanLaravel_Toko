@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

<div class="page-header">
    <div>
        <h2>Tambah Produk</h2>
        <p>Masukkan informasi produk baru</p>
    </div>
</div>

<div class="card form-card">

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Kategori</label>

            <select name="kode_kategori">
                <option value="">-- Pilih Kategori --</option>

                @foreach($kategori as $item)
                    <option value="{{ $item->id }}"
                        {{ old('kode_kategori') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>

            @error('kode_kategori')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Kode Produk</label>
            <input type="text"
                   name="kode_produk"
                   value="{{ old('kode_produk') }}"
                   placeholder="Contoh: BRG001">

            @error('kode_produk')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text"
                   name="nama_produk"
                   value="{{ old('nama_produk') }}"
                   placeholder="Nama produk">

            @error('nama_produk')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number"
                   name="harga"
                   value="{{ old('harga') }}"
                   min="0"
                   step="0.01">

            @error('harga')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number"
                   name="stok"
                   value="{{ old('stok', 0) }}"
                   min="0">

            @error('stok')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>

            @error('deskripsi')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-action">
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection