<?php 

if (isset($_POST['submit'])){
$cari = $_POST['cari'];
header("location : ../../cari.php?key=$cari");

echo "<script>
	window.location='../../cari.php?key=$cari';
</script>";

}
?>