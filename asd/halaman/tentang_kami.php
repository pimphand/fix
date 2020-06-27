<?php 
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';

$qisi = mysqli_query ($con, "SELECT * from tentang");
$disi = mysqli_fetch_array($qisi);
$isi = $disi['isi'];
?>

<?php if ($dataUser['level'] == '1') {
echo "<script>
    window.location='profil.php?id=".enkripsi($id)."';
</script>";
}
?>

<!-- page content -->

        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tentang Matric</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form method="POST" action="proses/update_tentang_kami.php" enctype="multipart/form-data">
                    <label>Isi Tentang Matric</label>
                    <textarea  type="text" class="ckeditor" name="isi"><?php echo $isi ?></textarea><br>
                    
                    <button type="submit" class="btn btn-primary" name="upload">Update</button>
                  </form>
                  </div>
                </div>
              
              </div>

              
        <!-- /page content -->