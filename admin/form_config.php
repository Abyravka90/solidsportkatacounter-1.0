<?php
include_once '../config/database.php';
$hasil = mysqli_query($mysqli, 'SELECT*FROM `tabel_config`');
$cek_data = mysqli_num_rows($hasil);
?>
<div class="container card">
    <br>
    <div class="card card-header">
        <i class="fas fa-table"></i>
        Konfigurasi Pertandingan</div>
    <?php if ($cek_data > 0) {
        echo '<div class="alert alert-warning text-center" role="alert">ada data konfigurasi tersimpan silahkan hapus data sebelumnya pilih menu atribut pertandingan</div>';
    } else {
    ?>

        <div class="container-fluid">
            <!-- isi kontennya disini -->
            <form method="post" name="config_pertandingan" action="proses_simpan_data_config.php">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Arena</th>
                                <th>Kelas yang dipertandingkan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="arena" id="arena">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="kelas" id="kelas">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" name="simpan" class="btn btn-primary" value="simpan">
                <?php
            } ?>
                <!-- ini disubmit diluar perulangan-->
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
</div>