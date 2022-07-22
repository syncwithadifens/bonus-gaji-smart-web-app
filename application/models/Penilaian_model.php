<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function simpanPenilaian($data)
	{
		$this->db->insert('alternatif_kriteria', $data);
		if ($this->db->affected_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function editPenilaian($id_alternatif)
	{
		$this->db->select('*');
		$this->db->from('alternatif_kriteria');
		$this->db->where('id_alternatif', $id_alternatif);
		$query = $this->db->get();
		return $query->result();
	}

	public function editPenilaian2($id_alternatif)
	{
		$this->db->select('*');
		$this->db->from('alternatif');
		$this->db->where('id_alternatif', $id_alternatif);
		$query = $this->db->get();
		return $query->result();
	}

	public function editPenilaian3($id_alternatif)
	{
		$this->db->select('*');
		$this->db->from('sub_kriteria');
		$this->db->where('id_kriteria', $id_alternatif);
		$query = $this->db->get();
		return $query->result();
	}

	public function hapusPenilaian($data)
	{
		$this->db->delete('alternatif_kriteria', "id_alternatif='$data'");

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function resetPenilaian($data)
	{
		$query = "UPDATE alternatif SET hasil_alternatif = '0', ket_alternatif='Tidak Mendapat Bonus' WHERE id_alternatif='$data'";
		$res = $this->db->query($query);
		return true;
	}
}
