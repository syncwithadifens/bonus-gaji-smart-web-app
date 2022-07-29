<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function daftarKaryawan()
	{
		$this->db->select('*');
		$this->db->from('alternatif');
		$this->db->order_by('nama_alternatif', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function simpanKaryawan($data)
	{
		$this->db->insert('alternatif', $data);
		if ($this->db->affected_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function editKaryawan($id_alternatif)
	{
		$this->db->select('*');
		$this->db->from('alternatif');
		$this->db->where('id_alternatif', $id_alternatif);
		$query = $this->db->get();
		return $query->result();
	}

	public function proseseditkaryawan($id_alternatif, $data)
	{
		$this->db->update('alternatif', $data, 'id_alternatif = ' . $id_alternatif);
		if ($this->db->affected_rows() == '1') {
			return true;
		} else {
			return false;
		}
	}

	public function hapusKaryawan($data)
	{
		$tables = array('alternatif', 'alternatif_kriteria');
		$this->db->where('id_alternatif', $data);
		$this->db->delete($tables);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
