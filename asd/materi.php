<?php include 'include/header.php' ?>

<?php 
  error_reporting(0);
 switch ($_GET['halaman']) {
   default:
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
                    <h2>Materi <small>Matric</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php if (($_GET['aksi']) == 'hapus_sukses') { 
                    ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Data Berhasil dihapus !</strong>
                    </div>
                    <?php } ?>
                 <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Tanggal</th>
                          <th>Judul</th>
                          <th>File</th>
                          <th>Penulis</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php 

                        $qmateri = mysqli_query ($con, "SELECT * FROM materi");
                        while ($dmateri = mysqli_fetch_array($qmateri)){
                      ?>
                        <tr>
                          <td><?php echo indo($dmateri['tanggal'])." ".date("H:i:s",strtotime($dmateri['tanggal'])); ?></td>
                          <td><?php echo $dmateri['judul']; ?></td>
                          <td><?php echo $dmateri['materi'] ?></td>
                          <td>
                            <?php
                              $qPenulis = mysqli_query($con, "SELECT nama_depan as nama_depan from user inner join materi on user.id_user = materi.id_user where materi.id_user = '$dmateri[id_user]'");
                              $qPenulisNB = mysqli_query($con, "SELECT nama_belakang as nama_belakang from user inner join materi on user.id_user = materi.id_user where materi.id_user = '$dmateri[id_user]'");
                              $dPenulis = mysqli_fetch_array($qPenulis);
                              $dPenulisNB = mysqli_fetch_array($qPenulisNB);
                              $Penulis = $dPenulis['nama_depan'];
                              $PenulisNB = $dPenulisNB ['nama_belakang'];
                              echo $Penulis. " ".$PenulisNB ;
                            ?>
                          </td>
                          
                          <td>
                            <a href="proses/download.php?file=<?php echo $dmateri['materi'] ?>" class="btn btn-success btn-xs"><span class="fa fa-download"></span> Download</a>
                            
                            <?php if (($dmateri['id_user'] == $_SESSION['id']) OR $_SESSION[level] == 2  ){ ?>
                            <a href="#" class="btn btn-danger btn-xs" onclick="confirm_modal('proses/hapus_materi.php?id=<?php echo base64_encode($dmateri['id_materi']); ?>')"><span class="fa fa-trash-o"></span> Hapus</a>
                            
                            <?php } else {} ?>
                          </td>
                          
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

                  <div class="modal fade bs-example-modal-sm" id="modal-hapus" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Apakah Anda yakin ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <a type="button" class="btn btn-primary" id='hapus'>Yakin</a>
                        </div>

                      </div>
                    </div>
                  </div>

<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal-hapus').modal('show', {backdrop: 'static'});
      document.getElementById('hapus').setAttribute('href' , delete_url);
    }
</script>

<?php 
break;
case 'lihat_halaman';
include 'halaman/lihat_publikasi.php';
break;

break;
case 'tambah_materi';
include 'halaman/tambah_materi.php';
break;
}
?>
              
        <!-- /page content -->
<?php include 'include/footer.php' ?>