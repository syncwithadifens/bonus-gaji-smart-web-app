<style>
	th {
		text-align: center;
	}
	td {
		text-align: center;
	}
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item" style="color: #0080ff;">Kriteria</li>
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
		<div class="row">
			<div class="pull-left">
				<a href="<?= base_url('main/tambahkriteria'); ?>" class="btn btn-primary mb-4"><i class="fas fa-plus" style="margin-right: 7px;"></i>Tambah Kriteria</a>
			</div>
			<div class="pull-right pl-3">
				<?= $this->session->flashdata('message'); ?>
			</div>
		</div>
		<table id="table_id" class="table table-striped table-bordered">
			<thead>
				<tr>
				  <th>No.</th>
				  <th style="min-width: 200px;">Nama Kriteria</th>
				  <th>Bobot Kriteria</th>
				  <th>Normalisasi Bobot</th>
				  <th style="text-align: center; min-width: 100px;">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				foreach ($kriteria as $k) { ?>
					<tr>
						<td style="width: 15px;"><?= $no++;?></td>
						<td style="text-align: left;"><?= $k->nama_kriteria;?></td>
						<td style="width: 125px;"><?= $k->bobot_kriteria;?></td>
						<td style="width: 160px;"><?= $k->bobot_normalisasi;?></td>
						<td>
							<a href="<?= base_url('main/editkriteria?id_kriteria=' . $k->id_kriteria); ?>" class="btn btn-sm btn-primary mr-1">
								<i class="fas fa-fw fa-pen"></i>
							</a>
							<a href="<?= base_url('main/proseshapuskriteria?id_kriteria=' . $k->id_kriteria); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">
								<i class="fas fa-fw fa-times-circle"></i>
							</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->