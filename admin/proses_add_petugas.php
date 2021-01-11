<?php 
define("BASEPATH", dirname(__FILE__));
include('../config.php');

$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];

mysqli_query($con,"INSERT INTO admin (username,nama,password)"."VALUES('$username','$nama','$password')");
echo '<script type="text/javascript">
alert("Data berhasil disimpan");
window.location="admin.php";</script>';
exit;
?>