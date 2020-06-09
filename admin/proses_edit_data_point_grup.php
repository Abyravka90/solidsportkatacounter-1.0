<?php
include_once '../config/database.php';
if (isset($_POST['simpan'])) {
    $id_atlet = $_POST['id_atlet'];
    $nama_atlet = $_POST['nama_atlet'];
    $kata_dimainkan = $_POST['kata_dimainkan'];
    $kontingen = $_POST['kontingen'];
    $pertandingan_ke = $_POST['pertandingan_ke'];
    $atribut = $_POST['atribut'];
    $grup = $_POST['grup'];
    $query = 'UPDATE `point`
    SET `nama_atlet` = "' . $nama_atlet . '", `kata_dimainkan`="' . $kata_dimainkan . '", `kontingen` ="' . $kontingen . '", `atribut` ="' . $atribut . '",
    `nilai_technic`= 0,`nilai_athletic` = 0,`dinilai`=0,`id_atlet`="' . $id_atlet . '",`pertandingan_ke`="' . $pertandingan_ke. '",`id_jenis` = "1",
    `grup`="' . $grup . '"';
    mysqli_query($mysqli,'INSERT INTO `tabel_detail` (id,nama_atlet,id_jenis,grup)
    VALUES ("'.$id_atlet.'","'.$nama_atlet.'","1","' . $grup . '")');
    mysqli_query($simpan = $mysqli, $query);
    if ($simpan > 0) {
        setcookie("pesan", "Data Berhasil dirubah", time() + 1);
        mysqli_query($mysqli, 'UPDATE `tabel_atlet` SET `bermain`= "FALSE"');
        mysqli_query($mysqli, 'UPDATE `tabel_atlet` SET `bermain`= "TRUE" WHERE `id_atlet`= "' . $id_atlet . '"');
        header('location:tampil_data_pertandingan_grup.php?grup=' . $grup . '&btnPilih=Ok');
    } else {
        echo 'gagal rubah data';
    }
}
