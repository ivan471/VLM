<html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body>
	<div class="container">
		<div class="card">
			<div style="text-align: justify">
				<h5>Tanggal : <?= date("d M Y"); ?></h5>
				<h3>Hallo,<?= $nama; ?></h3>
				<p>Untuk menganti password anda, silakan klik link berikut ini:</p>
				<a href="<?= base_url('change-password-page/'.$pesan);  ?>" target="_blank">Ubah Passwordmu.</a>
				<p>Terima Kasih.</p>
			</div>
		</div>
	</div>
</body>
</html>
