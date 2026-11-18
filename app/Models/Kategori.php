<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Tambahkan namespace ini

class Kategori extends Model
{
    //use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    // Tambahkan method relasi ke model Produk di sini
    public function produk(): HasMany
    {
        return $this->hasMany(Produk::class, 'kode_kategori', 'id'); 
        // Sesuaikan 'kode_kategori' jika nama foreign key di tabel produk Anda berbeda
    }
}