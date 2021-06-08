<?php

class Bahan_bakar extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_login();
    $this->load->model(array('Model_bahan_bakar', 'Model_pembelian','Model_cabang','Model_gudanglogistik'));
  }

  function pembelian($rowno = 0)
  {
    // Search text
    $nobukti           = "";
    $tgl_pembelian    = "";
    $departemen       = "";
    $supplier         = "";
    $role = $this->session->userdata('level_user');
    if ($role == 'admin pajak') {
      $ppn = "1";
    } else {
      $ppn = "";
    }

    // echo $ppn;
    //
    // die;
    $ln               = "";
    if ($this->input->post('submit') != NULL) {
      $nobukti                = $this->input->post('nobukti');
      $tgl_pembelian         = $this->input->post('tgl_pembelian');
      $departemen            = $this->input->post('departemen');
      $supplier              = $this->input->post('supplier');
      $ppn                   = $this->input->post('ppn');
      $ln                    = $this->input->post('ln');
      $data   = array(
        'nobukti'                => $nobukti,
        'tgl_pembelian'         => $tgl_pembelian,
        'departemen'           => $departemen,
        'supplier'             => $supplier,
        'ppn'                  => $ppn,
        'ln'                   => $ln
      );
      $this->session->set_userdata($data);
    } else {
      if ($this->session->userdata('nobukti') != NULL) {
        $nobukti = $this->session->userdata('nobukti');
      }
      if ($this->session->userdata('tgl_pembelian') != NULL) {
        $tgl_pembelian = $this->session->userdata('tgl_pembelian');
      }
      if ($this->session->userdata('departemen') != NULL) {
        $departemen = $this->session->userdata('departemen');
      }

      if ($this->session->userdata('supplier') != NULL) {
        $supplier = $this->session->userdata('supplier');
      }
      if ($this->session->userdata('ppn') != NULL) {
        $ppn = $this->session->userdata('ppn');
      }

      if ($this->session->userdata('ln') != NULL) {
        $ln = $this->session->userdata('ln');
      }
    }
    // Row per page
    $rowperpage = 10;
    // Row position
    if ($rowno != 0) {
      $rowno = ($rowno - 1) * $rowperpage;
    }
    // All records count
    $allcount     = $this->Model_bahan_bakar->getrecordPembelianCount($nobukti, $tgl_pembelian, $departemen, $ppn, $ln, $supplier);
    // Get records
    $users_record = $this->Model_bahan_bakar->getDataPembelian($rowno, $rowperpage, $nobukti, $tgl_pembelian, $departemen, $ppn, $ln, $supplier);
    // Pagination Configuration
    $config['base_url']       = base_url() . 'bahan_bakar/pembelian';
    $config['use_page_numbers']   = TRUE;
    $config['total_rows']       = $allcount;
    $config['per_page']       = $rowperpage;
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
    // Initialize
    $this->pagination->initialize($config);
    $data['pagination']             = $this->pagination->create_links();
    $data['result']             = $users_record;
    $data['row']               = $rowno;
    $data['nobukti']               = $nobukti;
    $data['tgl_pembelian']          = $tgl_pembelian;
    $data['departemen']              = $departemen;
    $data['ppn']                    = $ppn;
    $data['ln']                     = $ln;
    // $data['dept']                   = $this->Model_bahan_bakar->getPemohon()->result();
    $data['supp']                   = $this->Model_bahan_bakar->listSupplier()->result();
    $data['supplier']               = $supplier;
    //echo $data['cb'];
    $this->template->load('template/template', 'bahan_bakar/pembelian', $data);
  }

  function pemasukan($rowno = 0)
  {

    $nobukti          = "";
    $tgl_pemasukan    = "";

    if ($this->input->post('submit') != NULL) {
      $nobukti                 = $this->input->post('nobukti');
      $tgl_pemasukan           = $this->input->post('tgl_pemasukan');
      $data   = array(
        'nobukti'              => $nobukti,
        'tgl_pemasukan'        => $tgl_pemasukan,
      );
      $this->session->set_userdata($data);
    } else {

      if ($this->session->userdata('nobukti') != NULL) {
        $nobukti = $this->session->userdata('nobukti');
      }

      if ($this->session->userdata('tgl_pemasukan') != NULL) {
        $tgl_pemasukan = $this->session->userdata('tgl_pemasukan');
      }
    }
    $rowperpage = 10;
    if ($rowno != 0) {
      $rowno = ($rowno - 1) * $rowperpage;
    }
    $allcount                     = $this->Model_bahan_bakar->getrecordPemasukanCount($nobukti, $tgl_pemasukan);
    $users_record                 = $this->Model_bahan_bakar->getDataPemasukan($rowno, $rowperpage, $nobukti, $tgl_pemasukan);
    $config['base_url']           = base_url() . 'bahan_bakar/pemasukan';
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
    $data['nobukti']              = $nobukti;
    $data['tgl_pemasukan']        = $tgl_pemasukan;
    $this->template->load('template/template', 'bahan_bakar/pemasukan', $data);
  }

  function pengeluaran($rowno = 0)
  {

    $nobukti           = "";
    $tgl_pengeluaran  = "";
    $kode_dept        = "";

    if ($this->input->post('submit') != NULL) {

      $nobukti                   = $this->input->post('nobukti');
      $tgl_pengeluaran         = $this->input->post('tgl_pengeluaran');
      $kode_dept                = $this->input->post('kode_dept');

      $data   = array(
        'nobukti'                => $nobukti,
        'tgl_pengeluaran'      => $tgl_pengeluaran,
        'kode_dept'             => $kode_dept,
      );
      $this->session->set_userdata($data);
    } else {

      if ($this->session->userdata('nobukti') != NULL) {
        $nobukti = $this->session->userdata('nobukti');
      }

      if ($this->session->userdata('tgl_pengeluaran') != NULL) {
        $tgl_pengeluaran = $this->session->userdata('tgl_pengeluaran');
      }

      if ($this->session->userdata('kode_dept') != NULL) {
        $kode_dept = $this->session->userdata('kode_dept');
      }
    }
    $rowperpage = 10;
    if ($rowno != 0) {
      $rowno = ($rowno - 1) * $rowperpage;
    }
    $allcount                     = $this->Model_bahan_bakar->getrecordPengeluaranCount($nobukti, $tgl_pengeluaran, $kode_dept);
    $users_record                 = $this->Model_bahan_bakar->getDataPengeluaran($rowno, $rowperpage, $nobukti, $tgl_pengeluaran, $kode_dept);
    $config['base_url']           = base_url() . 'bahan_bakar/pengeluaran';
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
    $data['row']                   = $rowno;
    $data['kode_dept']             = $kode_dept;
    $data['nobukti']               = $nobukti;
    $data['tgl_pengeluaran']      = $tgl_pengeluaran;
    $data['dept']                 = $this->Model_bahan_bakar->getDept()->result();
    $this->template->load('template/template', 'bahan_bakar/pengeluaran', $data);
  }

  function input_pemasukan()
  {
    $data['tahun']     = date("Y");
    $data['bulan']     = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $data['supplier']  = $this->Model_bahan_bakar->getSupplier()->result();
    $this->template->load('template/template', 'bahan_bakar/input_pemasukan', $data);
  }

  function input_pengeluaran()
  {

    $data['dept']     = $this->Model_bahan_bakar->getDept()->result();
    $data['cabang']   = $this->Model_cabang->view_cabang()->result();
    $this->template->load('template/template', 'bahan_bakar/input_pengeluaran', $data);
  }

  function tabelbarang()
  {

    $this->load->view('bahan_bakar/tabelbarang');
  }
  
  function jsonPilihBarang()
  {

    header('Content-Type: application/json');
    echo $this->Model_bahan_bakar->jsonPilihBarang();
  }


  function view_detailpemasukan_temp()
  {

    $data['data']  = $this->Model_bahan_bakar->getPemasukantemp();
    $this->load->view('bahan_bakar/view_detailpemasukan_temp', $data);
  }

  function detail_pemasukan()
  {

    $data['data']    = $this->Model_bahan_bakar->getPemasukan()->row_array();
    $data['detail']  = $this->Model_bahan_bakar->getDetailPemasukan();
    $this->load->view('bahan_bakar/detail_pemasukan', $data);
  }

  function detail_pembelian()
  {
    $nobukti            = $this->input->post('nobukti');
    $data['pmb']        = $this->Model_gudanglogistik->getPembelian($nobukti)->row_array();
    $data['detail']     = $this->Model_gudanglogistik->getDetailPembelian($nobukti)->result();
    $pmbpnj             = $this->Model_gudanglogistik->getDetailPnjPembelian($nobukti);
    $data['cekpnj']     = $pmbpnj->num_rows();
    $data['pmbpnj']     = $pmbpnj->result();
    $data['kb']         = $this->Model_gudanglogistik->listKontraBonPMB($nobukti)->result();

    $this->load->view('bahan_bakar/detail_pembelian', $data);
  }

  function inputpemasukan_temp()
  {

    $this->Model_bahan_bakar->insertpemasukan_temp();
  }

  function hapus_detailpemasukan_temp()
  {

    $this->Model_bahan_bakar->hapus_detailpemasukan_temp();
  }

  function insert_pemasukan()
  {

    $this->Model_bahan_bakar->insert_pemasukan();
  }
  
  function hapuspemasukan()
  {

    $this->Model_bahan_bakar->hapuspemasukan();
    redirect('bahan_bakar/pemasukan');
  }

  function view_detailpengeluaran_temp()
  {

    $data['data']  = $this->Model_bahan_bakar->getPengeluarantemp();
    $this->load->view('bahan_bakar/view_detailpengeluaran_temp', $data);
  }

  function inputpengeluaran_temp()
  {

    $this->Model_bahan_bakar->insertpengeluaran_temp();
  }

  
  function hapus_detailpengeluaran_temp()
  {

    $this->Model_bahan_bakar->hapus_detailpengeluaran_temp();
  }

  function insert_pengeluaran()
  {

    $this->Model_bahan_bakar->insert_pengeluaran();
  }

  function insert_pembelian()
  {

    $this->Model_bahan_bakar->insert_pembelian();
  }
  
  function hapuspengeluaran()
  {
    $this->Model_bahan_bakar->hapuspengeluaran();
    redirect('bahan_bakar/pengeluaran');
  }
  
  function detail_pengeluaran()
  {

    $data['data']    = $this->Model_bahan_bakar->getPengeluaran()->row_array();
    $data['detail']  = $this->Model_bahan_bakar->getDetailPengeluaran();
    $this->load->view('bahan_bakar/detail_pengeluaran', $data);
  }

  function rekap_bahan_bakar(){

    $data['tahun']     = date("Y");
    $kode_barang       = $this->input->post('kode_barang');
    $data['bulan']     = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    $data['barang']    = $this->Model_bahan_bakar->getbarang($kode_barang)->result();
    $this->template->load('template/template', 'bahan_bakar/rekap_bahan_bakar.php',$data);
  }

  function cetak_bahan_bakar(){

    $level                = $this->session->userdata('level_user');
    $kode_barang          = $this->input->post('kode_barang');
    $bulan                = $this->input->post('bulan');
    $tahun                = $this->input->post('tahun');
    $data['bulan']        = $bulan;
    $data['tahun']        = $tahun;
    if(strlen($bulan) == '2'){
      $bulan = $bulan;
    }else{
      $bulan = "0".$bulan;
    }
    $data['kode_barang']  = $kode_barang;
    $dari                 = $tahun . "-" . $bulan . "-" . "01";
    $ceknextbulan         = $this->Model_bahan_bakar->cekNextBulan($bulan, $tahun)->row_array();
    $data['saldoawal']    = $this->Model_bahan_bakar->saldoAwal($bulan, $tahun, $kode_barang)->row_array();
    $data['barang']       = $this->Model_bahan_bakar->getBarang($kode_barang)->row_array();
    $data['dari']         = $dari;
    $tglnextbulan         = $ceknextbulan['tgl_pengeluaran'];
    if (empty($tglnextbulan)) {
      $data['sampai']     = date("Y-m-t", strtotime($dari));
    } else {
      $data['sampai']     = $ceknextbulan['tgl_pengeluaran'];
    }

    $data['tglakhirpenerimaan'] = $tahun . "-" . $bulan . "-31";
    
    if(isset($_POST['export'])){
      // Fungsi header dengan mengirimkan raw data excel
      header("Content-type: application/vnd-ms-excel");

      // Mendefinisikan nama file ekspor "hasil-export.xls"
      header("Content-Disposition: attachment; filename=Laporan Rekap Bahan Bakar.xls");
    }
    if($level == 'manager accounting' ||  $level == 'spv accounting'||  $level == 'Administrator'){
      $this->load->view('bahan_bakar/cetak_bahan_bakar_harga',$data);
    }else{
      $this->load->view('bahan_bakar/cetak_bahan_bakar',$data);
    }
  }
  
}
