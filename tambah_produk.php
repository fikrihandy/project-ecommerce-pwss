<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login_admin.php");
}
?>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fikri eCommerce - Tambah Produk</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <h3>Admin Dashboard</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_dashboard.php">Produk Saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="tambah_produk.php">Tambah Baru</a>
                </li>
            </ul>
            <span class="navbar-text">
                    <?php echo 'Login sebagai ' . $_SESSION['nama']; ?>
                    <a class="btn btn-sm btn-outline-secondary" href="logout.php" role="button">Logout</a>
                </span>
        </div>
    </div>
</nav>
<br><br>
<div class="container" style="width: 60%;">
    <h3>Tambah Produk</h3>
    <br>
    <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating">
                    <input name="produk" type="text" class="form-control" id="floatingInputGrid"
                           placeholder="Isikan nama produk" required minlength="1" maxlength="50">
                    <label for="floatingInputGrid">Nama Produk</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <select name="kategori" class="form-select" id="floatingSelectGrid">
                        <option selected>Laptop</option>
                        <option value="Smartphone">Smartphone</option>
                        <option value="Aksesoris">Aksesoris</option>
                    </select>
                    <label for="floatingSelectGrid">Kategori</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Rp.</span>
                <div class="form-floating">
                    <input name="harga" type="text" class="form-control" id="floatingInputGroup1"
                           placeholder="Harga" required minlength="1">
                    <label for="floatingInputGroup1">Harga</label>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Stock</span>
            <input name="stock" type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="form-floating">
                <textarea name="deskripsi" class="form-control" placeholder="Ditampilkan pada detail produk"
                          id="floatingTextarea2" style="height: 100px" required maxlength="500"></textarea>
            <label for="floatingTextarea2">Deskripsi Singkat</label>
        </div>
        <br>
        <p>Upload Gambar Produk</p>
        <div class="input-group mb-3">
            <label class="input-group-text" for="gambarProduk">Upload Gambar</label>
            <input type="file" class="form-control" id="gambarProduk" name="gambarProduk">
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
    </form>
</div>
<script src="js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>