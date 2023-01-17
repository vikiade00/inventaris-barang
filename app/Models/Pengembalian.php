<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalian';
    protected $fillable = [
        'nama_peminjam',
        'nama_barang',
        'jumlah_pinjam',
        'satuan',
        'tgl_pinjam',
        'tgl_kembali',
        'keperluan'
    ];

    public function peminjaman(){
        return $this->hasOne(peminjaman::class);
    }

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
