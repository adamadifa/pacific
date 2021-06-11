<?php
class Komisi extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_login();
    $this->load->Model(array('Model_cabang', 'Model_komisi', 'Model_sales', 'Model_barang', 'Model_laporanpenjualan'));
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
    $data['cabang'] = $cabang;
    $data['bln'] = $bulan;
    $data['tahun'] = $tahun;
    $data['barang'] = $this->Model_barang->getMasterproduk()->result();
    $data['bulan'] = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $data['komisi'] = $this->Model_komisi->cetak_komisi($cabang, $bulan, $tahun)->result();
    //var_dump($data['komisi']);
    //die;
    if (isset($_POST['export'])) {
      // Fungsi header dengan mengirimkan raw data excel
      header("Content-type: application/vnd-ms-excel");

      // Mendefinisikan nama file ekspor "hasil-export.xls"
      header("Content-Disposition: attachment; filename=Laporan Komisi.xls");
    }
    $this->load->view('komisi/laporan/cetak_komisi', $data);
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
}
