<?php

class Pengajuan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_login();
    $this->load->model(array('Model_pengajuan', 'Model_pembelian','Model_cabang','Model_gudanglogistik'));
  }

  function pengajuanBarang($rowno = 0)
  {

    $nobukti          = "";
    $tanggal          = "";

    if ($this->input->post('submit') != NULL) {
      $nobukti                  = $this->input->post('nobukti');
      $tanggal                  = $this->input->post('tanggal');
      $data   = array(
        'nobukti'               => $nobukti,
        'tanggal'               => $tanggal,
      );
      $this->session->set_userdata($data);
    } else {

      if ($this->session->userdata('nobukti') != NULL) {
        $nobukti = $this->session->userdata('nobukti');
      }

      if ($this->session->userdata('tanggal') != NULL) {
        $tanggal = $this->session->userdata('tanggal');
      }
    }
    $rowperpage = 10;
    if ($rowno != 0) {
      $rowno = ($rowno - 1) * $rowperpage;
    }
    $allcount                     = $this->Model_pengajuan->getrecordPengajuanCount($nobukti, $tanggal);
    $users_record                 = $this->Model_pengajuan->getDataPengajuan($rowno, $rowperpage, $nobukti, $tanggal);
    $config['base_url']           = base_url() . 'pengajuan/pengajuanBarang';
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
    $data['tanggal']              = $tanggal;
    $this->template->load('template/template', 'pengajuan/pengajuanBarang', $data);
  }

  function inputPengajuanBarang()
  {
   $this->template->load('template/template', 'pengajuan/inputPengajuanBarang');
  }

  function codeotomatis()
  {

    $tahun    = date('y');
    $bulan    = date('m');
    $this->db->select('right(pengajuan_barang.nobukti,3) as kode ', false);
    $this->db->where('mid(nobukti,5,2)', $bulan);
    $this->db->where('mid(nobukti,7,2)', $tahun);
    $this->db->order_by('nobukti', 'desc');
    $this->db->limit('13');
    $query    = $this->db->get('pengajuan_barang');
    if ($query->num_rows() <> 0) {
      $data   = $query->row();
      $kode   = intval($data->kode) + 1;
    } else {
      $kode   = 1;
    }
    $kodemax  = str_pad($kode, 3, "0", STR_PAD_LEFT);
    $kodejadi   = "PBC/" . $bulan . "" . $tahun . "/" . $kodemax;
    echo $kodejadi;
  }

  function tabelbarang()
  {

    $this->load->view('pengajuan/tabelbarang');
  }
  
  function jsonPilihBarang()
  {

    header('Content-Type: application/json');
    echo $this->Model_pengajuan->jsonPilihBarang();
  }


  function view_detailpemasukan_temp()
  {

    $data['data']  = $this->Model_pengajuan->getPemasukantemp();
    $this->load->view('pengajuan/view_detailpemasukan_temp', $data);
  }

  function detailPengajuanBarang()
  {
    $data['data']    = $this->Model_pengajuan->getPengajuanBarang()->row_array();
    $data['detail']  = $this->Model_pengajuan->getDetailPengajuanBarang();
    $this->load->view('pengajuan/detailPengajuanBarang', $data);
  }

  function insertPengajuanBarang()
  {

    if (!empty($_FILES["foto"]["name"])) {
      $config['upload_path']          = './upload/pengajuan';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 0;
      $config['max_width']            = 0;
      $config['max_height']           = 0;
      $config['file_name']            = $this->input->post('nobukti');
      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('foto')) {
        $error = array('error' => $this->upload->display_errors());
        echo var_dump($error);
      } else {
        $_data = array('upload_data' => $this->upload->data());
        $foto  = $_data['upload_data']['file_name'];
        $this->Model_pengajuan->insertPengajuanBarang($foto);
        $this->session->set_flashdata(
          'msg',
          '<div class="alert bg-green alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="material-icons" style="float:left; margin-right:10px">check</i> Data Berhasil Di Simpan !
              </div>'
        );
      }
    } else {
      $foto  = "";
      $this->Model_pengajuan->insertPengajuanBarang($foto);
      $this->session->set_flashdata(
        'msg',
        '<div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="material-icons" style="float:left; margin-right:10px">check</i> Data Berhasil Di Simpan !
        </div>'
      );
    }
  }

  function inputDetailPengajuanBarangTemp()
  {

    $this->Model_pengajuan->inputDetailPengajuanBarangTemp();
  }

  function hapusDetailPengajuanBarangTemp()
  {

    $this->Model_pengajuan->hapusDetailPengajuanBarangTemp();
  }

  function hapusPengajuanBarang()
  {

    $this->Model_pengajuan->hapusPengajuanBarang();
  }
  
  function viewDetailPengajuanBarangTemp()
  {

    $data['data']  = $this->Model_pengajuan->getDetailPengajuanBarangTemp();
    $this->load->view('pengajuan/viewDetailPengajuanBarangTemp', $data);
  }
  
  function detail_pengeluaran()
  {

    $data['data']    = $this->Model_pengajuan->getPengeluaran()->row_array();
    $data['detail']  = $this->Model_pengajuan->getDetailPengeluaran();
    $this->load->view('pengajuan/detail_pengeluaran', $data);
  }

  function rekap_pengajuan(){

    $data['tahun']     = date("Y");
    $kode_barang       = $this->input->post('kode_barang');
    $data['bulan']     = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    $data['barang']    = $this->Model_pengajuan->getbarang($kode_barang)->result();
    $this->template->load('template/template', 'pengajuan/rekap_pengajuan.php',$data);
  }

  function cetak_pengajuan(){

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
    $ceknextbulan         = $this->Model_pengajuan->cekNextBulan($bulan, $tahun)->row_array();
    $data['saldoawal']    = $this->Model_pengajuan->saldoAwal($bulan, $tahun, $kode_barang)->row_array();
    $data['barang']       = $this->Model_pengajuan->getBarang($kode_barang)->row_array();
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
      $this->load->view('pengajuan/cetak_pengajuan_harga',$data);
    }else{
      $this->load->view('pengajuan/cetak_pengajuan',$data);
    }
  }
  
}
