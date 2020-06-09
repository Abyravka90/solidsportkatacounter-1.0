<?php
include 'config/database.php';
$sql_technic = mysqli_query($mysqli, "SELECT * FROM `point` ORDER BY penilai ASC");
$hasil = array();
while ($row = mysqli_fetch_array($sql_technic)) {
  $nama_atlet = $row['nama_atlet'];
  $arr = explode(" ", $nama_atlet);
  $limit = 3;
  $new = [];
  if (count($arr) > $limit) {
    for ($i = 0; $i < $limit; $i++) {
      array_push($new, $arr[$i]);
    }
  }
  if ($new) {
    $new = implode(" ", $new);
    $nama_atlet = $new;
  } else {
    $nama_atlet;
  }
  array_push($hasil, array(
    'nama_atlet' => $nama_atlet, 'nilai_technic' => $row[3], 'nilai_athletic' => $row['nilai_athletic'], 'penilai' => $row['penilai'], 'kata_dimainkan' => $row[5], 'pertandingan_ke' => $row[10], 'kontingen' => $row[6], 'atribut' => $row[7], 'id_atlet' => $row[8], 'grup' => $row[11]
  ));
}
echo json_encode(array('hasil' => $hasil));
