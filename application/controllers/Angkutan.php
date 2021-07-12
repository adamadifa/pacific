<?php

class Angkutan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_login();
    $this->load->model(array('Model_angkutan','Model_pembelian'));
  }

  function index($rowno = 0)
  {

    $no_surat_jalan           = "";
    $tgl_mutasi_gudang        = "";

    if ($this->input->post('submit') != NULL) {
      $no_surat_jalan                   = $this->input->post('no_surat_jalan');
      $tgl_mutasi_gudang                = $this->input->post('tgl_mutasi_gudang');
      $data   = array(
        'no_surat_jalan'                => $no_surat_jalan,
        'tgl_mutasi_gudang'             => $tgl_mutasi_gudang,
      );
      $this->session->set_userdata($data);
    } else {

      if ($this->session->userdata('no_surat_jalan') != NULL) {
        $no_surat_jalan = $this->session->userdata('no_surat_jalan');
      }

      if ($this->session->userdata('tgl_mutasi_gudang') != NULL) {
        $tgl_mutasi_gudang = $this->session->userdata('tgl_mutasi_gudang');
      }
    }
    $rowperpage = 10;
    if ($rowno != 0) {
      $rowno = ($rowno - 1) * $rowperpage;
    }
    $allcount                     = $this->Model_angkutan->getrecordAngkutanCount($no_surat_jalan, $tgl_mutasi_gudang);
    $users_record                 = $this->Model_angkutan->getDataAngkutan($rowno, $rowperpage, $no_surat_jalan, $tgl_mutasi_gudang);
    $config['base_url']           = base_url() . 'angkutan/index';
    $config['use_page_numbers']   = TRUE;
    $config['total_rows']         = $allcount;
    $config['per_page']           = $rowperpage;
    $config['first_link']         = 'First';
    $config['last_link']          = 'Last';
    $config['next_link']          = 'Next';
    $config['prev_link']          = 'Prev';
    $config['full_tag_open']      = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']     = '</ul></nav></div>';
    $config['num_tag_open']       = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']      = '</span></li>';
    $config['cur_tag_open']       = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']      = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']      = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']    = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']      = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']    = '</span>Next</li>';
    $config['first_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close']   = '</span></li>';
    $config['last_tag_open']      = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']    = '</span></li>';
    $this->pagination->initialize($config);
    $data['pagination']           = $this->pagination->create_links();
    $data['result']               = $users_record;
    $data['row']                  = $rowno;
    $data['no_surat_jalan']       = $no_surat_jalan;
    $data['tgl_mutasi_gudang']    = $tgl_mutasi_gudang;
    $this->template->load('template/template', 'angkutan/view_angkutan', $data);
  }

  
  function kontrabon($rowno = 0)
  {

    $no_kontrabon           = "";
    $tgl_kontrabon        = "";

    if ($this->input->post('submit') != NULL) {
      $no_kontrabon                   = $this->input->post('no_kontrabon');
      $tgl_kontrabon                = $this->input->post('tgl_kontrabon');
      $data   = array(
        'no_kontrabon'                => $no_kontrabon,
        'tgl_kontrabon'             => $tgl_kontrabon,
      );
      $this->session->set_userdata($data);
    } else {

      if ($this->session->userdata('no_kontrabon') != NULL) {
        $no_kontrabon = $this->session->userdata('no_kontrabon');
      }

      if ($this->session->userdata('tgl_kontrabon') != NULL) {
        $tgl_kontrabon = $this->session->userdata('tgl_kontrabon');
      }
    }
    $rowperpage = 10;
    if ($rowno != 0) {
      $rowno = ($rowno - 1) * $rowperpage;
    }
    $allcount                     = $this->Model_angkutan->getrecordKontrabonCount($no_kontrabon, $tgl_kontrabon);
    $users_record                 = $this->Model_angkutan->getDataKontrabon($rowno, $rowperpage, $no_kontrabon, $tgl_kontrabon);
    $config['base_url']           = base_url() . 'angkutan/kontrabon';
    $config['use_page_numbers']   = TRUE;
    $config['total_rows']         = $allcount;
    $config['per_page']           = $rowperpage;
    $config['first_link']         = 'First';
    $config['last_link']          = 'Last';
    $config['next_link']          = 'Next';
    $config['prev_link']          = 'Prev';
    $config['full_tag_open']      = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']     = '</ul></nav></div>';
    $config['num_tag_open']       = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']      = '</span></li>';
    $config['cur_tag_open']       = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']      = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']      = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']    = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']      = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']    = '</span>Next</li>';
    $config['first_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close']   = '</span></li>';
    $config['last_tag_open']      = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']    = '</span></li>';
    $this->pagination->initialize($config);
    $data['pagination']           = $this->pagination->create_links();
    $data['result']               = $users_record;
    $data['row']                  = $rowno;
    $data['no_kontrabon']         = $no_kontrabon;
    $data['tgl_kontrabon']        = $tgl_kontrabon;
    $this->template->load('template/template', 'angkutan/view_kontrabon', $data);
  }


  function codeotomatis()
  {

    $tahun    = date('y');
    $bulan    = date('m');
    $this->db->select('right(kontrabon_angkutan.no_kontrabon,3) as kode ', false);
    $this->db->where('mid(no_kontrabon,4,2)', $bulan);
    $this->db->where('mid(no_kontrabon,6,2)', $tahun);
    $this->db->order_by('no_kontrabon', 'desc');
    $this->db->limit('13');
    $query    = $this->db->get('kontrabon_angkutan');
    if ($query->num_rows() <> 0) {
      $data   = $query->row();
      $kode   = intval($data->kode) + 1;
    } else {
      $kode   = 1;
    }
    $kodemax  = str_pad($kode, 3, "0", STR_PAD_LEFT);
    $kodejadi   = "KA/" . $bulan . "" . $tahun . "/" . $kodemax;
    echo $kodejadi;
  }

  function detailkontrabon()
  {
    $data['detail']       = $this->Model_angkutan->getDetailAngkutan()->result();
    $data['data']         = $this->Model_angkutan->getAngkutan()->row_array();
    $data['bank']           = $this->Model_pembelian->getBank()->result();
    $this->template->load('template/template', 'angkutan/detail_kontrabon',$data);
  }
  
  function input_kontrabon()
  {
    $this->template->load('template/template', 'angkutan/input_kontrabon');
  }

  function getDetailAngkutan()
  {
    $data['detail']       = $this->Model_angkutan->getDetailAngkutan()->result();
    $this->load->view('angkutan/view_detail_kontrabon',$data);
  }

  function getDetailAngkutanCount()
  {
    $this->Model_angkutan->getDetailAngkutanCount()->num_rows();
  }

  public function simpan(){

    $this->Model_angkutan->insert_angkutan();
  }

  public function insert_ledger(){

    $this->Model_angkutan->insert_ledger();
  }

  public function hapuskontrabon(){

    $this->Model_angkutan->hapuskontrabon();
  }
  public function input_detail(){

    $this->Model_angkutan->insert_detail();
  }
  
  public function insert_kontrabon(){

    $this->Model_angkutan->insert_kontrabon();
  }

  public function hapusangkutan(){

    $this->Model_angkutan->hapusangkutan();
  }

  public function bayar(){

    $this->Model_angkutan->bayar();
  }
  
  public function hapus_detailkontrabon(){

    $this->Model_angkutan->hapus_detailkontrabon();
  }


  function tabelsuratjalan()
  {

    $this->load->view('angkutan/tabelsuratjalan');
  }
  
  function jsonPilihSuratJalan()
  {
    header('Content-Type: application/json');
    echo $this->Model_angkutan->jsonPilihSuratJalan();
  }

}
