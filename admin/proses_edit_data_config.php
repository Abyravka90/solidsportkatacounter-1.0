<?php
include_once '../config/database.php';
if (isset($_POST['update'])) {
    $id_config = $_POST['id_config'];
    $arena = $_POST['arena'];
    $kelas = $_POST['kelas'];
    $query = 'UPDATE `tabel_config`
    SET `arena` = "' . $arena . '", `kelas`="' . $kelas . '" 
    WHERE `id_config` = ' . $id_config . ';';
    mysqli_query($simpan = $mysqli, $query);
    if ($simpan > 0) {
        setcookie("pesan", "Data Berhasil dirubah", time() + 1);
        header('location:tampil_data_config.php');
    } else {
        echo 'gagal rubah data';
    }
}
