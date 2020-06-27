<?php 
$id = deskripsi($_GET['id']);
$qTampilFeed = mysqli_query ($con, "SELECT * From feed where id_feed = '$id'");
$dTampilFeed = mysqli_fetch_array($qTampilFeed);
$id_feed = $dTampilFeed['id_feed'];

?>
<div class="col-md-8 col-sm-8 col-xs-12">

  
  <br><br>
  <div id="tampil-feed">


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


<div class="x_panel" style="margin-top:-38px">
    <div>
        <form method="post" action="proses/edit_feed.php">
        <ul class="messages">
           
            <li>
                <?php 
                $qFotoFeed = mysqli_query($con,"SELECT gambar as foto from user inner join feed on user.id_user=feed.id_user where feed.id_user = '$dTampilFeed[id_user]'");
                $dFotoFeed = mysqli_fetch_array($qFotoFeed);
                ?>
                
                <img src="images/profil/<?php echo $dFotoFeed['foto'] ?>" style="margin-right: 10px;" class="avatar" alt="Avatar">
                <a href="profil.php?id=<?php echo enkripsi($dTampilFeed['id_user']) ?>" class="heading"><b>
                <!-- nAMA -->
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
                <label>Judul : </label>
                <input type="text" class="form-control" name="judul" value="<?php echo $dTampilFeed['judul']?>"><br>
                
                <label>Isi : </label>
                <textarea type="text" class="form-control" name="isi" height="300px" value=""><?php echo $dTampilFeed['isi']?></textarea>
                    <input type="hidden" name="id_feed" id="id_feed" value="<?php echo $dTampilFeed['id_feed'] ?>"><br />
                    
                </div>  

            </li>

        </ul>
        
        <div >
            <input type="submit" class="btn btn-success" value="Update" name ="Perbarui">
        </div>
        </form>



</div>
</div>
</div>
</div>