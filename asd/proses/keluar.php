<?php
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';
session_start();

$id=deskripsi($_GET['id']);
mysqli_query($con,"UPDATE user set online = 'T' where id_user = '$id'");
unset($_SESSION['masuk']);
session_destroy();
header('location:../index.php');
?>