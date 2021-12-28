<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tambah extends CI_Controller 
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper('url','date','form','database','session');
		$this->load->database();
		$this->load->model('m_tambah');
		$this->load->library('form_validation');
		$this->load->library('session');


	}

	function input_error()
	{
		$json['status'] = 0;
		$json['csrfHash'] = $this->security->get_csrf_hash();

		$json['pesan'] 	= '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>'. validation_errors() .'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		echo json_encode($json);
	}

	function query_error($pesan = "Terjadi kesalahan, coba lagi !")
	{
		$json['status'] = 2;
		$json['csrfHash'] = $this->security->get_csrf_hash();

		$json['pesan'] 	= '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>'. $pesan .'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		echo json_encode($json);
	}


	public function pilihan_vaksinasi()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nomor_antrian','Nomor Antrian ','trim|required');
		$this->form_validation->set_rules('id_jadwal_vaksinasi','id_jadwal_vaksinasi ','required');

		$this->form_validation->set_message('required','%s harus diisi !');
		$this->form_validation->set_message('valid_email', '%s tidak valid !');
		$this->form_validation->set_message('is_numeric', '%s harus angka !');
		$this->form_validation->set_message('alpha', '%s harus huruf !');

		if($this->form_validation->run() == TRUE)

		{



			$data = array(
				'nomor_antrian' => $this->input->post('nomor_antrian'),
				'id_jadwal_vaksinasi' => $this->input->post('id_jadwal_vaksinasi'),
				'id_pasien' => $this->session->userdata('id_pasien') ,
				'tanggal' => date('d-m-Y') ,
				'status' => 'Terdaftar' ,


				);
			$insert = $this->m_tambah->pilihan_vaksinasi($data);

			if($insert)
			{

				echo json_encode(array(
					'status' => 1,
					'csrfName'=>$this->security->get_csrf_token_name(),
					'csrfHash'=>$this->security->get_csrf_hash(),
					));
			}
			else
			{
				$this->query_error();
			}

			
		}
		else
		{
			$this->input_error();
		}
	}




	public function registrasi()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nik','NIK ','trim|required');
		$this->form_validation->set_rules('nama_pasien','Nama ','trim|required');
		$this->form_validation->set_rules('hp','Nomor HP ','trim|required');
		$this->form_validation->set_rules('alamat','Alamat ','trim|required');

		$this->form_validation->set_message('required','%s harus diisi !');
		$this->form_validation->set_message('valid_email', '%s tidak valid !');
		$this->form_validation->set_message('is_numeric', '%s harus angka !');
		$this->form_validation->set_message('alpha', '%s harus huruf !');

		if($this->form_validation->run() == TRUE)

		{



			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_pasien' => $this->input->post('nama_pasien'),
				'hp' => $this->input->post('hp'),
				'alamat' => $this->input->post('alamat'),


				);
			$insert = $this->m_tambah->registrasi($data);

			if($insert)
			{

				echo json_encode(array(
					'status' => 1,
					'csrfName'=>$this->security->get_csrf_token_name(),
					'csrfHash'=>$this->security->get_csrf_hash(),
					));
			}
			else
			{
				$this->query_error();
			}

			
		}
		else
		{
			$this->input_error();
		}
	}


	public function jadwal_vaksinasi()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tanggal','Tanggal ','trim|required');
		$this->form_validation->set_rules('tempat','Tempat ','trim|required');
		$this->form_validation->set_rules('id_vaksin','Vaksin ','trim|required');
		$this->form_validation->set_rules('status','Status ','trim|required');

		$this->form_validation->set_message('required','%s harus diisi !');
		$this->form_validation->set_message('valid_email', '%s tidak valid !');
		$this->form_validation->set_message('is_numeric', '%s harus angka !');
		$this->form_validation->set_message('alpha', '%s harus huruf !');

		if($this->form_validation->run() == TRUE)

		{



			$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'tempat' => $this->input->post('tempat'),
				'id_vaksin' => $this->input->post('id_vaksin'),
				'status' => $this->input->post('status'),


				);
			$insert = $this->m_tambah->jadwal_vaksinasi($data);

			if($insert)
			{

				echo json_encode(array(
					'status' => 1,
					'csrfName'=>$this->security->get_csrf_token_name(),
					'csrfHash'=>$this->security->get_csrf_hash(),
					));
			}
			else
			{
				$this->query_error();
			}

			
		}
		else
		{
			$this->input_error();
		}
	}



	public function pilihan_vaksinasi_admin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nomor_antrian','Nomor Antrian','trim|required');
		$this->form_validation->set_rules('id_jadwal_vaksinasi','Jadwal Vaksinasi ','trim|required');
		$this->form_validation->set_rules('id_pasien','Pasien ','trim|required');
		$this->form_validation->set_rules('status','Status ','trim|required');

		$this->form_validation->set_message('required','%s harus diisi !');
		$this->form_validation->set_message('valid_email', '%s tidak valid !');
		$this->form_validation->set_message('is_numeric', '%s harus angka !');
		$this->form_validation->set_message('alpha', '%s harus huruf !');

		if($this->form_validation->run() == TRUE)

		{



			$data = array(
				'nomor_antrian' => $this->input->post('nomor_antrian'),
				'id_jadwal_vaksinasi' => $this->input->post('id_jadwal_vaksinasi'),
				'id_pasien' => $this->input->post('id_pasien') ,
				'tanggal' => date('d-m-Y') ,
				'status' => 'Terdaftar' ,



				);
			$insert = $this->m_tambah->pilihan_vaksinasi_admin($data);

			if($insert)
			{

				echo json_encode(array(
					'status' => 1,
					'csrfName'=>$this->security->get_csrf_token_name(),
					'csrfHash'=>$this->security->get_csrf_hash(),
					));
			}
			else
			{
				$this->query_error();
			}

			
		}
		else
		{
			$this->input_error();
		}
	}



	public function jenis_vaksin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_vaksin','Nama Vaksin','trim|required');

		$this->form_validation->set_message('required','%s harus diisi !');
		$this->form_validation->set_message('valid_email', '%s tidak valid !');
		$this->form_validation->set_message('is_numeric', '%s harus angka !');
		$this->form_validation->set_message('alpha', '%s harus huruf !');

		if($this->form_validation->run() == TRUE)

		{



			$data = array(
				'nama_vaksin' => $this->input->post('nama_vaksin'),



				);
			$insert = $this->m_tambah->jenis_vaksin($data);

			if($insert)
			{

				echo json_encode(array(
					'status' => 1,
					'csrfName'=>$this->security->get_csrf_token_name(),
					'csrfHash'=>$this->security->get_csrf_hash(),
					));
			}
			else
			{
				$this->query_error();
			}

			
		}
		else
		{
			$this->input_error();
		}
	}

	public function pasien()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nik','NIK','trim|required');
		$this->form_validation->set_rules('nama_pasien','Nama Pasien','trim|required');
		$this->form_validation->set_rules('hp','Hp','trim|required');
		$this->form_validation->set_rules('alamat','Alamat','trim|required');

		$this->form_validation->set_message('required','%s harus diisi !');
		$this->form_validation->set_message('valid_email', '%s tidak valid !');
		$this->form_validation->set_message('is_numeric', '%s harus angka !');
		$this->form_validation->set_message('alpha', '%s harus huruf !');

		if($this->form_validation->run() == TRUE)

		{



			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_pasien' => $this->input->post('nama_pasien'),
				'hp' => $this->input->post('hp'),
				'alamat' => $this->input->post('alamat'),



				);
			$insert = $this->m_tambah->pasien($data);

			if($insert)
			{

				echo json_encode(array(
					'status' => 1,
					'csrfName'=>$this->security->get_csrf_token_name(),
					'csrfHash'=>$this->security->get_csrf_hash(),
					));
			}
			else
			{
				$this->query_error();
			}

			
		}
		else
		{
			$this->input_error();
		}
	}


}