<?php include 'include/header.php' ?>


<?php 
  error_reporting(0);
 switch ($_GET['halaman']) {
   default:
?>

<div class="right_col" role="main">
  <div>
    <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">404</h1>
              <h2>Mohon Maaf. Halaman tidak ditemukan</h2>
              <p>This page you are looking for does not exist <a href="#">Report this?</a>
              </p>
              
            </div>
          </div>
        </div>
  </div>
</div>


<?php 
break;
case 'lihat_halaman';
include 'halaman/lihat_publikasi.php';
break;

case 'tambah_publikasi';
include 'halaman/tambah_publikasi.php';
break;

case 'tentang_kami';
include 'halaman/tentang_kami.php';
break;

case 'publikasiku';
include 'halaman/publikasiku.php';
break;

case enkripsi('publikasi');
include 'halaman/publikasi.php';
break;



}
?>
              
        <!-- /page content -->
<?php include 'include/footer.php' ?>