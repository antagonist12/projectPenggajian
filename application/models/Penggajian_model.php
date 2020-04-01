<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penggajian_model extends CI_Model
{

	public function getAllData($table)
	{
		return $this->db->get($table);
	}

	public function getData($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function insertData($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function deleteData($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function updateData($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	public function joinData($table1, $table2, $cond)
	{
		$this->db->select('*')
			->from($table1)
			->join($table2, $cond);
		return $this->db->get();
	}

	function manualQuery($q)
	{
		return $this->db->query($q);
	}

	public function getByJabatan($jabatan)
	{
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('jabatan', 'karyawan.jabatan=jabatan.jabatan');
		$this->db->join('aturan_gaji', 'karyawan.jabatan=aturan_gaji.jabatan');
		$this->db->where('karyawan.jabatan', $jabatan);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDetail($nip)
	{
		$this->db->select('*');
		$this->db->from('gaji');
		$this->db->join('karyawan', 'gaji.nip=karyawan.nip');
		$this->db->join('jabatan', 'karyawan.jabatan=jabatan.jabatan');
		$this->db->join('aturan_gaji', 'karyawan.jabatan=aturan_gaji.jabatan');
		$this->db->where('gaji.nip', $nip);
		$query = $this->db->get();
		return $query->row_array();
	}


	// kode otomatis
	function kode_otomatis_gaji()
	{
		$this->db->select('right (kode_penggajian,3) as kode ', false);
		$this->db->order_by('kode_penggajian', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('gaji');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = 'GJ' . $kodemax;

		return $kodejadi;
	}
}
