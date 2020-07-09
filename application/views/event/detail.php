<section class="section" id="feature">
	<div class="container">
		<div class="col-md-8 mx-auto">
			<h4><?= date_format(date_create($event['tanggal']),"d M Y"); ?></h4>
				<div class="col-md-7 mx-auto">
					<img src="<?= base_url().'assets/gambar_kegiatan/'.$event['gambar'] ?>" class="responsive" alt="">
				</div>
			<div style="color:black;" class="mt-1">
				<?= $event['deskripsi']; ?>
			</div>
		</div>
	</div>
</section>
