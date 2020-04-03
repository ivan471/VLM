<section class="section section-top section-full">
	<!-- Cover -->
	<div class="bg-cover center" style="background-image: url(assets/cover.jpg); height:auto;"></div>
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
						<?php if ($pesan == "1"): ?>
							<div class="alert alert-success" role="alert">
								File PDF berhasil diupload.
							</div>
						<?php endif; ?>
						<form method="post" action="<?= base_url().'save' ?>"enctype="multipart/form-data">
							<div class="row">
								<div class="col-sm-3">
									<label for="">File</label><br>
									<label for="">Keterangan</label>
								</div>
								<div class="col-sm-9">
									<input class="mb-2" id="file" type="file" name="file" accept="application/pdf" onchange="ValidateSize(this)">
									<textarea class="form-control mb-2" name="deskripsi" placeholder="Masukkan Keterangan File" required></textarea>
								</div>
							</div>
							<center>
								<button type="submit" class="btn simpan mb-2">Simpan</button>
							</center>
						</form>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="shadow card mt-3">
			<div class="card-body">
				<table class="table table-sm table-bordered table-hover toggle-circle" data-page-size="10">
					<thead>
						<tr>
							<th>Nama File</th>
							<th>Tanggal</th>
							<th>Keterangan</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($file as $k): ?>
							<td><?= $k['nama_file'] ?></td>
							<td><?= $k['tanggal'] ?></td>
							<td><?= $k['keterangan'] ?></td>
							<td>
								<button type="button" name="button">Download PDF</button>
							</td>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
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
