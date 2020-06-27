<?php 
  
  $qTampilFeed = mysqli_query ($con, "SELECT * From feed order by tanggal_feed desc");
  while ($dTampilFeed = mysqli_fetch_array($qTampilFeed)){
    $id_feed = $dTampilFeed['id_feed'];
   
?>

<style>
    .feed_o_green{
        color:#b1bfd6;
        padding : 5px;
        border-radius:2px;
    }
    
    .feed_o_green:hover{
        color:white;
        background:#7cdd7c;
    }
    
    .feed_o_red{
        color:#b1bfd6;
        padding : 5px;
        margin-right:3px;
        border-radius:2px;
    }
    
    .feed_o_red:hover{
        color:white;
        background:#dd7c7c;
    }
    
    
</style>


  <div class="x_panel">
      
  <div>
    <ul class="messages">
        <?php if (($_SESSION['id'] == $dTampilFeed['id_user']) or ($dataUser['level']) == '2') { ?>
        <li  style="float:right">
            <a href="forum.php?halaman=edit_feed&id=<?php echo enkripsi( $dTampilFeed['id_feed']); ?>">
                <span class="fa fa-pencil-square-o feed_o_green"></span>
            </a>
            
            <a href="proses/hapus_feed.php?id=<?php echo enkripsi($dTampilFeed['id_feed']) ?>" onclick="return konfirmasi('Hapus <?php echo $dTampilFeed['judul'];?> ?')">
                <span class="fa fa-trash feed_o_red"></span>
            </a>
        </li>
        <?php } ?>
      <li>

        <?php 
          $qFotoFeed = mysqli_query($con,"SELECT gambar as foto from user inner join feed on user.id_user=feed.id_user where feed.id_user = '$dTampilFeed[id_user]'");
          $dFotoFeed = mysqli_fetch_array($qFotoFeed);
        ?>
        <img src="images/profil/<?php echo $dFotoFeed['foto'] ?>" style="margin-right: 10px;" class="avatar" alt="Avatar">
        <a href="profil.php?id=<?php echo enkripsi($dTampilFeed['id_user']) ?>" class="heading"><b>
          <?php 
            $qNamaFeed = mysqli_query($con, "select nama_depan as nama_depan from user inner join feed on user.id_user = feed.id_user where feed.id_user = '$dTampilFeed[id_user]'");
            $qNamaFeedb = mysqli_query($con, "select nama_belakang as nama_belakang from user inner join feed on user.id_user = feed.id_user where feed.id_user = '$dTampilFeed[id_user]'");
            $dnamaFeed = mysqli_fetch_array($qNamaFeed);
            $dnamaFeedb = mysqli_fetch_array($qNamaFeedb);
            echo $dnamaFeed['nama_depan']." ".$dnamaFeedb['nama_belakang'];
          ?>

        </b></a><br>
        <small><?php echo indo($dTampilFeed['tanggal_feed'])." ".date("H:i",strtotime($dTampilFeed['tanggal_feed'])) ?></small>
        <div class="message_wrapper" style="margin-top: 24px;"> 
        <b><h4><?php echo ucwords($dTampilFeed['judul'])?></h4></b>
        <hr>
          <blockquote class="message" style="font-size: 15px;"><?php echo $dTampilFeed['isi'] ?></blockquote>
          <input type="hidden" name="id_feed" id="id_feed" value="<?php echo $dTampilFeed['id_feed'] ?>">
          <br />
          <div class="row">
            <div class="x_content">
              <ul class="list-unstyled msg_list">
              <div id="tampil_komentar">
                <?php //include 'komentar.php'; ?>
                
              </div>
                
              </ul>
              
            </div>
            <div style="float:right; margin-right:10px" >
                <a href="#"><?php
                                $qjumlah = mysqli_query($con, "SELECT count(id_komentar) as a from komentar where id_post = '$id_feed'");
                                $djumlah = mysqli_fetch_array($qjumlah);
                                echo $djumlah['a'];
                            ?> Komentar</a>
            </div>
          </div>
          
        </div>  
        
      </li>
      
    </ul>
    <div >
        <center><a href="forum.php?halaman=feed&id=<?php echo enkripsi( $dTampilFeed['id_feed']); ?>"><span class="fa fa-eye"> </span> Lihat</a></center>
    </div>
    
   
   
  </div>
</div>


<?php } ?>