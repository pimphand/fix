<?php 
include_once '../../koneksi.php';

$folder = "../images/file/";

//cek dengan menggunakan file exist

header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename='.basename($folder.$_GET['file']));
  header('Content-Transfer-Encoding: binary');
  header('Expires: 0');
  header('Cache-Control: private');
  header('Pragma: private');
  header('Content-Length: ' . filesize($folder.$_GET['file']));
  ob_clean();
  flush();
  readfile($folder.$_GET['file']);
  exit;

?>