<?php
include '../../koneksi.php';

$extensionList = array("doc","docx","ppt","pptx","pdf","zip","rar");
$penulis = $_POST['penulis'];
$materi  = $_POST['materi'];
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d H:i:s");
$lokasi_file    = $_FILES['file']['tmp_name'];
$nama_file2     = $_FILES['file']['name'];
$nama_file      = str_replace(" ","_",$nama_file2);
$ukuran_file    = $_FILES['file']['size'];

$pecah = explode(".", $nama_file2);
$ekstensi = $pecah[1];

// Tentukan folder untuk menyimpan file
$folder = "../materi/$nama_file";
if (isset($_POST['upload'])){
    if(($ukuran_file >= 10485760) ) {
        echo 'File too large. File must be less than 10 megabytes.';
    } else {
        if (in_array($ekstensi, $extensionList)){
        	if (move_uploaded_file($lokasi_file,"$folder")){
        
        	  $query = mysqli_query($con, "INSERT INTO materi (id_materi, id_user, judul,materi,tanggal)
        	            VALUES(null, '$penulis','$materi','$nama_file','$tanggal')");
        	  if ($query){
        	  	header('location: ../materi.php');
        	  }
        
        	}
        	else{
        	  header('location: ../materi.php?halaman=tambah_materi&error=file_error');
        	}
        } else {
            header('location: ../materi.php?halaman=tambah_materi&error=file_error');
        }
    }
}


?>