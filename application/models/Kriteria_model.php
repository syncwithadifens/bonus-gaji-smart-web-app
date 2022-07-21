<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{

	public function daftarKriteria()
	{
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->order_by('nama_kriteria', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function simpanKriteria($data)
	{
		$this->db->insert('kriteria', $data);
		if ($this->db->affected_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function editKriteria($id_kriteria)
	{
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->where('id_kriteria', $id_kriteria);
		$query = $this->db->get();
		return $query->result();
	}

	public function prosesEditKriteria($id_kriteria, $data)
	{
		$this->db->update('kriteria', $data, 'id_kriteria = '.$id_kriteria);
		if ($this->db->affected_rows() == '1') {
			return true;
		} else {
			return false;
		}
	}

	public function hapusKriteria($data)
	{
		$this->db->delete('kriteria',"id_kriteria='$data'");
		if($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}



}