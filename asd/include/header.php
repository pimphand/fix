<?php include '../koneksi.php' ?>
<?php include_once '../include/fungsi/format_tanggal.php';
      include_once '../include/fungsi/enkripsi.php';
date_default_timezone_set("Asia/Jakarta");
?>
<?php
 if (!isset($_SESSION['masuk'])) {
    echo "
        <script>
            window.location='index.php';
        </script>
    "
    ;

}
?>

<?php 
  $id=$_SESSION['id'];
  $quser=mysqli_query($con,"Select * from user where id_user='$id'");
  $dataUser = mysqli_fetch_array($quser);
  mysqli_query($con,"UPDATE user set online = 'Y' where id_user = '$id'");
  ?>

<?php if ($dataUser['level'] == '1' AND $dataUser['status'] == 'BV') {
echo "<script>
    window.location='proses/keluar.php';
</script>";
}
?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>SI-MATRIC | Mathematic Creative Club </title>
    <link rel="shortcut icon" href="images/logo.png">

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    
  <link rel="stylesheet" href="js/cropper/cropper.min.css">
  <link rel="stylesheet" href="css/main.css">

    <!-- Custom Theme Style -->
    
    <link href="build/css/custom.css" rel="stylesheet">
    <script src="build/js/Chart.js"></script>
    <link href="build/css/hover.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script>
    function konfirmasi(pesan) {
     if (confirm(pesan)) {
     return true;
     }
     else {
     return false;
     }
    }
    
    </script>
    
    <script type="text/javascript">
      $(document).ready(function(){
        $(".search").keyup(function() {
          var kotakpencarian = $(this).val();
          var dataString = 'searchword='+ kotakpencarian;

          if(kotakpencarian==''){
            $("#hasilpencarian").hide();
          } else {
            $("#hasilpencarian").show();
            $.ajax({
              type: "POST",
              url: "proses/search.php",
              data: dataString,
              cache: false,
              success: function(html) {
                $("#hasilpencarian").html(html).show();
              }
            });
        } return false;    
      });
    });

    jQuery(function($){
       $("#kotakpencarian").Watermark("Cari");// Untuk menampilkan tulisan "Cari" di kotakpencarian
       });
    </script>
  </head>
  
    <body class="nav-md">
    
    <div class="container body" >
      <div class="main_container" >
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <?php if ($dataUser['level'] == '2') { ?>
              <a href="home.php" class="site_title"><img src="images/logo.png" width="40px" style="margin-left: 5px; margin-right: 3px;  "><span>Matric</span></a>
            <?php } else { ?>
              <a href="home.php" class="site_title"><img src="images/logo.png" width="40px" style="margin-left: 5px; margin-right: 3px;  "><span>Matric</span></a>
            <?php } ?>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            
            <div class="profile clearfix">
              <div class="profile_pic" style="width: 80px; height: 80px; ">
                <img src="images/profil/<?php echo $dataUser['gambar']; ?>" alt="..." class="img-circle profile_img" style="height: 56px">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?php echo $dataUser['nama']?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  
                  <?php if ($dataUser['level'] == '2') {
                     ?>
                  <li><a  onclick="this.href = 'home.php'"><i class="fa fa-home"></i> Beranda 
                    
                  </a>
                  
                    
                  </li>
                  <?php } else  {} ?>
                  <li><a href="forum.php"><i class="fa fa-users"></i> Forum </a>
                    
                  </li>

                  <?php if ($dataUser['level'] == '2') { ?>
                  <li><a><i class="fa fa-user"></i> Anggota & Alumni <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="anggota.php">Data Anggota</a></li>
                      <li><a href="anggota.php?halaman=alumni">Data Alumni</a></li>
                      <li><a href="anggota.php?halaman=statistik">Statistik</a></li>
                      
                    </ul>
                  </li>
                  <?php } else { } ?>
                  <li><a><i class="fa  fa-edit"></i> Publikasi Matric <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if ($dataUser['level'] == '2') { ?>
                      <li><a href="publikasi.php?halaman=<?php echo enkripsi('publikasi') ?>">Data Publikasi</a></li>
                      <?php } else {} ?>
                      <li><a href="publikasi.php?halaman=tambah_publikasi">Tambah Publikasi</a></li>
                      <li><a href="publikasi.php?halaman=publikasiku">Publikasiku</a></li>
                      <?php if ($dataUser['level'] == '2') { ?>
                      <li><a href="publikasi.php?halaman=tentang_kami">Tentang kami</a></li>
                      <?php } else {} ?>
                      
                    </ul>
                  </li> 
                  <li><a><i class="fa fa-book"></i>Materi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="materi.php">Data Materi</a></li>
                      <li><a href="materi.php?halaman=tambah_materi">Tambah Materi</a></li>
                      <!--<li><a href="haha.php">Materiku</a></li>-->
                    </ul>
                  </li>
                  <?php if ($dataUser['level'] == '2') { ?> 
                  <li><a href="struktur.php"><i class="fa fa-graduation-cap"></i> Ubah Struktur</a></li>   
                  <?php }else {} ?>             
                  <li><a href="testimoni.php"><i class="fa fa-comments-o"></i> Testimoni</a></li>
                  <li><a onclick="this.href = 'https://drive.google.com/file/d/1asoJTQQ14QMD5IS-rOEYMjBEJbhjfA6h/view'" target="_blank"><i class="fa fa-download" ></i> Download App</a></li>
                </ul>
              </div>
              
              
              <div class="menu_section">
                <h3>Pengaturan</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-gears"></i> Profil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="profil.php?id=<?php echo enkripsi($dataUser['id_user']) ?>">Profilku</a></li>
                      <li><a href="ganti_password.php">Ganti Password</a></li>
                    </ul>
                  </li>
                  <li><a href="proses/keluar.php?id=<?php echo enkripsi($dataUser['id_user']) ?>"><i class="fa fa-sign-out"></i> Keluar </span></a>
                    
                  </li>
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav >
              <div class="nav toggle" >
                <a id="menu_toggle" ><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right" >
              <div style=" width: 100%; ">
                <li class="dropdown" style="width: 70%;min-width: 200px;float: left;">
                  <div class="form-group col col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;margin-right: 20px;">
                    <input type="text" id="kotakpencarian" class="dropdown-toggle form-control col-md-12 search" placeholder="Cari" data-toggle="dropdown" aria-expanded="false">
                  </div>
                  <ul id="hasilpencarian" class="dropdown-menu to_do" style="background-color: white; padding: 10px" role="menu">
                  </ul>
                </li>
              </div>
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/profil/<?php echo $dataUser['gambar']; ?>" alt="">
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profil.php?id=<?php echo enkripsi($dataUser['id_user']) ?>"> Profil</a></li>
                    
                    <li><a href="proses/keluar.php?id=<?php echo enkripsi($dataUser['id_user']) ?>"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                  </ul>
                </li>

                
                
                <li class="teman-online">
                  <a onclick="openNav()"  class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-users"></i>
                  </a>
                </li>
                <li class="teman-online">
                  <a href="../index.php" target="_blank"  >
                    <i class="fa fa-globe"></i>
                  </a>
                </li>
                
                
              </ul>
            </nav>
            
          </div>
        </div>
        <div id="mySidenav" class="side-online">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <div class="x_panel" style="margin: 0">
            <div class="x_title">
              <i class="fa fa-users"></i>
              Member Online (<?php 
                $qjOnline = mysqli_query($con,"SELECT count(online) as jumlah from user where online = 'Y' and id_user != '$id'");
                $djOnline = mysqli_fetch_array($qjOnline);
                $jonline = $djOnline['jumlah'];
                echo $jonline;
              ?>)
              
            </div> 
            <div class="x_content">
              <ul class="list-unstyled msg_list">
                <?php 
                  $qOnline = mysqli_query($con, "SELECT * from user where online = 'Y' and id_user != '$id'");
                  while ($dOnline = mysqli_fetch_array($qOnline)){
                ?>
                <li class="hvr-forward">
                  <a href="profil.php?id=<?php echo enkripsi($dOnline['id_user']) ?>">
                    <span class="avatar">
                      <img src="images/profil/<?php echo $dOnline['gambar'] ?>" style="height:45px; margin-right: 10px;" >
                    </span>
                    <span>
                      <span><b><?php echo $dOnline['nama_depan']. " " .$dOnline['nama_belakang']?></b></span>
                    </span>
                  </a>
                </li> 
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
    
<script>
  function openNav() {
      document.getElementById("mySidenav").style.width = "100%";
  }

  function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
  }
</script>