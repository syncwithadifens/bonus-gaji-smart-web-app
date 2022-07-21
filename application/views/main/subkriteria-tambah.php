<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="<?= base_url('main/subkriteria'); ?>" style="color: grey;">Sub Kriteria</a></li>
              <li class="breadcrumb-item" style="color: #0080ff;">Tambah Sub Kriteria</li>
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
            <?= form_open_multipart('main/prosessimpansubkriteria');?>
              <div class="form-group row">
                  <label for="nama_sub_kriteria" class="col-sm-3 col-form-label">Sub Kriteria</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" id="nama_sub_kriteria" name="nama_sub_kriteria" required="" oninvalid="this.setCustomValidity('Subkriteria harus diisi')" oninput="setCustomValidity('')">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="nilai_sub_kriteria" class="col-sm-3 col-form-label">Nilai Sub Kriteria</label>
                  <div class="col-sm-7">
                      <input type="number" class="form-control" id="nilai_sub_kriteria" name="nilai_sub_kriteria" required="" oninvalid="this.setCustomValidity('Nilai Subkriteria harus diisi')" oninput="setCustomValidity('')">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="id_kriteria" class="col-sm-3 col-form-label">Nama Kriteria</label>
                  <div class="col-sm-7">
                      <select class="form-control" name="id_kriteria">
                          <?php foreach($kriteria as $k) { ?>
                              <option value="<?= $k->id_kriteria;?>">
                                  <?= $k->nama_kriteria;?>
                              </option>
                          <?php } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                  <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                  <a href="<?= base_url('main/subkriteria') ?>" class="btn btn-secondary">
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