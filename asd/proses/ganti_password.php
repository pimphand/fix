<?php 
include '../../koneksi.php';
include_once '../../include/fungsi/enkripsi.php';

$id = $_POST['id'];
$pass_lama = enkripsi($_POST['pass_lama']);
$pass_baru = enkripsi($_POST['pass_baru']);
$repass_baru = enkripsi($_POST['repass_baru']);


if (isset($_POST['ganti'])){
	$cariplama = mysqli_query($con,"SELECT * from user where password = '$pass_lama' and id_user = '$id' limit 1");
	$ketemu = mysqli_num_rows($cariplama);

	if ($ketemu){
		if ($pass_baru == $repass_baru){
			mysqli_query($con, "UPDATE user set password = '$repass_baru' where id_user = '$id'");
			header('location: ../ganti_password.php?info='.enkripsi('sukses'));
		} else {
			header('location: ../ganti_password.php?info='.enkripsi('password_tidak_sama'));
		}
	} else {
		header('location: ../ganti_password.php?info='.enkripsi('password_lama_salah'));
	}
}

?>