<?php 
include '../../koneksi.php';
$isi = $_POST['isi'];
$penulis 	= $_POST['penulis'];
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d H:i:s");

if (isset($_POST['simpan'])){
	$qInsertFeed = mysqli_query($con, "INSERT into testimoni (id_testimoni,id_user,isi,tanggal) values (NULL, '$penulis','$isi','$tanggal')");
	if ($qInsertFeed){
		header('location: ../testimoni.php');
	}
} else if (isset($_POST['perbarui'])){
	$qInsertFeed = mysqli_query($con, "UPDATE testimoni set isi = '$isi', tanggal = '$tanggal' where id_user = '$penulis'");
	if ($qInsertFeed){
		header('location: ../testimoni.php');
	}
} 
?>