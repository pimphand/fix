<?php include 'include/fungsi/format_tanggal.php';
      include 'include/fungsi/enkripsi.php';
      
?>

<!DOCTYPE html>
<html>
<head>
<title>
<?php 
  if (empty($title)){

  } else {
    echo $title." | ";
  }
  error_reporting(0);
?>
Matric</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/font.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/structure.css">
<link rel="stylesheet" href="assets/css/hover.css">
<link rel="shortcut icon" href="si-matric/images/logo.png">
<script src="assets/js/modernizr.js"></script>
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<header id="header" class="">
  <div class="container">
    <nav class="navbar navbar-default"  role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="index.php" style="color:white">
              <!--<img src="si-matric/images/logo.png" width="40px" style="margin-top : -10px" >-->
              Matric
              </a> </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav custom_nav">
              <li class=""><a href="index.php">Beranda</a></li>
              <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Publikasi</a>
                <ul class="dropdown-menu" role="menu">
                  <li > <a href="publikasi.php?kategori=Berita">Berita</a> </li>
                  <li><a href="publikasi.php?kategori=Pengumuman">Pengumuman</a></li>
                  <li><a href="publikasi.php?kategori=Artikel">Artikel</a></li>
                  <li><a href="publikasi.php?kategori=Man-Babat">Man Babat</a></li>
                </ul>
              </li>
              <!--<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Man Babat</a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Standard Blog Layout</a></li>
                  <li><a href="#">Post With Comments</a></li>
                  <li><a href="#">Page:Right Sidebar</a></li>
                </ul>
              </li>-->
              <li class="dropdown"><a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tentang Kami</a>
                    <ul class="dropdown-menu" role="menu">
                      <li> <a href="tentang.php?kategori=tentang_matric">Tentang Matric</a> </li>
                      <li><a href="tentang.php?kategori=struktur_organisasi">Struktur Organisasi</a></li>
                    </ul>
              </li>
              <?php 
              
                if (!isset($_SESSION['masuk'])){
              ?>
              <li><a href="si-matric/index.php">Masuk</a></li>
              <?php } else { ?>
              <li><a href="si-matric/home.php"><?php
                  $id=$_SESSION['id'];
                  $quser=mysqli_query($con,"Select * from user where id_user='$id'");
                  $dataUser = mysqli_fetch_array($quser);
                  echo $dataUser['nama_depan'];
              ?></a></li>
              <?php } ?>
            </ul>
          </div>
      </div>
      
    </nav>
    <form id="searchForm" action="cari.php" method="get">
        <input type="text" name="key" placeholder="Cari...">
        <input type="submit" value="">
    </form>
  </div>
</header>