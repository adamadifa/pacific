<?php

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_login();
    $this->load->model(array('Model_dashboard', 'Model_cabang', 'Model_dpb', 'Model_laporangudangjadi', 'Model_barang'));
  }

  function index()
  {
    $level_user = $this->session->userdata('level_user');
    $username = $this->session->userdata('username');
    if ($level_user == 'Administrator') {
      // $data['jmlPelanggan']    = $this->Model_dashboard->jumlahPelanggan()->row_array();
      // $data['jmlSales']        = $this->Model_dashboard->jumlahSales()->row_array();
      // $data['jmlBrg']          = $this->Model_dashboard->jumlahBarang()->row_array();
      // $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      // $data['grap']            = $this->Model_dashboard->grafikPenjualan()->result();
      // $data['cb']              = $this->session->userdata('cabang');
      // $data['produk']          = $this->Model_laporangudangjadi->listproduk()->result();
      $data['tahun']           = date("Y");
      $data['cekpengajuan']    = $this->Model_dashboard->cek_pengajuan()->num_rows();
      //$this->template->load('template/template', 'dashboard/dashboard_administrator', $data);
      $data['bulan']             = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $this->template->load('template/template', 'dashboard_v2/dashboard_administrator', $data);
    } elseif ($level_user == "admin penjualan") {
      $data['jmlPelanggan']    = $this->Model_dashboard->jumlahPelanggan()->row_array();
      $data['jmlSales']        = $this->Model_dashboard->jumlahSales()->row_array();
      $data['jmlBrg']          = $this->Model_dashboard->jumlahBarang()->row_array();
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $this->template->load('template/template', 'dashboard/dashboard_admingudang', $data);
    } elseif ($level_user == "supervisor cabang") {
      $data['jmlPelanggan']    = $this->Model_dashboard->jumlahPelanggan()->row_array();
      $data['jmlSales']        = $this->Model_dashboard->jumlahSales()->row_array();
      $data['jmlBrg']          = $this->Model_dashboard->jumlahBarang()->row_array();
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $this->template->load('template/template', 'dashboard/dashboard_admingudang', $data);
    } elseif ($level_user == "kepala gudang") {
      // $data['jmlPelanggan']    = $this->Model_dashboard->jumlahPelanggan()->row_array();
      // $data['jmlSales']        = $this->Model_dashboard->jumlahSales()->row_array();
      // $data['jmlBrg']          = $this->Model_dashboard->jumlahBarang()->row_array();
      // $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      // $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $this->template->load('template/template', 'dashboard/dashboard_admingudang', $data);
    } elseif ($level_user == "admin gudang") {
      $data['jmlPelanggan']    = $this->Model_dashboard->jumlahPelanggan()->row_array();
      $data['jmlSales']        = $this->Model_dashboard->jumlahSales()->row_array();
      $data['jmlBrg']          = $this->Model_dashboard->jumlahBarang()->row_array();
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $this->template->load('template/template', 'dashboard/dashboard_admingudang.php', $data);
    } elseif ($username == "ardi") {
      // $data['jmlPelanggan']    = $this->Model_dashboard->jumlahPelanggan()->row_array();
      // $data['jmlSales']        = $this->Model_dashboard->jumlahSales()->row_array();
      // $data['jmlBrg']          = $this->Model_dashboard->jumlahBarang()->row_array();
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['grap']            = $this->Model_dashboard->grafikPenjualan()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $data['produk']          = $this->Model_laporangudangjadi->listproduk()->result();
      $data['tahun']           = date("Y");
      $data['bulan']           = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $this->template->load('template/template', 'dashboard/dashboard_administrator', $data);
    } elseif ($level_user == "admin produksi") {
      $cabang             = $this->session->userdata('cabang');
      $bulan              = date('m') + 0;
      $tahun              = date('Y');
      $data['permintaan'] = $this->Model_dashboard->get_permintaanproduksi($bulan, $tahun)->row_array();
      $data['cek']        = $this->Model_dashboard->get_permintaanproduksi($bulan, $tahun)->num_rows();
      $data['oman']       = $this->Model_dashboard->permintaanproduksi($bulan, $tahun)->result();
      $this->template->load('template/template', 'dashboard/dashboard_adminproduksi.php', $data);
    } elseif ($level_user == "keuangan") {
      $this->template->load('template/template', 'dashboard/dashboard_kasir');
    } elseif ($level_user == "crm") {
      $this->template->load('template/template', 'dashboard/dashboard_kasir');
    }elseif ($level_user == "manager marketing") {
      // $data['jmlPelanggan']    = $this->Model_dashboard->jumlahPelanggan()->row_array();
      // $data['jmlSales']        = $this->Model_dashboard->jumlahSales()->row_array();
      // $data['jmlBrg']          = $this->Model_dashboard->jumlahBarang()->row_array();
      //$data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      //$data['grap']            = $this->Model_dashboard->grafikPenjualan()->result();
      //$data['cb']              = $this->session->userdata('cabang');
      //$data['produk']          = $this->Model_laporangudangjadi->listproduk()->result();
      $data['cekpengajuan']    = $this->Model_dashboard->cek_pengajuan()->num_rows();
      $data['tahun']           = date("Y");
      $data['bulan']           = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $this->template->load('template/template', 'dashboard_v2/dashboard_administrator', $data);
    } elseif ($level_user == "admin gudang pusat") {
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $this->template->load('template/template', 'dashboard/dashboard_admingudangpusat.php', $data);
    } elseif ($level_user == "manager accounting") {
      // $data['jmlPelanggan']    = $this->Model_dashboard->jumlahPelanggan()->row_array();
      // $data['jmlSales']        = $this->Model_dashboard->jumlahSales()->row_array();
      // $data['jmlBrg']          = $this->Model_dashboard->jumlahBarang()->row_array();
      $data['lastupdate']      = $this->Model_dashboard->getLastupdate()->result();
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['grap']            = $this->Model_dashboard->grafikPenjualan()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $data['produk']          = $this->Model_laporangudangjadi->listproduk()->result();
      $data['tahun']           = date("Y");
      $data['bulan']           = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $this->template->load('template/template', 'dashboard/dashboard_administrator', $data);
    } elseif ($level_user == "pic") {
      // $data['jmlPelanggan']    = $this->Model_dashboard->jumlahPelanggan()->row_array();
      // $data['jmlSales']        = $this->Model_dashboard->jumlahSales()->row_array();
      // $data['jmlBrg']          = $this->Model_dashboard->jumlahBarang()->row_array();
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $data['produk']          = $this->Model_laporangudangjadi->listproduk()->result();
      $this->template->load('template/template', 'dashboard/dashboard_administrator', $data);
    } elseif ($level_user == "spv accounting") {
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['grap']            = $this->Model_dashboard->grafikPenjualan()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $data['produk']          = $this->Model_laporangudangjadi->listproduk()->result();
      $data['tahun']           = date("Y");
      $data['bulan']           = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $this->template->load('template/template', 'dashboard/dashboard_administrator', $data);
    } elseif ($level_user == "general manager") {
      // $data['jmlPelanggan']    = $this->Model_dashboard->jumlahPelanggan()->row_array();
      // $data['jmlSales']        = $this->Model_dashboard->jumlahSales()->row_array();
      // $data['jmlBrg']          = $this->Model_dashboard->jumlahBarang()->row_array();
      //$data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      //$data['grap']            = $this->Model_dashboard->grafikPenjualan()->result();
      //$data['cb']              = $this->session->userdata('cabang');
      //$data['produk']          = $this->Model_laporangudangjadi->listproduk()->result();
      $data['cekpengajuan']    = $this->Model_dashboard->cek_pengajuan()->num_rows();
      $data['tahun']           = date("Y");
      $data['bulan']           = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $this->template->load('template/template', 'dashboard_v2/dashboard_administrator', $data);
    } elseif ($level_user == "assisten gm") {
      // $data['jmlPelanggan']    = $this->Model_dashboard->jumlahPelanggan()->row_array();
      // $data['jmlSales']        = $this->Model_dashboard->jumlahSales()->row_array();
      // $data['jmlBrg']          = $this->Model_dashboard->jumlahBarang()->row_array();
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['grap']            = $this->Model_dashboard->grafikPenjualan()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $data['produk']          = $this->Model_laporangudangjadi->listproduk()->result();
      $data['tahun']           = date("Y");
      $data['bulan']           = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $this->template->load('template/template', 'dashboard/dashboard_administrator', $data);
    } elseif ($level_user == "kepala cabang") {
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $data['cekpengajuan']    = $this->Model_dashboard->cek_pengajuan()->num_rows();
      $data['tahun']           = date("Y");
      $data['bulan']            = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $this->template->load('template/template', 'dashboard_v2/dashboard_penjualan', $data);
    } elseif ($level_user == "kepala admin") {
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $data['bulan']           = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $data['tahun']           = date("Y");
      $this->template->load('template/template', 'dashboard_v2/dashboard_penjualan', $data);
    } elseif ($level_user == "koordinator kepala admin") {
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['grap']            = $this->Model_dashboard->grafikPenjualan()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $data['produk']          = $this->Model_laporangudangjadi->listproduk()->result();
      $data['tahun']           = date("Y");
      $data['bulan']           = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $this->template->load('template/template', 'dashboard/dashboard_administrator', $data);
    } elseif ($level_user == "audit") {
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['grap']            = $this->Model_dashboard->grafikPenjualan()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $data['produk']          = $this->Model_laporangudangjadi->listproduk()->result();
      $data['tahun']           = date("Y");
      $data['bulan']           = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $this->template->load('template/template', 'dashboard/dashboard_administrator', $data);
    } elseif ($level_user == "spv cabang") {
      $this->template->load('template/template', 'dashboard/dashboard_kasir');
    } elseif ($level_user == "kasir") {
      $this->template->load('template/template', 'dashboard/dashboard_kasir');
    } elseif ($level_user == "manager mtc") {
      $this->template->load('template/template', 'bahan_bakar/rekap_bahan_bakar');
    } elseif ($level_user == "admin mtc") {
      $this->template->load('template/template', 'bahan_bakar/pembelian');
    } elseif ($level_user == "keuangan2") {
      $this->template->load('template/template', 'dashboard/dashboard_kasir');
    } elseif ($level_user == "emf1") {
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $this->template->load('template/template', 'dashboard/dashboard_admingudangpusat.php', $data);
    } elseif ($level_user == "admin gudang logistik") {
      $this->template->load('template/template', 'dashboard/dashboard_admingdl.php');
    } elseif ($level_user == "admin gudang bahan") {
      $this->template->load('template/template', 'dashboard/dashboard_admingdl.php');
    } elseif ($level_user == "admin ga") {
      $this->template->load('template/template', 'dashboard/dashboard_admingdl.php');
    } elseif ($level_user == "admin pembelian") {
      $this->template->load('template/template', 'dashboard/dashboard_admingdl.php');
    } elseif ($level_user == "admin pembelian 2") {
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $this->template->load('template/template', 'dashboard/dashboard_admingudangpusat.php', $data);
    } elseif ($level_user == "manager pembelian") {
      $data['rekap']           = $this->Model_dashboard->persediaangudang()->result();
      $data['cabang']          = $this->Model_cabang->view_cabang()->result();
      $data['cb']              = $this->session->userdata('cabang');
      $this->template->load('template/template', 'dashboard/dashboard_admingudangpusat.php', $data);
    } elseif ($level_user == "admin pajak") {
      $this->template->load('template/template', 'dashboard/dashboard_admingdl.php');
    } elseif ($level_user == "Foreman") {
      $this->template->load('template/template', 'dashboard/dashboard_admingdl.php');
    } elseif ($level_user == "Admin Produksi 2") {
      $this->template->load('template/template', 'dashboard/dashboard_admingdl.php');
    } elseif ($level_user == "spv accounting 2") {
      $this->template->load('template/template', 'dashboard/dashboard_admingdl.php');
    } elseif ($level_user == "manager pembelian") {
      $this->template->load('template/template', 'dashboard/dashboard_admingdl.php');
    }
  }

  function loadsaldo()
  {
    $status  = $this->input->post('status');
    $cabang  = $this->input->post('kodecabang');
    $data['saldo'] = $this->Model_dpb->getsaldo($cabang, $status)->result();
    $this->load->view('dashboard/loadsaldo', $data);
  }

  function loadsaldoproduk()
  {
    $status  = $this->input->post('status');
    $kodeproduk  = $this->input->post('kodeproduk');
    $data['isipcsdus'] = $this->input->post('isipcsdus');
    $data['saldo'] = $this->Model_dpb->getsaldoproduk($kodeproduk, $status)->result();
    $this->load->view('dashboard/loadsaldoproduk', $data);
  }

  function loadsaldobs()
  {
    $status  = $this->input->post('status');
    $cabang  = $this->input->post('kodecabang');
    $data['saldo'] = $this->Model_dpb->getsaldobs($cabang, $status)->result();
    $this->load->view('dashboard/loadsaldobs', $data);
  }

  function loadrekappersediaan()
  {
    $data['saldo'] = $this->Model_dashboard->rekappersediaan()->result();
    $this->load->view('dashboard/loadrekappersediaan', $data);
  }

  function loadrekappersediaandpb()
  {
    $data['rekap'] = $this->Model_dashboard->persediaangudang()->result();
    $data['persediaandpb'] = $this->Model_dashboard->rekappersediaan()->result_array();
    $this->load->view('dashboard/loadrekappersediaandpb', $data);
  }

  function rekapproduksi()
  {
    $tahun = $this->input->post('tahun');
    $data['produksi'] = $this->Model_dashboard->getRekapProduksi($tahun)->result();
    $this->load->view('dashboard/loadrekapproduksi', $data);
  }

  function grafikproduksi()
  {
    $tahun = $this->input->post('tahun');
    $data['produksi'] = $this->Model_dashboard->getRekapProduksi($tahun)->result();
    $this->load->view('dashboard/loadgrafikproduksi', $data);
  }

  function dashboardproduksi()
  {
    $bulan              = date('m') + 0;
    $tahun              = date('Y');
    $data['permintaan'] = $this->Model_dashboard->get_permintaanproduksi($bulan, $tahun)->row_array();
    $data['cek']        = $this->Model_dashboard->get_permintaanproduksi($bulan, $tahun)->num_rows();
    $data['oman']       = $this->Model_dashboard->permintaanproduksi($bulan, $tahun)->result();
    $this->template->load('template/template', 'dashboard/dashboard_adminproduksi.php', $data);
  }

  function rekappenjualancashin()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['pnj'] = $this->Model_dashboard->rekappenjualancashin($bulan, $tahun)->result();
    $this->load->view('dashboard_v2/load_penjualancashin', $data);
  }

  function aup()
  {
    $cabang = $this->input->post('cabang');
    $tanggal_aup = $this->input->post('tanggal_aup');
    $exclude = $this->input->post('exclude');

    if (!empty($cabang)) {
      $data['aup'] = $this->Model_dashboard->aupcabang($cabang, $tanggal_aup, $exclude)->result();
      $this->load->view('dashboard_v2/load_aupcabang', $data);
    } else {
      $data['aup'] = $this->Model_dashboard->aupallcabang($tanggal_aup, $exclude)->result();
      $this->load->view('dashboard_v2/load_aupallcabang', $data);
    }
  }

  function rekapkendaraan()
  {
    $cabang = $this->input->post('cabang');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $data['kendaraan'] = $this->Model_dashboard->rekapkendaraan($cabang, $bulan, $tahun)->result();
    $this->load->view('dashboard_v2/load_kendaraan', $data);
  }

  function dppp()
  {
    $cabang = $this->input->post('cabang');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $status = $this->input->post('status');
    $data['tahunini'] = $tahun;
    $data['tahunlalu'] = $tahun - 1;
    if ($status == 2) {
      $data['dppp'] = $this->Model_dashboard->dppp_tunaikredit($cabang, $bulan, $tahun)->result();
    } else {
      $data['dppp'] = $this->Model_dashboard->dppp($cabang, $bulan, $tahun)->result();
    }
    $this->load->view('dashboard_v2/load_dppp', $data);
  }
}
