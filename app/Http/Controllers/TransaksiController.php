<?php

namespace App\Http\Controllers;
use App\Models\BungaBucket;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('transaksi.index', ['transaksis' => $transaksis]);
    }
}
