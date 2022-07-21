<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="<?= base_url('main/datapenduduk') ?>" style="color: grey;">Data Penduduk</a></li>
              <li class="breadcrumb-item" style="color: #0080ff;">Tambah Data Penduduk</li>
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
            <?= form_open_multipart('main/prosessimpanpenduduk');?>
              <div class="form-group row">
                <label for="no_kk" class="col-sm-3 col-form-label" style="margin-top: 10px;">No. Kartu Keluarga</label>
                <div class="col-sm-7" style="margin-top: 12px;">
                  <input type="text" class="form-control" id="no_kk" name="no_kk" required="" oninvalid="this.setCustomValidity('No. Kartu Keluarga harus diisi')" oninput="setCustomValidity('')">
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_alternatif" class="col-sm-3 col-form-label" style="margin-top: 10px;">Nama Kepala Keluarga</label>
                <div class="col-sm-7" style="margin-top: 12px;">
                  <input type="text" class="form-control" id="nama_alternatif" name="nama_alternatif" required="" oninvalid="this.setCustomValidity('Nama Kepala Keluarga harus diisi')" oninput="setCustomValidity('')">
                </div>
              </div>
              <div class="form-group row" style="margin-left: 169px;">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                  <a href="<?= base_url('main/datapenduduk') ?>" class="btn btn-secondary">
                      Kembali
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>