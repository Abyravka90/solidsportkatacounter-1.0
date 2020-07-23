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
                <form action="proses_edit_data_atlet_grup.php" name="data_pertandingan" method="post">
                    <div class="table-responsive">
					<button type="button" id="selectAll" class="btn btn-dark"> <span class="sub"></span> Select All</button><br><br>
                        <table class="table table-bordered example" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
									<th><button type="button" name="btn_delete" id="btn_delete" class="btn btn-danger"><i class="fas fa-user-times"></i></button></th>
                                    <th>No</th>
                                    <th>Nama Atlit</th>
                                    <th>Kontingen</th>
                                    <th>Kata yang dimainkan</th>
                                    <th>Atribut</th>
                                    <th>Group</th>
                                    <th>Urutan Pertandingan</th>
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
                                    $data_atlet = mysqli_query($mysqli, 'SELECT * FROM tabel_atlet  WHERE `tabel_atlet`.`grup`= "' . $_GET['grup'] . '"');
                                    while ($result = mysqli_fetch_array($data_atlet)) {
                                ?>
                                        <tr>
                                            <input type="hidden" value="<?= $result['id_atlet'] ?>" name="id_atlet[]">
											<td><input type="checkbox" name="customer_id[]" class="delete_customer form-control" value="<?= $result['id_atlet'] ?>" /></td>
                                            <td> <?= $i ?></td>
                                            <td> <input class="form-control text-center" type="text" name="nama_atlet[]" value="<?= $result['nama_atlet'] ?>"></td>
                                            <td> <input class="form-control text-center" type="text" name="kontingen[]" value="<?= $result['kontingen'] ?>"></td>
                                            <td> <input class="form-control text-center" type="text" name="kata_dimainkan[]" value="<?= $result['kata_dimainkan'] ?>"></td>
                                            <td> <select class="text-white custom-select text-center <?php if ($result['atribut'] == 'aka') echo 'bg-danger';
                                                                                                        else echo 'bg-info'; ?>" name="atribut[]" id="">
                                                    <option class="bg-danger text-white" value="aka" <?php if ($result['atribut'] == 'aka') echo 'selected' ?>>AKA
                                                    </option>
                                                    <option class="bg-info text-white" value="ao" <?php if ($result['atribut'] == 'ao') echo 'selected' ?>>AO</option>
                                                </select></td>
                                            <td>
                                                <div class="form-group">
                                                    <input class="form-control text-center" type="text" name="grup[]" id="" value="<?= $result['grup'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input class="form-control text-center" min=0 max=12 type="number" name="pertandingan_ke[]" id="" value="<?= $result['pertandingan_ke'] ?>">
                                                </div>
                                            </td>
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
                        <input name="simpan" class="btn btn-primary" type="submit" value="Update">
                        <?php
                        if (isset($_GET['grup'])) {
                            $data_atlet = mysqli_query($mysqli, 'SELECT * FROM tabel_atlet  WHERE `tabel_atlet`.`grup`= "' . $_GET['grup'] . '"  ORDER BY `nama_atlet` DESC LIMIT 1 ');
                            while ($result = mysqli_fetch_array($data_atlet)) {
                        ?>
						<a href="tampil_cetak_data_point.php?id_jenis=1&&grup=<?= $result['grup'] ?>" value="Rekap Point" class="btn btn-success"><i class="fas fa-print"></i>&nbsp;Rekap Point</a>
                        <a href="reset_data_poin_rekap.php?grup=<?= $result['grup'] ?>" class="btn btn-danger"><i class="fas fa-redo-alt"></i>&nbsp;Reset Poin Rekap</a>
                        <?php
                                $i++;
                            }
                        } else {
                        }
                        ?>

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
$(document).ready(function(){
 
 $('#btn_delete').click(function(){
  
  if(confirm("Are you sure you want to delete this?"))
  {
   var id = [];
   
   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length === 0) //tell you if the array is empty
   {
    alert("Please Select atleast one checkbox");
   }
   else
   {
    $.ajax({
     url:'hapus_data_atlet_grup.php',
     method:'POST',
     data:{id:id},
     success:function()
     {
      for(var i=0; i<id.length; i++)
      {
       $('tr#'+id[i]+'').css('background-color', '#ccc');
       $('tr#'+id[i]+'').fadeOut('slow');
      }
     }
     
    });
   }
   
  }
  else
  {
   return false;
  }
 });
 
});
</script>