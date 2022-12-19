<?php
include('koneksi.php');
$id = $_POST["id"];
$sql = 'DELETE FROM product WHERE id=' . $id;
/**
 * @var mysqli $conn
 */
if ($conn->query($sql) === TRUE) {
    header("location:admin_dashboard.php");
}
$conn->close();