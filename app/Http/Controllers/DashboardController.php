<?php

namespace App\Http\Controllers;
use App\Models\BungaBucket;
use App\Models\Saldo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     // Ambil semua bunga yang stoknya lebih dari 0
    //     $BungaTersedia = BungaBucket::where('stok', '>', 0)->get();
        
    //     // Ambil semua bunga yang stoknya 0
    //     $bungaTidakTersedia = BungaBucket::where('stok', 0)->get();
        
    //     dd(@bungaTidakTersedia);

    //     return view('dashboard', ['BungaTersedia' => $BungaTersedia, 'bungaTidakTersedia' => $bungaTidakTersedia]);
    // }

    public function index()
    {
        // Ambil semua bunga yang stoknya lebih dari 0
        $bungaTersedia = BungaBucket::where('stok', '>', 0)->get();
        
        // Ambil semua bunga yang stoknya 0
        $bungaTidakTersedia = BungaBucket::where('stok', 0)->get();
        return view('dashboard', compact('bungaTersedia','bungaTidakTersedia'));
    }
}