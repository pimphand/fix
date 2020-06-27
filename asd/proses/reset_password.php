<?php 
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';

$email = $_POST['email'];
$id     = $_POST['id'];
$password = enkripsi($_POST['password']);

mysqli_query($con, "UPDATE user set password = '$password' where id_user = '$id' and email = '$email'");

header('location: ../index.php?success=password_terganti');




?>