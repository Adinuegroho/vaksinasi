<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller 
{
		public function __construct() {
        parent::__construct();
  		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('text');
		$this->load->helper('url','date','form','database');
		$this->load->database();
		$this->load->library('session');
		$this->load->model('m_ambil');

		
      	
		
		if(!$this->session->userdata('id_pasien')){
			redirect(base_url("masuk/logout"));
		} 

    }


    public function index() {
		redirect(base_url('pasien/dashboard'));
	}


	public function dashboard(){
		$data = array(
			'breadcrumb' => 'Dashboard',
			'tabel' => 'dashboard',
			'konten' => 'dashboard',
			'log'=>'',
			'logs'=>'',

		
		
		);
		$this->load->view('pasien', $data);
	}

	public function jadwal_vaksinasi(){
		$data = array(
			'breadcrumb' => 'Jadwal Vaksinasi',
			'tabel' => 'jadwal_vaksinasi',
			'konten' => 'jadwal_vaksinasi',
			'log'=>'',
			'logs'=>'',

		
		
		);
		$this->load->view('pasien', $data);
	}

		public function jenis_vaksin(){
		$data = array(
			'breadcrumb' => 'Jenis Vaksin',
			'tabel' => 'jenis_vaksin',
			'konten' => 'jenis_vaksin',
			'log'=>'',
			'logs'=>'',

		
		
		);
		$this->load->view('pasien', $data);
	}

	public function riwayat_vaksinasi(){
		$data = array(
			'breadcrumb' => 'Riwayat Vaksinasi',
			'tabel' => 'riwayat_vaksinasi',
			'konten' => 'riwayat_vaksinasi',
			'pilihan_vaksinasi' => $this->m_ambil->get_pilihan_vaksinasi(),
			'count' => $this->m_ambil->count_pilihan_vaksinasi(),
			'log'=>'',
			'logs'=>'',

		
		
		);
		$this->load->view('pasien', $data);
	}
}
