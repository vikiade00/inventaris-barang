<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'nama_peminjam',
        'nama_barang',
        'jumlah_pinjam',
        'satuan',
        'tgl_pinjam',
        'tgl_kembali',
        'keperluan'
    ];

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
