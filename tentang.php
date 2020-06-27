<?php 
include 'koneksi.php';

switch($_GET['kategori']){
    case 'tentang_matric';
    $title = 'Tentang Matric';
    break;
    
    case 'struktur_organisasi';
    $title = 'Struktur Organisasi';
    break;
}


include 'include/header.php';

?>

<section id="contentbody">
<div class="container">
    <div class=" col-sm-12 col-md-12 col-lg-12">
    <div style = "background-color:white; padding:5%;" >
        <center>
            <div>
                <img src ="si-matric/images/logo.png" style="width:120px">
                <h3><b>MATRIC</b></h3>
                <h4><b>Mathematic Creative Club</b></h4>
            </div>
            
            
        </center>
        <?php if ($_GET['kategori'] == 'struktur_organisasi'){ ?>
            <center>
                <h4><b>Struktur Organisasi</b></h4>
            </center>
            <hr>
            <div class="row" style="margin-top:50px">
                <div class=" col col-md-12 col-xs-12 col-sm-12">
                    <center>
                    <div style="width :150px; height: 150px; border: 1px solid; background-image: url(images/profil/85509_78766.jpg); background-size: cover; border-radius: 50%">
    							
    				</div>
    				<h4><strong>Pembina</strong></h4>
    				</center>
    			</div>
			</div>
           
			<div class="row">

			<div class="col col-md-6 col-xs-12 col-sm-12" style="margin-top:50px">
                <center>

                <?php 
                    $qketua = mysqli_query($con,"SELECT gambar from user inner join struktur on user.id_user = struktur.id_user where struktur.id_struktur = 1");
                    while ($dketua = mysqli_fetch_array($qketua)){
                ?>
                <div style="width :150px; height: 150px; border: 1px solid; background-image: url(si-matric/images/profil/<?php echo $dketua['gambar'] ?>); background-size: cover; border-radius: 50%">
                
							
				</div>
                <?php } ?>
				<h4><strong>Ketua</strong></h4>
				</center>
			</div>
			<div class="col col-md-6 col-xs-12 col-sm-12" style="margin-top:50px">
                <center>
                <?php 
                    $qwketua = mysqli_query($con,"SELECT gambar from user inner join struktur on user.id_user = struktur.id_user where struktur.id_struktur = 2");
                    while ($dwketua = mysqli_fetch_array($qwketua)){
                ?>
                <div style="width :150px; height: 150px; border: 1px solid; background-image: url(si-matric/images/profil/<?php echo $dwketua['gambar'] ?>); background-size: cover; border-radius: 50%">
							
				</div>
                <?php } ?>
				<h4><strong>Wakil</strong></h4>
				</center>
			</div>
			</div>
			<div class="row">
			<div class="col col-md-3 col-xs-12 col-sm-12" style="margin-top:50px">
                <center>
                <?php 
                    $qsk1 = mysqli_query($con,"SELECT gambar from user inner join struktur on user.id_user = struktur.id_user where struktur.id_struktur = 3");
                    while ($dsk1 = mysqli_fetch_array($qsk1)){
                ?>
                <div style="width :150px; height: 150px; border: 1px solid; background-image: url(si-matric/images/profil/<?php echo $dsk1['gambar'] ?>); background-size: cover; border-radius: 50%">
							
				</div>
                <?php } ?>
				<h4><strong>Sekertaris 1</strong></h4>
				</center>
			</div>
			<div class="col col-md-3 col-xs-12 col-sm-12" style="margin-top:50px">
                <center>
                <?php 
                    $qsk2 = mysqli_query($con,"SELECT gambar from user inner join struktur on user.id_user = struktur.id_user where struktur.id_struktur = 4");
                    while ($dsk2 = mysqli_fetch_array($qsk2)){
                ?>
                <div style="width :150px; height: 150px; border: 1px solid; background-image: url(si-matric/images/profil/<?php echo $dsk2['gambar'] ?>); background-size: cover; border-radius: 50%">
							
				</div>
                <?php } ?>
				<h4><strong>Sekertaris 2</strong></h4>
				</center>
			</div>
			<div class="col col-md-3 col-xs-12 col-sm-12" style="margin-top:50px">
                <center>
                <?php 
                    $qb1 = mysqli_query($con,"SELECT gambar from user inner join struktur on user.id_user = struktur.id_user where struktur.id_struktur = 5");
                    while ($db1 = mysqli_fetch_array($qb1)){
                ?>
                <div style="width :150px; height: 150px; border: 1px solid; background-image: url(si-matric/images/profil/<?php echo $db1['gambar'] ?>); background-size: cover; border-radius: 50%">
							
				</div>
                <?php } ?>
				<h4><strong>Bendahara 1</strong></h4>
				</center>
			</div><div class="col col-md-3 col-xs-12 col-sm-12" style="margin-top:50px">
                <center>
                <?php 
                    $qb2 = mysqli_query($con,"SELECT gambar from user inner join struktur on user.id_user = struktur.id_user where struktur.id_struktur = 6");
                    while ($db2 = mysqli_fetch_array($qb2)){
                ?>
                <div style="width :150px; height: 150px; border: 1px solid; background-image: url(si-matric/images/profil/<?php echo $db2['gambar'] ?>); background-size: cover; border-radius: 50%">
							
				</div>
                <?php } ?>
				<h4><strong>Bendahara 2</strong></h4>
				</center>
			</div>
			</div>
        <?php } else { ?>
        <div style="margin-top:50px">
            <?php 
                $qtentang = mysqli_query($con, "SELECT * from tentang");
                $dtentang  = mysqli_fetch_array($qtentang);
                $tentang = $dtentang['isi'];
                echo $tentang;
            ?>
            
        </div>
        <?php } ?>
    </div>
    </div>
</div>


</div>
</section>


<?php include 'include/footer.php'; ?>