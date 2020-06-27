<?php include 'include/header.php';
?>



<div class="right_col" role="main">
	<div class="clearfix"></div>
	<div class="row">
		<div class="x_panel">
			<div class="x_title">
				<h2>Ubah Struktur</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col col-sm-12 col-xs-12 col-md-12">
						<center>
							<h2>Struktur Kepengurusan</h2>
							<h2>Matric (Mathematic Creative Club)</h2>
							<h2>Periode 2017/2018</h2>
						</center>
						<hr width="60%">
						<center>
							<div style="width :150px; height: 150px; border: 1px solid; background-image: url(images/profil/85509_78766.jpg); background-size: cover; border-radius: 50%">
								
							</div>
							<h2><strong>Pembina</strong></h2>
						</center>
					</div>
					<div class="x_content">
                  		<form id="demo-form2" method="POST" action="proses/update_strukture.php" data-parsley-validate class="form-horizontal form-label-left">
							<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $id ?>" class="form-control col-md-7 col-xs-12">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ketua <span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="ketua">
										<?php 
										$kelas11 = mysqli_query($con, "SELECT * from user where id_kelas = 2 And alumni = 'T' AND status = 'V'");
										while ($dkelas11 = mysqli_fetch_array($kelas11)){ ?>
											<option value="<?php echo $dkelas11['id_user'] ?>"

												<?php 
													$cek = mysqli_query($con, "SELECT id_user from struktur where id_struktur = 1");
													$dcek = mysqli_fetch_array($cek);
													$r = $dcek['id_user'];

													if ($r == $dkelas11['id_user']){
														echo "selected";
													}

												?>

												><?php echo $dkelas11['nama'] ?></option>
										<?php } ?>
									</select>
								</div>
                    		</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Wakil Ketua <span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="wakil">
										<?php 
										$kelas11 = mysqli_query($con, "SELECT * from user where id_kelas = 2 And alumni = 'T' AND status = 'V'");
										while ($dkelas11 = mysqli_fetch_array($kelas11)){ ?>
											<option value="<?php echo $dkelas11['id_user'] ?>"
												<?php 
													$cek = mysqli_query($con, "SELECT id_user from struktur where id_struktur = 2");
													$dcek = mysqli_fetch_array($cek);
													$r = $dcek['id_user'];

													if ($r == $dkelas11['id_user']){
														echo "selected";
													}

												?>


												><?php echo $dkelas11['nama'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sekertaris 1 <span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="sekertaris_1">
										<?php 
										$kelas11 = mysqli_query($con, "SELECT * from user where id_kelas = 2 And alumni = 'T' AND status = 'V'");
										while ($dkelas11 = mysqli_fetch_array($kelas11)){ ?>
											<option value="<?php echo $dkelas11['id_user'] ?>"

												<?php 
													$cek = mysqli_query($con, "SELECT id_user from struktur where id_struktur = 3");
													$dcek = mysqli_fetch_array($cek);
													$r = $dcek['id_user'];

													if ($r == $dkelas11['id_user']){
														echo "selected";
													}

												?>

												><?php echo $dkelas11['nama'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sekertaris 2 <span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="sekertaris_2">
										<?php 
										$kelas11 = mysqli_query($con, "SELECT * from user where id_kelas = 2 And alumni = 'T' AND status = 'V'");
										while ($dkelas11 = mysqli_fetch_array($kelas11)){ ?>
											<option value="<?php echo $dkelas11['id_user'] ?>"

												<?php 
													$cek = mysqli_query($con, "SELECT id_user from struktur where id_struktur = 4");
													$dcek = mysqli_fetch_array($cek);
													$r = $dcek['id_user'];

													if ($r == $dkelas11['id_user']){
														echo "selected";
													}

												?>

												><?php echo $dkelas11['nama'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bendahara 1 <span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="bendahara_1">
										<?php 
										$kelas11 = mysqli_query($con, "SELECT * from user where id_kelas = 2 And alumni = 'T' AND status = 'V'");
										while ($dkelas11 = mysqli_fetch_array($kelas11)){ ?>
											<option value="<?php echo $dkelas11['id_user'] ?>"

												<?php 
													$cek = mysqli_query($con, "SELECT id_user from struktur where id_struktur = 5");
													$dcek = mysqli_fetch_array($cek);
													$r = $dcek['id_user'];

													if ($r == $dkelas11['id_user']){
														echo "selected";
													}

												?>

												><?php echo $dkelas11['nama'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bendahara 2 <span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="bendahara_2">
										<?php 
										$kelas11 = mysqli_query($con, "SELECT * from user where id_kelas = 2 And alumni = 'T' AND status = 'V'");
										while ($dkelas11 = mysqli_fetch_array($kelas11)){ ?>
											<option value="<?php echo $dkelas11['id_user'] ?>"

												<?php 
													$cek = mysqli_query($con, "SELECT id_user from struktur where id_struktur = 6");
													$dcek = mysqli_fetch_array($cek);
													$r = $dcek['id_user'];

													if ($r == $dkelas11['id_user']){
														echo "selected";
													}

												?>

												><?php echo $dkelas11['nama'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
					
							<div align="center" style="margin-top: 20px;" class="row">
								<button type="submit" name="update" class="btn btn-primary">Perbarui</button>
							</div>
						</form>
					</div>
				
			</div>
		</div>
	</div>
</div>

<?php include 'include/footer.php' ?>