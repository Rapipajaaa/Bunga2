<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Transaksi</h2>
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <form id="transaksiForm" action="{{ route('transaksi.buy', $bunga[0]->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_pel">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pel" name="nama_pel" placeholder="Masukkan Nama Pelanggan" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
            </div>
            <div class="form-group">
                <label for="telepon">No Telp</label>
                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan No Telp" required>
            </div>
            <div class="form-group">
                <label for="nama_bunga">Nama Bunga</label>
                <input type="text" class="form-control" id="nama_bunga" name="nama_bunga" value="{{ $bunga[0]->nama_bunga }}" readonly>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $bunga[0]->harga }}" readonly>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah Beli</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah Beli" required min="1">
            </div>
            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin Datanya sudah Benar?')">Submit</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
