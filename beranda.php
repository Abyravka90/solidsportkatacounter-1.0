<?php
include 'config/database.php';
include 'assets/_partials/head.php';
$sql_technic = "SELECT nilai_technic FROM `point` ORDER BY nilai_technic DESC LIMIT 3";
$sql_athletic = "SELECT nilai_athletic FROM `point` ORDER BY nilai_athletic DESC LIMIT 3";
?>
<!-- Masthead -->
<style>
  body {
    overflow: hidden;
    /* Hide scrollbars */
  }
</style>
<header class="masthead" id="masthead">
  <h1>
    <marquee class="text-black" bgcolor="#ffffff" id="arena" onmouseover="this.stop()" behavior="alternate" onmouseout="this.start()"></marquee>
  </h1>
  <br><br>
  <div class="row">
    <div class="col-md-5">
      <div class="container">
        <div class="card text-center">
          <div class="card-body">
            <h6 class="text-uppercase text-black font-weight-bold" style="font-size:50;">- Bronze Medal Match - </h6>
          </div>
        </div> <br>
      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/img/solid.png" height="300px" width="500px" alt="solid sports organizer"></img>
    </div>
    <div class="col-md-7 ">
      <div class="container">
        <div class="card text-center">
          <div class="card-header">
            <div class="text-uppercase text-white font-weight-bold" style="font-size:100;" id="nama_atlet"></div>
          </div>
          <div class="card-body">
            <h2 class="text-uppercase text-black font-weight-bold" id="kata_dimainkan"></h2>
          </div>
          <div class="card-footer text-muted">
            <h2 class="text-uppercase text-black font-weight-bold" id="kontingen"> </h2>
          </div>
        </div>
		   <br>
      <form action="tabel_point_head_to_head.php" method="get">
        <div id="pertandingan_ke"></div>
        <input type="submit" class="form-group btn btn-danger" value="Rekapitulasi Poin Tatami">
      </form>
      </div>
   
    </div>
  </div>
<?php include 'assets/_partials/footer.php'; ?>

</header>
