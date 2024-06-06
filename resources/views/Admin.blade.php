<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Bunga Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px; /* Sidebar default position */
            width: 250px;
            height: 100%;
            background-color: #f8f9fa;
            transition: left 0.3s ease;
        }
        .sidebar.show {
            left: 0; /* Show sidebar position */
        }
        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #ccc;
        }
        .sidebar-body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Content -->
            <div class="col">
                <h1 class="text-center mt-3">Toko Bunga Admin</h1>

                <!-- Tambahkan input pencarian di atas tabel -->
                <div class="container mt-3">
                    <div class="d-flex justify-content-between">
                        <input type="text" id="searchInput" class="form-control" placeholder="Cari nama bunga...">
                        <a href="{{ route('bunga.create') }}" class="btn btn-success mt-2 mx-2">Create</a>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-2">Dashboard</a>
                    </div>
                </div>
                
                <div class="container mt-3">
                    <div class="table-responsive">
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
                                @foreach($bunga as $item)
                                <tr>
                                    <td class="flower-name">{{ $item->nama_bunga }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>
                                        <a href="{{ route('bunga.edit', $item->id) }}" class="btn btn-warning">Update</a>
                                        <form action="{{ route('bunga.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus bunga ini?')">Delete</button>
                                        </form>
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
    </div>

    <script>
        $(document).ready(function(){
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).find('.flower-name').text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>
