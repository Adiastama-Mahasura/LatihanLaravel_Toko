<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'kode_kategori',
        'kode_produk',
        'nama_produk',
        'harga',
        'stok',
        'deskripsi'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kode_kategori',"id");
    }

    public function DetailPenjualan(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
    return $this->hasMany(DetailPenjualan::class, 'kode_produk', 'id');
    // Sesuaikan 'produk_id' dengan nama foreign key di tabel detail penjualan Anda jika berbeda
    }
}
