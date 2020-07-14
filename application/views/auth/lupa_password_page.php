<div class="col-md-12">
	<div id="login">
		<div class="container">
			<div id="login-row" class="row justify-content-center align-items-center">
				<div id="login-column" class="col-md-8">
					<center>
						<?php if ($cek == "1"): ?>
							<div class="alert alert-danger mt-5" role="alert">
								Alamat Email tidak terdaftar
							</div>
						<?php endif; ?>
						<?php if ($cek == "2"): ?>
							<div class="alert alert-success mt-5" role="alert">
								Silakan Cek Email Anda
							</div>
						<?php endif; ?>
						<div id="lupa-box" class="col-md-12 mt-5">
							<form id="login-form" class="form" action="<?= base_url().'get_link' ?>" method="post">
								<h3 class="text-center text-info">Lupa Password</h3>
								<div class="form-group">
									<label for="password" class="text-info">Email:</label><br>
									<input type="email" name="email" id="password" class="form-control" placeholder="Email" required>
								</div>
								<div class="form-group">
									<button type="submit" name="button" class="save">Ganti Password</button>
								</div>
							</form>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
