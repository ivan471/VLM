<nav class="navbar navbar-expand-lg navbar-dark navbar-togglable  fixed-top " id="mainNav">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand js-scroll-trigger">
      <h2>Vihara Lahuta Maitreya</h2>
    </a>
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon-bar">
        <i class="fa fa-bars"></i>
      </span>
    </button>

    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <!-- Links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Tentang Vihara
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kegiatan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?= base_url().'sembahyang' ?>">Pemberitahuan</a>
            <a class="dropdown-item" href="<?= base_url().'event' ?>">Event</a>
            <a class="dropdown-item" href="<?= base_url().'belajar' ?>">Belajar</a>
          </div>
        </li>
        <?php if (!isset($this->session->uid)){ ?>
          <li class="nav-item ">
            <a class="nav-link js-scroll-trigger" href="<?= base_url().'login_page' ?>">
              <i class="fas fa-sign-in-alt"></i> Login Akun
            </a>
          </li>
        <?php }else {?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $this->session->nama ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php if ($this->session->status == '1') { ?>
                <a class="dropdown-item" href="<?= base_url().'list_admin' ?>">List Admin</a>
                <a class="dropdown-item" href="<?= base_url().'members' ?>">Members</a>
              <?php } ?>
              <a class="dropdown-item" href="<?= base_url().'profil/'.$this->session->uid ?>">Profil</a>
              <a class="dropdown-item" href="<?= base_url().'logout' ?>">Logout</a>
            </div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <!-- / .navbar-collapse -->
  </div>
  <!-- / .container -->
</nav>
