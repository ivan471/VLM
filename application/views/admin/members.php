<section class="section" id="feature">
	<div class="container">
		<div class="col-md-10 mx-auto">
			<div class="card">
				<div class="card-header">
					<h3>Daftar Member</h3>
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Tanggal Lahir</th>
								<th scope="col">Tempat Lahir</th>
								<th scope="col">E-mail</th>
								<th scope="col">Umur</th>
								<th scope="col">No WA</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($members as $m): ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $m['nama'] ?></td>
								<td><?= tgl_indo($m['tgl_lahir']); ?></td>
								<td><?= $m['tempat_lahir'] ?></td>
								<td><?= $m['email'] ?></td>
								<td><?= $m['umur'] ?></td>
								<td><?= $m['no_hp'] ?></td>
							</tr>
						<?php $i++; endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
} ?>
