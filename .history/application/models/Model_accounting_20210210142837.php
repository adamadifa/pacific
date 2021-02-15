<?php

class Model_accounting extends CI_Model
{
  private  $akunbank = array("1-1201");
  public function getDataSaldoAwal($rowno, $rowperpage, $kode_saldoawal_bb = "", $tanggal = "", $bulan = "", $tahun = "")
  {

    $this->db->select('*');
    $this->db->from('saldoawal_bb');
    $this->db->order_by('tanggal', 'DESC');

    if ($kode_saldoawal_bb != '') {
      $this->db->like('kode_saldoawal_bb', $kode_saldoawal_bb);
    }

    if ($tanggal != '') {
      $this->db->where('tanggal', $tanggal);
    }

    if ($bulan != '') {
      $this->db->where('bulan', $bulan);
    }

    if ($tahun != '') {
      $this->db->where('tahun', $tahun);
    }

    $this->db->limit($rowperpage, $rowno);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getRecordSaldoAwalnCount($kode_saldoawal_bb = "", $tanggal = "", $bulan = "", $tahun = "")
  {

    $this->db->select('count(*) as allcount');
    $this->db->from('saldoawal_bb');
    $this->db->order_by('tanggal', 'DESC');

    if ($kode_saldoawal_bb != '') {
      $this->db->like('kode_saldoawal_bb', $kode_saldoawal_bb);
    }

    if ($tanggal != '') {
      $this->db->where('tanggal', $tanggal);
    }

    if ($bulan != '') {
      $this->db->where('bulan', $bulan);
    }

    if ($tahun != '') {
      $this->db->where('tahun', $tahun);
    }

    $query  = $this->db->get();
    $result = $query->result_array();
    return $result[0]['allcount'];
  }


  function getDataCostRatio($cbg = "", $dari, $sampai)
  {
    if ($cbg != "") {
      $this->db->where('costratio_biaya.kode_cabang', $cbg);
    }

    $this->db->where('tgl_transaksi <=', $sampai);
    $this->db->where('tgl_transaksi >=', $dari);
    $this->db->where('LEFT(costratio_biaya.kode_akun,3)', '6-1');

    $this->db->or_where('tgl_transaksi <=', $sampai);
    $this->db->where('tgl_transaksi >=', $dari);
    $this->db->where('LEFT(costratio_biaya.kode_akun,3)', '6-2');
    if ($cbg != "") {
      $this->db->where('costratio_biaya.kode_cabang', $cbg);
    }

    $this->db->select('kode_cr,tgl_transaksi,costratio_biaya.kode_akun,nama_akun,costratio_biaya.id_sumber_costratio,jumlah,keterangan,nama_sumber,kode_cabang');
    $this->db->from('costratio_biaya');
    $this->db->join('coa', 'costratio_biaya.kode_akun = coa.kode_akun', 'left');
    $this->db->join('costratio_sumber', 'costratio_biaya.id_sumber_costratio = costratio_sumber.id_sumber_costratio');
    $this->db->order_by('kode_cabang,tgl_transaksi,costratio_biaya.kode_akun', 'asc');
    return $this->db->get();
  }

  function insert_penyesuaian()
  {

    $tahun            = $this->input->post('tahun');
    $bulan            = $this->input->post('bulan');
    $tanggal          = $this->input->post('tanggal');
    $debetkredit      = $this->input->post('debetkredit');
    $kode_akun        = $this->input->post('kode_akun');
    $jumlah           = $this->input->post('jumlah');
    $keterangan       = $this->input->post('keterangan');
    $sumber           = 'PNY';
    $thn = substr($tahun, 2, 2);
    $qbukubesar        = "SELECT no_bukti FROM buku_besar WHERE LEFT(no_bukti,6) = 'GJ$bulan$thn' ORDER BY no_bukti DESC LIMIT 1 ";
    $ceknolast      = $this->db->query($qbukubesar)->row_array();
    $nobuktilast    = $ceknolast['no_bukti'];
    $nobukti        = buatkode($nobuktilast, 'GJ' . $bulan . $thn, 4);
    if ($debetkredit == "D") {
      $debet = $jumlah;
      $kredit = 0;
    } else {
      $debet = 0;
      $kredit = $jumlah;
    }
    $data   = array(
      'no_bukti'            => $nobukti,
      'tanggal'             => $tanggal,
      'keterangan'          => $keterangan,
      'kode_akun'           => $kode_akun,
      'debet'               => $debet,
      'kredit'              => $kredit,
      'sumber'              => $sumber
    );

    $this->db->insert('buku_besar', $data);
  }

  function update_penyesuaian()
  {

    $nobukti          = $this->input->post('nobukti');
    $tanggal          = $this->input->post('tanggal');
    $debetkredit      = $this->input->post('debetkredit');
    $jumlah           = $this->input->post('jumlah');
    $keterangan       = $this->input->post('keterangan');

    if ($debetkredit == "D") {
      $debet = $jumlah;
      $kredit = 0;
    } else {
      $debet = 0;
      $kredit = $jumlah;
    }
    $data   = array(
      'tanggal'             => $tanggal,
      'keterangan'          => $keterangan,
      'debet'               => $debet,
      'kredit'              => $kredit
    );

    $this->db->update('buku_besar', $data, array('no_bukti' => $nobukti));
  }

  function hapus_penyesuaian()
  {
    $nobukti = $this->input->post('nobukti');
    $this->db->delete('buku_besar', array('no_bukti' => $nobukti));
  }


  function insert_saldoawal()
  {
    $kode_saldoawal   = $this->input->post('kode_saldoawal');
    $bulan            = $this->input->post('bulan');
    $tahun            = $this->input->post('tahun');
    $tanggal          = $this->input->post('tanggal');

    $data   = array(
      'kode_saldoawal_bb'   => $kode_saldoawal,
      'tanggal'             => $tanggal,
      'bulan'               => $bulan,
      'tahun'               => $tahun
    );

    $this->db->insert('saldoawal_bb', $data);
    redirect('accounting/view_saldoawal');
  }

  function insert_detailsaldoawal()
  {
    $kode_saldoawal   = $this->input->post('kode_saldoawal');
    $kode_edit        = $this->input->post('kode_edit');
    $kode_akun        = $this->input->post('kode_akun');
    $jumlah           = str_replace(".", "", $this->input->post('jumlah'));

    if ($kode_edit == "0") {
      $data             = array(
        'kode_saldoawal_bb'   => $kode_saldoawal,
        'kode_akun'           => $kode_akun,
        'jumlah'              => $jumlah
      );
      $this->db->insert('detailsaldoawal_bb', $data);
    } else {
      $data             = array(
        'kode_akun'           => $kode_akun,
        'jumlah'              => $jumlah
      );
      $this->db->where('kode_saldoawal_bb', $kode_saldoawal);
      $this->db->update('detailsaldoawal_bb', $data);
    }
  }

  function update_saldoawal()
  {
    $kode_saldoawal   = $this->input->post('kode_saldoawal');
    $bulan            = $this->input->post('bulan');
    $tahun            = $this->input->post('tahun');
    $tanggal          = $this->input->post('tanggal');

    $data   = array(
      'kode_saldoawal_bb'   => $kode_saldoawal,
      'tanggal'             => $tanggal,
      'bulan'               => $bulan,
      'tahun'               => $tahun
    );

    $this->db->where('kode_saldoawal_bb', $kode_saldoawal);
    $this->db->update('saldoawal_bb', $data);
  }

  function listsumber()
  {
    return $this->db->get('costratio_sumber');
  }

  function getSaldoAwal()
  {
    $kode_saldoawal_bb = $this->uri->segment(3);
    return $this->db->query("SELECT * FROM saldoawal_bb WHERE kode_saldoawal_bb = '$kode_saldoawal_bb' ");
  }

  function hapus_detailsaldoawal()
  {
    $kode_saldoawal_bb    = $this->input->post('kode_saldoawal');
    $kode_akun            = $this->input->post('kode_akun');
    return $this->db->query("DELETE FROM detailsaldoawal_bb WHERE kode_saldoawal_bb = '$kode_saldoawal_bb' AND kode_akun = '$kode_akun' ");
  }

  function hapussaldoawal()
  {
    $kode_saldoawal_bb = $this->uri->segment(3);
    $this->db->query("DELETE FROM saldoawal_bb WHERE kode_saldoawal_bb = '$kode_saldoawal_bb' ");
    redirect('accounting/view_saldoawal');
  }

  function getDetailSaldoAwal()
  {
    $kode_saldoawal_bb   = $this->input->post('kode_saldoawal');
    return $this->db->query("SELECT * FROM detailsaldoawal_bb 
    INNER JOIN coa ON coa.kode_akun=detailsaldoawal_bb.kode_akun
    WHERE kode_saldoawal_bb = '$kode_saldoawal_bb' ");
  }

  function coa()
  {
    return $this->db->query("SELECT * FROM coa WHERE sub_akun != '0' ");
  }

  function ledger($kode_akun = "", $bulan, $tahun)
  {
    //$akunbank = array("1-1201");
    if (in_array($kode_akun, $this->akunbank)) {
      $field = "ledger_bank.bank";
      $value = "BNI";
    } else {
      $field = "ledger_bank.kode_akun";
      $value = $kode_akun;
    }
    return $this->db->query("SELECT buku_besar.no_bukti AS ceknobukti,ledger_bank.kode_akun,coa.nama_akun,tgl_ledger,ledger_bank.no_bukti,jumlah,status_dk,ledger_bank.keterangan,ledger_bank.no_ref,
    bank,buku_besar.debet,buku_besar.kredit
    FROM ledger_bank 
    LEFT JOIN buku_besar ON buku_besar.no_ref = ledger_bank.no_bukti
    INNER JOIN coa ON coa.kode_akun = ledger_bank.kode_akun
    WHERE MONTH(tgl_ledger) = '$bulan' 
    AND YEAR(tgl_ledger) = '$tahun' 
    AND coa.sub_akun != '0' 
    AND $field = '$value' 
    ORDER BY bank,ledger_bank.tgl_ledger,ledger_bank.no_bukti
    ");
  }

  function kaskecil($kode_akun = "", $bulan, $tahun, $cabang)
  {

    return $this->db->query("SELECT kaskecil_detail.id,buku_besar.no_bukti AS ceknobukti,kaskecil_detail.kode_akun,coa.nama_akun,tgl_kaskecil,nobukti,jumlah,status_dk,kaskecil_detail.keterangan,kaskecil_detail.no_ref,
    buku_besar.debet,buku_besar.kredit 
    FROM kaskecil_detail 
    LEFT JOIN buku_besar ON buku_besar.no_ref = kaskecil_detail.id
    INNER JOIN coa ON coa.kode_akun = kaskecil_detail.kode_akun
    WHERE MONTH(tgl_kaskecil) = '$bulan' 
    AND YEAR(tgl_kaskecil) = '$tahun' 
    AND kode_cabang = '$cabang'
    AND coa.sub_akun != '0' 
    AND kaskecil_detail.kode_akun != '$kode_akun' 
    ORDER BY kaskecil_detail.tgl_kaskecil,kaskecil_detail.nobukti,kaskecil_detail.date_created
    ");
  }

  function pembelian($kode_akun = "", $bulan, $tahun)
  {

    return $this->db->query("SELECT buku_besar.no_bukti AS ceknobukti,detail_pembelian.kode_akun,coa.nama_akun,kode_dept,tgl_pembelian,detail_pembelian.nobukti_pembelian,qty,harga,status,detail_pembelian.keterangan,detail_pembelian.kode_barang,nama_barang,ket_penjualan,penyesuaian 
    FROM detail_pembelian 
    INNER JOIN pembelian ON pembelian.nobukti_pembelian = detail_pembelian.nobukti_pembelian
    LEFT JOIN barang ON barang.kode_barang = detail_pembelian.kode_barang
    LEFT JOIN buku_besar ON buku_besar.no_bukti = detail_pembelian.nobukti_pembelian
    INNER JOIN coa ON coa.kode_akun = detail_pembelian.kode_akun
    WHERE MONTH(tgl_pembelian) = '$bulan' 
    AND YEAR(tgl_pembelian) = '$tahun' 
    AND coa.sub_akun != '0' 
    AND detail_pembelian.kode_akun = '$kode_akun' 
    ORDER BY tgl_pembelian
    ");
  }

  function penjualan($kode_akun = "", $bulan, $tahun)
  {

    return $this->db->query("SELECT 
    buku_besar.no_bukti AS ceknobukti,
    buku_besar.kredit AS kredit,
    tgltransaksi,
    master_barang.kode_produk,
    master_barang.nama_barang,
    master_barang.kode_akun,
    penjualan.no_fak_penj,
    LEFT(penjualan.no_fak_penj,3) AS cabang,
    detailpenjualan.subtotal

    FROM penjualan 
    LEFT JOIN buku_besar ON buku_besar.no_ref = penjualan.no_fak_penj
    INNER JOIN detailpenjualan ON detailpenjualan.no_fak_penj=penjualan.no_fak_penj
    LEFT JOIN barang ON barang.kode_barang=detailpenjualan.kode_barang
    LEFT JOIN master_barang ON barang.kode_produk=master_barang.kode_produk
    WHERE MONTH(tgltransaksi) = '$bulan'
    AND YEAR(tgltransaksi) = '$tahun' AND master_barang.kode_akun = '$kode_akun' 
    ORDER BY tgltransaksi,penjualan.no_fak_penj ASC
    ");
  }

  function penjualannet($bulan, $tahun)
  {

    return $this->db->query("SELECT 
    buku_besar.no_bukti AS ceknobukti,
    buku_besar.debet AS debet,
    penjualan.tgltransaksi,
    penjualan.no_fak_penj,
    penjualan.total
  
    FROM penjualan 
    LEFT JOIN buku_besar ON buku_besar.no_ref = penjualan.no_fak_penj
    WHERE MONTH(tgltransaksi) = '$bulan'
    AND YEAR(tgltransaksi) = '$tahun' 
    ORDER BY tgltransaksi,penjualan.no_fak_penj ASC
    ");
  }

  function potonganpenjualan($bulan, $tahun)
  {

    return $this->db->query("SELECT 
    buku_besar.no_bukti AS ceknobukti,
    buku_besar.debet AS debet,
    penjualan.tgltransaksi,
    penjualan.no_fak_penj,
    penjualan.potongan,
    penjualan.potistimewa
  
    FROM penjualan 
    LEFT JOIN buku_besar ON buku_besar.no_ref = penjualan.no_fak_penj
    WHERE MONTH(tgltransaksi) = '$bulan'
    AND YEAR(tgltransaksi) = '$tahun' AND penjualan.potongan != '0'
    ORDER BY tgltransaksi,penjualan.no_fak_penj ASC
    ");
  }

  function penypenjualan($bulan, $tahun)
  {

    return $this->db->query("SELECT 
    buku_besar.no_bukti AS ceknobukti,
    buku_besar.debet AS debet,
    penjualan.tgltransaksi,
    penjualan.no_fak_penj,
    penjualan.penyharga AS total
  
    FROM penjualan 
    LEFT JOIN buku_besar ON buku_besar.no_ref = penjualan.no_fak_penj
    WHERE MONTH(tgltransaksi) = '$bulan'
    AND YEAR(tgltransaksi) = '$tahun' AND penjualan.penyharga != '0'
    ORDER BY tgltransaksi,penjualan.no_fak_penj ASC
    ");
  }


  function totalretur($bulan, $tahun)
  {

    return $this->db->query("SELECT 
    SUM(retur.total) AS total
  
    FROM retur 
    WHERE MONTH(tglretur) = '$bulan'
    AND YEAR(tglretur) = '$tahun' AND retur.total != '0'
    ORDER BY tglretur,retur.no_fak_penj ASC
    ");
  }


  function returpenjualan($bulan, $tahun)
  {

    return $this->db->query("SELECT 
    buku_besar.no_bukti AS ceknobukti,
    buku_besar.debet AS debet,
    retur.tglretur,
    retur.no_fak_penj,
    retur.total
  
    FROM retur 
    LEFT JOIN buku_besar ON buku_besar.no_ref = retur.no_fak_penj
    WHERE MONTH(tglretur) = '$bulan'
    AND YEAR(tglretur) = '$tahun' AND retur.total != '0'
    ORDER BY tglretur,retur.no_fak_penj ASC
    ");
  }

  function penyesuaian($kode_akun = "", $bulan, $tahun)
  {

    return $this->db->query("SELECT * FROM buku_besar 
    WHERE MONTH(tanggal) = '$bulan' 
    AND YEAR(tanggal) = '$tahun' 
    AND buku_besar.kode_akun = '$kode_akun' AND sumber='PNY'
    ORDER BY tanggal
    ");
  }

  function getPenyesuaian($nobukti)
  {
    $this->db->where('no_bukti', $nobukti);
    return $this->db->get('buku_besar');
  }

  function insert_bukubesar($kode_akun = "", $bulan, $tahun, $cabang)
  {

    $thn = substr($tahun, 2, 2);
    $qbukubesar        = "SELECT no_bukti FROM buku_besar WHERE LEFT(no_bukti,6) = 'GJ$bulan$thn' ORDER BY no_bukti DESC LIMIT 1 ";
    // $datapemb = $this->db->query("SELECT detail_pembelian.kode_akun,coa.nama_akun,kode_dept,tgl_pembelian,detail_pembelian.nobukti_pembelian,qty,harga,status,keterangan,detail_pembelian.kode_barang,nama_barang,ket_penjualan,penyesuaian 
    // FROM detail_pembelian 
    // INNER JOIN pembelian ON pembelian.nobukti_pembelian = detail_pembelian.nobukti_pembelian
    // LEFT JOIN barang ON barang.kode_barang = detail_pembelian.kode_barang
    // INNER JOIN coa ON coa.kode_akun = detail_pembelian.kode_akun
    // WHERE MONTH(tgl_pembelian) = '$bulan' 
    // AND YEAR(tgl_pembelian) = '$tahun' 
    // AND coa.sub_akun != '0' 
    // AND detail_pembelian.kode_akun = '$kode_akun' 
    // ORDER BY tgl_pembelian")->result();

    // foreach ($datapemb as $d) {
    //   $datapemb2 = array(
    //     'no_bukti' => $d->nobukti_pembelian,
    //     'tanggal' => $d->tgl_pembelian,
    //     'sumber' => "Pembelian",
    //     'keterangan' => $d->keterangan,
    //     'kode_akun' => $d->kode_akun,
    //     'debet' => $d->qty * $d->harga + $d->penyesuaian,
    //     'kredit' => "0"
    //   );
    //   $this->db->insert('buku_besar', $datapemb2);
    // }

    $datakaskecil = $this->db->query("SELECT kaskecil_detail.id,kaskecil_detail.kode_akun,coa.nama_akun,tgl_kaskecil,nobukti,jumlah,status_dk,keterangan,no_ref 
    FROM kaskecil_detail 
    INNER JOIN coa ON coa.kode_akun = kaskecil_detail.kode_akun
    WHERE MONTH(tgl_kaskecil) = '$bulan' 
    AND YEAR(tgl_kaskecil) = '$tahun' 
    AND kode_cabang = '$cabang'
    AND kaskecil_detail.kode_akun != '$kode_akun' 
    ORDER BY kaskecil_detail.tgl_kaskecil
    ")->result();

    foreach ($datakaskecil as $d) {

      $ceknolast      = $this->db->query($qbukubesar)->row_array();
      $nobuktilast    = $ceknolast['no_bukti'];
      $nobukti        = buatkode($nobuktilast, 'GJ' . $bulan . $thn, 6);
      //var_dump($ceknolast);
      // /die;
      if ($d->status_dk == "D") {
        $kredit = $d->jumlah;
        $debet = "0";
      } else {
        $debet = $d->jumlah;
        $kredit = "0";
      }
      $datakaskecli2 = array(
        'no_bukti' => $nobukti,
        'tanggal' => $d->tgl_kaskecil,
        'sumber' => "Kas Kecil",
        'keterangan' => $d->keterangan,
        'kode_akun' => $kode_akun,
        'debet' => $debet,
        'kredit' => $kredit,
        'nobukti_transaksi' => $d->nobukti,
        'no_ref' => $d->id
      );
      $this->db->insert('buku_besar', $datakaskecli2);
    }
    //Ledger
    if (in_array($kode_akun, $this->akunbank)) {
      $field = "ledger_bank.bank";
      $value = "BNI";
    } else {
      $field = "ledger_bank.kode_akun";
      $value = $kode_akun;
    }
    $dataledger = $this->db->query("SELECT ledger_bank.kode_akun,coa.nama_akun,tgl_ledger,no_bukti,jumlah,status_dk,keterangan,ledger_bank.no_ref 
    FROM ledger_bank 
    INNER JOIN coa ON coa.kode_akun = ledger_bank.kode_akun
    WHERE MONTH(tgl_ledger) = '$bulan' 
    AND YEAR(tgl_ledger) = '$tahun' 
    AND coa.sub_akun != '0' 
    AND $field = '$value' 
    ORDER BY ledger_bank.tgl_ledger
    ")->result();

    foreach ($dataledger as $d) {
      $ceknolast      = $this->db->query($qbukubesar)->row_array();
      $nobuktilast    = $ceknolast['no_bukti'];
      $nobukti        = buatkode($nobuktilast, 'GJ' . $bulan . $thn, 6);
      if (in_array($kode_akun, $this->akunbank)) {
        if ($d->status_dk == "D") {
          $kredit = $d->jumlah;
          $debet = "0";
        } else {
          $debet = $d->jumlah;
          $kredit = "0";
        }
        $kodeakun = $kode_akun;
      } else {
        if ($d->status_dk == "D") {
          $debet = $d->jumlah;
          $kredit = "0";
        } else {
          $kredit = $d->jumlah;
          $debet = "0";
        }
        $kode_akun = $d->kode_akun;
      }
      $dataledger2 = array(
        'no_bukti' => $nobukti,
        'tanggal' => $d->tgl_ledger,
        'sumber' => "Ledger",
        'keterangan' => $d->keterangan,
        'kode_akun' => $kode_akun,
        'debet' => $debet,
        'kredit' => $kredit,
        'nobukti_transaksi' => $d->no_bukti,
        'no_ref' => $d->no_bukti
      );
      $this->db->insert('buku_besar', $dataledger2);
    }

    $datapenjualan = $this->db->query("SELECT 
    tgltransaksi,
    master_barang.kode_produk,
    master_barang.nama_barang,
    penjualan.no_fak_penj,
    LEFT(penjualan.no_fak_penj,3) AS cabang,
    detailpenjualan.subtotal

    FROM penjualan 
    INNER JOIN detailpenjualan ON detailpenjualan.no_fak_penj=penjualan.no_fak_penj
    INNER JOIN barang ON barang.kode_barang=detailpenjualan.kode_barang
    INNER JOIN master_barang ON barang.kode_produk=master_barang.kode_produk
    WHERE MONTH(tgltransaksi) = '$bulan'
    AND YEAR(tgltransaksi) = '$tahun' AND master_barang.kode_akun = '$kode_akun'
    ORDER BY tgltransaksi ASC
    ")->result();

    foreach ($datapenjualan as $d) {

      $ceknolast      = $this->db->query($qbukubesar)->row_array();
      $nobuktilast    = $ceknolast['no_bukti'];
      $nobukti        = buatkode($nobuktilast, 'GJ' . $bulan . $thn, 6);

      $datapenjualan = array(
        'no_bukti' => $nobukti,
        'tanggal' => $d->tgltransaksi,
        'sumber' => "Penjualan",
        'keterangan' => $d->nama_barang,
        'kode_akun' => $kode_akun,
        'debet' => "",
        'kredit' => $d->subtotal,
        'no_ref' => $d->no_fak_penj,
        'nobukti_transaksi' => ""
      );
      $this->db->insert('buku_besar', $datapenjualan);
    }
  }


  function insertcostratiobiaya()
  {
    $tanggal = $this->input->post('tgl_transaksi');
    $id_user   = $this->session->userdata('id_user');
    $keterangan = $this->input->post('keterangan');

    $dataledger = $this->db->query("SELECT costratio_temp.kode_cabang,id,jumlah,nama_cabang,nama_akun,costratio_temp.kode_akun FROM costratio_temp 
    INNER JOIN coa ON coa.kode_akun=costratio_temp.kode_akun
    INNER JOIN cabang ON cabang.kode_cabang=costratio_temp.kode_cabang
    WHERE id_user = '$id_user'
    ")->result();

    foreach ($dataledger as $d) {
      $tgltransaksi = explode("-", $tanggal);
      $bulan = $tgltransaksi[1];
      $tahun = $tgltransaksi[0];
      if (strlen($bulan) == 1) {
        $bulan = "0" . $bulan;
      } else {
        $bulan = $bulan;
      }
      $thn = substr($tahun, 2, 2);
      $awal = $tahun . "-" . $bulan . "-01";
      $akhir = $tahun . "-" . $bulan . "-31";
      $qcr = "SELECT kode_cr FROM costratio_biaya WHERE tgl_transaksi BETWEEN '$awal' AND '$akhir' ORDER BY kode_cr DESC LIMIT 1 ";
      $ceknolast = $this->db->query($qcr)->row_array();
      $nobuktilast = $ceknolast['kode_cr'];
      $kodecr = buatkode($nobuktilast, "CR" . $bulan . $thn, 4);


      $datacr = [
        'kode_cr' => $kodecr,
        'tgl_transaksi' => $tanggal,
        'kode_akun'    => $d->kode_akun,
        'keterangan'   => $keterangan,
        'kode_cabang'  => $d->kode_cabang,
        'id_sumber_costratio' => "3",
        'jumlah' => $d->jumlah
      ];
      $simpan = $this->db->insert('costratio_biaya', $datacr);
    }
    if ($simpan) {

      $id_user       = $this->session->userdata('id_user');
      $this->db->query("DELETE FROM costratio_temp WHERE id_user = '$id_user' ");

      $this->session->set_flashdata(
        'msg',

        '<div class="alert bg-green text-white text-white alert-dismissible" role="alert">

      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <i class="fa fa-check"></i> Data Berhasil Disimpan !

      </div>'
      );
      redirect('accounting/costratiobiaya');
    }
  }


  function updatecostratiobiaya()
  {
    $tanggal = $this->input->post('tgl_transaksi');
    $cabang = $this->input->post('cabang');
    $kodeakun = $this->input->post('kodeakun');
    $keterangan = $this->input->post('keterangan');
    $jumlah = str_replace(".", "", $this->input->post('jumlah'));
    $sumber = $this->input->post('sumber');
    $kodecr = $this->input->post('kodecr');
    $datacr = [
      'tgl_transaksi' => $tanggal,
      'kode_akun'    => $kodeakun,
      'keterangan'   => $keterangan,
      'kode_cabang'  => $cabang,
      'id_sumber_costratio' => $sumber,
      'jumlah' => $jumlah
    ];

    $simpan = $this->db->update('costratio_biaya', $datacr, array('kode_cr' => $kodecr));
    if ($simpan) {
      $this->session->set_flashdata(
        'msg',

        '<div class="alert bg-green text-white text-white alert-dismissible" role="alert">

      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <i class="fa fa-check"></i> Data Berhasil Di Update !

      </div>'
      );
      redirect('accounting/costratiobiaya');
    }
  }

  function getCostRatio($kodecr)
  {
    $this->db->where('kode_cr', $kodecr);
    $this->db->select('kode_cr,tgl_transaksi,costratio_biaya.kode_akun,nama_akun,costratio_biaya.id_sumber_costratio,jumlah,keterangan,nama_sumber,kode_cabang');
    $this->db->from('costratio_biaya');
    $this->db->join('coa', 'costratio_biaya.kode_akun = coa.kode_akun', 'left');
    $this->db->join('costratio_sumber', 'costratio_biaya.id_sumber_costratio = costratio_sumber.id_sumber_costratio');
    $this->db->order_by('kode_cabang,costratio_biaya.kode_akun', 'asc');
    return $this->db->get();
  }

  function hapuscostratiobiaya($kodecr)
  {
    $hapus = $this->db->delete('costratio_biaya', array('kode_cr' => $kodecr));
    if ($hapus) {
      $this->session->set_flashdata(
        'msg',

        '<div class="alert bg-green text-white text-white alert-dismissible" role="alert">

      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <i class="fa fa-check"></i> Data Berhasil Di Hapus !

      </div>'
      );
      redirect('accounting/costratiobiaya');
    }
  }

  function hapusbukubesar($nobukti)
  {
    $hapus = $this->db->delete('buku_besar', array('no_bukti' => $nobukti));
    if ($hapus) {
      return 1;
    } else {
      return 0;
    }
  }

  function tambahbukubesar($nobukti, $sumber, $bulan, $tahun, $noref, $kodeakun)
  {
    $thn = substr($tahun, 2, 2);
    $qbukubesar        = "SELECT no_bukti FROM buku_besar WHERE LEFT(no_bukti,6) = 'GJ$bulan$thn' ORDER BY no_bukti DESC LIMIT 1 ";
    $ceknolast      = $this->db->query($qbukubesar)->row_array();
    $nobuktilast    = $ceknolast['no_bukti'];
    $nobukti        = buatkode($nobuktilast, 'GJ' . $bulan . $thn, 4);
    if ($sumber == "Ledger") {
      $ledger = $this->db->get_where('ledger_bank', array('no_bukti' => $noref))->row_array();
      if (in_array($kodeakun, $this->akunbank)) {
        if ($ledger['status_dk'] == "D") {
          $kredit = $ledger['jumlah'];
          $debet = 0;
        } else {
          $kredit = 0;
          $debet = $ledger['jumlah'];
        }
        $kode_akun = $kodeakun;
      } else {
        if ($ledger['status_dk'] == "D") {
          $debet = $ledger['jumlah'];
          $kredit = 0;
        } else {
          $debet = 0;
          $kredit = $ledger['jumlah'];
        }
        $kode_akun = $ledger['kode_akun'];
      }
      $data = array(
        'no_bukti' => $nobukti,
        'tanggal' => $ledger['tgl_ledger'],
        'sumber' => $sumber,
        'keterangan' => $ledger['keterangan'],
        'kode_akun' => $kode_akun,
        'debet' => $debet,
        'kredit' => $kredit,
        'nobukti_transaksi' => $ledger['no_bukti'],
        'no_ref' => $noref
      );
      $simpan = $this->db->insert('buku_besar', $data);
      if ($simpan) {
        return 1;
      }
    } else if ($sumber == "Kas Kecil") {
      $kaskecil = $this->db->get_where('kaskecil_detail', array('id' => $noref))->row_array();
      if ($kaskecil['status_dk'] == "D") {
        $kredit = $kaskecil['jumlah'];
        $debet = 0;
      } else {
        $kredit = 0;
        $debet = $kaskecil['jumlah'];
      }
      $data = array(
        'no_bukti' => $nobukti,
        'tanggal' => $kaskecil['tgl_kaskecil'],
        'sumber' => $sumber,
        'keterangan' => $kaskecil['keterangan'],
        'kode_akun' => $kodeakun,
        'debet' => $debet,
        'kredit' => $kredit,
        'nobukti_transaksi' => $kaskecil['nobukti'],
        'no_ref' => $noref
      );
      $simpan = $this->db->insert('buku_besar', $data);
    } else if ($sumber == "Penjualan") {
      $penjualan = $this->db->query("SELECT * FROM penjualan LEFT JOIN detailpenjualan ON penjualan.no_fak_penj = detailpenjualan.no_fak_penj LEFT JOIN barang ON barang.kode_barang = detailpenjualan.kode_barang LEFT JOIN master_barang ON barang.kode_produk = master_barang.kode_produk WHERE detailpenjualan.no_fak_penj = '$noref' AND master_barang.kode_akun = '$kodeakun' ")->row_array();
      $data = array(
        'no_bukti' => $nobukti,
        'tanggal' => $penjualan['tgltransaksi'],
        'sumber' => $sumber,
        'keterangan' => $penjualan['nama_barang'],
        'kode_akun' => $kodeakun,
        'debet' => "",
        'kredit' => $penjualan['subtotal'],
        'nobukti_transaksi' => $penjualan['no_fak_penj'],
        'no_ref' => $noref
      );
      $simpan = $this->db->insert('buku_besar', $data);
    } else if ($sumber == "Penjualan Netto") {
      $penjualan = $this->db->query("SELECT * FROM penjualan WHERE penjualan.no_fak_penj = '$noref' ")->row_array();
      $data = array(
        'no_bukti' => $nobukti,
        'tanggal' => $penjualan['tgltransaksi'],
        'sumber' => $sumber,
        'keterangan' => "Penjualan Netto",
        'kode_akun' => $kodeakun,
        'debet' => $penjualan['total'],
        'kredit' => "",
        'nobukti_transaksi' => $penjualan['no_fak_penj'],
        'no_ref' => $noref
      );
      $simpan = $this->db->insert('buku_besar', $data);
    } else if ($sumber == "Potongan Penjualan") {
      $penjualan = $this->db->query("SELECT * FROM penjualan WHERE penjualan.no_fak_penj = '$noref' ")->row_array();
      $data = array(
        'no_bukti' => $nobukti,
        'tanggal' => $penjualan['tgltransaksi'],
        'sumber' => $sumber,
        'keterangan' => "Potongan Penjualan",
        'kode_akun' => $kodeakun,
        'debet' => $penjualan['potongan'],
        'nobukti_transaksi' => $penjualan['no_fak_penj'],
        'no_ref' => $noref
      );
      $simpan = $this->db->insert('buku_besar', $data);
    } else if ($sumber == "Retur Penjualan") {
      $penjualan = $this->db->query("SELECT * FROM penjualan WHERE penjualan.no_fak_penj = '$noref' ")->row_array();
      $data = array(
        'no_bukti' => $nobukti,
        'tanggal' => $penjualan['tgltransaksi'],
        'sumber' => $sumber,
        'keterangan' => "Potongan Penjualan",
        'kode_akun' => $kodeakun,
        'debet' => $penjualan['potongan'],
        'nobukti_transaksi' => $penjualan['no_fak_penj'],
        'no_ref' => $noref
      );
      $simpan = $this->db->insert('buku_besar', $data);
    }else if ($sumber == "Retur Penjualan") {
      $penjualan = $this->db->query("SELECT * FROM penjualan WHERE penjualan.no_fak_penj = '$noref' ")->row_array();
      $data = array(
        'no_bukti' => $nobukti,
        'tanggal' => $penjualan['tgltransaksi'],
        'sumber' => $sumber,
        'keterangan' => "Potongan Penjualan",
        'kode_akun' => $kodeakun,
        'debet' => $penjualan['potongan'],
        'nobukti_transaksi' => $penjualan['no_fak_penj'],
        'no_ref' => $noref
      );
      $simpan = $this->db->insert('buku_besar', $data);
    }
  }
  Penyesuaian Penjualan
  function updatebukubesar($nobukti, $sumber, $noref, $kode_akun)
  {
    if ($sumber == "Ledger") {
      $ledger = $this->db->get_where('ledger_bank', array('no_bukti' => $noref))->row_array();
      if (in_array($kode_akun, $this->akunbank)) {
        if ($ledger['status_dk'] == "D") {
          $kredit = $ledger['jumlah'];
          $debet = 0;
        } else {
          $kredit = 0;
          $debet = $ledger['jumlah'];
        }
      } else {
        if ($ledger['status_dk'] == "D") {
          $debet = $ledger['jumlah'];
          $kredit = 0;
        } else {
          $debet = 0;
          $kredit = $ledger['jumlah'];
        }
      }

      $data = array(
        'debet' => $debet,
        'kredit' => $kredit
      );
      $simpan = $this->db->update('buku_besar', $data, array('no_bukti' => $nobukti));
      if ($simpan) {
        return 1;
      }
    } else if ($sumber == "Kas Kecil") {
      $kaskecil = $this->db->get_where('kaskecil_detail', array('id' => $noref))->row_array();
      if ($kaskecil['status_dk'] == "D") {
        $kredit = $kaskecil['jumlah'];
        $debet = 0;
      } else {
        $kredit = 0;
        $debet = $kaskecil['jumlah'];
      }
      $data = array(
        'debet' => $debet,
        'kredit' => $kredit
      );
      $simpan = $this->db->update('buku_besar', $data, array('no_bukti' => $nobukti));
      if ($simpan) {
        return 1;
      }
    }
  }

  function insert_jurnal_umum_temp()
  {

    $kode_akun            = $this->input->post('kode_akun');
    $jumlah               = str_replace(".", "", $this->input->post('jumlah'));
    $jenis_jurnal         = $this->input->post('jenis_jurnal');
    $keterangan           = $this->input->post('keterangan');
    $id_user              = $this->session->userdata('id_user');

    if ($jenis_jurnal == "K") {
      $kredit = $jumlah;
      $debet  = "0";
    } else {
      $debet  = $jumlah;
      $kredit = "0";
    }
    $data   = array(
      'kode_akun'             => $kode_akun,
      'keterangan'            => $keterangan,
      'debet'                 => $debet,
      'kredit'                => $kredit,
      'jenis_jurnal'          => $jenis_jurnal,
      'id_user'               => $id_user
    );

    $this->db->query("DELETE FROM jurnal_umum_temp WHERE kode_akun = '$kode_akun' AND id_user = '$id_user' ");
    $this->db->insert('jurnal_umum_temp', $data);
  }


  function insert_jurnal_umum()
  {

    $tanggal            = $this->input->post('tanggal');
    $ket                = $this->input->post('ket');
    $id_user            = $this->session->userdata('id_user');


    $datatemp  = $this->db->query("SELECT * FROM jurnal_umum_temp WHERE id_user = '$id_user' ");

    foreach ($datatemp->result() as $d) {

      $array1             = explode("-", $tanggal);
      $tahun              = $array1[0];
      $bulan              = $array1[1];

      $thn = substr($tahun, 2, 2);
      $qbukubesar         = "SELECT no_bukti FROM buku_besar WHERE LEFT(no_bukti,6) = 'GJ$bulan$thn' ORDER BY no_bukti DESC LIMIT 1 ";
      $ceknolast          = $this->db->query($qbukubesar)->row_array();
      $nobuktilast        = $ceknolast['no_bukti'];
      $nobukti            = buatkode($nobuktilast, 'GJ' . $bulan . $thn, 4);

      $data   = array(
        'no_bukti'              => $nobukti,
        'tanggal'               => $tanggal,
        'kode_akun'             => $d->kode_akun,
        'keterangan'            => $ket,
        'debet'                 => $d->debet,
        'kredit'                => $d->kredit,
        'no_ref'                => "",
        'sumber'                => "GU"
      );
      $this->db->insert('buku_besar', $data);
    }

    $this->db->query("DELETE FROM jurnal_umum_temp WHERE id_user = '$id_user' ");
  }

  function update_jurnal_umum()
  {

    $nobukti            = $this->input->post('nobukti');
    $tanggal            = $this->input->post('tanggal');
    $debet              = str_replace(",", "", $this->input->post('debet'));
    $kredit             = str_replace(",", "", $this->input->post('kredit'));
    $kode_akun          = $this->input->post('kode_akun');
    $ket                = $this->input->post('keterangan');

    $data   = array(
      'tanggal'               => $tanggal,
      'kode_akun'             => $kode_akun,
      'keterangan'            => $ket,
      'debet'                 => $debet,
      'kredit'                => $kredit,
    );
    $this->db->where('no_bukti', $nobukti);
    $this->db->update('buku_besar', $data);
  }

  function insert_tempcostratio()
  {

    $kode_akun          = $this->input->post('kode_akun');
    $jumlah             = str_replace(".", "", $this->input->post('jumlah'));
    $cabang             = $this->input->post('cabang');
    $id_user            = $this->session->userdata('id_user');

    $data   = array(
      'kode_akun'             => $kode_akun,
      'jumlah'                => $jumlah,
      'kode_cabang'           => $cabang,
      'id_user'               => $id_user,
    );
    $this->db->insert('costratio_temp', $data);
  }

  function hapus_jurnal_umum_temp()
  {

    $kode_akun            = $this->input->post('kode_akun');
    $id_user              = $this->session->userdata('id_user');
    return $this->db->query("DELETE FROM jurnal_umum_temp WHERE kode_akun = '$kode_akun' AND id_user = '$id_user' ");
  }

  function hapus_costratiotemp()
  {

    $id            = $this->input->post('id');
    $id_user       = $this->session->userdata('id_user');
    return $this->db->query("DELETE FROM costratio_temp WHERE id = '$id' AND id_user = '$id_user' ");
  }

  function getJurnalUmumTemp()
  {
    $id_user   = $this->session->userdata('id_user');
    return $this->db->query("SELECT * FROM jurnal_umum_temp 
    INNER JOIN coa ON coa.kode_akun=jurnal_umum_temp.kode_akun
    WHERE id_user = '$id_user' ");
  }

  function getJurnalUmum($kode_akun, $dari, $sampai)
  {


    if ($kode_akun != "") {
      $kode_akun = "AND buku_besar.kode_akun = '$kode_akun' ";
    }

    return $this->db->query("SELECT * FROM buku_besar 
    INNER JOIN coa ON coa.kode_akun=buku_besar.kode_akun
    WHERE sumber = 'GU' AND tanggal BETWEEN '$dari' AND '$sampai' "
      . $kode_akun
      . "
    ");
  }

  function getEditJurnalUmum($nobukti)
  {
    return $this->db->query("SELECT * FROM buku_besar 
    INNER JOIN coa ON coa.kode_akun=buku_besar.kode_akun
    WHERE sumber = 'GU' AND no_bukti = '$nobukti'
    ");
  }

  function getDataTempCostratio()
  {
    $id_user   = $this->session->userdata('id_user');
    return $this->db->query("SELECT id,jumlah,nama_cabang,nama_akun,costratio_temp.kode_akun FROM costratio_temp 
    INNER JOIN coa ON coa.kode_akun=costratio_temp.kode_akun
    INNER JOIN cabang ON cabang.kode_cabang=costratio_temp.kode_cabang
    WHERE id_user = '$id_user'
    ");
  }
}
