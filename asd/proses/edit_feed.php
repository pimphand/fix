<?php 
include_once '../../koneksi.php';
include_once '../../include/fungsi/format_tanggal.php';
include_once '../../include/fungsi/enkripsi.php';

$judul = addslashes($_POST['judul']);
$isi = addslashes($_POST['isi']);
$id = $_POST['id_feed'];

$edit = mysqli_query($con, "UPDATE feed set judul = '$judul', isi = '$isi' where id_feed = '$id'");

if ($edit){
    	header('location: ../forum.php?halaman=feed&id='.enkripsi($id));
}

?>