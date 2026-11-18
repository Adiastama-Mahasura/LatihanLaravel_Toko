@extends('layouts.app')

@section('title', 'Data Produk')

@section('content')

<div class="page-header">
    <div>
        <h2>Data Produk</h2>
        <p>Daftar seluruh barang yang dijual</p>
    </div>

    <a href="{{ route('produk.create') }}" class="btn btn-primary">
        + Tambah Produk
    </a>
</div>

<div class="card">

<div class="card">
    {{-- Tambahkan kode alert di sini --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table>
        {{-- ... kode tabel yang sudah ada ... --}}

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($produk as $item)
                <tr>
                    <td>{{ $loop->iteration + ($produk->currentPage() - 1) * $produk->perPage() }}</td>
                    <td>{{ $item->kode_produk }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->stok }}</td>
                    <td class="action">
                        <a href="{{ route('produk.edit', $item->id) }}"
                           class="btn btn-warning">Edit</a>

                        <form action="{{ route('produk.destroy', $item->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        Belum ada data produk.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        @if($produk->previousPageUrl())
            <a href="{{ $produk->previousPageUrl() }}">« Sebelumnya</a>
        @endif

        <span>Halaman {{ $produk->currentPage() }} dari {{ $produk->lastPage() }}</span>

        @if($produk->nextPageUrl())
            <a href="{{ $produk->nextPageUrl() }}">Selanjutnya »</a>
        @endif
    </div>

</div>

@endsection