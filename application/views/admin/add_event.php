<?php
//index.php
$minimum_range = 0;
$maximum_range = 80;
?>
<section class="section" id="feature">
	<div class="container">
		<div class="col-md-10 mx-auto">
			<div class="card">
				<div class="card-header">
					<h3>Tambah Event</h3>
				</div>
				<div class="card-body">
					<?php if ($kq == "1"): ?>
						<div class="alert alert-success" role="alert">
							Pesan Berhasil Terkirim.
						</div>
					<?php endif;
					if ($kq == "2"): ?>
					<div class="alert alert-danger" role="alert">
						Pesan Gagal terkirim.
					</div>
				<?php endif; ?>
				<form id="form_event" method="post" action="<?= base_url().'simpan' ?>"enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-2">
							<label>Pilihan Umur</label>
						</div>
						<div class="col-sm-10">
							<input type="radio" name="umur" value="1" onclick="Check()" id="semua" class="ml-2" checked>
							<label for="semua">Semua Umur</label>
							<input type="radio" name="umur" value="2" onclick="Check()" id="antara" class="ml-2">
							<label for="antara">Pilihan Umur</label>
							<div id="pilihan" style="display:none;">
								<div class="row">
									<div class="col-sm-2">
										<input type="text" style="text-align: center;" name="umur1" id="minimum_range" class="form-control mb-3" value="<?= $minimum_range; ?>" readonly/>
									</div>
									<div class="col-sm-4	" style="padding-top:12px">
										<div id="price_range"></div>
									</div>
									<div class="col-sm-2">
										<input type="text" style="text-align: center;" name="umur2" id="maximum_range" class="form-control mb-3" value="<?= $maximum_range; ?>" readonly/>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<label>Keterangan</label><br><br><br>
							<label>Gambar</label>
							<div id="slider-range"></div>
						</div>
						<div class="col-sm-10">
							<div id="pilihan" style="display:none">
							</div>
							<textarea class="form-control mb-2" name="deskripsi" id="deskripsi" placeholder="Masukkan Keterangan Event" required></textarea>
							<input class="mb-2" id="file" type="file" name="foto" accept="image/jpeg, image/x-png"  onchange="readURL(this);"><br>
						</div>
					</div>
					<center>
						<img id="blah" src="#" alt="Picture" />
					</center>
					<center>
						<button type="submit" class="save mb-2 mt-2" id="btn_save">Simpan</button>
					</center>
				</form>
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
$(document).ready(function(){
	$('#price_range').slider({
		range:true,
		min:0,
		max:80,
		values:[<?php echo $minimum_range; ?>, <?php echo $maximum_range; ?>],
		slide:function(event, ui){
			$("#minimum_range").val(ui.values[0]);
			$('#maximum_range').val(ui.values[1]);
		}
	});
});
function Check() {
	if (document.getElementById('antara').checked) {
		document.getElementById('pilihan').style.display = 'block';
	} else {
		document.getElementById('pilihan').style.display = 'none';
	}
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
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#blah')
			.attr('src', e.target.result)
			.width(200)
			.height(200);
		};

		reader.readAsDataURL(input.files[0]);
	}
}
</script>
