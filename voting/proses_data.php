<?php 
#define("BASEPATH", dirname(__FILE__));
include('../application/function.php');
include('../header.php');
$a =  $_GET['id'];
$b = explode(" ", $a);
$c = implode("+", $b);
$id 	= decrypt($c);
$pilih 	= mysqli_query($con,"SELECT * FROM kandidat WHERE id='$id'");
$suara 	= mysqli_fetch_assoc($pilih);
$nk 	= $suara['no_kandidat'];
$sr 	= $suara['suara'] + 1;

$a 		= $_GET['p'];
$b 		= explode(" ", $a);
$c 		= implode("+", $b);
$nisn 	= decrypt($a);
$query 	= mysqli_query($con,"SELECT * FROM siswa WHERE nisn='$nisn'");
$data 	= mysqli_fetch_assoc($query);
$nama 	= $data['nama']; 

$qry = select1("SELECT nisn FROM pemilih WHERE nisn='$nisn'");
$cek = mysqli_num_rows($qry);
if ($cek == 0) {
	mysqli_query($con,"UPDATE kandidat SET suara='$sr' WHERE id='$id'");
	mysqli_query($con,"INSERT INTO pemilih (nisn,nama,pilihan)"."VALUES('$nisn','$nama','$nk')");
	echo "
	<script src='../assets/js/sweetalert2.all.min.js'></script>
	<!-- Google Font: Source Sans Pro -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
	</head>
	<body>
	<script>
	Swal.fire({
		title: 'Sukses',
		text: 'Terimakasih sudah memberikan suara',
		icon: 'success',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ok'
	}).then((result) => {
		if (result.value) {
			window.location.replace('index.php');
		}
	})
	</script>";
}else{
	echo "
	<script src='../assets/js/sweetalert2.all.min.js'></script>
	<!-- Google Font: Source Sans Pro -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
	</head>
	<body>
	<script>
	Swal.fire({
		title: 'Oopps..',
		text: 'Anda sudah memasukan suara',
		icon: 'error',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ok'
	}).then((result) => {
		if (result.value) {
			window.location.replace('index.php');
		}
	})
	</script>";
}

?>