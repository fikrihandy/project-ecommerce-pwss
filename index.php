<?php
$filter = '';
if ($_GET["filter"] == "laptop") {
    $filter = "Laptop";
} elseif ($_GET["filter"] == "aksesoris") {
    $filter = "Aksesoris";
} elseif ($_GET["filter"] == "hp") {
    $filter = "Smartphone";
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if ($filter == '') {
        ?>
        <title>Fikri eCommerce</title>
        <?php
    } else {
        ?>
        <title>Fikri eCommerce - <?php echo $filter ?></title>
        <?php
    }
    ?>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light sticky-top">
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
                    <a class="<?php if ($filter == '') {
                        echo 'nav-link active';
                    } else {
                        echo 'nav-link';
                    } ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="<?php if ($filter == 'Laptop') {
                        echo 'nav-link active';
                    } else {
                        echo 'nav-link';
                    } ?>" href="index.php?filter=laptop">Laptop</a>
                </li>
                <li class="nav-item">
                    <a class="<?php if ($filter == 'Smartphone') {
                        echo 'nav-link active';
                    } else {
                        echo 'nav-link';
                    } ?>" href="index.php?filter=hp">Smartphone</a>
                </li>
                <li class="nav-item">
                    <a class="<?php if ($filter == 'Aksesoris') {
                        echo 'nav-link active';
                    } else {
                        echo 'nav-link';
                    } ?>" href="index.php?filter=aksesoris">Aksesoris</a>
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
<br><br>
<div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        include 'koneksi.php';
        $sql = "SELECT produk, gambar, harga, id FROM product;";
        if ($filter != '') {
            $sql = "SELECT produk, gambar, harga, id FROM product WHERE kategori='$filter';";
        }
        /**
         * @var mysqli $conn
         */
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col">
                    <div class="card">
                        <img src="foto_produk/<?php echo $row["gambar"]; ?>" class="rounded"
                             alt="<?php echo $row["produk"]; ?>" style="height: 14rem; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["produk"] ?></h5>
                            <p class="card-text"><span class="badge rounded-pill text-bg-light">Harga</span> :
                                Rp <?php echo number_format($row["harga"]); ?></p>
                            <a class="btn btn-primary" href="detail_produk.php?id=<?php echo $row["id"]; ?>"
                               role="button">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="col">
                <div class="card">
                    <img src="foto_produk/default.webp" class="rounded" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Data Tidak Ada.</h5>
                        <p class="card-text"> Harga : Rp - </p>
                        <button type="button" class="btn btn-secondary btn-lg" disabled>No data</button>
                    </div>
                </div>
            </div>
            <?php
        }
        $conn->close();
        ?>
    </div>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>