<?php
include_once('../config/database.php');
$grup = $_GET['grup'];
mysqli_query($mysqli, 'UPDATE `tabel_atlet` 
SET poin_rekap = 0 ');
setcookie("update", "Data Poin Rekap Berhasil dirubah", time() + 1);
@header('location:tampil_data_atlet_grup.php?grup='.$grup.'');
