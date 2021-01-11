<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/css/sweetalert.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
  <?php 
  define("BASEPATH", dirname(__FILE__));
  ob_start();
  date_default_timezone_set('Asia/Jakarta');
  include('config.php');
  session_start();
  if (isset($_SESSION['siswa'])) {
    header('location:voting');
    exit;
  }
  if (isset($_POST['submit'])) {
    $tanggal      = date("Y-m-d H:i:s");
    $nisn         = $_POST['nisn'];
    $query        = mysqli_query($con,"SELECT * FROM siswa WHERE nisn='$nisn'")or die(mysql_error());
    $ary          = mysqli_fetch_assoc($query);
    $time         = mysqli_query($con,"SELECT * FROM waktu")or die(mysql_error());
    $ct           = mysqli_fetch_assoc($time);
    $cek          = mysqli_num_rows($query);
    $kandidatc    = mysqli_query($con,"SELECT * FROM kandidat");
    $ck           = mysqli_num_rows($kandidatc);
    if ($cek == 1) {
      $query = mysqli_query($con,"SELECT * FROM pemilih WHERE nisn='$nisn'")or die(mysql_error());
      $data  = mysqli_fetch_array($query);
      if ($ck == 0) {
        echo "
        <script src='../assets/js/sweetalert2.all.min.js'></script>
        <!-- Google Font: Source Sans Pro -->
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
        </head>
        <body>
        <script type='text/javascript'>
        setTimeout(function () { 

          swal({
            title: 'Tidak Ada Kandidat',
            text:  'Hubungi Admin Untuk Mendaftarkan Kandidat',
            type: 'error',
            timer: 10000,
            confirmButtonColor: '#3085d6',
            showConfirmButton: true
          });   
        });  
        window.setTimeout(function(){ 
          window.location.replace('../osis/');
        } ,10000); 
        </script>";
      }else{
        if ($tanggal < $ct['wmulai'] || $tanggal > $ct['wakhir']) {
          echo "
          <script src='../assets/js/sweetalert2.all.min.js'></script>
          <!-- Google Font: Source Sans Pro -->
          <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
          </head>
          <body>
          <script type='text/javascript'>
          setTimeout(function () { 

            swal({
              title: 'Gagal login',
              text:  'Mohon maaf sepertinya pemilihan belum di mulai atau sudah berakhir',
              type: 'error',
              timer: 10000,
              confirmButtonColor: '#3085d6',
              showConfirmButton: true
            });   
          });  
          window.setTimeout(function(){ 
            window.location.replace('../osis/');
          } ,10000); 
          </script>";
        }else{
          $_SESSION['nisn']  = $nisn;
          $_SESSION['nama']  = $ary['nama'];
          $_SESSION['siswa'] = true;
          header('location:voting');
        }
      }
    }else{
      echo "
      <script src='../assets/js/sweetalert2.all.min.js'></script>
      <!-- Google Font: Source Sans Pro -->
      <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
      </head>
      <body>
      <script type='text/javascript'>
      setTimeout(function () { 

        swal({
          title: 'Gagal Login!',
          text:  'NISN Tidak Terdaftar',
          type: 'error',
          timer: 10000,
          confirmButtonColor: '#3085d6',
          showConfirmButton: true
        });   
      });  
      window.setTimeout(function(){ 
        window.location.replace('../osis/');
      } ,10000); 
      </script>";
    }
  }
  ?>

 <!--<script> 
    function ban(){
      swal({
        title: "Are You Sure",
        text: "You will",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confrimButtonText: "Yes",
        closeOnConfirm: false
      },
      function (){
        window.location="../osis";
      });
    };
  </script>-->
  <div class="login-box">

    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <div class="login-logo">
          <a href=""><b>Login</b> Here</a>
        </div>
        <p class="login-box-msg">Silakan Login untuk melanjutkan!</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" name="nisn" class="form-control" placeholder="NISN" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->
      </div>
      <!-- /.login-card-body -->
    </div>
    <small style="margin-left: 22%;">Anda admin? <a href="admin">Login sebagai admin</a></small>
  </div>
  <!-- /.login-box -->
  <!-- jQuery -->
  <script src="assets/js/sweetalert.min.js"></script>
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
