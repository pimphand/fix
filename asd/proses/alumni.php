<?php 
include '../../koneksi.php';

$alumni = $_GET['alumni'];
if ($alumni === 'Y'){
$qjurusan = mysqli_query($con,"SELECT id_jurusan,nama_jurusan FROM jurusan WHERE id_kelas='3'");
?>
<label for="kelas_alumni" style="float: left">Kelas : </label>
<select name="kelas_alumni" class="form-control " >

<?php
while($jurusan = mysqli_fetch_array($qjurusan)){
	?>
	<option value="<?php echo $jurusan['id_jurusan'] ?>"><?php echo $jurusan['nama_jurusan'] ?></option>
    <?php
}
echo "</select>";

?>



	<label for="angkatan" style="float: left">Angkatan : </label>
	<input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="Angkatan" required>
	<small class="note"><b> Note : </b> Tahun lulus</small>

<?php
}
else {
}

?>