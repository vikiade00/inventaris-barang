<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'qty',
        'satuan'
    ];

    public function peminjaman(){
        return $this->hasOne(Peminjaman::class);
    }
}
