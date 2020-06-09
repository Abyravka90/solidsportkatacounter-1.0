<?php
$connect = mysqli_connect("localhost", "root", "", "katasolid");
if (isset($_POST["submit"])) {
	if ($_FILES['file']['name']) {
		$filename = explode('.', $_FILES['file']['name']);
		if ($filename[1] == 'csv') {
			$handle = fopen($_FILES['file']['tmp_name'], "r");
			$counter = 0;
			while ($data = fgetcsv($handle, 1000, ",")) {
				$counter++;
				if ($counter == 1) {
					continue;
				}

				$item1 = mysqli_real_escape_string($connect, str_replace(",", "", $data[0]));
				$item2 = mysqli_real_escape_string($connect, str_replace(",", "", $data[1])); // lakuin hal yang sama
				$item3 = mysqli_real_escape_string($connect, str_replace(",", "", $data[2]));  // lakuin hal yang sama
				$item4 = mysqli_real_escape_string($connect, str_replace(",", "", $data[3]));  // lakuin hal yang sama


				$sql = "INSERT INTO tabel_atlet(nama_atlet,kontingen,atribut,pertandingan_ke,grup)
VALUES('$item1','$item2','$item3','0','$item4')";

				mysqli_query($connect, $sql);
			}
		}
	}

	header('location: tampil_data_atlet_grup.php'); // Redirect ke halaman awal
}
