<section class="section section-top section-full">
  <!-- Cover -->
  <div class="bg-cover center" style="background-image: url(assets/img/cover.jpg); height:auto;"></div>
  <!-- Overlay -->
  <div class="bg-overlay"></div>
  <div class="container">
    <div class="col-md-10 col-lg-7 ">
      <h1 style="color:#fff;font-size:50px;">Event</h1>
    </div>
  </div>
</section>
<section class="section" id="feature">
  <div class="container">
    <div class="row mt-2">
      <?php foreach ($event as $k): ?>
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="bingkai-gambar">
              <img  src="<?= base_url().'assets/gambar_kegiatan/'.$k['gambar'] ?>" onerror="this.src='<?= base_url('assets/img/not_found.png') ?>'" class="responsive gmbr1">
            </div>
            <div class="card-body">
              <div style="height:250px;">
                <h5 style="color:gray;"><?= date_format(date_create($k['tanggal']),"d M Y"); ?></h5>
                <p style="color:#000;"><?= substr($k['deskripsi'], 0, 180); ?>
                  <?php if (strlen($k['deskripsi'])> '180'): ?>
                    <a href="<?= base_url().'detail/'.$k['id'] ?>">[...]</a>
                  <?php endif; ?>
                </p>
              </div>
              <?php if ($this->session->status == '1'): ?>
                <a href="<?= base_url().'edit/'.$k['id'] ?>" class="download ml-1 float-right"><i class="fas fa-edit"></i></a>
                <a href="<?= base_url().'hapus/'.$k['id'] ?>" onclick="return confirm('Yakin Ingin Hapus?');" class="delete float-right"><i class="fas fa-trash"></i></a>
              <?php endif; ?>
              <a href="<?= base_url().'detail/'.$k['id'] ?>" class="float-left" >Detail</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- The Modal Image-->
  <div id="myModal" class="modal">
    <div class="modal-body">
      <img class="modal-content" id="img01">
      <span class="close" id="close">&times;</span>
    </div>
  </div>
  <script type="text/javascript">
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
