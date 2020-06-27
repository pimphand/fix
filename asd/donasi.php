<?php include 'include/header.php';
 ?>
<?php if ($dataUser['level'] == '1' AND $dataUser['status'] == 'BV') {
echo "<script>
    window.location='proses/keluar.php';
</script>";

}
?>

<!-- page content -->

        <div class="right_col" role="main">
         <?php 
        error_reporting(0);
        switch ($_GET['halaman']){
        default :
         ?>

          <div class="">
            <div class="page-title">
              
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12" style="float:right">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><span class="fa fa-question-circle"></span> Cara berdonasi</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                    Silahkan melakukan transfer ke nomor rekening berikut ini :
                    <ul style="margin-left:-15px;">
                        <li>No. Rekening : 012334556</li>
                        <li>Atas Nama : Pesantren Daruttaufiq Anyer</li>
                        <li>Nama Bank : BNI Syariah</li>
                        <li>Cabang : Banten</li>
                    </ul>
                    
                    Kemudian isilah form konfirmasi donasi disertai bukti transfer
                  </div>
                </div>
              
              </div>
              <div class="col-md-8 col-sm-12 col-xs-12" style="float:left">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><span class="fa fa-money"></span> Donasi</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <?php if (($_GET['info']) == 'sukses') { 
                    ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Sukses</strong>
                    </div>
                    <?php } ?>
                  <div class="x_content">
                  <form method="POST" action="proses/tambah_donasi.php" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="penulis" value="<?php echo $id ?>">
                    <label>Nama  :</label>
                    <input type="text" class="form-control" name="nama" required><br>
                    <label>Email  :</label>
                    <input type="email" class="form-control" name="email" required><br>
                    <label>Alamat : </label>
                    <textarea type="text" class="form-control" name="alamat" required></textarea><br>
                    <label>Jumlah :</label>
                    <input type="number" class="form-control" name="jumlah" required><br>
                    <label>Bukti transfer</label>
                    <input type="file" name="bukti">
                    <small><b>File max : </b>2Mb</small><br><br>
                    <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
                  </form>
                  </div>
                </div>
              
              </div>
              
            <?php 
                break;
                case "lihat_donasi";
                include "halaman/lihat_donasi.php";
                break;
        }
            ?>

              
        <!-- /page content -->
<?php include 'include/footer.php' ?>