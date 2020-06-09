<?php
include '../config/database.php';
$id_config = $_GET['id_config'];

$hapus = mysqli_query($mysqli, 'DELETE FROM `tabel_config` WHERE id_config = "' . $id_config . '"');

if ($hapus > 0) {
    mysqli_query($mysqli, 'ALTER TABLE `tabel_config` auto_increment=0;');
    echo '<script>alert("data berhasil dihapus");
    window.location.href = "config_pertandingan.php";</script>';
} else {
    echo 'gagal';
}
