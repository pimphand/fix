<?php
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';
include '../../include/fungsi/format_tanggal.php';

$id=deskripsi($_GET['id']);
mysqli_query($con,"UPDATE user set status = 'V' where id_user = '$id'");

    $qEmail     = mysqli_query($con,"SELECT * FROM user WHERE id_user = '$id'");
	$dataEmail  = mysqli_fetch_array($qEmail);
	$email      = $dataEmail['email'];
	$nama       = $dataEmail['nama'];
	$jk         = $dataEmail['jk'];
	$tgl        = $dataEmail['tanggal_lahir'];
	$ttl        = $dataEmail['tempat_lahir'].", ".indo($tgl);
	$alamat     = $dataEmail['alamat'];
	
	$qKelasAlumni = mysqli_query ($con, "SELECT nama_jurusan as jurusan from jurusan inner join user on jurusan.id_jurusan = user.id_jurusan where user.id_jurusan = '$dataEmail[id_jurusan]'");
    $dKelasAlumni = mysqli_fetch_array($qKelasAlumni);
    $KelasAlumni = $dKelasAlumni['jurusan'];
	
    ini_set( 'display_errors', 1 );   
    error_reporting( E_ALL );

$from = "official@matric.club <noreply@matric.club>"; //Pengirim
    $to = $email; //Penerima   
    $subject = "[MATRIC]Konfirmasi Pendaftaran Mathematic Creative Club"; //Subject   
    $message = '
                    <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                
                    <title>Demo Email HTML</title>
                    
                    <style type="text/css" media="screen">
                    body {margin: 0; padding: 0; color: #333333; background-color: #ddd;}
                    a {color: #ce0316;}
                    p {margin: 0; padding: 5px 0; line-height:20px;
                    font-family: Arial; font-size: 12px;}
                    h2 {margin:10px 0 0; padding: 0 0 10px; font-family:
                    Georgia; font-size: 20px; font-weight:normal;border-bottom:1px solid #999;}
                    .page {background-color: #fff; padding:10px;}
                    .article {border-bottom:1px solid #999; margin:5px 0 10px; padding: 0 0 10px;}
                    .footer {background-color: #eee;}
                    
                    table tr td {
                        padding : 10px 20px;
                    }
                    </style>
                 
                </head>
                <body>
                
                <div class="container">
                    <center>
                        <div class="row">
                            <img src="https://matric.club/si-matric/images/logo.png" width="100px">
                        </div>
                        
                        <div class="row">
                            <h2>Pendaftaran Anda telah kami konfirmasi</h2>
                        </div>
                    </center>
                    <div class="row">
                    <table width="100%" style="color:black" cellspacing="0" cellpadding="0">
                        
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>'.$nama.'</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>'.$jk.'</td>
                        </tr>
                        <tr>
                            <td>TTL</td>
                            <td>:</td>
                            <td>'.$ttl.'</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>'.$KelasAlumni.'</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>'.$alamat.'</td>
                        </tr>
                    </table>
                    </div>
                    
                    
                </div>
                
                
                 
                
                 
                </body>
                </html>
                '; //Isi pesan  
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= "From:" . $from;    
    
    //Eksekusi Email
    mail($to,$subject,$message, $headers);


header('location: ../home.php');



?>