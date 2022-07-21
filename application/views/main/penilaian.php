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
              <li class="breadcrumb-item" style="color: #0080ff;">Penilaian</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="conten">
    	<div class="card">
    		<div class="card-body">
				<div class="row">
					<div class="pull-left">
						<a href="<?= base_url('main/tambahpenilaian'); ?>" class="btn btn-primary mb-4"><i class="fas fa-plus" style="margin-right: 7px;"></i>Tambah Penilaian</a>
					</div>
					<div class="pull-right pl-3">
						<?= $this->session->flashdata('message'); ?>
					</div>
				</div>
    			<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
						  <th>No.</th>
						  <th style="min-width: 150px;">No. Kartu Keluarga</th>
						  <th style="min-width: 230px;">Nama Kepala Keluarga</th>
						  <?php
						  foreach ($kriteria as $k) { ?>
							  <th><?= $k->nama_kriteria ?></th>
						  <?php } ?>
						  <th style="min-width: 100px;">Aksi</th>
						</tr>
					<tbody>
						<?php $no=1;
						foreach ($alternatif as $alt) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td style="text-align: left;"><?= $alt->no_kk;?></td>
								<td style="text-align: left;"><?= $alt->nama_alternatif;?></td>
								<?php
								foreach ($kriteria as $k) { ?>
									<td>
									<?php
									$query3 = $this->db->query("SELECT * FROM alternatif_kriteria WHERE id_kriteria='".$k->id_kriteria."' and id_alternatif='".$alt->id_alternatif."'");
									$ad = $query3->result();
									foreach ($ad as $row) {
				                    	echo $row->nilai_alternatif_kriteria;
				                    }
									?>
									</td>
								<?php } ?>

								<td>
									<a href="<?= base_url('main/editpenilaian?id_alternatif=' . $alt->id_alternatif); ?>" class="btn btn-sm btn-primary mr-1">
										<i class="fas fa-fw fa-pen"></i>
									</a>
									<a href="<?= base_url('main/proseshapuspenilaian?id_alternatif=' . $alt->id_alternatif); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">
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