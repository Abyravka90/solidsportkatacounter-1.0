<?php
include_once '../config/database.php';
if (isset($_POST['update'])) {
    $id_atlet = $_POST['id_atlet'];
    $ket = $_POST['keterangan'];
    foreach ($ket as $key => $val) {
        $query = 'UPDATE `tabel_detail`
        SET `ket` = "' . $ket[$key] . '" WHERE `id_atlet` = "' . $id_atlet[$key] . '";';
        mysqli_query($update = $mysqli, $query);
    }
    if ($update > 0) {
        setcookie("update", "Data Berhasil dirubah", time() + 1);
        header('location:tampil_data_atlet.php');
    } else {
        echo 'gagal rubah data';
    }
}
