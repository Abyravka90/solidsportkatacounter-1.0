<?php
include '../config/database.php';
$sql_technic = "SELECT nilai_technic FROM `point` ORDER BY nilai_technic DESC LIMIT 3";
$sql_athletic = "SELECT nilai_athletic FROM `point` ORDER BY nilai_athletic DESC LIMIT 3";
$sql_atribut = "SELECT distinct id_atlet, nama_atlet, kontingen, pertandingan_ke, grup FROM `point` ";//ini adalah query untuk mengambil semua value dari tabel poin untuk selanjutnya datanya diinsert ke table tabel_record
$sql_dihitung = "SELECT SUM(dinilai) as total FROM `point`";//menghitung jumlah Juri yang menilai pada setiap pertandingan
if ($result = $mysqli->query($sql_technic)) {
    while ($obj = $result->fetch_object()) {
        $subtotal_nilai_technic[] = $obj->nilai_technic;
    }
    $total_nilai_technic = 0.7 * array_sum($subtotal_nilai_technic);
}
if ($hasil = $mysqli->query($sql_athletic)) {
    while ($obj1 = $hasil->fetch_object()) {
        $subtotal_nilai_athletic[] = $obj1->nilai_athletic;
    }
    $total_nilai_athletic = 0.3 * array_sum($subtotal_nilai_athletic);
}
if ($atlet = $mysqli->query($sql_atribut)){
    while($obj3 = $atlet->fetch_object()){
        $id_atlet = $obj3->id_atlet;
        $nama_atlet = $obj3->nama_atlet;
        $kontingen = $obj3->kontingen;
        $pertandingan_ke = $obj3->pertandingan_ke;
        $grup = $obj3->grup;
    }
}
if ($hitung_juri_menilai = $mysqli->query($sql_dihitung)){
    while($obj4 = $hitung_juri_menilai->fetch_object()){
        $total_juri_menilai = $obj4->total;
    }
}
$total_nilai_semua = number_format($total_nilai_athletic + $total_nilai_technic, 2);
if($total_juri_menilai==7){
    $sql_record = "INSERT INTO tabel_record (id_atlet, nama_atlet, kontingen, grup, pertandingan_ke, nilai_keseluruhan) VALUES ('".$id_atlet."','".$nama_atlet."','".$kontingen."','".$grup."','".$pertandingan_ke."','".$total_nilai_semua."')";
    $result = $mysqli->query($sql_record);
    if ($result){
        echo "<script>alert('data poin berhasil direkam');window.location.href=('tampil_data_pertandingan_grup.php')</script>";
    }else{echo 'failed';}
}else{
    echo "<script>alert('Masih ada Juri yang belum menilai');window.location.href=('tampil_data_pertandingan_grup.php')</script>";
}//kalau semua juri sudah menilai maka masukan datanya