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
        $id_user = $this->session->userdata('id_user');
        $roleadd = ['Administrator', 'manager marketing', 'manager accounting', 'manager keuangan', 'manager pembelian', 'manager ga', 'admin produksi', 'admin gudang pusat', 'manager mtc', 'crm', 'audit'];
        $roleuser = ['28', '12', '140', '12071', '12068', '12067', '61', '82', '81', '85', '12072'];
        $data['roleadd'] = $roleadd;
        $data['roleuser'] = $roleuser;
        $data['level'] = $level;
        $data['id_user'] = $id_user;
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

    public function downloadcount()
    {
        $id = $this->input->post('id');
        $id_user = $this->session->userdata('id_user');
        $cek = $this->db->query("SELECT * FROM memo_download WHERE id='$id' AND id_user='$id_user'")->num_rows();
        if (empty($cek)) {
            $data = [
                'id' => $id,
                'id_user' => $id_user
            ];

            $this->db->insert('memo_download', $data);
        }
    }

    public function listdownload()
    {
        $id = $this->input->post('id');
        $this->db->join('users', 'memo_download.id_user = users.id_user');
        $data['download'] = $this->db->get_where('memo_download', array('id' => $id))->result();
        $this->load->view('memo/listdownload', $data);
    }
}
