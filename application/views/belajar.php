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
			<center>
				<div class="col-md-8 mb-3 mb-md-0">
					<div class="card text-center">
						<div class="card-header">
							<h3>Input PDF</h3>
						</div>
						<div class="card-body">
							<?php if ($pesan == "1"): ?>
								<div class="alert alert-success" role="alert">
									File PDF berhasil diupload.
								</div>
							<?php endif; ?>
							<form method="post" action="<?= base_url().'save' ?>"enctype="multipart/form-data">
								<input class="mb-2" id="file" type="file" name="file" accept="image/jpeg, image/x-png" onchange="ValidateSize(this)">
								<br><textarea class="form-control mb-2" name="deskripsi" placeholder="Masukkan Informasi Tentang File Pdf" required></textarea>
								<button type="submit" class="btn simpan mb-2">Simpan</button>
							</form>
						</div>
					</div>
				</div>
			</center>
		<?php endif; ?>
		<div class="shadow card mt-3">
			<div class="card-body">
				<div class="row">
					<?php foreach ($file as $k): ?>
						<div class="col-md-4 mb-3">
							<div class="shadow card">
								<!-- <div class="bingkai-gambar">
									<img  src="<?= base_url().'assets/gambar_kegiatan/'.$k['gambar'] ?>" class="responsive gmbr1">
								</div> -->
								<div class="card-body">
									<div style="overflow-y:scroll;height:100px;">
										<p><?= $k['keterangan'] ?></p>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
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
