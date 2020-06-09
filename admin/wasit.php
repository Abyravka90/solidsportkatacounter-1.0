<?php
session_start();
include('../assets/_partials/head.php');
include('../assets/_partials/footer.php');
include('../config/database.php');
if (!isset($_SESSION['username'])) {
    setcookie("message", "login session error", time() + 1);
    header('location: index.php');
}
$cek_data = 0;
?>
<!--<meta http-equiv="refresh" content="30">-->

<body class="bg-dark">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header bg-danger">
                <div class="text-center">
                    <img src="assets/img/logo-2.jpeg" class="rounded" height=170 width=300 alt="logo-solid sport">
                </div>
            </div>
            <?php
            if (isset($_POST['nilai_technic'])) {
                $nama_atlet = $_POST['nama_atlet'];
                $query_check = 'SELECT `dinilai` from `point` WHERE `nama_atlet`= "' . $nama_atlet . '"  AND `penilai`= "' . $_SESSION['username'] . '"';
                $result2 = mysqli_query($mysqli, $query_check);
                while ($dinilai = mysqli_fetch_array($result2)) {
                    $cek_data = $dinilai['dinilai'];
                }
                if ($nama_atlet == "0") {
                    echo '<script>alert("belum ada pertandingan yang aktif");</script>';
                } else if ($cek_data == 1) {
                    echo '<script>alert("atlit ini sudah anda nilai");</script>';
                } else {
                    $id_atlet = $_POST['id_atlet'];
                    $nama_atlet = $_POST['nama_atlet'];
                    $nilai_technic = $_POST['nilai_technic'];
                    $nilai_athletic = $_POST['nilai_athletic'];
                    $query = 'UPDATE `point`
                    SET `point`.`nilai_technic`=' . $nilai_technic . ',`point`.`nilai_athletic` =' . $nilai_athletic . ',
                    `point`.`dinilai` = 1 WHERE `point`.`nama_atlet`= "' . $nama_atlet . '"  
                    AND `point`.`penilai`= "' . $_SESSION['username'] . '"';
                    $result = mysqli_query($mysqli, $query);

                    mysqli_query($mysqli, 'UPDATE  `tabel_detail` SET `id` ="' . $id_atlet . '"
                    ,`nama_atlet` = "' . $nama_atlet . '" ,' . $_SESSION["username"] . '_ath = "' . $nilai_athletic . '"
                    ,' . $_SESSION["username"] . '_tech = "' . $nilai_technic . '" WHERE `tabel_detail`.`id` ="' . $id_atlet . '"');

                    //kerjain GET Nilai Keseluruhan!                    
                    if ($result) {
                        echo '<div class="alert alert-success" role="alert">data telah disimpan </div>';
                    }
                }
            }
            ?>
            <div class="card-header">
                <h1>Penilai : <span class="badge badge-info"><?= $_SESSION['username'] ?></span></h1>
            </div>
            <form method="POST" action="">
                <div name="id_atlet" id="id_atlet"></div>
                <div class="card-header" name="nama_atlet" id="nama_atlet"></div>
                <div class="card-header" id="kontingen"></div>
                <div class="card-header" id="kata_dimainkan"></div>
                <div class="card-header" id="atribut"></div>
                <div class="card-body">
                    <div class="form-group">
                        <p class="lead">Nilai Technique : </p>
                        <select class="form-control" name="nilai_technic">
                            <option value=0>0</option>
                            <?php
                            for ($i = 5; $i <= 10; $i = $i + 0.2) {
                                echo '<option value="' . number_format($i, 1) . '">' . number_format($i, 1) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <p class="lead">Nilai Athletic : </p>

                        <select class="form-control" name="nilai_athletic">
                            <option value=0>0</option>
                            <?php
                            for ($i = 5; $i <= 10; $i = $i + 0.2) {
                                echo '<option value="' . number_format($i, 1) . '">' . number_format($i, 1) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="simpan"><br>
                    <a href="logout.php" class="btn btn-danger btn-block">keluar</a>
            </form>
        </div>
    </div>
    </div>

</body>