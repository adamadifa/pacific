<?php

class Pengajuan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_login();
    $this->load->model(array('Model_pengajuan', 'Model_pembelian','Model_cabang','Model_gudanglogistik'));
  }
  function inputPengajuanBarang()
  {
   $this->template->load('template/template', 'pengajuan/inputPengajuanBarang');
  }

  function pengajuanBarang()
  {
    $data['data']       = $this->Model_pengajuan->getDataPengajuanBarang();
    $this->template->load('template/template', 'pengajuan/pengajuanBarang', $data);
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

  function approvalpengajuan()
  {

    $this->Model_pengajuan->approvalpengajuan();
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
