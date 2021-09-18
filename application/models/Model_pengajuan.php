<?php

class Model_pengajuan extends CI_Model
{

  public function insertPengajuanBarang(){

    $nobukti        = $this->input->post('nobukti');
    $keterangan     = $this->input->post('keterangan');
    $nama_pemohon   = $this->input->post('nama_pemohon');
    $tanggal        = $this->input->post('tanggal');
    $foto           = $this->input->post('foto');
    $id_user        = $this->session->userdata('id_user');
    $cabang         = $this->session->userdata('cabang');

    if($keterangan == 'Barang'){
      $ga           = 0;
      $mg           = '';
      $ma           = 0;
      $mm           = '';
      $em           = 0;
      $dirut        = 0;
    }else if($keterangan == 'Jasa'){
      $ga           = 0;
      $mg           = '';
      $ma           = 0;
      $mm           = '';
      $em           = 0;
      $dirut        = 0;
    }else if($keterangan == 'ATK'){
      $ga           = '';
      $mg           = 0;
      $ma           = 0;
      $mm           = '';
      $em           = '';
      $dirut        = '';
    }else{
      $ga           = 0;
      $mg           = '';
      $ma           = 0;
      $mm           = 0;
      $em           = 0;
      $dirut        = 0;
    }

    $data = array(
      'nobukti'         => $nobukti,
      'nama_lengkap'    => $nama_pemohon,
      'keterangan'      => $keterangan,
      'tanggal'         => $tanggal,
      'kode_cabang'     => $cabang,
      'foto'            => $foto,
      'ga'              => $ga,
      'mg'              => $mg,
      'ma'              => $ma,
      'mm'              => $mm,
      'em'              => $em,
      'dirut'           => $dirut
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
    INNER JOIN users ON users.id_user = detail_pengajuan_barang_temp.approval
    WHERE detail_pengajuan_barang_temp.id_user = '$id_user' ");
  }

  public function getDataPengajuanBarang(){
  
    return $this->db->query("SELECT
    pengajuan_barang.nobukti,
    pengajuan_barang.nama_lengkap,
    pengajuan_barang.tanggal,
    pengajuan_barang.kode_cabang,
    pengajuan_barang.keterangan,
    pengajuan_barang.foto,
    ga,
    mg,
    ma,
    mm,
    em,
    dirut
    FROM pengajuan_barang
    GROUP BY pengajuan_barang.nobukti
    ");
  }

  public function getDetailPengajuanBarang(){
    
    $nobukti       = $this->input->post('nobukti');
    return $this->db->query("SELECT * FROM detail_pengajuan_barang 
    INNER JOIN master_barang_pembelian ON master_barang_pembelian.kode_barang=detail_pengajuan_barang.kode_barang
    WHERE nobukti = '$nobukti' ");
  }

  public function approvalpengajuan(){

    $nobukti       = str_replace(".","/",$this->uri->segment(3));
    $status         = $this->uri->segment(4);
    $id_user        = $this->session->userdata('id_user');
    $this->db->query("UPDATE detail_pengajuan_barang SET status = '$status'  WHERE nobukti = '$nobukti' AND id_user = '$id_user' ");
    redirect('pengajuan/pengajuanBarang');
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
