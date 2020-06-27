
<!-- page content -->
 


<?php 
    $id = $_SESSION['id'];
    $qtotal = mysqli_query($con, "SELECT COUNT(id_post) as jumlah from post where  id_user = '$id'");
    $dtotal = mysqli_fetch_array($qtotal);
    $total = $dtotal['jumlah'];
    
    $qberita = mysqli_query($con, "SELECT COUNT(id_post) as jumlah from post where id_kategori = 1  and id_user = '$id'");
    $dberita = mysqli_fetch_array($qberita);
    $berita = $dberita['jumlah'];
    
    $pberita = ($berita/$total)*100;
    $pberita = number_format($pberita,2);
    
    $qartikel = mysqli_query($con, "SELECT COUNT(id_post) as jumlah from post where id_kategori = 3  and id_user = '$id'");
    $dartikel = mysqli_fetch_array($qartikel);
    $artikel = $dartikel['jumlah'];
    
    $partikel = ($artikel/$total)*100;
    $partikel = number_format($partikel,2);
    
    $qpengumuman = mysqli_query($con, "SELECT COUNT(id_post) as jumlah from post where id_kategori = 2  and id_user = '$id'");
    $dpengumuman = mysqli_fetch_array($qpengumuman);
    $pengumuman = $dpengumuman['jumlah'];
    
    $ppengumuman = ($pengumuman/$total)*100;
    $ppengumuman = number_format($ppengumuman,2);
    
    $qmanbabat = mysqli_query($con, "SELECT COUNT(id_post) as jumlah from post where id_kategori = 4  and id_user = '$id'");
    $dmanbabat = mysqli_fetch_array($qmanbabat);
    $manbabat = $dmanbabat['jumlah'];
    
    $pmanbabat = ($manbabat/$total)*100;
    $pmanbabat = number_format($pmanbabat,2);
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title"></div>
        <div class="clearfix"></div>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Publikasiku <small>Matric</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              <th>Tanggal</th>
                              <th>Judul</th>
                              <th>Kategori</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $qPublikasiku = mysqli_query ($con, "SELECT * FROM post where id_user = '$id'");
                                while ($dPubliasiku = mysqli_fetch_array($qPublikasiku)){
                            ?>
                            <tr>
                              <td><?php echo indo($dPubliasiku['tanggal'])." ".date("H:i:s",strtotime($dPubliasiku['tanggal'])); ?></td>
                              <td><?php echo $dPubliasiku['judul']; ?></td>
                              <td><?php 
                                $qKategori = mysqli_query($con, "select kategori as kategori from kategori Inner join post on kategori.id_kategori = post.id_kategori WHERE post.id_kategori = '$dPubliasiku[id_kategori]';");
                                $dKategori = mysqli_fetch_array($qKategori);
                                $kategori = $dKategori['kategori'];
                                echo $kategori;
                              ?></td>
                              
                              <?php
                                if ($dPubliasiku['status'] == 'BV'){
                              ?>
                              <td><span class="label label-danger">Belum Disetujui</span></td>
                              <?php } else if ($dPubliasiku['status'] == 'V') { ?>
                              <td><span class="label label-success">Sudah Disetujui</span></td>
                              <?php } ?>
                              
                              <td><a href="
                              <?php if ($kategori == 'Pengumuman'){ ?>
                            ../pengumuman.php?id=<?php echo base64_encode($dPubliasiku['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dPubliasiku['judul']) ?>
                            <?php } else { ?>
                            ../post.php?id=<?php echo base64_encode($dPubliasiku['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dPubliasiku['judul']) ?>
                            
                            <?php } ?>
                              " class="btn btn-primary btn-xs" target="_blank"><span class="fa fa-eye"></span> Lihat</a> 
                              <?php
                                if ($dPubliasiku['status'] == 'BV'){
                              ?>
                              <a href="?halaman=lihat_halaman&id=<?php echo base64_encode($dPubliasiku['id_post']) ?>" class="btn btn-success btn-xs"><span class="fa fa-edit"></span> Edit</a>
                              <? } else {} ?>
                              <a href="#" class="btn btn-danger btn-xs" onclick="confirm_modal('proses/hapus_publikasi.php?id=<?php echo base64_encode($dPubliasiku['id_post']) ?>')"><span class="fa fa-trash"></span> Hapus</a>
                              </td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="x_panel">
                <div class="x_title">
                    <h2>Statistik <small></small></h2>
                    <div class="clearfix"></div>
                </div>
                
            <div class="x_content">
                <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>Berita</label>
                                <div class="progress">
                                    
                                    <div class="progress-bar progress-bar-danger"  data-transitiongoal="<?php echo $pberita; ?>"><center><b><?php echo $berita; ?></b> (<?php echo $pberita; ?>%)</center></div>
                                </div>
                                <label>Artikel</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" data-transitiongoal="<?php echo $partikel; ?>"><center><?php echo $artikel; ?> (<?php echo $partikel; ?> %)</center></div>
                                </div>
                                <label>Pengumuman</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" data-transitiongoal="<?php echo $ppengumuman; ?>"><center><?php echo $pengumuman; ?> (<?php echo $ppengumuman; ?>%)</center></div>
                                </div>
                                <label>Man Babat</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" data-transitiongoal="<?php echo $pmanbabat; ?>"><center><?php echo $manbabat; ?> (<?php echo $pmanbabat; ?>%)</center></div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-6">
                    
                            </div>
                        </div>
                    </div>
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


              
        <!-- /page content -->
