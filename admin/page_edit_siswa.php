  <?php 
  include('header.php');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Manajemen Siswa</a></li>
              <li class="breadcrumb-item active">Edit Siswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-7">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Edit Data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php 
              $id = $_GET['id'];
              $query = mysqli_query($con,"SELECT * FROM siswa WHERE id='$id'");
              $data = mysqli_fetch_array($query);
             ?>
            <form role="form" action="proses_edit_siswa.php" method="post">
              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="id" class="form-control" value="<?= $data['id']; ?>">
                  <label for="inputnamek">NISN</label>
                  <input type="text" class="form-control mb-3" id="nisn" name="nisn"  placeholder="Enter Name" value="<?= $data['nisn']; ?>">
                </div>
                <div class="form-group">
                  <label for="inputnamek">Nama</label>
                  <input type="text" class="form-control mb-3" id="nama" name="nama"  placeholder="Enter Name" value="<?= $data['nama']; ?>">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-info">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Default box -->
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include('footer.php');
  ?>


