<?php
include '../config/database.php';
$sql_technic = "SELECT nilai_technic FROM `point` ORDER BY nilai_technic DESC LIMIT 3";
$sql_athletic = "SELECT nilai_athletic FROM `point` ORDER BY nilai_athletic DESC LIMIT 3";

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

$total_nilai_semua = round($total_nilai_athletic + $total_nilai_technic, 2);
