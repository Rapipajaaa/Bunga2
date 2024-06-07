<?php

namespace App\Http\Controllers;
use App\Models\Saldo;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function index()
    {
        $saldo = Saldo::first();
        return view('dashboard', compact('saldo'));
    }
}
