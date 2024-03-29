<?php

class Model_laporanbahan extends CI_Model
{

  function getDepartemen()
  {

    $query = "
    SELECT * FROM departemen 
    ";
    return $this->db->query($query);
  }

  function cekNextBulan($bulan, $tahun)
  {

    $this->db->order_by('tgl_pengeluaran', 'desc');
    $this->db->limit(1);
    return $this->db->get_where('pengeluaran_gb', array(
      'MONTH(tgl_pengeluaran)' => $bulan,
      'YEAR(tgl_pengeluaran)' => $tahun
    ));
  }


  function getKategori()
  {

    $kodedept = $this->session->userdata('dept');
    $query = "
    SELECT * FROM kategori_barang_pembelian 
    WHERE kode_dept = '$kodedept'
    ";
    return $this->db->query($query);
  }


  function getbarang($kode_barang)
  {
    if ($kode_barang != "") {

      $kode_barang = "AND master_barang_pembelian.kode_barang = '" . $kode_barang . "' ";
    }

    $query = "
    SELECT * FROM master_barang_pembelian WHERE kode_dept = 'GDB' "
      . $kode_barang
      . "
    ORDER BY nama_barang
    ";
    return $this->db->query($query);
  }

  function saldoAwal($bulan, $tahun, $kode_barang)
  {
    if ($kode_barang != "") {

      $kode_barang = "AND saldoawal_gb_detail.kode_barang = '" . $kode_barang . "' ";
    }
    $query = "SELECT 
    SUM( qty_unit ) AS qtyunitsa,
    SUM( qty_berat ) AS qtyberatsa 
    FROM saldoawal_gb_detail 
    INNER JOIN saldoawal_gb ON saldoawal_gb.kode_saldoawal_gb=saldoawal_gb_detail.kode_saldoawal_gb
    WHERE bulan = '$bulan' AND tahun = '$tahun' "
      . $kode_barang
      . "
    ";
    return $this->db->query($query);
  }

  function list_detailPersediaan($bulan, $tahun, $kode_kategori = "")
  {
    $role = $this->session->userdata('level_user');
    if ($role == 'admin pembelian 2') {
      $orderby = "master_barang_pembelian.nama_barang,";
    } else {
      $orderby = "";
    }

    $query = "SELECT 
    master_barang_pembelian.kode_barang,
    master_barang_pembelian.nama_barang,
    master_barang_pembelian.satuan,
    master_barang_pembelian.jenis_barang,
    sa.qtyunitsa,
    sa.qtyberatsa,
    op.qtyunitop,
    op.qtyberatop,
    gm.qtypemb1,
    gm.qtylainnya1,
    gm.qtypemb2,
    gm.qtylainnya2,
    gm.qtypengganti2,
    gm.qtypengganti1,
    gk.qtyprod3,
    gk.qtyseas3,
    gk.qtypdqc3,
    gk.qtysus3,
    gk.qtycabang3,
    gk.qtylain3,
    gk.qtyprod4,
    gk.qtyseas4,
    gk.qtypdqc4,
    gk.qtysus4,
    gk.qtycabang4,
    gk.qtylain4,
    hrgsa.harga,
    dp.totalharga

    FROM master_barang_pembelian

    LEFT JOIN (SELECT saldoawal_gb_detail.kode_barang,SUM( qty_unit ) AS qtyunitsa,SUM( qty_berat ) AS qtyberatsa FROM saldoawal_gb_detail 
    INNER JOIN saldoawal_gb ON saldoawal_gb.kode_saldoawal_gb=saldoawal_gb_detail.kode_saldoawal_gb
    WHERE bulan = '$bulan' AND tahun = '$tahun' GROUP BY saldoawal_gb_detail.kode_barang ) sa ON (master_barang_pembelian.kode_barang = sa.kode_barang)

    LEFT JOIN (SELECT opname_gb_detail.kode_barang,SUM( qty_unit ) AS qtyunitop,SUM( qty_berat ) AS qtyberatop FROM opname_gb_detail 
    INNER JOIN opname_gb ON opname_gb.kode_opname_gb=opname_gb_detail.kode_opname_gb
    WHERE bulan = '$bulan' AND tahun = '$tahun' GROUP BY opname_gb_detail.kode_barang ) op ON (master_barang_pembelian.kode_barang = op.kode_barang)

    LEFT JOIN (SELECT SUM((qty*harga)+penyesuaian) as totalharga,kode_barang
      FROM detail_pembelian 
      INNER JOIN pembelian ON detail_pembelian.nobukti_pembelian = pembelian.nobukti_pembelian
      WHERE MONTH(tgl_pembelian) = '$bulan' AND YEAR(tgl_pembelian) = '$tahun' 
      GROUP BY kode_barang) dp ON (master_barang_pembelian.kode_barang = dp.kode_barang)

    LEFT JOIN (SELECT kode_barang,harga
      FROM saldoawal_harga_gb 
      WHERE bulan = '$bulan' AND tahun = '$tahun' 
      GROUP BY kode_barang,harga) hrgsa ON (master_barang_pembelian.kode_barang = hrgsa.kode_barang)

    LEFT JOIN (SELECT 
    detail_pemasukan_gb.kode_barang,
    SUM( IF( departemen = 'Pembelian' , qty_unit ,0 )) AS qtypemb1,
    SUM( IF( departemen = 'Lainnya' , qty_unit ,0 )) AS qtylainnya1,
    SUM( IF( departemen = 'Retur Pengganti' , qty_unit ,0 )) AS qtypengganti1,

    SUM( IF( departemen = 'Pembelian' , qty_berat ,0 )) AS qtypemb2,
    SUM( IF( departemen = 'Lainnya' , qty_berat ,0 )) AS qtylainnya2,
    SUM( IF( departemen = 'Retur Pengganti' , qty_berat ,0 )) AS qtypengganti2,
    SUM( (IF( departemen = 'Pembelian' , qty_berat ,0 )) + (IF( departemen = 'Lainnya' , qty_berat ,0 ))) AS pemasukanqtyberat
    FROM 
    detail_pemasukan_gb 
    INNER JOIN pemasukan_gb ON detail_pemasukan_gb.nobukti_pemasukan = pemasukan_gb.nobukti_pemasukan 
    WHERE MONTH(tgl_pemasukan) = '$bulan' AND YEAR(tgl_pemasukan) = '$tahun' 
    GROUP BY detail_pemasukan_gb.kode_barang) gm ON (master_barang_pembelian.kode_barang = gm.kode_barang)

    LEFT JOIN (SELECT 
    detail_pengeluaran_gb.kode_barang,
    SUM( IF( pengeluaran_gb.kode_dept = 'Produksi' , qty_unit ,0 )) AS qtyprod3,
    SUM( IF( pengeluaran_gb.kode_dept = 'Seasoning' , qty_unit ,0 )) AS qtyseas3,
    SUM( IF( pengeluaran_gb.kode_dept = 'PDQC' , qty_unit ,0 )) AS qtypdqc3,
    SUM( IF( pengeluaran_gb.kode_dept = 'Susut' , qty_unit ,0 )) AS qtysus3,
    SUM( IF( pengeluaran_gb.kode_dept = 'Lainnya' , qty_unit ,0 )) AS qtylain3,
    SUM( IF( pengeluaran_gb.kode_dept = 'Cabang' , qty_unit ,0 )) AS qtycabang3,

    SUM( IF( pengeluaran_gb.kode_dept = 'Produksi' , qty_berat ,0 )) AS qtyprod4,
    SUM( IF( pengeluaran_gb.kode_dept = 'Seasoning' , qty_berat ,0 )) AS qtyseas4,
    SUM( IF( pengeluaran_gb.kode_dept = 'PDQC' , qty_berat ,0 )) AS qtypdqc4,
    SUM( IF( pengeluaran_gb.kode_dept = 'Susut' , qty_berat ,0 )) AS qtysus4,
    SUM( IF( pengeluaran_gb.kode_dept = 'Lainnya' , qty_berat ,0 )) AS qtylain4,
    SUM( IF( pengeluaran_gb.kode_dept = 'Cabang' , qty_berat ,0 )) AS qtycabang4
    FROM detail_pengeluaran_gb 
    INNER JOIN pengeluaran_gb ON detail_pengeluaran_gb.nobukti_pengeluaran = pengeluaran_gb.nobukti_pengeluaran 
    WHERE MONTH(tgl_pengeluaran) = '$bulan' AND YEAR(tgl_pengeluaran) = '$tahun' 
    GROUP BY detail_pengeluaran_gb.kode_barang) gk ON (master_barang_pembelian.kode_barang = gk.kode_barang)

    WHERE master_barang_pembelian.kode_dept = 'GDB' AND master_barang_pembelian.kode_kategori = '$kode_kategori' 
    ORDER BY 
    $orderby
    master_barang_pembelian.jenis_barang,MID(4,3,master_barang_pembelian.kode_barang),urutan ASC
    ";
    return $this->db->query($query);
  }

  
  function list_detailPersediaangram($bulan, $tahun, $kode_kategori = "")
  {

    $query = "SELECT 
    master_barang_pembelian.kode_barang,
    master_barang_pembelian.nama_barang,
    master_barang_pembelian.satuan,
    master_barang_pembelian.jenis_barang,
    sa.qtyunitsa,
    sa.qtyberatsa,
    op.qtyunitop,
    op.qtyberatop,
    gm.qtypemb1,
    gm.qtylainnya1,
    gm.qtypemb2,
    gm.qtylainnya2,
    gm.qtypengganti2,
    gm.qtypengganti1,
    gk.qtyprod3,
    gk.qtyseas3,
    gk.qtypdqc3,
    gk.qtysus3,
    gk.qtycabang3,
    gk.qtylain3,
    gk.qtyprod4,
    gk.qtyseas4,
    gk.qtypdqc4,
    gk.qtysus4,
    gk.qtycabang4,
    gk.qtylain4,
    hrgsa.harga,
    dp.totalharga

    FROM master_barang_pembelian

    LEFT JOIN (SELECT saldoawal_gb_detail.kode_barang,
    SUM( qty_unit ) AS qtyunitsa,
    SUM( qty_berat ) AS qtyberatsa 
    FROM saldoawal_gb_detail 
    INNER JOIN saldoawal_gb ON saldoawal_gb.kode_saldoawal_gb=saldoawal_gb_detail.kode_saldoawal_gb
    WHERE bulan = '$bulan' AND tahun = '$tahun' GROUP BY saldoawal_gb_detail.kode_barang ) sa ON (master_barang_pembelian.kode_barang = sa.kode_barang)

    LEFT JOIN (SELECT opname_gb_detail.kode_barang,
    SUM( qty_unit ) AS qtyunitop,
    SUM( qty_berat ) AS qtyberatop 
    FROM opname_gb_detail 
    INNER JOIN opname_gb ON opname_gb.kode_opname_gb=opname_gb_detail.kode_opname_gb
    WHERE bulan = '$bulan' AND tahun = '$tahun' GROUP BY opname_gb_detail.kode_barang ) op ON (master_barang_pembelian.kode_barang = op.kode_barang)

    LEFT JOIN (SELECT SUM((qty*harga)+penyesuaian) as totalharga,kode_barang
      FROM detail_pembelian 
      INNER JOIN pembelian ON detail_pembelian.nobukti_pembelian = pembelian.nobukti_pembelian
      WHERE MONTH(tgl_pembelian) = '$bulan' AND YEAR(tgl_pembelian) = '$tahun' 
      GROUP BY kode_barang) dp ON (master_barang_pembelian.kode_barang = dp.kode_barang)

    LEFT JOIN (SELECT kode_barang,harga
      FROM saldoawal_harga_gb 
      WHERE bulan = '$bulan' AND tahun = '$tahun' 
      GROUP BY kode_barang,harga) hrgsa ON (master_barang_pembelian.kode_barang = hrgsa.kode_barang)

    LEFT JOIN (SELECT 
    detail_pemasukan_gb.kode_barang,
    SUM( IF( departemen = 'Pembelian' , qty_unit ,0 )) AS qtypemb1,
    SUM( IF( departemen = 'Lainnya' , qty_unit ,0 )) AS qtylainnya1,
    SUM( IF( departemen = 'Retur Pengganti' , qty_unit ,0 )) AS qtypengganti1,

    SUM( IF( departemen = 'Pembelian' , qty_berat ,0 )) AS qtypemb2,
    SUM( IF( departemen = 'Lainnya' , qty_berat ,0 )) AS qtylainnya2,
    SUM( IF( departemen = 'Retur Pengganti' , qty_berat ,0 )) AS qtypengganti2,
    SUM( (IF( departemen = 'Pembelian' , qty_berat ,0 )) + (IF( departemen = 'Lainnya' , qty_berat ,0 ))) AS pemasukanqtyberat
    FROM 
    detail_pemasukan_gb 
    INNER JOIN pemasukan_gb ON detail_pemasukan_gb.nobukti_pemasukan = pemasukan_gb.nobukti_pemasukan 
    WHERE MONTH(tgl_pemasukan) = '$bulan' AND YEAR(tgl_pemasukan) = '$tahun' 
    GROUP BY detail_pemasukan_gb.kode_barang) gm ON (master_barang_pembelian.kode_barang = gm.kode_barang)

    LEFT JOIN (SELECT 
    detail_pengeluaran_gb.kode_barang,
    SUM( IF( pengeluaran_gb.kode_dept = 'Produksi' , qty_unit ,0 )) AS qtyprod3,
    SUM( IF( pengeluaran_gb.kode_dept = 'Seasoning' , qty_unit ,0 )) AS qtyseas3,
    SUM( IF( pengeluaran_gb.kode_dept = 'PDQC' , qty_unit ,0 )) AS qtypdqc3,
    SUM( IF( pengeluaran_gb.kode_dept = 'Susut' , qty_unit ,0 )) AS qtysus3,
    SUM( IF( pengeluaran_gb.kode_dept = 'Lainnya' , qty_unit ,0 )) AS qtylain3,
    SUM( IF( pengeluaran_gb.kode_dept = 'Cabang' , qty_unit ,0 )) AS qtycabang3,

    SUM( IF( pengeluaran_gb.kode_dept = 'Produksi' , qty_berat ,0 )) AS qtyprod4,
    SUM( IF( pengeluaran_gb.kode_dept = 'Seasoning' , qty_berat ,0 )) AS qtyseas4,
    SUM( IF( pengeluaran_gb.kode_dept = 'PDQC' , qty_berat ,0 )) AS qtypdqc4,
    SUM( IF( pengeluaran_gb.kode_dept = 'Susut' , qty_berat ,0 )) AS qtysus4,
    SUM( IF( pengeluaran_gb.kode_dept = 'Lainnya' , qty_berat ,0 )) AS qtylain4,
    SUM( IF( pengeluaran_gb.kode_dept = 'Cabang' , qty_berat ,0 )) AS qtycabang4
    FROM detail_pengeluaran_gb 
    INNER JOIN pengeluaran_gb ON detail_pengeluaran_gb.nobukti_pengeluaran = pengeluaran_gb.nobukti_pengeluaran 
    WHERE MONTH(tgl_pengeluaran) = '$bulan' AND YEAR(tgl_pengeluaran) = '$tahun' 
    GROUP BY detail_pengeluaran_gb.kode_barang) gk ON (master_barang_pembelian.kode_barang = gk.kode_barang)

    WHERE master_barang_pembelian.kode_dept = 'GDB' AND master_barang_pembelian.kode_kategori = '$kode_kategori' 
    ORDER BY master_barang_pembelian.jenis_barang,MID(4,3,master_barang_pembelian.kode_barang),urutan ASC
    ";
    return $this->db->query($query);
  }

  
  
  function list_detailPersediaanharga($bulan, $tahun, $kode_kategori = "")
  {

    $query = "SELECT 
    master_barang_pembelian.kode_barang,
    master_barang_pembelian.nama_barang,
    master_barang_pembelian.satuan,
    master_barang_pembelian.jenis_barang,
    sa.qtyunitsa,
    sa.qtyberatsa,
    op.qtyunitop,
    op.qtyberatop,
    gm.qtypembunit,
    gm.qtylainnyaunit,
    gm.qtypembberat,
    gm.qtylainnya2,
    gm.qtypengganti2,
    gm.qtypenggantiunit,
    gk.qtyprodunit,
    gk.qtyseas3,
    gk.qtypdqc3,
    gk.qtysus3,
    gk.qtycabang3,
    gk.qtylain3,
    gk.qtyprod4,
    gk.qtyseas4,
    gk.qtypdqc4,
    gk.qtysus4,
    gk.qtycabang4,
    gk.qtylain4,
    hrgsa.harga,
    dp.totalharga

    FROM master_barang_pembelian

    LEFT JOIN (SELECT saldoawal_gb_detail.kode_barang,
      SUM( qty_unit ) AS qtyunitsa,
      SUM( qty_berat ) AS qtyberatsa 
      FROM saldoawal_gb_detail 
      INNER JOIN saldoawal_gb ON saldoawal_gb.kode_saldoawal_gb=saldoawal_gb_detail.kode_saldoawal_gb
      WHERE bulan = '$bulan' AND tahun = '$tahun' 
      GROUP BY saldoawal_gb_detail.kode_barang ) sa ON (master_barang_pembelian.kode_barang = sa.kode_barang)

    LEFT JOIN (SELECT opname_gb_detail.kode_barang,
      SUM( qty_unit ) AS qtyunitop,
      SUM( qty_berat ) AS qtyberatop
      FROM opname_gb_detail 
      INNER JOIN opname_gb ON opname_gb.kode_opname_gb=opname_gb_detail.kode_opname_gb
      WHERE bulan = '$bulan' AND tahun = '$tahun' 
      GROUP BY opname_gb_detail.kode_barang ) op ON (master_barang_pembelian.kode_barang = op.kode_barang)

    LEFT JOIN (SELECT SUM((qty*harga)+penyesuaian) as totalharga,kode_barang
      FROM detail_pembelian 
      INNER JOIN pembelian ON detail_pembelian.nobukti_pembelian = pembelian.nobukti_pembelian
      WHERE MONTH(tgl_pembelian) = '$bulan' AND YEAR(tgl_pembelian) = '$tahun' 
      GROUP BY kode_barang) dp ON (master_barang_pembelian.kode_barang = dp.kode_barang)

    LEFT JOIN (SELECT kode_barang,harga
      FROM saldoawal_harga_gb 
      WHERE bulan = '$bulan' AND tahun = '$tahun' 
      GROUP BY kode_barang,harga) hrgsa ON (master_barang_pembelian.kode_barang = hrgsa.kode_barang)

    LEFT JOIN (SELECT 
      detail_pemasukan_gb.kode_barang,
      SUM( IF( departemen = 'Pembelian' , qty_unit ,0 )) AS qtypembunit,
      SUM( IF( departemen = 'Lainnya' , qty_unit ,0 )) AS qtylainnyaunit,
      SUM( IF( departemen = 'Retur Pengganti' , qty_unit ,0 )) AS qtypenggantiunit,

      SUM( IF( departemen = 'Pembelian' , qty_berat ,0 )) AS qtypembberat,
      SUM( IF( departemen = 'Lainnya' , qty_berat ,0 )) AS qtylainnya2,
      SUM( IF( departemen = 'Retur Pengganti' , qty_berat ,0 )) AS qtypengganti2,
      SUM( (IF( departemen = 'Pembelian' , qty_berat ,0 )) + (IF( departemen = 'Lainnya' , qty_berat ,0 ))) AS pemasukanqtyberat
      FROM 
      detail_pemasukan_gb 
      INNER JOIN pemasukan_gb ON detail_pemasukan_gb.nobukti_pemasukan = pemasukan_gb.nobukti_pemasukan 
      WHERE MONTH(tgl_pemasukan) = '$bulan' AND YEAR(tgl_pemasukan) = '$tahun' 
      GROUP BY detail_pemasukan_gb.kode_barang) gm ON (master_barang_pembelian.kode_barang = gm.kode_barang)

    LEFT JOIN (SELECT 
      detail_pengeluaran_gb.kode_barang,
      SUM( IF( pengeluaran_gb.kode_dept = 'Produksi' , qty_unit ,0 )) AS qtyprodunit,
      SUM( IF( pengeluaran_gb.kode_dept = 'Seasoning' , qty_unit ,0 )) AS qtyseasunit,
      SUM( IF( pengeluaran_gb.kode_dept = 'PDQC' , qty_unit ,0 )) AS qtypdqcunit,
      SUM( IF( pengeluaran_gb.kode_dept = 'Susut' , qty_unit ,0 )) AS qtysusunit,
      SUM( IF( pengeluaran_gb.kode_dept = 'Lainnya' , qty_unit ,0 )) AS qtylainunit,
      SUM( IF( pengeluaran_gb.kode_dept = 'Cabang' , qty_unit ,0 )) AS qtycabangunit,

      SUM( IF( pengeluaran_gb.kode_dept = 'Produksi' , qty_berat ,0 )) AS qtyprodberat,
      SUM( IF( pengeluaran_gb.kode_dept = 'Seasoning' , qty_berat ,0 )) AS qtyseasberat,
      SUM( IF( pengeluaran_gb.kode_dept = 'PDQC' , qty_berat ,0 )) AS qtypdqcberat,
      SUM( IF( pengeluaran_gb.kode_dept = 'Susut' , qty_berat ,0 )) AS qtysusberat,
      SUM( IF( pengeluaran_gb.kode_dept = 'Lainnya' , qty_berat ,0 )) AS qtylainberat,
      SUM( IF( pengeluaran_gb.kode_dept = 'Cabang' , qty_berat ,0 )) AS qtycabangberat

      FROM detail_pengeluaran_gb 
      INNER JOIN pengeluaran_gb ON detail_pengeluaran_gb.nobukti_pengeluaran = pengeluaran_gb.nobukti_pengeluaran 
      WHERE MONTH(tgl_pengeluaran) = '$bulan' AND YEAR(tgl_pengeluaran) = '$tahun' 
      GROUP BY detail_pengeluaran_gb.kode_barang) gk ON (master_barang_pembelian.kode_barang = gk.kode_barang)

    WHERE master_barang_pembelian.kode_dept = 'GDB' AND master_barang_pembelian.kode_kategori = '$kode_kategori' 
    ORDER BY master_barang_pembelian.jenis_barang,MID(4,3,master_barang_pembelian.kode_barang),urutan ASC
    ";
    return $this->db->query($query);
  }

  function list_Retur($bulan, $tahun)
  {

    $query = "
    SELECT 
    master_barang_pembelian.nama_barang,
    master_barang_pembelian.kode_barang,
    master_barang_pembelian.satuan,
    sa.qtysaldoawal,
    retur.retur_in,
    retur.retur_out,
    retur.sisa_retur,
    retur.keterangan

    FROM master_barang_pembelian


    LEFT JOIN (SELECT 
    saldoawal_gb_detail_retur.kode_barang,
    SUM( qty_berat ) AS qtysaldoawal 
    FROM 
    saldoawal_gb_detail_retur 
    INNER JOIN saldoawal_gb_retur ON saldoawal_gb_retur.kode_saldoawal_gb=saldoawal_gb_detail_retur.kode_saldoawal_gb
    WHERE bulan = '$bulan' AND tahun = '$tahun' 
    GROUP BY saldoawal_gb_detail_retur.kode_barang ) sa ON (master_barang_pembelian.kode_barang = sa.kode_barang)

    LEFT JOIN (SELECT 
    detail_retur_gb.kode_barang,
    detail_retur_gb.keterangan,
    SUM( IF( jenis_retur = 'Retur IN' , qty ,0 )) AS retur_in,
    SUM( IF( jenis_retur = 'Retur OUT' , qty ,0 )) AS retur_out,
    SUM( IF( jenis_retur = 'Retur IN' , qty ,0 ) - IF( jenis_retur = 'Retur OUT' , qty ,0 )) AS sisa_retur
    FROM 
    detail_retur_gb 
    INNER JOIN retur_gb ON detail_retur_gb.nobukti_retur = retur_gb.nobukti_retur 
    INNER JOIN supplier ON supplier.kode_supplier = retur_gb.supplier 
    WHERE MONTH(tgl_retur) = '$bulan' AND YEAR(tgl_retur) = '$tahun' 
    GROUP BY detail_retur_gb.kode_barang,detail_retur_gb.keterangan) retur ON (master_barang_pembelian.kode_barang = retur.kode_barang)
    
    WHERE master_barang_pembelian.kode_dept = 'GDB' AND master_barang_pembelian.status = 'Aktif'
    ORDER BY nama_barang ASC
    ";
    return $this->db->query($query);
  }

  function list_detailPemasukan($dari, $sampai, $kode_barang)
  {
    $role = $this->session->userdata('level_user');
    if ($role == 'admin pembelian 2') {
      $orderby = "master_barang_pembelian.nama_barang,";
    } else {
      $orderby = "";
    }

    if ($kode_barang != "") {

      $kode_barang = "AND detail_pemasukan_gb.kode_barang = '" . $kode_barang . "' ";
    }
    $query = "
    SELECT * FROM detail_pemasukan_gb

    INNER JOIN pemasukan_gb ON 
    pemasukan_gb.nobukti_pemasukan = detail_pemasukan_gb.nobukti_pemasukan
    INNER JOIN master_barang_pembelian ON 
    master_barang_pembelian.kode_barang = detail_pemasukan_gb.kode_barang

    WHERE pemasukan_gb.tgl_pemasukan BETWEEN '$dari' AND '$sampai' "
      . $kode_barang
      . "
    ORDER BY 
    $orderby
    pemasukan_gb.tgl_pemasukan,
    detail_pemasukan_gb.kode_barang,
    pemasukan_gb.nobukti_pemasukan 
    ASC
    ";
    return $this->db->query($query);
  }

  function list_detailRetur($dari, $sampai, $jenis_retur, $supplier)
  {

    if ($jenis_retur != "") {

      $jenis_retur = "AND retur_gb.jenis_retur = '" . $jenis_retur . "' ";
    }

    if ($supplier != "") {

      $supplier = "AND retur_gb.supplier = '" . $supplier . "' ";
    }

    $query = "
    SELECT * FROM detail_retur_gb

    INNER JOIN retur_gb ON 
    retur_gb.nobukti_retur = detail_retur_gb.nobukti_retur
    INNER JOIN master_barang_pembelian ON 
    master_barang_pembelian.kode_barang = detail_retur_gb.kode_barang
    INNER JOIN supplier ON 
    supplier.kode_supplier = retur_gb.supplier 

    WHERE retur_gb.tgl_retur BETWEEN '$dari' AND '$sampai' "
      . $jenis_retur
      . $supplier
      . "
    ORDER BY 
    retur_gb.tgl_retur,
    retur_gb.nobukti_retur 
    ASC
    ";
    return $this->db->query($query);
  }

  function list_detailPengeluaran($dari, $sampai, $kode_dept = "", $kode_barang = "", $unit = "")
  {

    $role = $this->session->userdata('level_user');
    if ($role == 'admin pembelian 2') {
      $orderby = "master_barang_pembelian.nama_barang,";
    } else {
      $orderby = "";
    }

    if ($kode_dept != "") {

      $kode_dept = "AND pengeluaran_gb.kode_dept = '" . $kode_dept . "' ";
    }

    if ($unit != "") {

      $unit = "AND pengeluaran_gb.unit = '" . $unit . "' ";
    }

    if ($kode_barang != "") {

      $kode_barang = "AND detail_pengeluaran_gb.kode_barang = '" . $kode_barang . "' ";
    }

    $query = "
    SELECT *,pengeluaran_gb.kode_dept AS kode_dept FROM detail_pengeluaran_gb

    INNER JOIN pengeluaran_gb ON 
    pengeluaran_gb.nobukti_pengeluaran = detail_pengeluaran_gb.nobukti_pengeluaran
    INNER JOIN master_barang_pembelian ON 
    master_barang_pembelian.kode_barang = detail_pengeluaran_gb.kode_barang

    WHERE pengeluaran_gb.tgl_pengeluaran BETWEEN '$dari' AND '$sampai' "
      . $kode_dept
      . $unit
      . $kode_barang
      . "
    ORDER BY 
    $orderby
    pengeluaran_gb.tgl_pengeluaran,
    pengeluaran_gb.nobukti_pengeluaran 
    ASC
    ";
    return $this->db->query($query);
  }

}
