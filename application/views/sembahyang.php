<section class="section section-top section-full">
  <!-- Cover -->
  <div class="bg-cover" style="background-image: url(assets/img/56.jpg);"></div>
  <!-- Overlay -->
  <div class="bg-overlay"></div>
  <!-- Content -->
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-10 col-lg-7 ">

      </div>
    </div>
    <!-- / .row -->
  </div>
  <!-- / .container -->
</section>
<section class="section" id="feature">
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
  <div class="container">
    <?php foreach ($pemberitahuan as $v): ?>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <p><?= $v['isi']; ?></p>
              <p><?= $v['tanggal']; ?></p>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
