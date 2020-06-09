<?php
include 'config/database.php';
$sql_config = mysqli_query($mysqli, "SELECT * FROM `tabel_config` ORDER BY arena ASC");
$hasil4 = array();
while ($rows = mysqli_fetch_array($sql_config)) {
    array_push($hasil4, array('arena' => $rows[1], 'kelas' => $rows[2]));
}
echo json_encode(array('hasil4' => $hasil4));
