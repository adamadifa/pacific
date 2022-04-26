<?php
class Komisi extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_login();
    $this->load->Model(array('Model_cabang', 'Model_komisi', 'Model_sales', 'Model_barang', 'Model_laporanpenjualan', 'Model_penjualan'));
  }

  function targetkomisi()
  {
    $data['cabang'] = $this->Model_cabang->view_cabang()->result();
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $this->template->load('template/template', 'komisi/komisi_target', $data);
  }

  function approvle_targetkomisi()
  {
    $data['cabang'] = $this->Model_cabang->view_cabang()->result();
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $this->template->load('template/template', 'komisi/approvle_targetkomisi', $data);
  }

  function settarget()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $thn = substr($tahun, 2, 2);
    $data = [
      'kode_target' => "TK" . $bulan . $thn,
      'bulan' => $bulan,
      'tahun' => $tahun
    ];
    $settarget = $this->Model_komisi->settarget($data);
    echo $settarget;
  }

  function loadtarget()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $data['target'] = $this->Model_komisi->loadtarget($bulan, $tahun)->result();
    $this->load->view('komisi/komisi_loadtarget', $data);
  }

  function loadapprovletarget()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $data['target'] = $this->Model_komisi->loadapprovletarget($bulan, $tahun)->result();
    $this->load->view('komisi/komisi_loadapprovletarget', $data);
  }

  function inputsettarget()
  {
    $kodetarget = $this->input->post('kodetarget');
    $data['kodetarget'] = $kodetarget;
    $data['produk']  = $this->Model_barang->getMasterproduk()->result();
    $data['jmlproduk']  = $this->Model_barang->getMasterproduk()->num_rows();
    $data['cabang'] = $this->Model_cabang->view_cabang()->result();
    $this->load->view('komisi/komisi_inputsettarget', $data);
  }

  function detailsettarget()
  {
    $kodetarget = $this->input->post('kodetarget');
    $data['kodetarget'] = $kodetarget;
    $data['produk']  = $this->Model_barang->getMasterproduk()->result();
    $data['jmlproduk']  = $this->Model_barang->getMasterproduk()->num_rows();
    $data['cabang'] = $this->Model_cabang->view_cabang()->result();
    $this->load->view('komisi/komisi_detailsettarget', $data);
  }

  function inputsettargetcashin()
  {
    $kodetarget = $this->input->post('kodetarget');
    $data['kodetarget'] = $kodetarget;
    $data['produk']  = $this->Model_barang->getMasterproduk()->result();
    $data['jmlproduk']  = $this->Model_barang->getMasterproduk()->num_rows();
    $data['cabang'] = $this->Model_cabang->view_cabang()->result();
    $this->load->view('komisi/komisi_inputsettargetcashin', $data);
  }

  function inputsettargetcollection()
  {
    $kodetarget = $this->input->post('kodetarget');
    $data['kodetarget'] = $kodetarget;
    $data['produk']  = $this->Model_barang->getMasterproduk()->result();
    $data['jmlproduk']  = $this->Model_barang->getMasterproduk()->num_rows();
    $data['cabang'] = $this->Model_cabang->view_cabang()->result();
    $this->load->view('komisi/komisi_inputsettargetcollection', $data);
  }

  function detailsettargetcashin()
  {
    $kodetarget = $this->input->post('kodetarget');
    $data['kodetarget'] = $kodetarget;
    $data['produk']  = $this->Model_barang->getMasterproduk()->result();
    $data['jmlproduk']  = $this->Model_barang->getMasterproduk()->num_rows();
    $data['cabang'] = $this->Model_cabang->view_cabang()->result();
    $this->load->view('komisi/komisi_detailsettargetcashin', $data);
  }


  function loaddetailtarget()
  {
    $kodetarget = $this->input->post('kodetarget');
    $cabang = $this->input->post('cabang');
    $data['kodetarget'] = $kodetarget;
    $data['produk']  = $this->Model_barang->getMasterproduk()->result();
    $data['salesman'] = $this->Model_laporanpenjualan->get_salesman($cabang)->result();
    $this->load->view('komisi/komisi_loaddetailtarget', $data);
  }

  function loaddetailtargetcashin()
  {
    $kodetarget = $this->input->post('kodetarget');
    $cabang = $this->input->post('cabang');
    $data['kodetarget'] = $kodetarget;
    $data['salesman'] = $this->Model_laporanpenjualan->get_salesman($cabang)->result();
    $this->load->view('komisi/komisi_loaddetailtargetcashin', $data);
  }

  function loadlisttarget()
  {
    $kodetarget = $this->input->post('kodetarget');
    $cabang = $this->input->post('cabang');
    $data['kodetarget'] = $kodetarget;
    $data['produk']  = $this->Model_barang->getMasterproduk()->result();
    $data['salesman'] = $this->Model_laporanpenjualan->get_salesman($cabang)->result();
    $this->load->view('komisi/komisi_loadlisttarget', $data);
  }

  function loadlisttargetcashin()
  {
    $kodetarget = $this->input->post('kodetarget');
    $cabang = $this->input->post('cabang');
    $data['kodetarget'] = $kodetarget;
    $data['salesman'] = $this->Model_laporanpenjualan->get_salesman($cabang)->result();
    $this->load->view('komisi/komisi_loadlisttargetcashin', $data);
  }

  function loadlisttargetcollection()
  {
    $kodetarget = $this->input->post('kodetarget');
    $cabang = $this->input->post('cabang');
    $data['kodetarget'] = $kodetarget;
    $data['salesman'] = $this->Model_laporanpenjualan->get_salesman($cabang)->result();
    $this->load->view('komisi/komisi_loadlisttargetcollection', $data);
  }

  function insertapprovlekomisi()
  {
    $kode_target = $this->input->post('kode_target');
    $approve     = $this->input->post('approve');
    $status     = $this->input->post('status');
    $level      = $this->input->post('level');
    if ($level == 'kepala admin') {
      $data = array(
        'status'  => $status,
        'ka'      => $approve
      );
    } else if ($level == 'kepala cabang') {
      $data = array(
        'status'  => $status,
        'kp'      => $approve
      );
    } else if ($level == 'manager marketing') {
      $data = array(
        'status'  => $status,
        'mm'      => $approve
      );
    } else if ($level == 'general manager') {
      $data = array(
        'status'  => $status,
        'em'      => $approve
      );
    } else if ($level == 'Administrator') {
      $data = array(
        'status'  => $status,
        'dr'      => $approve
      );
    } else if ($approve == '2') {
      $data = array(
        'status'  => $status,
        'ka'      => '2',
        'kp'      => '',
        'mm'      => '',
        'em'      => '',
        'dr'      => '',
      );
    }

    $this->db->where('kode_target', $kode_target);
    $this->db->update('komisi_target', $data);
  }

  function simpantarget()
  {
    $kodetarget = $this->input->post('kodetarget');
    $salesman = $this->input->post('salesman');
    $produk = $this->input->post('produk');
    $jmltarget = $this->input->post('jmltarget');
    $id_user = $this->session->userdata('id_user');
    $data = [
      'kode_target' => $kodetarget,
      'id_karyawan' => $salesman,
      'kode_produk' => $produk,
      'jumlah_target' => $jmltarget,
      'id_user' => $id_user
    ];

    $simpan = $this->Model_komisi->simpantarget($data);
  }

  function simpantargetcashin()
  {
    $kodetarget = $this->input->post('kodetarget');
    $salesman = $this->input->post('salesman');
    $jmltarget = $this->input->post('jmltarget');
    $id_user = $this->session->userdata('id_user');
    $data = [
      'kode_target' => $kodetarget,
      'id_karyawan' => $salesman,
      'jumlah_target_cashin' => $jmltarget,
      'id_user' => $id_user
    ];

    $simpan = $this->Model_komisi->simpantargetcashin($data);
  }

  function simpantargetcollection()
  {
    $kodetarget = $this->input->post('kodetarget');
    $salesman = $this->input->post('salesman');
    $jmltarget = $this->input->post('jmltarget');
    $id_user = $this->session->userdata('id_user');
    $data = [
      'kode_target' => $kodetarget,
      'id_karyawan' => $salesman,
      'jumlah_target_collection' => $jmltarget,
      'id_user' => $id_user
    ];

    $simpan = $this->Model_komisi->simpantargetcollection($data);
  }

  function targetcashin()
  {
    $data['cabang'] = $this->Model_cabang->view_cabang()->result();
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $this->template->load('template/template', 'komisi/komisi_targetcashin', $data);
  }

  function kategoripoinqty()
  {
    $data['kategoripoin'] = $this->Model_komisi->getKategoripoin()->result();
    $this->template->load('template/template', 'komisi/komisi_kategoripoinqty', $data);
  }

  function laporankomisi()
  {
    $data['cb']    = $this->session->userdata('cabang');
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $data['cabang'] = $this->Model_cabang->view_cabang()->result();
    $this->template->load('template/template', 'komisi/laporan/komisi', $data);
  }

  function insentif()
  {
    $data['cb']    = $this->session->userdata('cabang');
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $this->template->load('template/template', 'komisi/laporan/insentif', $data);
  }

  function laporankomisi2()
  {
    $data['cb']    = $this->session->userdata('cabang');
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $data['cabang'] = $this->Model_cabang->view_cabang()->result();
    $this->template->load('template/template', 'komisi/laporan/komisi2', $data);
  }

  function cetak_komisi()
  {
    $cabang = $this->input->post('cabang');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $aturankomisi = $this->input->post('aturankomisi');
    $dari = $tahun . "-" . $bulan . "-01";
    $ceknextbulan     = $this->Model_laporanpenjualan->cekNextBulan($cabang, $bulan, $tahun)->row_array();
    $tglnextbulan     = $ceknextbulan['tgl_diterimapusat'];
    if (empty($tglnextbulan)) {
      $end = date("Y-m-t", strtotime($dari));
    } else {
      $end = $ceknextbulan['tgl_diterimapusat'];
    }


    $data['cabang'] = $cabang;
    $data['bln'] = $bulan;
    $data['tahun'] = $tahun;
    $data['barang'] = $this->Model_barang->getMasterproduk()->result();
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    //var_dump($data['komisi']);
    //die;
    if (isset($_POST['export'])) {
      // Fungsi header dengan mengirimkan raw data excel
      header("Content-type: application/vnd-ms-excel");

      // Mendefinisikan nama file ekspor "hasil-export.xls"
      header("Content-Disposition: attachment; filename=Laporan Komisi.xls");
    }

    if ($aturankomisi == 1) {
      $data['komisi'] = $this->Model_komisi->cetak_komisi($cabang, $bulan, $tahun, $end)->result();
      $this->load->view('komisi/laporan/cetak_komisi_2', $data);
    } else if ($aturankomisi == 2) {
      $data['driver'] = $this->Model_komisi->driver($cabang, $bulan, $tahun)->result();
      $data['helper'] = $this->Model_komisi->helper($cabang, $bulan, $tahun)->result();
      $data['tunaikredit'] = $this->Model_komisi->tunaikredit($cabang, $bulan, $tahun)->row_array();
      $data['gudang'] = $this->Model_komisi->gudang($cabang, $bulan, $tahun)->result();
      if ($bulan >= 4 && $tahun >= 2022) {
        $data['komisi'] = $this->Model_komisi->cetak_komisi_2april22($cabang, $bulan, $tahun, $end)->result();
        $this->load->view('komisi/laporan/cetak_komisi_april22', $data);
      } else {
        $data['komisi'] = $this->Model_komisi->cetak_komisi_2($cabang, $bulan, $tahun, $end)->result();
        $this->load->view('komisi/laporan/cetak_komisi_2', $data);
      }
    } else if ($aturankomisi == 3) {
      $data['driver'] = $this->Model_komisi->driver($cabang, $bulan, $tahun)->result();
      $data['helper'] = $this->Model_komisi->helper($cabang, $bulan, $tahun)->result();
      $data['tunaikredit'] = $this->Model_komisi->tunaikredit($cabang, $bulan, $tahun)->row_array();
      $data['gudang'] = $this->Model_komisi->gudang($cabang, $bulan, $tahun)->result();
      if ($bulan >= 4 && $tahun >= 2022) {
        $data['komisi'] = $this->Model_komisi->cetak_komisi_3april22($cabang, $bulan, $tahun, $end)->result();
        $this->load->view('komisi/laporan/cetak_komisi_april22', $data);
      } else {
        $data['komisi'] = $this->Model_komisi->cetak_komisi_3($cabang, $bulan, $tahun, $end)->result();
        $this->load->view('komisi/laporan/cetak_komisi_2', $data);
      }
    }
  }

  function cetak_insentif()
  {
    $cabang = $this->input->post('cabang');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $dari = $tahun . "-" . $bulan . "-01";



    $data['cabang'] = $cabang;
    $data['bln'] = $bulan;
    $data['tahun'] = $tahun;
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $data['insentif'] = $this->Model_komisi->cetak_insentif($cabang, $bulan, $tahun)->result();
    //var_dump($data['komisi']);
    //die;
    if (isset($_POST['export'])) {
      // Fungsi header dengan mengirimkan raw data excel
      header("Content-type: application/vnd-ms-excel");

      // Mendefinisikan nama file ekspor "hasil-export.xls"
      header("Content-Disposition: attachment; filename=Laporan Komisi.xls");
    }
    $this->load->view('komisi/laporan/cetak_insentif', $data);
  }


  function cetak_komisi2()
  {
    $cabang = $this->input->post('cabang');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['cabang'] = $cabang;
    $data['bln'] = $bulan;
    $data['tahun'] = $tahun;
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $data['komisi'] = $this->Model_komisi->cetak_komisi2($cabang, $bulan, $tahun)->result();
    //var_dump($data['komisi']);
    //die;
    $this->load->view('komisi/laporan/cetak_komisi2', $data);
  }

  function approvetargetkomisi()
  {
    $tahun = "";
    $bulan = "";
    if (isset($_POST['submit'])) {
      $tahun = $this->input->post('tahun');
      $bulan = $this->input->post('bulan');
      $data   = array(
        'bulan' => $bulan,
        'tahun' => $tahun

      );
      $this->session->set_userdata($data);
    } else {
      if ($this->session->userdata('bulan') != NULL) {
        $bulan = $this->session->userdata('bulan');
      }

      if ($this->session->userdata('tahun') != NULL) {
        $tahun = $this->session->userdata('tahun');
      }
    }
    $data['tahun'] = $tahun;
    $data['bl'] = $bulan;


    $data['cabang'] = $this->Model_cabang->view_cabang()->result();
    $data['bln'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $data['komisicabang'] = $this->Model_komisi->komisicabang($tahun, $bulan)->result();
    $cbg = $this->session->userdata('cabang');
    if ($cbg != 'pusat') {
      $this->template->load('template/template', 'komisi/approve_targetkomisi', $data);
    } else {
      $this->template->load('template/template', 'komisi/approve_targetkomisi_pusat', $data);
    }
  }

  function approvetarget()
  {
    $kode_target = $this->uri->segment(3);
    $kode_cabang = $this->uri->segment(4);
    $update = $this->Model_komisi->approvetarget($kode_target, $kode_cabang);
    if ($update) {
      $this->session->set_flashdata(
        'msg',
        '<div class="alert bg-green text-white alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-check" style="float:left; margin-right:10px"></i> Data Berhasil di Approve !
        </div>'
      );

      redirect('komisi/approvetargetkomisi');
    } else {
      echo "Gagal";
    }
  }

  function approvetargetpusat()
  {
    $kode_target = $this->uri->segment(3);
    $update = $this->Model_komisi->approvetargetpusat($kode_target);
    if ($update == 1) {
      $this->session->set_flashdata(
        'msg',
        '<div class="alert bg-green text-white alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-check" style="float:left; margin-right:10px"></i> Data Berhasil di Approve !
        </div>'
      );

      redirect('komisi/approvetargetkomisi');
    } else {
      $this->session->set_flashdata(
        'msg',
        '<div class="alert bg-danger text-white alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-check" style="float:left; margin-right:10px"></i> Data Gagal di Approve !, Ada Target Cabang Yang Belum Diinput
        </div>'
      );

      redirect('komisi/approvetargetkomisi');
    }
  }

  function canceltarget()
  {
    $kode_target = $this->uri->segment(3);
    $kode_cabang = $this->uri->segment(4);
    $update = $this->Model_komisi->canceltarget($kode_target, $kode_cabang);
    if ($update) {
      $this->session->set_flashdata(
        'msg',
        '<div class="alert bg-green text-white alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-check" style="float:left; margin-right:10px"></i> Data Berhasil di Batalkan !
        </div>'
      );

      redirect('komisi/approvetargetkomisi');
    } else {
      echo "Gagal";
    }
  }

  function canceltargetpusat()
  {
    $kode_target = $this->uri->segment(3);
    $kode_cabang = $this->uri->segment(4);
    $update = $this->Model_komisi->canceltargetpusat($kode_target);
    if ($update) {
      $this->session->set_flashdata(
        'msg',
        '<div class="alert bg-green text-white alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-check" style="float:left; margin-right:10px"></i> Data Berhasil di Batalkan !
        </div>'
      );

      redirect('komisi/approvetargetkomisi');
    } else {
      echo "Gagal";
    }
  }

  function detailtarget()
  {
    $kodetarget = $this->input->post('kodetarget');
    $cabang = $this->input->post('cabang');
    $data['kodetarget'] = $kodetarget;
    $data['target'] = $this->Model_komisi->gettargetkomisi($kodetarget)->result();
    $this->load->view('komisi/komisi_detailtarget', $data);
  }

  function generatetargetcashin()
  {
    $berhasil = 0;
    $gagal = 0;
    $berhasilupdate = 0;
    $gagalupdate = 0;
    $kodetarget = $this->uri->segment(3);
    $generate = $this->Model_komisi->generatetargetcashin($kodetarget);
    foreach ($generate->result() as $g) {

      $kode = $g->kode_target;
      $id_karyawan = $g->id_karyawan;
      $cek = $this->Model_komisi->cekTarget($kode, $id_karyawan)->num_rows();
      $jumlah_cashin = $g->targetcashin;
      if (empty($cek)) {
        $data = [
          'kode_target' => $kode,
          'id_karyawan' => $id_karyawan,
          'jumlah_target_cashin' => $jumlah_cashin
        ];

        $simpantarget = $this->db->insert('komisi_target_cashin_detail', $data);
        if ($simpantarget) {
          $berhasil += 1;
          $gagal += 0;
        } else {
          $berhasil += 0;
          $gagal += 1;
        }
      } else {
        $data = [
          'jumlah_target_cashin' => $jumlah_cashin
        ];

        $updatetarget = $this->db->update('komisi_target_cashin_detail', $data, array('kode_target' => $kode, 'id_karyawan' => $id_karyawan));
        if ($updatetarget) {
          $berhasilupdate += 1;
          $gagalupdate += 0;
        } else {
          $berhasilupdate += 0;
          $gagalupdate += 1;
        }
      }
    }
    $this->session->set_flashdata(
      'msg',
      '<div class="alert bg-green text-white alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="fa fa-info" style="float:left; margin-right:10px"></i> 
          Berhasil Disimpan :' . $berhasil . '<br>
          Berhasil Update :' . $berhasilupdate . '<br>
          Gagal Simpan :' . $gagal . '<br>
          Gagal Update : ' . $gagalupdate . '
      </div>'
    );

    redirect('komisi/approvle_targetkomisi');
  }

  function saldoawalpiutang()
  {
    // Search text
    $tanggal  = "";
    $cab      = $this->session->userdata('cabang');
    if ($cab != 'pusat') {
      $cabang = $cab;
    } else {
      $cabang = "";
    }
    $bulan            = "";
    $tahun            = "";
    if ($this->input->post('submit') != NULL) {
      $tanggal   = $this->input->post('tanggal');
      $cabang    = $this->input->post('cabang');
      $bulan     = $this->input->post('bulan');
      $tahun     = $this->input->post('tahun');
      $data   = array(
        'tanggal'  => $tanggal,
        'cbg'     => $cabang,
        'bulan'   => $bulan,
        'tahun'   => $tahun
      );
      $this->session->set_userdata($data);
    } else {

      if ($this->session->userdata('tanggal') != NULL) {
        $tanggal = $this->session->userdata('tanggal');
      }
      if ($this->session->userdata('cbg') != NULL) {
        $cabang = $this->session->userdata('cbg');
      }
      if ($this->session->userdata('bulan') != NULL) {
        $bulan = $this->session->userdata('bulan');
      }
      if ($this->session->userdata('tahun') != NULL) {
        $tahun = $this->session->userdata('tahun');
      }
    }

    // Get records



    $data['tanggal']              = $tanggal;
    $data['cbg']                  = $cabang;
    // Load view
    $data['cabang']               = $this->Model_cabang->view_cabang()->result();
    $data['cb']                   = $this->session->userdata('cabang');
    $data['tahun']                = date("Y");
    $data['bulan']                = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $data['bln']                  = $bulan;
    $data['thn']                  = $tahun;
    $this->template->load('template/template', 'komisi/saldoawalpiutang', $data);
  }

  function generatesaldopiutang()
  {
    $cabang = $this->input->post('cabang');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $piutang = $this->Model_komisi->generatesaldopiutang($cabang, $bulan, $tahun)->result();
    foreach ($piutang as $p) {
      $kodesales = substr($p->salesbarunew, 4, 2);
      if (Strlen($bulan) == 2) {
        $bln = $bulan;
      } else {
        $bln = "0" . $bulan;
      }
      $thn = substr($tahun, 2, 2);
      $kodesaldoawalpiutang = "SP" . $cabang . $bln . $thn . $kodesales;

      $cek = $this->Model_komisi->cekSaldopiutang($kodesaldoawalpiutang)->num_rows();

      if (empty($cek)) {
        $data = [
          'kode_saldoawalpiutang' => $kodesaldoawalpiutang,
          'bulan' => $bulan,
          'tahun' => $tahun,
          'id_karyawan' => $p->salesbarunew,
          'saldo_piutang' => $p->saldopiutang
        ];
        echo "A";
        $simpan = $this->db->insert('saldoawal_piutang', $data);
        if ($simpan) {
          echo "1";
        }
      } else {
        $data = [
          'saldo_piutang' => $p->saldopiutang
        ];
        echo "B";
        $update = $this->db->update('saldoawal_piutang', $data, array('kode_saldoawalpiutang' => $kodesaldoawalpiutang));
        if ($update) {
          echo "2";
        }
      }
    }
  }

  function loadsaldoawalpiutang()
  {
    $cabang = $this->input->post('cabang');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['piutang'] = $this->Model_komisi->loadsaldoawalpiutang($cabang, $bulan, $tahun)->result();
    $this->load->view('komisi/loadsaldoawalpiutang', $data);
  }

  function getfrmkoreksitarget()
  {
    $kodetarget = $this->input->post('kodetarget');
    $kodeproduk = $this->input->post('kodeproduk');
    $id_karyawan = $this->input->post('id_karyawan');
    $data['kodetarget'] = $kodetarget;
    $data['kodeproduk'] = $kodeproduk;
    $data['id_karyawan'] = $id_karyawan;
    $data['targetproduk'] = $this->Model_komisi->gettargetproduk($kodetarget, $kodeproduk, $id_karyawan)->row_array();
    $this->load->view('komisi/frmkoreksitargetproduk', $data);
  }

  function updatetarget()
  {
    $kodetarget = $this->input->post('kodetarget');
    $kodeproduk = $this->input->post('kodeproduk');
    $id_karyawan = $this->input->post('id_karyawan');
    $jmltarget = $this->input->post('jmltarget');
    $cek = $this->Model_komisi->cekTargetproduct($kodetarget, $kodeproduk, $id_karyawan)->num_rows();
    $this->db->trans_begin();

    if (!empty($cek)) {
      $this->Model_komisi->updatetarget($kodetarget, $kodeproduk, $id_karyawan, $jmltarget);
    } else {
      $this->Model_komisi->inserttarget($kodetarget, $kodeproduk, $id_karyawan, $jmltarget);
    }
    $this->Model_komisi->updatetargetcashin($kodetarget, $kodeproduk, $id_karyawan);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      echo "0";
    } else {
      $this->db->trans_commit();
      echo "1";
    }
  }

  function set_ratio_komisi()
  {
    $data['cabang'] = $this->Model_cabang->view_cabang()->result();
    $this->template->load('template/template', 'komisi/set_ratio_komisi', $data);
  }

  function loadratiokomisi()
  {
    $cabang = $this->input->post('cabang');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['ratiokomisi'] = $this->Model_komisi->loadratiokomisi($cabang, $bulan, $tahun)->result();
    $this->load->view('komisi/loadratiokomisi', $data);
  }

  function insert_setratio_komisi()
  {
    $this->Model_komisi->insert_setratio_komisi();
  }

  function detaildriver()
  {
    $id_driver_helper = $this->uri->segment(3);
    $bulan = $this->uri->segment(4);
    $tahun = $this->uri->segment(5);
    $dari = $tahun . "-" . $bulan . "-01";
    $sampai = date("Y-m-t", strtotime($dari));

    $query = "SELECT detail_dpb.no_dpb,tgl_pengambilan,no_kendaraan,tujuan,dpb.id_karyawan,nama_karyawan,dpb.id_driver,nama_driver_helper,SUM(jml_penjualan) as jml_penjualan 
    FROM detail_dpb
    INNER JOIN dpb ON detail_dpb.no_dpb = dpb.no_dpb
    INNER JOIN driver_helper ON dpb.id_driver = driver_helper.id_driver_helper
    INNER JOIN karyawan ON dpb.id_karyawan = karyawan.id_karyawan
    WHERE 
    tgl_pengambilan BETWEEN '$dari' AND '$sampai' AND id_driver='$id_driver_helper'
    GROUP BY detail_dpb.no_dpb,tgl_pengambilan,no_kendaraan,tujuan,dpb.id_karyawan,nama_karyawan,dpb.id_driver,nama_driver_helper
    ORDER BY tgl_pengambilan,no_dpb ASC 
    ";

    $qdriverhelper = "SELECT * FROM driver_helper WHERE id_driver_helper ='$id_driver_helper'";
    $data['driverhelper'] = $this->db->query($qdriverhelper)->row_array();
    $data['bln'] = $bulan;
    $data['tahun'] = $tahun;
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $data['detail'] =  $this->db->query($query)->result();
    $this->load->view('komisi/laporan/cetak_detaildriverhelper', $data);
  }

  function detailhelper()
  {
    $id_driver_helper = $this->uri->segment(3);
    $bulan = $this->uri->segment(4);
    $tahun = $this->uri->segment(5);
    $dari = $tahun . "-" . $bulan . "-01";
    $sampai = date("Y-m-t", strtotime($dari));

    $query = "SELECT detail_dpb.no_dpb,tgl_pengambilan,no_kendaraan,tujuan,dpb.id_karyawan,nama_karyawan,SUM(jml_penjualan) as jml_penjualan 
    FROM detail_dpb
    INNER JOIN dpb ON detail_dpb.no_dpb = dpb.no_dpb
    INNER JOIN karyawan ON dpb.id_karyawan = karyawan.id_karyawan
    WHERE 
    tgl_pengambilan BETWEEN '$dari' AND '$sampai' AND id_helper='$id_driver_helper'
    OR tgl_pengambilan BETWEEN '$dari' AND '$sampai' AND id_helper_2='$id_driver_helper'
    OR tgl_pengambilan BETWEEN '$dari' AND '$sampai' AND id_helper_3='$id_driver_helper'
    GROUP BY detail_dpb.no_dpb,tgl_pengambilan,no_kendaraan,tujuan,dpb.id_karyawan,nama_karyawan
    ORDER BY tgl_pengambilan,no_dpb ASC 
    ";

    $qdriverhelper = "SELECT * FROM driver_helper WHERE id_driver_helper ='$id_driver_helper'";
    $data['driverhelper'] = $this->db->query($qdriverhelper)->row_array();
    $data['bln'] = $bulan;
    $data['tahun'] = $tahun;
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $data['detail'] =  $this->db->query($query)->result();
    $this->load->view('komisi/laporan/cetak_detaildriverhelper', $data);
  }
}
