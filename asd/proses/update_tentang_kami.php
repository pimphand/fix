<?php
include '../../koneksi.php';
include '../../include/fungsi/enkripsi.php';

$isi        = $_POST['isi'];

mysqli_query($con,"UPDATE tentang set isi = '$isi' where id = 1");

echo '
<script>
    window.history.back();
</script>
';

?>