<?php
include '../../koneksi.php';

$id=base64_decode($_GET['id']);
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d H:i:s");
mysqli_query($con,"UPDATE post set status = 'V', tanggal='$tanggal' where id_post = '$id'");
header('location: ../home.php');

?>