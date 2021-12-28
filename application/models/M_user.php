<?php
class M_user extends CI_Model 
{
	public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('text');
		$this->load->helper('url','date','form','database');
		$this->load->database();


    }
	
	function validasi_login($nik)
	{
		$this->db->select('a.*');	
		$this->db->from('tb_pasien a');
		$this->db->where('a.nik',$nik);
		$this->db->limit(1);
		return $this->db->get();
	}

	function validasi_login_admin($username,$password)
	{
		$this->db->select('a.*');	
		$this->db->from('tb_user a');
		$this->db->where('a.username',$username);
		$this->db->where('a.password',$password);
		$this->db->limit(1);
		return $this->db->get();
	}


	
}