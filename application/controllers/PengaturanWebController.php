<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaturanWebController extends CI_Controller {

	public function index()
	{
		// =============================== Set Bahasa ========================
		if ($this->session->userdata('bahasa_id_int') == 1) 
		{
			$title = 'Pengaturan Web';
		}
		else if ($this->session->userdata('bahasa_id_int') == 2)
		{
			$title = 'Web Setting';
		}

		$data = array(
			'title'	=> $title
		);
		$this->load->view('pengaturan_web', $data);
	}

}

/* End of file PengaturanWebController.php */
/* Location: ./application/controllers/PengaturanWebController.php */