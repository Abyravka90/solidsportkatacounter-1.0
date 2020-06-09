<?php
include_once '../config/database.php';
if (isset($_POST['update'])) {
    $grup = $_POST['grup'];
    $ket = $_POST['keterangan'];
    foreach ($ket as $key => $val) {
        $query = 'UPDATE `tabel_detail`
        SET `ket` = "' . $ket[$key] . '" WHERE `grup` = "' . $grup[$key] . '";';
        mysqli_query ($update = $mysqli,$query);
       
    }
    if ($update > 0) {
        setcookie("update", "Data Berhasil dirubah", time() + 1);
        header('location:tampil_data_atlet_grup.php');
    } else {
        echo 'gagal rubah data';
    }
}
