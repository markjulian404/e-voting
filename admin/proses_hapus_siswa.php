  <?php 
  define("BASEPATH", dirname(__FILE__));
  include('../config.php');
  $id = $_GET['id'];
  mysqli_query($con,"DELETE FROM siswa WHERE id='$id'")or die(mysqli_error());
  echo "
  <script src='../assets/js/sweetalert2.all.min.js'></script>
  <!-- Google Font: Source Sans Pro -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
  </head>
  <script>
  <body>
  Swal.fire({
    title: 'Sukses',
    text: 'Menghapus data berhasil',
    icon: 'success',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ok'
  }).then((result) => {
    if (result.value) {
      window.location.replace('logout.php');
    }
  })
  </script>";
  exit;
  ?>