<?php 
  $id = deskripsi($_GET['id']) ;
  $qdonasi = mysqli_query($con,"SELECT * from donasi where id_donasi ='$id'");
  $ddonasi = mysqli_fetch_array($qdonasi);
?>

<div class="">
<div class="page-title">
  
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-4 col-sm-12 col-xs-12" style="float:right">
    <div class="x_panel">
      <div class="x_title">
        <h2><span class="fa fa-question-circle"></span> Cara berdonasi</h2>
        
        <div class="clearfix"></div>
      </div>
      
      <div class="x_content">
        Silahkan melakukan transfer ke nomor rekening berikut ini :
        <ul style="margin-left:-15px;">
            <li>No. Rekening : 012334556</li>
            <li>Atas Nama : Pesantren Daruttaufiq Anyer</li>
            <li>Nama Bank : BNI Syariah</li>
            <li>Cabang : Banten</li>
        </ul>
        
        Kemudian isilah form konfirmasi donasi disertai bukti transfer
      </div>
    </div>
  
  </div>
  <div class="col-md-8 col-sm-12 col-xs-12" style="float:left">
    <div class="x_panel">
      <div class="x_title">
        <h2><span class="fa fa-money"></span> Donasi Sdr/i <?php echo $ddonasi['nama'] ?></h2>
        
        <div class="clearfix"></div>
      </div>
      <?php if (($_GET['info']) == 'sukses') { 
        ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <strong>Sukses</strong>
        </div>
        <?php } ?>
      <div class="x_content">
      <form >
        <input type="hidden" class="form-control" name="penulis" value="<?php echo $id ?>">
        <label>Nama  :</label>
        <input type="text" class="form-control" name="nama" disabled value="<?php echo $ddonasi['nama']; ?>"><br>
        <label>Email  :</label>
        <input type="email" class="form-control" name="email" disabled  value="<?php echo $ddonasi['email']; ?>"><br>
        <label>Alamat : </label>
        <textarea type="text" class="form-control" name="alamat" disabled value="<?php echo $ddonasi['alamat']; ?>"><?php echo $ddonasi['alamat']; ?></textarea><br>
        <label>Jumlah :</label>
        <input type="number" class="form-control" name="jumlah" disabled value="<?php echo $ddonasi['jumlah']; ?>"><br>
        <label>Bukti transfer</label><br>
        <a href="images/donasi/<?php echo $ddonasi['bukti']; ?>"><img src="images/donasi/<?php echo $ddonasi['bukti']; ?>" width="150px"></a><br><br>
        
        <a href="proses/konfirmasi_donasi.php?id=<?php echo enkripsi($id) ?>"><button class="btn btn-success" name="kirim">Konfirmasi</button></a>
      </form>
      </div>
    </div>
  
  </div>