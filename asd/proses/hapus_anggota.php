<?php 
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';

$id=deskripsi($_GET['id']);
$qPost = mysqli_query ($con,"SELECT * from user where id_user = '$id'");
$dPost = mysqli_fetch_array($qPost);
unlink('../images/profil/'.$dPost['gambar']);
unlink('../images/profil/Original_'.$dPost['gambar']);
mysqli_query($con,"DELETE from testimoni where id_user = '$id'");
$hapus_user = mysqli_query($con,"DELETE from user where id_user = '$id'");
if($hapus_user){
	//header('location: ../anggota.php');
	echo "<script>
		window.location = document.referrer + '?aksi=hapus_sukses';
	</script>";
} 

?>