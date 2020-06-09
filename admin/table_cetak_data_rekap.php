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
               <form action="cetak.php" method="POST">
                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Keterangan Cetak</label>
                        <div class="col-sm-5">
						<input type="hidden" name="jenis" class="form-control" value="1">
						<input type="hidden" name="grup" class="form-control" value="<?= $_GET['grup'] ?>">
						<input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                      </div>
                      <input class="btn btn-success" type="submit" value="Update">
					  </div>
                </form>
                <form action="proses_edit_data_atlet_grup.php" name="data_pertandingan" method="post">
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Atlet</th>
									<th>Kontingen</th>
                                    <th>Group</th>
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
                                if (isset($_GET['id_jenis'])) {
                                    $data_cetak = mysqli_query($mysqli, 'SELECT `tabel_detail`.*,`poin_rekap`,`kontingen`,`tabel_atlet`.`id_atlet`
                                    FROM `tabel_detail` JOIN `tabel_atlet` 
                                    ON `tabel_detail`.`id` = `tabel_atlet`.`id_atlet`
                                    WHERE `tabel_detail`.`id_jenis`= "' . $_GET['id_jenis'] . '"
                                    AND `tabel_detail`.`grup`= "' . $_GET['grup'] . '" ORDER BY `poin_rekap` DESC');
                                    while ($result = mysqli_fetch_array($data_cetak)) {
                                ?>

                                        <tr>
                                            <input type="hidden" value="<?= $result['id_atlet'] ?>" name="id_atlet[]">
                                            <td rowspan=2 class="text-center"><br><?= $result['nama_atlet'] ?></td>
											<td rowspan=2 class="text-center"><br><?= $result['kontingen'] ?></td>
                                            <td rowspan=2 class="text-center"><br><?= $result['grup'] ?></td>
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