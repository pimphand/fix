

<?php
	include '../koneksi.php';
	include"include/fungsi/enkripsi.php";
	
	if($_GET['status'] == "alumni"){
		$qAnggota=mysqli_query ($con,"SELECT * from user where alumni = 'Y' and status = 'V' and level = 1");
		$title = "Alumni";
	}else{
		$qAnggota=mysqli_query ($con,"SELECT * from user where alumni = 'T' and status = 'V' and level = 1");
		$title = "Anggota";
	}
?>
<html>
	<head>
	
		<title>Cetak Data <?php echo $title ?> Matrik</title>
		
		<style type="text/css" title="currentStyle"> 
			@import "vendors/laporan/css/demo_table_jui.css";
			@import "vendors/laporan/css/jquery-ui-1.8.4.custom.css";
			@import "vendors/laporan/css/TableTools.css";
		</style>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css">
		
		<script type="text/javascript" language="javascript" src="vendors/laporan/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="vendors/laporan/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="vendors/laporan/js/ZeroClipboard.js"></script>
		<script type="text/javascript" language="javascript" src="vendors/laporan/js/TableTools.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
	
		<script type="text/javascript" charset="utf-8">
		/*$(document).ready(function() {
			$('#datatables').dataTable({ 
			"sPaginationType": "full_numbers",
			"sDom": 'T<"clear">lfrtip',
			"oTableTools": {
			"sSwfPath": "/vendors/laporan/swf/copy_csv_xls_pdf.swf"
			}
			});
		} );*/

		$( document ).ready(function() {
			$('#datatables').DataTable({
		         "processing": true,
		         "dom": 'lBfrtip',
		         "oTableTools": {
								"sSwfPath": "/vendors/laporan/swf/copy_csv_xls_pdf.swf"
								},
		         "buttons": [
					            {
					                extend: 'collection',
					                text: 'Cetak',
					                buttons: [
					                    'copy',
					                    'excel',
					                    'csv',
					                    'pdf',
					                    'print'
					                ]
					            }
					        ]
		        
		        });
			});
		</script>
	</head>
	<body>
		<table class='list display' id='datatables'>
			<thead>
                        <tr>
                          <th>Nama</th>
                          <th>Kelas</th>
                          <th>Jenis Kelamin</th>
                        </tr>
                      </thead>
			<tbody>
                      <?php 
                        while ($dAnggota = mysqli_fetch_array($qAnggota)){
                      ?>
                        <tr>
                          <td><?php echo $dAnggota['nama_depan']." ".$dAnggota['nama_belakang']?></td>
                          <td><?php 
                            $qKelas = mysqli_query($con, "select nama_jurusan as jurusan from jurusan Inner join user on jurusan.id_jurusan = user.id_jurusan WHERE user.id_jurusan = '$dAnggota[id_jurusan]';");
                            $dKelas = mysqli_fetch_array($qKelas);
                            $Kelas = $dKelas['jurusan'];
                            echo $Kelas;
                          ?></td>
                          <td><?php echo $dAnggota['jk'] ?></td>
                    </tr>
                      <?php } ?>
                        
                      </tbody>
		</table>
	</body>
</html>


