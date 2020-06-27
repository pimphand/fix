<?php
function indo($date){
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
 
	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
	return($result);
}

function indot($timestamp){
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
	$tahun = substr($timestamp, 0, 4);
	$bulan = substr($timestamp, 5, 2);
	$tgl   = substr($timestamp, 8, 2);
 
	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun." ".date("h:i:s");		
	return($result);
}

function indo2($date){
	$BulanIndo = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");
	
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
 
	$result = $tgl . " " . $BulanIndo[(int)$bulan-1];		
	return($result);
}
?>