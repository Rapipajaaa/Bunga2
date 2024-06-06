<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    protected $table = 'diskon';

    protected $fillable = [
        'persentase_diskon',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_diskon');
    }
}
