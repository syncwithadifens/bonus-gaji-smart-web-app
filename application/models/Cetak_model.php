<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Cetak_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

	}

	public function daftarAlternatif()
	{
		$this->db->select('*');
		$this->db->from('alternatif');
		$this->db->order_by('nama_alternatif', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function daftarKriteria()
	{
		$this->db->select('*');
		$this->db->from('kriteria');
		$query = $this->db->get();
		return $query->result();
	}

}