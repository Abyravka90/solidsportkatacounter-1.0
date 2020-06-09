<?php
include 'config/database.php';
include 'assets/_partials/head.php';
$sql_technic = "SELECT nilai_technic FROM `point` ORDER BY nilai_technic DESC LIMIT 3";
$sql_athletic = "SELECT nilai_athletic FROM `point` ORDER BY nilai_athletic DESC LIMIT 3";

$i = 1;
$sql = "SELECT * FROM `point` ";
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
if ($result2 = $mysqli->query($sql)) {
  while ($obj3 = $result2->fetch_object()) {
    $nama_atlet = $obj3->nama_atlet;
  }
}
$total_nilai_semua = $total_nilai_athletic + $total_nilai_technic;

?>

<!-- Masthead -->
<style>
  body {
  overflow: hidden;
  }

  image {
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .blink {
    animation: blink-animation 1s steps(5, start) infinite;
    -webkit-animation: blink-animation 1s steps(5, start) infinite;
  }

  @keyframes blink-animation {
    to {
      visibility: hidden;
    }
  }

  @-webkit-keyframes blink-animation {
    to {
      visibility: hidden;
    }
  }
</style>
<header class="masthead" id="masthead">
  <h1>
    <marquee class="text-black" bgcolor="#ffffff" id="arena" onmouseover="this.stop()" behavior="alternate" onmouseout="this.start()"></marquee>
  </h1>
  <br><br>
  <div class="row">
    <div class="container">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;<br><img src="assets/img/solid.png" height="200px" width="300px" alt="solid sports organizer"></img>
      <br><br>
      <div class="table-responsive">
        <a href="http://localhost/beranda.php" class="form-group btn btn-light">Go Dashboard </a>
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th style="font-size:50px" class="text-center">Nama Atlet</th>
              <th style="font-size:50px" class="text-center">Kontingen</th>
              <th style="font-size:50px" class="text-center">Point Rekap</th>
            </tr>
          </thead>
          <tbody>


            <?php
            $rekapan = mysqli_query($mysqli, 'SELECT * FROM `tabel_atlet` WHERE `pertandingan_ke` = "' . $_GET['pertandingan_ke'] . '" ORDER BY `poin_rekap`  DESC');
            while ($result = mysqli_fetch_array($rekapan)) {
            ?>

              <tr>
                <td style="font-size:50px" class="text-center"><?php if ($result['atribut'] == 'aka') echo '<div class="bg-danger">'.$result['nama_atlet'].'</div>';
                                                                else echo '<div class="bg-info">'.$result['nama_atlet'].'</div>'; ?> </td>
                <td style="font-size:50px" class="text-center"><?= $result['kontingen'] ?> </td>
                <td style="font-size:50px" class="text-center"><?= $result['poin_rekap'] ?> </td>
              </tr>

            <?php
              $i++;
            }
            ?>
            <!--    -->


          </tbody>
        </table>

      </div>
      <br>
    </div>
  </div>


</header>
<script>
  var kedipan = 1;
  var dumet = setInterval(function() {
    var ele = document.getElementById('textkedip');
    ele.style.visibility = ele.style.visibility == 'hidden' ? '' : 'hidden';
  }, kedipan);
</script>
<!-- Point Modal-->