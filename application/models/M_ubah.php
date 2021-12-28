<?php
class M_ubah extends CI_Model  
{
	public function jadwal_vaksinasi($where, $data)
	{
		$this->db->update('tb_jadwal_vaksinasi', $data, $where);
		return $this->db->affected_rows();
	}

	public function pilihan_vaksinasi_admin($where, $data)
	{
		$this->db->update('tb_pilihan_vaksin', $data, $where);
		return $this->db->affected_rows();
	}

	public function jenis_vaksin($where, $data)
	{
		$this->db->update('tb_vaksin', $data, $where);
		return $this->db->affected_rows();
	}

	public function pasien($where, $data)
	{
		$this->db->update('tb_pasien', $data, $where);
		return $this->db->affected_rows();
	}


}