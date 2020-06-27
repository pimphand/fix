<?php if ($dataUser['level'] == '1') {
echo "<script>
    window.location='publikasi.php?halaman=publikasiku';
</script>";
}
?>

<?php 
    $qtotal = mysqli_query($con, "SELECT COUNT(id_post) as jumlah from post where status = 'V'");
    $dtotal = mysqli_fetch_array($qtotal);
    $total = $dtotal['jumlah'];
    
    $qberita = mysqli_query($con, "SELECT COUNT(id_post) as jumlah from post where id_kategori = 1 AND status = 'V'");
    $dberita = mysqli_fetch_array($qberita);
    $berita = $dberita['jumlah'];
    
    $pberita = ($berita/$total)*100;
    $pberita = number_format($pberita,2);
    
    $qartikel = mysqli_query($con, "SELECT COUNT(id_post) as jumlah from post where id_kategori = 3 AND status = 'V'");
    $dartikel = mysqli_fetch_array($qartikel);
    $artikel = $dartikel['jumlah'];
    
    $partikel = ($artikel/$total)*100;
    $partikel = number_format($partikel,2);
    
    $qpengumuman = mysqli_query($con, "SELECT COUNT(id_post) as jumlah from post where id_kategori = 2 AND status = 'V'");
    $dpengumuman = mysqli_fetch_array($qpengumuman);
    $pengumuman = $dpengumuman['jumlah'];
    
    $ppengumuman = ($pengumuman/$total)*100;
    $ppengumuman = number_format($ppengumuman,2);
    
    $qmanbabat = mysqli_query($con, "SELECT COUNT(id_post) as jumlah from post where id_kategori = 4 AND status = 'V'");
    $dmanbabat = mysqli_fetch_array($qmanbabat);
    $manbabat = $dmanbabat['jumlah'];
    
    $pmanbabat = ($manbabat/$total)*100;
    $pmanbabat = number_format($pmanbabat,2);
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
                        
                        <h2>Data Publikasi <small>Matric</small></h2>
                        
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
                    <!-- ISI -->
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>Tanggal</th>
                                  <th>Judul</th>
                                  <th>Penulis</th>
                                  <th>Kategori</th>
                                  <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                
                                $qPublikasiku = mysqli_query ($con, "SELECT * FROM post where status = 'V'");
                                while ($dPubliasiku = mysqli_fetch_array($qPublikasiku)){
                                ?>
                                <tr>
                                  <td><?php echo indo($dPubliasiku['tanggal'])." ".date("H:i:s",strtotime($dPubliasiku['tanggal'])); ?></td>
                                  <td><?php echo $dPubliasiku['judul']; ?></td>
                                  <td>
                                    <?php
                                      $qPenulis = mysqli_query($con, "SELECT nama_depan as nama_depan from user inner join post on user.id_user = post.id_user where post.id_user = '$dPubliasiku[id_user]'");
                                      $qPenulisNB = mysqli_query($con, "SELECT nama_belakang as nama_belakang from user inner join post on user.id_user = post.id_user where post.id_user = '$dPubliasiku[id_user]'");
                                      $dPenulis = mysqli_fetch_array($qPenulis);
                                      $dPenulisNB = mysqli_fetch_array($qPenulisNB);
                                      $Penulis = $dPenulis['nama_depan'];
                                      $PenulisNB = $dPenulisNB ['nama_belakang'];
                                      echo $Penulis. " ".$PenulisNB ;
                                    ?>
                                  </td>
                                  <td><?php 
                                    $qKategori = mysqli_query($con, "select kategori as kategori from kategori Inner join post on kategori.id_kategori = post.id_kategori WHERE post.id_kategori = '$dPubliasiku[id_kategori]';");
                                    $dKategori = mysqli_fetch_array($qKategori);
                                    $kategori = $dKategori['kategori'];
                                    echo $kategori;
                                  ?></td>
                                  
                                  <td><a href="
                                  <?php if ($kategori == 'Pengumuman'){ ?>
                                ../pengumuman.php?id=<?php echo base64_encode($dPubliasiku['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dPubliasiku['judul']) ?>
                                <?php } else { ?>
                                ../post.php?id=<?php echo base64_encode($dPubliasiku['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dPubliasiku['judul']) ?>
                                
                                <?php } ?>
                                  " class="btn btn-primary btn-xs" target="_blank"><span class="fa fa-eye"></span></a> <a href="?halaman=lihat_halaman&id=<?php echo base64_encode($dPubliasiku['id_post']) ?>" class="btn btn-success btn-xs"><span class="fa fa-edit"></span></a><a href="#" class="btn btn-danger btn-xs" onclick="confirm_modal('proses/hapus_publikasi.php?id=<?php echo base64_encode($dPubliasiku['id_post']) ?>')"><span class="fa fa-trash"></span></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Publikasi <small>Matric</small></h2>
                        
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
