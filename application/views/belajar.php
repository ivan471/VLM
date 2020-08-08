<section class="section section-top section-full">
	<!-- Cover -->
	<div class="bg-cover center" style="background-image: url(assets/img/cover.jpg); height:auto;"></div>
	<!-- Overlay -->
	<div class="bg-overlay"></div>
	<div class="container">
		<div class="col-md-10 col-lg-7 ">
			<h1 style="color:#fff;font-size:50px;">PDF</h1>
		</div>
	</div>
	<!-- / .container -->
</section>
<section class="section" id="feature">
	<div class="container">
		<?php if ($this->session->status == '1'): ?>
			<div class="col-md-8 mb-3 mb-md-0 mx-auto">
				<div class="card">
					<div class="card-header">
						<center>
							<h3>Input File Pdf</h3>
						</center>
					</div>
					<div class="card-body">
						<?php if ($pesan == "1"){ ?>
							<div class="alert alert-success" role="alert">
								File PDF berhasil diupload.
							</div>
						<?php }elseif ($pesan == "2"){ ?>
							<div class="alert alert-danger" role="alert">
								Gagal disimpan.
							</div>
						<?php }elseif ($pesan == "3"){ ?>
							<div class="alert alert-danger" role="alert">
								Gagal diupload.
							</div>
						<?php } ?>
						<form method="post" action="<?= base_url().'save' ?>"enctype="multipart/form-data">
							<div class="row">
								<div class="col-sm-3">
									<label for="">File</label><br>
									<label for="">Keterangan</label>
								</div>
								<div class="col-sm-9">
									<input class="mb-2" id="file" type="file" name="file" accept="application/pdf" onchange="ValidateSize(this)">
									<textarea class="form-control mb-2" name="keterangan" placeholder="Masukkan Keterangan File" required></textarea>
								</div>
							</div>
							<center>
								<button type="submit" class="save" onclick="showPage()">Simpan</button>
							</center>
						</form>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="shadow card mt-3">
			<div class="card-body table-responsive">
				<table class="table table-sm table-bordered table-hover toggle-circle" data-page-size="10">
					<thead>
						<tr>
							<th style="width:30%; text-align: center; color:#000;">Nama File</th>
							<th style="width:10%; text-align: center; color:#000;">Tanggal</th>
							<th style="width:45%; text-align: center; color:#000;">Keterangan</th>
							<th style="width:15%; text-align: center; color:#000;"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($files as $k): ?>
							<tr>
								<td style="color:#000;"><?= $k['nama_file'] ?></td>
								<td style="text-align: center; color:#000;"><?= tgl_indo($k['tanggal']); ?></td>
								<td style="color:#000;"><?= $k['keterangan'] ?></td>
								<td>
									<?php if (isset($this->session->uid)): ?>
										<form action="<?= base_url().'download_file/'.$k['id_file'] ?>" method="post" enctype="multipart/form-data">
											<button class="download float-left" type="submit" name="button"><i class="fas fa-file-download"></i></button>
										</form>
									<?php endif; ?>
									<?php if ($this->session->status == '1'): ?>
										<form action="<?= base_url().'delete_file/'.$k['id_file'] ?>" method="post" enctype="multipart/form-data">
											<button class="delete float-left" type="submit" onclick="return confirm('Yakin Ingin Hapus?');" name="button"><i class="fas fa-trash"></i></button>
										</form>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<div id="loader" style="display:none;"></div>

<div class="modal" id="modal_notif_error" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p>Ukuran File Melebihi 4 MB. Silakan Pilih lagi file dibawah 4MB.</p>
			</div>
			<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="tutup()">Close</button>
		</div>
	</div>
</div>
<script type="text/javascript">
function showPage() {
	document.getElementById("loader").style.display = "block";
}
function ValidateSize(file) {
	var modal = document.getElementById('modal_notif_error');
	var FileSize = file.files[0].size / 1024 / 1024; // in MB
	if (FileSize > 4) {
		modal.style.display = 'block';
	}
}
function tutup(){
	document.getElementById('modal_notif_error').style.display = 'none';
}
</script>
<?php
function tgl_indo($tanggal){
	$bulan = array ( 1 =>   'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	$pecahkan = explode('-', $tanggal);
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
} ?>
