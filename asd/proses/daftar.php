<?php 

include_once '../../koneksi.php';
include_once '../../include/fungsi/enkripsi.php';


if (isset($_POST['daftar'])) {
    $cekemail = mysqli_query($con,"SELECT * FROM user WHERE email='$_POST[email]' AND password='$password'");
                if (mysqli_num_rows($cekemail) > 0) {
                    $r=mysqli_fetch_array($cekemail); 
                    session_start();  //mulai sesi
                    //Daftarkan sesi ke Server  
                    //Isi dari sesi  
                    $_SESSION[masuk] = true;
                    $_SESSION[id]=$r[id_user];
                    echo "
                        <script>
                            window.location='../index.php?halaman=edit_foto';
                        </script>
                    ";
                } else if (mysqli_num_rows($cekemail) == 0){
                    $cekemail2 = mysqli_query($con,"SELECT * FROM user WHERE email='$_POST[email]'");
                    if (mysqli_num_rows($cekemail2) > 0) {
                       header('location:../index.php?error='.base64_encode('terdaftar').'');
                    } else {
            
                    //Penanganan upload foto
                            
                    $alumni             = $_POST['alumni'];
                    $nama_depan 	    = addslashes($_POST['nama_depan']);
                    $nama_belakang 	    = addslashes($_POST['nama_belakang']);
                    $nama               = $nama_depan." ".$nama_belakang;
                    $alamat             = addslashes($_POST['alamat']);
                    $tempat_lahir       = addslashes($_POST['tl']);
                    $tanggal_lahir      = $_POST['tgl_lahir'];
                    $telepon            = $_POST['telepon'];
                    $password           = enkripsi(addslashes($_POST['password']));
                    date_default_timezone_set("Asia/Jakarta");
                    $tanggal = date("Y-m-d H:i:s");

    //if($ekstensi_file == "image/png" or $ekstensi_file == "image/jpg" or $ekstensi_file == "image/jpeg"){
                    if ($alumni === 'Y'){
                        $angkatan   = $_POST['angkatan'];
                        $query = mysqli_query($con,"INSERT INTO user (id_user,  email,  password, nama_depan, nama_belakang, nama, jk ,alamat, no_hp,tempat_lahir,tanggal_lahir, tahun_lulus, id_kelas, id_jurusan, alumni, tanggal_daftar, status, level) VALUES (NULL,  '$_POST[email]', '$password', '$nama_depan',  '$nama_belakang','$nama', '$_POST[jk]','$alamat','$telepon','$tempat_lahir','$tanggal_lahir','$angkatan','3', '$_POST[kelas_alumni]','Y','$tanggal', 'BV', '1')");
                    } else if ($alumni == 'T') {
                        $query = mysqli_query($con,"INSERT INTO user (id_user,  email,  password, nama_depan, nama_belakang, nama, jk ,alamat,no_hp,tempat_lahir,tanggal_lahir, id_kelas, id_jurusan, alumni, tanggal_daftar, status, level) VALUES (NULL,  '$_POST[email]', '$password', '$nama_depan',  '$nama_belakang','$nama', '$_POST[jk]','$alamat','$telepon','$tempat_lahir','$tanggal_lahir','$_POST[kelas]', '$_POST[jurusan]','T','$tanggal', 'BV', '1')");
                    }
                    
                    if (($query)) {
                        $login=mysqli_query($con, "SELECT * FROM user WHERE email='$_POST[email]' AND password='$password' limit 1"); 
                        $r=mysqli_fetch_array($login); 
                        $ketemu=mysqli_num_rows($login);
                             if ($ketemu>0){
                                session_start();  //mulai sesi
                                //Daftarkan sesi ke Server  
                                //Isi dari sesi  
                                $_SESSION[masuk] = true;
                                $_SESSION[id]=$r[id_user];
                                echo "
                                    <script>
                                        window.location='../index.php?halaman=edit_foto';
                                    </script>
                                ";
                            }
                    } else {
                        echo "
                            <script>
                                alert('Whoops! Registrasi gagal silahkan coba lagi');
                                window.location='daftar.php';
                            </script>
                        ";
                    }
                }
                } 
}
?>