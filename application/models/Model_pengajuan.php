<?php

class Model_pengajuan extends CI_Model
{
  
  public function getDataPengajuan($rowno, $rowperpage, $nobukti = "", $tanggal = "")
  {

    $this->db->select('*');
    $this->db->from('pengajuan_barang');
    $this->db->join('departemen', 'pengajuan_barang.kode_dept = departemen.kode_dept','left');
    $this->db->order_by('tanggal', 'DESC');

    if ($nobukti != '') {
      $this->db->like('nobukti', $nobukti);
    }

    if ($tanggal != '') {
      $this->db->where('tanggal', $tanggal);
    }

    $this->db->limit($rowperpage, $rowno);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getrecordPengajuanCount($nobukti = "", $tanggal = "")
  {

    $this->db->select('count(*) as allcount');
    $this->db->from('pengajuan_barang');
    $this->db->join('departemen', 'pengajuan_barang.kode_dept = departemen.kode_dept','left');
    $this->db->order_by('tanggal', 'DESC');

    if ($nobukti != '') {
      $this->db->like('nobukti', $nobukti);
    }

    if ($tanggal != '') {
      $this->db->where('tanggal', $tanggal);
    }

    $query  = $this->db->get();
    $result = $query->result_array();
    return $result[0]['allcount'];
  }


  public function insertPengajuanBarang($foto){

    $nobukti        = $this->input->post('nobukti');
    $keterangan     = $this->input->post('keterangan');
    $nama_pemohon   = $this->input->post('nama_pemohon');
    $tanggal        = $this->input->post('tanggal');
    $id_user        = $this->session->userdata('id_user');
    $cabang         = $this->session->userdata('cabang');

    $data = array(
      'nobukti'         => $nobukti,
      'nama_lengkap'    => $nama_pemohon,
      'keterangan'      => $keterangan,
      'tanggal'         => $tanggal,
      'kode_cabang'     => $cabang,
      'foto'            => $foto
    );

    $this->db->insert('pengajuan_barang',$data);
    redirect('pengajuan/pengajuanBarang');

  }
  
  public function inputDetailPengajuanBarangTemp(){

    $approval           = $this->input->post('approval');
    $id_user            = $this->session->userdata('id_user');
    
    $data = array(
      'approval'          => $approval,
      'id_user'           => $id_user,
    );
    $this->db->insert('detail_pengajuan_barang_temp',$data);

  }

  public function getDetailPengajuanBarangTemp(){
    
    $id_user            = $this->session->userdata('id_user');
    
    return $this->db->query("SELECT * FROM detail_pengajuan_barang_temp 
    WHERE id_user = '$id_user' ");
  }

  public function getDataPengajuanBarang(){
  
    return $this->db->query("SELECT pengajuan_barang.nobukti,nama_lengkap,kode_cabang,tanggal,foto,kode_dept,keterangan,id_user 
    FROM pengajuan_barang 
    
    LEFT JOIN(
      SELECT detail_pengajuan_barang.nobukti,id_user FROM detail_pengajuan_barang WHERE id_user = '10'
      GROUP BY detail_pengajuan_barang.nobukti,id_user
    ) dpb ON (dpb.nobukti=pengajuan_barang.nobukti) 
    
    ");
  }

  public function getDetailPengajuanBarang(){
    
    $nobukti       = $this->input->post('nobukti');
    return $this->db->query("SELECT * FROM detail_pengajuan_barang 
    INNER JOIN master_barang_pembelian ON master_barang_pembelian.kode_barang=detail_pengajuan_barang.kode_barang
    WHERE nobukti = '$nobukti' ");
  }

  public function getPengajuanBarang(){
  
    $nobukti       = $this->input->post('nobukti');
    return $this->db->query("SELECT * FROM  pengajuan_barang WHERE nobukti = '$nobukti' ");
  }

  public function hapusDetailPengajuanBarangTemp(){
    
    $id       = $this->input->post('id');
    $this->db->query("DELETE FROM detail_pengajuan_barang_temp WHERE id = '$id' ");
  }

  
  public function hapusPengajuanBarang(){
    
    $nobukti       = str_replace(".","/",$this->uri->segment(3));
    $this->db->query("DELETE FROM detail_pengajuan_barang WHERE nobukti = '$nobukti' ");
    $this->db->query("DELETE FROM pengajuan_barang WHERE nobukti = '$nobukti' ");
    redirect('pengajuan/pengajuanBarang');
  }

  function jsonPilihBarang()
  {

    $this->datatables->select('kode_barang,nama_barang,satuan,master_barang_pembelian.kode_dept,nama_dept,jenis_barang,kode_kategori');
    $this->datatables->from('master_barang_pembelian');
    $this->datatables->join('departemen', 'master_barang_pembelian.kode_dept = departemen.kode_dept');
    $this->datatables->where('master_barang_pembelian.status', 'Aktif');
    $this->datatables->where('master_barang_pembelian.kode_dept', 'GAF');
    $this->datatables->add_column('view', '<a href="#"  data-toggle="modal" data-kode="$1" data-nama="$2"  data-jenis="$3"  data-kategori="$4" class="btn btn-danger btn-sm waves-effect pilih">Pilih</a>', 'kode_barang,nama_barang,jenis_barang,kode_kategori');
    return $this->datatables->generate();
  }

  

}
