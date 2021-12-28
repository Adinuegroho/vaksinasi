<?php
class M_tambah extends CI_Model 
{
		public function pilihan_vaksinasi($data)
	{
		$this->db->insert('tb_pilihan_vaksin', $data);
		return $this->db->insert_id();
	}

		public function registrasi($data)
	{
		$this->db->insert('tb_pasien', $data);
		return $this->db->insert_id();
	}
		public function jadwal_vaksinasi($data)
	{
		$this->db->insert('tb_jadwal_vaksinasi', $data);
		return $this->db->insert_id();
	}

		public function pilihan_vaksinasi_admin($data)
	{
		$this->db->insert('tb_pilihan_vaksin', $data);
		return $this->db->insert_id();
	}


		public function jenis_vaksin($data)
	{
		$this->db->insert('tb_vaksin', $data);
		return $this->db->insert_id();
	}

		public function pasien($data)
	{
		$this->db->insert('tb_pasien', $data);
		return $this->db->insert_id();
	}
}