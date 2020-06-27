
<?php include 'include/header.php' ?>
<!-- page content -->
<?php if ($dataUser['level'] == '1') {
echo "<script>
    window.location='forum.php';
</script>";
}
?>
        <div class="right_col" role="main">

        	<!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-users"></i> Total Users</span>
              <?php 
                $qJumlahAnggota = mysqli_query($con,"SELECT count(id_user) as jumlah from user where status ='V'");
                $dJumlahAnggota = mysqli_fetch_array($qJumlahAnggota);
                $JumlahAnggota = $dJumlahAnggota['jumlah'];
              ?>
              <div class="count"><?php echo $JumlahAnggota ?></div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-male"></i> Jumlah Laki-laki</span>
              <?php 
                $qJumlahAnggotaL = mysqli_query($con,"SELECT count(id_user) as jumlah from user where jk ='Laki-Laki' and status = 'V'");
                $dJumlahAnggotaL = mysqli_fetch_array($qJumlahAnggotaL);
                $JumlahAnggotaL = $dJumlahAnggotaL['jumlah'];
              ?>
              <div class="count green"><?php echo $JumlahAnggotaL ?></div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-female"></i> Jumlah Perempuan</span>
              <?php 
                $qJumlahAnggotaP = mysqli_query($con,"SELECT count(id_user) as jumlah from user where jk ='Perempuan'and status = 'V'");
                $dJumlahAnggotaP = mysqli_fetch_array($qJumlahAnggotaP);
                $JumlahAnggotaP = $dJumlahAnggotaP['jumlah'];
              ?>
              <div class="count green"><?php echo $JumlahAnggotaP ?></div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Jumlah Siswa</span>
              <?php 
                $qJumlahSiswa = mysqli_query($con,"SELECT count(id_user) as jumlah from user where alumni = 'T' and status = 'V'");
                $dJumlahSiswa = mysqli_fetch_array($qJumlahSiswa);
                $JumlahSiswa = $dJumlahSiswa['jumlah'];
              ?>
              <div class="count"><?php echo $JumlahSiswa ?></div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-graduation-cap"></i> Jumlah Almuni</span>
              <?php 
                $qJumlahAlumni = mysqli_query($con,"SELECT count(id_user) as jumlah from user where alumni = 'Y' and status = 'V'");
                $dJumlahAlumni = mysqli_fetch_array($qJumlahAlumni);
                $JumlahAlumni = $dJumlahAlumni['jumlah'];
              ?>
              <div class="count"><?php echo $JumlahAlumni;?></div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-file "></i> Jumlah Publikasi</span>
              <?php 
                $qJumlahPublikasi = mysqli_query($con,"SELECT count(id_post) as jumlah from post where status = 'V'");
                $dJumlahPublikasi = mysqli_fetch_array($qJumlahPublikasi);
                $JumlahPublikasi = $dJumlahPublikasi['jumlah'];
              ?>
              <div class="count"><?php echo $JumlahPublikasi;?></div>
              
            </div>
          </div>
          <!-- /top tiles -->
          <div class="">
            


            <div class="clearfix"></div>
            <br>
            
            <div class="row">
             
            </div>
            
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Permintaan Anggota <small>Matric</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Status</th>
                          <th>Kelas</th>
                          <th>Jenis Kelamin</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $qAnggotaUnVer = mysqli_query($con,"SELECT * FROM user WHERE status = 'BV'");
                        while ($dataAnggotaUnVer = mysqli_fetch_array ($qAnggotaUnVer)){


                      ?>
                        <tr>
                          <td><?php echo $dataAnggotaUnVer['nama_depan'] . " ". $dataAnggotaUnVer['nama_belakang'] ?></td>
                          <td><?php if ($dataAnggotaUnVer['alumni'] == 'Y'){ ?>
                                <span class="label label-primary">Alumni</span>
                              <?php } else if ($dataAnggotaUnVer['alumni'] == 'T') { ?>
                                <span class="label label-warning">Siswa</span>
                              <?php } ?>
                          </td>
                          <td>
                            <?php 
                              $qKelasAlumni = mysqli_query ($con, "SELECT nama_jurusan as jurusan from jurusan inner join user on jurusan.id_jurusan = user.id_jurusan where user.id_jurusan = '$dataAnggotaUnVer[id_jurusan]'");
                              $dKelasAlumni = mysqli_fetch_array($qKelasAlumni);
                              $KelasAlumni = $dKelasAlumni['jurusan'];
                              echo $KelasAlumni;
                            ?>
                          </td>
                          <td><?php echo $dataAnggotaUnVer['jk'] ?></td>
                          <td><a href="profil.php?id=<?php echo enkripsi($dataAnggotaUnVer['id_user']) ?>" class="btn btn-primary btn-xs"><span class="fa fa-list"></span> Detail</a>
                          <a href="proses/setujui.php?id=<?php echo enkripsi($dataAnggotaUnVer['id_user']) ?>" class="btn btn-success btn-xs" onclick="return konfirmasi('Setujui <?php echo $dataAnggotaUnVer['nama'];?> ?')"><span class="fa fa-check"></span> Setujui</a>
                          <a href="proses/tolak.php?id=<?php echo enkripsi($dataAnggotaUnVer['id_user']) ?>" class="btn btn-danger btn-xs" onclick="return konfirmasi('Tolak <?php echo $dataAnggotaUnVer['nama'];?> ?')"><span class="fa fa-close"></span> Tolak</a>
                          </td>
                        </tr>
                       <?php } ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Permintaan Publikasi</h2>
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
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          
                          <th>Judul</th>
                          <th>Tanggal</th>
                          <th>Penulis</th>
                          <th>Kategori</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                          $qPublikasiku = mysqli_query ($con, "SELECT * FROM post where status = 'BV'");
                          while ($dPubliasiku = mysqli_fetch_array($qPublikasiku)){
                        ?>
                          <tr>
                            
                            <td><?php echo $dPubliasiku['judul']; ?></td>
                            <td><?php echo date("d F Y H:i:s",strtotime($dPubliasiku['tanggal'])); ?></td>
                            <td><?php 
                              $qPenulisNamaDepan = mysqli_query($con, "select nama_depan as nama_depan from user Inner join post on user.id_user = post.id_user WHERE post.id_user = '$dPubliasiku[id_user]';");
                              $dPenulisNamaDepan = mysqli_fetch_array($qPenulisNamaDepan);

                              $qPenulisNamaBelakang = mysqli_query($con, "select nama_belakang as nama_belakang from user Inner join post on user.id_user = post.id_user WHERE post.id_user = '$dPubliasiku[id_user]';");
                              $dPenulisNamaBelakang = mysqli_fetch_array($qPenulisNamaBelakang);
                              $Penulis = $dPenulisNamaDepan['nama_depan']." ".$dPenulisNamaBelakang['nama_belakang'];
                              echo $Penulis;
                            ?></td>
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
                            
                            " class="btn btn-primary btn-xs" target="_blank"><span class="fa fa-eye"></span> Lihat</a> 
                            <a href="publikasi.php?halaman=lihat_halaman&id=<?php echo base64_encode($dPubliasiku['id_post']) ?>" class="btn btn-default btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="proses/setujui_publikasi.php?id=<?php echo base64_encode($dPubliasiku['id_post']) ?>" class="btn btn-success btn-xs" onclick="return konfirmasi('Setujui <?php echo $dPubliasiku['judul'];?> ?')"><span class="fa fa-check"></span> Setujui</a>
                            <a href="proses/hapus_publikasi.php?id=<?php echo base64_encode($dPubliasiku['id_post']) ?>" class="btn btn-danger btn-xs" onclick="return konfirmasi('Hapus <?php echo $dPubliasiku['judul'];?> ?')"><span class="fa fa-trash"></span> Hapus</a>
                            </td>
                            
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
            
          </div>

        </div>
            

              
        <!-- /page content -->

<?php include 'include/footer.php' ?>