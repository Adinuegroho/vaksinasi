<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masukadmin extends CI_Controller 
{

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('text');
		$this->load->helper('url','date','form','database');
		$this->load->database();
		$this->load->model('m_user');
		$this->load->library('encryption');
		$this->load->library('session');
		

	}

	public function login()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username','username','trim|required|min_length[3]|max_length[40]');
			$this->form_validation->set_rules('password','password','trim|required|min_length[3]|max_length[40]');
			$this->form_validation->set_message('required','%s harus diisi !');
			
			if($this->form_validation->run() == TRUE)
			{
				$username 	= $this->input->post('username');
				$password 	= $this->input->post('password');

				$valid = $this->m_user->validasi_login_admin($username,$password);
				
					if($valid ->num_rows() > 0)
					{
						$data_user = $valid->row();
						$data_session = array(
							'id_user' => $data_user->id_user,
							'username' => $data_user->username,
							'nama' => $data_user->nama,
							'alamat' => $data_user->alamat,

							);


						$this->session->set_userdata($data_session);

						$json['status']		= 1;
					
							$json['url_home'] 	= site_url('admin');
					
						echo json_encode($json);

					}else{
						$this->query_error("Login Gagal, Cek Username & Password !");
					}
				
			}
			else
			{
				$this->input_error();
			}

		}

		else
		{

			
			$this->load->view('login/login_admin');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('alamat');

		redirect('masukadmin/login');
	}



	function input_error()
	{
		$json['status'] = 0;
		$json['pesan'] 	= "<span id='notifikasi' style='color:orange;float:left;margin-top:10px;margin-bottom:10px;' >".validation_errors()."</span>";
		echo json_encode($json);
	}

	function query_error($pesan = "Terjadi kesalahan, coba lagi !")
	{
		$json['status'] = 2;
		$json['pesan'] 	= "<span id='notifikasi' style='color:red;float:left;margin-top:10px;margin-bottom:10px;' >".$pesan."</span>";
		echo json_encode($json);
	}

}