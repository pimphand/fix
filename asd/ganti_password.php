<?php include 'include/header.php';
 ?>

<!-- page content -->

<script type="text/javascript">
 window.onload = function(){
  document.getElementById('pass_baru').onchange = validasi;
  document.getElementById('repass_baru').onchange = validasi;
 }

 function validasi(){
  var pas2 = document.getElementById('repass_baru').value;
  var pas1 = document.getElementById('pass_baru').value;

  if (pas1!=pas2){
    $('#notif').show();
  }
  else {
    $('#notif').hide();
  }

 }
</script>
<div class="right_col" role="main">
  <div class="">
    
    
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel ">
          
          <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="">
                <div class="x_title">
                  <h2>Ganti Password</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form id="demo-form2" method="POST" action="proses/ganti_password.php" data-parsley-validate class="form-horizontal form-label-left">
                  <?php 
                  error_reporting(0);
                  if ($_GET['info'] == enkripsi('password_lama_salah')) { 
                      ?>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <strong>Password Lama Salah !!</strong>
                        </div>
                      <?php } else if ($_GET['info'] == enkripsi('password_tidak_sama')) { 
                        ?>
                        <div class="alert alert-warning alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <strong>Kombinasi password baru tidak sama !!!, Mohon Ulangi</strong>
                        </div>
                      <?php } else if ($_GET['info'] == enkripsi('sukses')) { ?>
                      <div class="alert alert-success alert-dismissible fade in" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <strong>Password berhasil diperbarui.</strong>
                        </div>
                      <?php } ?>
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $id ?>" class="form-control col-md-7 col-xs-12">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password Lama <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <input type="password" id="pass_lama" name="pass_lama" required="" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password Baru <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="pass_baru" name="pass_baru" required="" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ulangi Password Baru <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="repass_baru" name="repass_baru" required="required" class="form-control col-md-7 col-xs-12"><br><br>
                        <div id="notif" name="notif" style="display: none; color: red; margin-top: -15px">
                          Password tidak Sama
                        </div>
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" id="ganti" name="ganti" class="btn btn-success">Ganti</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        <!-- /page content -->


<?php include 'include/footer.php' ?>