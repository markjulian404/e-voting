
<?php 
$data['title'] = 'Pantauan COVID-19';
$data['button'] = 'Protokol Kesehatan';
include_once 'koneksi.php';
?>
<?php 
$url = 'https://www.covid19.go.id/';
$content = file_get_contents($url);
$first_step = explode('<strong>',$content);
$second_step = explode('</strong>',$first_step[5]);
$positif2 = $second_step[0];
$positif = "2256";

$first_step = explode('<strong>',$content);
$second_step = explode('</strong>',$first_step[6]);
$sembuh = $second_step[0];

$first_step = explode('<strong>',$content);
$second_step = explode('</strong>',$first_step[7]);
$meninggal = $second_step[0];

$first_step = explode('<strong>',$content);
$second_step = explode('</strong>',$first_step[1]);
$confirmed = $second_step[0];

$first_step = explode('<strong>',$content);
$second_step = explode('</strong>',$first_step[2]);
$deaths = $second_step[0];

$first_step = explode('<strong>',$content);
$second_step = explode('</strong>',$first_step[3]);
$countries = $second_step[0];
?>

<?php
date_default_timezone_set("asia/jakarta");
$time = time();
$h = date("G",$time);

if ($h >= 0 && $h <= 11) {
  $ucapan = "Selamat Pagi";
}elseif ($h > 11 && $h <= 14) {
  $ucapan = "Selamat Siang";
}elseif ($h > 14 && $h <= 17) {
  $ucapan = "Selamat Sore";
}else{
  $ucapan = "Selamat Malam";
}
$hasil = $ucapan;
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Pemantauan COVID-19">
  <meta name="author" content="Mark Julian">

  <title>COVID 19</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="assets/js/jquery.js"></script>
  <script>
    setTimeout(myFunction,5000);
    function myFunction(){
      $(document).ready(function(){
       $('#myModal').modal('show');
     });
    };

  </script>
  
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <div class="fixed-top">
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" role="navigation">
            <img class="img-profile rounded-circle" src="assets/img/logo.txt" style="width: 15%; height: auto;">
            <div class="p-1">
              <h7 class="card-title pl-7 text-dark" style="font-style: arial;">Web Pemantauan COVID-19</h7>
              <p class="card-text text-danger mt-0 text-muted" style="font-style: arial;">INTENASIONAL</p>
            </div>
          </nav>
        </div>
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" role="navigation">
          <img class="img-profile rounded-circle" src="assets/img/logo.txt" style="width: 15%; height: auto;">
          <div class="p-1">
            <h7 class="card-title pl-7 text-dark" style="font-style: arial;">Web Pemantauan COVID-19</h7>
            <p class="card-text text-danger mt-0 text-muted" style="font-style: arial;">INTENASIONAL</p>
          </div>
        </nav>
        <!-- End of Topbar -->
        
        <!-- Begin Page Content -->

        <div class="container-fluid mx-0">
          <!-- Page Heading -->
          <?php 
          $query = mysql_query("SELECT * FROM notif");
          while ($data = mysql_fetch_array($query)) { ?>
          <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false" data-animation="true" mt-5 style="width: 100%;">
            <div class="toast-header">
              <img src="assets/img/logo.txt" class="rounded mr-2" alt="Logo Mrj" style="width: 25px; height: auto;">
              <strong class="mr-auto">Notification</strong>
              <small>1 Min Ago</small>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
              <?= $data['pesan']; ?>
            </div>
          </div>
          <?php } ?>
          <div class="card mb-4" style="width: 50% center;">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <a href="https://rapidtest.pikobar.jabarprov.go.id/"><img src="assets/img/banner1.jpg" class="d-block w-100"></a>
                </div>
                <div class="carousel-item">
                  <a href="https://youtu.be/hUduwGvZQtQ"><img src="assets/img/banner2.jpeg" class="d-block w-100"></a>
                </div>
                <div class="carousel-item">
                  <a href="https://www.instagram.com/tv/B-brEu8BeXc/?igshid=1e27xbbdyiv6p"><img src="assets/img/banner3.jpeg" class="d-block w-100"></a>
                </div>
                <div class="carousel-item">
                  <a href="https://www.instagram.com/tv/B-imtg5BGC7/?igshid=13tq51x1cyfk9"><img src="assets/img/banner4.jpeg" class="d-block w-100"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="row row-cols-1 row-cols-md-2 mb-0">
            <div class="col mb-4">
              <div class="card">
                <div class="card-body" style="padding: 0.5rem;">
                  <p class="card-text mt-0 mb-0 p-0 text-dark" style="font-size: 80%;">Call Center</p>
                  <p class="card-text mb-0 pl-0" style="font-size: 80%;">Nomor Darurat</p>
                  <a href="tel:119" class="card-text text-success font-weight-bold" style="font-size: 90%;">119</a>
                </div>
              </div>
            </div>
            <div class="col mb-4">
              <div class="card">
                <div class="card-body" style="padding: 0.5rem;">
                  <p class="card-text mt-0 mb-0 p-0 text-dark" style="font-size: 80%;">Dinkes Jabar</p>
                  <p class="card-text mb-0 pl-0" style="font-size: 80%;">Pertanyaan Umum</p>
                  <p class="card-text text-success font-weight-bold" style="font-size: 90%;">08112093306</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Begin Page Content -->
          <p class="text-dark font-weight-bold mb-0 pt-0">Angka Kejadian Di Indonesia</p>
          <p class="text-dark font-weight-regular mt-0 mb-0 pb-0">Update Tanggal <?= date("d M Y"); ?></p>
          <small class="text-danger pt-0 mt-0">Note : Update Tiap Hari Kalo Ada Kuota</small>
          <div class="card shadow h-100 py-2 mb-3" style="max-width: 80% center; padding-bottom: 1rem; background-color: #fcdfe0;border-color: #ffb4b5;">
            <div class="card-body  mt-0 pt-0 pb-0">
              <div class="row no-gutters align-items-left">
                <div class="col mr-2 mt-0">
                  <div class="text-xl font-weight-regular text-gray text-uppercase mb-0" style="font-style: arial;">POSITIF COVID 19</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h7 mb-0 mt-0 font-weight-bold text-gray-900" style="font-size: 20px;">Indonesia</div>
                      <?php 
                      $query = mysql_query("SELECT * FROM data");
                      while ($data = mysql_fetch_array($query)) { ?>
                      <div class="h7 mb-0  font-weight-regular text-gray-800" style="font-style: arial;"><?= $data['lokasi']; ?></div>
                      <?php } ?>
                    </div>
                    <div class="col mr">
                      <div class="col pl-5 pr-0 font-weight-bold" style="text-align: right;">
                        <div class=" text-gray-900"><?= $positif; ?></div>
                      </div>
                      <div class="col pl-5 pr-0  font-weight-bold" style="text-align: right;">
                        <?php 
                        $query = mysql_query("SELECT * FROM data");
                        while ($data = mysql_fetch_array($query)) { ?>
                        <div class="text-dark"><?= $data['positif']; ?></div>
                        <?php } ?>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Sembuh -->
          <div class="card shadow h-100 py-2 mb-3" style="max-width: 80% center; background-color: #d3eee3;border-color: #91dcbd">
            <div class="card-body  mt-0 pt-0 pb-0">
              <div class="row no-gutters align-items-left">
                <div class="col mr-2 mt-0">
                  <div class="text-xl font-weight-regular text-gray text-uppercase mb-0" style="font-style: arial;">SEMBUH</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h7 mb-0 mr-3 font-weight-bold text-gray-900" style="font-size: 20px;">Indonesia</div>
                      <?php 
                      $query = mysql_query("SELECT * FROM data");
                      while ($data = mysql_fetch_array($query)) { ?>
                      <div class="h7 mb-0 mr-3 font-weight-regular text-gray-800" style="font-style: arial;"><?= $data['lokasi']; ?></div>
                      <?php } ?>
                    </div>
                    <div class="col mr">
                      <div class="col pl-5 pr-0  font-weight-bold" style="text-align: right;">
                        <div class=" text-gray-900"><?= $sembuh; ?></div>
                      </div>
                      <div class="col pl-5 pr-0  font-weight-bold" style="text-align: right;">
                        <?php 
                        $query = mysql_query("SELECT * FROM data");
                        while ($data = mysql_fetch_array($query)) { ?>
                        <div class="text-dark"><?= $data['sembuh']; ?></div>
                        <?php } ?>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Meninggal -->
          <div class="card shadow h-100 py-2 mb-3" style="max-width: 80% center; background-color: #fbeadf;border-color: #fed2b2">
            <div class="card-body  mt-0 pt-0 pb-0">
              <div class="row no-gutters align-items-left">
                <div class="col mr-2 mt-0">
                  <div class="text-xl font-weight-regular text-gray text-arial text-uppercase mb-0">MENINGGAL</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h7 mb-0 mr-3 font-weight-bold text-gray-900" style="font-size: 20px;">Indonesia</div>
                      <?php 
                      $query = mysql_query("SELECT * FROM data");
                      while ($data = mysql_fetch_array($query)) { ?>
                      <div class="h7 mb-0 mr-3 font-weight-regular text-gray-800" style="font-style: arial;"><?= $data['lokasi']; ?></div>
                      <?php } ?>
                    </div>
                    <div class="col mr">
                      <div class="col pl-5 pr-0  font-weight-bold" style="text-align: right;">
                        <div class=" text-gray-900"><?= $meninggal; ?></div>
                      </div>
                      <?php 
                      $query = mysql_query("SELECT * FROM data");
                      while ($data = mysql_fetch_array($query)) { ?>
                      <div class="col pl-5 pr-0  font-weight-bold" style="text-align: right;">
                        <div class="text-dark"><?= $data['meninggal']; ?></div>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--GLOBAL-->
          <p class="text-dark font-weight-bold mb-0 pt-0">Angka Kejadian Internasional</p>
          <p class="text-dark font-weight-regular mt-0 mb-0 pb-0">Update Tanggal <?= date("d M Y"); ?></p>
          <small class="text-danger pt-0 mt-0">Sumber : <a href="https://www.who.int/emergencies/disease/novel-coronavirus-2019">WHO</a> & <a href="https://www.covid19.go.id/">COVID19.GO.ID</a></small>
          <div class="card shadow border-left-danger h-100 py-2 mb-3" style="max-width: 80% center; padding-bottom: 1rem;">
            <div class="card-body  mt-0 pt-0 pb-0">
              <div class="row no-gutters align-items-left">
                <div class="col mr-2 mt-0">
                  <div class="text-xl font-weight-regular text-gray text-uppercase">
                    CONFIRMED CASES
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mr-3 font-weight-bold text-danger text-right"><?= $confirmed; ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card shadow border-left-danger h-100 py-2 mb-3" style="max-width: 80% center; padding-bottom: 1rem;">
            <div class="card-body  mt-0 pt-0 pb-0">
              <div class="row no-gutters align-items-left">
                <div class="col mr-2 mt-0">
                  <div class="text-xl font-weight-regular text-gray text-uppercase">
                    CONFIRMED DEATHS
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mr-3 font-weight-bold text-danger"><?= $deaths; ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card shadow border-left-danger h-100 py-2 mb-3" style="max-width: 80% center; padding-bottom: 1rem;">
            <div class="card-body  mt-0 pt-0 pb-0">
              <div class="row no-gutters align-items-left">
                <div class="col mr-2 mt-0">
                  <div class="text-xs font-weight-regular text-gray text-uppercase">
                    COUNTRIES,AREAS OR TERRITORIES WITH CASES
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mr-3 font-weight-bold text-danger"><?= $countries; ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--END GLOBAL-->
          <!--Content-->
          <?php 
          $query = mysql_query("SELECT * FROM content");
          while ($data = mysql_fetch_array($query)) { ?>
          <div class="card text-dark bg-white mb-3" style="width: 100%;">
            <div class="card-header bg-white">
              <?= $data['header']; ?>
            </div>
            <div class="card-body bg-white">
              <p class="card-text"><?= $data['isi']; ?></p>
              <a target="_blank" href="<?= $data['link']; ?>" type="button" class="<?= $data['button']; ?>" style="border-color: #ffffff; background-color: #399f4f; font-color: #ffffff;">
                <?= $data['titlelnk']; ?>
              </a>
            </div>
          </div>
          <?php } ?>
          <!--End Content-->
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
  </div>
  <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Footer -->
<div class="sticky-top">
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Mark Julian <?= date("Y"); ?></span>
      </div>
    </div>
  </footer>
</div>

<!-- End of Footer -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" style="width: 100%;">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h7 class="modal-title" id="exampleModalScrollableTitle">Cegah Corona Mulai Dari Diri Kita</h7>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
          <img class="img-profile rounded-circle" src="assets/img/danger.png" style="width: 150px; height: 150px;">
        </center><br>
        <ol type="1">
          <li>Sering cuci tangan dengan sabun atau hand-sanitizer</li>
          <li>Hindari menyentuh wajah, terutama hidung, mulut, dan mata</li>
          <li>Bersihkan permukaan benda yang disentuh banyak orang</li>
          <li>Social Distancing! Minimalisir kontak fisik dengan sesama</li>
          <li>Jaga jarak 1-3 meter dengan orang yang sakit</li>
          <li>Jika sakit, maka:
            <ol type="1" style="margin-left: 5%; padding-left: 0%;">
              <li>Tinggal di rumah</li>
              <li>Gunakan masker</li>
            </ol>
          </li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Ahsyaap</button>
      </div>
    </div>
  </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>
<script>
  $('.toast').toast('show');
</script>
</body>

</html>
