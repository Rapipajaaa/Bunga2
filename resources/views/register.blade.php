<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Toko Bunga</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Laravel asset helper untuk CSS -->
    <!-- Font Awesome jika diperlukan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo"> <!-- Lokasi gambar logo disesuaikan -->
        </div>
        <h1>Toko Bunga</h1>
        <form action="{{ route('login') }}" method="post">
    @csrf
    <div>
        <label for="nama_pel">Nama Pelanggan:</label>
        <input type="text" name="nama_pel" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <label for="telepon">Nomor Telepon:</label>
        <input type="text" name="telepon" required>
    </div>
    <div>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required>
    </div>
    <div>
        <input type="submit" value="Login" class="btn btn-primary">
    </div>
</form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script> <!-- Laravel asset helper untuk JavaScript -->
</body>

</html>
