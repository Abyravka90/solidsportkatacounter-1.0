<?php
session_start();
include '../config/database.php';
$username = mysqli_real_escape_string($mysqli, $_POST['username']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);
$password = md5($password);
$sql = mysqli_query($mysqli, "SELECT * from `user` WHERE username = '" . $username . "' AND password = '" . $password . "' ");
$data = mysqli_fetch_array($sql);
if (!empty($data)) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] =  $data['nama'];
    $_SESSION['level'] = $data['level'];
    setcookie("message", "delete", time() - 1);
    if ($data['level'] == 'wasit') {
        header("location: wasit.php");
    } else {
        header("location: administrator.php");
    }
} else {
    setcookie("message", "Maaf Username atau password anda salah", time() + 1);
    header('location:index.php');
}
