<div class="col-sm-6 col-md-2 col-lg-2">
  <div class="row">
    <div class="middlebar_content">
      <h2 class="yellow_bg">Berita Terbaru</h2>
      <div class="middlebar_content_inner">
        <ul class="middlebar_nav wow fadeInDown">
          <?php 
            $qBerita = mysqli_query($con, "SELECT * FROM post where status = 'V' and id_kategori = '1' order by tanggal desc limit 8");
            while ($dBerita = mysqli_fetch_array($qBerita)){
          ?>
          <li> <a class="mbar_thubnail" href="#"><img src="si-matric/images/post/medium_<?php echo $dBerita['gambar'] ?>" alt=""></a> <a class="mbar_title" href="post.php?id=<?php echo base64_encode($dBerita['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dBerita['judul']) ?>"><?php
                if (strlen($dBerita['judul']) >= 27){
                    echo substr($dBerita['judul'], 0,27)." ...";
                } else {
                    echo $dBerita['judul'];
                }
                ?>
                </a> 
          <small class="mbar_title" style="font-size: 11px;"><span class="fa fa-calendar"></span> <?php echo indo($dBerita['tanggal']) ?></small>
          </li>
          <?php } ?>
        </ul>

        <a href="publikasi.php?kategori=Berita" class="btn btn-xs btn-warning" style="float: right; margin-right:10px">Lebih banyak...</a>
      </div>
      
      <h2 class="yellow_bg">Iklan</h2>
      <div class="middlebar_content_inner">
        <ul class="middlebar_nav wow fadeInDown" width="100%">
          <?php 
        $qIklan = mysqli_query($con,"SELECT * FROM iklan limit 3");
        $no=1;
        while ($dIklan = mysqli_fetch_array ($qIklan)){
            echo $dIklan['kode'];
        }
    
      ?>
        </ul>
      </div>
      
        <h2 class="limeblue_bg">Pengumuman</h2>
        <div class="middlebar_content_inner">
        <ul class="middlebar_nav wow fadeInDown">
          <?php 
            $qPengumuman = mysqli_query($con, "SELECT * FROM post where status = 'V' and id_kategori = '2' order by tanggal desc limit 8");
            while ($dPengumuman = mysqli_fetch_array($qPengumuman)){
          ?>
          <li> <a class="mbar_thubnail" href="#"><img src="si-matric/images/post/medium_<?php echo $dPengumuman['gambar'] ?>" alt=""></a> <a class="mbar_title" href="pengumuman.php?id=<?php echo base64_encode($dPengumuman['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dPengumuman['judul']) ?>"><?php 
                
                if (strlen($dPengumuman['judul']) >= 27){
                    echo substr($dPengumuman['judul'], 0,27)." ...";
                } else {
                    echo $dPengumuman['judul'];
                }
                
                ?></a> 
          <small class="mbar_title" style="font-size: 11px;"><span class="fa fa-calendar"></span> <?php echo indo($dPengumuman['tanggal']) ?></small>
          </li>

          <?php } ?>
        </ul>
        <a href="publikasi.php?kategori=Pengumuman" class="btn btn-xs btn-warning" style="float: right; margin-right:10px">Lebih banyak...</a>
      </div>
    </div>
  </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
  <div class="row">
    <div class="rightbar_content">
      <div class="single_blog_sidebar">
        <h2>Man Babat</h2>
        <ul class="featured_nav wow fadeInDown">
          <?php 
            $qMB = mysqli_query($con, "SELECT * FROM post where status = 'V' and id_kategori = '4' order by tanggal desc limit 2");
            while ($dMB = mysqli_fetch_array($qMB)){
          ?>
          <li> <a class="featured_img" href="#"><img src="si-matric/images/post/<?php echo $dMB['gambar'] ?>" alt=""></a>
            <div class="featured_title"> <a class="" href="post.php?id=<?php echo base64_encode($dMB['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dMB['judul']) ?>"><?php
                if (strlen($dMB['judul']) >= 27){
                    echo substr($dMB['judul'], 0,27)." ...";
                } else {
                    echo $dMB['judul'];
                }
            ?></a> 
            <small class="mbar_title" style="font-size: 11px; margin-left: 15px;"><span class="fa fa-calendar"></span> <?php echo indo($dMB['tanggal']) ?></small>
            </div>

          </li>
          <?php } ?>
        </ul>
        <a href="publikasi.php?kategori=Man-Babat" class="btn btn-xs btn-warning" style="float: right; margin-bottom: 15px;  margin-right:25px">Lebih banyak...</a>
      </div>
      <div class="single_blog_sidebar" style="background-color: white; ">
        <h2 style="background-color: #d8d508; color:white">Artikel</h2>
        <ul class="middlebar_nav wow fadeInDown" style="padding:0px 25px;">
          <?php 
            $qArtikel = mysqli_query($con, "SELECT * FROM post where status = 'V' and id_kategori = '3' order by tanggal desc limit 5");
            while ($dArtikel = mysqli_fetch_array($qArtikel)){
          ?>
          <li > <a href="#" class="mbar_thubnail"><img alt="" src="si-matric/images/post/medium_<?php echo $dArtikel['gambar'] ?>"></a> <a href="post.php?id=<?php echo base64_encode($dArtikel['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dArtikel['judul']) ?>" class="mbar_title"><?php 
                if (strlen($dArtikel['judul']) >= 27){
                echo substr($dArtikel['judul'], 0,27)." ...";
                } else {
                    echo $dArtikel['judul'];
                }
                
                ?></a> 
          <small class="mbar_title" style="font-size: 11px;"><span class="fa fa-calendar"></span> <?php echo indo($dArtikel['tanggal']) ?></small>
          </li>
          <?php } ?>
          
        </ul>
        <a href="publikasi.php?kategori=Artikel" class="btn btn-xs btn-warning" style="float: right; margin-bottom: 15px; margin-right:25px">Lebih banyak...</a>
      </div>
      <div class="single_blog_sidebar" style="background-color: white; ">
        <h2 style="background-color: #a50606; color:white">Kategori</h2>
        <ul class="poplr_tagnav wow fadeInDown" >
          <li ><a href="publikasi.php?kategori=Berita">Berita</a></li>
          <li><a href="publikasi.php?kategori=Artikel">Artikel</a></li>
          <li><a href="publikasi.php?kategori=Pengumuman">Pengumuman</a></li>
          <li><a href="publikasi.php?kategori=Man-Babat">Man Babat</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>