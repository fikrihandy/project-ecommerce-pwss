<?php
echo 'hola';

$id = $_POST['id'];
$new_value = $_POST['stok_lama'];

if ($_POST['update_stok'] == '+') {
    $new_value += 1;
} elseif ($_POST['update_stok'] == '-') {
    $new_value -= 1;
}

include 'koneksi.php';

$sql = "UPDATE product SET stok=$new_value WHERE id=$id";
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