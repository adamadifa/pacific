<?php

class Angkutan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_login();
    $this->load->model(array('Model_angkutan'));
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

  public function simpan(){

    $this->Model_angkutan->insert_angkutan();
  }

  public function hapusangkutan(){

    $this->Model_angkutan->hapusangkutan();
  }

  public function kontrabon(){

    $this->Model_angkutan->kontrabon();
  }

  public function bayar(){

    $this->Model_angkutan->bayar();
  }

  public function batalKontrabon(){

    $this->Model_angkutan->batalKontrabon();
  }
}
