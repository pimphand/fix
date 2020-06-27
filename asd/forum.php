<?php include 'include/header.php';
 ?>
<?php if ($dataUser['level'] == '1' AND $dataUser['status'] == 'BV') {
echo "<script>
    window.location='proses/keluar.php';
</script>";

}
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function simpan(){
  var isi       = document.getElementById('feed').value;
  var penulis   = document.getElementById('penulis').value;
  var judul   = document.getElementById('judul').value;
  
  if (document.getElementById('judul').value == "") {
    alert("Judul belum diisi");
    return false;
  }
  
  if (document.getElementById('feed').value == "") {
    alert("Tulis bahan diskusi Anda !");
    return false;
  }
  
  
  
    if (window.XMLHttpRequest){
      xmlhttp=new XMLHttpRequest();
    }else{
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
          
    var url = "halaman/back-halaman/feed.php";
    var params = "feed="+isi+"&judul="+judul+"&penulis="+penulis;
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange =  function() {
      $('#tunggu').show();
      document.getElementById('kirim').disabled = true;
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        $('#tunggu').hide();
        document.getElementById('kirim').disabled = false;
        document.getElementById('tampil-feed').innerHTML=xmlhttp.responseText;
        bersih();
      }
    }
    xmlhttp.send(params);
  
}
function bersih(){
  document.getElementById('feed').value = "";
  document.getElementById('judul').value = "";
      
}
</script>


        <!-- /top navigation -->

        <!-- page content -->
<div class="right_col" role="main">
<!-- top tiles -->
  
  

<!-- /top tiles -->


<br />
  <div class="row">
    <!-- Mulai status -->
    <?php 
    error_reporting(0);
    switch ($_GET['halaman']){
    default :
     ?>
    <div class="col-md-8 col-sm-8 col-xs-12">

      <div class="x_panel">
        <div>
        <!-- end of user messages -->
        <ul class="messages">
          <li>
            <img src="images/profil/<?php echo $dataUser['gambar']; ?>" style="margin-right: 10px;" class="avatar" alt="Avatar">
            <a class="heading" href="profil.php?id=<?php echo enkripsi($dataUser['id_user']) ?>" ><b><?php echo $dataUser['nama_depan']. " " . $dataUser['nama_belakang'] ?></b></a><br>
            <small><?php echo indo(date("Y-m-d")) ?></small>
            <div class="message_wrapper" style="margin-top: 24px;">  
              <br />
              <div class="form-group">
                <div class="row">
                  <input type="hidden" name="penulis" id="penulis" value="<?php echo $dataUser['id_user']?>">
                  
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px">
                      <label>Judul : </label>
                      <input type="text" class="form-control col-12" name="judul" id="judul" value="" placeholder="Judul..." required><br>
                      <label>Isi : </label>
                    <textarea type="text" style="height: 150px;" id="feed" name="feed" required="required" placeholder="Tulis bahan diskusi Anda.." class="form-control col-12"></textarea>
                  </div>
                  <div style="float: left; margin-left: 10px">
                   <!-- <input type="file" name="foto">-->
                  </div>

                  <div style="float: right; margin-right: 10px">
                    <img width="20px" src="images/load.gif" id="tunggu" style="display: none; position: absolute; margin-left: -30px; margin-top: 5px;">
                    <button type="submit"  style="width: 100%" class="btn btn-primary" name="kirim" id="kirim" onclick="simpan();"><span class = "fa fa-send"></span> Kirim</button>
                  </div>
                </div>
              </div> 
            </div>
            
          </li>
        </ul>
        </div>
      </div>
      <br><br>
      <div id="tampil-feed">
      <?php include 'halaman/feed_tampil.php' ?>
      </div>
    </div>
    <?php 
break;
case "feed";
include "halaman/feed.php";
break;

case "edit_feed";
include "halaman/edit_feed.php";
break;

}
?>
    <!-- End Status-->
    <div class="col-md-4 col-sm-4 col-xs-12 side-bar">
      <div class="x_panel ">
        <div class="x_title">
          Member Online (<?php 
            $qjOnline = mysqli_query($con,"SELECT count(online) as jumlah from user where online = 'Y' and id_user != '$id'");
            $djOnline = mysqli_fetch_array($qjOnline);
            $jonline = $djOnline['jumlah'];
            echo $jonline;
          ?>)
        </div> 
        <div class="x_content">
          <ul class="list-unstyled msg_list">
            <?php 
              $qOnline = mysqli_query($con, "SELECT * from user where online = 'Y' and id_user != '$id'");
              while ($dOnline = mysqli_fetch_array($qOnline)){
            ?>
            <li class="hvr-forward">
              <a href="profil.php?id=<?php echo enkripsi($dOnline['id_user']) ?>">
                <span class="avatar">
                  <img src="images/profil/<?php echo $dOnline['gambar'] ?>" style="height:45px; margin-right: 10px;" >
                </span>
                <span>
                  <span><b><?php echo $dOnline['nama_depan']. " " .$dOnline['nama_belakang']?></b></span>
                </span>
              </a>
            </li> 
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>
  
 
                <!-- end of weather widget -->
<?php include 'include/footer.php' ?>