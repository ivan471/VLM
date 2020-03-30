<div class="col-md-12">
	<div id="login">
		<div class="container">
			<div id="login-row" class="row justify-content-center align-items-center">
				<div id="login-column" class="col-md-8">
					<center>
						<?php if ($cek == "1"): ?>
							<div class="alert alert-danger mt-5" role="alert">
								E-mail atau password salah! Silakan cek kembali
							</div>
						<?php endif; ?>
						<div id="login-box" class="col-md-12 mt-5">
							<form id="login-form" class="form" action="<?= base_url().'sign_in' ?>" method="post">
								<h3 class="text-center text-info">Login</h3>
								<div class="form-group">
									<label for="username" class="text-info">E-mail:</label><br>
									<input type="text" name="email" id="username" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="password" class="text-info">Password:</label><br>
									<input type="password" name="password" id="password" class="form-control" required>
								</div>
								<div class="form-group">
									<button type="submit" name="button" class="btn btn-grad">Login</button>
								</div>
								<div class="text-right">
									<h5 class="info">Jika belum ada akun, <a href="<?= base_url().'register_page' ?>" class="text-info">Klik disini.</a></h5>
									<h5><a href="<?= base_url().'lupa_password' ?>">Lupa Password</a></h5>
								</div>
							</form>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
