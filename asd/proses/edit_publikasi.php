<?php 
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';
include '../include/fungsi/SimpleImage.php';

$id_post 		= $_POST['id_post'];
$judul 			= addslashes($_POST['judul']);
$isi 			= $_POST['isi'];
$folder         = '../images/post/'; // Folder yang dituju
$nama_file      = $_FILES['foto']['name']; // Nama file asli
$ukuran_file    = $_FILES['foto']['size']; // Ukuran file
$tmp            = $_FILES['foto']['tmp_name']; // Temporary pada file
$ekstensi_file  = $_FILES['foto']['type']; // Ekstensi file
$acak           = rand(100000,999999);
$acak2          = rand(100000,999999);
$rubah_nama     = $acak."_".$acak2.".".@end((explode(".", $nama_file)));
$nama_baru      = strtolower($rubah_nama);
$tujuan         = $folder.'/'.$nama_baru;
$kategori 		= $_POST['kategori'];

if(isset($_POST['ubah_foto'])){
	
		$qPost = mysqli_query ($con,"SELECT * from post where id_post = '$id_post'");
		$dPost = mysqli_fetch_array($qPost);

    		if (is_file('../images/post/'.$dPost['gambar'])){
    		    if ($dPost['gambar'] == 'default.jpg'){
    		        
    		    } else {
    			unlink('../images/post/'.$dPost['gambar']);
    			unlink('../images/post/medium_'.$dPost['gambar']);
    		    }
    		}
		
    if(!empty($_FILES['filepengumuman']['tmp_name'])){
		    //jika file diklik
	    $folder2         = '../images/file/'; // Folder yang dituju
        $nama_file1      = $_FILES['filepengumuman']['name']; // Nama file asli
        $ukuran_file2    = $_FILES['filepengumuman']['size']; // Ukuran file
        $tmp2            = $_FILES['filepengumuman']['tmp_name']; // Temporary pada file
        $ekstensi_file2  = $_FILES['filepengumuman']['type'];
        $acak3          = rand(100000,999999);
        $rubah_nama2     = $acak3."_".$nama_file1;
        $nama_file2      = str_replace(" ","_",$rubah_nama2);
        $tujuan2 		    = $folder2.'/'.$nama_file2;
            //eksekusi ex file
            if($ekstensi_file2 == "application/pdf" or $ekstensi_file2 == "application/msword" or $ekstensi_file2 == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
                
                $qfile = mysqli_query ($con,"SELECT file from post where id_post = '$id_post'");
		        $dfile = mysqli_fetch_array($qfile);
                unlink('../images/file/'.$dfile['file']);
                
    		    $qProses = mysqli_query($con,"UPDATE post set judul= '$judul', id_kategori='$kategori', gambar='$nama_baru',isi='$isi', file='$nama_file2' where id_post = '$id_post'");
        		if ($qProses){
        				$image = new SimpleImage();
         
        				$image->load($tmp);
        				 
        				$image->resize(708,350);
        				 
        				$image->save($tujuan);
        					
        				$image->resize(300,220);
         
        				$image->save($folder. "medium_" .$nama_baru);
                		move_uploaded_file($tmp2,$tujuan2);
                		header('location: ../publikasi.php?halaman='.enkripsi('publikasi'));
                }
            } else {
                
            }
            //eksekusi ex file
		
	} else {
            //jika file tidak diklik
		$qProses = mysqli_query($con,"UPDATE post set judul= '$judul', id_kategori='$kategori', gambar='$nama_baru',isi='$isi' where id_post = '$id_post'");
		if ($qProses){
				$image = new SimpleImage();
 
				$image->load($tmp);
				 
				$image->resize(708,350);
				 
				$image->save($tujuan);
					
				$image->resize(300,220);
 
				$image->save($folder. "medium_" .$nama_baru);
        		//move_uploaded_file($tmp,"$tujuan");
        		header('location: ../publikasi.php?halaman='.enkripsi('publikasi'));
        }
	}
    
    
    
    
} else {
    
    //jika gambar tidak diklik
    if(!empty($_FILES['filepengumuman']['tmp_name'])){
		    //jika file diklik
		    
		    $folder2         = '../images/file/'; // Folder yang dituju
            $nama_file1      = $_FILES['filepengumuman']['name']; // Nama file asli
            $ukuran_file2    = $_FILES['filepengumuman']['size']; // Ukuran file
            $tmp2            = $_FILES['filepengumuman']['tmp_name']; // Temporary pada file
            $ekstensi_file2  = $_FILES['filepengumuman']['type'];
            $acak3          = rand(100000,999999);
            $rubah_nama2     = $acak3."_".$nama_file1;
            $nama_file2      = str_replace(" ","_",$rubah_nama2);
            $tujuan2 		    = $folder2.'/'.$nama_file2;
            
            if($ekstensi_file2 == "application/pdf" or $ekstensi_file2 == "application/msword" or $ekstensi_file2 == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
                
                $qfile = mysqli_query ($con,"SELECT file from post where id_post = '$id_post'");
		        $dfile = mysqli_fetch_array($qfile);
                unlink('../images/file/'.$dfile['file']);
                
                $qProses= mysqli_query($con,"UPDATE post set judul='$judul', id_kategori='$kategori', isi = '$isi', file='$nama_file2' where id_post='$id_post' ");
                
                if ($qProses){
                    move_uploaded_file($tmp2,$tujuan2);
                	header('location: ../publikasi.php?halaman='.enkripsi('publikasi'));
                } else {
                    echo 'file tidak dapat diupload';
                }
                
            } else {
                echo 'file bukan yang dimaksud';
            }
            
    } else {
            //jika file tidak diklik
    	$qProses= mysqli_query($con,"UPDATE post set judul='$judul', id_kategori='$kategori', isi = '$isi' where id_post='$id_post' ");
    	if ($qProses){
    		header('location: ../publikasi.php?halaman='.enkripsi('publikasi'));
    	}
    }
}


?>