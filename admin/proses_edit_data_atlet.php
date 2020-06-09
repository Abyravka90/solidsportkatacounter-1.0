<?php
include_once '../config/database.php';
if (isset($_POST['simpan'])) {
    $id_atlet = $_POST['id_atlet'];
    $nama_atlet = $_POST['nama_atlet'];
    $kontingen = $_POST['kontingen'];
    $kata_dimainkan = $_POST['kata'];
    $atribut = $_POST['atribut'];
    $pertandingan_ke = $_POST['pertandingan_ke'];
    foreach ($atribut as $key => $val) {
        mysqli_query($simpan = $mysqli, 'UPDATE `tabel_atlet`
        SET `nama_atlet` = "' . $nama_atlet[$key] . '", `kontingen`="' . $kontingen[$key] . '" ,  `atribut` = "' . $atribut[$key] . '" 
        , `pertandingan_ke` = ' . $pertandingan_ke[$key] . ',`kata_dimainkan` = "' . $kata_dimainkan[$key] . '" 
        WHERE `id_atlet` = ' . $id_atlet[$key] . ';');
    }
    if ($simpan > 0) {
        setcookie("update", "Data Berhasil dirubah", time() + 1);
        header('location:tampil_data_atlet.php');
    } else {
        echo 'gagal rubah data';
    }
}
