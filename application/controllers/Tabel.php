<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel extends CI_Controller 
{

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url','date','form','database','xss');
		$this->load->database();
		$this->load->library('session');
	}


	public function jadwal_vaksinasi()
	{
		$this->load->library('encryption');

		$this->load->model('m_tabel');
		$this->load->model('m_ambil');
		$requestData	= $_REQUEST;
		$fetch			= $this->m_tabel->jadwal_vaksinasi($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length'] );
		
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		$no =1;

		$cek = $this->m_ambil->cek_pilihan_vaksin();
		foreach($query->result_array() as $row)
		{ 
			
			$nestedData = array(); 


			$nestedData[]	= $row['nomor'];

			$nestedData[]	= $row['tanggal'];
			$nestedData[]	= $row['tempat'];
			$nestedData[]	= $row['nama_vaksin'];

			if ($row['status'] == 'Dibuka') {
				# code...
				$stat = '<span class="badge badge-sm bg-gradient-info">'.$row['status'].'</span>';
				$d='';
				$bg='success';
			}else{
				$stat = '<span class="badge badge-sm bg-gradient-danger">'.$row['status'].'</span>';
				$d='disabled';
				$bg='secondary';



			}
			$nestedData[]	= $stat;
			
			$id = $row['id_jadwal_vaksinasi'];

			$nestedData[]	= "<button ".$d." onclick=\"edit('".$id."')\" class='btn btn-".$bg."' id='editbtn' style='padding:4px 7px;'><i class='fa fa-check'></i></button> " ;
			

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
			);

		echo json_encode($json_data);
	}



	public function jenis_vaksin()
	{
		$this->load->library('encryption');

		$this->load->model('m_tabel');
		$this->load->model('m_ambil');
		$requestData	= $_REQUEST;
		$fetch			= $this->m_tabel->jenis_vaksin($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length'] );
		
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		$no =1;

		$cek = $this->m_ambil->cek_pilihan_vaksin();
		foreach($query->result_array() as $row)
		{ 
			
			$nestedData = array(); 


			$nestedData[]	= $row['nomor'];

			$nestedData[]	= $row['nama_vaksin'];
			
			

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
			);

		echo json_encode($json_data);
	}



	public function jadwal_vaksinasi_admin()
	{
		$this->load->library('encryption');

		$this->load->model('m_tabel');
		$this->load->model('m_ambil');
		$requestData	= $_REQUEST;
		$fetch			= $this->m_tabel->jadwal_vaksinasi($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length'] );
		
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		$no =1;

		$cek = $this->m_ambil->cek_pilihan_vaksin();
		foreach($query->result_array() as $row)
		{ 
			
			$nestedData = array(); 


			$nestedData[]	= $row['nomor'];

			$nestedData[]	= $row['tanggal'];
			$nestedData[]	= $row['tempat'];
			$nestedData[]	= $row['nama_vaksin'];

			if ($row['status'] == 'Dibuka') {
				# code...
				$stat = '<span class="badge badge-sm bg-gradient-info">'.$row['status'].'</span>';
				$d='';
				$bg='success';
			}else{
				$stat = '<span class="badge badge-sm bg-gradient-danger">'.$row['status'].'</span>';
				$d='';
				$bg='success';



			}
			$nestedData[]	= $stat;
			
			$id = $row['id_jadwal_vaksinasi'];

			$nestedData[]	= "<button ".$d." onclick=\"edit('".$id."')\" class='btn btn-warning' id='editbtn' style='padding:4px 7px;'><i class='fa fa-edit'></i></button> 
			<button ".$d." onclick=\"deletes('".$id."')\" class='btn btn-danger' id='deletebtn' style='padding:4px 7px;'><i class='fa fa-trash-alt'></i></button> " ;
			

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
			);

		echo json_encode($json_data);
	}



	public function pilihan_vaksinasi()
	{
		$this->load->library('encryption');

		$this->load->model('m_tabel');
		$this->load->model('m_ambil');
		$requestData	= $_REQUEST;
		$fetch			= $this->m_tabel->pilihan_vaksinasi($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length'] );
		
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		$no =1;

		$cek = $this->m_ambil->cek_pilihan_vaksin();
		foreach($query->result_array() as $row)
		{ 
			
			$nestedData = array(); 


			$nestedData[]	= $row['nomor'];

			$nestedData[]	= $row['nomor_antrian'];
			$nestedData[]	= $row['nama_pasien'];
			$nestedData[]	= $row['tanggal'];

			if ($row['status'] == 'Terdaftar') {
				# code...
				$stat = '<span class="badge badge-sm bg-gradient-warning">'.$row['status'].'</span>';
				$d='';
				$bg='success';
			}else{
				$stat = '<span class="badge badge-sm bg-gradient-success">'.$row['status'].'</span>';
				$d='';
				$bg='success';



			}
			$nestedData[]	= $stat;
			
			$id = $row['id_pilihan_vaksin'];

			$nestedData[]	= "<button ".$d." onclick=\"edit('".$id."')\" class='btn btn-warning' id='editbtn' style='padding:4px 7px;'><i class='fa fa-edit'></i></button> 
			<button ".$d." onclick=\"deletes('".$id."')\" class='btn btn-danger' id='deletebtn' style='padding:4px 7px;'><i class='fa fa-trash-alt'></i></button> " ;
			

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
			);

		echo json_encode($json_data);
	}





	public function jenis_vaksin_admin()
	{
		$this->load->library('encryption');

		$this->load->model('m_tabel');
		$this->load->model('m_ambil');
		$requestData	= $_REQUEST;
		$fetch			= $this->m_tabel->jenis_vaksin($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length'] );
		
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		$no =1;

		$cek = $this->m_ambil->cek_pilihan_vaksin();
		foreach($query->result_array() as $row)
		{ 
			
			$nestedData = array(); 


			$nestedData[]	= $row['nomor'];

			$nestedData[]	= $row['nama_vaksin'];

			$id = $row['id_vaksin'];
			$nestedData[]	= "<button  onclick=\"edit('".$id."')\" class='btn btn-warning' id='editbtn' style='padding:4px 7px;'><i class='fa fa-edit'></i></button> 
			<button  onclick=\"deletes('".$id."')\" class='btn btn-danger' id='deletebtn' style='padding:4px 7px;'><i class='fa fa-trash-alt'></i></button> " ;
			

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
			);

		echo json_encode($json_data);
	}


	public function pasien()
	{
		$this->load->library('encryption');

		$this->load->model('m_tabel');
		$this->load->model('m_ambil');
		$requestData	= $_REQUEST;
		$fetch			= $this->m_tabel->pasien($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length'] );
		
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		$no =1;

		$cek = $this->m_ambil->cek_pilihan_vaksin();
		foreach($query->result_array() as $row)
		{ 
			
			$nestedData = array(); 


			$nestedData[]	= $row['nomor'];

			$nestedData[]	= $row['nama_pasien'];
			$nestedData[]	= $row['hp'];
			$nestedData[]	= $row['alamat'];

			$id = $row['id_pasien'];
			$nestedData[]	= "<button  onclick=\"edit('".$id."')\" class='btn btn-warning' id='editbtn' style='padding:4px 7px;'><i class='fa fa-edit'></i></button> 
			<button  onclick=\"deletes('".$id."')\" class='btn btn-danger' id='deletebtn' style='padding:4px 7px;'><i class='fa fa-trash-alt'></i></button> " ;
			

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
			);

		echo json_encode($json_data);
	}


}
