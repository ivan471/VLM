<section class="section section-top section-full">
  <!-- Cover -->
  <div class="bg-cover center" style="background-image: url(assets/cover.jpg); height:auto;"></div>
  <!-- Overlay -->
  <div class="bg-overlay"></div>
  <div class="container">
    <div class="col-md-10 col-lg-7 ">
      <h1 style="color:#fff;font-size:50px;">Event</h1>
    </div>
  </div>
  <!-- / .container -->
</section>
<section class="section" id="feature">
  <div class="container">
    <!-- <form class="was-validated" action="" method="post"> -->
    <?php if ($this->session->status == '1'): ?>
      <center>
        <div class="col-md-8 mb-3 mb-md-0">
          <div class="card text-center">
            <div class="card-header">
              <h3>Input Event</h3>
            </div>
            <div class="card-body">
              <?php if ($kq == "1"): ?>
                <div class="alert alert-success" role="alert">
                  Pesan Berhasil Terkirim.
                </div>
              <?php endif;
              if ($kq == "2"): ?>
                <div class="alert alert-danger" role="alert">
                  Pesan Gagal terkirim.
                </div>
              <?php endif; ?>
              <form id="form_event" method="post" action="<?= base_url().'simpan' ?>"enctype="multipart/form-data">
                <input class="mb-2" id="file" type="file" name="foto" accept="image/jpeg, image/x-png"  onchange="ValidateSize(this)">
                <div class="">
                  <label for="">Pilihan Umur :</label>
                  <label for="semua">Semua Umur</label>
                  <input type="radio" name="umur" id="umur" value="1" onclick="javascript:Check();" id="semua" class="mr-5 ml-2" checked>
                  <label for="antara">Pilihan Umur</label>
                  <input type="radio" name="umur" id="umur" value="2" onclick="javascript:Check();" id="antara" class="ml-2">
                  <div id="pilihan" style="display:none">
                    <label for="umur1">Dari Umur</label>
                    <input type="number" name="umur1" value="">
                    <label for="umur2" class="mr-2 ml-2">Sampai Umur</label>
                    <input type="number" name="umur2" value="">
                  </div>
                </div>
                <textarea class="form-control mb-2" name="deskripsi" id="deskripsi" placeholder="Masukkan Informasi Event" required></textarea>
                <button type="submit" class="btn simpan mb-2" id="btn_save" >Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </center>
    <?php endif; ?>
    <!-- </form> -->
    <div class="shadow card mt-3">
      <div class="card-header">
        <h2>Daftar Event</h2>
      </div>
      <div class="card-body">
        <div class="row">
          <?php foreach ($event as $k): ?>
            <div class="col-md-4 mb-3">
              <div class="shadow card">
                <div class="bingkai-gambar">
                  <img  src="<?= base_url().'assets/gambar_kegiatan/'.$k['gambar'] ?>" class="responsive gmbr1">
                </div>
                <div class="card-body">
                  <div style="overflow-y:scroll;height:100px;">
                    <p><?= $k['deskripsi'] ?></p>
                  </div>
                  <?php if ($this->session->status == '1'): ?>
                    <a href="<?= base_url().'edit/'.$k['id'] ?>" class="btn btn-primary float-left">Edit</a>
                    <a href="<?= base_url().'hapus/'.$k['id'] ?>" class="btn btn-danger float-right">Hapus</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
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

<div class="modal" id="modal_notif" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p>Pesan event sudah terkirim</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn_close" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="modal_notif_error" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p>Ukuran File Melebihi 4 MB. Silakan Pilih lagi file dibawah 4MB.</p>
      </div>
      <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="tutup()">Close</button>
    </div>
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
<script type="text/javascript">
function Check() {
  if (document.getElementById('antara').checked) {
    document.getElementById('pilihan').style.display = 'block';
  } else {
    document.getElementById('pilihan').style.display = 'none';
  }
}

function ValidateSize(file) {
  var modal = document.getElementById('modal_notif_error');
  var FileSize = file.files[0].size / 1024 / 1024; // in MB
  if (FileSize > 4) {
    modal.style.display = 'block';
  }
}
function tutup(){
  document.getElementById('modal_notif_error').style.display = 'none';
}
</script>
