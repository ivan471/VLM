<section class="section section-top section-full">
  <!-- Cover -->
  <div class="bg-cover" style="background-image: url(assets/cover.png);"></div>
  <!-- Overlay -->
  <div class="bg-overlay"></div>
  <!-- / .container -->
</section>
<section class="section mt-5" id="feature">
  <?php if ($this->session->status == '1'){ ?>
    <center>
      <div class="container">
        <div class="col-md-6">
          <form action="<?= base_url().'simpan_pemberitahuan' ?>" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Isi Pemberitahuan</label>
              <textarea role="3" class="form-control" aria-describedby="emailHelp" name="pemberitahuan" placeholder="Isi Pemberitahuan" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </center>
  <?php } ?>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2>Daftar Pemberitahuan Sembahyang</h2>
      </div>
      <div class="card-body">
        <?php foreach ($pemberitahuan as $v): ?>
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h4><?= $v['isi']; ?></h4>
                </div>
                <div class="card-footer text-muted">
                  <center>
                  <?= tgl_indo($v['tanggal']); ?>
                </center>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
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
