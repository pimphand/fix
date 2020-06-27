<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Terima Kasih telah mendaftar | Matric </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    
  </head>
  <?php 
  include '../koneksi.php';
  include '../include/fungsi/enkripsi.php';
  $id=$_SESSION['id'];
  $quser=mysqli_query($con,"Select * from user where id_user='$id'");
  $dataUser = mysqli_fetch_array($quser);
  $_SESSION['level'] = $dataUser['level'];
  $_SESSION['level'] = true;

  if ($dataUser['gambar'] == ''){
    echo "
        <script>
            window.location='index.php?halaman=edit_foto';
        </script>
    ";
  }

  ?>
  
<script type="text/javascript">
    var waktu = 10;
    setInterval(function() {
    waktu--;
    if(waktu < 0) {
    window.location = 'proses/keluar.php';
    }else{
    document.getElementById("waktu").innerHTML = waktu;
    }
    }, 1000);
</script>


  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <div align="center">
            <img src="images/profil/<?php echo $dataUser['gambar'] ?>" style="width : 130px; border-radius: 50%">
          </div>

          <section class="login_content">
            <form>
              <h1><?php echo $dataUser['nama_depan']. " " . $dataUser['nama_belakang'] ?></h1>
              

              <div class="clearfix"></div>

              <div class="separator">
              <h3>Terima kasih telah mendaftar di Matric</h3>
                <p class="change_link">
                  <h4></h4>
                  <h4>Silahkan menunggu persetujuan dari Admin</h4>
                  <h4>Anda kan keluar dari forum ini secara otomatis dalam <span id="waktu">10</span> detik</h4>
                </p>
                <a href="proses/keluar.php?id=<?php echo enkripsi($dataUser['id_user']) ?>" class="btn btn-default">Keluar</a>
                <div class="clearfix"></div>
                <br />

                <div>
                  
                  <p>©2017 All Rights Reserved. Matric MANEBA</p>
                </div>
              </div>
            </form>
          </section>
        </div>

    </div>
  </body>

</html>
