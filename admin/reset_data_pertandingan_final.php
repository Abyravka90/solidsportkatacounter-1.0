<?php
include_once('../config/database.php');
mysqli_query($mysqli, 'UPDATE `point` 
SET nama_atlet = 0, nilai_athletic = 0, nilai_technic = 0, kata_dimainkan = "", kontingen="", atribut = "", id_atlet=0, dinilai=0 ');
mysqli_query($mysqli, 'UPDATE `tabel_atlet` 
SET bermain = "FALSE"');
@header('location:tampil_data_pertandingan_final.php');
