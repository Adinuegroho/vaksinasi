<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hapus extends CI_Controller 
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper('url','date','form','database');
		$this->load->database();


	}

	public function jadwal_vaksinasi($id)
	{
		if($this->input->is_ajax_request())
		{
			$this->load->model('m_hapus');

			$hapus = $this->m_hapus->jadwal_vaksinasi($id);
			echo json_encode(array(
				"pesan" => "<font color='green'><i class='fa fa-check'></i> Data berhasil dihapus !</font>",
				));
		}
	}


	public function pilihan_vaksinasi_admin($id)
	{
		if($this->input->is_ajax_request())
		{
			$this->load->model('m_hapus');

			$hapus = $this->m_hapus->pilihan_vaksinasi_admin($id);
			echo json_encode(array(
				"pesan" => "<font color='green'><i class='fa fa-check'></i> Data berhasil dihapus !</font>",
				));
		}
	}

	public function jenis_vaksin($id)
	{
		if($this->input->is_ajax_request())
		{
			$this->load->model('m_hapus');

			$hapus = $this->m_hapus->jenis_vaksin($id);
			echo json_encode(array(
				"pesan" => "<font color='green'><i class='fa fa-check'></i> Data berhasil dihapus !</font>",
				));
		}
	}

	public function pasien($id)
	{
		if($this->input->is_ajax_request())
		{
			$this->load->model('m_hapus');

			$hapus = $this->m_hapus->pasien($id);
			echo json_encode(array(
				"pesan" => "<font color='green'><i class='fa fa-check'></i> Data berhasil dihapus !</font>",
				));
		}
	}


}