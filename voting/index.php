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
		<div class="row">
			<div class="col" style="margin-left: 1%; margin-right: 1%;">
				<div class="alert alert-info alert-dismissable">
					<button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
					Berhati-hatilah saat memilih, karena anda hanya dapat memilih kandidat 1 kali saja!
				</div>
			</div>
		</div>
		
		<!-- Default box -->
		<div class="row">
			<?php
			$i = 1;
			$query = mysqli_query($con,"SELECT * FROM kandidat");
			while ($data = mysqli_fetch_array($query)) { ?>
			<div class="col-mb-4 col-sm-1 col-lg-4" style="padding-top: 2%; padding-bottom: 2%" id="data">
				<div class="col">
					<div data-aos="fade-up" data-aos-duration="2000" class="thumbnail" >
						<section class="bg-white">
							<div class="text-center" >
								<div class="table-responsive">
									<center>
										<table>
											<tr>
												<td class="text-center"><img src="../admin/img/<?= $data['gketua']; ?>" class="img" style="width: 140px; height: 150px;">
													<p class="nama"><?= $data['ketua']; ?></p>
												</td>
												<td class="text-center"><img src="../admin/img/<?= $data['gwketua']; ?>" class="img" style="width: 140px; height: 150px">
													<p class="nama"><?= $data['wketua']; ?></p>
												</td>
											</tr>
										</table>
									</center>
								</div>
								<div class="caption">
									<?php 
									?>
									<a href="details.php?id=<?= encrypt($data['id']); ?>" class="btn btn-success" style="margin-bottom: 1%">Lihat Visi Misi</a>
									<a href="proses_data.php?id=<?= encrypt($data['id']); ?>&p=<?= encrypt($_SESSION['nisn']); ?>" class="btn btn-info" style="margin-bottom: 1%">Beri Suara</a>
								</div>
							</section>
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
