<?php 
define("BASEPATH", dirname(__FILE__));
include('../config.php');

$id 	= $_POST['id'];
$nisn 	= $_POST['nisn'];
$nama 	= $_POST['nama'];
mysqli_query($con,"UPDATE siswa SET nisn='$nisn',nama='$nama' WHERE id='$id'");
echo '<script type="text/javascript">
alert("Data berhasil di update");
window.location="siswa.php";</script>';
exit;

?>