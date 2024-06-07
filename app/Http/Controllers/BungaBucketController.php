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
        //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Prepare data
    $input = $request->all();

    // Handle image upload
    if ($image = $request->file('image')) {
        $path = $request->file('image')->store('storage', 'public');
        $input['image'] = $path;
    }

    // Simpan data ke database
    BungaBucket::create($input);

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
    // Validasi data
    $request->validate([
        'nama_bunga' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
        //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $bunga = BungaBucket::findOrFail($id);

    // Prepare data
    $input = $request->all();

    // Handle image upload
    if ($image = $request->file('image')) {
        $path = $request->file('image')->store('storage', 'public');
        $input['image'] = $path;
    } else {
        $input['image'] = $bunga->image; // Retain the old image if no new image is uploaded
    }

    // Update data in the database
    $bunga->update($input);

    // Redirect ke halaman dashboard dengan pesan sukses
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
            'jumlah' => 'required|integer|min:1',
        ]);

        $bunga = BungaBucket::findOrFail($id);
        $jumlahBeli = $request->input('jumlah');

        if ($bunga->stok >= $jumlahBeli) {
            $bunga->stok -= $jumlahBeli;
            $bunga->save();

            $pelanggan = Pelanggan::create([
                'nama_pel' => $request->input('nama_pel'),
                'alamat' => $request->input('alamat'),
                'telepon' => $request->input('telepon'),
            ]);

            $totalHarga = $bunga->harga * $jumlahBeli;

            $transaksi = Transaksi::create([
                'id_pelanggan' => $pelanggan->id,
                'id_diskon' => null,
                'tanggal_transaksi' => now(),
                'total_harga' => $totalHarga,
            ]);

            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id,
                'id_bunga' => $bunga->id,
                'jumlah' => $jumlahBeli,
                'harga' => $totalHarga,
            ]);

            Invoice::create([
                'id_transaksi' => $transaksi->id,
                'tanggal_invoice' => now(),
                'total_harga' => $totalHarga,
            ]);

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil.');
        } else {
            return redirect()->route('dashboard')->with('error', 'Stok tidak mencukupi.');
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
