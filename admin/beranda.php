
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3 class="m-0 text-dark">Selamat Datang, Admin </h3>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
	<div class="row">
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-info">
				<div class="inner">
					<h3><?=JumlahData($mysqli,"tb_unit")?></h3>

					<p>Unit Usaha</p>
				</div>
				<div class="icon">
					<i class="fa fa-user"></i>
				</div>
				<a href="?hal=siswa&get=aktif" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-warning">
				<div class="inner">
					<h3><?=JumlahData($mysqli,"tb_user")?></h3>

					<p>Data Akun</p>
				</div>
				<div class="icon">
					<i class="fa fa-book"></i>
				</div>
				<a href="?hal=kelas" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h3><?=JumlahData($mysqli,"tb_akun")?></h3>

					<p>Data Akun</p>
				</div>
				<div class="icon">
					<i class="fa fa-book"></i>
				</div>
				<a href="?hal=siswa&get=non" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-success">
				<div class="inner">
					<h3><?=JumlahData($mysqli,"tb_index")?></h3>


					<p>Data User</p>
				</div>
				<div class="icon">
					<i class="fa fa-book"></i>
				</div>
				<a href="?hal=agenda&get=all" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
	</div>
	<!-- /.row -->