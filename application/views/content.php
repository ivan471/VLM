<html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body>
	<div class="card">
		<div style="text-align: justify">
			<h5>Tanggal : <?= date("d M Y"); ?></h5>
			<p>Untuk melihat detail informasi, silakan klik link berikut ini:</p>
			<?php if ($id == '0'){ ?>
				<a href="<?= base_url('detail/'.$pesan);  ?>" target="_blank">Halaman Event.</a>
			<?php }elseif ($id == '1'){ ?>
				<a href="<?= base_url('sembahyang');  ?>" target="_blank">Halaman Pemberitahuan.</a>
			<?php }else{ ?>
				<a href="<?= base_url('belajar');  ?>" target="_blank">Halaman Belajar.</a>
			<?php } ?>
			<p>Terima Kasih.</p>
		</div>
	</div>
</body>
</html>
