<?php
include 'koneksi.php';

$id = $_POST['id'];
$produk = $_POST['produk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];
$stock = $_POST['stock'];

echo $id . '<br>';
echo $produk . '<br>';
echo $harga . '<br>';
echo $deskripsi . '<br>';
echo $kategori . '<br>';
echo $stock . '<br>';


$sql = "UPDATE product SET produk='$produk', harga=$harga, deskripsi='$deskripsi', stok=$stock, kategori='$kategori' WHERE id=$id";
echo $sql;
/**
 * @var mysqli $conn
 */

if ($conn->query($sql) === TRUE) {
    header("location: admin_dashboard.php");
} else {
    echo "Error";
}

$conn->close();