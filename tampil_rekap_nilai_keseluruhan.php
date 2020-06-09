<?php
include 'config/database.php';
$query = 'SELECT `tabel_atlet`.*,`point`.`pertandingan_ke` FROM `tabel_atlet` JOIN `point` ON `tabel_atlet`.`pertandingan_ke` = `point`.`pertandingan_ke` ORDER BY `tabel_atlet`.`poin_rekap` DESC LIMIT 6,2;';
$sql_rekap = mysqli_query($mysqli, $query);
$hasil_rekap = array();
while ($row = mysqli_fetch_array($sql_rekap)) {
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
  array_push($hasil_rekap, array('nama_atlet' => $nama_atlet, 'kontingen' => $row[2], 'atribut' => $row[3], 'pertandingan_ke' => $row[4], 'poin_rekap' => $row[5], 'pertandingan_ke' => $row[8]));
}
echo json_encode(array('rekap' => $hasil_rekap));
