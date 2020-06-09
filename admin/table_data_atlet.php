<?php
include_once '../config/database.php';
$data_atlet = mysqli_query($mysqli, 'SELECT * FROM `tabel_atlet` ORDER BY `poin_rekap` DESC ');
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
                <form action="proses_edit_data_atlet.php" name="data_pertandingan" method="post">
                    <button type="button" id="selectAll" class="btn btn-dark"> <span class="sub"></span> Select All</button><br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered example" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><button type="button" name="btn_delete" id="btn_delete" class="btn btn-danger"><i class="fas fa-user-times"></i></button></th>
                                    <th>No</th>
                                    <th>Nama Atlit</th>
                                    <th>Kontingen</th>
                                    <th>Kata yang dimainkan</th>
                                    <th>Atribut</th>
                                    <th>Pertandingan Ke</th>
                                    <th>Poin Rekap</th>

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
                                while ($result = mysqli_fetch_array($data_atlet)) { ?>
                                    <tr>
                                        <input type="hidden" value="<?= $result['id_atlet'] ?>" name="id_atlet[]">
                                        <td><input type="checkbox" name="customer_id[]" class="delete_customer form-control" value="<?= $result['id_atlet'] ?>" /></td>
                                        <td> <?= $i ?></td>
                                        <td> <input class="form-control" type="text" name="nama_atlet[]" value="<?= $result['nama_atlet'] ?>"></td>
                                        <td> <input class="form-control" type="text" name="kontingen[]" value="<?= $result['kontingen'] ?>"></td>
                                        <td> <input class="form-control" type="text" name="kata[]" value="<?= $result['kata_dimainkan'] ?>"></td>
                                        <td> <select class="text-white custom-select <?php if ($result['atribut'] == 'aka') echo 'bg-danger';
                                                                                        else echo 'bg-info'; ?>" name="atribut[]" id="">
                                                <option class="bg-danger text-white" value="aka" <?php if ($result['atribut'] == 'aka') echo 'selected' ?>>AKA
                                                </option>
                                                <option class="bg-info text-white" value="ao" <?php if ($result['atribut'] == 'ao') echo 'selected' ?>>AO</option>
                                            </select></td>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control" min=0 max=12 type="number" name="pertandingan_ke[]" id="" value="<?= $result['pertandingan_ke'] ?>">
                                            </div>
                                        </td>
                                        <td> <?= $result['poin_rekap'] ?> </td>

                                    </tr>

                                <?php $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <input name="simpan" class="btn btn-info" type="submit" value="Update">
                        <a href="tampil_cetak_data_point_atlet.php" value="Rekap Point" class="btn btn-success"><i class="fas fa-print"></i>&nbsp;Rekap Point</a>
                        <a href="reset_data_poin_rekap_head_to_head.php" class="btn btn-danger"><i class="fas fa-redo-alt"></i>&nbsp;Reset Poin Rekap</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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

<script>
    $(document).ready(function() {

        $('#btn_delete').click(function() {

            if (confirm("Are you sure you want to delete this?")) {
                var id = [];

                $(':checkbox:checked').each(function(i) {
                    id[i] = $(this).val();
                });

                if (id.length === 0) //tell you if the array is empty
                {
                    alert("Please Select atleast one checkbox");
                } else {
                    $.ajax({
                        url: 'hapus_data_atlet.php',
                        method: 'POST',
                        data: {
                            id: id
                        },
                        success: function() {
                            for (var i = 0; i < id.length; i++) {
                                $('tr#' + id[i] + '').css('background-color', '#ccc');
                                $('tr#' + id[i] + '').fadeOut('slow');
                            }
                        }

                    });
                }

            } else {
                return false;
            }
        });

    });
</script>