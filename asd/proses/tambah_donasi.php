<?php
include '../../koneksi.php';

$extensionList = array("jpg","png");
$nama = $_POST['nama'];
$email  = $_POST['email'];
$alamat = $_POST['alamat'];
$jumlah  = $_POST['jumlah'];
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d H:i:s");
$lokasi_file    = $_FILES['bukti']['tmp_name'];
$nama_file2     = $_FILES['bukti']['name'];
$nama_file      = str_replace(" ","_",$nama_file2);
$ukuran_file    = $_FILES['bukti']['size'];

$pecah = explode(".", $nama_file2);
$ekstensi = $pecah[1];

// Tentukan folder untuk menyimpan file
$folder = "../images/donasi/$nama_file";
if (isset($_POST['kirim'])){
    if(($ukuran_file >= 10485760) ) {
        echo 'File too large. File must be less than 10 megabytes.';
    } else {
        if (in_array($ekstensi, $extensionList)){
        	if (move_uploaded_file($lokasi_file,"$folder")){
        
        	  $query = mysqli_query($con, "INSERT INTO donasi (id_donasi, nama, email,alamat,jumlah,bukti, status)
        	            VALUES(null, '$nama','$email','$alamat','$jumlah','$nama_file','1')");
        	  if ($query){
        	  	header('location: ../donasi.php?info=sukses');
        	  }
        
        	}
        	else{
        	  echo "File gagal di upload";
        	}
        } else {
            header('location: ../materi.php?halaman=tambah_materi&error=file_error');
        }
    }
}


?>