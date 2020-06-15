<?php
include_once '../config/database.php';
$i = 1;
?>
<div class="container card">
    <br>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Pertandingan</div>

            <div class="card-body">
                <form action="" method="GET">
                    <select name="grup" class="form-control">
                        Pilih Group :
                        <?php $data_grup = mysqli_query($mysqli, "SELECT distinct grup FROM `tabel_atlet`");
                        while ($hasil_grup = mysqli_fetch_array($data_grup)) {
                            echo
                                '
                                    <option value="' . $hasil_grup['grup'] . '">' . $hasil_grup['grup'] . '</option>
                                ';
                        } ?>
                    </select>
                    <br>

                    <input type="submit" value="proses" class="btn btn-secondary">
                    <br /><br />
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Atlit</th>
                                <th>Kontingen</th>
                                <th>Kata yang dimainkan</th>
                                <th>Atribut</th>
                                <th>Group</th>
                                <th> Proses </th>
                                <th>Urutan Pertandigan</th>
                                <th>action</th>
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
                            if (isset($_GET['grup'])) {
                                $data_atlet = mysqli_query($mysqli, 'SELECT * FROM `tabel_atlet` WHERE grup="' . $_GET['grup'] . '"  ORDER BY `pertandingan_ke` ASC ');
                                while ($result = mysqli_fetch_array($data_atlet)) {
                            ?>
                                    <tr>
                                        <form action="proses_edit_data_point_grup.php" name="data_pertandingan" method="post">
                                            <input type="hidden" value="<?= $result['id_atlet'] ?>" name="id_atlet">
                                            <td> <?= $i ?></td>
                                            <td> <input class="form-control text-center" type="text" name="nama_atlet" value="<?= $result['nama_atlet'] ?>" readonly></td>
                                            <td> <input class="form-control text-center" type="text" name="kontingen" value="<?= $result['kontingen'] ?>" readonly></td>
                                            <td> <input class="form-control text-center" type="text" name="kata_dimainkan" value="<?= $result['kata_dimainkan'] ?>" readonly></td>
                                            <td> <input class="form-control text-center text-white <?php if ($result['atribut'] == 'aka') echo 'bg-danger';
                                                                                                    else echo 'bg-info'; ?>" name="atribut" value="<?= $result['atribut'] ?>" readonly></td>
                                            <td>
                                                <div class="form-group">
                                                    <input class="form-control text-center" type="text" name="grup" id="" value="<?= $result['grup'] ?>" readonly>
                                                </div>
                                            </td>
                                            <td> <?php if ($result['bermain'] == 'TRUE') {
                                                        echo '<div class="alert alert-danger text-center" role="alert">Proses Penilaian!<div class="fa-3x"><h1><i class="fas fa-spinner fa-pulse"></i></h1></div></div>';
                                                    } ?></td>
                                            <td> <input class="form-control text-center" type="text" name="pertandingan_ke" value="<?= $result['pertandingan_ke'] ?>" readonly> </td>
                                            <td>
                                                <input name="simpan" type="submit" class="btn btn-primary" value="proses penilaian">
                                            </td>
                                        </form>
                                        <form action="proses_simpan_record_pertandingan.php" method="post">
                                            <td><button type="submit" name="simpan" class="btn btn-success"><i class="fas fa-user-times"></i></button></td>
                                        </form>
                                    </tr>
                            <?php
                                    $i++;
                                }
                            } else {
                                echo 'tidak ada data pertandingan';
                            }
                            ?>
                            <!--    -->


                        </tbody>
                    </table>
                    <a href="reset_data_pertandingan_grup.php" class="form-group btn btn-danger">Reset Penilaian</a>
                    <a href="http://localhost/beranda_grup.php" target="_blank" class="form-group btn btn-dark">Go Dashboard </a>
                </div>

            </div>
        </div>
    </div>
</div>