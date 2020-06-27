<?php 
include_once '../../koneksi.php';
include_once '../../include/fungsi/format_tanggal.php';
include_once '../../include/fungsi/enkripsi.php';



$id 			= $_POST['id'];
$nama_depan 	= addslashes($_POST['nama_depan']);
$nama_belakang 	= addslashes($_POST['nama_belakang']);
$nama           = $nama_depan." ".$nama_belakang;
$jk 			= $_POST['jk'];
$kelas_alumni 	= $_POST['kelas_alumni'];
$kuliah			= addslashes($_POST['kuliah']);
$bekerja 		= addslashes($_POST['bekerja']);
$tempat_lahir 	= addslashes($_POST['tempat_lahir']);
$tanggal_lahir1 = $_POST['tanggal_lahir'];
$tanggal_lahir	= lahir($tanggal_lahir1);
$tahun_lulus 	= $_POST['tahun_lulus'];
$alamat 		= addslashes($_POST['alamat']);
$fb 			= addslashes($_POST['fb']);
$no_hp 			= $_POST['no_hp'];
$ig 			= addslashes($_POST['ig']);


$qalumni = mysqli_query($con,"SELECT * from user where id_user = '$id'");
$dalumni = mysqli_fetch_array($qalumni);
$alumni = $dalumni['alumni'];



if (isset($_POST['perbarui'])){
	if ($alumni == 'Y'){
		if (isset($_POST['ubah_foto'])){
			$folder         = '../images/profil/'; // Folder yang dituju
			$nama_file      = $_FILES['foto']['name']; // Nama file asli
			$ukuran_file    = $_FILES['foto']['size']; // Ukuran file
			$tmp            = $_FILES['foto']['tmp_name']; // Temporary pada file
			$ekstensi_file  = $_FILES['foto']['type'];
			$acak           = rand(100000,999999);
			$acak2          = rand(100000,999999);
			$rubah_nama     = $acak."_".$acak2.".".@end((explode(".", $nama_file)));
			$nama_baru      = strtolower($rubah_nama);
			$tujuan         = $folder.'/'.$nama_baru;
			if (move_uploaded_file($tmp,"$tujuan")){
			$qPost = mysqli_query ($con,"SELECT * from user where id_user = '$id'");
			$dPost = mysqli_fetch_array($qPost);

				if (is_file('../images/profil/'.$dPost['gambar']))
					unlink('../images/profil/'.$dPost['gambar']);

					mysqli_query($con, "UPDATE user set nama_depan='$nama_depan',nama_belakang='$nama_belakang',nama='$nama',jk='$jk',id_jurusan='$kelas_alumni',tahun_lulus='$tahun_lulus',kuliah = '$kuliah',bekerja = '$bekerja',alamat='$alamat',fb='$fb',gambar='$nama_baru' ,tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',no_hp='$no_hp',ig='$ig' where id_user='$id'");
				//header('location: ../alumni.php');
			}
	} else {
		mysqli_query($con, "UPDATE user set nama_depan='$nama_depan',nama_belakang='$nama_belakang',nama='$nama',jk='$jk',id_jurusan='$kelas_alumni',tahun_lulus='$tahun_lulus',kuliah = '$kuliah',bekerja = '$bekerja',alamat='$alamat',fb='$fb',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',no_hp='$no_hp',ig='$ig' where id_user='$id'");
	}
	header('location: ../profil.php?id='.enkripsi($id).'&info='.enkripsi('profil_terupdate'));
}	
	else {
		$status_anggota = $_POST['status_anggota']; // alumni ya / tidak
		$kelas 			= $_POST['kelas']; //untuk siswa
		$jurusan 		= $_POST['jurusan'];

		if ($status_anggota == 'T'){
			if(isset($_POST['ubah_foto'])){
				$folder         = '../images/profil/'; // Folder yang dituju
				$nama_file      = $_FILES['foto']['name']; // Nama file asli
				$ukuran_file    = $_FILES['foto']['size']; // Ukuran file
				$tmp            = $_FILES['foto']['tmp_name']; // Temporary pada file
				$ekstensi_file  = $_FILES['foto']['type'];
				$acak           = rand(100000,999999);
				$acak2          = rand(100000,999999);
				$rubah_nama     = $acak."_".$acak2.".".@end((explode(".", $nama_file)));
				$nama_baru      = strtolower($rubah_nama);
				$tujuan         = $folder.'/'.$nama_baru;

				if (move_uploaded_file($tmp,"$tujuan")){
					$qPost = mysqli_query ($con,"SELECT * from user where id_user = '$id'");
					$dPost = mysqli_fetch_array($qPost);

					if (is_file('../images/profil/'.$dPost['gambar']))
						unlink('../images/profil/'.$dPost['gambar']);

					mysqli_query($con, "UPDATE user set nama_depan='$nama_depan',nama_belakang='$nama_belakang',nama='$nama',jk='$jk',id_kelas='$kelas',id_jurusan='$jurusan',alumni='$status_anggota',alamat='$alamat',fb='$fb',gambar='$nama_baru',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',no_hp='$no_hp',ig='$ig' where id_user='$id' ");
					
				}
			}
			else {
					mysqli_query($con, "UPDATE user set nama_depan='$nama_depan',nama_belakang='$nama_belakang',nama='$nama',jk='$jk',id_kelas='$kelas',id_jurusan='$jurusan',alumni='$status_anggota',alamat='$alamat',fb='$fb',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',no_hp='$no_hp',ig='$ig' where id_user='$id' ");
			}
			header('location: ../profil.php?id='.enkripsi($id).'&info='.enkripsi('profil_terupdate'));
		} else {
			if(isset($_POST['ubah_foto'])){
				$folder         = '../images/profil/'; // Folder yang dituju
				$nama_file      = $_FILES['foto']['name']; // Nama file asli
				$ukuran_file    = $_FILES['foto']['size']; // Ukuran file
				$tmp            = $_FILES['foto']['tmp_name']; // Temporary pada file
				$ekstensi_file  = $_FILES['foto']['type'];
				$acak           = rand(100000,999999);
				$acak2          = rand(100000,999999);
				$rubah_nama     = $acak."_".$acak2.".".@end((explode(".", $nama_file)));
				$nama_baru      = strtolower($rubah_nama);
				$tujuan         = $folder.'/'.$nama_baru;

				if (move_uploaded_file($tmp,"$tujuan")){
					$qPost = mysqli_query ($con,"SELECT * from user where id_user = '$id'");
					$dPost = mysqli_fetch_array($qPost);

					if (is_file('../images/profil/'.$dPost['gambar']))
						unlink('../images/profil/'.$dPost['gambar']);

					mysqli_query($con, "UPDATE user set nama_depan='$nama_depan',nama_belakang='$nama_belakang',nama='$nama',jk='$jk',id_kelas='3',id_jurusan='$kelas_alumni',alumni='$status_anggota',tahun_lulus='$tahun_lulus',kuliah = '$kuliah',bekerja = '$bekerja',alamat='$alamat',fb='$fb',gambar='$nama_baru',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',no_hp='$no_hp',ig='$ig' where id_user='$id' ");
					
			}
		} else {
					mysqli_query($con, "UPDATE user set nama_depan='$nama_depan',nama_belakang='$nama_belakang',nama='$nama',jk='$jk',id_kelas='3',id_jurusan='$kelas_alumni',alumni='$status_anggota',tahun_lulus='$tahun_lulus',kuliah = '$kuliah',bekerja = '$bekerja',alamat='$alamat',fb='$fb',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',no_hp='$no_hp',ig='$ig' where id_user='$id' ");
		}
		header('location: ../profil.php?id='.enkripsi($id).'&info='.enkripsi('profil_terupdate'));
	}
}	

}

?>