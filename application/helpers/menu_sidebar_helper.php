<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('authentication')) 
{

	function show_menu($user)
	{
		
            $CI=& get_instance();
            $CI->load->database();
            $CI->load->library('session');

            $bahasa_id_int = $CI->session->userdata('bahasa_id_int');

            $sql = "SELECT
                        mn.nama_menu_var,
                        mn.url_menu_var,
                        mn.icon_var,
                        ur.view_boo,
                        ur.insert_boo,
                        ur.update_boo,
                        ur.delete_boo,
                        ur.download_boo 
                  FROM
                        t_mtr_menu mn
                        LEFT JOIN t_mtr_user_role ur USING ( menu_id_int ) 
                  WHERE
                        mn.status_boo IS TRUE 
                        AND ur.status_boo IS TRUE 
                        AND ur.user_id_int = $user 
                        AND mn.bahasa_id_int = $bahasa_id_int
                  ORDER BY
                        mn.induk_menu_id_int,
                        mn.nama_menu_var,
                        mn.menu_id_int ASC"; 
            $query = $CI->db->query($sql);
            $row = $query->result();

		if ($row) 
		{
			// show menu
			return $row;
		}

            return 0;

	}

}

/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */