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
							<?php if ($kq == "1"): ?>
								<div class="alert alert-success" role="alert">
									File PDF berhasil diupload.
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</center>
		<?php endif; ?>
	</div>
</section>
