<?php

namespace App\Models;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BungaBucket extends Model
{
    protected $table = 'bunga_bucket';

    protected $fillable = [
        'nama_bunga',
        'deskripsi',
        'harga',
        'stok',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
