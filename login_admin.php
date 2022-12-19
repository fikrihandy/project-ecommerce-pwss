<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location: admin_dashboard.php");
}
?>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>
<h1>LOGIN</h1>
<p>Username: admin</p>
<p>Password: admin123</p><br>
<div style="color: red;margin-bottom: 15px;">
    <?php
    if (isset($_COOKIE["message"])) {
        echo $_COOKIE["message"];
    }
    ?>
</div>
<form method="post" action="login.php"><label>Username</label><br>
    <label>
        <input type="text" name="username" placeholder="Username">
    </label><br><br>
    <label>Password</label><br>
    <label>
        <input type="password" name="password" placeholder="Password">
    </label><br><br>
    <button type="submit">Login</button>
</form>
</body>

</html>