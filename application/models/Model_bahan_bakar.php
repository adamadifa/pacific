<?php

class Model_bahan_bakar extends CI_Model
{
  function listSupplier()
  {

    return $this->db->get('supplier');
  }

  public function getrecordPembelianCount($nobukti = "", $tgl_pembelian = "", $departemen = "", $ppn = "", $ln = "", $supplier = "")
  {

    $this->db->select('count(*) as allcount');
    $this->db->from('pembelian');
    $this->db->join('departemen', 'pembelian.kode_dept = departemen.kode_dept');
    $this->db->join('supplier', 'pembelian.kode_supplier = supplier.kode_supplier');
    $this->db->join('detail_pembelian', 'pembelian.nobukti_pembelian = detail_pembelian.nobukti_pembelian');
    $this->db->where('pembelian.kode_dept', 'GAF');
    $this->db->where('detail_pembelian.kode_akun', '1-1505');
    $this->db->where('pembelian.nobukti_pembelian NOT IN (SELECT nobukti_pemasukan FROM pemasukan_bb)');
    $this->db->where('tgl_pembelian>=', '2021-02-01');
    if ($nobukti != '') {
      $this->db->like('pembelian.nobukti_pembelian', $nobukti);
    }
    if ($tgl_pembelian != '') {
      $this->db->where('tgl_pembelian', $tgl_pembelian);
    }

    if ($departemen != '') {
      $this->db->where('pembelian.kode_dept', $departemen);
    }

    if ($ppn != '') {
      $this->db->where('pembelian.ppn', $ppn);
    }

    if ($supplier != '') {
      $this->db->where('pembelian.kode_supplier', $supplier);
    }
    $this->db->order_by('tgl_pembelian', 'desc');
    $query  = $this->db->get();
    $result = $query->result_array();
    return $result[0]['allcount'];
  }

  public function getDataPembelian($rowno, $rowperpage, $nobukti = "", $tgl_pembelian = "", $departemen = "", $ppn = "", $ln = "", $supplier = "")
  {

    $this->db->select('pembelian.nobukti_pembelian,tgl_pembelian,tgl_jatuhtempo,ppn,no_fak_pajak,pembelian.kode_supplier,nama_supplier,pembelian.kode_dept,nama_dept,jenistransaksi,ref_tunai,

      (SELECT SUM( IF ( STATUS = "PMB", (qty*harga), 0 ) ) - SUM( IF ( STATUS = "PNJ",(qty*harga), 0 ) ) FROM detail_pembelian dp WHERE dp.nobukti_pembelian = pembelian.nobukti_pembelian  ) as harga,
      (SELECT COUNT(nobukti_pembelian) FROM detail_kontrabon k WHERE k.nobukti_pembelian = pembelian.nobukti_pembelian) as kontrabon,
      (SELECT SUM(jmlbayar) FROM historibayar_pembelian hb
      INNER JOIN detail_kontrabon on hb.no_kontrabon = detail_kontrabon.no_kontrabon
      WHERE nobukti_pembelian = pembelian.nobukti_pembelian
      GROUP BY pembelian.nobukti_pembelian) as jmlbayar');
    $this->db->from('pembelian');
    $this->db->join('departemen', 'pembelian.kode_dept = departemen.kode_dept');
    $this->db->join('supplier', 'pembelian.kode_supplier = supplier.kode_supplier');
    $this->db->join('detail_pembelian', 'pembelian.nobukti_pembelian = detail_pembelian.nobukti_pembelian');
    $this->db->where('pembelian.kode_dept', 'GAF');
    $this->db->where('detail_pembelian.kode_akun', '1-1505');
    $this->db->where('pembelian.nobukti_pembelian NOT IN (SELECT nobukti_pemasukan FROM pemasukan_bb)');
    $this->db->where('tgl_pembelian>=', '2021-02-01');
    if ($nobukti != '') {
      $this->db->like('pembelian.nobukti_pembelian', $nobukti);
    }
    if ($tgl_pembelian != '') {
      $this->db->where('tgl_pembelian', $tgl_pembelian);
    }
    if ($departemen != '') {
      $this->db->where('pembelian.kode_dept', $departemen);
    }
    if ($ppn != '') {
      $this->db->where('pembelian.ppn', $ppn);
    }

    if ($supplier != '') {
      $this->db->where('pembelian.kode_supplier', $supplier);
    }
    $this->db->order_by('tgl_pembelian,nobukti_pembelian', 'DESC');

    $this->db->limit($rowperpage, $rowno);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getDataPemasukan($rowno, $rowperpage, $nobukti = "", $tgl_pemasukan = "")
  {

    $this->db->select('*');
    $this->db->from('pemasukan_bb');
    $this->db->join('supplier', 'pemasukan_bb.kode_supplier = supplier.kode_supplier');
    $this->db->order_by('tgl_pemasukan', 'DESC');

    if ($nobukti != '') {
      $this->db->like('nobukti_pemasukan', $nobukti);
    }

    if ($tgl_pemasukan != '') {
      $this->db->where('tgl_pemasukan', $tgl_pemasukan);
    }

    $this->db->limit($rowperpage, $rowno);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getrecordPemasukanCount($nobukti = "", $tgl_pemasukan = "")
  {

    $this->db->select('count(*) as allcount');
    $this->db->from('pemasukan_bb');
    $this->db->join('supplier', 'pemasukan_bb.kode_supplier = supplier.kode_supplier');
    $this->db->order_by('tgl_pemasukan', 'DESC');

    if ($nobukti != '') {
      $this->db->like('nobukti_pemasukan', $nobukti);
    }

    if ($tgl_pemasukan != '') {
      $this->db->where('tgl_pemasukan', $tgl_pemasukan);
    }

    $query  = $this->db->get();
    $result = $query->result_array();
    return $result[0]['allcount'];
  }

  public function getDataPengeluaran($rowno, $rowperpage, $nobukti = "", $tgl_pengeluaran = "", $kode_dept = "")
  {

    $this->db->select('*');
    $this->db->from('pengeluaran_bb');
    $this->db->join('departemen', 'pengeluaran_bb.kode_dept = departemen.kode_dept');
    $this->db->order_by('tgl_pengeluaran,nobukti_pengeluaran', 'DESC');

    if ($nobukti != '') {
      $this->db->like('nobukti_pengeluaran', $nobukti);
    }

    if ($tgl_pengeluaran != '') {
      $this->db->where('tgl_pengeluaran', $tgl_pengeluaran);
    }

    if ($kode_dept != '') {
      $this->db->where('pengeluaran_bb.kode_dept', $kode_dept);
    }

    $this->db->limit($rowperpage, $rowno);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getrecordPengeluaranCount($nobukti = "", $tgl_pengeluaran = "", $kode_dept = "")
  {

    $this->db->select('count(*) as allcount');
    $this->db->from('pengeluaran_bb');
    $this->db->join('departemen', 'pengeluaran_bb.kode_dept = departemen.kode_dept');
    $this->db->order_by('tgl_pengeluaran', 'desc');

    if ($nobukti != '') {
      $this->db->like('nobukti_pengeluaran', $nobukti);
    }

    if ($tgl_pengeluaran != '') {
      $this->db->where('tgl_pengeluaran', $tgl_pengeluaran);
    }

    if ($kode_dept != '') {
      $this->db->where('pengeluaran_bb.kode_dept', $kode_dept);
    }

    $query  = $this->db->get();
    $result = $query->result_array();
    return $result[0]['allcount'];
  }

  function insertpemasukan_temp()
  {

    $kode_barang    = $this->input->post('kodebarang');
    $qty            = str_replace(",", "", $this->input->post('jumlah'));
    $keterangan     = $this->input->post('keterangan');
    $id_admin       = $this->session->userdata('id_user');

    $data           = array(

      'kode_barang'  => $kode_barang,
      'qty'           => $qty,
      'keterangan'   => $keterangan,
      'id_admin'     => $id_admin

    );

    $this->db->insert('detailpemasukan_temp_bb', $data);
  }

  function insert_pembelian()
  {

    $nobukti           = $this->input->post('nobukti');
    $tgl_pemasukan     = $this->input->post('tgl_pemasukan');

    $data = $this->db->query("SELECT * FROM pembelian WHERE nobukti_pembelian = '$nobukti' ");
    foreach ($data->result() as $d) {

      $data = array(

        'nobukti_pemasukan'  => $nobukti,
        'tgl_pemasukan'      => $d->tgl_pembelian,
        'tgl_pembelian'      => $tgl_pemasukan,
        'status'             => 1,
        'kode_supplier'      => $d->kode_supplier,

      );
      $this->db->insert('pemasukan_bb', $data);
    }


    $data = $this->db->query("SELECT * FROM detail_pembelian WHERE nobukti_pembelian = '$nobukti' ");
    foreach ($data->result() as $d) {

      $data = array(

        'nobukti_pemasukan' => $nobukti,
        'kode_barang'       => $d->kode_barang,
        'qty'               => $d->qty,
        'penyesuaian'       => $d->penyesuaian,
        'keterangan'        => $d->keterangan

      );
      $this->db->insert('detail_pemasukan_bb', $data);
    }
  }

  function getPemasukantemp()
  {

    $id_user = $this->session->userdata('id_user');
    $this->db->join('master_barang_pembelian', 'detailpemasukan_temp_bb.kode_barang = master_barang_pembelian.kode_barang');
    return $this->db->get_where('detailpemasukan_temp_bb', array('id_admin' => $id_user));
  }

  function getDetailPemasukan()
  {

    $nobukti            = $this->input->post('nobukti');
    $this->db->join('master_barang_pembelian', 'detail_pemasukan_bb.kode_barang = master_barang_pembelian.kode_barang');
    return $this->db->get_where('detail_pemasukan_bb', array('detail_pemasukan_bb.nobukti_pemasukan' => $nobukti));
  }

  function getPemasukan()
  {

    $nobukti            = $this->input->post('nobukti');
    $this->db->join('supplier', 'pemasukan_bb.kode_supplier = supplier.kode_supplier');
    return $this->db->get_where('pemasukan_bb', array('nobukti_pemasukan' => $nobukti));
  }


  function getSupplier()
  {
    return $this->db->query('SELECT * FROM supplier ORDER BY nama_supplier ASC');
  }
  
  function jsonPilihBarang()
  {

    $this->datatables->select('kode_barang,nama_barang,satuan,master_barang_pembelian.kode_dept,nama_dept,jenis_barang,kode_kategori');
    $this->datatables->from('master_barang_pembelian');
    $this->datatables->join('departemen', 'master_barang_pembelian.kode_dept = departemen.kode_dept');
    $this->datatables->where('master_barang_pembelian.kode_barang', 'GA-002');
    $this->datatables->or_where('master_barang_pembelian.kode_barang', 'GA-007');
    $this->datatables->or_where('master_barang_pembelian.kode_barang', 'GA-588');
    $this->datatables->where('master_barang_pembelian.status', 'Aktif');
    $this->datatables->add_column('view', '<a href="#"  data-toggle="modal" data-kode="$1" data-nama="$2"  data-jenis="$3"  data-kategori="$4" class="btn btn-danger btn-sm waves-effect pilih">Pilih</a>', 'kode_barang,nama_barang,jenis_barang,kode_kategori');
    return $this->datatables->generate();
  }

  function getBarang($kode_barang)
  {

    if($kode_barang != ""){
      $this->db->where('master_barang_pembelian.kode_barang', $kode_barang);
    }
    
    $this->db->select('kode_barang,nama_barang,satuan,master_barang_pembelian.kode_dept,nama_dept,jenis_barang,kode_kategori');
    $this->db->from('master_barang_pembelian');
    $this->db->join('departemen', 'master_barang_pembelian.kode_dept = departemen.kode_dept');
    $this->db->where('master_barang_pembelian.status', 'Aktif');
    return $this->db->get();
  }

  function saldoAwal($bulan, $tahun, $kode_barang)
  {
    if ($kode_barang != "") {

      $kode_barang = "AND saldoawal_bahan_bakar.kode_barang = '" . $kode_barang . "' ";
    }
    $query = "SELECT 
    qty,harga
    FROM saldoawal_bahan_bakar 
    WHERE bulan = '$bulan' AND tahun = '$tahun' "
      . $kode_barang
      . "
    ";
    return $this->db->query($query);
  }

  function cekNextBulan($bulan, $tahun)
  {

    $this->db->order_by('tgl_pengeluaran', 'desc');
    $this->db->limit(1);
    return $this->db->get_where('pengeluaran_bb', array(
      'MONTH(tgl_pengeluaran)' => $bulan,
      'YEAR(tgl_pengeluaran)' => $tahun
    ));
  }

  function hapus_detailpemasukan_temp()
  {

    $kodebarang  = $this->input->post('kodebarang');
    $idadmin     = $this->input->post('idadmin');
    $this->db->delete('detailpemasukan_temp_bb', array('kode_barang' => $kodebarang, 'id_admin' => $idadmin));
  }

  function insert_pemasukan()
  {

    $nobukti           = $this->input->post('nobukti');
    $tgl_pemasukan    = $this->input->post('tgl_pemasukan');
    $kode_supplier    = $this->input->post('kode_supplier');
    $id_admin         = $this->session->userdata('id_user');

    $data = array(

      'nobukti_pemasukan'  => $nobukti,
      'tgl_pemasukan'      => $tgl_pemasukan,
      'kode_supplier'      => $kode_supplier,
      'status'             => 2,

    );

    $this->db->insert('pemasukan_bb', $data);

    $data = $this->db->query("SELECT * FROM detailpemasukan_temp_bb WHERE id_admin = '$id_admin' ");

    foreach ($data->result() as $d) {

      $data = array(

        'nobukti_pemasukan'   => $nobukti,
        'kode_barang'         => $d->kode_barang,
        'qty'                 => $d->qty,
        'keterangan'          => $d->keterangan

      );
      $this->db->insert('detail_pemasukan_bb', $data);
    }

    $this->db->query("DELETE FROM detailpemasukan_temp_bb WHERE id_admin = '$id_admin' ");
    redirect('bahan_bakar/input_pemasukan');
  }

  function hapuspemasukan()
  {

    $nobukti    = str_replace(".", "/", $this->uri->segment(3));
    $this->db->query("DELETE FROM pemasukan_bb WHERE nobukti_pemasukan = '$nobukti' ");
    $this->db->query("DELETE FROM detail_pemasukan_bb WHERE nobukti_pemasukan = '$nobukti' ");
  }

  function getDept()
  {

    return $this->db->get('departemen');
  }

  function getPengeluarantemp()
  {

    $id_user = $this->session->userdata('id_user');
    $this->db->join('master_barang_pembelian', 'detailpengeluaran_temp_bb.kode_barang = master_barang_pembelian.kode_barang');
    return $this->db->get_where('detailpengeluaran_temp_bb', array('id_admin' => $id_user));
  }

  function insertpengeluaran_temp()
  {

    $kode_barang   = $this->input->post('kodebarang');
    $qty           = str_replace(",", "", $this->input->post('qty'));
    $keterangan    = $this->input->post('keterangan');
    $id_admin      = $this->session->userdata('id_user');

    $data = array(

      'kode_barang' => $kode_barang,
      'qty'         => $qty,
      'keterangan'  => $keterangan,
      'id_admin'    => $id_admin

    );

    $this->db->insert('detailpengeluaran_temp_bb', $data);
  }

  
  function hapus_detailpengeluaran_temp()
  {

    $kodebarang  = $this->input->post('kodebarang');
    $idadmin     = $this->input->post('idadmin');
    $this->db->delete('detailpengeluaran_temp_bb', array('kode_barang' => $kodebarang, 'id_admin' => $idadmin));
  }

  function insert_pengeluaran()
  {

    $nobukti            = $this->input->post('nobukti');
    $tgl_pengeluaran    = $this->input->post('tgl_pengeluaran');
    $kode_dept          = $this->input->post('departemen');
    $id_admin           = $this->session->userdata('id_user');

    $data = array(

      'nobukti_pengeluaran'   => $nobukti,
      'tgl_pengeluaran'       => $tgl_pengeluaran,
      'kode_dept'             => $kode_dept,
      'status'                => 1

    );

    $this->db->insert('pengeluaran_bb', $data);

    $data = $this->db->query("SELECT * FROM detailpengeluaran_temp_bb WHERE id_admin = '$id_admin' ")->result();

    foreach ($data as $d) {


      $data = array(

        'nobukti_pengeluaran'    => $nobukti,
        'kode_barang'            => $d->kode_barang,
        'qty'                    => $d->qty,
        'keterangan'             => $d->keterangan

      );
      $this->db->insert('detail_pengeluaran_bb', $data);
    }

    $this->db->query("DELETE FROM detailpengeluaran_temp_bb WHERE id_admin = '$id_admin' ");
    redirect('bahan_bakar/input_pengeluaran');
  }

  function hapuspengeluaran()
  {

    $nobukti    = str_replace(".", "/", $this->uri->segment(3));
    $this->db->query("DELETE FROM pengeluaran_bb WHERE nobukti_pengeluaran = '$nobukti' ");
    $this->db->query("DELETE FROM detail_pengeluaran_bb WHERE nobukti_pengeluaran = '$nobukti' ");
  }

  function getPengeluaran()
  {

    $nobukti            = $this->input->post('nobukti');
    $this->db->join('departemen', 'pengeluaran_bb.kode_dept = departemen.kode_dept');
    return $this->db->get_where('pengeluaran_bb', array('nobukti_pengeluaran' => $nobukti));
  }
  
  function getDetailPengeluaran()
  {

    $nobukti            = $this->input->post('nobukti');
    $this->db->join('master_barang_pembelian', 'detail_pengeluaran_bb.kode_barang = master_barang_pembelian.kode_barang');
    return $this->db->get_where('detail_pengeluaran_bb', array('detail_pengeluaran_bb.nobukti_pengeluaran' => $nobukti));
  }

}
