<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="<?= base_url('main/kriteria'); ?>" style="color: grey;">Kriteria</a></li>
              <li class="breadcrumb-item" style="color: #0080ff;">Tambah Kriteria</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <div class="content">
  <div class="card">
    <div class="card-body">
      <div class="col-lg-8">
        <?= form_open_multipart('main/prosessimpankriteria');?>
          <div class="form-group row">
            <label for="nama_kriteria" class="col-sm-2 col-form-label">Kriteria</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" placeholder="Contoh: Penghasilan Bulanan" required="" oninvalid="this.setCustomValidity('Kriteria harus diisi')" oninput="setCustomValidity('')">
            </div>
          </div>
          <div class="form-group row">
            <label for="bobot_normalisasi" class="col-sm-2 col-form-label">Bobot</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" id="bobot_normalisasi" name="bobot_normalisasi" placeholder="Contoh: 1" required="" oninvalid="this.setCustomValidity('Bobot harus diisi')" oninput="setCustomValidity('')">
            </div>
          </div>
          <div class="form-group row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary mr-2">Simpan</button>
              <a href="<?= base_url('main/kriteria') ?>" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->












