<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item" style="color: #0080ff;">Edit Profil</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="content">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-8">

          <?= form_open_multipart('user/editAkun'); ?>
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $user['fullname'] ?>">
              <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2"><b>Picture</b></div>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">Choose file (Max. 5 MB)</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>