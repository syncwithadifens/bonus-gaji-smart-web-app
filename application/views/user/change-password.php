<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item" style="color: #0080ff;">Ubah Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-6">
            
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('user/changePassword') ?>" method="post">
                <div class="form-group">
                  <label for="current_password">Current Password</label>
                  <input type="password" class="form-control" id="current_password" name="current_password">
                  <?= form_error('current_password', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <label for="new_password1">New Password</label>
                  <input type="password" class="form-control" id="new_password1" name="new_password1">
                  <?= form_error('new_password1', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <label for="new_password2">Repeat Password</label>
                  <input type="password" class="form-control" id="new_password2" name="new_password2">
                  <?= form_error('new_password2', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>

          </div>
        </div>
      </div>
    </div>
</div>