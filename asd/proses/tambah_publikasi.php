<?php 
include '../../koneksi.php';
include '../include/fungsi/SimpleImage.php';

$judul  = addslashes($_POST['judul']);
$isi    = $_POST['isi'];
$penulis = $_POST['penulis'];
$tanggal = $_POST['tanggal'];




if (isset($_POST['tambah_berita'])){
    if(!empty($_FILES['foto_berita']['tmp_name'])){
        //gambar
        $folder         = '../images/post/'; // Folder yang dituju
        $nama_file      = $_FILES['foto_berita']['name']; // Nama file asli
        $ukuran_file    = $_FILES['foto_berita']['size']; // Ukuran file
        $tmp            = $_FILES['foto_berita']['tmp_name']; // Temporary pada file
        $ekstensi_file  = $_FILES['foto_berita']['type']; // Ekstensi file
        $acak           = rand(100000,999999);
        $acak2          = rand(100000,999999);
        $rubah_nama     = $acak."_".$acak2.".".@end((explode(".", $nama_file)));
        $nama_baru      = strtolower($rubah_nama);
        $tujuan         = $folder.'/'.$nama_baru;
        if($ekstensi_file == "image/png" or $ekstensi_file == "image/jpg" or $ekstensi_file == "image/jpeg"){
    		if($_SESSION['level'] == '1'){
    		$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','$nama_baru','BV','1','$tanggal')");
    		} else {
    			$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','$nama_baru','V','1','$tanggal')");	
    		}
    		if ($qPost){
				$image = new SimpleImage();
 
				$image->load($tmp);
				 
				$image->resize(708,350);
				 
				$image->save($tujuan);
					
				$image->resize(300,220);
 
				$image->save($folder. "medium_" .$nama_baru);
        		//move_uploaded_file($tmp,"$tujuan");
        		header('location:../publikasi.php?halaman=publikasiku');
        	}
        }
    }else {
        if($_SESSION['level'] == '1'){
		$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','default.jpg','BV','1','$tanggal')");
		} else {
			$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','default.jpg','V','1','$tanggal')");	
		}
		header('location:../publikasi.php?halaman=publikasiku');
    }
	
} else if (isset($_POST['tambah_pengumuman'])){
    
    if(!empty($_FILES['foto_pengumuman']['tmp_name'])){
        //gambar
        $folder         = '../images/post/'; // Folder yang dituju
        $nama_file      = $_FILES['foto_pengumuman']['name']; // Nama file asli
        $ukuran_file    = $_FILES['foto_pengumuman']['size']; // Ukuran file
        $tmp            = $_FILES['foto_pengumuman']['tmp_name']; // Temporary pada file
        $ekstensi_file  = $_FILES['foto_pengumuman']['type']; // Ekstensi file
        $acak           = rand(100000,999999);
        $acak2          = rand(100000,999999);
        $rubah_nama     = $acak."_".$acak2.".".@end((explode(".", $nama_file)));
        $nama_baru      = strtolower($rubah_nama);
        $tujuan         = $folder.'/'.$nama_baru;
        
        if(!empty($_FILES['file']['tmp_name'])){
            
    	    $folder2         = '../images/file/'; // Folder yang dituju
            $nama_file1      = $_FILES['file']['name']; // Nama file asli
            $ukuran_file2    = $_FILES['file']['size']; // Ukuran file
            $tmp2            = $_FILES['file']['tmp_name']; // Temporary pada file
            $ekstensi_file2  = $_FILES['file']['type'];
            $acak3          = rand(100000,999999);
            $rubah_nama2     = $acak3."_".$nama_file1;
            $nama_file2      = str_replace(" ","_",$rubah_nama2);
            $tujuan2 		    = $folder2.'/'.$nama_file2;
    	    
    	    if($ekstensi_file2 == "application/pdf" or $ekstensi_file2 == "application/msword" or $ekstensi_file2 == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
        		if($_SESSION[level] == '1'){
        		$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,file,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','$nama_baru','$nama_file2','BV','2','$tanggal')");
        		} else {
        			$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,file,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','$nama_baru','$nama_file2','V','2','$tanggal')");
        		}
        		if ($qPost){
    				$image = new SimpleImage();
     
    				$image->load($tmp);
    				 
    				$image->resize(708,350);
    				 
    				$image->save($tujuan);
    					
    				$image->resize(300,220);
     
    				$image->save($folder. "medium_" .$nama_baru);
            		//move_uploaded_file($tmp,"$tujuan");
            		move_uploaded_file($tmp2,$tujuan2);
        		
            		header('location:../publikasi.php?halaman=publikasiku');
            	}
        		
        		
    	    }
        } else {
            // jika file kosong
            if($_SESSION[level] == '1'){
        		$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','$nama_baru','BV','2','$tanggal')");
        		} else {
        			$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','$nama_baru','V','2','$tanggal')");
        		}
        		if ($qPost){
    				$image = new SimpleImage();
     
    				$image->load($tmp);
    				 
    				$image->resize(708,350);
    				 
    				$image->save($tujuan);
    					
    				$image->resize(300,220);
     
    				$image->save($folder. "medium_" .$nama_baru);
            		//move_uploaded_file($tmp,"$tujuan");
        		
            		header('location:../publikasi.php?halaman=publikasiku');
            	}
        }
			
	} else {
	    //jika foto kosong
	    
	    if(!empty($_FILES['file']['tmp_name'])){
            
    	    $folder2         = '../images/file/'; // Folder yang dituju
            $nama_file1      = $_FILES['file']['name']; // Nama file asli
            $ukuran_file2    = $_FILES['file']['size']; // Ukuran file
            $tmp2            = $_FILES['file']['tmp_name']; // Temporary pada file
            $ekstensi_file2  = $_FILES['file']['type'];
            $acak3          = rand(100000,999999);
            $rubah_nama2     = $acak3."_".$nama_file1;
            $nama_file2      = str_replace(" ","_",$rubah_nama2);
            $tujuan2 		    = $folder2.'/'.$nama_file2;
    	    
    	    if($ekstensi_file2 == "application/pdf" or $ekstensi_file2 == "application/msword" or $ekstensi_file2 == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
        		if($_SESSION[level] == '1'){
        		$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,file,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','default.jpg','$nama_file2','BV','2','$tanggal')");
        		} else {
        			$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,file,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','default.jpg','$nama_file2','V','2','$tanggal')");
        		}
        		move_uploaded_file($tmp2,$tujuan2);
        		header('location:../publikasi.php?halaman=publikasiku');
    	    }
        } else {
            // jika file kosong
            if($_SESSION[level] == '1'){
        		$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','default.jpg','BV','2','$tanggal')");
        		} else {
        			$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','default.jpg','V','2','$tanggal')");
        		}
        		header('location:../publikasi.php?halaman=publikasiku');
        }
	}
} 

else if (isset($_POST['tambah_artikel'])){
    if(!empty($_FILES['foto_artikel']['tmp_name'])){
        //gambar
        $folder         = '../images/post/'; // Folder yang dituju
        $nama_file      = $_FILES['foto_artikel']['name']; // Nama file asli
        $ukuran_file    = $_FILES['foto_artikel']['size']; // Ukuran file
        $tmp            = $_FILES['foto_artikel']['tmp_name']; // Temporary pada file
        $ekstensi_file  = $_FILES['foto_artikel']['type']; // Ekstensi file
        $acak           = rand(100000,999999);
        $acak2          = rand(100000,999999);
        $rubah_nama     = $acak."_".$acak2.".".@end((explode(".", $nama_file)));
        $nama_baru      = strtolower($rubah_nama);
        $tujuan         = $folder.'/'.$nama_baru;
        if($ekstensi_file == "image/png" or $ekstensi_file == "image/jpg" or $ekstensi_file == "image/jpeg"){
    		if($_SESSION['level'] == '1'){
    		$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','$nama_baru','BV','3','$tanggal')");
    		} else {
    			$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','$nama_baru','V','3','$tanggal')");	
    		}
    		if ($qPost){
				$image = new SimpleImage();
 
				$image->load($tmp);
				 
				$image->resize(708,350);
				 
				$image->save($tujuan);
					
				$image->resize(300,220);
 
				$image->save($folder. "medium_" .$nama_baru);
        		//move_uploaded_file($tmp,"$tujuan");
        		header('location:../publikasi.php?halaman=publikasiku');
        	}
        }
    }else {
        if($_SESSION['level'] == '1'){
		$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','default.jpg','BV','3','$tanggal')");
		} else {
		    
			$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','default.jpg','V','3','$tanggal')");	
		}
		if ($qPost){
		header('location:../publikasi.php?halaman=publikasiku');
		} else {
		    
		}
    }
	
}
else if (isset($_POST['tambah_manbabat'])){
    if(!empty($_FILES['foto_manbabat']['tmp_name'])){
        //gambar
        $folder         = '../images/post/'; // Folder yang dituju
        $nama_file      = $_FILES['foto_manbabat']['name']; // Nama file asli
        $ukuran_file    = $_FILES['foto_manbabat']['size']; // Ukuran file
        $tmp            = $_FILES['foto_manbabat']['tmp_name']; // Temporary pada file
        $ekstensi_file  = $_FILES['foto_manbabat']['type']; // Ekstensi file
        $acak           = rand(100000,999999);
        $acak2          = rand(100000,999999);
        $rubah_nama     = $acak."_".$acak2.".".@end((explode(".", $nama_file)));
        $nama_baru      = strtolower($rubah_nama);
        $tujuan         = $folder.'/'.$nama_baru;
        if($ekstensi_file == "image/png" or $ekstensi_file == "image/jpg" or $ekstensi_file == "image/jpeg"){
    		if($_SESSION['level'] == '1'){
    		$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','$nama_baru','BV','4','$tanggal')");
    		} else {
    			$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','$nama_baru','V','4','$tanggal')");	
    		}
    		if ($qPost){
				$image = new SimpleImage();
 
				$image->load($tmp);
				 
				$image->resize(708,350);
				 
				$image->save($tujuan);
					
				$image->resize(300,220);
 
				$image->save($folder. "medium_" .$nama_baru);
        		//move_uploaded_file($tmp,"$tujuan");
        		header('location:../publikasi.php?halaman=publikasiku');
        	}
        }
    }else {
        if($_SESSION['level'] == '1'){
		$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','default.jpg','BV','4','$tanggal')");
		} else {
			$qPost = mysqli_query ($con, "INSERT into post (id_post,id_user,judul,isi,gambar,status,id_kategori,tanggal) values (NULL,'$penulis','$judul','$isi','default.jpg','V','4','$tanggal')");	
		}
		header('location:../publikasi.php?halaman=publikasiku');
    }
	
}


    

?>