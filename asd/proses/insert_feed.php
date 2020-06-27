<?php 
include '../../koneksi.php';
$feed = $_POST['feed'];

if (isset($_POST['kirim'])){
	$qInsertFeed = mysqli_query($con, "INSERT into feed (id_feed,isi) values (NULL, '$feed')");
	if ($qInsertFeed){
		header('location: ../forum.php');
	}
}
?>