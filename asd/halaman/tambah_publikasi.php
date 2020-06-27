<?php session_start(); ?>
<div class="right_col" role="main">
	<div class="">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
				<h2>Tambah Publikasi </h2>
			    
				<div class="clearfix"></div>
			</div>
			
			<div class="x_content">
				<div class="" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
						<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Berita</a>
						</li>
						<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pengumuman</a>
						</li>
						<li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Artikel</a>
						</li>
						<li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Man Babat</a>
						</li>
					</ul>

					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">  
							<br />
							<form id="demo-form" method="POST" action="proses/tambah_publikasi.php" data-parsley-validate enctype="multipart/form-data">
							  <label for="judul">Judul : </label>
							  <input type="text" id="judul" placeholder="Judul" class="form-control" name="judul" required /><br>
							  <input type="hidden" name="penulis" value="<?php echo $dataUser['id_user']?>">
							  <input type="hidden" name="tanggal" value="<?php 
							  date_default_timezone_set("Asia/Jakarta");
							  $tanggal=date("Y-m-d H:i:s"); echo $tanggal ?>">
							  <label for="isi">Isi : </label>
							  <textarea class="ckeditor" type="text" id="isi"  class="form-control" name="isi" required /> 
							  </textarea><br>
							  <label for="judul">Foto : </label>
							  <input type="file" id="foto_pub" name="foto_berita" accept="image/*"  /><br>
							  <input type="submit" class="btn btn-primary" name="tambah_berita"  value="Kirim">
							</form>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
						  <br />
						    <form id="demo-form" method="POST" action="proses/tambah_publikasi.php" data-parsley-validate enctype="multipart/form-data">
						      <label for="judul">Judul : </label>
						      <input type="text" id="judul" placeholder="Judul" class="form-control" name="judul" required /><br>
						      <input type="hidden" name="penulis" value="<?php echo $dataUser['id_user']?>">
						      <input type="hidden" name="tanggal" value="<?php 
							  date_default_timezone_set("Asia/Jakarta");
							  $tanggal=date("Y-m-d H:i:s"); echo $tanggal ?>">
						      <label for="isi">Isi : </label>
						      <textarea class="ckeditor" type="text" id="isi"  class="form-control" name="isi" required /> 
						      </textarea><br>
						      <label for="judul">Foto : </label>
						      <input type="file" id="foto_pub" name="foto_pengumuman" accept="image/*"  />
						      <span><b>Image File (*jpg,*png)</b></span>
						      <br>
						      <br>
						      <label for="judul">File : </label>
						      <input type="file" id="file_pub" name="file" accept=""  />
						      <span><b>Doc File (*doc,*pdf,*xls)</b></span>
						      <br>
						      <br>
						      <input type="submit" class="btn btn-primary" name="tambah_pengumuman" value="Kirim">
						    </form>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
						  <br />
						    <form id="demo-form" method="POST" action="proses/tambah_publikasi.php" data-parsley-validate enctype="multipart/form-data">
						      <label for="judul">Judul : </label>
						      <input type="text" id="judul" placeholder="Judul" class="form-control" name="judul" required /><br>
						      <input type="hidden" name="penulis" value="<?php echo $dataUser['id_user']?>">
						      <input type="hidden" name="tanggal" value="<?php 
							  date_default_timezone_set("Asia/Jakarta");
							  $tanggal=date("Y-m-d H:i:s"); echo $tanggal ?>">
						      <label for="isi">Isi : </label>
						      <textarea class="ckeditor" type="text" id="isi"  class="form-control" name="isi" required /> 
						      </textarea><br>
						      <label for="judul">Foto : </label>
						      <input type="file" id="foto_pub" name="foto_artikel" accept="image/*" /><br>
						      <input type="submit" class="btn btn-primary" name="tambah_artikel" value="Kirim">
						    </form>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
						  <br />
						    <form id="demo-form" method="POST" action="proses/tambah_publikasi.php" data-parsley-validate enctype="multipart/form-data">
						      <label for="judul">Judul : </label>
						      <input type="text" id="judul" placeholder="Judul" class="form-control" name="judul" required /><br>
						      <input type="hidden" name="penulis" value="<?php echo $dataUser['id_user']?>">
						      <input type="hidden" name="tanggal" value="<?php 
							  date_default_timezone_set("Asia/Jakarta");
							  $tanggal=date("Y-m-d H:i:s"); echo $tanggal ?>">
						      <label for="isi">Isi : </label>
						      <textarea class="ckeditor" type="text" id="isi"  class="form-control" name="isi" required /> 
						      </textarea><br>
						      <label for="judul">Foto : </label>
						      <input type="file" id="foto_pub" name="foto_manbabat" accept="image/*" /><br>
						      <input type="submit" class="btn btn-primary" name="tambah_manbabat" value="Kirim">
						    </form>
						</div>
					</div>
				</div>
			</div>
			</div>
			</div>