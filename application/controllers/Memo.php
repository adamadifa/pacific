<?php
class Memo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model(array('Model_memo'));
    }

    public function index()
    {

        $level = $this->session->userdata('level_user');
        $roleadd = ['Administrator', 'manager marketing', 'manager accounting', 'manager keuangan', 'manager pembelian', 'manager ga', 'admin produksi', 'admin gudang pusat', 'manager mtc'];
        $data['roleadd'] = $roleadd;
        $data['level'] = $level;
        $data['result'] = $this->Model_memo->getDataMemo()->result();
        $this->template->load('template/template', 'memo/index', $data);
    }

    public function inputmemo()
    {
        $this->template->load('template/template', 'memo/input');
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $data['memo'] = $this->Model_memo->getMemo($id)->row_array();
        $this->template->load('template/template', 'memo/edit', $data);
    }

    public function insert()
    {
        $this->Model_memo->insertmemo();
    }

    public function update()
    {
        $this->Model_memo->update();
    }

    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->Model_memo->hapus($id);
    }

    public function getuser()
    {
        $id = $this->input->post('id');
        $data['user'] = $this->Model_memo->getUser($id)->result();
        $data['id'] = $id;
        $this->load->view('memo/getuser', $data);
    }

    public function updateaccess()
    {
        $id = $this->input->post('id');
        $iduser = $this->input->post('iduser');
        echo $this->Model_memo->updateaccess($id, $iduser);
    }
}
