<?php include '../../../koneksi.php';
	include '../../../include/fungsi/format_tanggal.php';
	include '../../../include/fungsi/enkripsi.php';
	$feed = $_POST['feed'];
	$penulis = $_POST['penulis'];
	$judul = $_POST['judul'];
	date_default_timezone_set("Asia/Jakarta");
	$tanggal = date("Y-m-d H:i:s");
	$simpan = mysqli_query($con,"INSERT into feed set isi = '$feed',judul='$judul',id_user='$penulis',tanggal_feed='$tanggal'");
	if ($simpan){

		include_once '../feed_tampil.php';
	}

?>