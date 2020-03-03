<section class="section" id="feature">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<a class="btn" href="<?= base_url().'members' ?>">Kembali</a>
			</div>
			<div class="card-body">
				<form class="mx-auto" action="index.html" method="post">
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" name="nama" value="<?= $members['nama'] ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Status</label>
						<input type="text" name="status" value="Meninggal" readonly>
					</div>
					<div class="form-group">
						<button type="submit" name="button" class="btn-grad">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
