<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function get_user($username_var, $password_var)
	{
		$query = "SELECT 
						user_id_int, 
						username_var, 
						nama_lengkap_var, 
						group_user_id_int 
					FROM t_mtr_user 
        			WHERE username_var = '".$username_var."' 
	        			AND password_var = '".$password_var."'
	        			AND status_boo IS TRUE
        		";

        $sql = $this->db->query($query);		

        $result = $sql->row();

        return $result;		
	}

}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */