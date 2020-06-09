 <form method="post" name="data_atlet" action="proses_simpan_data_pertandingan.php">

     echo '<div class="form-row align-items-center">
         <div class="cols-auto">
             <label for="nama_atlet[]">Nama Atlit</label>
             <input type="text" name="nama_atlet[]" id="nama_atlet">
         </div>
         <div class="cols-auto">
             <label for="kontingen[]">&nbsp;Kontingen</label>
             <input type="text" name="kontingen[]" id="kontingen">
         </div>
     </div>';

     <!-- ini disubmit diluar perulangan-->
     <input type="submit" class="btn btn-primary" value="simpan">

 </form>