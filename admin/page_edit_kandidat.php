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
            <h1>Edit Kandidat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Manajement Kandidat</a></li>
              <li class="breadcrumb-item active">Edit Kandidat</li>
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
              $query = mysqli_query($con,"SELECT * FROM kandidat WHERE id='$id'");
              $data = mysqli_fetch_array($query);
             ?>
            <form role="form" action="proses_edit_kandidat.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="id" class="form-control" value="<?= $data['id']; ?>">
                  <label for="inputnamek">Nama Ketua</label>
                  <input type="text" class="form-control mb-3" id="nketua" name="nketua"  placeholder="Enter Name" value="<?= $data['ketua']; ?>">
                  <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="gketua" id="gketua" value="<?= $data['gketua']; ?>">
                    <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                    <small class="text-danger pl-1">Abaikan jika tidak akan merubah gambar!</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputnamewk">Nama Wakil Ketua</label>
                  <input type="text" name="nwketua" class="form-control mb-3" id="nwketua" placeholder="Nama Wakil Ketua" value="<?= $data['wketua']; ?>">
                  <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="gwketua" id="gwketua" value="<?= $data['gwketua']; ?>">
                    <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                    <small class="text-danger pl-1">Abaikan jika tidak akan merubah gambar!</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Visi">Visi</label>
                  <div class="input-group">
                    <textarea class="form-control" rows="3" name="visi"><?= $data['visi']; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="MIsi">Misi</label>
                  <div class="input-group">
                    <textarea class="form-control" rows="3" name="misi"><?= $data['misi']; ?></textarea>
                  </div>
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


