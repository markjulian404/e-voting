<?php 
define("BASEPATH", dirname(__FILE__));
include('../config.php');
include('excel_reader.php');
?>

<?php

$target 	= basename($_FILES['excel']['name']) ;
$error 		= $_FILES['excel']['error'];
$x 			= explode('.', $target);
$format 	= ['xls'];
$x 			= strtolower(end($x));
if ($error === 4) {
	echo "<script>alert('Upload File Terlebih Dahulu!!');window.location='siswa.php';</script>";
}else{
	if (!in_array($x, $format)) {
		echo "<script>alert('Hanya upload format XLS');window.location='siswa.php';</script>";
	}else{
 		// upload file xls
		$target = basename($_FILES['excel']['name']) ;
		move_uploaded_file($_FILES['excel']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
		chmod($_FILES['excel']['name'],0777);

// mengambil isi file xls
		$data = new Spreadsheet_Excel_Reader($_FILES['excel']['name'],false);
// menghitung jumlah baris data yang ada
		$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
		for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
			$nisn 	   = $data->val($i, 1);
			$nama	   = $data->val($i, 2);

			if($nisn != "" && $nama != ""){
		// input data ke database (table data_pegawai)
				mysqli_query($con,"INSERT INTO siswa(nisn,nama)"."VALUES('$nisn','$nama')");
			}
		}

// hapus kembali file .xls yang di upload tadi
		unlink($_FILES['excel']['name']);

// alihkan halaman ke index.php
		header("location:siswa.php");
	}
}
?>