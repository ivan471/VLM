<div class="container">
	<center>
		<div class="col-md-8 mt-5 mb-5">
			<?php if ($cek == "1"): ?>
				<div class="alert alert-danger" role="alert">
					Password tidak sama!! Silakan cek kembali.
				</div>
			<?php endif; ?>
			<?php if ($cek == "2"): ?>
				<div class="alert alert-success" role="alert">
					Berhasil Daftar Akun Member.
				</div>
			<?php endif; ?>
			<div class="card bg-light">
				<article class="card-body mx-auto" style="max-width: 550px; width:100%;">
					<h4 class="card-title mt-3 text-center">Buat Akun Baru</h4>
					<p class="text-center">Mulai Buat Akun Member.</p>
					<form action="<?= base_url().'req' ?>" method="post">
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-user"></i> </span>
							</div>
							<input name="nama" class="form-control" placeholder="Nama Lengkap" type="text" required>
						</div> <!-- form-group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
							</div>
							<input name="email" class="form-control" placeholder="Masukkan Email" type="email" required>
						</div> <!-- form-group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fas fa-home"></i> </span>
							</div>
							<input name="tmpt_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" type="text" required>
						</div> <!-- form-group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="far fa-calendar-alt"></i> </span>
							</div>
							<input name="tgl_lahir" class="form-control" type="date" required>
						</div> <!-- form-group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <img src="<?= base_url().'assets/icon_umur.bmp' ?>" width="28px" height="28px" alt=""> </span>
							</div>
							<input name="umur" class="form-control" placeholder="Masukkan Umur Anda" type="number" required>
						</div> <!-- form-group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
							</div>
							<input name="no_hp" class="form-control" placeholder="Nomor WA" type="text">
						</div> <!-- form-group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fas fa-venus-mars"></i> </span>
							</div>
							<div class="ml-3 form-check form-check-inline">
								<input type="radio" class="form-check-input" name="jk" value="Pria" id="pria" required>
								<label for="pria" class="mt-2" style="font-size:18px;">Pria</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" name="jk" value="Wanita" id="wanita" required>
								<label for="wanita" class="mt-2" style="font-size:18px;">Wanita</label>
							</div>
						</div> <!-- form-group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
							</div>
							<input class="form-control" name="password" placeholder="Create password" type="password">
						</div> <!-- form-group// -->
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
							</div>
							<input class="form-control" name="password1" placeholder="Repeat password" type="password">
						</div> <!-- form-group// -->
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Buat Akun  </button>
						</div> <!-- form-group// -->
						<p class="text-center">Sudah Punya Akun? <a href="<?= base_url().'login_page' ?>">Log In</a> </p>
					</form>
				</article>
			</div> <!-- card.// -->
		</div>
	</center>
</div>
