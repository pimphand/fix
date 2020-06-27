<?php include '../../koneksi.php';
	include '../../include/fungsi/format_tanggal.php';
	include '../../include/fungsi/enkripsi.php';
	$isi_komentar = $_POST['isi_komentar'];
	$komentator = $_POST['komentator'];
	$id_feed 	= $_POST['id_feed'];
	$qTampilFeed = mysqli_query ($con, "SELECT * From feed where id_feed='$id_feed'");
	$dTampilFeed = mysqli_fetch_array($qTampilFeed);

	date_default_timezone_set("Asia/Jakarta");
	$tanggal = date("Y-m-d H:i:s");
	$simpan = mysqli_query($con,"INSERT into komentar set isi = '$isi_komentar',id_post='$dTampilFeed[id_feed]',id_user='$komentator',tanggal='$tanggal'");
	if ($simpan){
		include_once 'komentar.php';
	}

?>