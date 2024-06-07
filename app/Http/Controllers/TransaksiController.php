<?php

namespace App\Http\Controllers;
use App\Models\BungaBucket;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDFa;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function cetak()
    {
        $transaksis = DB::table("transaksi")
        ->join("detail_transaksi", "detail_transaksi.id_transaksi", "transaksi.id")
        ->join("invoice", "invoice.id_transaksi", "transaksi.id")
        ->join("pelanggan", "pelanggan.id", "transaksi.id_pelanggan")
        ->join("bunga_bucket", "bunga_bucket.id", "detail_transaksi.id_bunga")
        ->get();
        
        $pdf = PDFa::loadView('print',compact('transaksis'));

        return $pdf->download('print');
    }
}
