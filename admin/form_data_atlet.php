<div class="container card">
    <br>
    <div class="card card-header">
        <i class="fas fa-table"></i>
        Data Atlet</div>

    <div class="container-fluid">
        <!-- isi kontennya disini -->
        <form method="get" name="frm" action="">
            <label for="jumlah"> Masukan Jumlah atlit yang akan bertanding</label>
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <input class="form-control" name="jumlah" type="text" />
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-info" name="btnJumlah" value="Ok" />
                </div>
            </div>
        </form>
        <form method="post" name="data_atlet" action="proses_simpan_data_atlet.php">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Atlit</th>
                            <th>Kontingen</th>
                            <th>Kata yang dimainkan</th>
                            <th>Atribut</th>
                            <th>Pertandingan Ke</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (isset($_GET['jumlah']) && ($_GET['jumlah']) > 0) {
                            $jumlah_form = $_GET['jumlah'];
                        } else {
                            $jumlah_form = 0;
                        }
                        for ($i = 1; $i <= $jumlah_form; $i++) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <div class="form-group">
                                      <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_siapa[]" id="nama_atlet">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="kontingen[]" id="kontingen">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="kata_dimainkan[]">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA(MERAH)
                                        </option>
                                        <option class="bg-info" value="ao">AO(BIRU)</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="pertandingan_ke[]" id="">
                                    </div>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                        <!-- ini disubmit diluar perulangan-->
                    </tbody>
                </table>
                <input type="submit" name="simpan" class="btn btn-primary" value="simpan" <?php if ($jumlah_form == 0) {
                                                                                                echo 'disabled';
                                                                                            } ?>>
            </div>
        </form>
    </div>
    <!-- /.container-fluid -->
</div>