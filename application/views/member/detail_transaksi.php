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
							<a class="nav-link" href="<?= base_url('pengguna'); ?>">
								<span class="text-gray-800">Dashboard</span></a>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('beranda/gender'); ?>">
								<span class="text-gray-800">Gender</span></a>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('kategori/aksessoris_user'); ?>">
								<span class="text-gray-800">Aksessoris</span></a>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('kategori/mesin_user'); ?>">
								<span class="text-gray-800">Mesin Jam</span></a>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('kategori/dinding_user'); ?>">
								<span class="text-gray-800">Jam Dinding</span></a>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>


						<li class="nav-item">
							<br>
							<?php $keranjang = '<i class="fas fa-shopping-cart">Keranjang :</i>' . $this->cart->total_items() ?>
							<?php echo anchor('pengguna/detail_keranjang', $keranjang) ?>
						</li>


						<div class="topbar-divider d-none d-sm-block"></div>


						<!-- Nav Item - Alerts -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-bell fa-fw"></i>
								<!-- Counter - Alerts -->
								<span class="badge badge-danger badge-counter">3+</span>
							</a>
							<!-- Dropdown - Alerts -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
								<h6 class="dropdown-header">
									Alerts Center
								</h6>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-primary">
											<i class="fas fa-file-alt text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 12, 2019</div>
										<span class="font-weight-bold">A new monthly report is ready to download!</span>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-success">
											<i class="fas fa-donate text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 7, 2019</div>
										$290.29 has been deposited into your account!
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-warning">
											<i class="fas fa-exclamation-triangle text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 2, 2019</div>
										Spending Alert: We've noticed unusually high spending for your account.
									</div>
								</a>
								<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
							</div>
						</li>




						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $login['nama']; ?> <?= $login['nama_belakang']; ?></span>
								<img class="img-profile rounded-circle" src="<?= base_url('assets/img/profil/') . $login['image']; ?>">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?= base_url('pengguna/profil'); ?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									My Profile
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= base_url('pengguna/edit'); ?>">
									<i class="fas fa-user-edit text-gray-400"></i>
									Edit Profile
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= base_url('pengguna/change'); ?>">
									<i class="fas fa-fw fa-key text-gray-400"></i>
									Change Password
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-gray-800">Invoice</h1>

					<div class="alert alert-success">
						<p class="text-center align-middle">Silahkan Memasukkan Pembayaran Via ATM</p>
					</div>

					<form method="post" action="<?php echo base_url() ?>pengguna/invoice">
						<label>No Invoice: 02HMDHSN1968</label>
						<div class="form-group">
							<label>Nama </label>
							<input type="text" name="nama_user" placeholder="Nama" class="form-control" value="<?= $login['nama'] ?> <?= $login['nama_belakang'] ?>" readonly>
						</div>

						<div class="form-group">
							<label>NO HP</label>
							<input type="text" name="hp" placeholder="No HP" class="form-control">
						</div>

						<div class="form-group">
							<label>Bukti Transfer, No Rekening : xxxxxxxxxx</label>
							<input class="form-control form-control-sm" name="image" id="image" type="file">
							<label for="formFileSm" class="form-label">Note: Minimal DP 50% dan Jika pesanan tidak diambil selama 1X24 jam maka DP tidak bisa dikembalikan</label>
						</div>

						<button type="submit" class="btn btn-sm btn-primary mb-3">Lanjut Pembayaran</button>
					</form>


					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
				</div>
				<!-- /.container-fluid -->
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

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="<?= base_url('auth'); ?>">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
