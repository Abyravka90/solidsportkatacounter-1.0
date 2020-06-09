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
<?php
include_once '../config/head.php';
include_once 'table_data_rekap.php';
include_once '../config/footer.php';
