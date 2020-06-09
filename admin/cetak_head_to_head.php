<?php
include_once '../config/database.php';
$i = 1;
?>
<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="assets/css/creative.min.css" rel="stylesheet">
  <!--
  <style>
body {
  overflow: hidden; /* Hide scrollbars */
}
</style>
-->
  <!-- ini adalah file baru untuk SB admin-->
  <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/datatables/dataTables.bootstrap4.css">
<div class="container card">
    <br>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Pertandingan</div>
            <div class="card-body">
                <form action="proses_edit_data_atlet_grup.php" name="data_pertandingan" method="post">
                    <div class="table-responsive">
                      <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Atlet</th>
                                    <th>Jenis Penilaian</th>
                                    <th>Juri 1 </th>
                                    <th>juri 2</th>
                                    <th>juri 3 </th>
                                    <th>juri 4 </th>
                                    <th>juri 5 </th>
                                    <th>juri 6 </th>
                                    <th>juri 7 </th>
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
                                if (isset($_GET['id_jenis'])) {
                                    $data_cetak = mysqli_query($mysqli, 'SELECT `tabel_detail`.*,`poin_rekap`,`tabel_atlet`.`id_atlet`
                                    FROM `tabel_detail` JOIN `tabel_atlet` 
                                    ON `tabel_detail`.`id` = `tabel_atlet`.`id_atlet`
                                    WHERE `tabel_detail`.`id_jenis`= "'.$_GET['id_jenis'].'"
                                    AND `tabel_detail`.`pertandingan_ke`= "'.$_GET['pertandingan_ke'].'"');
                                    while ($result = mysqli_fetch_array($data_cetak)) {
                                ?>
                                        
                                        <tr>
                                        <input type="hidden" value="<?= $result['id_atlet'] ?>" name="id_atlet[]">
                                        <td rowspan=2 class="text-center"><?= $result['nama_atlet'] ?></td>
                                        <td>Nilai Athletic</td>
                                        <td> <?= $result['juri1_ath'] ?></td>
                                        <td> <?= $result['juri2_ath'] ?></td>
                                        <td> <?= $result['juri3_ath'] ?></td>
                                        <td> <?= $result['juri4_ath'] ?></td>
                                        <td> <?= $result['juri5_ath'] ?></td>
                                        <td> <?= $result['juri6_ath'] ?></td>
                                        <td> <?= $result['juri7_ath'] ?></td>
                                        </tr>
                                        <tr>
                                        <td> Nilai Technic</td>
                                        <td> <?= $result['juri1_tech'] ?></td>
                                        <td> <?= $result['juri2_tech'] ?></td>
                                        <td> <?= $result['juri3_tech'] ?></td>
                                        <td> <?= $result['juri4_tech'] ?></td>
                                        <td> <?= $result['juri5_tech'] ?></td>
                                        <td> <?= $result['juri6_tech'] ?></td>
                                        <td> <?= $result['juri7_tech'] ?></td>
                                        </tr>
                                        <tr>
                                        <th colspan="8">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jumlah Poin Rekap :</th>
                                        <th><?= $result['poin_rekap'] ?></td>
                                        </tr>
                                        
                                <?php
                                        $i++;
                                    }
                                }
                                ?>
                                <!--    -->


                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
		window.print();
	</script>