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
  $.getJSON('tampil_nilai_config.php', function(data) {
    $('arena').empty();
    $.each(data.hasil4, function() {
      $('#arena').html('' + this['arena'] + ' | ' + this['kelas'] + '</span>');
    });
  });
  $.getJSON('tampil_nilai_technic.php', function(data) {
    $('#id_atlet').empty();
    $('#nama_atlet').empty();
    $('#kata_dimainkan').empty();
    $('#kontingen').empty();
    $('#nilai_technic').empty();
    $('#grup').empty();
    $('#pertandingan_ke').empty();
    $.each(data.hasil, function() {
      var atribut = '' + this[ 'atribut' ] + '';
      if ( atribut == 'aka' )
      {
        $('#nama_atlet' ).html(
          '<div class="bg-danger">' + this[ 'nama_atlet' ] + '</div>'
        );
      } else
      {
        $( '#nama_atlet' ).html(
          '<div class="bg-info">' + this[ 'nama_atlet' ] + '</div>'
        );
      }
      $('#id_atlet').html('<h1>' + this['id_atlet'] + '</h1>');
      $('#kata_dimainkan').html(
        '<td> Memainkan KATA : <span class="badge badge-danger">' +
          this['kata_dimainkan'] +
          '</span></td>'
      );
      $('#kontingen').html('<td>Kontingen : ' + this['kontingen'] + '</td>');
      $('#nilai_technic').append('<td>' + this['nilai_technic'] + '</td>');
      $('#grup').html('<input type="hidden" name="grup" value="' + this['grup'] + '">');
      $('#pertandingan').html('<input type="text" name="pertandingan_ke" value="' + this['pertandingan_ke'] + '">');
    });
  });
  $.getJSON('tampil_rekap_nilai_keseluruhan.php', function(data) {
    $('#nama_atlet_rekap').empty();
    $('#kontingen_rekap').empty();
	$('#atribut_rekap').empty();
    $('#point_rekap').empty();
    $.each(data.rekap, function() {
      var atribut = '' + this['atribut'] + '';
      if (atribut == 'aka') {
        $('#nama_atlet_rekap').append(
          '<div class="bg-danger">' + this['nama_atlet'] + '</div>'
        );
      } else {
        $('#nama_atlet_rekap').append(
          '<div class="bg-info">' + this['nama_atlet'] + '</div>'
        );
      }
      $('#atribut_rekap').append('<div>' + this['atribut'] + '</div>');
      $('#kontingen_rekap').append(
        '<div>' + this['kontingen'] + '</div>'
      );
      $('#point_rekap').append('<div>' + this['poin_rekap'] + '</div>');
    });
  });
  $.getJSON('tampil_nilai_athletic.php', function(data) {
    $('#nilai_athletic').empty();
    $.each(data.hasil2, function() {
      $('#nilai_athletic').append('<td>' + this['nilai_athletic'] + '</td>');
    });
  });
  $.getJSON('tampil_nilai_keseluruhan.php', function(data) {
    $('nilai_keseluruhan').empty();
    $('#subtotal_nilai_technic').empty();
    $('#total_nilai_technic').empty();
    $('#subtotal_nilai_athletic').empty();
    $('#total_nilai_athletic').empty();
    $.each(data.hasil3, function() {
      $('#tampil_subtotal_technic').html(
        '' + this['subtotal_nilai_technic'] + ''
      );
      $('#tampil_total_technic').html('' + this['nilai_technic'] + '');
      $('#tampil_subtotal_athletic').html(
        '' + this['subtotal_nilai_athletic'] + ''
      );
      $('#tampil_total_athletic').html('' + this['nilai_athletic'] + '');
      var atribut = '' + this['atribut'] + '';
      var total = +this['total'];
      if (atribut == 'aka') {
        if (total == 7) {
          $('#nilai_keseluruhan').html(
            '<div class="bg-danger"><div id="textkedip">' +
              this['nilai_keseluruhan'] +
              '</div></div>'
          );
        } else {
          $('#nilai_keseluruhan').html(
            '<div class="bg-danger">' + this['nilai_keseluruhan'] + '</div>'
          );
        }
      } else {
        if (total == 7) {
          $('#nilai_keseluruhan').html(
            '<div class="bg-info"><div id="textkedip">' +
              this['nilai_keseluruhan'] +
              '</div></div>'
          );
        } else {
          $('#nilai_keseluruhan').html(
            '<div class="bg-info">' + this['nilai_keseluruhan'] + '</div>'
          );
        }
      }
    });
  });
}
