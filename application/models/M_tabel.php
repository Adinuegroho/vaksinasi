<?php
class M_tabel extends CI_Model 
{
    function like_match($pattern, $subject)
    {
        $pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
        return (bool) preg_match("/^{$pattern}$/i", $subject);
    }


function jadwal_vaksinasi($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
{
  $sql = "
  SELECT 

  (@row:=@row+1) AS nomor,
  a.`id_jadwal_vaksinasi`, 
  a.`tanggal`,
  a.`tempat`,
  a.`status`,
  b.`nama_vaksin`
  FROM 
  `tb_jadwal_vaksinasi` as a
  INNER JOIN tb_vaksin as b on a.id_vaksin = b.id_vaksin

  , (SELECT @row := 0) r WHERE 1=1 
  ";

  $data['totalData'] = $this->db->query($sql)->num_rows();

  if( ! empty($like_value))
  {
     $sql .= " AND ( ";    
     $sql .= "
     a.`tanggal` LIKE '%".$this->db->escape_like_str($like_value)."%'
     OR a.`tempat` LIKE '%".$this->db->escape_like_str($like_value)."%' 
     OR a.`status` LIKE '%".$this->db->escape_like_str($like_value)."%' 
     OR b.`nama_vaksin` LIKE '%".$this->db->escape_like_str($like_value)."%' 
     ";
     $sql .= " ) ";
 }

 $data['totalFiltered']	= $this->db->query($sql)->num_rows();

 $columns_order_by = array( 
  
     0 => 'nomor',
     1 => 'a.`tanggal`',
     2 => 'a.`tempat`',
     3 => 'b.`nama_vaksin`',
     4 => 'a.`status`',
     5 => 'a.`status`',

     );

 $sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
 $sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

 $data['query'] = $this->db->query($sql);
 return $data;
}




function jenis_vaksin($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
{
  $sql = "
  SELECT 

  (@row:=@row+1) AS nomor,
  a.`id_vaksin`,
  a.`nama_vaksin`
  FROM 
  `tb_vaksin` as a

  , (SELECT @row := 0) r WHERE 1=1 
  ";

  $data['totalData'] = $this->db->query($sql)->num_rows();

  if( ! empty($like_value))
  {
     $sql .= " AND ( ";    
     $sql .= "
     a.`nama_vaksin` LIKE '%".$this->db->escape_like_str($like_value)."%'
     ";
     $sql .= " ) ";
 }

 $data['totalFiltered'] = $this->db->query($sql)->num_rows();

 $columns_order_by = array( 
  
     0 => 'nomor',
     1 => 'a.`nama_vaksin`'

     );

 $sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
 $sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

 $data['query'] = $this->db->query($sql);
 return $data;
}




function pilihan_vaksinasi($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
{
  $sql = "
  SELECT 

  (@row:=@row+1) AS nomor,
  a.`id_pilihan_vaksin`,
  a.`nomor_antrian`,
  b.`nama_pasien`,
  c.`tanggal`,
  a.`status`
  FROM 
  `tb_pilihan_vaksin` as a
  INNER JOIN tb_pasien as b on a.id_pasien  = b.id_pasien
  INNER JOIN tb_jadwal_vaksinasi as c on a.id_jadwal_vaksinasi = c.id_jadwal_vaksinasi

  , (SELECT @row := 0) r WHERE 1=1 
  ";

  $data['totalData'] = $this->db->query($sql)->num_rows();

  if( ! empty($like_value))
  {
     $sql .= " AND ( ";    
     $sql .= "
     a.`nomor_antrian` LIKE '%".$this->db->escape_like_str($like_value)."%'
     OR b.`nama_pasien` LIKE '%".$this->db->escape_like_str($like_value)."%'
     OR c.`tanggal` LIKE '%".$this->db->escape_like_str($like_value)."%'
     OR a.`status` LIKE '%".$this->db->escape_like_str($like_value)."%'
     ";
     $sql .= " ) ";
 }

 $data['totalFiltered'] = $this->db->query($sql)->num_rows();

 $columns_order_by = array( 
  
     0 => 'nomor',
     1 => 'a.`nomor_antrian`',
     1 => 'b.`nama_pasien`',
     1 => 'c.`tanggal`',
     1 => 'a.`status`',

     );

 $sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
 $sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

 $data['query'] = $this->db->query($sql);
 return $data;
}




function pasien($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
{
  $sql = "
  SELECT 

  (@row:=@row+1) AS nomor,
  a.`id_pasien`,
  a.`nama_pasien`,
  a.`hp`,
  a.`alamat`
  FROM 
  `tb_pasien` as a

  , (SELECT @row := 0) r WHERE 1=1 
  ";

  $data['totalData'] = $this->db->query($sql)->num_rows();

  if( ! empty($like_value))
  {
     $sql .= " AND ( ";    
     $sql .= "
     a.`nama` LIKE '%".$this->db->escape_like_str($like_value)."%'
     OR a.`hp` LIKE '%".$this->db->escape_like_str($like_value)."%'
     OR a.`alamat` LIKE '%".$this->db->escape_like_str($like_value)."%'
     ";
     $sql .= " ) ";
 }

 $data['totalFiltered'] = $this->db->query($sql)->num_rows();

 $columns_order_by = array( 
  
     0 => 'nomor',
     1 => 'a.`nama`',
     2 => 'a.`hp`',
     3 => 'a.`alamat`',

     );

 $sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
 $sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

 $data['query'] = $this->db->query($sql);
 return $data;
}


}
