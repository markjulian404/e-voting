<?php 
$page = "Pengumuman";
include("header.php");
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pengumuman"));
$peng = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM pengumuman"));
?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Pengumuman</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Pengumuman</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">

			<?php 
			if ($cek == 1) {
				echo '
				<div class="col-md-5">
				<div class="alert alert-light border-success alert-dismissable">
				<button type="button" class="close text-dark" data-dismiss="alert" aria-hidden="true">&times;</button>
				'.$peng['pesan'].'
				</div>
				</div>
				';
			}
			?>
			<div id="oto" class="col-md-9">
				<?php include("isi.php"); ?>
				<!-- /.card -->
			</div>

			<!--<div class="col-xl-3 col-md-6 mb-1">
				<div class="card border-left-primary">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-x font-weight-bold text-primary text-uppercase mb-1 mt-0">Jumlah Siswa</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-user-alt fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-success">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-x font-weight-bold text-success text-uppercase mb-1">Jumlah Suara</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>-->
		</div>
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
