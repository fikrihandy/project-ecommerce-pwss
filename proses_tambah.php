<?php
$id_gambar = uniqid();
$target_dir = "foto_produk/";
$file_gambar = $id_gambar . ' - ' . basename($_FILES["gambarProduk"]["name"]);
$target_file = $target_dir . $file_gambar;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is an actual image or fake image
$check = getimagesize($_FILES["gambarProduk"]["tmp_name"]);
if ($check !== false) {
    $uploadOk = 1;
} else {
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "webp"
) {
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["gambarProduk"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["gambarProduk"]["name"])) . " has been uploaded.";

        // UPDATE DATABASE
        include('koneksi.php');
        $produk = $_POST['produk'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $kategori = $_POST['kategori'];
        $stock = $_POST['stock'];

        echo $produk . $harga . $deskripsi . $kategori . $stock;

        $sql = "INSERT INTO product (produk, harga, deskripsi, stok, id, kategori, gambar) VALUES ('$produk', $harga, '$deskripsi', $stock, NULL, '$kategori', '$file_gambar')";
        /**
         * @var mysqli $conn
         */
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location:admin_dashboard.php');
        } else {
            echo "Error";
        }

        $conn->close();

    } else {
        echo "Gagal menyimpan.";
    }
}