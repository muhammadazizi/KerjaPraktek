<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title; ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<br>
							<?php $keranjang = '<i class="fas fa-shopping-cart">Keranjang:</i>' . $this->cart->total_items() ?>
							<?php echo anchor('beranda/detail_keranjang', $keranjang) ?>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('beranda/guest'); ?>">
								<span class="text-gray-800">Dashboard</span></a>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('beranda/gender'); ?>">
								<span class="text-gray-800">Gender</span></a>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('kategori/aksessoris'); ?>">
								<span class="text-gray-800">Aksessoris</span></a>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('kategori/mesin'); ?>">
								<span class="text-gray-800">Mesin Jam</span></a>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('kategori/dinding'); ?>">
								<span class="text-gray-800">Jam Dinding</span></a>
						</li>

						<!-- Nav Item - Alerts -->

						<!-- Dropdown - Alerts -->



						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('auth') ?>">
								<i class="fas fa-user fa-sm fa-fw text-gray-800"></i>
								<span class="text-gray-800">Login</span></a>
						</li>
						<!-- Dropdown - User Information -->

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<?= $this->session->flashdata('message'); ?>

				</div>
				<!-- /.container-fluid -->
				<div class="container-fluid">

					<!-- Untuk Slider -->
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="<?php echo base_url('assets/img/WELCOME.jpg'); ?>" class="d-block w-100" alt="gambar">
							</div>
							<div class="carousel-item">
								<img src="<?php echo base_url('assets/img/bannersw1.jpg'); ?>" class="d-block w-100" alt="gambar">
							</div>
							<div class="carousel-item">
								<img src="<?php echo base_url('assets/img/rolex.jpg'); ?>" class="d-block w-100" alt="gambar">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<br>
					<br>

					<div class="container-fluid">
						<h1 class="h3 mb-4 text-gray-800">Aksessoris</h1>

						<div class="container-fluid">
							<div class="row">
								<?php foreach ($aksessoris as $brg) : ?>
									<div class="card ml-3 mb-3" style="width: 16rem;">
										<img src="<?php echo base_url('assets/img/') . $brg->image ?>" class="card-img-top">
										<div class="card-body">
											<h5 class="card-title mb-1"><?php echo $brg->nama_barang ?></h5>
											<small><?php echo $brg->keterangan ?></small><br>
											<span class="badge bg-success mb-3" style="color: white;">Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></span><br>

											<!-- Tampilkan id_barang untuk button keranjang-->
											<?php echo anchor('beranda/tambahkeranjang/' . $brg->id_barang, '<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>

											<?php echo anchor('beranda/detail/' . $brg->id_barang, '<div class="btn btn-sm btn-success">Detail</div>') ?>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php echo anchor('kategori/pria', '<div class="btn btn-sm btn-danger">Kembali</div>') ?>
					</div>
				</div>


				<!-- End of Main Content -->

				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; Toko Jam Surya <?= date('Y') ?></span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Bootstrap core JavaScript-->
		<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
		<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
