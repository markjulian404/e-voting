  <?php 
  $page = "MP";
  include('header.php');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Petugas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Manajemen Petugas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      
      <div class="row">
        <div class="col-md-7">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Petugas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#addmodal">Add Data</a>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <?php 
                  $query = mysqli_query($con,"SELECT * FROM admin");
                  $i = 1;
                  while ($data = mysqli_fetch_array($query)) {  ?>
                  <tbody>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $data['username']; ?></td>
                      <td><?= $data['nama']; ?></td>
                      <td class="text-center py-0 align-middle ">
                        <div class="btn-group btn-group-sm">
                          <a href="proses_hapus_petugas.php?id=<?= $data['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </div>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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