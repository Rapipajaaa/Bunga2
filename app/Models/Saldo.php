<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    // Specify the table associated with the model
    protected $table = 'saldos';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'amount',
    ];
}
