<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item" style="color: #0080ff;">Profil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
      <div class="card">
        <div class="card-body">

          <div class="row no-gutters">
            <div class="col-lg-6">
              <?= $this->session->flashdata('message') ?>
            </div>
          </div>

          <div class="card mb-3" style="max-width: 530px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="card-img img-rounded" style="margin-top: 23px; margin-left: 10px;">
              </div>
              <div class="col-md-8">
                <div class="card-body" style="margin-left: 15px;">
                  <p class="card-text"><b>Full Name</b><br><?= $user['fullname'] ?></p>
                  <p class="card-text"><b>Username</b><br><?= $user['username'] ?></p>
                  <p class="card-text"><small class="text-muted">Terdaftar sejak <?= date('d F Y', $user['date_created']) ?></small></p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
</div>