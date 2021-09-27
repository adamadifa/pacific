<?php

class Model_pengajuan extends CI_Model
{

  public function insertPengajuanBarang(){

    $id_user        = $this->session->userdata('id_user');
    $nobukti        = $this->input->post('nobukti');
    $keterangan     = $this->input->post('keterangan');
    $nama_pemohon   = $this->input->post('nama_pemohon');
    $tanggal        = $this->input->post('tanggal');
    $foto           = $this->input->post('foto');
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
      'id_user'         => $id_user,
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

  public function getDataPengajuanBarang($jenis_pengajuan){

    $id_user        = $this->session->userdata('id_user');
  
    if($jenis_pengajuan != ""){
      $jenis_pengajuan  = "WHERE keterangan = '".$jenis_pengajuan."' "; 
    }

    if($id_user == "6" OR $id_user == "5" OR $id_user == "244" OR $id_user == "10" OR $id_user == "11" OR $id_user == "73"){
      $id_user  = ""; 
    }else{
      $id_user  = "AND id_user = '".$id_user."' "; 
    }
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
    FROM pengajuan_barang " 
    .$jenis_pengajuan
    .$id_user
    ."
    GROUP BY pengajuan_barang.nobukti
    ");
  }

  public function getPengajuan($nobukti){
    
    return $this->db->query("SELECT * FROM pengajuan_barang 
    WHERE nobukti = '$nobukti' ");
  }

  public function approvalpengajuan(){

    $nobukti        = str_replace(".","/",$this->uri->segment(3));
    $status         = $this->uri->segment(4);
    $id_user        = $this->session->userdata('id_user');

    if($id_user == '244'){
      return $this->db->query("UPDATE pengajuan_barang SET ga = '$status'  WHERE nobukti = '$nobukti' ");
    }else if($id_user == '6'){
      return $this->db->query("UPDATE pengajuan_barang SET ma = '$status'  WHERE nobukti = '$nobukti' ");
    }else if($id_user == '5'){
      return $this->db->query("UPDATE pengajuan_barang SET mm = '$status'  WHERE nobukti = '$nobukti' ");
    }else if($id_user == '10'){
      return $this->db->query("UPDATE pengajuan_barang SET em = '$status'  WHERE nobukti = '$nobukti' ");
    }else if($id_user == '11'){
      return $this->db->query("UPDATE pengajuan_barang SET dirut = '$status'  WHERE nobukti = '$nobukti' ");
    }else if($id_user == '73'){
      return $this->db->query("UPDATE pengajuan_barang SET mg = '$status'  WHERE nobukti = '$nobukti' ");
    }
  }

  public function getPengajuanBarang(){
  
    $nobukti       = $this->input->post('nobukti');
    return $this->db->query("SELECT * FROM  pengajuan_barang WHERE nobukti = '$nobukti' ");
  }
  
  public function hapusPengajuanBarang(){
    
    $nobukti       = str_replace(".","/",$this->uri->segment(3));
    $this->db->query("DELETE FROM pengajuan_barang WHERE nobukti = '$nobukti' ");
    redirect('pengajuan/pengajuanBarang');
  }

  function input_komentar()
  {

    $komentar             = $this->input->post('komentar');
    $kode_maintenance     = $this->input->post('kode_maintenance');
    $id_user              = $this->session->userdata('id_user');
    $tanggal              = date('Y-m-d H:i:s');
   
    $data             = array(
      'komentar'                => $komentar,
      'kode_maintenance'        => $kode_maintenance,
      'id_user'                 => $id_user,
      'tanggal'                 => $tanggal
    );
    $this->db->insert('komentar', $data);
  }
  
  function viewChat()
  {
    $kode_maintenance     = $this->input->post('kode_maintenance');
    return $this->db->query("SELECT * FROM komentar INNER JOIN users ON users.id_user=komentar.id_user WHERE kode_maintenance = '$kode_maintenance'  ");
    
  }

}
