<?php 
define("BASEPATH", dirname(__FILE__));
include('../config.php');

$id 		     = $_POST['id'];
$namaKetua	 = $_POST['nketua'];
$namaWKetua	 = $_POST['nwketua'];
$visi		     = $_POST['visi'];
$misi		     = $_POST['misi'];

$foto		     =	$_FILES['gketua']['name'];
$foto2		   =	$_FILES['gketua']['name'];
if($foto    != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
    $x 						        = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi     				= strtolower(end($x));
    $file_tmp 	     			= $_FILES['gketua']['tmp_name']
    $file_tmp2 		     		= $_FILES['gwketua']['tmp_name'] ;   
    $angka_acak 	     		= rand(1,999);
    $nama_gambar_baru 		= $angka_acak.'-'.$foto;
    $nama_gambar_baru2 		= $angka_acak.'-'.$foto2;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
    	$pilih_data	= mysqli_query($con,"SELECT * FROM kandidat WHERE id='$id'");
    	$seleksi   	= mysqli_fetch_array($pilih_data);
    	unlink("img/".$seleksi['gketua']);
      unlink("img/".$seleksi['gwketua']);
                  move_uploaded_file($file_tmp, 'img/'.$nama_gambar_baru);
                  move_uploaded_file($file_tmp2, 'img/'.$nama_gambar_baru2); //memindah file gambar ke folder gambar
                    // jalankan query UPDATE berdasarkan ID yang datanya kita edit
                  $query  = "UPDATE kandidat SET ketua='$namaKetua',wketua='$namaWKetua',gketua='$nama_gambar_baru',gwketua='$nama_gambar_baru2',visi='$visi',misi='$misi' WHERE id='$id'";
                  $result = mysqli_query($con, $query);
                    // periska query apakah ada error
                  if(!$result){
                  	die ("Query gagal dijalankan: ".mysqli_errno($con).
                  		" - ".mysqli_error($con));
                  } else {
                      //tampil alert dan akan redirect ke halaman kandidat.php
                      //silahkan ganti kandidat.php sesuai halaman yang akan dituju
                  	echo "<script>alert('Data berhasil diubah.');window.location='kandidat.php';</script>";
                  }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
              	echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='page_edit_kandidat.php';</script>";
              }
          }else {
      // jalankan query UPDATE berdasarkan ID yang datanya kita edit
          	$query  = "UPDATE kandidat SET ketua='$namaKetua',wketua='$namaWKetua',visi='$visi',misi='$misi' WHERE id='$id'";
          	$result = mysqli_query($con, $query);
      // periska query apakah ada error
          	if(!$result){
          		die ("Query gagal dijalankan: ".mysqli_errno($con).
          			" - ".mysqli_error($con));
          	} else {
        //tampil alert dan akan redirect ke halaman kandidat.php
        //silahkan ganti kandidat.php sesuai halaman yang akan dituju
          		echo "<script>alert('Data berhasil diubah.');window.location='kandidat.php';</script>";
          	}
          }