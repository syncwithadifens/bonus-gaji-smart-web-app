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
              <li class="breadcrumb-item" style="color: #0080ff;">Hasil Penilaian</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
    	<div class="card">
    		<div class="card-body">

				<div class="mb-5">
					<p>Keterangan:
						<ul style="text-indent: -0.22in;">      
							<li>Jika Hasil 0-74, maka <b>Ditolak</b></li>
							<li>Jika Hasil 75-100, maka <b>Diterima</b></li>
						</ul>
					</p>
				</div>

				<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th style="min-width: 150px;">No. KK</th>
							<th style="min-width: 230px;">Nama Kepala Keluarga</th>
							<?php
							foreach ($kriteria as $row) { ?>
								<th><?= $row->nama_kriteria ?></th>
							<?php } ?>
							<th>Hasil</th>
							<th style="min-width: 80px;">Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<?php
							foreach ($kriteria as $row) { ?>
								<th><?= $row->bobot_normalisasi ?></th>
							<?php } ?>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
						<?php
						$no = 1;
						foreach ($alternatif as $row2) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td style="text-align: left;"><?= $row2->no_kk; ?></td>
								<td style="text-align: left;"><?= $row2->nama_alternatif; ?></td>
								<?php
								foreach ($kriteria as $row3) { ?>
									<td>
										<?php
											$query3 = $this->db->query("SELECT * FROM alternatif_kriteria WHERE id_kriteria='".$row3->id_kriteria."' AND id_alternatif='".$row2->id_alternatif."'");
											$ad = $query3->result();

											foreach ($ad as $row4) {
												echo $row4->nilai_alternatif_kriteria;
											}
										?>
									</td>
								<?php } ?>
								<td><?= $row2->hasil_alternatif; ?></td>
								<td><?= $row2->ket_alternatif; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>

    		</div>
    	</div>
    </div>
</div>