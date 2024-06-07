<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Bunga</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Tambah Bunga</h2>
        
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

        <form action="{{ route('bunga.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF Token -->
            <div class="form-group">
                <label for="flowerName">Nama Bunga</label>
                <input type="text" class="form-control" id="flowerName" name="nama_bunga" placeholder="Masukkan nama bunga" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" name="deskripsi" rows="3" placeholder="Masukkan deskripsi bunga"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control" id="price" name="harga" placeholder="Masukkan harga bunga" required>
            </div>
            <div class="form-group">
                <label for="stock">Stok</label>
                <input type="number" class="form-control" id="stock" name="stok" placeholder="Masukkan jumlah stok" required>
            </div>
            <!-- <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" class="form-control" id="image" name="image">
            </div> -->
            <button type="submit" class="btn btn-primary"  onclick="return confirm('Apakah Yakin Data Sudah Benar?')">Tambah</button>
            <a href="{{ route('bunga.index') }}" class="btn btn-secondary" onclick="return confirm('Apakah Anda yakin ingin kembali?')">Kembali</a>
        </form>
    </div>

    <!-- Bootstrap JS (optional, for Bootstrap functionality like modals or tooltips) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
