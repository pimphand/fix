<?php 
$id=base64_decode($_GET['id']);
$qDetailPublikasi = mysqli_query ($con, "SELECT * from post where id_post = '$id'");
$dDetailPublikasi = mysqli_fetch_array($qDetailPublikasi);
?>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript">
		$( document ).ready(function() {
				$(":radio.kategori").click(function(){
					$("#filepengumuman").hide();
					if($(this).val() == "2"){
						$("#filepengumuman").show();
					}else{
						$("#filepengumuman").hide();
					}
				});
			});
		</script>

<script type="text/javascript">
  
    var checker = document.getElementById('cek');
    var browse = document.getElementById('foto');
    checker.onchange = function(){
      if(this.checked){
        browse.disabled=false;
      } else {
        browse.disabled=true;
      }
    };

</script>








<div class="right_col" role="main">
  <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
        <h2>Detail Publikasi </h2>
          
        <div class="clearfix"></div>
      </div>
      
      <div class="x_content">
        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">  
          <br />
          <form id="demo-form" method="POST" action="proses/edit_publikasi.php" data-parsley-validate enctype="multipart/form-data">
            <input type="hidden" name="id_post" value="<?php echo $dDetailPublikasi['id_post'] ?>">
            <label for="judul">Judul : </label>
            <input type="text" id="judul" placeholder="Judul" class="form-control" name="judul" value="<?php echo $dDetailPublikasi['judul'] ?>" /><br>
            <label for="penulis">Penulis : </label>
            <?php
              $qPenulis = mysqli_query($con, "SELECT nama_depan as nama_depan from user inner join post on user.id_user = post.id_user where post.id_user = '$dDetailPublikasi[id_user]'");
              $qPenulisNB = mysqli_query($con, "SELECT nama_belakang as nama_belakang from user inner join post on user.id_user = post.id_user where post.id_user = '$dDetailPublikasi[id_user]'");
              $dPenulis = mysqli_fetch_array($qPenulis);
              $dPenulisNB = mysqli_fetch_array($qPenulisNB);
              $Penulis = $dPenulis['nama_depan'];
              $PenulisNB = $dPenulisNB ['nama_belakang'];
              
            ?>
            <input type="text" disabled="" name="penulis" class="form-control" value="<?php echo $Penulis. " ".$PenulisNB ;?>"><br>
            <label for="isi">Isi : </label>
            <textarea class="ckeditor" type="text" id="isi"  class="form-control" name="isi"/> <?php echo $dDetailPublikasi['isi'] ?>
            </textarea><br>
            <div align="left" class="form-group ">
                <label for="kategori">Kategori</label><br>
                <input type="radio" class="kategori" name="kategori" id="berita" value="1" <?php if($dDetailPublikasi['id_kategori'] == '1'){echo "checked";} else {} ?> /> : Berita <br>
                <input type="radio" class="kategori" name="kategori" id="pengumuman" value="2"  <?php if($dDetailPublikasi['id_kategori'] == '2'){echo "checked";} else {} ?> /> : Pengumuman <br>
                <input type="radio" class="kategori" name="kategori" id="berita" value="3" <?php if($dDetailPublikasi['id_kategori'] == '3'){echo "checked";} else {} ?>/> : Artikel <br>
                <input type="radio" class="kategori" name="kategori" id="berita" value="4" <?php if($dDetailPublikasi['id_kategori'] == '4'){echo "checked";} else {} ?> /> : Man Babat <br>
                
              </div>
            <label for="judul">Foto : </label><br>
            <img width="100%" style="max-width: 300px" src="images/post/<?php echo $dDetailPublikasi['gambar'] ?>"><br>
            <input type="checkbox" id='cek' name="ubah_foto" onchange="document.getElementById('foto').disabled = !this.checked;"> Ceklis jika ingin mengubah foto<br>
            <input type="file" id="foto" name="foto" accept="image/*" disabled="disabled" required="" /><br>
            
            
            <?php if($dDetailPublikasi['id_kategori'] == '2') { ?>
                <div id="filepengumuman" style="display:block">
                    <label for="isi">File : <?php echo $dDetailPublikasi['file']; ?></label>
                     (file lama Anda)
                <input type="file"  name="filepengumuman"     />
                <small><b>Filetype : </b>doc, pdf</small>
                </div><br>
            <?php } else { ?>
                <div id="filepengumuman" style="display:none">
                    <label for="isi">File : <?php echo $dDetailPublikasi['file']; ?></label>
                     (file lama Anda)
                <input type="file"  name="filepengumuman"     />
                <small><b>Filetype : </b>doc, pdf</small>
                </div><br>
            <?php } ?>
            <input type="submit" class="btn btn-primary" id='simpan' name="tambah_berita" value="Simpan">
            <a href="#" class="btn btn-danger" name="tambah_berita" >Hapus</a>
          </form>
        </div>
        
      </div>
    </div>
  </div>
  
