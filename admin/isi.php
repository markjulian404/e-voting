<?php 
include("../application/function.php");
error_reporting(0);
$siswa = mysqli_num_rows(select1("SELECT * FROM siswa"));
$pemilih = mysqli_num_rows(select1("SELECT * FROM pemilih"));

$ytms = $siswa - $pemilih;

$kandidat = mysqli_fetch_assoc(select1("SELECT sum(suara) as jsuara FROM kandidat"));
$kand = mysqli_fetch_assoc(select1("SELECT * FROM kandidat"));


?>

<div class="col-12 col-sm-6 col-md-3">
	<div class="info-box">
		<span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-alt"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Jumlah Siswa</span>
			<span class="info-box-number">
				<?= $siswa; ?>
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
	<div class="info-box">
		<span class="info-box-icon bg-success elevation-1"><i class="fas fa-bullhorn"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Jumlah Suara</span>
			<span class="info-box-number">
				<?= $pemilih; ?>
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
	<div class="info-box">
		<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Tidak Memberikan Suara</span>
			<span class="info-box-number">
				<?= $ytms; ?>
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>

<div class="col-md-9">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Statistik</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table class="table table-bordered">
				<thead>                  
					<tr>
						<th style="width: 10px">No</th>
						<th>Paslon</th>
						<th>Progress</th>
						<th style="width: 40px">Persen</th>
					</tr>
				</thead>
				<?php 
				function warna($persen){
					if ($persen >= 0 && $persen <= 25) {
						$warna = 'bg-danger';
					}elseif ($persen > 25 && $persen <= 50) {
						$warna = 'bg-warning';
					}elseif ($persen > 50 && $persen <= 75) {
						$warna = 'bg-info';
					}elseif ($persen > 75 && $persen <= 100) {
						$warna = 'bg-success';
					}
					echo $warna;
				}
				$kn = select("SELECT * FROM kandidat");
				foreach ($kn as $dt) {
					$jsuara = $dt['suara'];

					$hasil = ($jsuara / $siswa) * 100;
					$persen = round(($dt['suara']/$kandidat['jsuara'])*100,2);

					?>
					<tbody>
						<tr>
							<td><?= $dt['no_kandidat']; ?></td>
							<td><?= $dt['ketua'].' & '.$dt['wketua']; ?></td>
							<td>
								<div class="progress progress-xs" style="margin-top: 8%">
									<div class="progress-bar progress-bar-danger <?php warna($persen); ?>" style="width: <?= $persen; ?>%;"></div>
								</div>
							</td>
							<td><span class="badge <?php warna($persen); ?>"><?= $persen; ?>%</span></td>
						</tr>
					</tbody>
					<?php } ?>
				</table>
			</div>

			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
