<div class="container card">
    <br>
    <div class="card card-header">
        <i class="fas fa-table"></i>
        Data Atlet</div>

    <div class="container-fluid">
        <!-- isi kontennya disini -->
        <form method="get" name="frm" action="">
            <label for="jumlah"> Masukan Jumlah Peserta yang akan bertanding</label>
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <input class="form-control" name="jumlah" type="text" />
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-info" name="btnJumlah" value="Ok" />
                </div>
            </div>
        </form>
        <form method="post" name="data_atlet" action="proses_simpan_data_atlet_grup.php">
            <div class="table-responsive">
                <input type="button" value="Hapus Form terpilih" onclick="deleteRow('dataTable')" class="btn btn-danger" />
                <button type="button" id="selectAll" class="btn btn-dark"> <span class="sub"></span> Select All</button><br><br>
                <table class="table table-bordered example" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>pilih</th>
                            <th>No</th>
                            <th>Nama Atlit</th>
                            <th>Kontingen</th>
                            <th>Kata yang dimainkan</th>
                            <th>Atribut</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        <?php
                        if (isset($_GET['jumlah']) && ($_GET['jumlah']) > 0) {
                            if ($_GET['jumlah'] > 0 && $_GET['jumlah'] <= 3) {
                                $jumlah_form = 'A';
                            } else if ($_GET['jumlah'] > 3 && $_GET['jumlah'] <= 24) {
                                $jumlah_form = 'B';
                            } else if ($_GET['jumlah'] > 24 && $_GET['jumlah'] <= 48) {
                                $jumlah_form = 'D';
                            } else if ($_GET['jumlah'] > 48 && $_GET['jumlah'] <= 96) {
                                $jumlah_form = 'H';
                            } else if ($_GET['jumlah'] > 96 && $_GET['jumlah'] <= 192) {
                                $jumlah_form = 'P';
                            } else if ($_GET['jumlah'] > 192) {
                                $jumlah_form = 'Y';
                            }
                        } else {
                            $jumlah_form = '';
                        }
                        for ($i = 'A'; $i <= $jumlah_form; $i++) {
                        ?>
                            <tr>
                                <input type="hidden" name="group" value="<?= $i ?>">
                                <td colspan="7" class="text-center">
                                    <h2><span class="badge badge-success"> Group <?= $i ?></span></h2>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="chk[]" id="chk_1" /></td>
                                <td>1</td>
                                <input type="hidden" name="pertandingan_ke[]" value="1">
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_atlet[]">
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
                                <td width=150>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA
                                        </option>
                                        <option class="bg-info" value="ao">AO</option>
                                    </select>
                                </td>
                                <input type="hidden" name="grup[]" value="<?= $i ?>">
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="chk[]" id="chk_1" /></td>
                                <td>2</td>
                                <input type="hidden" name="pertandingan_ke[]" value="2">
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_atlet[]">
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
                                <td width=150>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA
                                        </option>
                                        <option class="bg-info" value="ao">AO</option>
                                    </select>
                                </td>
                                <input type="hidden" name="grup[]" value="<?= $i ?>">
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="chk[]" id="chk_1" /></td>
                                <td>3</td>
                                <input type="hidden" name="pertandingan_ke[]" value="3">
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_atlet[]">
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
                                <td width=150>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA
                                        </option>
                                        <option class="bg-info" value="ao">AO</option>
                                    </select>
                                    <input type="hidden" name="grup[]" value="<?= $i ?>">
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="chk[]" id="chk_1" /></td>
                                <td>4</td>
                                <input type="hidden" name="pertandingan_ke[]" value="4">
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_atlet[]">
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
                                <td width=150>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA
                                        </option>
                                        <option class="bg-info" value="ao">AO</option>
                                    </select>
                                </td>
                                <input type="hidden" name="grup[]" value="<?= $i ?>">
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="chk[]" id="chk_1" /></td>
                                <td>5</td>
                                <input type="hidden" name="pertandingan_ke[]" value="5">
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_atlet[]">
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
                                <td width=150>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA
                                        </option>
                                        <option class="bg-info" value="ao">AO</option>
                                    </select>
                                </td>
                                <input type="hidden" name="grup[]" value="<?= $i ?>">
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="chk[]" id="chk_1" /></td>
                                <td>6</td>
                                <input type="hidden" name="pertandingan_ke[]" value="6">
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_atlet[]">
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
                                <td width=150>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA
                                        </option>
                                        <option class="bg-info" value="ao">AO</option>
                                    </select>
                                </td>
                                <input type="hidden" name="grup[]" value="<?= $i ?>">
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="chk[]" id="chk_1" /></td>
                                <td>7</td>
                                <input type="hidden" name="pertandingan_ke[]" value="7">
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_atlet[]">
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
                                <td width=150>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA
                                        </option>
                                        <option class="bg-info" value="ao">AO</option>
                                    </select>
                                </td>
                                <input type="hidden" name="grup[]" value="<?= $i ?>">
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="chk[]" id="chk_1" /></td>
                                <td>8</td>
                                <input type="hidden" name="pertandingan_ke[]" value="8">
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_atlet[]">
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
                                <td width=150>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA
                                        </option>
                                        <option class="bg-info" value="ao">AO</option>
                                    </select>
                                </td>
                                <input type="hidden" name="grup[]" value="<?= $i ?>">
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="chk[]" id="chk_1" /></td>
                                <td>9</td>
                                <input type="hidden" name="pertandingan_ke[]" value="9">
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_atlet[]">
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
                                <td width=150>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA
                                        </option>
                                        <option class="bg-info" value="ao">AO</option>
                                    </select>
                                </td>
                                <input type="hidden" name="grup[]" value="<?= $i ?>">
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="chk[]" id="chk_1" /></td>
                                <td>10</td>
                                <input type="hidden" name="pertandingan_ke[]" value="10">
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_atlet[]">
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
                                <td width=150>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA
                                        </option>
                                        <option class="bg-info" value="ao">AO</option>
                                    </select>
                                </td>
                                <input class="form-control" type="hidden" name="grup[]" value="<?= $i ?>">
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="chk[]" id="chk_1" /></td>
                                <td>11</td>
                                <input type="hidden" name="pertandingan_ke[]" value="11">
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_atlet[]">
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
                                <td width=150>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA
                                        </option>
                                        <option class="bg-info" value="ao">AO</option>
                                    </select>
                                </td>
                                <input type="hidden" name="grup[]" value="<?= $i ?>">
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="chk[]" id="chk_1" /></td>
                                <td>12</td>
                                <input type="hidden" name="pertandingan_ke[]" value="12">
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_atlet[]">
                                        <input class="form-control" type="text" name="nama_atlet[]">
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
                                <td width=150>
                                    <select class="custom-select" name="atribut[]">
                                        <option class="bg-danger" value="aka">AKA
                                        </option>
                                        <option class="bg-info" value="ao">AO</option>
                                    </select>
                                </td>
                                <input type="hidden" name="grup[]" value="<?= $i ?>">
                            </tr>



                        <?php

                        }
                        ?>
                    </tbody>
                    <!-- ini disubmit diluar perulangan-->
                    <input type="hidden" name="count" id="count" value="1">
                </table>
                <input type="submit" name="simpan" class="btn btn-primary" value="simpan" <?php if ($jumlah_form == '') {
                                                                                                echo 'disabled';
                                                                                            } ?>>
            </div>
        </form>
    </div>
    <!-- /.container-fluid -->
</div>
<script>
    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for (var i = 0; i < rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                var ids = row.cells[0].childNodes[0].id;
                if (null != chkbox && true == chkbox.checked) {
                    var count = document.getElementById('count').value;
                    var c = parseInt(count) - parseInt(1);
                    if (rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                    $('#count').val(c);
                }
            }
        } catch (e) {
            alert(e);
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('body').on('click', '#selectAll', function() {
            if ($(this).hasClass('allChecked')) {
                $('input[type="checkbox"]', '.example').prop('checked', false);
            } else {
                $('input[type="checkbox"]', '.example').prop('checked', true);
            }
            $(this).toggleClass('allChecked');
        })
    });
</script>