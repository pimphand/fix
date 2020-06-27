<?php 
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';

$id=base64_decode($_GET['id']);
$qPost = mysqli_query ($con,"SELECT * from post where id_post = '$id'");
$dPost = mysqli_fetch_array($qPost);
if ($dPost['gambar'] == 'default.jpg'){
    
} else {
unlink('../images/post/'.$dPost['gambar']);
unlink('../images/post/medium_'.$dPost['gambar']);
}
$hapus_publikasi = mysqli_query($con,"DELETE from post where id_post = '$id'");
if($hapus_publikasi){
	header('location: ../publikasi.php?halaman='.enkripsi('publikasi'));
}

?>