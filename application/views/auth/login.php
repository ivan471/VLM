<section class="section" id="feature">
	<div class="container">
		<center>
			<div class="col-md-12">
				<div class="bungkus">
					<div id="login">
						<div class="container">
							<div id="login-row" class="row justify-content-center align-items-center">
								<div id="login-column" class="col-md-8">
									<?php if ($cek == "1"): ?>
										<div class="alert alert-danger" role="alert">
											E-mail atau password salah! Silakan cek kembali
										</div>
									<?php endif; ?>
									<div id="login-box" class="col-md-12">
										<form id="login-form" class="form" action="<?= base_url().'sign_in' ?>" method="post">
											<h3 class="text-center text-info">Login</h3>
											<div class="form-group">
												<label for="username" class="text-info">E-mail:</label><br>
												<input type="text" name="email" id="username" class="form-control">
											</div>
											<div class="form-group">
												<label for="password" class="text-info">Password:</label><br>
												<input type="password" name="password" id="password" class="form-control">
											</div>
											<div class="form-group">
												<input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
											</div>
											<div id="register-link" class="text-right">
												<a href="<?= base_url().'register_page' ?>" class="text-info">Register here</a>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</center>
	</div>
</section>
