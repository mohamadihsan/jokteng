<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Authentication extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		// load model
		$this->load->model('LoginModel');
		// loaded helper
		$this->load->helper('authentication_helper');
	}

	public function is_logged_in_get()
	{

		// cek session logged in
		if (!empty($this->session->userdata('logged_in'))) 
		{
			if ($this->session->userdata('logged_in') === TRUE) 
			{
				// status login valid
				$this->response([
	        		'logged_in'	=> TRUE,
	        		'message'	=> 'Login Valid!'
	        	], REST_Controller::HTTP_OK);
			}
			else
			{
				// status login tidak valid
				$this->response([
	        		'logged_in'	=> FALSE,
	        		'message'	=> 'Autentikasi Tidak Valid!'
	        	], REST_Controller::HTTP_OK);
			}
		}
		else
		{
			// status login tidak valid
			$this->response([
        		'logged_in'	=> FALSE,
        		'message'	=> 'Autentikasi Tidak Valid!'
        	], REST_Controller::HTTP_OK);
		}
		
	}

	public function verify_post()
	{

		// receive post data
		$data = json_decode(file_get_contents('php://input'), true);
		$username_var = $data['username_var'];
		$password_var = md5($data['password_var']);

		// cek validasi user
        $data_user = $this->LoginModel->get_user($username_var, $password_var); 
        // $user_status = count($data_user);

        if ($data_user)
        {
        	// call helper create session login
        	create_session_login($data_user);

        	// call helper create session menu sidebar
        	$menu_sidebar = show_menu($data_user->user_id_int);

        	// user ditemukan
        	$this->response([
        		'status'		=> TRUE,
        		'logged_in'		=> TRUE,
        		'message'		=> 'Autentikasi Berhasil!',
        		'data'			=> $data_user,
        		'menu_sidebar'	=> $menu_sidebar
        	], REST_Controller::HTTP_OK);
        }
        else
        {
        	// user tidak ditemukan
            $this->response([
                'status' 	=> FALSE,
                'logged_in'	=> FALSE,
                'message' 	=> 'Username dan Password Tidak Terdaftar',
                'data'		=> null
            ], REST_Controller::HTTP_OK); 
        }
		
	}

	public function logout_get()
	{

    	// call helper destroy session login
    	if(destroy_session_login())
    	{
    		// logout berhasil
	    	$this->response([
	    		'status'	=> TRUE,
	    		'logged_out'=> TRUE,
	    		'message'	=> 'Sesi telah habis!'
	    	], REST_Controller::HTTP_OK);	
    	}
    	else
    	{
    		// gagal logout
	    	$this->response([
	    		'status'	=> TRUE,
	    		'logged_out'=> TRUE,
	    		'message'	=> 'Terjadi kesalahan saat keluar!'
	    	], REST_Controller::HTTP_OK);
    	}
		
	}

}

/* End of file Authentication.php */
/* Location: ./application/controllers/api/Authentication.php */