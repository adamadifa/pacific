<?php

class Model_angkutan extends CI_Model
{
  
  public function getDataAngkutan($rowno, $rowperpage, $no_surat_jalan = "", $tgl_mutasi_gudang = "")
  {

    $this->db->select('*');
    $this->db->from('angkutan');
    $this->db->join('mutasi_gudang_jadi', 'angkutan.no_surat_jalan = mutasi_gudang_jadi.no_dok','left');
    $this->db->order_by('tgl_mutasi_gudang', 'DESC');

    if ($no_surat_jalan != '') {
      $this->db->like('no_surat_jalan', $no_surat_jalan);
    }

    if ($tgl_mutasi_gudang != '') {
      $this->db->where('tgl_mutasi_gudang', $tgl_mutasi_gudang);
    }

    $this->db->limit($rowperpage, $rowno);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getrecordAngkutanCount($no_surat_jalan = "", $tgl_mutasi_gudang = "")
  {

    $this->db->select('count(*) as allcount');
    $this->db->from('angkutan');
    $this->db->join('mutasi_gudang_jadi', 'angkutan.no_surat_jalan = mutasi_gudang_jadi.no_dok','left');
    $this->db->order_by('tgl_mutasi_gudang', 'DESC');

    if ($no_surat_jalan != '') {
      $this->db->like('no_surat_jalan', $no_surat_jalan);
    }

    if ($tgl_mutasi_gudang != '') {
      $this->db->where('tgl_mutasi_gudang', $tgl_mutasi_gudang);
    }

    $query  = $this->db->get();
    $result = $query->result_array();
    return $result[0]['allcount'];
  }

}
