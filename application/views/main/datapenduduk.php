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
						<li class="breadcrumb-item" style="color: #0080ff;">Data Karyawan</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<div class="content">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="pull-left">
						<a href="<?= base_url('main/tambahdatapenduduk'); ?>" class="btn btn-primary mb-4"><i class="fas fa-plus" style="margin-right: 7px;"></i>Tambah Data Karyawan</a>
					</div>
					<div class="pull-right pl-3">
						<?= $this->session->flashdata('message'); ?>
					</div>
				</div>
				<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th style="min-width: 180px;">ID Karyawan</th>
							<th style="min-width: 230px;">Nama Karyawan</th>
							<th style="min-width: 100px;">Aksi</th>
						</tr>
					<tbody>
						<?php $no = 1;
						foreach ($penduduk as $p) { ?>
							<tr>
								<td style="width: 15px;"><?= $no++; ?></td>
								<td style="text-align: left;"><?= $p->id_karyawan; ?></td>
								<td style="text-align: left;"><?= $p->nama_alternatif; ?></td>
								<td>
									<a href="<?= base_url('main/editpenduduk?id_alternatif=' . $p->id_alternatif); ?>" class="btn btn-sm btn-primary mr-1">
										<i class="fas fa-fw fa-pen"></i>
									</a>
									<a href="<?= base_url('main/proseshapuspenduduk?id_alternatif=' . $p->id_alternatif); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">
										<i class="fas fa-fw fa-times-circle"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>