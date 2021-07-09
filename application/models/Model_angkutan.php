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
  
  public function insert_detail(){

    $no_surat_jalan     = $this->input->post('no_surat_jalan');
    $no_kontrabon       = $this->input->post('no_kontrabon');

    $data = array(
      'no_surat_jalan'      => $no_surat_jalan,
      'no_kontrabon'        => $no_kontrabon,
    );

    $this->db->insert('detail_kontrabon_angkutan',$data);
  }

  public function hapusangkutan(){


    $no_surat_jalan = $this->uri->segment(3);
    $this->db->query("DELETE FROM angkutan WHERE no_surat_jalan = '$no_surat_jalan' ");
    redirect('angkutan');
  }

  public function getDetailAngkutan(){
    
    $no_kontrabon       = $this->input->post('no_kontrabon');
    return $this->db->query("SELECT * FROM detail_kontrabon_angkutan INNER JOIN angkutan ON angkutan.no_surat_jalan=detail_kontrabon_angkutan.no_surat_jalan
    INNER JOIN mutasi_gudang_jadi ON detail_kontrabon_angkutan.no_surat_jalan = mutasi_gudang_jadi.no_dok  WHERE no_kontrabon = '$no_kontrabon' ");
  }
  
  public function getDetailAngkutanCount(){
    
    $no_kontrabon         = $this->input->post('no_kontrabon');
    $no_surat_jalan       = $this->input->post('no_sj');
    return $this->db->query("SELECT * FROM detail_kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' AND no_surat_jalan = '$no_surat_jalan' ");
  }

  
  public function hapus_detailkontrabon(){
    
    $no_surat_jalan       = $this->input->post('no_surat_jalan');
    $this->db->query("DELETE FROM detail_kontrabon_angkutan WHERE no_surat_jalan = '$no_surat_jalan' ");
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

  function jsonPilihSuratJalan()
  {
    $data =  $this->db->query("SELECT no_surat_jalan FROM detail_kontrabon_angkutan")->result();
    foreach ($data as $d) {
      $data = array(
        $no_surat_jalan = $d->no_surat_jalan
      );
    }
    $this->datatables->select('no_surat_jalan,tgl_mutasi_gudang,FORMAT(tarif,"c") AS tarif,FORMAT(bs,"c") AS bs,FORMAT(tepung,"c") AS tepung');
    $this->datatables->from('angkutan');
    $this->datatables->join('mutasi_gudang_jadi', 'angkutan.no_surat_jalan = mutasi_gudang_jadi.no_dok','left');
    $this->datatables->where('angkutan.tgl_kontrabon', NULL);
    if($no_surat_jalan != NULL){
      $this->db->where_not_in('angkutan.no_surat_jalan',$no_surat_jalan);
    }
    $this->datatables->add_column('view', '<a href="#"  data-toggle="modal" data-sj="$1" data-tgl="$2"  data-tarif="$3"  data-bs="$4"  data-tepung="$5" class="btn btn-danger btn-sm waves-effect pilih">Pilih</a>', 'no_surat_jalan,tgl_mutasi_gudang,tarif,bs,tepung');
    return $this->datatables->generate();
  }
  

}
