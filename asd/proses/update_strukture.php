<?php 
include '../../koneksi.php';
include_once '../../include/fungsi/enkripsi.php';

$ketua 		= $_POST['ketua'];
$wakil 		= $_POST['wakil'];
$sek1		= $_POST['sekertaris_1'];
$sek2		= $_POST['sekertaris_2'];
$ben1		= $_POST['bendahara_1'];
$ben2 		= $_POST['bendahara_2'];

if (isset($_POST['update'])){
	mysqli_query ($con, "UPDATE struktur set id_user = $ketua where id_struktur = 1 ");
	mysqli_query ($con, "UPDATE struktur set id_user = $wakil where id_struktur = 2 ");
	mysqli_query ($con, "UPDATE struktur set id_user = $sek1 where id_struktur = 3 ");
	mysqli_query ($con, "UPDATE struktur set id_user = $sek2 where id_struktur = 4 ");
	mysqli_query ($con, "UPDATE struktur set id_user = $ben1 where id_struktur = 5 ");
	mysqli_query ($con, "UPDATE struktur set id_user = $ben2 where id_struktur = 6 ");

	header("location: ../struktur.php");
}




?>