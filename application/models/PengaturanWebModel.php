<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaturanWebModel extends CI_Model {

	public function setting_web()
	{
		$query = $this->db->query('
			SELECT
				pw.nama_web_var,
				pw.nama_admin_web_var,
				wr.warna_var,
				wr.warna_component_var,
				gm.gambar_var,
				bh.bahasa_id_int,
				bh.nama_bahasa_var as bahasa_var
			FROM
				t_opr_pengaturan_web pw
				LEFT JOIN t_mtr_warna wr USING ( warna_id_int )
				LEFT JOIN t_mtr_gambar gm USING ( gambar_id_int )
				LEFT JOIN t_mtr_bahasa bh USING ( bahasa_id_int ) 
			WHERE
				pw.status_boo IS TRUE
			LIMIT 1	
			');

		$result = $query->row();

		return $result;
	}

}

/* End of file PengaturanWebModel.php */
/* Location: ./application/models/PengaturanWebModel.php */