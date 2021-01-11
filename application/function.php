<?php 

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'osis';

$con  = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error());

function select($query){
	global $con;
	$query  = mysqli_query($con,$query)or die(mysql_error());
	$rows = [];
	while ($row = mysqli_fetch_assoc($query)) {
		$rows[] = $row;
	}
	return $rows;
} 

function select1($query){
	global $con;
	$query  = mysqli_query($con,$query)or die(mysql_error());
	return $query;
} 

function encrypt($s){
	$cryptKey = 'd8578edf8458ce06fbc5bb76a58c5ca4';
	$qEncode = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $s, MCRYPT_MODE_CBC,md5(md5($cryptKey))));
	return $qEncode;
}

function decrypt($s){
	$cryptKey = 'd8578edf8458ce06fbc5bb76a58c5ca4';
	$qDecode = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($s), MCRYPT_MODE_CBC, md5(md5($cryptKey))),"\0");
	return $qDecode;
}
?>