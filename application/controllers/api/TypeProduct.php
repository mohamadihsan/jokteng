<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class TypeProduct extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		// load model
		$this->load->model('TypeProductModel');
	}

	public function index_get()
	{

		// load model
		$data = $this->TypeProductModel->selectAll();

		if ($data) 
		{
			$this->response([
        		'status'		=> TRUE,
        		'message'		=> 'Data ditemukan!',
        		'data'			=> $data
        	], REST_Controller::HTTP_OK);	
		}
		else
		{
			$this->response([
        		'status'		=> FALSE,
        		'message'		=> 'Data Tidak Tersedia!',
        		'data'			=> $data
        	], REST_Controller::HTTP_OK);
		}
		
	}

	public function getdata_get($id)
	{

		// load model
		$data = $this->TypeProductModel->getById($id);

		if ($data) 
		{
			$this->response([
        		'status'		=> TRUE,
        		'message'		=> 'Data ditemukan!',
        		'data'			=> $data
        	], REST_Controller::HTTP_OK);	
		}
		else
		{
			$this->response([
        		'status'		=> FALSE,
        		'message'		=> 'Data Tidak Tersedia!',
        		'data'			=> $data
        	], REST_Controller::HTTP_OK);
		}
		
	}

	public function index_post()
	{

		// receive post data
		$data = json_decode(file_get_contents('php://input'), true);
		$nama_jenis_produk_var = $data['nama_jenis_produk_var'];
		$deskripsi_jenis_produk_var = $data['deskripsi_jenis_produk_var'];

		$data = array(
			'nama_jenis_produk_var'			=> $nama_jenis_produk_var,
			'deskripsi_jenis_produk_var'	=> $deskripsi_jenis_produk_var
		);

		// cek validasi 
        $result = $this->TypeProductModel->duplicate_data($data);
        if ($result)
        {
        	// data duplicate
        	$this->response([
        		'status'		=> FALSE,
        		'message'		=> 'Nama Jenis Produk sudah digunakan!',
        		'data'			=> $result
        	], REST_Controller::HTTP_OK);
        }
        else
        {
        	$insert = $this->TypeProductModel->insert_data($data);

        	if ($insert) 
        	{
        		// data valid
	            $this->response([
	                'status' 	=> TRUE,
	                'message' 	=> 'Data berhasil disimpan!',
	                'data'		=> $insert
	            ], REST_Controller::HTTP_OK);	
        	}
        	else
        	{
        		// error insert
	            $this->response([
	                'status' 	=> FALSE,
	                'message' 	=> 'Error Saat Menyimpan Data!',
	                'data'		=> null
	            ], REST_Controller::HTTP_OK);	
        	}
        }
		
	}

	public function index_patch($id)
	{

		// receive post data
		$data = json_decode(file_get_contents('php://input'), true);
		$nama_jenis_produk_var = $data['nama_jenis_produk_var'];
		$deskripsi_jenis_produk_var = $data['deskripsi_jenis_produk_var'];

		$data = array(
			'nama_jenis_produk_var'			=> $nama_jenis_produk_var,
			'deskripsi_jenis_produk_var'	=> $deskripsi_jenis_produk_var
		);

		// cek validasi 
        $result = $this->TypeProductModel->duplicate_same_data($id, $data);
        if ($result)
        {
        	// data duplicate
        	$this->response([
        		'status'		=> FALSE,
        		'message'		=> 'Nama Jenis Produk sudah digunakan!',
        		'data'			=> $result
        	], REST_Controller::HTTP_OK);
        }
        else
        {
        	$update = $this->TypeProductModel->update_data($id, $data);

        	if ($update) 
        	{
        		// data valid
	            $this->response([
	                'status' 	=> TRUE,
	                'message' 	=> 'Data berhasil diperbaharui!',
	                'data'		=> $update
	            ], REST_Controller::HTTP_OK);	
        	}
        	else
        	{
        		// error insert
	            $this->response([
	                'status' 	=> FALSE,
	                'message' 	=> 'Error Saat Memperbaharui Data!',
	                'data'		=> null
	            ], REST_Controller::HTTP_OK);	
        	}
        }
		
	}

	public function index_delete($id)
	{

		$data = array(
			'status_boo'	=> FALSE
		);

		$result = $this->TypeProductModel->delete_data($id, $data);

		if ($result) 
		{
			$this->response([
	    		'status'		=> TRUE,
	    		'message'		=> 'Data telah berhasil dihapus!',
	    		'data'			=> null
	    	], REST_Controller::HTTP_OK);
		}
    	else
        {
        	$this->response([
	    		'status'		=> FALSE,
	    		'message'		=> 'Error Saat Menghapus Data!',
	    		'data'			=> null
	    	], REST_Controller::HTTP_OK);
        }
	}

}

/* End of file TypeProduct.php */
/* Location: ./application/controllers/api/TypeProduct.php */