<?php 
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';

$id=deskripsi($_GET['id']);
$judul = mysqli_query($con,"select * feed where id_feed = '$id'");
$j      = mysqli_fetch_array($judul);
$q      = $j['judul'];
$hapus_komentar = mysqli_query($con,"DELETE from komentar where id_post = '$id'");
$hapus_feed = mysqli_query($con,"DELETE from feed where id_feed = '$id'");
if($hapus_feed){
	header("location: ../forum.php?aksi=sukses");
	
}

?>