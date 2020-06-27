<?php 
include '../../koneksi.php';
?>
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Dari Kelas </label>
<div class="col-md-6 col-sm-6 col-xs-12">
<?php
$alumni = $_GET['alumni'];
if ($alumni === 'Y'){
$qjurusan = mysqli_query($con,"SELECT id_jurusan,nama_jurusan FROM jurusan WHERE id_kelas='3'");
?>

<select name="kelas_alumni" class="form-control">
	<option>-- Dari Kelas --</option>

<?php
while($jurusan = mysqli_fetch_array($qjurusan)){
	?>
	<option value="<?php echo $jurusan['id_jurusan'] ?>"><?php echo $jurusan['nama_jurusan'] ?></option>
    <?php
}
echo "</select></div></div>";

?>

<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tahun Lulus  
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="tahun_lulus" name="tahun_lulus" required="required" class="form-control col-md-7 col-xs-12" value="">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Bekerja di  
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="bekerja" name="bekerja" required="required" class="form-control col-md-7 col-xs-12" value="">
  </div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kuliah di  
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input type="text" id="kuliah" name="kuliah" required="required" class="form-control col-md-7 col-xs-12" value="">
	</div>
</div>

<?php

}
else {
}

?>