<div class="container">

	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
						</div>
						<form class="user" method="POST" action="<?= base_url('auth/registrasi'); ?>">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="nama1" name="nama1" placeholder="First Name" value="<?= set_value('nama1')  ?>">
									<?= form_error('nama1', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control form-control-user" id="nama2" name="nama2" placeholder="Last Name" value="<?= set_value('nama2')  ?>">
									<?= form_error('nama2', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email')  ?>">
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
									<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="col-sm-6">
									<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
									<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">
								Register Account
							</button>

						</form>
						<hr>
						<div class="text-center">
							<a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
