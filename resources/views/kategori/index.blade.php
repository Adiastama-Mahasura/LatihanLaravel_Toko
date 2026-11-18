@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')

<div class="page-header">
    <div>
        <h2>Data Kategori</h2>
        <p>Daftar kategori barang</p>
    </div>

    <a href="{{ route('kategori.create') }}" class="btn btn-primary">
        + Tambah Kategori
    </a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Jumlah Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($kategori as $item)
                <tr>
                    <td>{{ $loop->iteration + ($kategori->currentPage() - 1) * $kategori->perPage() }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>{{ $item->deskripsi ?? '-' }}</td>
                    <td>{{ $item->produk_count }}</td>
                    <td class="action">
                        <a href="{{ route('kategori.edit', $item->id) }}"
                           class="btn btn-warning">Edit</a>

                        <form action="{{ route('kategori.destroy', $item->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
                    <td colspan="5" class="text-center">
                        Belum ada data kategori.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        @if($kategori->previousPageUrl())
            <a href="{{ $kategori->previousPageUrl() }}">« Sebelumnya</a>
        @endif

        <span>Halaman {{ $kategori->currentPage() }} dari {{ $kategori->lastPage() }}</span>

        @if($kategori->nextPageUrl())
            <a href="{{ $kategori->nextPageUrl() }}">Selanjutnya »</a>
        @endif
    </div>
</div>

@endsection