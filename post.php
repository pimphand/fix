<?php 
include 'koneksi.php';
$id_post = base64_decode($_GET['id']);
$qpost = mysqli_query ($con, "SELECT * from post where id_post = '$id_post'");
$dpost = mysqli_fetch_array($qpost);
$title = $dpost['judul'];
include 'include/header.php';

?>

<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5a150a5d1942dd001713a088&product=inline-share-buttons' async='async'></script>

<section id="contentbody">
  <div class="container">
    <div class="row">
      <div class=" col-sm-12 col-md-6 col-lg-6">
        <div class="row">
          <div class="leftbar_content">
            <h2>Berita</h2>
            <div class="singlepost_area">
              <div class="singlepost_content"> 
              <span class="stuff_date"><?php echo indo2($dpost['tanggal'])?></span>
                <h2><a href="#"><?php echo $dpost['judul']; ?></a></h2>
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
                <div class="single_stuff_post" > <a href="post.php"><img  src="si-matric/images/post/<?php echo $dpost['gambar']; ?>" alt=""></a> </div>
                <p><?php echo $dpost['isi']; ?></p>
                
                
                
              </div>
            </div>
            <div class="similar_post_area" style=""  >
              <h2 style="">Komentar  <i class="fa fa-thumbs-o-up"></i></h2>
              <div style="padding : 0px 15px;">
              <div style="background-color: white;  padding : 10px 15px;">
              <div id="fb-root" ></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.11&appId=170576130197733';
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                </script>

                <div class="fb-comments"  data-href="https://matric.club/post.php?id=<?php echo $id_post; ?>&judul=<?php echo $title; ?>" data-width="100%" data-numposts="20"></div>
                </div>
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