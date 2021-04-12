<?php

class Model_komisi extends CI_Model
{
  function settarget($data)
  {
    $cek = $this->db->get_where('komisi_target', array('kode_target' => $data['kode_target']))->num_rows();
    if (!empty($cek)) {
      return 1;
    } else {
      $simpan = $this->db->insert('komisi_target', $data);
      if ($simpan) {
        return 2;
      } else {
        return 0;
      }
    }
  }

  function loadtarget($bulan, $tahun)
  {
    return $this->db->get_where('komisi_target', array('bulan' => $bulan, 'tahun' => $tahun));
  }

  function simpantarget($data)
  {
    $cek = $this->db->get_where('komisi_target_qty_detail', array('kode_target' => $data['kode_target'], 'id_karyawan' => $data['id_karyawan'], 'kode_produk' => $data['kode_produk']));
    if ($cek->num_rows() > 0) {
      $this->db->update('komisi_target_qty_detail', $data, array('kode_target' => $data['kode_target'], 'id_karyawan' => $data['id_karyawan'], 'kode_produk' => $data['kode_produk']));
    } else {
      $this->db->insert('komisi_target_qty_detail', $data);
    }
  }

  function simpantargetcashin($data)
  {
    $cek = $this->db->get_where('komisi_target_cashin_detail', array('kode_target' => $data['kode_target'], 'id_karyawan' => $data['id_karyawan']));
    if ($cek->num_rows() > 0) {
      $this->db->update('komisi_target_cashin_detail', $data, array('kode_target' => $data['kode_target'], 'id_karyawan' => $data['id_karyawan']));
    } else {
      $this->db->insert('komisi_target_cashin_detail', $data);
    }
  }

  function getKategoripoin()
  {
    return $this->db->get('komisi_kategoripoinqty');
  }

  function cetak_komisi($cabang, $bulan, $tahun)
  {
    $dari = $tahun . "-" . $bulan . "-01";
    $sampai = $tahun . "-" . $bulan . "-31";
    $query = "SELECT karyawan.id_karyawan,nama_karyawan,
     targetkategoriA,realisasitargetA,
    targetkategoriB,realisasitargetB,
    targetproductfocus,realisasitargetproductfocus,
    jumlah_target_cashin,jml_cashin,sisapiutang
    FROM karyawan
    INNER JOIN (
    SELECT  id_karyawan,
    SUM(IF(kategori_komisi='KKQ01',jumlah_target,0)) as targetkategoriA,
    SUM(IF(kategori_komisi='KKQ02',jumlah_target,0)) as targetkategoriB,
    SUM(IF(kategori_komisi='KKQ03',jumlah_target,0)) as targetproductfocus
    FROM
    komisi_target_qty_detail k_detail
    INNER JOIN komisi_target ON k_detail.kode_target = komisi_target.kode_target
    INNER JOIN master_barang ON k_detail.kode_produk = master_barang.kode_produk
    WHERE bulan ='$bulan' AND tahun='$tahun'
    GROUP BY id_karyawan) komisi ON (karyawan.id_karyawan = komisi.id_karyawan)
    
    LEFT JOIN
    (
    SELECT penjualan.id_karyawan, 
    SUM(IF(kategori_komisi='KKQ01',ROUND((jumlah/barang.isipcsdus),2),0)) as realisasitargetA,
    SUM(IF(kategori_komisi='KKQ02',ROUND((jumlah/barang.isipcsdus),2),0)) as realisasitargetB,
    SUM(IF(kategori_komisi='KKQ03',ROUND((jumlah/barang.isipcsdus),2),0)) as realisasitargetproductfocus
    FROM detailpenjualan
    INNER JOIN penjualan ON detailpenjualan.no_fak_penj = penjualan.no_fak_penj
    INNER JOIN barang ON detailpenjualan.kode_barang = barang.kode_barang
    INNER JOIN master_barang ON barang.kode_produk = master_barang.kode_produk
    WHERE tgltransaksi BETWEEN '$dari' AND '$sampai'
    GROUP BY penjualan.id_karyawan
    ) realisasi ON (karyawan.id_karyawan = realisasi.id_karyawan)


    LEFT JOIN (
    SELECT
      id_karyawan,SUM(jumlah_target_cashin) as jumlah_target_cashin
    FROM
      komisi_target_cashin_detail k_cashin
      INNER JOIN komisi_target ON k_cashin.kode_target = komisi_target.kode_target
    WHERE
      bulan = '$bulan' AND tahun = '$tahun' 
    GROUP BY
      id_karyawan 
    ) komisicashin ON ( karyawan.id_karyawan = komisicashin.id_karyawan )
    
    LEFT JOIN (
    SELECT
      id_karyawan,SUM(bayar) as jml_cashin
    FROM
      historibayar
    WHERE
      tglbayar BETWEEN '$dari' 
      AND '$sampai' AND status_bayar IS NULL
    GROUP BY
      id_karyawan 
    ) hb ON ( karyawan.id_karyawan = hb.id_karyawan )
    

    LEFT JOIN (
      SELECT 
      salesbarunew,
      SUM((IFNULL( penjualan.total, 0 )- (IFNULL(totalpf_last,0)- IFNULL(totalgb_last,0))) - IFNULL(jmlbayar,0)) as sisapiutang
      FROM penjualan
      LEFT JOIN (
        SELECT
          retur.no_fak_penj AS no_fak_penj,
          sum( retur.subtotal_gb ) AS totalgb_last,
          sum( retur.subtotal_pf ) AS totalpf_last 
        FROM
          retur 
        WHERE
          tglretur <= '$sampai' 
        GROUP BY
          retur.no_fak_penj 
        ) r ON ( penjualan.no_fak_penj = r.no_fak_penj )

      LEFT JOIN (
        SELECT
          pj.no_fak_penj,
        IF
          ( salesbaru IS NULL, pj.id_karyawan, salesbaru ) AS salesbarunew,
          karyawan.nama_karyawan AS nama_sales,
        IF
          ( cabangbaru IS NULL, karyawan.kode_cabang, cabangbaru ) AS cabangbarunew 
        FROM
          penjualan pj
          INNER JOIN karyawan ON pj.id_karyawan = karyawan.id_karyawan
          LEFT JOIN (
          SELECT
            MAX( id_move ) AS id_move,
            no_fak_penj,
            move_faktur.id_karyawan AS salesbaru,
            karyawan.kode_cabang AS cabangbaru 
          FROM
            move_faktur
            INNER JOIN karyawan ON move_faktur.id_karyawan = karyawan.id_karyawan 
          WHERE
            tgl_move <= '$dari' 
          GROUP BY
            no_fak_penj,
            move_faktur.id_karyawan,
            karyawan.kode_cabang 
          ) move_fak ON ( pj.no_fak_penj = move_fak.no_fak_penj ) 
        ) pjmove ON ( penjualan.no_fak_penj = pjmove.no_fak_penj )
        LEFT JOIN ( 
          SELECT no_fak_penj, sum( historibayar.bayar ) AS jmlbayar 
          FROM historibayar 
          WHERE tglbayar <= '$sampai' 
          GROUP BY no_fak_penj ) hb ON ( penjualan.no_fak_penj = hb.no_fak_penj )
        INNER JOIN pelanggan ON penjualan.kode_pelanggan = pelanggan.kode_pelanggan
        WHERE cabangbarunew = '$cabang'  AND penjualan.jenistransaksi != 'tunai'
        AND tgltransaksi <= '$sampai' AND (IFNULL( penjualan.total, 0 )- (IFNULL(totalpf_last,0)- IFNULL(totalgb_last,0))) - IFNULL(jmlbayar,0) !=0 AND datediff('$sampai', tgltransaksi) > (pelanggan.jatuhtempo+1)
        GROUP BY salesbarunew
    ) ljt ON (karyawan.id_karyawan = ljt.salesbarunew)


    WHERE kode_cabang ='$cabang' AND nama_karyawan !='-'";

    return $this->db->query($query);
  }

  function cetak_komisi2($cabang, $bulan, $tahun)
  {
    $dari = $tahun . "-" . $bulan . "-01";
    $sampai = $tahun . "-" . $bulan . "-31";
    $query = "SELECT karyawan.id_karyawan,nama_karyawan,
    targetkategoriA,realisasitargetA,
    targetkategoriB,realisasitargetB,
    targetproductfocus,realisasitargetproductfocus,
    jumlah_target_cashin,jml_cashin,jumlah_target_collection
    FROM karyawan
    LEFT JOIN (
    SELECT  id_karyawan,
    SUM(IF(kategori_komisi='KKQ01',jumlah_target,0)) as targetkategoriA,
    SUM(IF(kategori_komisi='KKQ02',jumlah_target,0)) as targetkategoriB,
    SUM(IF(kategori_komisi='KKQ03',jumlah_target,0)) as targetproductfocus
    FROM
    komisi_target_qty_detail k_detail
    INNER JOIN komisi_target ON k_detail.kode_target = komisi_target.kode_target
    INNER JOIN master_barang ON k_detail.kode_produk = master_barang.kode_produk
    WHERE bulan ='$bulan' AND tahun='$tahun'
    GROUP BY id_karyawan) komisi ON (karyawan.id_karyawan = komisi.id_karyawan)

    LEFT JOIN
    (
    SELECT penjualan.id_karyawan, 
    SUM(IF(kategori_komisi='KKQ01',ROUND((jumlah/barang.isipcsdus),2),0)) as realisasitargetA,
    SUM(IF(kategori_komisi='KKQ02',ROUND((jumlah/barang.isipcsdus),2),0)) as realisasitargetB,
    SUM(IF(kategori_komisi='KKQ03',ROUND((jumlah/barang.isipcsdus),2),0)) as realisasitargetproductfocus
    FROM detailpenjualan
    INNER JOIN penjualan ON detailpenjualan.no_fak_penj = penjualan.no_fak_penj
    INNER JOIN barang ON detailpenjualan.kode_barang = barang.kode_barang
    INNER JOIN master_barang ON barang.kode_produk = master_barang.kode_produk
    WHERE tgltransaksi BETWEEN '$dari' AND '$sampai'
    GROUP BY penjualan.id_karyawan
    ) realisasi ON (karyawan.id_karyawan = realisasi.id_karyawan)

    LEFT JOIN (
    SELECT
      id_karyawan,jumlah_target_cashin
    FROM
      komisi_target_cashin_detail k_cashin
      INNER JOIN komisi_target ON k_cashin.kode_target = komisi_target.kode_target
    WHERE
      bulan = '$bulan' AND tahun = '$tahun' 
    GROUP BY
      id_karyawan,jumlah_target_cashin 
    ) komisicashin ON ( karyawan.id_karyawan = komisicashin.id_karyawan )
    
    LEFT JOIN (
    SELECT
      id_karyawan,SUM(bayar) as jml_cashin
    FROM
      historibayar
    WHERE
      tglbayar BETWEEN '$dari' 
      AND '$sampai' AND status_bayar IS NULL
    GROUP BY
      id_karyawan 
    ) hb ON ( karyawan.id_karyawan = hb.id_karyawan )

    LEFT JOIN (
    SELECT
      id_karyawan,jumlah_target_collection
    FROM
      komisi_collection_detail k_collection
      INNER JOIN komisi_target ON k_collection.kode_target = komisi_target.kode_target
    WHERE
      bulan = '$bulan' AND tahun = '$tahun' 
    GROUP BY
      id_karyawan,jumlah_target_collection 
    ) komisicollection ON ( karyawan.id_karyawan = komisicollection.id_karyawan )
    WHERE kode_cabang ='$cabang' AND nama_karyawan !='-' ORDER BY karyawan.id_karyawan";

    return $this->db->query($query);
  }
}
