<?php 
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';

$email = $_POST['email'];
$qselect = mysqli_query($con,"SELECT * from user where email = '$email'");
$dselect = mysqli_fetch_array($qselect);
$id      = $dselect['id_user'];
$email2      = $dselect['email'];

    $from = "official@matric.club <noreply@matric.club>"; //Pengirim
    $to = $email2; //Penerima   
    $subject = "[MATRIC]Reset Password"; //Subject   
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
                            <h2>Permintaan Ubah Password </h2>
                        </div>
                    </center>
                    <div class="row">
                        <center>
                            Permintaan ubah password Anda sudah kami terima, silahkan <a href="https://matric.club/si-matric/index.php?halaman=reset_password&p='.enkripsi($id).'&n='.enkripsi($email2).'" target="_blank">klik disini</a> untuk melakukan reset password
                        </center>
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

                header('location: ../index.php?success=permintaan_terkirim');

?>