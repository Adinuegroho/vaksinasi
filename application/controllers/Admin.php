<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
		public function __construct() {
        parent::__construct();
  		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('text');
		$this->load->helper('url','date','form','database');
		$this->load->database();
		$this->load->library('session');
		$this->load->model('m_ambil');

		
      	
		
		if(!$this->session->userdata('id_user')){
			redirect(base_url("masukadmin/logout"));
		} 

    }


    public function index() {
		redirect(base_url('admin/dashboard'));
	}


	public function dashboard(){
		$data = array(
			'breadcrumb' => 'Dashboard',
			'tabel' => 'dashboard',
			'konten' => 'dashboard',
			'log'=>'',
			'logs'=>'',

		
		
		);
		$this->load->view('admin', $data);
	}

	public function jadwal_vaksinasi(){
		$data = array(
			'breadcrumb' => 'Jadwal Vakasinasi',
			'tabel' => 'jadwal_vaksinasi_admin',
			'konten' => 'jadwal_vaksinasi',
			'vaksin' => $this->m_ambil->get_vaksin_all(),
			'log'=>'',
			'logs'=>'',

		
		
		);
		$this->load->view('admin', $data);
	}

	public function pilihan_vaksinasi(){
		$data = array(
			'breadcrumb' => 'Pilihan Vakasinasi',
			'tabel' => 'pilihan_vaksinasi',
			'konten' => 'pilihan_vaksinasi',
			'pasien' => $this->m_ambil->get_pasien_all(),
			'jadwal' => $this->m_ambil->get_jadwal_vaksinasi_all(),
			'log'=>'',
			'logs'=>'',

		
		
		);
		$this->load->view('admin', $data);
	}

	public function jenis_vaksin(){
		$data = array(
			'breadcrumb' => 'Jenis Vaksin',
			'tabel' => 'jenis_vaksin_admin',
			'konten' => 'jenis_vaksin',
			'log'=>'',
			'logs'=>'',

		
		
		);
		$this->load->view('admin', $data);
	}

	public function pasien(){
		$data = array(
			'breadcrumb' => 'Pasien',
			'tabel' => 'pasien',
			'konten' => 'pasien',
			'log'=>'',
			'logs'=>'',

		
		
		);
		$this->load->view('admin', $data);
	}
}