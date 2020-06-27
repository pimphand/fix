<?php 
  include '../koneksi.php';
  include '../include/fungsi/enkripsi.php';
  if (!isset($_SESSION['masuk'])) {
    echo "
        <script>
            window.location='index.php';
        </script>
    "
    ;

}
  $id=$_SESSION['id'];
  $quser=mysqli_query($con,"Select * from user where id_user='$id'");
  $dataUser = mysqli_fetch_array($quser);
  $_SESSION['level'] = $dataUser['level'];
  $_SESSION['level'] = true;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

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
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/cropper/cropper.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    
  </head>
<body class="login">
  <div>
    
    <div id="crop-avatar">
     <!-- Current avatar -->
    <div class="avatar-view"  title="Ubah Foto">
      <img src="images/profil/<?php echo $dataUser['gambar'] ?>" alt="Avatar">
    </div>

    <center>
      <h3>Ubah Foto Profil Anda </h3>
      <h4><?php echo $dataUser['nama']; ?></h4>
    </center>
    <center>
      <a href="index.php?halaman=hubungi_admin"><button  class="btn btn-default">Selanjutnya >></button></a>
    </center>
      <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input type="hidden" class="avatar-src" name="avatar_src">
                  <input type="hidden" class="avatar-data" name="avatar_data">
                  <label for="avatarInput">Local upload</label>
                  <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="avatar-preview preview-lg"></div>
                    <div class="avatar-preview preview-md"></div>
                    <div class="avatar-preview preview-sm"></div>
                  </div>
                </div>

                <div class="row avatar-btns">
                  <div class="col-md-9">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                    </div>
                  </div>
                  <form action="crop.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="col-md-3">
                      <button type="submit" class="btn btn-primary btn-block avatar-save">Done</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

  <!-- <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div> -->
        </form>
      </div>
    </div>
  </div><!-- /.modal -->

<!-- Loading state -->
  <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
</div>
</div>

      


    
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- PNotify -->
    <script src="vendors/pnotify/dist/pnotify.js"></script>
    <script src="vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
     <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/cropper/cropper.min.js"></script>
  <script src="js/main.js"></script>
  </body>


</html>

