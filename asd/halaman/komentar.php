<?php 
  $komentar = mysqli_query($con,"select * from komentar where id_post = '$dTampilFeed[id_feed]'");
  while ($dkomentar = mysqli_fetch_array($komentar)){
?>
<script type="text/javascript">
  function komentar(id_feed,isi_komentar){
    
    var komentator         = document.getElementById('komentator').value; 
      if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
      }else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
            
      var url = "halaman/komentar1.php";
      var params = "isi_komentar="+isi_komentar+"&komentator="+komentator+"&id_feed="+id_feed;
      xmlhttp.open("POST", url, true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.onreadystatechange = function() {
        
        document.getElementById('komentar').disabled = true;
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById('komentar').disabled = false;
          document.getElementById('tampil_komentar').innerHTML=xmlhttp.responseText;
          bersih1();
        }
      }
      xmlhttp.send(params);
  }
  function bersih1(){
    document.getElementById('isi_komentar').value = "";
        
  }
</script>

<li>
  <a>
    <span class="image" >
      <img src="images/img.jpg" style="margin-left: 5px;" alt="img" />
    </span>
    <span>
      <span><b>John Smith</b></span>
    </span>
    <span class="message" style="margin-left: 50px;">
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
        <input type="hidden" name="komentator" id="komentator" value="<?php echo $dataUser['id_user']?>">
        <textarea type="text" id="isi_komentar"  name="isi_komentar" placeholder="Tulis Komentar" class="form-control col-md-12"></textarea>
        <button type="submit" style="float : right; margin-top: 5px; margin-right: 0px;" class="btn btn-primary" name="komentar" id="komentar" onclick="komentar(<?php echo $dTampilFeed['id_feed'] ?>,document.getElementById('isi_komentar').value);">Komentar</button>
      </div>
    </div>
  </div>
</li>