<?php
class M_ambil extends CI_Model 
{
	public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('text');
		$this->load->helper('url','date','form','database');
		$this->load->library('session');

		$this->load->database();


    }

		public function get_nomor_antrian()
	{
			$data = $this->db->select('nomor_antrian');
			$data = $this->db->from('tb_pilihan_vaksin');
			$data = $this->db->order_by('nomor_antrian','DESC');
			$data = $this->db->limit(1);
			$data =$this->db->get(); 

			return $data->row();
	}

		public function cek_pilihan_vaksin()
	{
			$data = $this->db->select('id_jadwal_vaksinasi');
			$data = $this->db->from('tb_pilihan_vaksin');
			$data = $this->db->where('id_pasien',$this->session->userdata('id_pasien'));
			
			$data =$this->db->get(); 

			return $data->result();
	}

		public function get_pilihan_vaksinasi()
	{
			$data = $this->db->select('a.nomor_antrian,b.tanggal,c.nama_vaksin,a.status');
			$data = $this->db->from('tb_pilihan_vaksin  a');
			$data = $this->db->join('tb_jadwal_vaksinasi b','a.id_jadwal_vaksinasi = b.id_jadwal_vaksinasi');
			$data = $this->db->join('tb_vaksin c','b.id_vaksin = c.id_vaksin');
			$data = $this->db->where('id_pasien',$this->session->userdata('id_pasien'));
			
			$data =$this->db->get(); 

			return $data->result();
	}

			public function count_pilihan_vaksinasi()
	{
			$data = $this->db->select('count(*) as count');
			$data = $this->db->from('tb_pilihan_vaksin  a');
			$data = $this->db->join('tb_jadwal_vaksinasi b','a.id_jadwal_vaksinasi = b.id_jadwal_vaksinasi');
			$data = $this->db->join('tb_vaksin c','b.id_vaksin = c.id_vaksin');
			$data = $this->db->where('id_pasien',$this->session->userdata('id_pasien'));
			
			$data =$this->db->get(); 

			return $data->result();
	}

		function get_jadwal_vaksinasi($id)
	{
		$this->db->from('tb_jadwal_vaksinasi');
		$this->db->where('id_jadwal_vaksinasi', $id);
		$query = $this->db->get();
        return $query->row();
	}

		  function get_vaksin_all()
	{
		$this->db->from('tb_vaksin');
		$query = $this->db->get();
        return $query->result();
	}


		  function get_pasien_all()
	{
		$this->db->from('tb_pasien');
		$query = $this->db->get();
        return $query->result();
	}

		  function get_jadwal_vaksinasi_all()
	{
		$this->db->from('tb_jadwal_vaksinasi');
		$query = $this->db->get();
        return $query->result();
	}


		function get_pilihan_vaksin($id)
	{
		$this->db->from('tb_pilihan_vaksin');
		$this->db->where('id_pilihan_vaksin', $id);
		$query = $this->db->get();
        return $query->row();
	}

		function get_jenis_vaksin($id)
	{
		$this->db->from('tb_vaksin');
		$this->db->where('id_vaksin', $id);
		$query = $this->db->get();
        return $query->row();
	}
		function get_pasien($id)
	{
		$this->db->from('tb_pasien');
		$this->db->where('id_pasien', $id);
		$query = $this->db->get();
        return $query->row();
	}



}