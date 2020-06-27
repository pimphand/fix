<?php 
include '../../koneksi.php';

$id_kelas = $_GET['id_kelas'];
$qjurusan = mysqli_query($con,"SELECT id_jurusan,nama_jurusan FROM jurusan WHERE id_kelas='$id_kelas'");
if ($qjurusan){
while($jurusan = mysqli_fetch_array($qjurusan)){
	?>
	<option value="<?php echo $jurusan['id_jurusan'] ?>"><?php echo $jurusan['nama_jurusan'] ?></option>
    <?php
}}
?>