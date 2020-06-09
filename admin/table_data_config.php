<?php
include_once '../config/database.php';
$data_config = mysqli_query($mysqli, 'SELECT * FROM `tabel_config`');
$i = 1;
?>
<div class="container card">
    <br>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Konfigurasi</div>
            <div class="card-body">
                <form action="proses_edit_data_config.php" name="data_config" method="post">
                    <div class="table-responsive">
                        <?php $jumlahTanding = mysqli_query($mysqli, 'SELECT*FROM `tabel_config`');
                        $cek_data = mysqli_num_rows($jumlahTanding);
                        if ($cek_data == 0) {
                            echo '<td><div class="alert alert-danger text-center" role="alert">Belum ada data Tatami dan kelas</div></td>';
                        } else { ?>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Arena</th>
                                        <th>Kelas yang dipertandingkan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_COOKIE['pesan'])) {
                                        echo '<div class="alert alert-success alert-dismissable fade show" role="alert">' . $_COOKIE['pesan'] . '
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>';
                                    }
                                    ?>
                                    <?php
                                    while ($result = mysqli_fetch_array($data_config)) { ?>
                                        <tr>
                                            <td> <?= $i ?></td>
                                            <input type="hidden" name="id_config" value="<?= $result['id_config'] ?>">
                                            <td> <input class="form-control" type="text" name="arena" value="<?= $result['arena'] ?>"></td>
                                            <td> <input class="form-control" type="text" name="kelas" value="<?= $result['kelas'] ?>"></td>
                                            <td>
                                                <a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data" href="hapus_data_config.php?id_config=<?= $result['id_config'] ?>">
                                                    <i class="fa fa-trash">&nbsp;delete</i></a>
                                            </td>
                                        </tr>

                                    <?php $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <input name="update" class="btn btn-info" type="submit" value="Update">
                        <?php } ?>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>