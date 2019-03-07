<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// call authentication helper
		authentication_user($this->session->userdata('token_var'));
	}

	public function index()
	{
		// =============================== Set Bahasa ========================
		if ($this->session->userdata('bahasa_id_int') == 1) 
		{
			$title = 'Beranda';
		}
		else if ($this->session->userdata('bahasa_id_int') == 2)
		{
			$title = 'Dashboard';
		}

		$data = array(
			'title'			=> $title,
			'menu_sidebar'	=> show_menu($this->session->userdata('user_id_int'))
		);

		$this->load->template('dashboard', $data);		
	}

}

/* End of file DashboardController.php */
/* Location: ./application/controllers/DashboardController.php */
?>