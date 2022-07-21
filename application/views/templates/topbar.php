<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- <li class="nav-item" style="margin-top: 5px; margin-right: 5px;">
        <img class="img-profile rounded-circle" style="width: 30px; height: 30px; margin-left: 4px;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="margin-left: 5px; font-size: 15px;"><?= $user['fullname'] ?></span>
      </li> -->

      <!-- Navbar-->
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" style="width: 30px; height: 30px; margin-left: 4px;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>"></img>
                <span class="mr-2 d-none d-lg-inline text-secondary small" style="margin-left: 5px; font-size: 15px;"><?= $user['fullname'] ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="<?= base_url('user/profil'); ?>">Profil</a>
                  <a class="dropdown-item" href="<?= base_url('user/editakun'); ?>">Edit Profil</a>
                  <a class="dropdown-item" href="<?= base_url('user/changepassword'); ?>">Ubah Password</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="<?= base_url('auth/logout'); ?>">Logout</a>
              </div>
          </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->