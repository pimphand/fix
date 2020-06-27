<?php

    include '../koneksi.php';

    
    //Ambil semua email admin
	$sekarang   = date('m-d');
	$qult   = mysqli_query($con,"SELECT email,nama,TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur ,TO_DAYS(now())-TO_DAYS(tanggal_lahir) AS hari FROM user WHERE DATE_FORMAT(tanggal_lahir, '%m-%d')='$sekarang' and status = 'V'");
	
	
	while($dult = mysqli_fetch_array($qult)){
	$email = $dult['email'];
	$nama = $dult['nama'];
	$umur = $dult['umur'];
	$hari = $dult['hari'];
	
	
    $from = "official@matric.club <noreply@matric.club>"; //Pengirim
    $to = $email; //Penerima   
    $subject = "[MATRIC]Selamat Ulang Tahun $nama ke-$umur"; //Subject   
    $message = "<center>
                <div class='row'>
                            <img src='https://matric.club/si-matric/images/logo.png' width='100px'>
                        </div>
                    <h3>Selamat Ulang Tahun $nama!</h3></center>
    		        <p>Hari ini sangat istimewa karena salah satu teman kita merayakan hari ulang tahunnya,
    		        <p>Yaitu kamu, <b>$nama</b>. Diumurmu yang ke-<b>$umur</b> Tahun ini semoga selalu diberikan kesehatan, selalu diberikan keberkahan, umur yang panjang, dan sukses terus!.
    		        
    		        <p>Kamu sudah ada didunia ini selama <b>$hari</b> hari, lihatlah kembali momen-momen kecil yang telah kamu lalui selama ini hari demi hari, itu akan menjadi momen yang istimewa. Hari kelahiran kita, hari dimana kita bertemu, hari dimana kita menemukan kecocokan dan memutuskan menjadi sahabat, dapat dikatakan momen-momen kecil. Tapi, pengaruhnya akan bertahan seumur hidup.</p>
    		        <p>Terima kasih untuk segala petualangan yang telah kita alami bersama. Kami menantikan kenangan-kenangan indah bersamamu di MATRIC MAN 2 LAMONGAN pada hari-hari yang akan datang!</p>
    				Happy birthday!<br>
    				-<br>
    				Dari kami,<br>
    				Seluruh Anggota dan Almuni MATRIC."; //Isi pesan  
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= "From:" . $from;    
    
    //Eksekusi Email
    mail($to,$subject,$message, $headers);
    mail("jamescronous@gmail.com",$subject,$message, $headers);
	}
	
    
?>