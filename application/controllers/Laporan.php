<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cetak_model');
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
	}

	public function tgl_indo($tanggal)
	{
		$data = [
			1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		];

		$pecahkan = explode('-', $tanggal);

		return $pecahkan[2] . ' ' . $data[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
	}

	public function laporan()
	{
		$dompdf = new Dompdf();
		$data['kriteria'] = $this->Cetak_model->daftarKriteria();
		$data['alternatif'] = $this->Cetak_model->daftarAlternatif();

		$this->load->view('main/cetak-laporan', $data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$dompdf->setPaper($paper_size, $orientation);
		$dompdf->loadHtml($html);
		$dompdf->render();

		$dompdf->stream("Laporan " . tgl_indo(date('Y-m-d')) . ".pdf", array("Attachment" => false));
	}
}
