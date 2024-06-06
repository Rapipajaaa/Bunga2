<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Bunga Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Content -->
            <div class="col">
                <h1 class="text-center mt-3">Toko Bunga Dashboard</h1>

                <!-- Kotak Saldo -->
                <div class="container mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Saldo</h5>
                            <p class="card-text">Rp 100.000</p>
                        </div>
                    </div>
                </div>

                <!-- Tambahkan input pencarian di atas tabel -->
                <div class="container mt-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari nama bunga..."><br>
                    <a href="{{ route('bunga.index') }}" class="btn btn-secondary">Admin</a>
                    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Transaksi</a> <!-- Link ke halaman transaksi -->
                </div>

                <div class="container mt-3">
                    <div class="table-responsive">
                        <div class="card-body">
                            <p class="card-title">Bunga Tersedia</p>
                        </div>
                        <table id="dataTable" class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Nama Bunga</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bungaTersedia as $item)
                                <tr>
                                    <td>{{ $item->nama_bunga }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>
                                    <a href="{{url('/buy/'.$item->id)}}">Buy</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="container mt-3">
                    <div class="table-responsive">
                        <div class="card-body">
                            <p class="card-title">Bunga Tidak Tersedia</p>
                        </div>
                        <table id="dataTableTidakTersedia" class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Nama Bunga</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bungaTidakTersedia as $item)
                                <tr>
                                    <td>{{ $item->nama_bunga }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>
                                        <a href="{{url('/buy/'.$item->id)}}">Buy</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr, #dataTableTidakTersedia tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>
