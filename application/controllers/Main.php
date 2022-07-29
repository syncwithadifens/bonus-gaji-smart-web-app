<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kriteria_model');
		$this->load->model('Subkriteria_model');
		$this->load->model('Karyawan_model');
		$this->load->model('Hasilpenilaian_model');
		$this->load->model('Penilaian_model');
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
	}

	public function kriteria()
	{
		$data['title'] = 'Kriteria';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['kriteria'] = $this->Kriteria_model->daftarKriteria();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/kriteria', $data);
		$this->load->view('templates/footer');
	}

	public function tambahKriteria()
	{
		$data['title'] = 'Tambah Kriteria';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/kriteria-tambah', $data);
		$this->load->view('templates/footer');
	}

	public function prosesSimpanKriteria()
	{
		$data['nama_kriteria'] = $this->input->post('nama_kriteria');
		$data['bobot_kriteria'] = $this->input->post('bobot_normalisasi');
		$data['bobot_normalisasi'] = $this->input->post('bobot_normalisasi');

		$this->Kriteria_model->simpanKriteria($data);

		$this->db->select('SUM(bobot_kriteria) AS total');
		$this->db->from('kriteria');
		$query = $this->db->get()->row()->total;
		$query2 = $this->db->query('SELECT * FROM kriteria');
		$ac = $query2->result();

		foreach ($ac as $row) {
			$ida = $row->id_kriteria;
			$perhitungan = substr($row->bobot_kriteria / $query, 0, 4);
			$akhir =  $this->db->query("UPDATE kriteria SET 
			bobot_normalisasi='" . $perhitungan . "' WHERE id_kriteria='" . $ida . "'");
		}

		$query = $this->db->query('SELECT * FROM alternatif');
		$ab = $query->result();
		foreach ($ab as $index => $row2) {
			$query2 = $this->db->query('SELECT * FROM kriteria');
			$ac = $query2->result();
			foreach ($ac as $row3) {
				$query = $this->db->query("SELECT * FROM alternatif_kriteria WHERE id_kriteria='" . $row3->id_kriteria . "' and id_alternatif='" . $row2->id_alternatif . "'");
				$ad = $query->result();
				foreach ($ad as $row4) {
					$ida = $row4->id_alternatif;
					$idk = $row4->id_kriteria;
					$kal = $row4->nilai_alternatif_kriteria * $row3->bobot_normalisasi;

					$ea = $this->db->query("UPDATE alternatif_kriteria SET bobot_alternatif_kriteria='" . $kal . "' where id_alternatif='" . $ida . "' and id_kriteria='" . $idk . "'");
				}
				$queryku = $this->db->query("SELECT SUM(bobot_alternatif_kriteria) AS bak FROM alternatif_kriteria WHERE id_alternatif='" . $row2->id_alternatif . "'");
				$ideas = $row2->id_alternatif;
				$hsl = $queryku->row()->bak;
				if ($hsl >= 4) {
					$ket = "Mendapat Bonus";
				} else {
					$ket = "Tidak Mendapat Bonus";
				}
				$hasil =  $this->db->query("UPDATE alternatif SET hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' where id_alternatif='" . $ideas . "'");
			}
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Kriteria berhasil ditambahkan.
		</div>');
		redirect('main/kriteria');
	}

	public function editKriteria()
	{
		$id_kriteria = $this->input->get('id_kriteria');

		$data['title'] = 'Edit Kriteria';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['kriteria'] = $this->Kriteria_model->editKriteria($id_kriteria);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/kriteria-edit', $data);
		$this->load->view('templates/footer');

		$this->session->set_flashdata('id_kriteria', $id_kriteria);
	}

	public function prosesEditKriteria()
	{
		$id_kriteria = $this->session->flashdata('id_kriteria');

		$data['nama_kriteria'] = $this->input->post('nama_kriteria');
		$data['bobot_kriteria'] = $this->input->post('bobot_kriteria');
		$data['bobot_normalisasi'] = $this->input->post('bobot_kriteria');

		$this->Kriteria_model->prosesEditKriteria($id_kriteria, $data);
		$e = $this->db->select('SUM(bobot_kriteria) AS total');
		$e = $this->db->from('kriteria');
		$e = $this->db->get()->row()->total;
		$e2 = $this->db->query('SELECT * FROM kriteria');
		$eec = $e2->result();

		foreach ($eec as $rowe) {
			$idae = $rowe->id_kriteria;
			$perhitungane = substr($rowe->bobot_kriteria / $e, 0, 4);
			$akhire =  $this->db->query("UPDATE kriteria SET bobot_normalisasi='" . $perhitungane . "' WHERE id_kriteria='" . $idae . "'");
		}

		$query1 = $this->db->query('SELECT * FROM alternatif');
		$ab = $query1->result();
		foreach ($ab as $index => $row2) {
			$query2 = $this->db->query('SELECT * FROM kriteria');
			$ac = $query2->result();
			foreach ($ac as $row3) {
				$query = $this->db->query("SELECT * FROM alternatif_kriteria WHERE id_kriteria='" . $row3->id_kriteria . "' and id_alternatif='" . $row2->id_alternatif . "'");
				$ad = $query->result();
				foreach ($ad as $row4) {
					$ida = $row4->id_alternatif;
					$idk = $row4->id_kriteria;
					$kal = $row4->nilai_alternatif_kriteria * $row3->bobot_normalisasi;

					$ea = $this->db->query("UPDATE alternatif_kriteria SET bobot_alternatif_kriteria='" . $kal . "' where id_alternatif='" . $ida . "' and id_kriteria='" . $idk . "'");
				}
				$queryku = $this->db->query("SELECT SUM(bobot_alternatif_kriteria) AS bak FROM alternatif_kriteria WHERE id_alternatif='" . $row2->id_alternatif . "'");
				$ideas = $row2->id_alternatif;
				$hsl = $queryku->row()->bak;
				if ($hsl >= 4) {
					$ket = "Mendapat Bonus";
				} else {
					$ket = "Tidak Mendapat Bonus";
				}
				$hasil =  $this->db->query("UPDATE alternatif SET hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' WHERE id_alternatif='" . $ideas . "'");
			}
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Kriteria berhasil diubah.
		</div>');
		redirect('main/kriteria');
	}

	public function prosesHapusKriteria()
	{
		$data = $this->input->get('id_kriteria');
		$this->Kriteria_model->hapusKriteria($data);

		$total = $this->db->select('SUM(bobot_kriteria) AS total');
		$total = $this->db->from('kriteria');
		$total = $this->db->get()->row()->total;

		$query2 = $this->db->query('SELECT * FROM kriteria');
		$ac = $query2->result();
		foreach ($ac as $row) {
			$ida = $row->id_kriteria;
			$perhitungan = substr($row->bobot_kriteria / $total, 0, 4);
			$akhir =  $this->db->query("UPDATE kriteria SET bobot_normalisasi='" . $perhitungan . "' where id_kriteria='" . $ida . "'");
		}

		$query1 = $this->db->query('SELECT * FROM alternatif');
		$ab = $query1->result();
		$no = 1;
		foreach ($ab as $index => $row2) {
			$query2 = $this->db->query('SELECT * FROM kriteria');
			$ac = $query2->result();
			$no = 1;
			foreach ($ac as $row3) {
				$query = $this->db->query("SELECT * FROM alternatif_kriteria WHERE id_kriteria='" . $row3->id_kriteria . "' and id_alternatif='" . $row2->id_alternatif . "'");
				$ad = $query->result();
				foreach ($ad as $row4) {
					$ida = $row4->id_alternatif;
					$idk = $row4->id_kriteria;
					$kal = $row4->nilai_alternatif_kriteria * $row3->bobot_normalisasi;

					$ea = $this->db->query("UPDATE alternatif_kriteria SET bobot_alternatif_kriteria='" . $kal . "' WHERE id_alternatif='" . $ida . "' and id_kriteria='" . $idk . "'");
				}

				$queryku = $this->db->query("SELECT SUM(bobot_alternatif_kriteria) AS bak FROM alternatif_kriteria WHERE id_alternatif='" . $row2->id_alternatif . "'");
				$ideas = $row2->id_alternatif;
				$hsl = $queryku->row()->bak;
				if ($hsl >= 4) {
					$ket = "Mendapat Bonus";
				} else {
					$ket = "Tidak Mendapat Bonus";
				}
				$hasil =  $this->db->query("UPDATE alternatif SET hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' WHERE id_alternatif='" . $ideas . "'");
			}
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Kriteria berhasil dihapus.
		</div>');
		redirect('main/kriteria');
	}

	public function subKriteria()
	{
		$data['title'] = 'Sub Kriteria';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/subkriteria', $data);
		$this->load->view('templates/footer');
	}

	public function tambahSubKriteria()
	{
		$data['title'] = 'Tambah Subkriteria';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['kriteria'] = $this->Kriteria_model->daftarKriteria();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/subkriteria-tambah', $data);
		$this->load->view('templates/footer');
	}

	public function prosesSimpanSubKriteria()
	{
		$data['nama_sub_kriteria'] = $this->input->post('nama_sub_kriteria');
		$data['nilai_sub_kriteria'] = $this->input->post('nilai_sub_kriteria');
		$data['id_kriteria'] = $this->input->post('id_kriteria');

		$this->Subkriteria_model->simpanSubKriteria($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Sub Kriteria berhasil ditambahkan.
		</div>');
		redirect('main/subkriteria');
	}

	public function editSubKriteria()
	{
		$id_sub_kriteria = $this->input->get('id_sub_kriteria');

		$data['title'] = 'Edit Subkriteria';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['sub_kriteria'] = $this->Subkriteria_model->editSubKriteria($id_sub_kriteria);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/subkriteria-edit', $data);
		$this->load->view('templates/footer');

		$this->session->set_flashdata('id_sub_kriteria', $id_sub_kriteria);
	}

	public function prosesEditSubKriteria()
	{
		$id_sub_kriteria = $this->session->flashdata('id_sub_kriteria');

		$data['nama_sub_kriteria'] = $this->input->post('nama_sub_kriteria');
		$data['nilai_sub_kriteria'] = $this->input->post('nilai_sub_kriteria');
		$data['id_kriteria'] = $this->input->post('id_kriteria');

		$this->Subkriteria_model->prosesEditSubKriteria($id_sub_kriteria, $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Sub Kriteria berhasil diubah.
		</div>');
		redirect(site_url('main/subkriteria'), 'refresh');
	}

	public function prosesHapusSubKriteria()
	{
		$data = $this->input->get('id_sub_kriteria');
		$this->Subkriteria_model->hapusSubKriteria($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Sub Kriteria berhasil dihapus.
		</div>');
		redirect('main/subkriteria');
	}

	public function dataKaryawan()
	{
		$data['title'] = 'Data Karyawan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['karyawan'] = $this->Karyawan_model->daftarKaryawan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/datakaryawan', $data);
		$this->load->view('templates/footer');
	}

	public function tambahDataKaryawan()
	{
		$data['title'] = 'Tambah Data Karyawan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/datakaryawan-tambah', $data);
		$this->load->view('templates/footer');
	}

	public function prosesSimpanKaryawan()
	{
		$data['id_karyawan'] = $this->input->post('id_karyawan');
		$data['nama_alternatif'] = $this->input->post('nama_alternatif');
		$data['ket_alternatif'] = 'Tidak Mendapat Bonus';
		$cek = $this->db->get_where('alternatif', ['id_karyawan' => $this->input->post('id_karyawan')])->row_array();
		if ($cek == 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data Karyawan berhasil ditambahkan.
			</div>');
			$this->Karyawan_model->simpanKaryawan($data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Data Karyawan gagal ditambahkan.
			</div>');
		}
		redirect('main/datakaryawan');
	}

	public function editKaryawan()
	{
		$id_alternatif = $this->input->get('id_alternatif');

		$data['title'] = 'Edit Data Karyawan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['karyawan'] = $this->Karyawan_model->editKaryawan($id_alternatif);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/datakaryawan-edit', $data);
		$this->load->view('templates/footer');

		$this->session->set_flashdata('id_alternatif', $id_alternatif);
	}

	public function prosesEditKaryawan()
	{
		$id_alternatif = $this->session->flashdata('id_alternatif');

		$data['id_karyawan'] = $this->input->post('id_karyawan');
		$data['nama_alternatif'] = $this->input->post('nama_alternatif');

		$this->Karyawan_model->prosesEditKaryawan($id_alternatif, $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data Karyawan berhasil diubah.
		</div>');
		redirect('main/datakaryawan');
	}

	public function prosesHapusKaryawan()
	{
		$data = $this->input->get('id_alternatif');

		$this->Karyawan_model->hapusKaryawan($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data Karyawan berhasil dihapus.
		</div>');
		redirect('main/datakaryawan');
	}

	public function penilaian()
	{
		$data['title'] = 'Penilaian';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['kriteria'] = $this->Hasilpenilaian_model->daftarKriteria();
		$data['alternatif'] = $this->Hasilpenilaian_model->daftarAlternatif();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/penilaian', $data);
		$this->load->view('templates/footer');
	}

	public function tambahPenilaian()
	{
		$data['title'] = 'Tambah Penilaian';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/penilaian-tambah', $data);
		$this->load->view('templates/footer');
	}

	public function prosesSimpanPenilaian()
	{
		$qu = $this->db->select('*');
		$qu = $this->db->from('kriteria');
		$qu = $this->db->get()->result();


		foreach ($qu as $row3) {
			$alt = $_POST['alt'];
			$idkri = $row3->id_kriteria;
			$kri = $_POST['kri'][$idkri];
			$altkri = $_POST['altkri'][$idkri];
			$kal = $altkri * $row3->bobot_normalisasi;

			$data['id_alternatif'] = $alt;
			$data['id_kriteria'] = $kri;
			$data['nilai_alternatif_kriteria'] = $altkri;
			$data['bobot_alternatif_kriteria'] = $kal;

			$this->Penilaian_model->simpanPenilaian($data);

			$queryku = $this->db->query("SELECT SUM(bobot_alternatif_kriteria) AS bak FROM alternatif_kriteria WHERE id_alternatif='" . $alt . "'");
			$hsl = $queryku->row()->bak;
			if ($hsl >= 4) {
				$ket = "Mendapat Bonus";
			} else {
				$ket = "Tidak Mendapat Bonus";
			}

			$hasil =  $this->db->query("UPDATE alternatif SET hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' WHERE id_alternatif='" . $alt . "'");
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data Penilaian berhasil ditambahkan.
		</div>');
		redirect('main/penilaian');
	}

	public function editPenilaian()
	{
		$id_alternatif = $this->input->get('id_alternatif');
		$this->db->select('*');
		$this->db->from('alternatif_kriteria');
		$this->db->where('id_alternatif', $id_alternatif);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			echo '<script type="text/javascript">alert("Data belum ada, silakan tambah data terlebih dahulu.")</script>';
			redirect('main/tambahpenilaian', 'refresh');
		} else {
			$id_alternatif = $this->input->get('id_alternatif');
			$data['title'] = 'Edit Penilaian';
			$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
			$data['penilaian'] = $this->Penilaian_model->editPenilaian($id_alternatif);
			$data['penilaian2'] = $this->Penilaian_model->editPenilaian2($id_alternatif);
			$data['penilaian3'] = $this->Penilaian_model->editPenilaian3($id_alternatif);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('main/penilaian-edit', $data);
			$this->load->view('templates/footer');

			$this->session->set_flashdata('id_alternatif', $id_alternatif);
		}
	}

	public function prosesEditPenilaian()
	{
		$qu = $this->db->select('*');
		$qu = $this->db->from('kriteria');
		$qu = $this->db->get()->result();

		foreach ($qu as $row3) {
			$alt = $_POST['alt'];
			$idkri = $row3->id_kriteria;
			$kri = $_POST['kri'][$idkri];
			$altkri = $_POST['altkri'][$idkri];
			$a = "0";

			$query = $this->db->query("SELECT * FROM alternatif_kriteria WHERE id_kriteria='" . $kri . "' and id_alternatif='" . $alt . "'");
			$ad = $query->result();
			foreach ($ad as $row4) {
				$ida = $row4->id_alternatif;
				$idk = $row4->id_kriteria;
				$kal = $altkri * $row3->bobot_normalisasi;

				$ea = $this->db->query("UPDATE alternatif_kriteria SET nilai_alternatif_kriteria='" . $altkri . "', bobot_alternatif_kriteria='" . $kal . "' WHERE id_alternatif='" . $ida . "' and id_kriteria='" . $idk . "'");

				$queryku = $this->db->query("SELECT SUM(bobot_alternatif_kriteria) AS bak FROM alternatif_kriteria WHERE id_alternatif='" . $alt . "'");

				$hsl = $queryku->row()->bak;
				if ($hsl >= 4) {
					$ket = "Mendapat Bonus";
				} else {
					$ket = "Tidak Mendapat Bonus";
				}

				$hasil =  $this->db->query("UPDATE alternatif SET hasil_alternatif='" . $hsl . "', ket_alternatif='" . $ket . "' WHERE id_alternatif='" . $ida . "'");
			}
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data Penilaian berhasil diubah.
		</div>');
		redirect('main/penilaian');
	}

	public function prosesHapusPenilaian()
	{
		$data = $this->input->get('id_alternatif');
		$this->Penilaian_model->hapusPenilaian($data);
		$this->Penilaian_model->resetPenilaian($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data Penilaian berhasil dihapus.
		</div>');
		redirect('main/penilaian');
	}

	public function hasilPenilaian()
	{
		$data['title'] = 'Hasil Penilaian';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['kriteria'] = $this->Hasilpenilaian_model->daftarKriteria();
		$data['alternatif'] = $this->Hasilpenilaian_model->daftarAlternatif();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/hasilpenilaian', $data);
		$this->load->view('templates/footer');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('main/laporan', $data);
		$this->load->view('templates/footer');
	}
}
