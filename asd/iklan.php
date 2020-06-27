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
                    <h2><span class="fa fa-question-circle"></span> Pastekan Code</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                    Silahkan pastekan kode iklan di sini:
                    <form method="POST" action="proses/tambah_iklan.php" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="penulis" value="<?php echo $id ?>">
                    <label>Judul Iklan  :</label>
                    <input type="text" class="form-control" name="judul" required><br>
                    
                    <label>Source Code : </label>
                    <textarea type="text" class="form-control" name="sc" required></textarea><br>
                    
                    <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
                  </form>
                  </div>
                </div>
              
              </div>
              <div class="col-md-8 col-sm-12 col-xs-12" style="float:left">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><span class="fa fa-tag"></span> Daftar Iklan</h2>
                    
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
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $qIklan = mysqli_query($con,"SELECT * FROM iklan");
                        $no=1;
                        while ($dIklan = mysqli_fetch_array ($qIklan)){
                        

                      ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $dIklan['judul']; ?></td>
                        </tr>
                       <?php } ?>
                        
                      </tbody>
                    </table>
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