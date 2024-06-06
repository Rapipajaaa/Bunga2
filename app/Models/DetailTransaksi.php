<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';

    protected $fillable = [
        'id_transaksi',
        'id_bunga',
        'jumlah',
        'harga',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function bungaBucket()
    {
        return $this->belongsTo(BungaBucket::class, 'id_bunga');
    }
}
