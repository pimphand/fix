<?php
include '../../koneksi.php';


$judul = $_POST['judul'];

$kode = $_POST['sc'];

if (isset($_POST['kirim'])){
	  $query = mysqli_query($con, "INSERT INTO iklan (id_iklan, judul, kode)
	            VALUES(null, '$judul','$kode')");
	  if ($query){
	  	header('location: ../iklan.php?info=sukses');
	  }
}
        
        	


?>