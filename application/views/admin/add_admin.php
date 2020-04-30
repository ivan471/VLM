<section class="section" id="feature">
	<div class="container">
		<div class="col-md-7 mx-auto">
			<div class="card">
				<div class="card-header">
					<h3>Tambah Akun Admin Baru</h3>
				</div>
				<div class="card-body">
					<form action="<?= base_url().'save' ?>" method="post">
						<div class="form-group">
							<label for="nama">Nama Lengkap</label>
							<input type="text" class="form-control" name="nama" id="nama" required>
						</div>
						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="email" class="form-control" name="email" id="email" required>
						</div>
						<div class="form-group">
							<label for="tgl_lahir">Tanggal Lahir</label>
							<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
						</div>
						<div class="form-group">
							<label for="tmpt_lahir">Tempat Lahir</label>
							<input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" required>
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
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
						<div class="form-group">
							<label for="umur">Umur</label>
							<input type="number" class="form-control" name="umur" id="umur" required>
						</div>
						<button type="submit" class="save float-right">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
