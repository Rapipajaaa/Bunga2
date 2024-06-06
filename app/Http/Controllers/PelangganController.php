<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $bungaBucket = Transaksi::all();
        return view('Admin', ['bunga' => $bungaBucket]);
    }
}
