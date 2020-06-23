<?php
include 'config/database.php';
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

$total_nilai_semua = number_format($total_nilai_athletic + $total_nilai_technic, 2);
mysqli_query($mysqli, 'UPDATE  tabel_keseluruhan SET nilai_keseluruhan = ' . $total_nilai_semua . ' WHERE id_keseluruhan = 1');
$sql_keseluruhan = mysqli_query($mysqli, "SELECT `id_point`, `nilai_keseluruhan`,`atribut`,SUM(`dinilai`) as total  FROM `tabel_keseluruhan` INNER JOIN `point` LIMIT 1");
$hasil3 = array();
while ($row = mysqli_fetch_array($sql_keseluruhan)) {
  array_push($hasil3, array(
    'nilai_keseluruhan' => number_format($row[1],2), 'atribut' => $row[2], 'total' => $row[3],
    'nilai_technic' => number_format($total_nilai_technic, 2), 'nilai_athletic' => number_format($total_nilai_athletic, 2),
    'subtotal_nilai_technic' => number_format(array_sum($subtotal_nilai_technic), 2), 'subtotal_nilai_athletic' => number_format(array_sum($subtotal_nilai_athletic), 2)
  ));
}
echo json_encode(array('hasil3' => $hasil3));
