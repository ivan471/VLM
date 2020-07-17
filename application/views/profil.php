<section class="section" id="feature">
	<div class="container">
		<div class="col-md-8 mx-auto">
			<div class="card" style="max-width: 1024px;">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="<?= base_url().'assets/profil/'.$profil['gambar'] ?>" class="card-img" alt="...">
					</div>
					<div class="col-md-4 mt-2 pl-3">
						<h5 class="card-title">Nama Lengkap</h5>
						<h5 class="card-title">E-mail</h5>
						<h5 class="card-title">Tanggal Lahir</h5>
						<h5 class="card-title">Tempat Lahir</h5>
						<h5 class="card-title">Umur</h5>
						<h5 class="card-title">Jenis Kelamin</h5>
						<h5 class="card-title">Nomor WA</h5>
					</div>
					<div class="col-md-4 mt-2">
						<h5 class="card-title">: <?= $profil['nama']; ?></h5>
						<h5 class="card-title">: <?= $profil['email']; ?></h5>
						<h5 class="card-title">: <?= tgl_indo($profil['tgl_lahir']); ?></h5>
						<h5 class="card-title">: <?= $profil['tempat_lahir']; ?></h5>
						<h5 class="card-title">: <?= $profil['umur']; ?></h5>
						<h5 class="card-title">: <?= $profil['jenis_kelamin']; ?></h5>
						<h5 class="card-title">: <?= $profil['no_hp']; ?></h5>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<form class="" action="<?= base_url().'upload/'.$profil['id_user'] ?>" method="post" enctype="multipart/form-data">
							<label for="">Upload Gambar Profil</label><br>
							<input type="file" id="upload" name="gambar" required>
							<button type="submit" name="button" class="save">Upload</button>
						</form>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<form class="" action="<?= base_url().'vlm/ganti/'.$this->session->uid ?>" method="post" enctype="multipart/form-data">
							<label for="">Ganti Password</label><br>
							<?php if ($hasil == '1'): ?>
								<div class="alert alert-success mt-5" role="alert">
									Password Anda Berhasil Diubah
								</div>
							<?php endif; ?>
							<?php if ($hasil == '2'): ?>
								<div class="alert alert-danger mt-5" role="alert">
									Password Tidak Sama
								</div>
							<?php endif; ?>
							<label for="">Password Baru</label>
							<input class="form-control mb-1" type="password" name="pass1" required>
							<label for="">Password Baru Konfirmasi</label>
							<input class="form-control mb-1" type="password" name="pass2" required><br>
							<button type="submit" name="button" class="save">Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
} ?>
