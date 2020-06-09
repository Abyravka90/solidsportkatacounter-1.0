<?php
session_start();
include '../assets/_partials/head.php';
if (!isset($_SESSION['username'])) {
    setcookie("message", "login session error", time() + 1);
    header('location: index.php');
} else if ($_SESSION['level'] == 'wasit') {
    header('location: wasit.php');
}
?>
<?php include_once '../config/head.php' ?>

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Salam Karate Oss!</h1>
        <p class="lead">selamat datang di aplikasi <h4><span class="lead badge badge-success">Electronic Kata Counter</span></h4> , Aplikasi ini dibuat untuk melakukan proses perhitungan poin dalam pertandingan kata
            <hr class="my-4">
            <p>untuk pengaturan tatami dan juga kelas yang sedang dipertandingkan silahkan tekan tombol config</p>
            <a href="config_pertandingan.php" class="btn btn-primary">konfigurasi</a>
    </div>
</div>
<!-- Sticky Footer -->
<?php include_once '../config/footer.php' ?>