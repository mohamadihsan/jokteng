<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// load model
		$this->load->model('PengaturanWebModel');
	}

	public function index()
	{
		// Semua session pengaturan web akan dipanggil pertama di controller ini
		$result = $this->PengaturanWebModel->setting_web();
		$data_session = array(
			'nama_web_var'			=> $result->nama_web_var,
			'nama_admin_web_var'	=> $result->nama_admin_web_var,
			'warna_var'				=> $result->warna_var,
			'warna_component_var'	=> $result->warna_component_var,
			'gambar_var'			=> $result->gambar_var,
			'bahasa_id_int'			=> $result->bahasa_id_int
		);

		if (count($data_session) > 0) 
		{
			// set session 
			$this->session->set_userdata($data_session);	
		}
		else
		{
			// direct ke halaman pengaturan web
			redirect('setting','refresh');
		}	

		if (empty($this->session->userdata('logged_in'))) 
		{
			// =============================== Set Bahasa ========================
			if ($this->session->userdata('bahasa_id_int') == 1) 
			{
				$title = 'Masuk';
				$message_verify = 'Verifikasi Akun...';
				$required_username_var = 'Username wajib diisi';
				$minlength_username_var = 'Username minimal harus terdiri dari 2 karakter';
				$required_password_var = 'Password wajib diisi';
				$minlength_password_var = 'Password minimal harus terdiri dari 5 karakter';
			}
			else if ($this->session->userdata('bahasa_id_int') == 2)
			{
				$title = 'Login';
				$message_verify = 'Verify Account...';
				$required_username_var = 'Please enter a username';
				$minlength_username_var = 'Your username must consist of at least 2 characters';
				$required_password_var = 'Please provide a password';
				$minlength_password_var = 'Your password must be at least 5 characters long';
			}
			
			// redirect ke halaman login
			$data = array(
				'title'						=> $title,
				'message_verify'			=> $message_verify,
				'required_username_var'		=> $required_username_var,
				'minlength_username_var'	=> $minlength_username_var,
				'required_password_var'		=> $required_password_var,
				'minlength_password_var'	=> $minlength_password_var
			);

			$this->load->template_login('login', $data, FALSE);

		}
		else
		{
			// redirect ke halaman beranda
			redirect(base_url('dashboard'),'refresh');

		}

	}

}

/* End of file LoginController.php */
/* Location: ./application/controllers/LoginController.php */