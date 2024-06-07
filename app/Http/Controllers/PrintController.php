<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illimunate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDFa;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function generatePDF()
    {
        // $transaksis = DB::table("transaksi")
        // ->join("detail_transaksi", "detail_transaksi.id_transaksi", "transaksi.id")
        // ->join("invoice", "invoice.id_transaksi", "transaksi.id")
        // ->join("pelanggan", "pelanggan.id", "transaksi.id_pelanggan")
        // ->join("bunga_bucket", "bunga_bucket.id", "detail_transaksi.id_bunga")
        // ->get();
        
        // $pdf = PDFa::loadView('')
    }
    public function print($id)
{
    $transaksi = Transaksi::findOrFail($id);

    return view('transaksi.print', compact('transaksi'));
}

}
