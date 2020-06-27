<?php $id = deskripsi($_GET['id']) ;
  $qAnggota = mysqli_query($con,"SELECT * from user where id_user ='$id'");
  $dAnggota = mysqli_fetch_array($qAnggota);
?>

<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
  var htmlobjek;
    $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=propinsi>
      $("#status_anggota").change(function(){
        var alumni = $("#status_anggota").val();
        if (alumni == 'Y'){
          $('#hide').hide();
          $('#tampil').show();
        }
        else {
           $('#hide').show();
           $('#tampil').hide();
        }
        $.ajax({
            url: "proses/ganti_alumni.php",
            data: "alumni="+alumni,
            cache: false,
            success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#tampil").html(msg);
            }

        });
      });
     
    });
</script>

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
  
    var checker = document.getElementById('cek');
    var browse = document.getElementById('foto');
    checker.onchange = function(){
      if(this.checked){
        browse.disabled=false;
      } else {
        browse.disabled=true;
      }
    };

</script>

<div class="">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left" action="proses/edit_anggota.php" enctype="multipart/form-data">
          <div class="x_title">
            <h2>Edit Profil <small><?php echo $dAnggota['nama_depan']." ".$dAnggota['nama_belakang']; ?></small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          </div>
          <!--
          <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
              <center>
                <div id="crop-avatar">
                <!-- Current avatar
                  <img class="img-responsive avatar-view" src="images/profil/<?php echo $dAnggota['gambar'] ?>" alt="Avatar" title="Change the avatar">
                  <br>
                  
                </div><br>
              </center>
                <input type="checkbox" id='cek' name="ubah_foto" onchange="document.getElementById('foto').disabled = !this.checked;"> Ceklis jika ingin mengubah foto<br>
                <input type="file" id="foto" name="foto" disabled="disabled" accept="image/*" >
              </div>
            <br />
          </div>
           -->
          <div class="col-md-9 col-sm-12 col-xs-12" >
            <div class="">
              <div class="x_content">
              <form>
                <input type="hidden" name="id" value="<?php echo $dAnggota['id_user'] ?>">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama
                  </label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" id="nama_depan" name="nama_depan" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $dAnggota['nama_depan'] ?>">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" id="nama_belakang" name="nama_belakang" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $dAnggota['nama_belakang'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div id="gender" class="btn-group" data-toggle="buttons">
                        <input type="radio" name="jk" value="Laki-Laki" <?php if ($dAnggota['jk'] == 'Laki-Laki') {echo "checked";} else {} ?> > &nbsp; Laki-Laki &nbsp;
                        <input type="radio" name="jk" value="Perempuan" <?php if ($dAnggota['jk'] == 'Perempuan') {echo "checked";} else {} ?>> Perempuan
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TTL
                  </label>
                  <div class="col col-md-3 col-sm-3 col-xs-12">
                    <input type="text" id="tempat_lahir" name="tempat_lahir" required="required" class="form-control col col-md-3 col-xs-3" value="<?php echo $dAnggota['tempat_lahir'] ?>">
                  </div>
                  <div class="col col-md-3 col-sm-3 col-xs-12">
                    <input type="text" class="form-control" name="tanggal_lahir"  data-inputmask="'mask': '99-99-9999'" value="<?php echo nlahir($dAnggota['tanggal_lahir']) ?>"> 
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea style="height:100px" type="text" id="alamat" name="alamat" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $dAnggota['alamat'] ?>"><?php echo $dAnggota['alamat'] ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. HP
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="no_hp" name="no_hp" required="required" class="form-control col col-md-7 col-xs-12" value="<?php echo $dAnggota['no_hp'] ?>" data-inputmask="'mask': '9999-9999-9999'">
                  </div>
                </div>
              <?php if ($dAnggota['alumni'] == 'Y') { ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status 
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <span class="label label-primary">Alumni</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Dari Kelas </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="kelas_alumni"  class="form-control col-md-7 col-xs-12">
                    <?php 
                      $KelasAlumni = mysqli_query($con,"Select * from jurusan where id_kelas = '3'");
                      while ($dKelasAlumni = mysqli_fetch_array($KelasAlumni)){
                    ?>
                      <option value="<?php echo $dKelasAlumni['id_jurusan'] ?>" <?php if ($dAnggota['id_jurusan'] == $dKelasAlumni['id_jurusan']) {echo "selected";}?>><?php echo $dKelasAlumni['nama_jurusan'] ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tahun Lulus 
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="tahun_lulus" name="tahun_lulus" class="form-control col-md-7 col-xs-12" value="<?php echo $dAnggota['tahun_lulus'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kuliah di  
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="kuliah" name="kuliah"  class="form-control col-md-7 col-xs-12" value="<?php echo $dAnggota['kuliah'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Bekerja di  
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="bekerja" name="bekerja" class="form-control col-md-7 col-xs-12" value="<?php echo $dAnggota['bekerja'] ?>">
                  </div>
                </div>
                
              <?php } else { ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="status_anggota" id="status_anggota" class="form-control col-md-7 col-xs-12">
                      <option value="T" selected="">Siswa</option>
                      <option value="Y">Alumni</option>
                    </select>
                  </div>
                </div>
                <div id="hide">
                <div class="form-group" >
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelas </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="kelas" id="kelas"  class="form-control col-md-7 col-xs-12">
                      <?php
                      $qkelas = mysqli_query($con,"SELECT * from kelas");
                      while ($dkelas = mysqli_fetch_array($qkelas)){
                      ?>
                      <option value="<?php echo $dkelas['id_kelas'] ?>" <?php if ($dAnggota['id_kelas'] == $dkelas['id_kelas']) {echo "selected";} else {} ?>><?php echo $dkelas['nama_kelas'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Jurusan </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="jurusan" id="jurusan" class="form-control col-md-7 col-xs-12">
                      <?php 
                        $qJurusanSiswa = mysqli_query($con,"select * from jurusan where id_kelas = '$dAnggota[id_kelas]'");
                        while ($dJurusanSiswa = mysqli_fetch_array($qJurusanSiswa)){
                      ?>
                        <option value="<?php echo $dJurusanSiswa['id_jurusan'] ?>"<?php if ($dAnggota['id_jurusan'] == $dJurusanSiswa['id_jurusan']) echo "selected"; ?>><?php echo $dJurusanSiswa['nama_jurusan'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                </div>
                <div id="tampil">
                </div>
                
              <?php } ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="fb" name="fb"  class="form-control col-md-7 col-xs-12" value="<?php echo $dAnggota['fb'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Instagram
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="ig" name="ig"  class="form-control col col-md-7 col-xs-12" value="<?php echo $dAnggota['ig'] ?>">
                  </div>
                </div>
                <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-default" type="button">Batal</button>
                      <button type="submit" name="perbarui" class="btn btn-success">Perbarui</button>
                    </div>
                  </div>
                  </form>
                </div>
            </div>

          </div>
          </form>
        </div>
      </div>
    </div>
</div>
