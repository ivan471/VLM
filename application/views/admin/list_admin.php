<section class="section" id="feature">
	<div class="container">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">
					<h3>Daftar Akun Admin Baru</h3>
				</div>
			</div>
			<div class="card-body">
				<div class="col-md-8">
					<h3 class="mb-3">Daftar Admin</h3>
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col" width="40%">Nama</th>
								<th scope="col">E-mail</th>
								<th scope="col">Umur</th>
								<th scope="col">Nomor WA</th>
							</tr>
						</thead>
						<tbody>
							<?php $id=1;
							foreach ($list as $admin): ?>
							<tr>
								<th scope="row"><?= $id; ?></th>
								<td><?= $admin['nama'] ?></td>
								<td width="10%"><?= $admin['email'] ?></td>
								<td><?= $admin['umur'] ?></td>
								<td><?= $admin['no_hp'] ?></td>
							</tr>
							<?php $id++; endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
