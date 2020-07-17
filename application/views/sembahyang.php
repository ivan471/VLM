<section class="section section-top section-full">
  <!-- Cover -->
  <div class="bg-cover" style="background-image: url(assets/img/cover.png);"></div>
  <!-- Overlay -->
  <div class="bg-overlay"></div>
  <div class="container">
    <div class="col-md-10 col-lg-7 ">
      <h1 style="color:#fff;font-size:50px;">Pemberitahuan</h1>
    </div>
  </div>
  <!-- / .container -->
</section>
<section class="section" id="feature">
  <?php if ($this->session->status == '1'){ ?>
    <center>
      <div class="container mb-5">
        <div class="col-md-8 card px-auto pb-5 pt-5 px-5">
          <form action="<?= base_url().'simpan_pemberitahuan' ?>" method="post">
            <div class="form-group">
              <label for="pemberitahuan">Isi Pemberitahuan</label>
              <textarea role="3" id="deskripsi" class="form-control" name="pemberitahuan" placeholder="Isi Pemberitahuan" required></textarea>
            </div>
            <button type="submit" class="save" onclick="showPage()">Simpan</button>
          </form>
        </div>
      </div>
    </center>
  <?php } ?>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2>Daftar Pemberitahuan</h2>
      </div>
      <div class="card-body">
        <div class="row">
          <?php if (empty($pemberitahuan)){ ?>
            <h4 class="mx-auto">Tidak ada pemberitahuan</h4>
          <?php }else{
            foreach ($pemberitahuan as $v): ?>
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <h4><?= $v['isi']; ?></h4>
                </div>
                <div class="card-footer text-muted">
                  <!-- <center> -->
                  <?= tgl_indo($v['tanggal']); ?>
                  <!-- </center> -->
                  <?php if ($this->session->status == "1"): ?>
                    <a href="<?= base_url().'delete_sembayang/'.$v['id'] ?>" onclick="return confirm('Yakin Ingin Hapus?');" class="delete float-right" style="color:#FFF;"><i class="far fa-trash-alt"></i></a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach;
        } ?>
      </div>
    </div>
  </div>
</div>
</section>
<script type="text/javascript">
function showPage() {
  document.getElementById("loader").style.display = "block";
}
</script>
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
