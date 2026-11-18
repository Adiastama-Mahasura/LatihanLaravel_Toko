<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdukController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $produk = Produk::with('kategori')
                    ->latest()
                    ->paginate(10);

        return view('produk.index', compact('produk'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();

        return view('produk.create', compact('kategori'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_kategori' => 'required|exists:kategori,id',
            'kode_produk' => 'required|string|max:30|unique:produk,kode_produk',
            'nama_produk' => 'required|string|max:150',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string'
        ]);

        Produk::create([
            'kode_kategori' => $request->kode_kategori,
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan detail produk
    public function show(Produk $produk)
    {
        $produk->load('kategori', 'detailPenjualan');

        return view('produk.show', compact('produk'));
    }

    // Menampilkan form edit produk
    public function edit(Produk $produk)
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();

        return view('produk.edit', compact('produk', 'kategori'));
    }

    // Memperbarui produk
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'kode_kategori' => 'required|exists:kategori,id',
            'kode_produk' => [
                'required',
                'string',
                'max:30',
                Rule::unique('produk', 'kode_produk')
                    ->ignore($produk->id)
            ],
            'nama_produk' => 'required|string|max:150',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string'
        ]);

        $produk->update([
            'kode_kategori' => $request->kode_kategori,
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk
    public function destroy(Produk $produk)
    {
        // Memeriksa apakah produk sudah digunakan dalam transaksi
        /*
        if ($produk->detailPenjualan()->exists()) {
            return redirect()
                ->route('produk.index')
                ->with('error', 'Produk tidak dapat dihapus karena sudah digunakan dalam transaksi!');
        }
*/
        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}