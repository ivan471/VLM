<section class="section" id="feature">
	<div class="container">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">
					<h3>Daftar Akun Admin Baru</h3>
				</div>
				<div class="card-body">
					<form class="" action="<?= base_url().'save' ?>" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Lengkap</label>
							<input type="text" class="form-control" name="nama" id="exampleInputEmail1" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">E-mail</label>
							<input type="email" class="form-control" name="email" id="exampleInputPassword1" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Tanggal Lahir</label>
							<input type="date" class="form-control" name="tgl_lahir" id="exampleInputPassword1" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Tempat Lahir</label>
							<input type="text" class="form-control" name="tmpt_lahir" id="exampleInputPassword1" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Umur</label>
							<input type="number" class="form-control" name="umur" id="exampleInputPassword1" required>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
