<?php 
include 'koneksi.php';
  error_reporting(0);
    $limit = 6;
    $page = $_GET['halaman'];
    if(empty($page)){
     $limit_start  = 0;
     $page = 1;
    }
    else{ 
      $limit_start  = ($page-1) * $limit; 
    }
  
  switch($_GET['kategori']){
    case 'Berita';

    $judul = 'Berita';
    $qpost = mysqli_query ($con, "SELECT * FROM post where status = 'V' and id_kategori = '1' order by tanggal desc limit $limit_start,$limit");
    $hitung= mysqli_query ($con, "SELECT count(*) as jumlah from post where id_kategori = '1' and status = 'V'");
    
    
    break;

    case 'Pengumuman';
    $judul = 'Pengumuman';
    $qpost = mysqli_query ($con, "SELECT * FROM post where status = 'V' and id_kategori = '2' order by tanggal desc limit $limit_start,$limit");
    
    $hitung= mysqli_query ($con, "SELECT count(*) as jumlah from post where id_kategori = '2' and status = 'V'");
    
    
    break;

    case 'Artikel';
    $judul = 'Artikel';
    $qpost = mysqli_query ($con, "SELECT * FROM post where status = 'V' and id_kategori = '3' order by tanggal desc limit $limit_start,$limit");
    $hitung= mysqli_query ($con, "SELECT count(*) as jumlah from post where id_kategori = '3' and status = 'V'");
    
    break;

    case 'Man-Babat';
    $judul = 'Man Babat';
    $qpost = mysqli_query ($con, "SELECT * FROM post where status = 'V' and id_kategori = '4' order by tanggal desc limit $limit_start,$limit");
    $hitung= mysqli_query ($con, "SELECT count(*) as jumlah from post where id_kategori = '4' and status = 'V'");
    
    
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
                <?php while ($dpost  = mysqli_fetch_array($qpost)){ ?>
                <div class="row" style=" margin-bottom:20px; padding-bottom:10px">
                  <div class="col col-md-3 col-sm-3 col-xs-12" style="min-height: 70px;">
                    <center>
                    <span ><img src="si-matric/images/post/medium_<?php echo $dpost['gambar']; ?>" style = "width: 100%; min-height : 70px; height: 100% ; border-radius:4px" ></span>
                  </center>
                  </div>
                  <div class="col col-md-9 col-sm-9 col-xs-12" style="padding-top:5px">
                    <h5><b><a href="
                    <?php if ($dpost[id_kategori] == 2){ ?>
                        pengumuman.php?id=<?php echo base64_encode($dpost['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dpost['judul']) ?>
                    <?php } else { ?>
                        post.php?id=<?php echo base64_encode($dpost['id_post']) ?>&judul=<?php echo str_replace(" ", "-", $dpost['judul']) ?>
                    <?php } ?>
                    
                    "><?php echo $dpost['judul']; ?></a></b></h5>
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

              <?php } ?>
                <center>
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
                    <li><a href="publikasi.php?kategori=<?php echo $_GET['kategori'] ?>?halaman=1">Pertama</a></li>
                    <li><a href="publikasi.php?kategori=<?php echo $_GET['kategori'] ?>?halaman=<?php echo $link_prev; ?>">&laquo;</a></li>
                  <?php
                  }
                ?>

                <!-- link number -->
                <?php
                  // Langkah 3 : Hitung Total data dan halaman serta link 1,2,3..
                  //$paging2 = mysqli_query($con,"select count(*) as jumlah from post where status = 'V'");
                  $get_jumlah = mysqli_fetch_array($hitung);
                  $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                  $jumlah_number = 3;
                  $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                  $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                  for($i = $start_number; $i <= $end_number; $i++){
                    $link_active = ($page == $i)? ' class="active_page"' : '';
                  
                  ?>
                <li><a <?php echo $link_active; ?> href="publikasi.php?kategori=<?php echo $_GET['kategori'] ?>&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                    <li><a href="publikasi.php?kategori=<?php echo $_GET['kategori'] ?>&halaman=<?php echo $link_next; ?>">&raquo;</a></li>
                    <li><a href="publikasi.php?kategori=<?php echo $_GET['kategori'] ?>&halaman=<?php echo $jumlah_page; ?>">Terakhir</a></li>
                  <?php
                  }
                  ?>
              </ul>
            </div>
            </center>
                
                
                
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