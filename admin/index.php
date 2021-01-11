<?php 
define("BASEPATH", dirname(__FILE__));
session_start();
include('../config.php');

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $pass = $_POST['password'];
  $query = mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$pass'")or die(mysql_error());
  $data = mysqli_fetch_array($query);
  $cek = mysqli_num_rows($query);
  if ($cek == 1) {
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['login'] = true;
    echo '<script type="text/javascript">
    alert("Anda berhasil login");
    window.location="admin.php";</script>';
  }else{
    echo '<script type="text/javascript">
    alert("Username dan password salah");
    window.location="index.php";</script>';
  }
}
if (isset($_SESSION['login'])) {
  header('location:admin.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
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
            <input type="text" name="username" class="form-control" placeholder="Username/Email" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
           <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
           <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
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
<small style="margin-left: 22%;">Anda siswa? <a href="../../osis">Login sebagai siswa</a></small>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>

</body>
</html>
