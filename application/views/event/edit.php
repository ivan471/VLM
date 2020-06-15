<section class="section section-top section-full">
  <!-- Cover -->
  <div class="bg-cover" style="background-image: url(<?= base_url().'assets/cover.png' ?>);"></div>
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
<div class="container">
  <h1>Edit Event</h1>
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <form action="<?= base_url().'edit_event/'.$event['id'] ?>" method="post">
          <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" rows="5" cols="80" class="form-control mb-2"><?= $event['deskripsi']?></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="button" class="save">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>
