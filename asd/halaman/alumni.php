
        <?php 
        error_reporting(0);
        switch ($_GET['action']){
        default :
         ?>
          <div class="">
            <div class="page-title">
              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Alumni <small>Matric</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
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
                          <th>Nama</th>
                          <th>Kelas</th>
                          <th>Angkatan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        $qAnggota=mysqli_query ($con,"SELECT * from user where alumni = 'Y' and status = 'V'");
                        while ($dAnggota = mysqli_fetch_array($qAnggota)){
                      ?>
                        <tr>
                          <td><?php echo $dAnggota['nama_depan']." ".$dAnggota['nama_belakang']?></td>
                          <td><?php 
                            $qKelas = mysqli_query($con, "select nama_jurusan as jurusan from jurusan Inner join user on jurusan.id_jurusan = user.id_jurusan WHERE user.id_jurusan = '$dAnggota[id_jurusan]';");
                            $dKelas = mysqli_fetch_array($qKelas);
                            $Kelas = $dKelas['jurusan'];
                            echo $Kelas;
                          ?></td>
                          <td><?php echo $dAnggota['tahun_lulus']?></td>
                          <td><a href="profil.php?id=<?php echo enkripsi($dAnggota['id_user']) ?>" class="btn btn-primary btn-xs"><span class="fa fa-user"></span></a> <a href="?halaman=alumni&action=edit_alumni&id=<?php echo enkripsi($dAnggota['id_user']) ?>" class="btn btn-success btn-xs"><span class="fa fa-edit"></span></a>
                            <a href="#" class="btn btn-danger btn-xs" onclick="confirm_modal('proses/hapus_alumni.php?id=<?php echo enkripsi($dAnggota['id_user']) ?>')"><span class="fa fa-trash"></span></a>
                          </td>
                                                  
                        </tr>
                      <?php } ?>
                      </tbody>
                      <thead>
                        <tr>
                          <th colspan="3"></th>
                          <th><a href="cetak.php?status=alumni" class="btn btn-primary btn-sm"><span class="fa fa-print"></span> Cetak</a></th>
                        </tr>
                      </thead>
                    </table>
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
                case "edit_alumni";
                include "halaman/edit_anggota.php";
                break;
              }
              ?>
             