<?php
include_once '../config/database.php';
$i = 1;
if (isset($_POST['simpanHasilTanding'])){
    
    include '../config/database.php';
$sql_technic = "SELECT nilai_technic FROM `point` ORDER BY nilai_technic DESC LIMIT 3";
$sql_athletic = "SELECT nilai_athletic FROM `point` ORDER BY nilai_athletic DESC LIMIT 3";
$sql_atribut = "SELECT distinct id_atlet, nama_atlet, kontingen, pertandingan_ke, grup FROM `point` ";//ini adalah query untuk mengambil semua value dari tabel poin untuk selanjutnya datanya diinsert ke table tabel_record
$sql_dihitung = "SELECT SUM(dinilai) as total FROM `point`";//menghitung jumlah Juri yang menilai pada setiap pertandingan
if ($result = $mysqli->query($sql_technic)) {
    while ($obj = $result->fetch_object()) {
        $subtotal_nilai_technic[] = $obj->nilai_technic;
    }
    $total_nilai_technic = 0.7 * array_sum($subtotal_nilai_technic);
}
if ($hasil = $mysqli->query($sql_athletic)) {
    while ($obj1 = $hasil->fetch_object()) {
        $subtotal_nilai_athletic[] = $obj1->nilai_athletic;
    }
    $total_nilai_athletic = 0.3 * array_sum($subtotal_nilai_athletic);
}
if ($atlet = $mysqli->query($sql_atribut)){
    while($obj3 = $atlet->fetch_object()){
        $id_atlet = $obj3->id_atlet;
        $nama_atlet = $obj3->nama_atlet;
        $kontingen = $obj3->kontingen;
        $pertandingan_ke = $obj3->pertandingan_ke;
        $grup = $obj3->grup;
    }
}
if ($hitung_juri_menilai = $mysqli->query($sql_dihitung)){
    while($obj4 = $hitung_juri_menilai->fetch_object()){
        $total_juri_menilai = $obj4->total;
    }
}
$total_nilai_semua = number_format($total_nilai_athletic + $total_nilai_technic, 2);
if($total_juri_menilai==7){
    $sql_record = "INSERT INTO tabel_record (id_atlet, nama_atlet, kontingen, grup, pertandingan_ke, nilai_keseluruhan) VALUES ('".$id_atlet."','".$nama_atlet."','".$kontingen."','".$grup."','".$pertandingan_ke."','".$total_nilai_semua."')";
    $result = $mysqli->query($sql_record);
    if ($result){
        echo '<div class="container card"><div class="card-body"><div class="alert alert-success alert-dismissable fade show" role="alert"> Data Pertandingan Berhasil Disimpan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div></div></div>';
    }else{echo 'failed';}
}else if($total_juri_menilai==0){
    echo '<div class="container card"><div class="card-body"><div class="alert alert-warning alert-dismissable fade show" role="alert"> Belum ada pertandingan yang aktif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div></div></div>';
}
else{
    echo '<div class="container card"><div class="card-body"><div class="alert alert-warning alert-dismissable fade show" role="alert"> Belum ada pertandingan yang aktif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div></div></div>';
}//kalau semua juri sudah menilai maka masukan datanya

}
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

                    <input type="submit"  value="proses" class="btn btn-secondary">
                    <br /><br />
                </form>
                
                <form action="" method="post">
                    <input type="hidden" name="simpanHasilTanding" value="save">
                    <button type="submit" name="simpan" class="btn btn-success">Save Hasil Pertandingan &nbsp;<i class="fa fa-file"></i></button>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NamaAtlitBertanding</th>
                                <th>Kontingen</th>
                                <th>Kata yang dimainkan</th>
                                <th>Atribut</th>
                                <th>Group</th>
                                <th>Proses</th>
                                <th>Urutan</th>
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