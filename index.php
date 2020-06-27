<?php 
include 'koneksi.php';
include 'include/header.php'; ?>

    
    <div style="min-height: 50px;">
        <!-- Jssor Slider Begin -->
        
        <style>
            /* jssor slider loading skin spin css */
            .jssorl-009-spin img {
                animation-name: jssorl-009-spin;
                animation-duration: 1.6s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }

            @keyframes jssorl-009-spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }
        </style>
        <div id="slider1_container" style="visibility: hidden; position: relative; margin: 0 auto;
        top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
            </div>

            <!-- Slides Container -->
            <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 1300px; height: 500px; overflow: hidden;">
                <?php 
                    $qslider = mysqli_query($con, "SELECT * from post where status = 'V' order by tanggal desc limit 4");
                    while ($dslider = mysqli_fetch_array($qslider)){
                ?>
                <div>
                    <img style="z-index: -20" data-u="image" src="si-matric/images/post/<?php echo $dslider['gambar'] ?>" />
                    <div style="position: absolute;  right: 50px; bottom: 40px; text-align: right; padding: 20px; max-width: 60%;">
                      <p style="font-size: 25px;  color: #f2f2f2; text-shadow: 0 0 6px rgba(0, 0, 0, 0.8); "><?php echo $dslider['judul'] ?></p>
                      <a href="post.php?id=<?php echo base64_encode($dslider['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dslider['judul']) ?>" style="float: right; background: none; border: 1px solid; color: white;box-shadow: 0 0 6px rgba(0, 0, 0, 0.3);" class="btn ">Read More ...</a>
                    </div>
                </div>
                <?php } ?>
            </div>
            
            <!--#region Bullet Navigator Skin Begin -->
            <!-- Help: https://www.jssor.com/development/slider-with-bullet-navigator.html -->
            <style>
                .jssorb031 {position:absolute;}
                .jssorb031 .i {position:absolute;cursor:pointer;}
                .jssorb031 .i .b {fill:#000;fill-opacity:0.5;stroke:#fff;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.3;}
                .jssorb031 .i:hover .b {fill:#fff;fill-opacity:.7;stroke:#000;stroke-opacity:.5;}
                .jssorb031 .iav .b {fill:#fff;stroke:#000;fill-opacity:1;}
                .jssorb031 .i.idn {opacity:.3;}
            </style>
            <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                    </svg>
                </div>
            </div>
            <!--#endregion Bullet Navigator Skin End -->
        
            <!--#region Arrow Navigator Skin Begin -->
            <!-- Help: https://www.jssor.com/development/slider-with-arrow-navigator.html -->
            <style>
                .jssora051 {display:block;position:absolute;cursor:pointer;}
                .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
                .jssora051:hover {opacity:.8;}
                .jssora051.jssora051dn {opacity:.5;}
                .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
            </style>
            <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                </svg>
            </div>
            <!--#endregion Arrow Navigator Skin End -->

            <a style="display: none" href="https://www.jssor.com">Bootstrap Carousel</a>
        </div>
        <!-- Jssor Slider End -->
    </div>

   
<section id="contentbody" style="margin-top: -30px;">
  <div class="container">
    <div class="row">
      <div class=" col-sm-12 col-md-6 col-lg-6">
        <div class="row">
          <div class="leftbar_content" >
            <h2 style="border-radius: 5px 0 0 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">Berita Terbaru</h2>
            <?php 
              // Cek apakah terdapat data page pada URL
                $limit = 2;
                $page = $_GET['halaman'];
                if(empty($page)){
                 $limit_start  = 0;
                 $page = 1;
                }
                else{ 
                  $limit_start  = ($page-1) * $limit; 
                }
              
             
              
              //$page = (isset($_GET['halaman']))? (int)$_GET['halaman'] : 1;
              // Langkah 1. Tentukan batas, cek halaman dan posisi data.
              
              //$limit_start = ($page - 1) * $limit;
              $qNewBerita = mysqli_query($con,"SELECT * FROM post where status = 'V' and id_kategori = '1' order by tanggal desc limit $limit_start,$limit");
              while ($dNewBerita = mysqli_fetch_array($qNewBerita)){
            ?>
            <div class="single_stuff wow fadeInDown">
              <div class="single_stuff_img" > <a href="post.php"><img   src="si-matric/images/post/<?php echo $dNewBerita['gambar'] ?>" alt=""></a> </div>
              <div class="single_stuff_article">
                <div class="single_sarticle_inner" > <a class="stuff_category" href="#"><?php 
                    $qKategori = mysqli_query($con, "select kategori as kategori from kategori Inner join post on kategori.id_kategori = post.id_kategori WHERE post.id_kategori = '$dNewBerita[id_kategori]';");
                    $dKategori = mysqli_fetch_array($qKategori);
                    $kategori = $dKategori['kategori'];
                    echo $kategori;
                  ?></a>
                  <div class="stuff_article_inner"> <span class="stuff_date"><?php echo indo2($dNewBerita['tanggal'])?></span>
                    <h4><a href="post.php?id=<?php echo base64_encode($dNewBerita['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dNewBerita['judul']) ?>"><?php echo $dNewBerita['judul'] ?></a></h4>
                    <div class="stuff_category_s">
                      <span class="fa fa-user"></span> 
                      <?php 
                        $qPenulis = mysqli_query($con, "select nama as penulis from user Inner join post on user.id_user = post.id_user WHERE post.id_user = '$dNewBerita[id_user]';");
                        $dPenulis = mysqli_fetch_array($qPenulis);
                        $Penulis = $dPenulis['penulis'];
                        echo " ".$Penulis;
                      ?>
                      <span class="fa fa-calendar"></span>
                      <?php echo indo($dNewBerita['tanggal'])?>
                    
                    </div>
                    <p><?php echo substr($dNewBerita['isi'], 0,300)."..."; ?></p>
                    <a href="post.php?id=<?php echo base64_encode($dNewBerita['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dNewBerita['judul']) ?>" class="readmore hvr-bounce-to-right">Baca Selanjutnya ...</a>
                  </div>
                </div>
              </div>
            </div>
            
            <?php } ?>
            
           
            
            <div class="stuffpost_paginatinonarea wow slideInLeft">
              <ul class="newstuff_pagnav">
                <?php
                  if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                  ?>
                    <li><a  class="active_page" href="#">Pertama</a></li>
                    <li><a  class="active_page" href="#">&laquo;</a></li>
                  <?php
                  }else{ // Jika page bukan page ke 1
                    $link_prev = ($page > 1)? $page - 1 : 1;
                  ?>
                    <li><a href="index.php?halaman=1">Pertama</a></li>
                    <li><a href="index.php?halaman=<?php echo $link_prev; ?>">&laquo;</a></li>
                  <?php
                  }
                ?>

                <!-- link number -->
                <?php
                  // Langkah 3 : Hitung Total data dan halaman serta link 1,2,3..
                  $paging2 = mysqli_query($con,"select count(*) as jumlah from post where status = 'V' and id_kategori = 1");
                  $get_jumlah = mysqli_fetch_array($paging2);
                  $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                  $jumlah_number = 8;
                  $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                  $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                  for($i = $start_number; $i <= $end_number; $i++){
                    $link_active = ($page == $i)? ' class="active_page"' : '';
                  
                  ?>
                <li><a <?php echo $link_active; ?> href="index.php?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php
                    }
                  ?>
                <!-- LINK NEXT AND LAST -->
                  <?php
                  // Jika page sama dengan jumlah page, maka disable link NEXT nya
                  // Artinya page tersebut adalah page terakhir 
                  if($page == $jumlah_page){ // Jika page terakhir
                  ?>
                    <li><a  class="active_page" href="#">&raquo;</a></li>
                    <li><a  class="active_page" href="#">Terakhir</a></li>
                  <?php
                  }else{ // Jika Bukan page terakhir
                    $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                  ?>
                    <li><a href="index.php?halaman=<?php echo $link_next; ?>">&raquo;</a></li>
                    <li><a href="index.php?halaman=<?php echo $jumlah_page; ?>">Terakhir</a></li>
                  <?php
                  }
                  ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php include 'include/sidebar.php'; ?>
    </div>

    <div class="row">
      <div class="cd-testimonials-wrapper cd-container wow fadeInUp">
  <ul class="cd-testimonials " style="width: 100%">
    <?php 
      $qTestimoni = mysqli_query($con,"SELECT * from testimoni order by tanggal desc limit 5");
      while ($dTestimoni = mysqli_fetch_array($qTestimoni)){
    ?>
    <li>
      <p><?php echo $dTestimoni['isi'] ?></p>
      <div class="cd-author">
        <?php 
          $qfoto = mysqli_query($con,"SELECT gambar as foto, nama_depan as nama_depan, nama_belakang as nama_belakang from user inner join testimoni on user.id_user = testimoni.id_user where testimoni.id_user = '$dTestimoni[id_user]'");
          $dfoto = mysqli_fetch_array($qfoto);
          $foto = $dfoto['foto'];
        ?>
        <img src="si-matric/images/profil/<?php echo $foto; ?>" alt="Author image">
        <ul class="cd-author-info">
          <li style="font-size: 15px;"><b><?php echo $dfoto['nama_depan']." ".$dfoto['nama_belakang'] ?></b></li>
          <li style="font-size: 12px;">
           
        </li>
        </ul>
      </div>
    </li>  
    <?php } ?> 
  </ul> <!-- cd-testimonials -->

  <a href="#0" class="cd-see-all">Lihat Semua</a>
</div> <!-- cd-testimonials-wrapper -->

<div class="cd-testimonials-all" style="width:100%">
  <div class="cd-testimonials-all-wrapper" style="width:100%">
    <ul>
      <?php 
      $qTestimoni = mysqli_query($con,"SELECT * from testimoni order by tanggal desc");
      while ($dTestimoni = mysqli_fetch_array($qTestimoni)){
    ?>
      <li class="cd-testimonials-item">
        <p><?php echo $dTestimoni['isi'] ?></p>
        
        <div class="cd-author">
          <?php 
            $qfoto = mysqli_query($con,"SELECT gambar as foto, nama_depan as nama_depan, nama_belakang as nama_belakang from user inner join testimoni on user.id_user = testimoni.id_user where testimoni.id_user = '$dTestimoni[id_user]'");
            $dfoto = mysqli_fetch_array($qfoto);
            $foto = $dfoto['foto'];
          ?>
          <img src="si-matric/images/profil/<?php echo $foto; ?>" alt="Author image">
          <ul class="cd-author-info">
            <li style="font-size: 15px;"><b><?php echo $dfoto['nama_depan']." ".$dfoto['nama_belakang'] ?></b></li>
            <li>CEO, CompanyName</li>
          </ul>
        </div> <!-- cd-author -->
      </li>
      <?php } ?> 
      
    </ul>
  </div>  <!-- cd-testimonials-all-wrapper -->

  <a href="#0" class="close-btn">Close</a>
</div> <!-- cd-testimonials-all -->
    </div>
  </div>
</section>

<?php include 'include/footer.php' ?>