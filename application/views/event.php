<section class="section section-top section-full">
  <!-- Cover -->
  <div class="bg-cover center" style="background-image: url(assets/cover.jpg); height:auto;"></div>
  <!-- Overlay -->
  <div class="bg-overlay"></div>
  <!-- / .container -->
</section>
<section class="section" id="feature">
  <div class="container">
    <!-- <form class="was-validated" action="" method="post"> -->
    <?php if ($this->session->status == '1'): ?>
      <center>
        <div class="col-md-6 mb-3 mb-md-0">
          <div class="card text-center">
            <div class="card-header">
              <h3>Input Event</h3>
            </div>
            <div class="card-body">
              <form class="" action="<?= base_url().'simpan' ?>" method="post" enctype="multipart/form-data">
                <input class="mb-2" type="file" name="foto" value="">
                <textarea class="form-control mb-2" name="deskripsi" placeholder="Masukkan Informasi Event" required></textarea>
                <button type="submit" class="btn btn-success mb-2">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </center>
    <?php endif; ?>
    <!-- </form> -->
    <div class="card mt-3">
      <div class="card-header">
        <h2>Daftar Event</h2>
      </div>
      <div class="card-body">
        <div class="row mt-3">
          <?php $id=0;
          foreach ($event as $k): ?>
          <div class="col-md-4 mt-2">
            <div class="card">
              <input type="hidden" id="id" value="<?= $id; ?>">
              <img  src="<?= base_url().'assets/gambar_kegiatan/'.$k['gambar'] ?>" width="100%" height="1080px"class="card-img-top view-gmbr gmbr1">
              <div class="card-body">
                <div style="overflow-y:scroll;height:100px;">
                  <p><?= $k['deskripsi'] ?></p>
                </div>
                <?php if ($this->session->status == '1'): ?>
                  <a href="<?= base_url().'edit/'.$k['id'] ?>" class="btn btn-primary">Edit</a>
                  <a href="<?= base_url().'hapus/'.$k['id'] ?>" class="btn btn-danger">Hapus</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php $id++; endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- The Modal -->
<div id="myModal" class="modal">
  <div class="modal-body">
    <img class="modal-content" id="img01">
    <span class="close" id="close">&times;</span>
  </div>
</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");
var i;
var img = document.getElementsByClassName("gmbr1");
var modalImg = document.getElementById("img01");
for (i= 0; i < img.length; i++) {
  img[i].onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
  }
}
// Get the <span> element that closes the modal
var span = document.getElementById("close");
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>
