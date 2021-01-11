<?php 
$page = "Home";
include("header.php");
?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Daftar Kandidat</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->


		<div class="row">
			<?php
			$i = 1;
			$a =  $_GET['id'];
			$b = explode(" ", $a);
			$c = implode("+", $b);
			$id = decrypt($c);
			$query = mysqli_query($con,"SELECT * FROM kandidat WHERE id='$id'");
			while ($data = mysqli_fetch_array($query)) { ?>
			<div class="col-mb-4 col-sm-1 col-lg-4 col-x-0" id="data">
				<div class="col">
					<div data-aos="fade-up" data-aos-duration="2000" class="thumbnail" >
						<div class="card">
							<div class="card-header bg-light">
								<h3 class="card-title text-bold">Detail Paslon</h3>
							</div>
							<div class="card-body">
								
									<img src="../admin/img/<?= $data['gketua']; ?>" class="card-img-top" style="width: 140px; height: 150px">
									<img src="../admin/img/<?= $data['gwketua']; ?>" class="card-img-top" style="width: 140px; height: 150px">
								<table>
									<tr>
										<td><b>No</b></td>
										<td><b>&nbsp;:&nbsp;</b></td>
										<td><?= $data['no_kandidat']; ?></td>
									</tr>
									<tr>
										<td><b>Ketua</b></td>
										<td><b>&nbsp;:&nbsp;</b></td>
										<td><?= $data['ketua']; ?></td>
									</tr>
									<tr>
										<td><b>Wakil</b></td>
										<td><b>&nbsp;:&nbsp;</b></td>
										<td><?= $data['wketua']; ?></td>
									</tr>
									<tr>
										<td><b>Visi</b></td>
										<td><b>&nbsp;:&nbsp;</b></td>
										<td class="text-success"><?= nl2br($data['visi']); ?></td>
									</tr>
									<tr>
										<td><b>Misi</b></td>
										<td><b>&nbsp;:&nbsp;</b></td>
										<td class="text-primary"><?= nl2br($data['misi']); ?></td>
									</tr>
								</table>
								<a href="proses_data.php?id=<?= encrypt($data['id']); ?>&s=<?= $data['suara']; ?>&p=<?= encrypt($_SESSION['nisn']); ?>" class="btn btn-primary">Berikan Suara</a>					
								<a class="btn btn-warning" onclick="history.back();">Cancel</a>
							</div>
						</div>

					</div>
				</div>
			</div>
			<?php } ?>
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
<!-- ./wrapper -->
<?php 
include("footer.php");
?>
