<?php include 'include/header.php' ;
?>

<?php  
$id=deskripsi($_GET['id']);
$qprofil = mysqli_query($con,"Select * from user where id_user = '$id'");
$dprofil = mysqli_fetch_array($qprofil);
$pketemu = mysqli_num_rows($qprofil);
  if ($pketemu==0){
    echo "<script>
      window.location='home.php'
    </script>";
  }
?>
<!-- page content -->
<div class="right_col" role="main">
  <?php 
    error_reporting(0);
    switch ($_GET['halaman']) {
    default : 
  ?>
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <?php if ($_SESSION['id'] == $id) { ?>
            <h2>Profilku <small>Activity report</small></h2>
            <?php } else { ?>
            <h2>Profil </h2>
            <?php } ?>
            <div class="clearfix"></div>
          </div>
          <?php 
            error_reporting(0);
            if ($_GET['info'] == enkripsi('profil_terupdate')) { 
          ?>
          <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Profil berhasil diperbarui.</strong>
          </div>
          <?php } ?>

          <div class="x_content">
            <!-- MULAI KONTEN NAMA DAN FOTO PROFIL -->
            <div class="col-md-3 col-sm-3 col-xs-12 ">
              <center>
                <div class="container" id="crop-avatar">

    <!-- Current avatar -->
    <div class="avatar-view" <?php if (($_SESSION['id'] == $id) or ($dataUser['level']) == '2') { ?> title="Ubah Foto" <?php } else {} ?>>
      <img src="images/profil/<?php echo $dprofil['gambar'] ?>" alt="Avatar" >
    </div>

    <!-- Cropping modal -->
 
  <?php if (($_SESSION['id'] == $id) or ($dataUser['level']) == '2') { ?>
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
          </form>
        </div>
      </div>
    </div><!-- /.modal -->
    <?php } else {} ?>

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
  </div>
                <h4><b><?php echo $dprofil['nama_depan']. " ". $dprofil['nama_belakang'] ?></b></h4>
                
                <ul class="list-unstyled user_data">
                  <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $dprofil['alamat'] ?>
                  </li>
                  <?php if ($dprofil['alumni'] == 'Y'){ ?>
                  <li>
                    <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $dprofil['bekerja'] ?>
                  </li>
                  <?php } else { ?>
                  <li>
                    <i class="fa fa-mortar-board user-profile-icon"></i>
                    <?php
                          $qKelasAlumni = mysqli_query ($con, "SELECT nama_jurusan as jurusan from jurusan inner join user on jurusan.id_jurusan = user.id_jurusan where user.id_jurusan = '$dprofil[id_jurusan]'");
                          $dKelasAlumni = mysqli_fetch_array($qKelasAlumni);
                          $KelasAlumni = $dKelasAlumni['jurusan'];
                          echo $KelasAlumni;
                        ?>
                  </li>
                  <?php } ?>

                  <li class="m-top-xs">
                    <i class="fa fa-facebook"></i>
                    <a href="http://<?php echo $dprofil['fb'] ?>" target="_blank"><?php echo $dprofil['fb'] ?></a>
                  </li>
                </ul>

                <?php if (($_SESSION['id'] == $id) or ($dataUser['level']) == '2') { ?>
                <a href="?halaman=edit_profil&id=<?php echo enkripsi($id) ?>" class="btn btn-primary"><i class="fa fa-edit m-right-xs"></i> Edit Profil</a>
                <?php } else {} ?>
                </center>
              <br />
              <!-- AKHIR KONTWN -->
            </div>

            <div class="col-md-9 col-sm-12 col-xs-12">
      	      <div class="">
                <div class="x_panel">
                  <!-- JUDUL DETAIL PROFIL -->
                  <div class="x_title">
                    <h2>Detail Profil</h2>
                    <h2 style="float: right; font-size: 14px;"><span class="fa fa-check"></span><b> Terdaftar Pada : <?php echo indo($dprofil['tanggal_daftar'])." ".date("H:i:s",strtotime($dprofil['tanggal_daftar'])); ?></b></h2>
                    <div class="clearfix"></div>
                  </div>

                  <!-- ISI DETAIL PROFIL -->
                  <div class="x_content">
                    <table class="table">
                      <tr>
                        <input type="hidden" name="id_profil" value="<?php echo $id ?>">
                        <td>Nama </td>
                        <td>: </td>
                        <td><?php echo $dprofil['nama_depan']." ".$dprofil['nama_belakang'] ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin </td>
                        <td>: </td>
                        <td><?php echo $dprofil['jk'] ?></td>
                      </tr>
                      <tr>
                        <?php if ($dprofil['alumni'] == 'Y'){ ?>
                        <td><span class="label label-primary">Alumni</span> </td>
                        <?php } else  { ?>
                        <td><span class="label label-warning">Siswa</span> </td>
                        <?php } ?>
                        <td>: </td>
                        <td><?php
                          $qKelasAlumni = mysqli_query ($con, "SELECT nama_jurusan as jurusan from jurusan inner join user on jurusan.id_jurusan = user.id_jurusan where user.id_jurusan = '$dprofil[id_jurusan]'");
                          $dKelasAlumni = mysqli_fetch_array($qKelasAlumni);
                          $KelasAlumni = $dKelasAlumni['jurusan'];
                          echo $KelasAlumni;
                        ?></td>
                      </tr>
                      <tr>
                        <td>TTL </td>
                        <td>: </td>
                        <td><?php echo $dprofil['tempat_lahir'].", ".indo($dprofil['tanggal_lahir']) ?></td>
                      </tr>
                      <tr>
                        <td>Alamat </td>
                        <td>: </td>
                        <td><?php echo $dprofil['alamat'] ?></td>
                      </tr>
                      <tr>
                        <td>Email </td>
                        <td>: </td>
                        <td><?php echo $dprofil['email'] ?></td>
                      </tr>
                      <tr>
                        <td>No. Hp </td>
                        <td>: </td>
                        <td><?php echo $dprofil['no_hp'] ?></td>
                      </tr>
                      <?php if ($dprofil['alumni'] == 'Y'){ ?>
                      <tr>
                        <td>Angkatan </td>
                        <td>: </td>
                        <td><?php echo $dprofil['tahun_lulus']?></td>
                      </tr>
                      <tr>
                        <td>Kuliah </td>
                        <td>: </td>
                        <td><?php echo $dprofil['kuliah']?></td>
                      </tr>
                      <tr>
                        <td>Bekerja </td>
                        <td>: </td>
                        <td><?php echo $dprofil['bekerja']?></td>
                      </tr>
                      <?php } else {} ?>
                      <tr>
                        <td>Facebook </td>
                        <td>: </td>
                        <td><?php echo $dprofil['fb']?></td>
                      </tr>
                      <tr>
                        <td>Instagram </td>
                        <td>: </td>
                        <td><?php echo $dprofil['ig']?></td>
                      </tr>
                      
                    </table>
                    <div style="float:right">
                      <?php if ($_SESSION['id'] != $id  AND $dataUser['level'] == 2) { 
                            if ($dprofil['status'] == 'BV'){
                      ?>
                      
                        <a href="proses/tolak.php?id=<?php echo enkripsi($dprofil['id_user']) ?>" class="btn btn-danger" onclick="return konfirmasi('Tolak <?php echo $dprofil['nama'];?> ?')"><i class="fa fa-close m-right-xs"></i> Tolak</a>
                      <?php 
                            } else {
                                ?>
                        <?php if ($dprofil['level'] == '1'){ ?>
                        <a href="proses/jadikan_admin.php?id=<?php echo enkripsi($dprofil['id_user']) ?>" class="btn btn-info" onclick="return konfirmasi('Jadikan <?php echo $dprofil['nama'];?> sebagai Admin ?')"><i class="fa fa-user m-right-xs"></i> Jadikan Admin !</a>     
                        
                        <?php } else if ($dprofil['level'] == '2'){  ?>
                        
                        <a href="proses/batal_jadikan_admin.php?id=<?php echo enkripsi($dprofil['id_user']) ?>" class="btn btn-warning" onclick="return konfirmasi('Jadikan <?php echo $dprofil['nama'];?> sebagai User kembali ?')"><i class="fa fa-user m-right-xs"></i> Jadikan User !</a>
                        
                        <?php } ?>
                        <a href="proses/hapus_anggota.php?id=<?php echo enkripsi($dprofil['id_user']) ?>" class="btn btn-danger" onclick="return konfirmasi('Hapus <?php echo $dprofil['nama'];?> ?')"><i class="fa fa-trash m-right-xs"></i> Hapus</a>
                        <?php
                            }
                      } ?>
                      <?php if ($dprofil['status'] == 'BV'){ ?>
                      <a href="proses/setujui.php?id=<?php echo enkripsi($dprofil['id_user']) ?>" class="btn btn-success" onclick="return konfirmasi('Setujui <?php echo $dprofil['nama'];?> ?')"> <i class="fa fa-check m-right-xs"></i> Setujui</a>
                      <?php } else {} ?>
                    </div>
                  </div>
                  <!-- AKHIR X-PANEL -->
                </div>
              </div>        
            </div>
          </div>
        </div>
      </div>
     
    </div>

    <!--<div class="row">
      <div class="col col-md-12">
        <div class="x_panel">
          
          <div class="x_title">
            <?php if ($_SESSION['id'] == $id) { ?>
            <h2>Data Publikasiku </h2>
            <?php }else {?>
            <h2>Data Publikasi <small><?php echo $dprofil['nama_depan']." ".$dprofil['nama_belakang'] ?></small> </h2>
            <?php } ?>
            <div class="clearfix"></div>
          </div>

          
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <?php if ($_SESSION['id'] == $id) { ?>
                  <th>Status</th>
                  <th>Aksi</th>
                  <?php }else{} ?>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $qPublikasiProfil = mysqli_query($con, "SELECT * from post where id_user = '$id'");
                  while ($dPublikasiProfil = mysqli_fetch_array($qPublikasiProfil)){
                 ?>
                <tr>
                  <td><?php echo indo($dPublikasiProfil['tanggal'])." ".date("H:i:s",strtotime($dPublikasiProfil['tanggal'])); ?></td>
                  <td><?php echo $dPublikasiProfil['judul'] ?></td>
                  <td><?php 
                    $qKategori = mysqli_query($con, "select kategori as kategori from kategori Inner join post on kategori.id_kategori = post.id_kategori WHERE post.id_kategori = '$dPublikasiProfil[id_kategori]';");
                    $dKategori = mysqli_fetch_array($qKategori);
                    $kategori = $dKategori['kategori'];
                    echo $kategori;
                  ?></td>
                  <?php if ($_SESSION['id'] == $id) { ?>
                  <?php
                    if ($dPublikasiProfil['status'] == 'BV'){
                  ?>
                  <td><span class="label label-danger">Belum Disetujui</span></td>
                  <?php } else if ($dPublikasiProfil['status'] == 'V') { ?>
                  <td><span class="label label-success">Sudah Disetujui</span></td>
                  <?php } ?>
                  <td><a href="" class="btn btn-success btn-xs">Edit</a> <a href="" class="btn btn-danger btn-xs">Hapus</a></td>
                  <?php } else {} ?>
                </tr>
               <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- AKHIR KONTEN PUBLIKASI -->
        </div>
      </div>
    </div>
  </div>
      
          
      <?php 
        break;
        case "edit_profil";
        include "halaman/edit_profil.php";
        break;
      } ?>
</div>
<script src="js/jquery.min.js"></script>
        <!-- /page content -->


<?php include 'include/footer.php' ?>