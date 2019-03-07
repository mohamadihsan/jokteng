<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TypeProductController extends CI_Controller {

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
			$title = 'Types of Products';
			$dt_search = CONST_SEARCH_ENG;
			$dt_show = CONST_SHOW_ENG;
			$dt_entry = CONST_ENTRIES_ENG;
			$dt_empty_table = CONST_EMPTY_TABLE_ENG;
			$dt_search_not_found = CONST_SEARCH_NOT_FOUND_ENG;
			$dt_info1 = CONST_INFO1_ENG;
			$dt_info2 = CONST_INFO2_ENG;
			$dt_length_menu1 = CONST_LENGTH_MENU1_ENG;
			$dt_length_menu2 = CONST_LENGTH_MENU2_ENG;
			$dt_previous = CONST_PREVIOUS_ENG;
			$dt_next = CONST_NEXT_ENG;
			$dt_active = CONST_ACTIVE_ENG;
			$dt_not_active = CONST_NOT_ACTIVE_ENG;
			$save = CONST_SAVE_LABEL_ENG;
			$close = CONST_CLOSE_LABEL_ENG;
			$add = CONST_ADD_LABEL_ENG;
			$edit = CONST_EDIT_LABEL_ENG;
			$delete = CONST_DELETE_LABEL_ENG;
			$message_verify = CONST_MESSAGE_VERIFY_ENG;
			$lbl_1 = "Product Type Name";
			$lbl_2 = "Description";
			$required_nama_jenis_produk_var = 'Product Type Name is required';
			$minlength_nama_jenis_produk_var = 'Product Type Name must be at least 2 characters long';
			$confirm_delete = 'Are you sure delete this data ?';
			$confirm_label = 'Confirm';
		}
		else if ($this->session->userdata('bahasa_id_int') == 2)
		{
			$title = 'Jenis Produk';
			$dt_search = CONST_SEARCH_INA;
			$dt_show = CONST_SHOW_INA;
			$dt_entry = CONST_ENTRIES_INA;
			$dt_empty_table = CONST_EMPTY_TABLE_INA;
			$dt_search_not_found = CONST_SEARCH_NOT_FOUND_INA;
			$dt_info1 = CONST_INFO1_INA;
			$dt_info2 = CONST_INFO2_INA;
			$dt_length_menu1 = CONST_LENGTH_MENU1_INA;
			$dt_length_menu2 = CONST_LENGTH_MENU2_INA;
			$dt_previous = CONST_PREVIOUS_INA;
			$dt_next = CONST_NEXT_INA;
			$dt_active = CONST_ACTIVE_INA;
			$dt_not_active = CONST_NOT_ACTIVE_INA;
			$save = CONST_SAVE_LABEL_INA;
			$close = CONST_CLOSE_LABEL_INA;
			$add = CONST_ADD_LABEL_INA;
			$edit = CONST_EDIT_LABEL_INA;
			$delete = CONST_DELETE_LABEL_INA;
			$message_verify = CONST_MESSAGE_VERIFY_INA;
			$lbl_1 = "Nama Jenis Produk";
			$lbl_2 = "Deskripsi";
			$required_nama_jenis_produk_var = 'Tipe Produk wajib diisi';
			$minlength_nama_jenis_produk_var = 'Tipe Produk minimal harus terdiri dari 2 karakter';
			$confirm_delete = 'Apakah anda yakin akan menghapus data ini ?';
			$confirm_label = 'Konfirmasi';
		}

		$data = array(
			'title'					=> $title,
			'menu_sidebar'			=> show_menu($this->session->userdata('user_id_int')),
			'dt_search'				=> $dt_search,
			'dt_show'				=> $dt_show,
			'dt_entry'				=> $dt_entry,
			'dt_empty_table'		=> $dt_empty_table,
			'dt_search_not_found'	=> $dt_search_not_found,
			'dt_info1'				=> $dt_info1,
			'dt_info2'				=> $dt_info2,
			'dt_length_menu1'		=> $dt_length_menu1,
			'dt_length_menu2'		=> $dt_length_menu2,
			'dt_previous'			=> $dt_previous,
			'dt_next' 				=> $dt_next,
			'dt_active'				=> $dt_active,
			'dt_not_active'			=> $dt_not_active,
			'save'					=> $save,
			'close'					=> $close,
			'add'					=> $add,
			'edit'					=> $edit,
			'delete'				=> $delete,
			'confirm_delete'		=> $confirm_delete,
			'confirm_label'			=> $confirm_label,
			'message_verify' 		=> $message_verify,
			'lbl_1'					=> $lbl_1,
			'lbl_2'					=> $lbl_2,
			'required_nama_jenis_produk_var' 	=> $required_nama_jenis_produk_var,
			'minlength_nama_jenis_produk_var' 	=> $minlength_nama_jenis_produk_var
		);

		$this->load->template('type_product', $data);		
	}

}

/* End of file TypeProductController.php */
/* Location: ./application/controllers/TypeProductController.php */