<?php
session_start();
include '../assets/_partials/head.php';
if (!isset($_SESSION['username'])) {
    setcookie("message", "login session error", time() + 1);
    header('location: index.php');
} ?>
<?php include_once '../config/head.php' ?>

<?php include_once 'form_data_atlet.php'; ?>
<!-- Sticky Footer -->
<?php include_once '../config/footer.php' ?>