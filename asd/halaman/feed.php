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
                <b><h4><?php echo ucwords($dTampilFeed['judul'])?></h4></b>
        <hr>
                    <blockquote class="message" style="font-size: 15px;"><?php echo $dTampilFeed['isi'] ?></blockquote>
                    <input type="hidden" name="id_feed" id="id_feed" value="<?php echo $dTampilFeed['id_feed'] ?>"><br />
                    <div class="row">
                        <div class="x_content">
                          
                          
                        </div>
                        <div style="float:right; margin-right:10px" >
                            <a href="#"><?php
                                $qjumlah = mysqli_query($con, "SELECT count(id_komentar) as a from komentar where id_post = '$id'");
                                $djumlah = mysqli_fetch_array($qjumlah);
                                echo $djumlah['a'];
                            ?> Komentar</a>
                        </div>
                    </div>


                </div>  

            </li>

        </ul>
        
        <div >
            <ul class="list-unstyled msg_list">
                <div id="tampil_komentar">
                    <?php
                        $qkomentar = mysqli_query($con, "SELECT nama,gambar, komentar.isi from user inner join komentar on user.id_user = komentar.id_user  WHERE komentar.id_post = '$id_feed'");
                        while ($dkomentar = mysqli_fetch_array($qkomentar)){
                    ?>
                    <li>
                        <a>
                            <span class="image" >
                            <img src="images/profil/<?php echo $dkomentar['gambar'] ?>" style="margin-left: 5px;" alt="img" />
                            </span>
                            <span>
                            <span><b><?php echo $dkomentar['nama'] ?></b></span>
                            </span>
                            <span class="message" style="margin-left: 40px; font-size:12px; text-align: justify; text-justify: newspaper; padding:0px">
                            <?php echo $dkomentar['isi']; ?>
                            </span>
                        </a>
                    </li> 
                    
                    <?php } ?>

                    <li style="padding-top: 15px;">
                        <div class="avatar" >
                            <img src="images/profil/<?php echo $dataUser['gambar'] ?>" style="width: 35px; height: 35px; margin-left: 10px;" alt="img" />
                        </div>
                        <div class="form-horizontal form-label-left" style="width:100%">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form method="post" action="proses/komentar.php">
                                        <input type="hidden" name="komentator" id="komentator" value="<?php echo $dataUser['id_user']?>">
                                        <input type="hidden" name="id_feed" id="id_feed" value="<?php echo $dTampilFeed['id_feed']?>">
                                        <textarea type="text" id="isi_komentar"  name="isi_komentar" placeholder="Tulis Komentar" class="form-control col-md-12"></textarea>
                                        <button type="submit" style="float : right; margin-top: 5px; margin-right: 0px;" class="btn btn-primary" name="komentar" id="komentar" onclick="komentar(<?php echo $dTampilFeed['id_feed'] ?>,document.getElementById('isi_komentar').value);">Komentar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
    
                </div>
    
  </ul>  
</div>



</div>
</div>
</div>
</div>