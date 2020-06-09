$ (document).ready (function () {
  selesai ();
});

function selesai () {
  setTimeout (function () {
    update ();
    selesai ();
  }, 200);
}

function update () {
  $.getJSON ('json_data_pertandingan.php', function (data) {
    $ ('#nama_atlet').empty ();
    $ ('#kata_dimainkan').empty ();
    $ ('#kontingen').empty ();
    $ ('#atribut').empty ();
    $ ('#nilai_technic').empty ();
    $ ('#id_atlet').empty ();
    $.each (data.hasil, function () {
      $ ('#nama_atlet').html (
        'Nama Atlet : <br/><input class="form-control" type="text" name="nama_atlet" value="' +
          this['nama_atlet'] +
          '"readonly>'
      );
      $ ('#id_atlet').html (
        '<input type="hidden" name="id_atlet" value="' +
          this['id_atlet'] +
          '"readonly>'
      );
      $ ('#kata_dimainkan').html ('' + this['kata_dimainkan'] + '');
      $ ('#kontingen').html ('' + this['kontingen'] + '');
      $ ('#atribut').html ('' + this['atribut'] + '');
      $ ('#nilai_technic').html ('' + this['nilai_technic'] + '');
    });
  });
}
