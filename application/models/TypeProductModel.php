<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TypeProductModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function selectAll()
	{
		$query = $this->db->get('t_mtr_jenis_produk');
		$result = $query->result();

		return $result;
	}

	public function getById($id)
	{
		$this->db->where('jenis_produk_id_int', $id);
		$query = $this->db->get('t_mtr_jenis_produk');
		$result = $query->row();

		return $result;
	}


	public function duplicate_data($data)
	{
		$this->db->where('LOWER(nama_jenis_produk_var)', strtolower($data['nama_jenis_produk_var']));
		$this->db->where('status_boo', 1);
		$query = $this->db->get('t_mtr_jenis_produk');
		$result = $query->result();

		return $result;
	}

	public function duplicate_same_data($id, $data)
	{
		$this->db->where('jenis_produk_id_int !=
			', $id);
		$this->db->where('LOWER(nama_jenis_produk_var)', strtolower($data['nama_jenis_produk_var']));
		$this->db->where('status_boo', 1);
		$query = $this->db->get('t_mtr_jenis_produk');
		$result = $query->result();

		return $result;
	}


	public function insert_data($data)
	{
		$query = $this->db->insert('t_mtr_jenis_produk', $data);
		if ($query) 
		{
			$result = 1;
		}
		else
		{
			$result = 0;
		}

		return $result;
	}

	public function update_data($id, $data)
	{
		$this->db->where('jenis_produk_id_int', $id);
		$query = $this->db->update('t_mtr_jenis_produk', $data);
		if ($query) 
		{
			$result = 1;
		}
		else
		{
			$result = 0;
		}

		return $result;
	}

	public function delete_data($id, $data)
	{
		$this->db->where('jenis_produk_id_int', $id);
		$query = $this->db->update('t_mtr_jenis_produk', $data);
		if ($query) 
		{
			$result = 1;
		}
		else
		{
			$result = 0;
		}

		return $result;
	}

}

/* End of file TypeProductModel.php */
/* Location: ./application/models/TypeProductModel.php */