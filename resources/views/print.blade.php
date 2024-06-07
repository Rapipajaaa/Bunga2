<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Transaksi</title>
    <style>
        /* Gaya CSS khusus untuk pencetakan PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .no-print {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Transaksi Detail</h2>
        @foreach ($transaksis as $transaksi )
        <table class="table table-bordered">
            <tr>
                <th>ID Transaksi</th>
                <td>{{ $transaksi->id_transaksi }}</td>
            </tr>
            <tr>
                <th>Nama Pelanggan</th>
                <td>{{ $transaksi->nama_pel }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $transaksi->alamat }}</td>
            </tr>
            <tr>
                <th>No Telp</th>
                <td>{{ $transaksi->telepon }}</td>
            </tr>
            <tr>
                <th>Nama Bunga</th>
                <td>{{ $transaksi->nama_bunga }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{{ $transaksi->jumlah }}</td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>{{ $transaksi->harga }}</td>
            </tr>
            <tr>
                <th>Tanggal Transaksi</th>
                <td>{{ $transaksi->tanggal_transaksi }}</td>
            </tr>
        </table>
        @endforeach
    </div>
</body>
</html>
