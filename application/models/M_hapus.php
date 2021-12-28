<?php
class M_hapus extends CI_Model  
{
		public function jadwal_vaksinasi($id)
	{
		$this->db->where('id_jadwal_vaksinasi', $id);
		$this->db->delete('tb_jadwal_vaksinasi');
	}

		public function pilihan_vaksinasi_admin($id)
	{
		$this->db->where('id_pilihan_vaksin', $id);
		$this->db->delete('tb_pilihan_vaksin');
	}

		public function jenis_vaksin($id)
	{
		$this->db->where('id_vaksin', $id);
		$this->db->delete('tb_vaksin');
	}


		public function pasien($id)
	{
		$this->db->where('id_pasien', $id);
		$this->db->delete('tb_pasien');
	}

}