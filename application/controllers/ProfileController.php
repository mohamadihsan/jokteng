<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

	public function index()
	{
		// =============================== Set Bahasa ========================
		if ($this->session->userdata('bahasa_id_int') == 1)
		{
			$title = 'Profil';
		}
		else if ($this->session->userdata('bahasa_id_int') == 2)
		{
			$title = 'Profile';
		}

		$data = array(
			'title'		=> $title,
			'menu_sidebar'	=> show_menu($this->session->userdata('user_id_int'))
		);

		$this->load->template('profile', $data, FALSE);
	}

}

/* End of file ProfileController.php */
/* Location: ./application/controllers/ProfileController.php */