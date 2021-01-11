  <?php 
  $page = "DS";
  include('header.php');

  $array = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM waktu"));
  if (isset($_POST['submit'])) {
    $tawal = $_POST['tawal'];
    $takhir = $_POST['takhir'];
    $jawal = $_POST['jawal'];
    $jakhir = $_POST['jakhir'];
    $wmulai = $tawal.' '.$jawal;
    $wakhir = $takhir.' '.$jakhir;
    $cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM waktu"));
    if ($cek == 1) {
     $id = $_POST['id'];
     mysqli_query($con,"UPDATE waktu SET wmulai='$wmulai',wakhir='$wakhir' WHERE id='$id'");
     echo "
    <script src='../assets/js/sweetalert2.all.min.js'></script>
    <!-- Google Font: Source Sans Pro -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
    </head>
    <body>
    <script>
    Swal.fire({
      title: 'Sukses',
      text: 'Sukses mengupdate waktu',
      icon: 'success',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok'
    })
    </script>";
   }else{
    mysqli_query($con,"INSERT INTO waktu (wmulai,wakhir)"."VALUES('$wmulai','$wakhir')");
    echo "
    <script src='../assets/js/sweetalert2.all.min.js'></script>
    <!-- Google Font: Source Sans Pro -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
    </head>
    <body>
    <script>
    Swal.fire({
      title: 'Sukses',
      text: 'Sukses mengatur waktu',
      icon: 'success',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok'
    })
    </script>";
  }

}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div  id="oto" class="row">
      <?php include("isi.php"); ?>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Waktu Pemilihan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <form action="" method="POST">
                  <?php 
                  $data = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM waktu"));
                   ?>
                  <input type="text" name="id" hidden value="<?= $data['id']; ?>">
                  <div class="form-group">
                    <label for="inputnamek">Tanggal Mulai<strong class="text-danger"> *</strong></label>
                    <input type="date" class="form-control mb-3" name="tawal" required>
                  </div>
                  <div class="form-group">
                    <label for="inputnamek">Tanggal Akhir<strong class="text-danger"> *</strong></label>
                    <input type="date" class="form-control mb-3" name="takhir" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputnamek">Jam Mulai<strong class="text-danger"> *</strong></label>
                    <input type="time" class="form-control mb-3" name="jawal" required>
                    <div class="form-group">
                      <label for="inputnamek">Jam Akhir<strong class="text-danger"> *</strong></label>
                      <input type="time" class="form-control mb-3" name="jakhir" required>
                    </div>
                  </div>
                </div>

              </div>
              <button class="btn btn-primary" type="submit" name="submit">Set Waktu</button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>

        <!-- /.card -->
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Informasi</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <ol type="1">
                  <li>Silakan atur waktu mulai dan akhir.</li>
                  <li>Siswa tidak akan bisa login sebelum waktu di set.</li>
                </ol>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>


      <!-- /.col -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="proses_add_petugas.php" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input type="text" name="username" id="username" class="form-control mb-3" placeholder="Username">
              <input type="text" name="nama" id="nama" class="form-control mb-3" placeholder="Nama Lengkap">
              <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Password">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type="submit" name="Upload" class="btn btn-info" value="Add">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <?php
  include('footer.php');
  ?>
