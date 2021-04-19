<?php

class Model_maintenance extends CI_Model
{
  public function getDataMaintenance($dari = "", $sampai = "", $status = "")
  {

    $this->db->select('*,maintenance.id_user');
    $this->db->from('maintenance');
    $this->db->join('users','maintenance.id_admin=users.id_user','left');
    $this->db->order_by('kode_pengajuan', 'desc');

    $level          = $this->session->userdata('level_user');
    $id_user        = $this->session->userdata('id_user');
    if($level != "manager accounting" && $level != "Administrator"){
      $this->db->where('maintenance.id_user', $id_user);
    }

    if ($dari !=  '') {
      $this->db->where('tanggal_pengajuan >=', $dari);
    }
    if ($sampai !=  '') {
      $this->db->where('tanggal_pengajuan <=', $sampai);
    }
    if ($status != '') {
      $this->db->where('maintenance.status', $status);
    }

    $this->db->limit(20);
    $query = $this->db->get();
    return $query->result_array();
  }

  function insert_maintnanace()
  {

    $departemen           = $this->input->post('departemen');
    $nama_pemohon         = $this->input->post('nama_pemohon');
    $jenis_permohonan     = $this->input->post('jenis_permohonan');
    $tanggal_pengajuan    = $this->input->post('tanggal_pengajuan');
    $keterangan           = $this->input->post('keterangan');
    $id_user              = $this->session->userdata('id_user');

    $this->db->select('right(maintenance.kode_pengajuan,4) as kode ', false);
    $this->db->order_by('kode_pengajuan', 'desc');
    $this->db->limit('1');
    $query    = $this->db->get('maintenance');
    if ($query->num_rows() <> 0) {
      $data   = $query->row();
      $kode   = intval($data->kode) + 1;
    } else {
      $kode   = 1;
    }
    $kodemax  = str_pad($kode, 4, "0", STR_PAD_LEFT);
    $kodejadi   = "MNT-".$kodemax;

   
    $data             = array(
      'kode_pengajuan'          => $kodejadi,
      'departemen'              => $departemen,
      'nama_pemohon'            => $nama_pemohon,
      'jenis_permohonan'        => $jenis_permohonan,
      'keterangan'              => $keterangan,
      'tanggal_pengajuan'       => $tanggal_pengajuan,
      'id_user'                 => $id_user,
      'status'                  => "0"
    );
    $this->db->insert('maintenance', $data);
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

  function approvemanager()
  {

    $kode_pengajuan       = $this->uri->segment(3);
    $status               = $this->uri->segment(4);
    if($status == "3"){
      $tanggal_selesai      = date('Y-m-d H:i:s');
      $id_user = $this->session->userdata('id_user');
  }else if($status == "0"){
      $id_user              = "NULL";
      $tanggal_selesai      = "NULL";
    }

    $data             = array(
      'id_admin'              => $id_user,
      'status'                => $status,
      'tanggal_selesai'       => $tanggal_selesai
    );
    $this->db->where('kode_pengajuan', $kode_pengajuan);
    $this->db->update('maintenance', $data);
  }

  function getDetailMaintenance($kode_pengajuan)
  {

    return $this->db->query("SELECT * FROM maintenance WHERE kode_pengajuan = '$kode_pengajuan' ");
    
  }

  function viewChat()
  {

    $kode_maintenance     = $this->input->post('kode_maintenance');
    return $this->db->query("SELECT * FROM komentar WHERE kode_maintenance = '$kode_maintenance' ");
    
  }

  function hapusmaintenance()
  {

    $kode_pengajuan       = $this->uri->segment(3);
    return $this->db->query("DELETE FROM maintenance WHERE kode_pengajuan = '$kode_pengajuan' ");
    
  }


}
