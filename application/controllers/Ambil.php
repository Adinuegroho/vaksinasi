<?php
class Ambil extends CI_Controller 
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper('url','date','form','database');
		$this->load->database();

	}

	public function get_nomor_antrian(){
		$this->db->select('nomor_antrian', false); 
		$this->db->order_by('nomor_antrian', 'DESC');
		
		$query = $this->db->get('tb_pilihan_vaksin');
	
		if($query->num_rows() > 0){
		
		$this->load->model('m_ambil');
		$data = $this->m_ambil->get_nomor_antrian();

	
			$kode = substr($data->nomor_antrian, 4);
			$kode = $kode+1;
		
		
		
		}else {         
			$kode = 1;    
		}
		
		$kodemax = 'V-00'.$kode; 
		$kodejadi = $kodemax;   
		// echo $kodemax;  
		$json_data = array(
			"kode" => $kodejadi
		);
		echo json_encode($json_data);
	}

	public function get_jadwal_vaksinasi($id){
		
		$this->load->model('m_ambil');
		$datas = $this->m_ambil->get_jadwal_vaksinasi($id);
		$data = array(
			'id_jadwal_vaksinasi' => $datas->id_jadwal_vaksinasi,
			'tanggal' => $datas->tanggal,
			'tempat' => $datas->tempat,
			'id_vaksin' => $datas->id_vaksin,
			'status' => $datas->status,
			);
		echo json_encode($data);
	}



	public function get_pilihan_vaksin($id){
		
		$this->load->model('m_ambil');
		$datas = $this->m_ambil->get_pilihan_vaksin($id);
		$data = array(
			'id_pilihan_vaksin' => $datas->id_pilihan_vaksin,
			'nomor_antrian' => $datas->nomor_antrian,
			'id_pasien' => $datas->id_pasien,
			'id_jadwal_vaksinasi' => $datas->id_jadwal_vaksinasi,
			
			'status' => $datas->status,
			);
		echo json_encode($data);
	}


	public function get_jenis_vaksin($id){
		
		$this->load->model('m_ambil');
		$datas = $this->m_ambil->get_jenis_vaksin($id);
		$data = array(
			'nama_vaksin' => $datas->nama_vaksin,
		
			);
		echo json_encode($data);
	}

	public function get_pasien($id){
		
		$this->load->model('m_ambil');
		$datas = $this->m_ambil->get_pasien($id);
		$data = array(
			'nik' => $datas->nik,
			'nama_pasien' => $datas->nama_pasien,
			'hp' => $datas->hp,
			'alamat' => $datas->alamat,
		
			);
		echo json_encode($data);
	}


}
