
	<div class="">
		<div class="x_panel">
			<div class="x_title">
			    <h2>Grafik Anggota 2017</h2>
			    <ul class="nav navbar-right panel_toolbox">
			      
			    </ul>
			    <div class="clearfix"></div>
			</div>
			<div class="col col-md-4 col-sm-4 col-xs-12">
				<div class="x_panel">
				  <div class="x_title">
				    <h2>Jenis Kelamin</h2>
				    <ul class="nav navbar-right panel_toolbox">
				      
				    </ul>
				    <div class="clearfix"></div>
				  </div>
				  <div class="x_content">

              <canvas id="jeniskelamin" width="400px" height="400px">
              	
              </canvas>
              
				   
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="x_panel">
				  <div class="x_title">
				    <h2>Kelas</h2>
				    <ul class="nav navbar-right panel_toolbox">
				      
				    </ul>
				    <div class="clearfix"></div>
				  </div>
				  <div class="x_content">

              <canvas id="kelas" width="400px" height="400px">
              	
              </canvas>
              
				   
				  </div>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="x_panel">
				  <div class="x_title">
				    <h2>Jurusan</h2>
				    <ul class="nav navbar-right panel_toolbox">
				      
				    </ul>
				    <div class="clearfix"></div>
				  </div>
				  <div class="x_content">

              <canvas id="jurusan" width="400px" height="400px">
              	
              </canvas>
              
				   
				  </div>
				</div>
			</div>

		</div>

		<div class="x_panel">
			<div class="x_title">
			    <h2>Grafik Alumni</h2>
			    <ul class="nav navbar-right panel_toolbox">
			      
			    </ul>
			    <div class="clearfix"></div>
			</div>
			<div class="col col-md-4 col-sm-4 col-xs-12">
				<div class="x_panel">
				  <div class="x_title">
				    <h2>Jenis Kelamin</h2>
				    <ul class="nav navbar-right panel_toolbox">
				      
				    </ul>
				    <div class="clearfix"></div>
				  </div>
				  <div class="x_content">

              <canvas id="jeniskelaminalumni" width="400px" height="400px">
              	
              </canvas>
              
				   
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="x_panel">
				  <div class="x_title">
				    <h2>Tahun</h2>
				    <ul class="nav navbar-right panel_toolbox">
				      
				    </ul>
				    <div class="clearfix"></div>
				  </div>
				  <div class="x_content">

              <canvas id="tahun" width="400px" height="400px">
              	
              </canvas>
              
				   
				  </div>
				</div>
			</div>

      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Jurusan</h2>
            <ul class="nav navbar-right panel_toolbox">
              
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

              <canvas id="jurusan_alumni" width="400px" height="400px">
                
              </canvas>
              
           
          </div>
        </div>
      </div>

		</div>
	</div>

<?php 
	$qjeniskelamin = mysqli_query($con,"SELECT count(jk) as laki from user where jk = 'Laki-Laki' and status='V' and alumni = 'T'");
	$qjeniskelaminp = mysqli_query($con,"SELECT count(jk) as perempuan from user where jk = 'Perempuan' and status='V' and alumni = 'T'");
	$djeniskelamin = mysqli_fetch_array($qjeniskelamin);
	$djeniskelaminp = mysqli_fetch_array($qjeniskelaminp);
	$jeniskelamin = $djeniskelamin['laki'];
	$jeniskelaminp = $djeniskelaminp['perempuan'];
?>

<?php 
	$qjeniskelaminal = mysqli_query($con,"SELECT count(jk) as laki from user where jk = 'Laki-Laki' and status='V' and alumni = 'Y'");
	$qjeniskelaminpal = mysqli_query($con,"SELECT count(jk) as perempuan from user where jk = 'Perempuan' and status='V' and alumni = 'Y'");
	$djeniskelaminal = mysqli_fetch_array($qjeniskelaminal);
	$djeniskelaminpal = mysqli_fetch_array($qjeniskelaminpal);
	$jeniskelaminal = $djeniskelaminal['laki'];
	$jeniskelaminpal = $djeniskelaminpal['perempuan'];
?>

<?php
	$qkelasx = mysqli_query($con, "SELECT nama_kelas from kelas where id_kelas ='1' ");
	$dkelasx = mysqli_fetch_array($qkelasx);
	$kelasx 	 = $dkelasx['nama_kelas'];

	$qjkelasx = mysqli_query($con,"SELECT count(id_kelas) as kelas_10 from user where id_kelas = '1' and status = 'V' and alumni = 'T' ");
	$djkelasx = mysqli_fetch_array($qjkelasx);
	$jkelasx = $djkelasx['kelas_10'];

	$qkelasxi = mysqli_query($con, "SELECT nama_kelas from kelas where id_kelas ='2'");
	$dkelasxi = mysqli_fetch_array($qkelasxi);
	$kelasxi 	 = $dkelasxi['nama_kelas'];

	$qjkelasxi = mysqli_query($con,"SELECT count(id_kelas) as kelas_11 from user where id_kelas = '2' and status = 'V' and alumni = 'T'");
	$djkelasxi = mysqli_fetch_array($qjkelasxi);
	$jkelasxi = $djkelasxi['kelas_11'];

	$qkelasxii = mysqli_query($con, "SELECT nama_kelas from kelas where id_kelas ='3'");
	$dkelasxii = mysqli_fetch_array($qkelasxii);
	$kelasxii 	 = $dkelasxii['nama_kelas'];

	$qjkelasxii = mysqli_query($con,"SELECT count(id_kelas) as kelas_12 from user where id_kelas = '3' and status = 'V' and alumni = 'T'");
	$djkelasxii = mysqli_fetch_array($qjkelasxii);
	$jkelasxii = $djkelasxii['kelas_12'];

	


?>
			
<script>
var ctx = document.getElementById("jeniskelamin").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Laki-Laki", "Perempuan"],
    datasets: [{
      backgroundColor: [
        "#2ecc71",
        "#3498db",
        "#9b59b6",
        "#f1c40f",
        "#e74c3c",
        "#34495e"
      ],
      data: [<?php echo $jeniskelamin; ?>, <?php echo $jeniskelaminp; ?>]
    }]
  }
});

</script>

<script>
var ctx = document.getElementById("kelas").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [<?php echo "'Kelas ".$kelasx."'" ?>, <?php echo "'Kelas ".$kelasxi."'" ?>,<?php echo "'Kelas ".$kelasxii."'" ?>],
    datasets: [{
      backgroundColor: [
        "#2ecc71",
        "#d2d22d",
        "#d22d2d",
        "#f1c40f",
        "#e74c3c",
        "#34495e"
      ],
      data: [<?php echo $jkelasx; ?>, <?php echo $jkelasxi; ?>, <?php echo $jkelasxii; ?>]
    }]
  }
});

</script>

<script>
var ctx = document.getElementById("jeniskelaminalumni").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Laki-Laki", "Perempuan"],
    datasets: [{
      backgroundColor: [
        "#002db3",
        "#b30059",
        "#9b59b6",
        "#f1c40f",
        "#e74c3c",
        "#34495e"
      ],
      data: [<?php echo $jeniskelaminal; ?>, <?php echo $jeniskelaminpal; ?>]
    }]
  }
});

</script>

<script>
var ctx = document.getElementById("tahun");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php 
        	$qtahunlulus = mysqli_query($con, "SELECT tahun_lulus,COUNT(id_user) as jumlah from user where tahun_lulus != 'NULL' And alumni = 'Y' AND user.status='V' GROUP by tahun_lulus");
        	while ($dtahunlulus = mysqli_fetch_array($qtahunlulus)) {
        	?>

        	<?php echo "'".$dtahunlulus['tahun_lulus']."'".","; }?>  
			
			],
        datasets: [{
            label: 'Dari tahun ke tahun',
            data: [<?php  
            	$qtahunlulus = mysqli_query($con, "SELECT tahun_lulus,COUNT(id_user) as jumlah from user where tahun_lulus != 'NULL' AND alumni = 'Y' AND user.status='V' GROUP by tahun_lulus");
            	while ($dtahunlulus = mysqli_fetch_array($qtahunlulus)) {
            		echo "'".$dtahunlulus['jumlah']."'".","; 
            	}
            ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

<?php  
	$qIPA = mysqli_query($con, "SELECT count(nama_jurusan) as jurusan from jurusan INNER join user on jurusan.id_jurusan = user.id_jurusan WHERE jurusan.nama_jurusan like '%MIPA%' AND user.alumni = 'T' AND user.status='V'");
	$dIPA = mysqli_fetch_array($qIPA);

	$qIPS = mysqli_query($con, "SELECT count(nama_jurusan) as jurusan from jurusan INNER join user on jurusan.id_jurusan = user.id_jurusan WHERE jurusan.nama_jurusan like '%IPS%' AND user.alumni = 'T' AND user.status='V' ");
	$dIPS = mysqli_fetch_array($qIPS);

	$qBahasa = mysqli_query($con, "SELECT count(nama_jurusan) as jurusan from jurusan INNER join user on jurusan.id_jurusan = user.id_jurusan WHERE jurusan.nama_jurusan like '%BAHASA%' AND user.alumni = 'T' AND user.status='V'");
	$dBahasa = mysqli_fetch_array($qBahasa);

	$qAgama = mysqli_query($con, "SELECT count(nama_jurusan) as jurusan from jurusan INNER join user on jurusan.id_jurusan = user.id_jurusan WHERE jurusan.nama_jurusan like '%AGAMA%' AND user.alumni = 'T' AND user.status='V'");
	$dAgama = mysqli_fetch_array($qAgama);


?>

<script>
var ctx = document.getElementById("jurusan");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['MIPA','IPS','BAHASA','AGAMA'],
        datasets: [{
            label: 'Semua Jurusan',
            data: [<?php echo "'".$dIPA['jurusan']."'" ?>,<?php echo "'".$dIPS['jurusan']."'" ?>,<?php echo "'".$dBahasa['jurusan']."'" ?>,<?php echo "'".$dAgama['jurusan']."'" ?>,],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
<?php  
  $qAlumniIPA = mysqli_query($con, "SELECT count(nama_jurusan) as jurusan from jurusan INNER join user on jurusan.id_jurusan = user.id_jurusan WHERE jurusan.nama_jurusan like '%MIPA%' AND user.alumni = 'Y' AND user.status='V' ");
  $dAlumniIPA = mysqli_fetch_array($qAlumniIPA);

  $qAlumniIPS = mysqli_query($con, "SELECT count(nama_jurusan) as jurusan from jurusan INNER join user on jurusan.id_jurusan = user.id_jurusan WHERE jurusan.nama_jurusan like '%IPS%' AND user.alumni = 'Y' AND user.status='V' ");
  $dAlumniIPS = mysqli_fetch_array($qAlumniIPS);

  $qAlumniBahasa = mysqli_query($con, "SELECT count(nama_jurusan) as jurusan from jurusan INNER join user on jurusan.id_jurusan = user.id_jurusan WHERE jurusan.nama_jurusan like '%BAHASA%' AND user.alumni = 'Y' AND user.status='V'");
  $dAlumniBahasa = mysqli_fetch_array($qAlumniBahasa);

  $qAlumniAgama = mysqli_query($con, "SELECT count(nama_jurusan) as jurusan from jurusan INNER join user on jurusan.id_jurusan = user.id_jurusan WHERE jurusan.nama_jurusan like '%AGAMA%' AND user.alumni = 'Y' AND user.status='V'");
  $dAlumniAgama = mysqli_fetch_array($qAlumniAgama);


?>

<script>
var ctx = document.getElementById("jurusan_alumni");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['MIPA','IPS','BAHASA','AGAMA'],
        datasets: [{
            label: 'Semua Jurusan',
            data: [<?php echo "'".$dAlumniIPA['jurusan']."'" ?>,<?php echo "'".$dAlumniIPS['jurusan']."'" ?>,<?php echo "'".$dAlumniBahasa['jurusan']."'" ?>,<?php echo "'".$dAlumniAgama['jurusan']."'" ?>,],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>




