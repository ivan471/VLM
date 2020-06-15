<section class="section section-top section-full">
	<!-- Cover -->
	<div class="bg-cover center" style="background-image: url(assets/img/cover.jpg); height:auto;"></div>
	<!-- Overlay -->
	<div class="bg-overlay"></div>
	<div class="container">
		<div class="col-md-10 col-lg-7 ">
			<h1 style="color:#fff;font-size:50px;">Event</h1>
		</div>
	</div>
	<!-- / .container -->
</section>
<section class="section" id="feature">
	<div class="container">
		<div class="col-md-6 mx-auto">
			<h3><?= $event['tanggal']; ?></h3>
			<img src="<?= base_url().'assets/gambar_kegiatan/'.$event['gambar'] ?>" class="mx-auto" alt="">
			<p class="mt-3"><?= $event['deskripsi']; ?></p>
		</div>
	</div>
</section>
