<?php
//delete.php
$connect = mysqli_connect("localhost", "root", "", "katasolid");
if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM tabel_record WHERE id_atlet = '".$id."'";
  mysqli_query($connect, $query);
 } 
}
?>