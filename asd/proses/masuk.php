<?php 

include_once '../../koneksi.php';
include_once '../../include/fungsi/enkripsi.php';
if (isset($_POST['masuk'])) {
    /*$cekemail = "SELECT * FROM user WHERE email='$_POST[email]'";
    if ($cekemail = $con->query($cekemail)) {
        if ($cekemail->num_rows) {
       echo "
            <script>
                alert('e sudah ada');
                window.location='daftar.php';
            </script>
       ";
    } 
    

    else {*/
    $password = enkripsi($_POST['password']);
    $login=mysqli_query($con, "SELECT * FROM user WHERE email='$_POST[email]' AND password='$password' limit 1"); 
    $r=mysqli_fetch_array($login); 
    $ketemu=mysqli_num_rows($login);

    if ($ketemu>0){
        session_start();  //mulai sesi
        //Daftarkan sesi ke Server  
        //Isi dari sesi  
        
        if ($r['status'] == 'BV' AND $r['level'] == '1'){
            header('location:../index.php?error='.base64_encode('menunggu_persetujuan'));
        }  
        else if ($r['status'] == 'V' AND $r['level'] == '1') {
            $_SESSION[masuk] = true;
            $_SESSION[id]=$r[id_user];
            $_SESSION[level] = $r[level];
            header('location:../forum.php');
        }
        else if ($r['level'] == '2'){
            $_SESSION[masuk] = true;
            $_SESSION[id]=$r[id_user];
            $_SESSION[level] = $r[level];
            header('location:../home.php');
        }
    }
    else {
        header('location:../index.php?error='.base64_encode('gagal_masuk'));
    }
//}
//}
//}
}
?>