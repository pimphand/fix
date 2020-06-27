

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
                    <h2>Tambah Materi</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <?php if (($_GET['error']) == 'file_error') { 
                    ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>File gagal diupload !</strong><br>
                      Ukuran file harus max : 2MB dan File types harus "doc","docx","ppt","pptx","pdf","zip","rar"
                    </div>
                    <?php } ?>
                  <div class="x_content">
                  <form method="POST" action="proses/tambah_materi.php" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="penulis" value="<?php echo $id ?>">
                    <label>Judul Materi</label>
                    <input type="text" class="form-control" name="materi"><br>
                    <label>Upload File</label>
                    <input type="file" name="file">
                    <small><b>File max : </b>2Mb</small><br>
                    <small><b>File type : </b>"doc","docx","ppt","pptx","pdf","zip","rar"</small><br><br>
                    <button type="submit" class="btn btn-primary" name="upload">Upload</button>
                  </form>
                  </div>
                </div>
              
              </div>

              
        <!-- /page content -->