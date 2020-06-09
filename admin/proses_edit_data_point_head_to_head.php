<?php
include_once '../config/database.php';
if (isset($_POST['update'])) {
    $id = $_POST['id_point'];
    $id_atlet = $_POST['id_atlet'];
    $nama_atlet = $_POST['nama_atlet'];
    $kata_dimainkan = $_POST['kata_dimainkan'];
    $kontingen = $_POST['kontingen'];
    $penilai = $_POST['penilai'];
    $dinilai = $_POST['dinilai'];
    $nilai_technic = $_POST['nilai_technic'];
    $nilai_athletic = $_POST['nilai_athletic'];
    foreach ($id as $key => $val) {
        $query_update_point = 'UPDATE `point` 
        SET `id_point`= "' . $id[$key] . '"
        ,`nama_atlet`="' . $nama_atlet[$key] . '"
        ,`nilai_athletic`="' . $nilai_athletic[$key] . '"
        ,`nilai_technic`="' . $nilai_technic[$key] . '"
        ,`kata_dimainkan`="' . $kata_dimainkan[$key] . '"
        ,`kontingen`="' . $kata_dimainkan[$key] . '"
        ,`dinilai` = "' . $dinilai[$key] . '"
        WHERE `penilai` = "' . $penilai[$key] . '";';
        mysqli_query($update = $mysqli, $query_update_point);
        $query_detail = 'UPDATE `tabel_detail` 
    SET ' . $penilai[$key] . '_ath ="' . $nilai_athletic[$key] . '"
    ,' . $penilai[$key] . '_tech ="' . $nilai_technic[$key] . '" WHERE `id` = ' . $id_atlet[$key] . ' ;';
        mysqli_query($update = $mysqli, $query_detail);
    }
    mysqli_query($update = $mysqli, $query);
    if ($update > 0) {
        setcookie("update", "Data Berhasil dirubah", time() + 1);
        header('location:tampil_data_point.php');
    } else {
        echo 'gagal rubah data';
    }
}
