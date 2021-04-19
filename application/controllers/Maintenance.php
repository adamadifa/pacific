<?php

class Maintenance extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    check_login();
    $this->load->model(array('Model_maintenance'));
  }

  function view_maintenance($rowno = 0)
  {
    $status   = "";
    $dari     = "";
    $sampai   = "";
    if ($this->input->post('submit') != NULL) {
      $status   = $this->input->post('status');
      $dari     = $this->input->post('dari');
      $sampai   = $this->input->post('sampai');

      $data     = array(
        'status'     => $status,
        'dari'       => $dari,
        'sampai'     => $sampai
      );
      $this->session->set_userdata($data);
    } else {
      if ($this->session->userdata('status') != NULL) {
        $status = $this->session->userdata('status');
      }
      if ($this->session->userdata('dari') != NULL) {
        $dari = $this->session->userdata('dari');
      }
      if ($this->session->userdata('sampai') != NULL) {
        $sampai = $this->session->userdata('sampai');
      }
    }

    $data['dari']               = $dari;
    $data['sampai']             = $sampai;
    $data['status']             = $status;
    $data['level']              = $this->session->userdata('level_user');
    $data['result']             = $this->Model_maintenance->getDataMaintenance($dari, $sampai, $status);
    $this->template->load('template/template', 'maintenance/view_maintenance', $data);
  }

  function input_maintenance(){
      
    $data['cabang']             = $this->session->userdata('cabang');
    $this->template->load('template/template', 'maintenance/input_maintenance',$data);
  }

  function view_komentar(){
      
    $data['cabang']             = $this->session->userdata('cabang');
    $this->template->load('template/template', 'maintenance/view_komentar',$data);
  }

  function viewChat(){
      
    $data['result']    = $this->Model_maintenance->viewChat();
    $this->load->view('maintenance/view_chat',$data);
  }
  
  function insert_maintnanace(){

    $this->Model_maintenance->insert_maintnanace();
    redirect('maintenance/view_maintenance');
      
  }
  
  function input_komentar(){

    $this->Model_maintenance->input_komentar();
      
  }
  
  function approvemanager(){

    $this->Model_maintenance->approvemanager();
    redirect('maintenance/view_maintenance');
      
  }
  
  function hapusmaintenance(){

    $this->Model_maintenance->hapusmaintenance();
    redirect('maintenance/view_maintenance');
      
  }

  function detail_maintenance()
  {
    $kode_pengajuan            = $this->input->post('kode_pengajuan');
    $data['detail']     = $this->Model_maintenance->getDetailMaintenance($kode_pengajuan)->row_array();
    $this->load->view('maintenance/detail', $data);
  }
  

}
