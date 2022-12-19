<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fikri eCommerce - Halaman Admin</title>
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
                    <a class="nav-link active" aria-current="page" href="admin_dashboard.php">Produk Saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tambah_produk.php">Tambah Baru</a>
                </li>
            </ul>
            <span class="navbar-text">
                <?php
                session_start();
                if (!isset($_SESSION['username'])) {
                    header("location: login_admin.php");
                }
                echo 'Login sebagai ' . $_SESSION['nama']; ?>
                    <a class="btn btn-sm btn-outline-secondary" href="logout.php" role="button">Logout</a>
                </span>
        </div>
    </div>
</nav>
<br>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Kategori</th>
            <th class="text-end" scope="col">Harga</th>
            <th class="text-end" scope="col">Edit Produk</th>
            <th class="text-end" scope="col">Hapus Produk</th>
            <th class="text-end" scope="col">Live View</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'koneksi.php';
        $sql = "SELECT * FROM product";
        /**
         * @var mysqli $conn
         */
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <th class="align-middle" scope="row">
                        <?php echo $i; ?>
                    </th>
                    <td class="align-middle">
                        <?php echo $row["produk"] ?>
                    </td>
                    <td class="align-middle">
                        <?php echo $row["kategori"] ?>
                    </td>
                    <td class="align-middle text-end">Rp
                        <?php echo number_format($row["harga"]) ?>
                    </td>
                    <td class="text-end align-middle">
                        <a class="btn btn-primary" href="edit_produk.php?id=<?php echo $row["id"] ?>"
                           role="button">Edit</a>
                    </td>
                    <td class="align-middle text-end">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal<?php echo $i ?>">
                            Hapus
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $i ?>" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Menghapus Produk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Anda ingin mengapus produk <b>
                                                <?php echo $row["produk"] ?>
                                            </b> ?
                                        <p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal
                                        </button>
                                        <form action="delete_produk.php" method="post">
                                            <button id="<?php echo $row[" id"]
                                            ?>" name="id" type="submit" class="btn btn-danger" value="<?php echo
                                            $row["id"] ?>"> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-end align-middle">
                        <a class="btn btn-success" href="detail_produk.php?id=<?php echo $row["id"] ?>" role="button">View</a>
                    </td>
                </tr>
                <?php
                $i++;
            }
        } else {
            ?>
            <tr>
                <th class="align-middle" scope="row">#</th>
                <td class="align-middle text-center" colspan="6">No Data</td>
            </tr>
            <?php
        }
        $conn->close();
        ?>
        </tbody>
    </table>

</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>