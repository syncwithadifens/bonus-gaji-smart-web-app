<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Subkriteria_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function simpanSubKriteria($data)
	{
		$this->db->insert('sub_kriteria', $data);
		if ($this->db->affected_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function editSubKriteria($id_sub_kriteria)
	{
		$this->db->select('*');
		$this->db->from('sub_kriteria');
		$this->db->join('kriteria', 'kriteria.id_kriteria = sub_kriteria.id_kriteria');
		$this->db->where('id_sub_kriteria', $id_sub_kriteria);
		$query = $this->db->get();
		return $query->result();
	}

	public function prosesEditSubKriteria($id_sub_kriteria, $data)
	{
		$this->db->update('sub_kriteria', $data, 'id_sub_kriteria = '.$id_sub_kriteria);
		if ($this->db->affected_rows() == '1') {
			return true;
		} else {
			return false;
		}
	}

	public function hapusSubKriteria($data)
	{
		$this->db->delete('sub_kriteria',"id_sub_kriteria='$data'");

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}