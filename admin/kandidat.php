  <?php 
  $page = "MK";
  include('header.php');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kandidat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Manajemen Kandidat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Kandidat</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="pengumuman.php" method="POST">
                <input type="text" name="pesan" hidden value="a">
                <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#addmodal">Add Data</a>
                <button class="btn btn-success mb-3" name="umumkan" type="submit">Umumkan pemenang</button>
                <button class="btn btn-warning mb-3" name="deletep" type="deletep">Hapus pengumuman</button>
              </form>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Ketua</th>
                        <th>Wakil Ketua</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>Suara</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <?php 
                    $query = mysqli_query($con,"SELECT * FROM kandidat ORDER BY suara DESC");
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {  ?>
                    <tbody>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $data['ketua']; ?></td>
                        <td><?= $data['wketua']; ?></td>
                        <td><?= $data['visi']; ?></td>
                        <td><?= $data['misi']; ?></td>
                        <td><?= $data['suara']; ?></td>
                        <td class="text-right py-0 align-middle">
                          <div class="btn-group btn-group-sm">
                            <a href="page_edit_kandidat.php?id=<?= $data['id']; ?>" class="btn btn-info"><i class="fas fa-pen"></i></a>
                            <a href="proses_hapus_kandidat.php?id=<?= $data['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
              <form action="proses_kandidat.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" name="nketua" id="nketua" class="form-control mb-3" placeholder="Nama Ketua">
                    <div class="custom-file mb-3">
                      <input type="file" class="custom-file-input" name="gketua" id="gketua">
                      <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                      <small class="text-info">* Maksimal gambar 2 MB</small>
                    </div>
                    <input type="text" name="nwketua" id="nwketua" class="form-control mb-3" placeholder="Nama Wakil">
                    <div class="custom-file mb-3">
                      <input type="file" class="custom-file-input" name="gwketua" id="gwketua">
                      <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                       <small class="text-info">* Maksimal gambar 2 MB</small>
                    </div>
                    <textarea type="textarea" name="visi" id="visi" class="form-control mb-3" placeholder="Visi"></textarea>
                    <textarea type="textarea" name="misi" id="misi" class="form-control mb-3" placeholder="Misi"></textarea>
                    <input type="text" name="periode" id="periode" class="form-control mb-3" placeholder="2020/2021">
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