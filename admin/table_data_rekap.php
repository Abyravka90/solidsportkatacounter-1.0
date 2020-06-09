<?php
include_once '../config/database.php';
$data_atlet = mysqli_query($mysqli, 'SELECT * FROM `tabel_atlet`');
$data_point = mysqli_query($mysqli, 'SELECT * FROM `point`');
$start = 0;
?>
<br>
<div class="container-fluid">
    <div class="card mb-3">

        <div class="card-body">
            <h1 class="text-uppercase text-black font-weight-bold" style="font-size:100;color:#000" id="nama_atlet"></h1>
            <br>
            <h4>Memainkan Kata : <span class="badge badge-danger">
                    <p class="text-uppercase black-white font-weight-bold" id="kata_dimainkan">
                </span></p>
            </h4>
            <h4>Kontingen : <span id="kontingen" class="badge badge-info">
                    <h2 class="text-uppercase text-white font-weight-bold">
                </span></h2>
            </h4>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-sign-in-alt"></i>
            Perolehan Point</div>
        <div class="card-body">
            <form action="proses_edit_data_point_grup_edit.php" name="data_pertandingan" method="post">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Juri</th>
                                <th>Nilai Technic</th>
                                <th>Nilai Athletic</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_COOKIE['update'])) {
                                echo '<div class="alert alert-success alert-dismissable fade show" role="alert">' . $_COOKIE['update'] . '
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>';
                            }
                            if (isset($_COOKIE['pesan'])) {
                                echo '<div class="alert alert-success alert-dismissable fade show" role="alert">' . $_COOKIE['pesan'] . '
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>';
                            }
                            if (isset($_COOKIE['message'])) {
                                echo '<div class="alert alert-danger alert-dismissable fade show" role="alert">' . $_COOKIE['message'] . '
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>';
                            }
                            ?>

                            <?php
                            while ($result = mysqli_fetch_array($data_point)) { ?>
                                <tr>
                                    <td> <?= ++$start  ?></td>
                                    <input class="form-control" type="hidden" name="id_point[]" value="<?= $result['id_point'] ?>" readonly>
                                    <input class="form-control" type="hidden" name="id_atlet[]" value="<?= $result['id_atlet'] ?>" readonly>
                                    <input class="form-control" type="hidden" name="nama_atlet[]" value="<?= $result['nama_atlet'] ?>" readonly>
                                    <input class="form-control" type="hidden" name="kata_dimainkan[]" value="<?= $result['kata_dimainkan'] ?>" readonly>
                                    <input class="form-control" type="hidden" name="kontingen[]" value="<?= $result['kontingen'] ?>" readonly>
                                    <td> <input class="form-control" type="text" name="penilai[]" value="<?= $result['penilai'] ?>" readonly></td>
                                    <td>
                                        <select class="browser-default custom-select" name="nilai_technic[]">
                                            <?php
                                            if ($result['nilai_technic'] == $i) {
                                                echo 'selected';
                                            }
                                            echo '<option value=' . $result['nilai_technic'] . '>' . $result['nilai_technic'] . '</option>';
                                            for ($i = 5; $i <= 10; $i = $i + 0.2) {
                                                echo '<option value="' . $i . '">' . number_format($i, 1) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="browser-default custom-select" name="nilai_athletic[]">
                                            <?php
                                            if ($result['nilai_athletic'] == $i) {
                                                echo 'selected';
                                            }
                                            echo '<option value=' . $result['nilai_athletic'] . '>' . $result['nilai_athletic'] . '</option>';
                                            for ($i = 5; $i <= 10; $i = $i + 0.2) {
                                                echo '<option value="' . $i . '">' . number_format($i, 1) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <input name="update" class="btn btn-info" type="submit" value="Update">
                </div>
            </form>
        </div>
    </div>