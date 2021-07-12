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

  
  public function getDataKontrabon($rowno, $rowperpage, $no_kontrabon = "", $tgl_kontrabon = "")
  {

    $this->db->select('*');
    $this->db->from('kontrabon_angkutan');

    $this->db->order_by('kontrabon_angkutan.tgl_kontrabon', 'DESC');

    if ($no_kontrabon != '') {
      $this->db->like('no_kontrabon', $no_kontrabon);
    }

    if ($tgl_kontrabon != '') {
      $this->db->where('kontrabon_angkutan.tgl_kontrabon', $tgl_kontrabon);
    }

    $this->db->limit($rowperpage, $rowno);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getrecordKontrabonCount($no_kontrabon = "", $tgl_kontrabon = "")
  {

    $this->db->select('count(*) as allcount');
    $this->db->from('kontrabon_angkutan');

    $this->db->order_by('kontrabon_angkutan.tgl_kontrabon', 'DESC');

    if ($no_kontrabon != '') {
      $this->db->like('no_kontrabon', $no_kontrabon);
    }

    if ($tgl_kontrabon != '') {
      $this->db->where('kontrabon_angkutan.tgl_kontrabon', $tgl_kontrabon);
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

    $updated = $this->db->query("SELECT * FROM detail_kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' ")->result();
    
    foreach ($updated as $d) {
      $data2 = array(
        'tgl_kontrabon'       => $tgl_kontrabon,
      );
      $this->db->insert('detail_kontrabon_angkutan',$data);
    }


    $this->db->insert('detail_kontrabon_angkutan',$data);
  }

  public function insert_ledger(){

    $no_bukti           = $this->input->post('no_bukti');
    $tgl_ledger         = $this->input->post('tgl_ledger');

    $data = array(
      'no_bukti'            => $no_bukti,
      'tgl_ledger'          => $tgl_ledger,
    );

    $this->db->insert('ledger_bank',$data);
  }
  
  public function insert_kontrabon(){

    $no_kontrabon       = $this->input->post('no_kontrabon');
    $tgl_kontrabon      = $this->input->post('tgl_kontrabon');
    $keterangan         = $this->input->post('keterangan');

    $data = array(
      'tgl_kontrabon'       => $tgl_kontrabon,
      'no_kontrabon'        => $no_kontrabon,
      'keterangan'          => $keterangan,
    );

    $this->db->insert('kontrabon_angkutan',$data);

    $updated = $this->db->query("SELECT * FROM detail_kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' ")->result();
    foreach ($updated as $d) {
      $data2 = array(
        'tgl_kontrabon'       => $tgl_kontrabon,
      );
      $this->db->where('no_surat_jalan',$d->no_surat_jalan);
      $this->db->update('angkutan',$data2);
    }

    redirect('angkutan/kontrabon');
  }


  public function hapusangkutan(){


    $no_surat_jalan = $this->uri->segment(3);
    $this->db->query("DELETE FROM angkutan WHERE no_surat_jalan = '$no_surat_jalan' ");
    redirect('angkutan');
  }
  
  public function hapuskontrabon(){


    $no_kontrabon = str_replace(".","/",$this->uri->segment(3));
    $this->db->query("DELETE FROM kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' ");
    $this->db->query("DELETE FROM detail_kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' ");
    redirect('angkutan/kontrabon');
  }

  public function getDetailAngkutan(){
    
    $kontrabon       = $this->input->post('no_kontrabon');
    if($kontrabon != ""){
      $no_kontrabon       = $this->input->post('no_kontrabon');
    }else{
      $no_kontrabon = str_replace(".","/",$this->uri->segment(3));
    }
    return $this->db->query("SELECT * FROM detail_kontrabon_angkutan INNER JOIN angkutan ON angkutan.no_surat_jalan=detail_kontrabon_angkutan.no_surat_jalan
    INNER JOIN mutasi_gudang_jadi ON detail_kontrabon_angkutan.no_surat_jalan = mutasi_gudang_jadi.no_dok  WHERE no_kontrabon = '$no_kontrabon' ");
  }

  public function getAngkutan(){
  
    $no_kontrabon = str_replace(".","/",$this->uri->segment(3));
    return $this->db->query("SELECT * FROM  kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' ");
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


  function jsonPilihSuratJalan()
  {
    $no_surat_jalan = '';
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
    if($no_surat_jalan == ''){

    }else{
      $this->db->where_not_in('angkutan.no_surat_jalan',$no_surat_jalan);
    }
    $this->datatables->add_column('view', '<a href="#"  data-toggle="modal" data-sj="$1" data-tgl="$2"  data-tarif="$3"  data-bs="$4"  data-tepung="$5" class="btn btn-danger btn-sm waves-effect pilih">Pilih</a>', 'no_surat_jalan,tgl_mutasi_gudang,tarif,bs,tepung');
    return $this->datatables->generate();
  }
  

}
