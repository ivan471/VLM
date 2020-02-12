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
  <div class="container">
    <!-- <form class="was-validated" action="" method="post"> -->
    <center>
      <div class="col-md-6 mb-3 mb-md-0">
        <div class="card text-center">
          <div class="card-body">
            <form class="" action="<?= base_url().'simpan' ?>" method="post" enctype="multipart/form-data">
              <input class="mb-2" type="file" name="foto" value="">
              <textarea class="form-control is-invalid mb-2" name="deskripsi" id="validationTextarea" placeholder="Required example textarea" required></textarea>
              <button type="submit" class="btn btn-success mb-2">Simpan</button>
            </form>
            <button type="submit" class="btn btn-warning mb-2">Cancel</button>
          </div>
        </div>
      </div>
    </center>
    <!-- </form> -->
    <div class="row mt-3">
      <?php foreach ($event as $k): ?>
        <div class="col-md-4 mt-2">
          <div class="card">
            <img id="gmbr1" src="<?= base_url().'assets/gambar_kegiatan/'.$k['gambar'] ?>" width="100%" height="1080px"class="card-img-top view-gmbr">
            <div class="card-body">
              <div style="overflow-y:scroll;height:100px;">
                <p><?= $k['deskripsi'] ?></p>
              </div>
              <a href="<?= base_url().'edit/'.$k['id'] ?>" class="btn btn-primary">Edit</a>
              <a href="<?= base_url().'hapus/'.$k['id'] ?>" class="btn btn-danger">Hapus</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" onclick="this.style.display='none'">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  $('.view-gmbr').click(function(){
    var id = $(this).data('id');
    $.ajax({
      url:'<?= base_url(); ?>event/get_data',
      method:"POST",
      data:{id:id},
      success: function(response){
        $('.modal-body').html(response);
        $('#exampleModal').modal('show');

      }
    })
  })
})
</script>
