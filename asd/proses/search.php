
<?php 
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';
if($_POST) {
	$q=$_POST['searchword'];
	$sql_res=mysqli_query($con,"select * from user where nama like '%$q%' and status ='V' and level = 1 ");
	$ketemu = mysqli_num_rows($sql_res);
	if ($ketemu > 0){
	while($row=mysqli_fetch_array($sql_res)) {
		$namadepan=$row['nama'];
		$foto=$row['gambar'];
		$negara=$row['alumni'];
		$re_namadepan='<b>'.$q.'</b>';
		$re_namabelakang='<b>'.$q.'</b>';
		$final_namadepan = str_ireplace($q, $re_namadepan, $namadepan);
?>
	
        <li style="width:100%">
          <a href="profil.php?id=<?php echo enkripsi($row['id_user']) ?>">
            <span class="image"><img src="images/profil/<?php echo $foto; ?>" style="width:40px; height: 40px; border-radius:50%; border:3px solid; border-color:white;" alt="Profile Image" /></span>
            <span>
              <span style="margin-left: 10px"> <?php echo " ".$final_namadepan;?></span> 
            </span>
          </a>
        </li>

<?php
	}
} else if ($ketemu == 0){

?>
		<li style="padding: 10px;">
          <a >
          	<span></span>
            <span>
              <strong><?php echo "Tidak Ditemukan" ?></strong> 
            </span>
          </a>
        </li>
        <li style="padding: 10px;">
          <a >
            <span>
              <strong><?php echo "Lihat Hasil >>"?></strong> 
            </span>
          </a>
        </li>
		 
<?php

}

}
else
{

}
?>
</ul>