<section class="section" id="feature">
	<div class="container">
		<div class="col-md-11 mx-auto">
			<div class="card">
				<div class="card-header">
					<h3>List Admin</h3>
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col" style="color:#000;">No</th>
								<th scope="col" width="35%" style="color:#000;">Nama</th>
								<th scope="col" style="color:#000;">E-mail</th>
								<th scope="col" style="color:#000;">Umur</th>
								<th scope="col" style="color:#000;">Nomor WA</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $id=1;
							foreach ($list as $admin): ?>
							<tr>
								<th scope="row" style="color:#000;"><?= $id; ?></th>
								<td style="color:#000;"><?= $admin['nama'] ?></td>
								<td width="10%" style="color:#000;"><?= $admin['email'] ?></td>
								<td style="color:#000;"><?= $admin['umur'] ?></td>
								<td style="color:#000;"><?= $admin['no_hp'] ?></td>
								<?php if ($admin['nama'] != 'Admin') {?>
									<td width="15%"><a href="<?= base_url('ubah/'.$admin['id_user'])?>" class="download">Ubah</a></td>
								<?php } ?>
							</tr>
							<?php $id++; endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
