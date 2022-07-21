<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url('picture/logo.png'); ?>" alt="Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light" style="padding-left: 3px; color: white;"><b>Adifens Tech</b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header pl-3"><b>HOME</b></li>
        <li class="nav-item">
          <a href="<?= base_url('user/home'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "home") {
                                                                    echo "active";
                                                                  } ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        </li>
        <li class="nav-header pl-3"><b>PENGATURAN KRITERIA</b></li>
        <li class="nav-item">
          <a href="<?= base_url('main/kriteria'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "kriteria") {
                                                                        echo "active";
                                                                      } elseif ($this->uri->segment(2) == "tambahkriteria") {
                                                                        echo "active";
                                                                      } elseif ($this->uri->segment(2) == "editkriteria") {
                                                                        echo "active";
                                                                      } elseif ($this->uri->segment(2) == "prosessimpankriteria") {
                                                                        echo "active";
                                                                      } elseif ($this->uri->segment(2) == "proseseditkriteria") {
                                                                        echo "active";
                                                                      } ?>">
            <i class="nav-icon fas fa-file-contract"></i>
            <p>
              Kriteria
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('main/subkriteria'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "subkriteria") {
                                                                            echo "active";
                                                                          } elseif ($this->uri->segment(2) == "tambahsubkriteria") {
                                                                            echo "active";
                                                                          } elseif ($this->uri->segment(2) == "editsubkriteria") {
                                                                            echo "active";
                                                                          } ?>">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Sub Kriteria
            </p>
          </a>
        </li>

        <li class="nav-header"><b>PENGHITUNGAN</b></li>
        <li class="nav-item">
          <a href="<?= base_url('main/datapenduduk') ?>" class="nav-link <?php if ($this->uri->segment(2) == "datapenduduk") {
                                                                            echo "active";
                                                                          } elseif ($this->uri->segment(2) == "tambahdatapenduduk") {
                                                                            echo "active";
                                                                          } elseif ($this->uri->segment(2) == "editpenduduk") {
                                                                            echo "active";
                                                                          } ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Data Penduduk
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('main/penilaian') ?>" class="nav-link <?php if ($this->uri->segment(2) == "penilaian") {
                                                                        echo "active";
                                                                      } elseif ($this->uri->segment(2) == "tambahpenilaian") {
                                                                        echo "active";
                                                                      } elseif ($this->uri->segment(2) == "editpenilaian") {
                                                                        echo "active";
                                                                      } ?>">
            <i class="nav-icon fas fa-calculator"></i>
            <p>
              Penilaian
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('main/hasilpenilaian'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "hasilpenilaian") {
                                                                              echo "active";
                                                                            } ?>">
            <i class="nav-icon fas fa-poll"></i>
            <p>
              Hasil Penilaian
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('laporan/laporan') ?>" class="nav-link" target="_blank">
            <i class="nav-icon fas fa-print"></i>
            <p>
              Laporan
            </p>
          </a>
        </li>

        <li class="nav-header"><b>LAINNYA</b></li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "profil") {
                                        echo "active";
                                      } elseif ($this->uri->segment(2) == "editakun") {
                                        echo "active";
                                      } elseif ($this->uri->segment(2) == "changepassword") {
                                        echo "active";
                                      } ?>">
            <i class="nav-icon fas fa-cog" style="margin-left: 1px;"></i>
            <p>
              Akun
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('user/profil'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "profil") {
                                                                          echo "active";
                                                                        } ?>">
                <i class="fas fa-user nav-icon"></i>
                <p>Profil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('user/editakun'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "editakun") {
                                                                            echo "active";
                                                                          } ?>">
                <i class="fas fa-user-cog nav-icon"></i>
                <p>Edit Profil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('user/changepassword'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "changepassword") {
                                                                                  echo "active";
                                                                                } ?>">
                <i class="fas fa-key nav-icon"></i>
                <p>Ubah Password</p>
              </a>
            </li>
          </ul>
        <li class="nav-item">
          <a href="<?= base_url('user/carapenggunaan'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "carapenggunaan") {
                                                                              echo "active";
                                                                            } ?>">
            <i class="nav-icon fas fa-question-circle"></i>
            <p>
              Cara Penggunaan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('auth/logout'); ?>" class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="nav-icon fas fa-sign-out-alt" style="margin-left: 1px;"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>