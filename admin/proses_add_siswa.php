<?php 

define("BASEPATH", dirname(__FILE__));
include('../config.php');
include('excel_reader.php');
include('../header.php');
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
if (!preg_match("/^[0-9]*$/",$nisn)) {
	echo "
	<script src='../assets/js/sweetalert2.all.min.js'></script>
	<!-- Google Font: Source Sans Pro -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
	</head>
	<body>
	<script>
	Swal.fire({
		title: 'Oppss..',
		text: 'Masukan NISN dengan benar penginputan NISN hanya di perbolehkan menggunakan angka',
		icon: 'error',
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ok'
	}).then((result) => {
		if (result.value) {
			window.location.replace('siswa.php');
		}
	})
	</script>";

}else{
	$query = mysqli_query($con,"SELECT * FROM siswa WHERE nisn='$nisn'")or die(mysql_error());
	$cek = mysqli_num_rows($query);
	if ($cek == 1) {
		echo "
		<script src='../assets/js/sweetalert2.all.min.js'></script>
		<!-- Google Font: Source Sans Pro -->
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
		</head>
		<body>
		<script>
		Swal.fire({
			title: 'Oppss...',
			text: 'NISN sudah terdaftar',
			icon: 'error',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok'
		}).then((result) => {
			if (result.value) {
				window.location.replace('siswa.php');
			}
		})
		</script>";
	}else{
		mysqli_query($con,"INSERT INTO siswa (nisn,nama)"."VALUES('$nisn','$nama')");
		echo "
		<script src='../assets/js/sweetalert2.all.min.js'></script>
		<!-- Google Font: Source Sans Pro -->
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
		</head>
		<body>
		<script>
		Swal.fire({
			title: 'Sukses',
			text: 'Data berhasil di simpan',
			icon: 'success',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok'
		}).then((result) => {
			if (result.value) {
				window.location.replace('siswa.php');
			}
		})
		</script>";
	}

}

?>