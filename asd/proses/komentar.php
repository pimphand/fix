<?php 
include '../../koneksi.php';
$komentator = $_POST['komentator'];
$id_feed = $_POST['id_feed'];
$isi    = $_POST['isi_komentar'];

if (isset($_POST['komentar'])){
	$qInsertkomentar = mysqli_query($con, "INSERT into komentar (id_komentar,id_post,id_user,isi,tanggal) values (NULL, '$id_feed','$komentator','$isi',now())");
	if ($qInsertkomentar){
		echo '<script>
		    window.history.back();
		</script>';
	}
}
?>