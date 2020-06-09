<?php
include_once '../config/database.php';
if (isset($_POST['simpan'])) {
    $id_atlet = $_POST['id_atlet'];
    $nama_atlet = $_POST['nama_atlet'];
    $kontingen = $_POST['kontingen'];
    $kata_dimainkan = $_POST['kata_dimainkan'];
    $atribut = $_POST['atribut'];
    $grup = $_POST['grup'];
    $pertandingan_ke = $_POST['pertandingan_ke'];
    if (in_array('', $atribut)) {
        header('location:tambah_data_atlet_grup.php');
    } else {
        foreach ($atribut as $key => $val) {
            mysqli_query(
                $simpan = $mysqli,
                'INSERT INTO `tabel_atlet` 
    (id_atlet,nama_atlet,kontingen,atribut,grup,pertandingan_ke,poin_rekap,kata_dimainkan,bermain) 
    VALUES (" ","' . $nama_atlet[$key] . '","' . $kontingen[$key] . '","' . $atribut[$key] . '","' . $grup[$key] . '","' . $pertandingan_ke[$key] . '","0"
        ,"' . $kata_dimainkan[$key] . '","0");'
            );
        }
        if ($simpan > 0) {
            setcookie("pesan", "anda telah menambahkan data", time() + 1);
            header('location:tampil_data_atlet_grup.php');
        } else {
            echo 'gagal';
        }
    }
}
