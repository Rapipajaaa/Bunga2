<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Transaksi</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Nama Bunga</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Tanggal Transaksi</th>
                    <th>Diskon</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->nama_pel }}</td>
                    <td>{{ $transaksi->alamat }}</td>
                    <td>{{ $transaksi->telepon }}</td>
                    <td>{{ $transaksi->nama_bunga }}</td>
                    <td>{{ $transaksi->jumlah }}</td>
                    <td>{{ $transaksi->harga }}</td>
                    <td>{{ $transaksi->tanggal_transaksi }}</td>
                    <td>
                        @if ($transaksi->jumlah >= 10)
                            10%
                        @elseif ($transaksi->jumlah >= 5)
                            5%
                        @else
                            0%
                        @endif
                    </td>
                    <td>{{ $transaksi->total_harga }}</td>
                    <td>
                        <a href="{{ route('transaksi.print', $transaksi->id) }}" class="btn btn-primary btn-sm">Cetak</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-2">Kembali</a>
    </div>
</body>
</html>
