$( document ).ready( function () {
    selesai();
} );

function selesai() {
    setTimeout( function () {
        update();
        selesai();
    }, 2 );
}

function update() {
    $.getJSON( 'tampil_nilai_config.php', function ( data ) {
        $( 'arena' ).empty();
        $.each( data.hasil4, function () {
            $( '#arena' ).html(
                '' + this[ 'arena' ] + ' | ' + this[ 'kelas' ] + '</span>'
            );
        } );
    } );
	$.getJSON( 'tampil_rekap_nilai_keseluruhan.php', function ( data ) {
    $( '#nama_atlet_rekap' ).empty();
    $( '#kontingen_rekap' ).empty();
    $( '#point_rekap' ).empty();
    $.each( data.rekap, function () {
		var atribut = '' + this[ 'atribut' ] + '';
            if ( atribut == 'aka' )
            {
                $( '#nama_atlet_rekap' ).append(
                    '<div class="bg-danger">' + this[ 'nama_atlet' ] + '</div>'
                );
            } else
            {
                $( '#nama_atlet_rekap' ).append(
                    '<div class="bg-info">' + this[ 'nama_atlet' ] + '</div>'
                );
            }
      $( '#atribut_rekap' ).append('<tr><td>' + this[ 'atribut' ] + '</tr></td>' );
      $( '#kontingen_rekap' ).append( '<tr><td>' + this[ 'kontingen' ] + '</td></tr>' );
      $( '#point_rekap' ).append( '<tr><td>' + this[ 'poin_rekap' ] + '</tr></td>' );
    } );
  } );
    $.getJSON( 'tampil_nilai_technic.php', function ( data ) {
        $( '#nama_atlet_final' ).empty();
        $( '#kata_dimainkan_final' ).empty();
        $( '#kontingen_final' ).empty();
        $.each( data.hasil, function () {
            var atribut = '' + this[ 'atribut' ] + '';
            if ( atribut == 'aka' )
            {
                $( '#nama_atlet_final' ).html(
                    '<div class="bg-danger">' + this[ 'nama_atlet' ] + '</div>'
                );
            } else
            {
                $( '#nama_atlet_final' ).html(
                    '<div class="bg-info">' + this[ 'nama_atlet' ] + '</div>'
                );
            }
            $( '#kata_dimainkan_final' ).html(
                '<td> Memainkan KATA : <span class="badge badge-danger">' +
                this[ 'kata_dimainkan' ] +
                '</span></td>'
            );
            $( '#kontingen_final' ).html( '<td>Kontingen : ' + this[ 'kontingen' ] + '</td>' );
        } );
    } );

}
