<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<ol class="breadcrumb float-sm-left">
						<li class="breadcrumb-item"><a href="<?= base_url('main/penilaian'); ?>" style="color: grey;">Penilaian</a></li>
						<li class="breadcrumb-item" style="color: #0080ff;">Tambah Penilaian</li>
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
					<?= form_open_multipart('main/prosessimpanpenilaian'); ?>
					<div class="form-group col-md-9">
						<label><b>Nama Karyawan</b></label>
						<select class="form-control" name="alt" style="margin-top: 6px;">
							<option disabled selected hidden>Pilih Nama Karyawan</option>
							<?php
							$queryyy = $this->db->query("SELECT * FROM alternatif ORDER BY nama_alternatif ASC");
							$aa = $queryyy->result();
							foreach ($aa as $row3) { ?>
								<option value="<?= $row3->id_alternatif; ?>"><?= $row3->id_karyawan; ?> - <?= $row3->nama_alternatif; ?></option>
							<?php } ?>
						</select>
					</div>

					<?php
					$query = $this->db->query('SELECT * FROM kriteria');
					$ab = $query->result();
					foreach ($ab as $row) { ?>
						<div class="form-group col-md-6">
							<input class="form-control" type="hidden" name="kri[<?= $row->id_kriteria; ?>]" type="text" value="<?= $row->id_kriteria; ?>">
							<b><?= $row->nama_kriteria; ?></b>
						</div>

						<div class="form-group col-md-9">
							<select class="form-control" name="altkri[<?= $row->id_kriteria; ?>]">
								<?php
								$queryy = $this->db->query("SELECT * FROM sub_kriteria WHERE id_kriteria='" . $row->id_kriteria . "' ORDER BY nilai_sub_kriteria ASC");
								$ac = $queryy->result();
								foreach ($ac as $row2) { ?>
									<option value="<?= $row2->nilai_sub_kriteria; ?>"><?= $row2->nama_sub_kriteria; ?>
									</option>
								<?php } ?>
							</select>
						</div>
					<?php } ?>

					<div class="form-group row col-md-12">
						<div class="col-sm">
							<button type="submit" class="btn btn-primary mr-2">Simpan</button>
							<a href="<?= base_url('main/penilaian') ?>" class="btn btn-secondary">Kembali
							</a>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>