<?php
include '../config/database.php';
$urutan_pertandingan = mysqli_query($mysqli, 'SELECT pertandingan_ke FROM `tabel_atlet` ');
$list_pertandingan = mysqli_query($mysqli, 'SELECT * FROM `tabel_atlet` ORDER BY `pertandingan_ke`');
$urutan = mysqli_query($mysqli, 'SELECT DISTINCT `pertandingan_ke` FROM `tabel_atlet`');
?>
<div class="container card">
    <br>

    <div class="card card-header">
        <i class="fas fa-table"></i>
        Data Pertandingan</div><br>
    <div class="container-fluid">
        <form class="form-inline" method="get" name="frm" action="">
            <div class="form-row align-items-center">
                <p class="lead">Urutan tanding</p>
                <div class="col-auto">
                    <select class="form-control" name="pertandingan_ke">
                        <?php while ($data = mysqli_fetch_array($urutan)) {
                        ?>
                            <option value="<?= $data['pertandingan_ke'] ?>"><?= $data['pertandingan_ke'] ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="col-auto">
                    <input type="submit" class=" form-group btn btn-info" name="btnPilih" value="Pilih" />
                </div>
                <p class="lead text-right">Reset penilaian : </p>
                <div class="col-auto">
                    <a href="reset_data_pertandingan.php" class="form-group btn btn-danger">Reset</a>
                </div>
                   <p class="lead text-right">Dashboard Point : &nbsp; </p>
                        <a href="http://localhost/beranda_perorangan.php" target="_blank" class="form-group btn btn-dark">Go Dashboard </a>
            </div>
        </form>
    </div>
    <!-- isi kontennya disini -->
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th colspan="2">
                        <div class="col-xs-3 text-center">
                            <h1>Data Pertandingan Final</h1>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <?php
                    if (isset($_GET['pertandingan_ke']) && ($_GET['pertandingan_ke']) >= 1) {
                        $pertandingan_ke = $_GET['pertandingan_ke'];
                        //logika kalau datanya lebih dari dua
                        $jumlahTanding = mysqli_query($mysqli, 'SELECT*FROM `tabel_atlet` WHERE pertandingan_ke = ' . "$pertandingan_ke" . '');
                        $cek_data = mysqli_num_rows($jumlahTanding);
                        if ($cek_data == 0 || $cek_data > 2) {
                            echo '<td><div class="alert alert-danger text-center" role="alert">DATABASE DOESNT EXIST! or data pertandingan ke = &nbsp;' . $pertandingan_ke . ' lebih dari dua!</div></td>';
                        } else {
                            //disini prosesnya
                            $result = mysqli_query($mysqli, 'SELECT*FROM `tabel_atlet` WHERE pertandingan_ke = ' . "$pertandingan_ke" . '');
                            while ($data = mysqli_fetch_array($result)) { ?>

                                <td>
                                    <center>
                                        <div class="col-sm-8">
                                            <div class="card text-center">
                                                <div class="card-header <?php if ($data['atribut'] == 'aka') {
                                                                            echo 'bg-danger';
                                                                        } else {
                                                                            echo 'bg-info';
                                                                        } ?>">
                                                </div>
                                                <div class="card-body">
                                                    <form method="post" name="sedang_bertanding" action="proses_edit_data_point_perorangan.php">
                                                        <h5 class="card-title">
                                                            <input type="hidden" name="atribut" value="<?= $data['atribut'] ?>">
                                                            <input type="hidden" name="id_atlet" value="<?= $data['id_atlet'] ?>">
                                                            <input type="hidden" name="pertandingan_ke" value="<?= $data['pertandingan_ke'] ?>">
                                                            <?php if ($data['bermain'] == 'TRUE') {
                                                                echo '<div class="alert alert-danger text-center" role="alert">Pemain Ini sedang dinilai!<div class="fa-3x"><h1><i class="fas fa-spinner fa-pulse"></i></h1></div></div>';
                                                            } ?>
                                                            <p class="lead">Nama Atlet</p>
                                                            <div class="form-group"><input class="form-control" type="text" name="nama_atlet" value="<?= $data['nama_atlet'] ?>" readonly></div>
                                                        </h5>
                                                        <p class="lead card-text"><span class="badge badge-warning">Kata Dimainkan : </span>
                                                            <div class="form-group"><input type="text" class="form-control" value="<?= $data['kata_dimainkan'] ?>" name="kata_dimainkan" readonly></div>
                                                        </p>
                                                        <p class=" lead card-text"><span class="badge badge-dark text-white">Kontingen : </span>
                                                            <div class="form-group"><input class="form-control" type="text" name="kontingen" value="<?= $data['kontingen'] ?>" readonly></div>
                                                        </p>
                                                        <input name="simpan" type="submit" class="btn btn-primary" value="proses penilaian">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                                </td>
                    <?php }
                        }
                    } else {
                        $pertandingan_ke = 0;
                        echo '<td><div class="alert alert-warning text-center" role="alert">belum ada data pertandingan yang aktif</div></td>';
                    } ?>
                </tr>
                <!-- ini disubmit diluar perulangan-->
            </tbody>
        </table>

        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="bg-success text-white">
                    <p class="lead">
                        <tr>
                            <th>
                                nama atlet
                            </th>
                            <th>
                                kontingen
                            </th>
                            <th>
                                urutan pertandingan
                            </th>

                        </tr>
                    </p>
                </thead>
                <tbody>
                    <p class="lead">(*) pilih data pertandingan sesuai data berikut </p>
                    <?php while ($hasil = mysqli_fetch_array($list_pertandingan)) {
                    ?>
                        <tr>
                            <td><?= $hasil['nama_atlet'] ?></td>
                            <td><?= $hasil['kontingen'] ?></td>
                            <td><?= $hasil['pertandingan_ke'] ?>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>