<?php 
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';

$id=deskripsi($_GET['id']);
$jadiadmin = mysqli_query($con,"UPDATE user set level = 2 where id_user = '$id'");
if($jadiadmin){
	//header('location: ../anggota.php');
	echo "<script>
		//window.location = document.referrer + '?aksi=hapus_sukses';
		window.history.back();
	</script>";
} 

?>