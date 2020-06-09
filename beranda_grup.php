<?php
include 'config/database.php';
include 'assets/_partials/head.php';
?>

<!-- Masthead -->
<style>
  body {
    overflow: hidden;
    /* Hide scrollbars */
  }
</style>

<header class="masthead" id="masthead">
  <h3>
    <marquee class="text-black" bgcolor="#ffffff" id="arena" onmouseover="this.stop()" behavior="alternate" onmouseout="this.start()"></marquee>
  </h3>
  <br><br>
  <div class="row">
    <div class="col-md-5">
      <div class="container">
        <h1 id="nilai_keseluruhan" style="font-family:Arial, Helvetica, sans-serif;font-size:230;color:#fff"></h1>

      </div>
    </div>
    <div class="col-md-7 ">
      <div class="card-header">
        <div class="text-uppercase text-white font-weight-bold" style="font-size:100;" id="nama_atlet"></div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <h2 class="text-uppercase text-white font-weight-bold" id="kata_dimainkan"></h2>
          <h2><span class="text-uppercase text-white font-weight-bold"><span id="kontingen" class="badge badge-info"></span></h2>
        </div>
        <div class="col-md-3">
          <form action="table_point_group.php" method="get">
            <div id="grup"></div>
            <input type="submit" class="form-group btn btn-danger" value="Rekapitulasi Poin Tatami">
          </form>
        </div>
        <div class="col-md-3">
          <img src="assets/img/solid.png" height="130px" width="200px" alt="solid sports organizer"></img><br><br><br>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <table border="2" class="table table-sm table-dark">
          <tbody>
            <tr class="bg-dark text-center" id="penilai"></tr>
            <tr class="bg-danger text-center" id="nilai_technic"></tr>
            <tr class="bg-info text-center" id="nilai_athletic"></tr>
          </tbody>
        </table>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h1><span class="text-white">ket : </span>&nbsp;&nbsp;</h1>
        <h1 class="bg-danger text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
        <h1>&nbsp;&nbsp;<span class="text-white">tec</span>&nbsp;&nbsp;</h1>
        <h1 class="bg-info text-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
        <h1>&nbsp;&nbsp;<span class="text-white">ath</span></h1>

      </div>
    </div>

  </div>
  </div>


</header>
<!-- Bootstrap core JavaScript -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Plugin JavaScript -->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Custom scripts for this template -->
<script src="assets/js/creative.min.js"></script>
<!-- Javascript untuk tampil -->
<script src="assets/js/jquery-3.4.1.js"></script>
<!--Javascript yang diambil dari SB-admin-->
<script src="assets/chart.js/Chart.min.js"></script>
<script src="assets/datatables/jquery.dataTables.js"></script>
<script src="assets/datatables/dataTables.bootstrap4.js"></script>
<script src="js/sb-admin.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<script>
  $(document).ready(function() {
    selesai();
  });

  function selesai() {
    setTimeout(function() {
      update();
      selesai();
    }, 2);
  }

  function update() {
    $.getJSON("tampil_nilai_config.php", function(data) {
      $("arena").empty();
      $.each(data.hasil4, function() {
        $("#arena").html("" + this["arena"] + " | " + this["kelas"] + "</span>");
      });
    });
    $.getJSON("tampil_nilai_technic.php", function(data) {
      $("#id_atlet").empty();
      $("#nama_atlet").empty();
      $("#kata_dimainkan").empty();
      $("#kontingen").empty();
      $("#penilai").empty();
      $("#nilai_technic").empty();
      $("#nilai_athletic").empty();
      $("#grup").empty();
      $("#pertandingan_ke").empty();
      $.each(data.hasil, function() {
        var atribut = "" + this["atribut"] + "";
        if (atribut == "aka") {
          $("#nama_atlet").html(
            '<div class="bg-danger">' + this["nama_atlet"] + "</div>"
          );
        } else {
          $("#nama_atlet").html(
            '<div class="bg-info">' + this["nama_atlet"] + "</div>"
          );
        }
        $("#id_atlet").html("<h1>" + this["id_atlet"] + "</h1>");
        $("#kata_dimainkan").html(
          '<td> Memainkan KATA : <span class="badge badge-danger">' +
          this["kata_dimainkan"] +
          "</span></td>"
        );
        $("#kontingen").html("Kontingen : " + this["kontingen"] + "");
        $("#penilai").append("<td style='font-family:Arial, Helvetica, sans-serif;font-size:100;color:#fff'>" + this["penilai"] + "</td>");
        $("#nilai_technic").append("<td style='font-family:Arial, Helvetica, sans-serif;font-size:90;color:#fff' >" + this["nilai_technic"] + "</td>");
        $("#nilai_athletic").append("<td style='font-family:Arial, Helvetica, sans-serif;font-size:90;color:#fff' >" + this["nilai_athletic"] + "</td>");
        $("#grup").html(
          '<input type="hidden" name="grup" value="' + this["grup"] + '">'
        );
        $("#pertandingan_ke").html(
          '<input type="hidden" name="pertandingan_ke" value="' +
          this["pertandingan_ke"] +
          '">'
        );
      });
    });

    $.getJSON("tampil_nilai_keseluruhan.php", function(data) {
      $("nilai_keseluruhan").empty();
      $("#subtotal_nilai_technic").empty();
      $("#total_nilai_technic").empty();
      $("#subtotal_nilai_athletic").empty();
      $("#total_nilai_athletic").empty();
      $.each(data.hasil3, function() {
        $("#tampil_subtotal_technic").html(
          "" + this["subtotal_nilai_technic"] + ""
        );
        $("#tampil_total_technic").html("" + this["nilai_technic"] + "");
        $("#tampil_subtotal_athletic").html(
          "" + this["subtotal_nilai_athletic"] + ""
        );
        $("#tampil_total_athletic").html("" + this["nilai_athletic"] + "");
        var atribut = "" + this["atribut"] + "";
        var total = +this["total"];
        if (atribut == "aka") {
          if (total == 7) {
            $("#nilai_keseluruhan").html(
              '<div class="bg-danger">' +
              this["nilai_keseluruhan"] +
              "</div>"
            );
          } else {
            $("#nilai_keseluruhan").html(
              '<div class="bg-danger">&nbsp;</div>'
            );
          }
        } else {
          if (total == 7) {
            $("#nilai_keseluruhan").html(
              '<div class="bg-info">' +
              this["nilai_keseluruhan"] +
              "</div>"
            );
          } else {
            $("#nilai_keseluruhan").html('<div class="bg-info">&nbsp;</div>');
          }
        }
      });
    });
  }
</script>