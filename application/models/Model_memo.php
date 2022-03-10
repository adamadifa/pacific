<?php
class Model_memo extends CI_Model
{
    public function getDatamemo()
    {
        $level = $this->session->userdata('level_user');

        if ($level == "Administrator") {
            $this->db->order_by('tanggal,id', 'desc');
            $this->db->join('users', 'memo.id_user = users.id_user');
            return $this->db->get('memo');
        } else {
            $id_user = $this->session->userdata('id_user');
            $this->db->where('memo_access.id_user', $id_user);
            $this->db->order_by('tanggal,memo_access.id', 'desc');
            $this->db->join('memo', 'memo_access.id = memo.id');
            $this->db->join('users', 'memo.id_user = users.id_user');
            return $this->db->get('memo_access');
        }
    }

    public function  insertmemo()
    {
        $id_user = $this->session->userdata('id_user');
        $no_memo = $this->input->post('no_memo');
        $tanggal = $this->input->post('tanggal');
        $judul_memo = $this->input->post('judul_memo');
        $kode_dept = $this->input->post('kode_dept');
        $link = $this->input->post('link');
        $data = [
            'no_memo' => $no_memo,
            'tanggal' => $tanggal,
            'judul_memo' => $judul_memo,
            'kode_dept' => $kode_dept,
            'link' => $link,
            'id_user' => $id_user
        ];

        if ($kode_dept == "MKT") {
            $level = "manager marketing";
        } else if ($kode_dept == "ACC") {
            $level = "manager accounting";
        } else if ($kode_dept == "KEU") {
            $level = "manager keuangan";
        } else if ($kode_dept == "PMB") {
            $level = "manager pembelian";
        } else if ($kode_dept == "GAF") {
            $level = "manager ga";
        } else if ($kode_dept == "PRD") {
            $level = "admin produksi";
        } else if ($kode_dept == "GDG") {
            $level = "admin gudang pusat";
        } else if ($kode_dept == "MTC") {
            $level = "manager mtc";
        }



        $datauser = $this->db->get_where('users', array('level' => $level))->result();
        $this->db->trans_begin();

        $this->db->insert('memo', $data);

        $qcekmemo = "SELECT id FROM memo ORDER BY id DESC LIMIT 1";
        $cekmemo = $this->db->query($qcekmemo)->row_array();
        $id = $cekmemo['id'];

        $datauseruploaded = [
            'id' => $id,
            'id_user' => $id_user
        ];
        $this->db->insert('memo_access', $datauseruploaded);
        foreach ($datauser as $d) {
            $datauseraccess = [
                'id' => $id,
                'id_user' => $d->id_user
            ];
            $this->db->insert('memo_access', $datauseraccess);
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata(
                'msg',
                '<div class="alert bg-danger text-white alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-check"></i> Data Memo Gagal Disimpan !
                </div>'
            );
            redirect('memo/index');
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata(
                'msg',
                '<div class="alert bg-green text-white alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-check"></i> Data Berhasil Disimpan !
                </div>'
            );
            redirect('memo/index');
        }
    }

    public function getMemo($id)
    {
        return $this->db->get_where('memo', array('id' => $id));
    }

    public function update()
    {
        $id = $this->input->post('id');
        $no_memo = $this->input->post('no_memo');
        $tanggal = $this->input->post('tanggal');
        $judul_memo = $this->input->post('judul_memo');
        $kode_dept = $this->input->post('kode_dept');
        $link = $this->input->post('link');
        $data = [
            'no_memo' => $no_memo,
            'tanggal' => $tanggal,
            'judul_memo' => $judul_memo,
            'kode_dept' => $kode_dept,
            'link' => $link,
        ];

        $update = $this->db->update('memo', $data, array('id' => $id));
        if ($update) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert bg-green text-white alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-check"></i> Data Berhasil Diupdate !
                </div>'
            );
            redirect('memo/index');
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert bg-danger text-white alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-check"></i> Data Memo Gagal Diupdate !
                </div>'
            );
            redirect('memo/index');
        }
    }

    public function hapus($id)
    {
        $hapus = $this->db->delete('memo', array('id' => $id));
        if ($hapus) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert bg-green text-white alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-check"></i> Data Berhasil Dihapus !
                </div>'
            );
            redirect('memo/index');
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert bg-danger text-white alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-check"></i> Data Memo Gagal Dihapus !
                </div>'
            );
            redirect('memo/index');
        }
    }

    public function getUser($id)
    {
        $query = "SELECT users.id_user,nama_lengkap,level,memoaccess.id_user as cekuser,cabang
        FROM users
        LEFT JOIN (
            SELECT id_user FROM memo_access WHERE id = '$id'
        ) memoaccess ON (users.id_user = memoaccess.id_user)
        ";

        return $this->db->query($query);
    }

    public function updateaccess($id, $iduser)
    {
        $data = [
            'id' => $id,
            'id_user' => $iduser
        ];
        $cek = $this->db->get_where('memo_access', array('id' => $id, 'id_user' => $iduser))->num_rows();

        if (empty($cek)) {
            $this->db->insert('memo_access', $data);
            return 1;
        } else {
            $this->db->delete('memo_access', array('id' => $id, 'id_user' => $iduser));
            return 2;
        }
    }
}
