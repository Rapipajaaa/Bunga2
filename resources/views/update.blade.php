<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Bunga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Update Data Bunga</h2>
        <form action="{{ route('bunga.update', $bunga->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_bunga">Nama Bunga</label>
                <input type="text" class="form-control" id="nama_bunga" name="nama_bunga" value="{{ $bunga->nama_bunga }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $bunga->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $bunga->harga }}" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ $bunga->stok }}" required>
            </div>
            <button type="submit" class="btn btn-primary"  onclick="return confirm('Apakah Anda yakin Data Yang mau di update sudah benar?')">Update Data</button>
            <a href="{{ route('bunga.index') }}" class="btn btn-secondary" onclick="return confirm('Apakah Anda yakin ingin kembali?')">Back</a>
        </form>
    </div>
</body>
</html>
