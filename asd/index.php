<?php 
  error_reporting(0);
 switch ($_GET['halaman']) {
   default:
?>
<!DOCTYPE html>
<?php include '../koneksi.php';
include '../include/fungsi/enkripsi.php';

if (isset($_SESSION['masuk'])){
    header('location:home.php');
}

?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Masuk | Matric </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo.png">
    <!-- PNotify -->
    <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
    <link href="date/css/datepicker.css" rel="stylesheet">
	<script type="text/javascript" src="date/js/jquery-1.10.2.min.js"></script> 
    
    <script type="text/javascript">
    var htmlobjek;
    
    
    $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=propinsi>
      $("#kelas").change(function(){
        var id_kelas = $("#kelas").val();
        $.ajax({
            url: "proses/cari_kelas.php",
            data: "id_kelas="+id_kelas,
            cache: false,
            success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#jurusan").html(msg);
            }
        });
      });

       
     
    });

    </script>
    <script type="text/javascript">
    var htmlobjek;
    $(document).ready(function(){
      $("#alumni").change(function(){
        var alumni = $("#alumni").val();
        if (alumni == 'T'){
          $('#kelas').show();
          $('#jurusan').show();
        }
        else {
           $('#kelas').hide();
          $('#jurusan').hide();
        }
        $.ajax({
            url: "proses/alumni.php",
            data: "alumni="+alumni,
            cache: false,
            success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#kelas_alumni").html(msg);
            }

        });
      });
     
    });

    </script>  
    <script type="text/javascript">
     window.onload = function(){
      document.getElementById('password').onchange = validasi;
      document.getElementById('repassword').onchange = validasi;
     }

     function validasi(){
      var pas2 = document.getElementById('repassword').value;
      var pas1 = document.getElementById('password').value;

      if (pas1!=pas2){
        document.getElementById('daftar').disabled = true;
        $('#notif').show();
      }
      else {
        document.getElementById('daftar').disabled = false;
        $('#notif').hide();
      }

     }
     
     
    </script>  
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <div align="center">
            <img src="images/logo.png" style="width : 130px;">
          </div>

          <section class="login_content">
          <?php if (($_GET['error']) == base64_encode('gagal_masuk')) { 
          ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>Email atau Password Salah !!!</strong>
            </div>
          <?php } else if (($_GET['error']) == base64_encode('menunggu_persetujuan')) { ?>
            <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>Maaf, Anda belum disetujui admin</strong>
            </div>
          <?php } else if (($_GET['error']) == base64_encode('terdaftar')) {  ?>
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Email sudah terdaftar ! silahkan login !</strong>
            </div>
            <?php } ?>
            
            <?php if (($_GET['success']) == 'permintaan_terkirim') { 
          ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>Permintaan Anda telah terkirim ke email Anda</strong>
            </div>
          <?php } else if (($_GET['success']) == 'password_terganti') { ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>Password Anda telah berhasil dirubah</strong>
            </div>
          <?php } ?>
            <form action="proses/masuk.php" method="post">
              <h1>Login Form</h1>
              <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div class="">
                <input type="password" name="password" class="form-control " placeholder="Password" required="" />
              </div>
              
              <div>
                <button type="submit" name="masuk" class="btn btn-default submit" href="home.php">Masuk</button>
                <a class="reset_pass" href="index.php?halaman=lupa_password">Lupa Password ?</a>
              </div>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Belum punya akun ? 
                  <a href="index.php?halaman=daftar" class="to_register" style="color:green"> Daftar </a>
                </p>
                <a href="../index.php"><< Kembali ke web</a>

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
    </div>
    
    <script src="date/js/bootstrap.min.js"></script>
    <script src="date/js/bootstrap-datepicker.js"></script>
    <script>
    $(".date").datepicker({autoclose: true, todayHighlight: true});
    </script>
    
    <script src="js/bootstrap.min.js"></script>
  <script src="js/cropper/cropper.min.js"></script>
  <script src="js/main.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <script src="vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>
    <script src="vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
  </body>


</html>

<?php 
break;
case 'hubungi_admin';
include 'halaman/hubungi_admin.php';
break;
case 'edit_foto';
include 'halaman/foto.php';
break;

case 'daftar';
include 'halaman/daftar.php';
break;

case 'lupa_password';
include 'halaman/lupa_password.php';
break;

case 'reset_password';
include 'halaman/reset_password.php';
break;

}
?>