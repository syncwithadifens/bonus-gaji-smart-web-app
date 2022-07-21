<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Penduduk_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function daftarPenduduk()
	{
		$this->db->select('*');
		$this->db->from('alternatif');
		$this->db->order_by('nama_alternatif', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function simpanPenduduk($data){
		$this->db->insert('alternatif', $data);
		if ($this->db->affected_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function editPenduduk($id_alternatif)
	{
		$this->db->select('*');
		$this->db->from('alternatif');
		$this->db->where('id_alternatif', $id_alternatif);
		$query = $this->db->get();
		return $query->result();
	}

	public function proseseditpenduduk($id_alternatif, $data)
	{
		$this->db->update('alternatif', $data, 'id_alternatif = '.$id_alternatif);
		if($this->db->affected_rows() == '1') {
			return true;
		} else {
			return false;
		}
	}

	public function hapusPenduduk($data)
	{
		$tables = array('alternatif', 'alternatif_kriteria');
		$this->db->where('id_alternatif', $data);
		$this->db->delete($tables);
		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}