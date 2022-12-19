<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login_admin.php");
}
$id_produk = $_GET["id"];
include 'koneksi.php';
$sql = "SELECT * FROM product WHERE id = $id_produk";
/**
 * @var mysqli $conn
 */
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fikri eCommerce - Edit Gambar <?php echo $row["produk"]; ?></title>
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
                    <a class="nav-link" href="tambah_produk.php">Tambah Baru</a>
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
    <h3>Update Gambar untuk produk: <?php echo $row["produk"] ?>.</h3><br>
    <form action="edit_gambar_proses.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="produkId" value="<?php echo $id_produk ?>">
        <input type="hidden" name="idGambar" id="idGambar" value="<?php echo $row["gambar"] ?>">
        <div class="input-group mb-3">
            <label class="input-group-text" for="gambarProduk">Upload Gambar</label>
            <input type="file" class="form-control" id="gambarProduk" name="gambarProduk">
        </div>
        <a class="btn btn-danger" href="edit_produk.php?id=<?php echo $id_produk ?>" role="button">Batal</a>
        <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
    </form>
    <br>
</div>
</body>
