<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_model extends CI_Model
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
}
