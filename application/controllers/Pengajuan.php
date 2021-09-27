<?php

class Pengajuan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_login();
    $this->load->model(array('Model_pengajuan', 'Model_pembelian','Model_cabang','Model_gudanglogistik'));
  }
  function inputPengajuanBarang()
  {
   $this->template->load('template/template', 'pengajuan/inputPengajuanBarang');
  }
  
  function pengajuanBarang()
  {
   $this->template->load('template/template', 'pengajuan/viewPengajuan');
  }

  function jenisPengajuan()
  {
    $jenis_pengajuan          = $this->input->post('jenis_pengajuan');
    $data['data']             = $this->Model_pengajuan->getDataPengajuanBarang($jenis_pengajuan);
    if($jenis_pengajuan == 'Barang'){
    $this->load->view('pengajuan/pengajuanBarang', $data);
    }else if($jenis_pengajuan == 'ATK'){
    $this->load->view('pengajuan/pengajuanATK', $data);
    }else if($jenis_pengajuan == 'Jasa'){
    $this->load->view('pengajuan/pengajuanJasa', $data);
    }else if($jenis_pengajuan == 'Lainnya'){
    $this->load->view('pengajuan/pengajuanLainnya', $data);
    }
  }

  function codeotomatis()
  {

    $tahun    = date('y');
    $bulan    = date('m');
    $this->db->select('right(pengajuan_barang.nobukti,3) as kode ', false);
    $this->db->where('mid(nobukti,5,2)', $bulan);
    $this->db->where('mid(nobukti,7,2)', $tahun);
    $this->db->order_by('nobukti', 'desc');
    $this->db->limit('13');
    $query    = $this->db->get('pengajuan_barang');
    if ($query->num_rows() <> 0) {
      $data   = $query->row();
      $kode   = intval($data->kode) + 1;
    } else {
      $kode   = 1;
    }
    $kodemax  = str_pad($kode, 3, "0", STR_PAD_LEFT);
    $kodejadi   = "PBC/" . $bulan . "" . $tahun . "/" . $kodemax;
    echo $kodejadi;
  }

  function tabelbarang()
  {

    $this->load->view('pengajuan/tabelbarang');
  }

  function detailPengajuanBarang()
  {
    $data['data']    = $this->Model_pengajuan->getPengajuanBarang()->row_array();
    $this->load->view('pengajuan/detailPengajuanBarang', $data);
  }

  function insertPengajuanBarang()
  {

    $this->Model_pengajuan->insertPengajuanBarang();
  }

  function inputDetailPengajuanBarangTemp()
  {

    $this->Model_pengajuan->inputDetailPengajuanBarangTemp();
  }

  function approvalpengajuan()
  {

    $this->Model_pengajuan->approvalpengajuan();
  }

  function hapusPengajuanBarang()
  {

    $this->Model_pengajuan->hapusPengajuanBarang();
  }

  
  function view_komentar(){
      
    $data['cabang']             = $this->session->userdata('cabang');
    $nobukti                    = str_replace(".","/",$this->uri->segment(3));
    $data['detail']             = $this->Model_pengajuan->getPengajuan($nobukti)->row_array();
    $this->template->load('template/template', 'pengajuan/view_komentar',$data);
  }

  function viewChat(){
      
    $data['data']    = $this->Model_pengajuan->viewChat()->result();
    $this->load->view('pengajuan/view_chat',$data);
  }
  
  function input_komentar(){

    $this->Model_pengajuan->input_komentar();
  }
    
}
