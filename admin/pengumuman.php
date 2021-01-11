<?php
include("../application/function.php");
$peng = mysqli_num_rows(select1("SELECT * FROM pengumuman"));
$pengu = mysqli_fetch_assoc(select1("SELECT * FROM pengumuman"));
if (isset($_POST['deletep'])) {
	if ($peng == 0) {
		echo "
		<script src='../assets/js/sweetalert2.all.min.js'></script>
		<!-- Google Font: Source Sans Pro -->
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
		</head>
		<body>
		<script>
		Swal.fire({
			title: 'Oppss..',
			text: 'Tidak ada pengumuman',
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
	}else{
		$id = $pengu['id'];
		mysqli_query($con,"DELETE FROM pengumuman WHERE id='$id'");
		echo "
		<script src='../assets/js/sweetalert2.all.min.js'></script>
		<!-- Google Font: Source Sans Pro -->
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
		</head>
		<body>
		<script>
		Swal.fire({
			title: 'Sukses',
			text: 'Pengumuman berhasil di hapus',
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
	}
}else{
	if ($peng == 1) {
		echo "
		<script src='../assets/js/sweetalert2.all.min.js'></script>
		<!-- Google Font: Source Sans Pro -->
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
		</head>
		<body>
		<script>
		Swal.fire({
			title: 'Oppss..',
			text: 'Sudah di umumkan',
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
	}else{

		date_default_timezone_set('Asia/Jakarta');
		$kand = mysqli_fetch_assoc(select1("SELECT * FROM kandidat ORDER BY suara DESC"));
		$pesan = "Selamat kepada <b>{$kand['ketua']}</b> dan <b>{$kand['wketua']}</b> atas terpilihnya sebagai ketua dan wakil ketua osis periode <b>{$kand['periode']}</b> semoga bisa menjalankan amanah sebaik baiknya.";
		$tanggal = date("Y-m-d H:i:s");
		mysqli_query($con,"INSERT INTO pengumuman (tanggal,pesan)"."VALUES('$tanggal','$pesan')");
		echo "
		<script src='../assets/js/sweetalert2.all.min.js'></script>
		<!-- Google Font: Source Sans Pro -->
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
		</head>
		<body>
		<script>
		Swal.fire({
			title: 'Sukses',
			text: 'Berhasil memberikan pengumuman',
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
	}
}

?>