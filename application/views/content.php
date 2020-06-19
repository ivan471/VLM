<html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body>
	<div style="text-align: justify">
		<h5>Tanggal : <?= date("d M Y"); ?></h5>
		<p>Untuk melihat detail event ini silakan link berikut ini:</p>
		<a href="<?= base_url('detail/'.$pesan);  ?>" target="_blank">Klik Disini.</a>
		<p>Terima Kasih.</p>
	</div>
</body>
</html>
