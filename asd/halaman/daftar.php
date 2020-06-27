<?php include '../koneksi.php' ?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Daftar | Matric </title>

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
    <link href="build/css/custom.css" rel="stylesheet">
    <link href="date/css/datepicker.css" rel="stylesheet">
	<script type="text/javascript" src="date/js/jquery-1.10.2.min.js"></script> 
    
    <script type="text/javascript">
    var htmlobjek;
    
    
    $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=propinsi>
      $("#kelas").change(function(){
        var id_kelas = $("#kelas").val();
        $.ajax({
            url: "proses/cari_kelas.php",
            data: "id_kelas="+id_kelas,
            cache: false,
            success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#jurusan").html(msg);
            }
        });
      });

       
     
    });

    </script>
    <script type="text/javascript">
    var htmlobjek;
    $(document).ready(function(){
      $("#alumni").change(function(){
        var alumni = $("#alumni").val();
        if (alumni == 'T'){
          $('#kelas').show();
          $('#jurusan').show();
        }
        else {
           $('#kelas').hide();
          $('#jurusan').hide();
        }
        $.ajax({
            url: "proses/alumni.php",
            data: "alumni="+alumni,
            cache: false,
            success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#kelas_alumni").html(msg);
            }

        });
      });
     
    });

    </script>  
    <script type="text/javascript">
     window.onload = function(){
      document.getElementById('password').onchange = validasi;
      document.getElementById('repassword').onchange = validasi;
     }

     function validasi(){
      var pas2 = document.getElementById('repassword').value;
      var pas1 = document.getElementById('password').value;

      if (pas1!=pas2){
        document.getElementById('daftar').disabled = true;
        $('#notif').show();
      }
      else {
        document.getElementById('daftar').disabled = false;
        $('#notif').hide();
      }

     }
     
     
    </script>  
  </head>

  <body class="login">
<style>
            .harus{
                color:red;
                font-size:15px;
            }
            .note{
                float:left; margin-top:-7px; margin-bottom:8px
            }
        </style>
        <div class="login_wrapper">
        <div id="register" class="animate form">
          <div align="center">
            <img src="images/logo.png" style="width : 130px;">
          </div>
          <section class="login_content" style="width: 100%">
            <form  method="post" name="form" action="proses/daftar.php" enctype="multipart/form-data">
              <h1>Daftar</h1>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label for="nama_depan" style="float: left">Nama Depan : <span class="harus">*</span> </label>
                <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" required>
                
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label for="nama_depan" style="float: left">Nama Belakang : <span class="harus">*</span> </label>
                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" required>
              </div>
              <div align="left" class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                  
                <input type="radio" class="flat" name="jk" id="laki-laki" value="Laki-Laki" checked="" required /> : Laki-Laki
                <input type="radio" class="flat" name="jk" id="perempuan" value="Perempuan" /> : Perempuan
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label for="nama_depan" style="float: left">TTL : <span class="harus">*</span> </label>
                <input type="text" class="form-control" id="tl" name="tl" placeholder="Tempat Lahir" required>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12 date form-group " data-date="" data-date-format="yyyy-mm-dd">
					<div class="input-group">
					<label for="nama_depan" style="float: left">Tanggal Lahir : <span class="harus">*</span> </label>
					<input class="form-control" type="text" name="tgl_lahir"  readonly="readonly" placeholder = "Tanggal Lahir">
					<small class="note"><b> Note : </b> klik icon tanggal</small>
					<span class="input-group-addon" style=""><i class="glyphicon glyphicon-calendar"></i></span>
					
					</div>
				</div>
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label for="nama_depan" style="float: left">Email : <span class="harus">*</span> </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                <small class="note"><b> Contoh : </b> contoh@example.com</small>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label for="nama_depan" style="float: left">Password : <span class="harus">*</span></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <small class="note"><b> Note : </b> Password untuk login</small>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <label for="nama_depan" style="float: left">Ulangi Password : <span class="harus">*</span> </label>
                <input type="password" class="form-control " id="repassword" name="repassword" required placeholder="Ulangi Password" >
                                   
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12" id="notif" name="notif" style="display: none; color: red; margin-top: 5px">
                    Password tidak Sama
                  </div>
              
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label for="nama_depan" style="float: left">Alamat : <span class="harus">*</span> </label>
                <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" style="height:100px" required></textarea>
                <small class="note"><b> Note : </b> Mohon isi alamat lengkap</small>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label for="nama_depan" style="float: left">No. Hp : <span class="harus">*</span> </label>
                <input type="text" class="form-control" pattern="[0-9]{11,12}" id="telepon" name="telepon" placeholder="Telepon" required>
                <small class="note"><b> Note : </b> Numerik 11-12 digit</small>
              </div>
              <hr>
              <div align="left" class="col-md-12 col-sm-12 col-xs-12 form-group ">
                <label for = "alumni">Apakah Anda Almuni ? <span class="harus">*</span></label><br>
                <select name="alumni" id="alumni" class="form-control " required>
                  <option>-- Alumni ? --</option>
                  <option value="Y">Ya</option>
                  <option value="T">Tidak</option>
                </select>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                <div id="kelas_alumni">
                  
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group" >
                
                <select name="kelas" id="kelas" class="form-control " style="display: none" required >
                  <?php 
                    $qkelas = mysqli_query($con,"SELECT * from kelas");
                    while ($dkelas = mysqli_fetch_array($qkelas)){
                  ?>
                  <option value="<?php echo $dkelas['id_kelas'] ?>"><?php echo $dkelas['nama_kelas'] ?></option>
                  <?php } ?>
                </select> 
                
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                  
                <select name="jurusan" id="jurusan" class="form-control " style="display: none" required>
                    <option>-- Pilih Jurusan --</option>
                </select>
              </div>
              
              

              <div class="clearfix"></div>
              <div>
              
                <button type="submit" name="daftar" id="daftar" class="btn btn-default submit">Daftar</button>
              </div>

              <div class="separator">
                <p class="change_link">Sudah menjadi anggota ?
                  <a href="index.php" class="to_register"> Masuk </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  
                  <p>©2016 All Rights Reserved. Matric Maneba</p>
                </div>
              </div>
              
            </form>
          </section>
        </div>
        </div>
        <script src="date/js/bootstrap.min.js"></script>
    <script src="date/js/bootstrap-datepicker.js"></script>
    <script>
    $(".date").datepicker({autoclose: true, todayHighlight: true});
    </script>
    
    <script src="js/bootstrap.min.js"></script>
  <script src="js/cropper/cropper.min.js"></script>
  <script src="js/main.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <script src="vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>
    <script src="vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
  </body>


</html>