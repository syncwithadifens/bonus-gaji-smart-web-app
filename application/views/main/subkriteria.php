<style>
	th {
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
              <li class="breadcrumb-item" style="color: #0080ff;">Sub Kriteria</li>
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
		    			<a href="<?= base_url('main/tambahsubkriteria'); ?>" class="btn btn-primary mb-4"><i class="fas fa-plus" style="margin-right: 7px;"></i>Tambah Sub Kriteria</a>
		    		</div>
		    		<div class="pull-right pl-3">
		    			<?= $this->session->flashdata('message'); ?>
		    		</div>
		    	</div>
    			<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th style="min-width: 180px;">Nama Kriteria</th>
							<th style="min-width: 240px;">Nama Sub Kriteria</th>          
						</tr>
					</thead>
					<tbody>
						<?php $no=1;
						$query = $this->db->query('SELECT * FROM kriteria ORDER BY nama_kriteria ASC');
						$a = $query->result();
						$no=1; 
						foreach ($a as $row) { ?>
							<tr>
								<td style="width: 15px;"><?= $no++; ?></td>
								<td><?= $row->nama_kriteria; ?></td>
								<td>
									<?php
									$queryy = $this->db->query("SELECT * FROM sub_kriteria WHERE id_kriteria='".$row->id_kriteria."' ORDER BY nilai_sub_kriteria ASC");
									$ab = $queryy->result();
									foreach ($ab as $row2) { ?>
									<?= $row2->nama_sub_kriteria; ?> = <?= $row2->nilai_sub_kriteria; ?>
									<a href="<?= base_url('main/proseshapussubkriteria?id_sub_kriteria=' . $row2->id_sub_kriteria); ?>" class="btn btn-sm btn-danger ml-2 float-right" onclick="return confirm('Yakin?')">
										<i class="fas fa-fw fa-times-circle"></i>
									</a>
									<a href="<?= base_url('main/editsubkriteria?id_sub_kriteria=' . $row2->id_sub_kriteria); ?>" class="btn btn-sm btn-primary float-right">
										<i class="fas fa-fw fa-pen"></i>
									</a>
									<br><br>
									<?php } ?>
								</td>
						<?php } ?>
							</tr>
					</tbody>
				</table>
    		</div>
    	</div>
    </div>
  </div>