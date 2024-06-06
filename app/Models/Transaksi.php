<?php

namespace App\Models;
use App\Models\Pelanggan;
use App\Models\Diskon;
use App\Models\DetailTransaksi;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'id_pelanggan',
        'id_diskon',
        'tanggal_transaksi',
        'total_harga',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function diskon()
    {
        return $this->belongsTo(Diskon::class, 'id_diskon');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'id_transaksi');
    }

    public function bunga()
    {
        return $this->belongsTo(BungaBucket::class, 'bunga_id');
    }
}
