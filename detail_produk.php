<?php
$id_produk = $_GET["id"];
include 'koneksi.php';
$sql = "SELECT * FROM product WHERE id = $id_produk";
/**
 * @var mysqli $conn
 */
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fikri eCommerce - <?php echo $row["produk"]; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <h1>Welcome to Fikri eCommerce</h1>
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
                    <a class="nav-link" href="index.php?filter=laptop">Laptop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?filter=hp">Smartphone</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?filter=aksesoris">Aksesoris</a>
                </li>
            </ul>
            <span class="navbar-text">
                    <?php
                    session_start();
                    if (isset($_SESSION["username"])) {
                        echo "Selamat datang Admin! ";
                    } else {
                        echo "Selamat datang Pembeli!";
                    }
                    ?>
                    <a class="btn btn-sm btn-outline-secondary" href="login_admin.php" role="button">
                        <?php
                        if (isset($_SESSION["username"])) {
                            echo "Admin Dashboard";
                        } else {
                            echo "Login Admin";
                        }
                        ?>
                    </a>
                </span>
        </div>
    </div>
</nav>
<br>
<br>
<div class="container" style="width: 60%;">
    <h3 class="text-center"><?php echo $row["produk"]; ?>&nbsp;&nbsp;<span
                class="badge bg-secondary">Rp <?php echo number_format($row["harga"]); ?></span>
        <h3><br>
            <img src="foto_produk/<?php echo $row["gambar"]; ?>" class="img-fluid rounded mx-auto d-block" alt="...">
            <br>
            <div class="d-flex justify-content-center">
                <a class="btn btn-primary" target="_blank"
                   href="https://wa.me/6289692703057?text=Saya%20ingin%20membeli%20produk%20<?php echo $row["produk"]; ?>%20dari%20Fikri%20eCommerce."
                   role="button">Beli <?php echo $row["produk"]; ?></a>
            </div>
            <br>
            <p class="fs-5"><?php echo $row["deskripsi"]; ?></p>
            <p class="fs-5">Stock = <?php echo $row["stok"] ?></p>
            <br>
</div>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>