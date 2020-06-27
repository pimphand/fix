<?php 
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';

$id=base64_decode($_GET['id']);
$qmateri = mysqli_query($con,"SELECT * FROM materi where id_materi = '$id'");
$dmateri = mysqli_fetch_array($qmateri);
unlink('../materi/'.$dmateri['materi']);
$hapus_materi = mysqli_query($con,"DELETE from materi where id_materi = '$id'");
if($hapus_materi){
	//header('location: ../publikasi.php?halaman='.enkripsi('publikasi'));
	
	echo "<script>
	    window.location = document.referrer + '?aksi=hapus_sukses';
	</script>";
	
}

?>