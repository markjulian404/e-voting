<?php 
#defined('BASEPATH') or die("No access direct allowed");
require('../config.php');
function s($query){
	global $con;
	$query  = mysqli_query($con,$query)or die(mysql_error());
	$rows = [];
	while ($row = mysqli_fetch_assoc($query)) {
		$rows[] = $row;
	}
	return $rows;
} 

$kandidat = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(suara) as jsuara FROM kandidat"));
?>
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
			$kn = s("SELECT * FROM kandidat");
			foreach ($kn as $dt) {
				$jsuara = $dt['suara'];
				$persen = round(($dt['suara']/$kandidat['jsuara'])*100,2);

				?>
				<tbody>
					<tr>
						<td><?= $dt['no_kandidat']; ?></td>
						<td><?= $dt['ketua'].' & '.$dt['wketua']; ?></td>
						<td>
							<div class="progress progress-xs" style="margin-top: 5%">
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