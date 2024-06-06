<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Bunga</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Form Tambah Bunga</h2>
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('bunga.store') }}" method="POST">
            @csrf <!-- CSRF Token -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><label for="flowerName" class="form-label">Nama Bunga</label></td>
                            <td>
                                <input type="text" class="form-control" id="flowerName" name="nama_bunga" placeholder="Masukkan nama bunga" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="description" class="form-label">Deskripsi</label></td>
                            <td>
                                <textarea class="form-control" id="description" name="deskripsi" rows="3" placeholder="Masukkan deskripsi bunga"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="price" class="form-label">Harga</label></td>
                            <td>
                                <input type="number" class="form-control" id="price" name="harga" placeholder="Masukkan harga bunga" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="stock" class="form-label">Stok</label></td>
                            <td>
                                <input type="number" class="form-control" id="stock" name="stok" placeholder="Masukkan jumlah stok" required>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{ route('bunga.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Bootstrap JS (optional, for Bootstrap functionality like modals or tooltips) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
