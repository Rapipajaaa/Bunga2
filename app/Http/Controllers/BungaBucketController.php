<?php

namespace App\Http\Controllers;
use App\Models\BungaBucket;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Invoice;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BungaBucketController extends Controller
{
    public function index()
    {
        $bungaBucket = BungaBucket::all();
        return view('Admin', ['bunga' => $bungaBucket]);
    }

    public function index1()
    {
        $bungaBucket = BungaBucket::all();
        return view('Dashboard', ['bunga' => $bungaBucket]);
    }

    // Method untuk menampilkan form create
    public function create()
    {
        return view('create'); // Pastikan Anda membuat view ini nanti
    }

    // Method untuk menyimpan data bunga baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_bunga' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        // Simpan data ke database
        BungaBucket::create([
            'nama_bunga' => $request->nama_bunga,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect('/')->with('success', 'Bunga berhasil ditambahkan');
    }

    public function edit($id)
    {
        $bunga = BungaBucket::findOrFail($id);
        return view('update', compact('bunga'));
    }

    public function update(Request $request, $id)
    {
        $bunga = BungaBucket::findOrFail($id);
        $bunga->nama_bunga = $request->nama_bunga;
        $bunga->deskripsi = $request->deskripsi;
        $bunga->harga = $request->harga;
        $bunga->stok = $request->stok;
        $bunga->save();

        return redirect('/')->with('success', 'Bunga berhasil diedit');
    }

    public function destroy($id)
    {
        $bunga = BungaBucket::find($id);

        if ($bunga) {
            $bunga->delete();
            return redirect('/')->with('success', 'Sudah Dihapus');
        }
    }

    public function showTransactionForm($id)
    {
        $bunga = DB::table('bunga_bucket')->select('*')->where('id',$id)->get();
        return view('formTransaksi', compact('bunga'));
    }

    public function processTransaction($id, Request $request)
    {
        $request->validate([
            'nama_pel' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
        ]);

        $bunga = BungaBucket::findOrFail($id);

        if ($bunga->stok > 0) {
            $bunga->stok -= 1;
            $bunga->save();

            $pelanggan = Pelanggan::create([
                'nama_pel' => $request->input('nama_pel'),
                'alamat' => $request->input('alamat'),
                'telepon' => $request->input('telepon'),
            ]);

            $transaksi = Transaksi::create([
                'id_pelanggan' => $pelanggan->id,
                'id_diskon' => null,
                'tanggal_transaksi' => now(),
                'total_harga' => $bunga->harga,
            ]);

            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id,
                'id_bunga' => $bunga->id,
                'jumlah' => 1,
                'harga' => $bunga->harga,
            ]);

            Invoice::create([
                'id_transaksi'=>$transaksi->id,
                'tanggal_invoice'=> now(),
                'total_harga'=> $bunga->harga,
            ]);

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil.');
        } else {
            return redirect()->route('dashboard')->with('error', 'Stok habis.');
        }
    }

    public function indexTransaksi()
    {
        $transaksis = DB::table("transaksi")
        ->join("detail_transaksi", "detail_transaksi.id_transaksi", "transaksi.id")
        ->join("invoice", "invoice.id_transaksi", "transaksi.id")
        ->join("pelanggan", "pelanggan.id", "transaksi.id_pelanggan")
        ->join("bunga_bucket", "bunga_bucket.id", "detail_transaksi.id_bunga")
        ->get();
        //return dd($transaksis);
        return view('HalamanTransaksi', compact('transaksis'));
    }
}
