<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="<?= base_url('main/datapenduduk'); ?>" style="color: grey;">Data Karyawan</a></li>
            <li class="breadcrumb-item" style="color: #0080ff;">Edit Data Karyawan</li>
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
          <?php foreach ($penduduk as $p) {
            $id_alternatif = $p->id_alternatif;
            $id_karyawan = $p->id_karyawan;
            $nilai_utility = $p->hasil_alternatif;
            $nama_alternatif = $p->nama_alternatif;
            $ket_alternatif = $p->ket_alternatif;
          } ?>

          <?= form_open_multipart('main/proseseditpenduduk'); ?>
          <div class="form-group row">
            <label for="id_karyawan" class="col-sm-3 col-form-label" style="margin-top: 10px;">ID Karyawan</label>
            <div class="col-sm-7" style="margin-top: 12px;">
              <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= $id_karyawan; ?>" required="" oninvalid="this.setCustomValidity('ID Karyawan harus diisi')" oninput="setCustomValidity('')">
            </div>
          </div>
          <div class="form-group row">
            <label for="nama_alternatif" class="col-sm-3 col-form-label" style="margin-top: 10px;">Nama Karyawan</label>
            <div class="col-sm-7" style="margin-top: 12px;">
              <input type="text" class="form-control" id="nama_alternatif" name="nama_alternatif" value="<?= $nama_alternatif; ?>" required="" oninvalid="this.setCustomValidity('Nama Karyawan harus diisi')" oninput="setCustomValidity('')">
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