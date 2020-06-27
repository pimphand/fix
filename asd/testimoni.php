<?php include 'include/header.php' ?>

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
                    <h2>Testimoni</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form method="POST" action="proses/simpan_testimoni.php">
                    <input type="hidden" name="penulis" value="<?php echo $id ?>">
                    <label for="isi">Isi : </label>
                    <?php 
                      $qTestimoni = mysqli_query ($con,"SELECT isi as isi from testimoni inner join user on testimoni.id_user = user.id_user where user.id_user = '$id'");
                      $dTestimoni = mysqli_fetch_array($qTestimoni);
                      $Testimoni = $dTestimoni['isi'];
                    ?>
                    <?php 
                      $qsudah = mysqli_query($con,"SELECT * from testimoni where id_user = '$id'");
                      $ketemu = mysqli_num_rows($qsudah);
                      if ($ketemu){
                    ?>
                    <textarea type="text" style="height: 150px;" id="isi" name="isi" disabled="" required="required" placeholder="Katakan sesuatu mengenai ini ..." class="form-control col-12" value="<?php echo $Testimoni ?>"><?php echo $Testimoni ?></textarea><br>
                    <div style="float: right" >
                      <a href="#" id="update" class="btn btn-success" onclick="document.getElementById('isi').disabled = false;$('#perbarui').show(); $('#update').hide();">Update</a>
                      <button type="submit" class="btn btn-primary" id='perbarui' name="perbarui" style="display: none;">Simpan</button>
                      <?php } else { ?>
                      <textarea type="text" style="height: 150px;" id="isi" name="isi" required="required" placeholder="Pengalaman apa yang anda dapat dari Matric ?" class="form-control col-12" ></textarea><br>
                      <div style="float: right" >
                      <button type="submit" class="btn btn-primary" id='simpan' name="simpan">Simpan</button>
                      <?php } ?>
                    </div>
                  </form>
                  </div>
                </div>
              
              </div>

              
        <!-- /page content -->
<?php include 'include/footer.php' ?>