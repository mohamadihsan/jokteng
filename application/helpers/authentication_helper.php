<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('authentication')) 
{

	function authentication_user($token='')
	{
		
		// $ci=& get_instance();
	 //    $ci->load->database(); 

	 //    $sql = "SELECT * FROM t_mtr_user"; 
	 //    $query = $ci->db->query($sql);
	 //    $row = $query->result();

		if ($token == '') 
		{
			// token tidak valid / tidak ada token
			redirect(base_url('login'),'refresh');
		}

	}

	function create_session_login($data)
	{
		$CI =& get_instance();
      	$CI->load->library('session');

      	$data_session = array(
      		'logged_in'			=> TRUE,
      		'token_var'			=> '112233',
      		'group_user_id_int'	=> $data->group_user_id_int,
      		'nama_lengkap_var'	=> $data->nama_lengkap_var,
      		'user_id_int'		=> $data->user_id_int,
      		'username_var'		=> $data->username_var
      	);

      	if($CI->session->set_userdata($data_session))
      	{
      		$result = TRUE;
      	}
      	else
      	{
      		$result = FALSE;
      	}

		return $result;
	}

	function destroy_session_login()
	{
		$CI =& get_instance();
      	$CI->load->library('session');

      	if($CI->session->sess_destroy())
      	{
      		$result = TRUE;
      	}
      	else
      	{
      		$result = FALSE;
      	}

		return $result;
	}

}

/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */