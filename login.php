<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$data = [];
if ($username == 'admin' && $password == 'admin123') {
    $data = [
        'username' => 'admin',
        'nama' => 'Administrator123'
    ];
}
if (!empty($data)) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    setcookie("message", "delete", time() - 1);
    header("location: admin_dashboard.php");
} else {
    setcookie("message", "Maaf, Username atau Password salah", time() + 3600);
    header("location: login_admin.php");
}