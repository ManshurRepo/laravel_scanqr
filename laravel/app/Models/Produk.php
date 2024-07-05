<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi penamaan Laravel
    protected $table = 'produk';

    // Tentukan primary key jika berbeda dari konvensi penamaan Laravel
    protected $primaryKey = 'id_produk';

    // Jika tidak menggunakan timestamps, tambahkan properti berikut
    public $timestamps = false;

    // Tentukan kolom-kolom yang dapat diisi
    protected $fillable = [
        'nama_produk', 'kode_produk', 'jumlah_produk', 'sku', 'sn',
        'lisensi1', 'lisensi2', 'divisi', 'keterangan', 'tanggal_order',
        'tanggal_terima', 'tanggal_expired', 'posisi', 'status'
    ];
}
