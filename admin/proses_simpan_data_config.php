<?php
if (isset($_POST['arena'])) {
    include '../config/database.php';
    $hasil = mysqli_query($mysqli, 'SELECT*FROM `tabel_config`');
    $cek_data = mysqli_num_rows($hasil);
    if ($cek_data < 1) {
        //proses simpan ke database
        $arena =  $_POST['arena'];
        $kelas = $_POST['kelas'];
        $query = 'INSERT INTO `tabel_config`(id_config, arena, kelas) VALUES (" ", "' . $arena . '", "' . $kelas . '")';
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            echo 'gagal simpan';
        } else {
            @header('location:tampil_data_config.php');
            setcookie("pesan", "Data Konfigurasi berhasil disimpan", time() + 1);
        }
    } else { ?>
        <script>
            alert('sudah ada data config tersimpan');
            window.location.href = 'config_pertandingan.php';
        </script>
<?php
    }
}
