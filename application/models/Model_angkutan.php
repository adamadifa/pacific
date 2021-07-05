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

  public function insert_angkutan(){

    $no_surat_jalan = $this->input->post('no_surat_jalan');
    $angkutan       = $this->input->post('angkutan');
    $tujuan         = $this->input->post('tujuan');
    $nopol          = $this->input->post('nopol');
    $tarif          = $this->input->post('tarif');
    $bs             = $this->input->post('bs');
    $tepung         = $this->input->post('tepung');
    $keterangan     = $this->input->post('keterangan');

    $data = array(
      'no_surat_jalan'  => $no_surat_jalan,
      'angkutan'        => $angkutan,
      'tujuan'          => $tujuan,
      'nopol'           => $nopol,
      'tarif'           => $tarif,
      'bs'              => $bs,
      'tepung'          => $tepung,
      'keterangan'      => $keterangan,
    );

    if($keterangan != 1){
      $this->db->insert('angkutan',$data);
    }else{
      $this->db->where('no_surat_jalan',$no_surat_jalan);
      $this->db->update('angkutan',$data);
    }
  }

  public function hapusangkutan(){


    $no_surat_jalan = $this->uri->segment(3);
    $this->db->query("DELETE FROM angkutan WHERE no_surat_jalan = '$no_surat_jalan' ");
    redirect('angkutan');
  }

  public function kontrabon(){

    $no_surat_jalan = $this->uri->segment(3);
    $tgl            = Date('Y-m-d');
    $this->db->query("UPDATE angkutan SET tgl_kontrabon = '$tgl' WHERE no_surat_jalan = '$no_surat_jalan' ");
    redirect('angkutan');
  }
  
  public function batalKontrabon(){

    $no_surat_jalan = $this->uri->segment(3);
    $tgl            = Date('Y-m-d');
    $this->db->query("UPDATE angkutan SET tgl_kontrabon = NULL WHERE no_surat_jalan = '$no_surat_jalan' ");
    redirect('angkutan');
  }

  

}
