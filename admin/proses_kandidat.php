<?php 
define("BASEPATH", dirname(__FILE__));
include('../config.php');
$namaFile	=	$_FILES['gketua']['name'];
$ukuranFile	=	$_FILES['gketua']['size'];
$error		=	$_FILES['gketua']['error'];
$tempName	=	$_FILES['gketua']['tmp_name'];
$x			= 	explode('.', $namaFile);
$format 	=	['jpg','jpeg','png'];
$x			= 	strtolower(end($x));

$namaKetua	= $_POST['nketua'];
$namaWKetua	= $_POST['nwketua'];
$visi	= $_POST['visi'];
$misi	= $_POST['misi'];
$periode = $_POST['periode'];

$namaFile2		=	$_FILES['gwketua']['name'];
$ukuranFile2	=	$_FILES['gwketua']['size'];
$error2			=	$_FILES['gwketua']['error'];
$tempName2		=	$_FILES['gwketua']['tmp_name'];
$x2				= 	explode('.', $namaFile2);
$format2 		=	['jpg','jpeg','png'];
$x2				= 	strtolower(end($x2));

if ($error === 4 || $error2 === 4) {
	echo "
	<script src='../assets/js/sweetalert2.all.min.js'></script>
	<!-- Google Font: Source Sans Pro -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
	</head>
	<body>
	<script>
	Swal.fire({
		title: 'Oppss..',
		text: 'Harus upload gambar',
		icon: 'error',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ok'
	}).then((result) => {
		if (result.value) {
			window.location.replace('kandidat.php');
		}
	})
	</script>";
	exit;
}else{
	if (!in_array($x, $format) || !in_array($x2, $format2) ) {
		echo "
		<script src='../assets/js/sweetalert2.all.min.js'></script>
		<!-- Google Font: Source Sans Pro -->
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
		</head>
		<body>
		<script>
		Swal.fire({
			title: 'Oppss..',
			text: 'Yang di upload bukan gambar',
			icon: 'error',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok'
		}).then((result) => {
			if (result.value) {
				window.location.replace('kandidat.php');
			}
		})
		</script>";
		exit;
	}else{
		if ($ukuranFile > 2300000 || $ukuranFile2 > 2300000) {
			echo "
			<script src='../assets/js/sweetalert2.all.min.js'></script>
			<!-- Google Font: Source Sans Pro -->
			<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
			</head>
			<body>
			<script>
			Swal.fire({
				title: 'Oppss..',
				text: 'Ukuran gambar tidak boleh melebihi 2 MB',
				icon: 'error',
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ok'
			}).then((result) => {
				if (result.value) {
					window.location.replace('kandidat.php');
				}
			})
			</script>";
			exit;
		}else{
			move_uploaded_file($tempName , 'img/'.$namaFile);
			move_uploaded_file($tempName2, 'img/'.$namaFile2);
			mysqli_query($con,"INSERT INTO kandidat (ketua,wketua,gketua,gwketua,visi,misi,periode,suara)"."VALUES('$namaKetua','$namaWKetua','$namaFile','$namaFile2','$visi','$misi','$periode',0)");
			echo "
			<script src='../assets/js/sweetalert2.all.min.js'></script>
			<!-- Google Font: Source Sans Pro -->
			<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
			</head>
			<body>
			<script>
			Swal.fire({
				title: 'Sukses',
				text: 'Sukses menambahkan data',
				icon: 'success',
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ok'
			}).then((result) => {
				if (result.value) {
					window.location.replace('kandidat.php');
				}
			})
			</script>";
			exit;
		}
	}
}

?>