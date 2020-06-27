<?php 
include 'koneksi.php';
  error_reporting(0);
  

  switch($_GET['key']){
    case $_GET['key'];
    $judul = 'Pencarian "'.$_GET['key'].'"';
    $qpost = mysqli_query ($con, "SELECT * from post where judul like '%".$_GET['key']."%' and status = 'V'");
    
    
    break;
  }
$title = $judul;
include 'include/header.php';

?>


<section id="contentbody">
  <div class="container">
    <div class="row">
      <div class=" col-sm-12 col-md-6 col-lg-6">
        <div class="row">
          <div class="leftbar_content">
            <h2><?php echo $title; ?></h2>
            <div class="singlepost_area">
              <div class="singlepost_content"> 
              <?php if (mysqli_num_rows($qpost) > 0) { ?>
                <?php while ($dpost  = mysqli_fetch_array($qpost)){ ?>
                <div class="row" style=" margin-bottom:20px; padding-bottom:10px">
                
                  <div class="col col-md-3 col-sm-3 col-xs-12" style="min-height: 80px;">
                    <?php if ($judul == 'Pengumuman')  {?>
                      <span style="padding-top:10px;background-color: #ff8000; width: 100%; min-height : 70px"  class="stuff_date"><?php echo indo2($dpost['tanggal'])?></span>
                    <?php } else { ?>
                    <span ><img src="si-matric/images/post/medium_<?php echo $dpost['gambar']; ?>" style = "width: 100%; min-height : 70px; height: 100%; border-radius:4px"></span>
                    <?php } ?>
                  </div>
                  <div class="col col-md-9 col-sm-9 col-xs-12" style="margin-top:-5px">
                    <h3><a href="
                    <?php if ($dpost[id_kategori] == 2){ ?>
                        pengumuman.php?id=<?php echo base64_encode($dpost['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dpost['judul']) ?>
                    <?php } else { ?>
                        post.php?id=<?php echo base64_encode($dpost['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dpost['judul']) ?>
                    <?php } ?>
                    
                    "><h5><b><?php echo $dpost['judul']; ?></b></h5></a></h3>
                    <a href="#" class="stuff_category_s">

                      <span class="fa fa-heart"></span>
                      <?php 
                          $qKategori = mysqli_query($con, "select kategori as kategori from kategori Inner join post on kategori.id_kategori = post.id_kategori WHERE post.id_kategori = '$dpost[id_kategori]';");
                          $dKategori = mysqli_fetch_array($qKategori);
                          $kategori = $dKategori['kategori'];
                          echo " ".$kategori." ";
                      ?>
                    </a>   
                    <a href="" class="stuff_category_s">
                      <span class="fa fa-user"></span>
                      <?php 
                        $qPenulis = mysqli_query($con, "select nama as penulis from user Inner join post on user.id_user = post.id_user WHERE post.id_user = '$dpost[id_user]';");
                        $dPenulis = mysqli_fetch_array($qPenulis);
                        $Penulis = $dPenulis['penulis'];
                        echo $Penulis;
                      ?>
                    </a>
                  </div>
                </div>

                <?php }
              
                } else {
                ?>  <div >
                    <center>
                        <h4>Data yang Anda cari tidak ditemukan</h4>
                    </center>
                    </div>
                    <div>
                        <img src="images/404.gif" width="100%">
                    </div>
                    
                <?php
                }?>
              
              
                
                
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
      <?php include 'include/sidebar.php'; ?>
    </div>
  </div>
</section>
<?php include 'include/footer.php' ?>