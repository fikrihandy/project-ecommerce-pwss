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
    <title>Fikri eCommerce - Edit Produk <?php echo $row["produk"]; ?></title>
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
    <h3>Edit Produk</h3>
    <br>
    <p>Gambar Produk saat ini: (<a href="edit_gambar.php?id=<?php echo $id_produk ?>">Ganti Gambar</a>) </p>
    <img src="foto_produk/<?php echo $row["gambar"]; ?>" class="img-fluid rounded mx-auto d-block" alt="...">
    <br>
    <p><b>Deskripsi saat ini:</b></p>
    <p><?php echo $row["deskripsi"] ?></p>
    <p><b>Update Data Produk</b></p>
    <!--    upload-->

    <!--    upload end-->

    <!--    new form data-->
    <form action="proses_edit.php" method="post">
        <label>
            <input type="hidden" name="id" id="produkId" value="<?php echo $id_produk ?>">
        </label>
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating">
                    <input name="produk" type="text" class="form-control" id="floatingInputGrid"
                           placeholder="Isikan nama produk" value="<?php echo $row["produk"] ?>"
                           required minlength="1" maxlength="50">
                    <label for="floatingInputGrid">Nama Produk</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <select name="kategori" class="form-select" id="floatingSelectGrid">
                        <option selected><?php echo $row["kategori"]; ?></option>
                        <?php
                        $selected_category = $row["kategori"];
                        $category = ["Laptop", "Smartphone", "Aksesoris"];
                        foreach ($category as $i) {
                            if ($i == $row["kategori"]) {
                                continue;
                            }
                            ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label for="floatingSelectGrid">Kategori</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Rp.</span>
                <div class="form-floating">
                    <input name="harga" type="text" class="form-control" id="floatingInputGroup1"
                           placeholder="Harga" value="<?php echo $row["harga"] ?>"
                           required minlength="1">
                    <label for="floatingInputGroup1">Harga</label>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Stock</span>
            <input name="stock" type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" value="<?php echo $row["stok"] ?>">
        </div>
        <div class="form-floating">
                <textarea name="deskripsi" class="form-control" placeholder="Ditampilkan pada detail produk"
                          id="floatingTextarea2" style="height: 100px" required maxlength="500"></textarea>
            <label for="floatingTextarea2">Deskripsi Baru</label>
        </div>
        <br>
        <a class="btn btn-danger" href="admin_dashboard.php" role="button">Batal</a>
        <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
    </form>
    <!--    new form data end-->
</div>
