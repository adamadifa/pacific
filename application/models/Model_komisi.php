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

  function loadapprovletarget($bulan, $tahun)
  {
    $this->db->order_by('bulan', 'asc');
    return $this->db->get_where('komisi_target', array('tahun' => $tahun));
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

  function simpantargetcollection($data)
  {
    $cek = $this->db->get_where('komisi_collection_detail', array('kode_target' => $data['kode_target'], 'id_karyawan' => $data['id_karyawan']));
    if ($cek->num_rows() > 0) {
      $this->db->update('komisi_collection_detail', $data, array('kode_target' => $data['kode_target'], 'id_karyawan' => $data['id_karyawan']));
    } else {
      $this->db->insert('komisi_collection_detail', $data);
    }
  }

  function getKategoripoin()
  {
    return $this->db->get('komisi_kategoripoinqty');
  }

  // function cetak_komisi($cabang, $bulan, $tahun)
  // {
  //   $dari = $tahun . "-" . $bulan . "-01";
  //   $sampai = $tahun . "-" . $bulan . "-31";
  //   $query = "SELECT karyawan.id_karyawan,nama_karyawan,
  //    targetkategoriA,realisasitargetA,
  //   targetkategoriB,realisasitargetB,
  //   targetproductfocus,realisasitargetproductfocus,
  //   jumlah_target_cashin,jml_cashin,sisapiutang
  //   FROM karyawan
  //   INNER JOIN (
  //   SELECT  id_karyawan,
  //   SUM(IF(kategori_komisi='KKQ01',jumlah_target,0)) as targetkategoriA,
  //   SUM(IF(kategori_komisi='KKQ02',jumlah_target,0)) as targetkategoriB,
  //   SUM(IF(kategori_komisi='KKQ03',jumlah_target,0)) as targetproductfocus
  //   FROM
  //   komisi_target_qty_detail k_detail
  //   INNER JOIN komisi_target ON k_detail.kode_target = komisi_target.kode_target
  //   INNER JOIN master_barang ON k_detail.kode_produk = master_barang.kode_produk
  //   WHERE bulan ='$bulan' AND tahun='$tahun'
  //   GROUP BY id_karyawan) komisi ON (karyawan.id_karyawan = komisi.id_karyawan)

  //   LEFT JOIN
  //   (
  //   SELECT penjualan.id_karyawan, 
  //   SUM(IF(kategori_komisi='KKQ01',ROUND((jumlah/barang.isipcsdus),2),0)) as realisasitargetA,
  //   SUM(IF(kategori_komisi='KKQ02',ROUND((jumlah/barang.isipcsdus),2),0)) as realisasitargetB,
  //   SUM(IF(kategori_komisi='KKQ03',ROUND((jumlah/barang.isipcsdus),2),0)) as realisasitargetproductfocus
  //   FROM detailpenjualan
  //   INNER JOIN penjualan ON detailpenjualan.no_fak_penj = penjualan.no_fak_penj
  //   INNER JOIN barang ON detailpenjualan.kode_barang = barang.kode_barang
  //   INNER JOIN master_barang ON barang.kode_produk = master_barang.kode_produk
  //   WHERE tgltransaksi BETWEEN '$dari' AND '$sampai'
  //   GROUP BY penjualan.id_karyawan
  //   ) realisasi ON (karyawan.id_karyawan = realisasi.id_karyawan)


  //   LEFT JOIN (
  //   SELECT
  //     id_karyawan,SUM(jumlah_target_cashin) as jumlah_target_cashin
  //   FROM
  //     komisi_target_cashin_detail k_cashin
  //     INNER JOIN komisi_target ON k_cashin.kode_target = komisi_target.kode_target
  //   WHERE
  //     bulan = '$bulan' AND tahun = '$tahun' 
  //   GROUP BY
  //     id_karyawan 
  //   ) komisicashin ON ( karyawan.id_karyawan = komisicashin.id_karyawan )

  //   LEFT JOIN (
  //   SELECT
  //     id_karyawan,SUM(bayar) as jml_cashin
  //   FROM
  //     historibayar
  //   WHERE
  //     tglbayar BETWEEN '$dari' 
  //     AND '$sampai' AND status_bayar IS NULL
  //   GROUP BY
  //     id_karyawan 
  //   ) hb ON ( karyawan.id_karyawan = hb.id_karyawan )


  //   LEFT JOIN (
  //     SELECT 
  //     salesbarunew,
  //     SUM((IFNULL( penjualan.total, 0 )- (IFNULL(totalpf_last,0)- IFNULL(totalgb_last,0))) - IFNULL(jmlbayar,0)) as sisapiutang
  //     FROM penjualan
  //     LEFT JOIN (
  //       SELECT
  //         retur.no_fak_penj AS no_fak_penj,
  //         sum( retur.subtotal_gb ) AS totalgb_last,
  //         sum( retur.subtotal_pf ) AS totalpf_last 
  //       FROM
  //         retur 
  //       WHERE
  //         tglretur <= '$sampai' 
  //       GROUP BY
  //         retur.no_fak_penj 
  //       ) r ON ( penjualan.no_fak_penj = r.no_fak_penj )

  //     LEFT JOIN (
  //       SELECT
  //         pj.no_fak_penj,
  //       IF
  //         ( salesbaru IS NULL, pj.id_karyawan, salesbaru ) AS salesbarunew,
  //         karyawan.nama_karyawan AS nama_sales,
  //       IF
  //         ( cabangbaru IS NULL, karyawan.kode_cabang, cabangbaru ) AS cabangbarunew 
  //       FROM
  //         penjualan pj
  //         INNER JOIN karyawan ON pj.id_karyawan = karyawan.id_karyawan
  //         LEFT JOIN (
  //         SELECT
  //           MAX( id_move ) AS id_move,
  //           no_fak_penj,
  //           move_faktur.id_karyawan AS salesbaru,
  //           karyawan.kode_cabang AS cabangbaru 
  //         FROM
  //           move_faktur
  //           INNER JOIN karyawan ON move_faktur.id_karyawan = karyawan.id_karyawan 
  //         WHERE
  //           tgl_move <= '$dari' 
  //         GROUP BY
  //           no_fak_penj,
  //           move_faktur.id_karyawan,
  //           karyawan.kode_cabang 
  //         ) move_fak ON ( pj.no_fak_penj = move_fak.no_fak_penj ) 
  //       ) pjmove ON ( penjualan.no_fak_penj = pjmove.no_fak_penj )
  //       LEFT JOIN ( 
  //         SELECT no_fak_penj, sum( historibayar.bayar ) AS jmlbayar 
  //         FROM historibayar 
  //         WHERE tglbayar <= '$sampai' 
  //         GROUP BY no_fak_penj ) hb ON ( penjualan.no_fak_penj = hb.no_fak_penj )
  //       INNER JOIN pelanggan ON penjualan.kode_pelanggan = pelanggan.kode_pelanggan
  //       WHERE cabangbarunew = '$cabang'  AND penjualan.jenistransaksi != 'tunai'
  //       AND tgltransaksi <= '$sampai' AND (IFNULL( penjualan.total, 0 )- (IFNULL(totalpf_last,0)- IFNULL(totalgb_last,0))) - IFNULL(jmlbayar,0) !=0 AND datediff('$sampai', tgltransaksi) > (pelanggan.jatuhtempo+1)
  //       GROUP BY salesbarunew
  //   ) ljt ON (karyawan.id_karyawan = ljt.salesbarunew)


  //   WHERE kode_cabang ='$cabang' AND nama_karyawan !='-'";

  //   return $this->db->query($query);
  // }

  function cetak_komisi($cabang, $bulan, $tahun, $end)
  {
    $dari = $tahun . "-" . $bulan . "-01";
    $sampai = date('Y-m-t', strtotime($dari));
    $lastmonth = date('Y-m-d', strtotime(date($dari) . '- 1 month'));
    $lastdate = explode("-", $lastmonth);
    $bulanlast = $lastdate[1] + 0;
    $tahunlast = $lastdate[0];
    if ($bulanlast == 1) {
      $blnlast1 = 12;
      $thnlast1 = $tahun - 1;
    } else {
      $blnlast1 = $bulanlast - 1;
      $thnlast1 = $tahun;
    }
    $query = "SELECT karyawan.id_karyawan,nama_karyawan,
    target_BB_DP,
    BB,
    DEP,
    target_DS,
    DS,
    target_SP,
    SP,
    target_AR,
    AR,
    target_AB_AS_CG5,
    AB,
    `AS`,
    CG5,
    IFNULL(saldo_piutang,0) + IFNULL(penjualankredit,0) as targetawal,
    target_collection,
    realisasi_collection,
    target_cashin,
    realisasi_cashin
    FROM karyawan
        INNER JOIN (
        SELECT  id_karyawan,
        SUM(IF(kategori_komisi='KKQ01',jumlah_target,0)) as target_BB_DP,
        SUM(IF(kategori_komisi='KKQ02',jumlah_target,0)) as target_DS,
        SUM(IF(kategori_komisi='KKQ03',jumlah_target,0)) as target_SP,
        SUM(IF(kategori_komisi='KKQ04',jumlah_target,0)) as target_AR,
        SUM(IF(kategori_komisi='KKQ05',jumlah_target,0)) as target_AB_AS_CG5
        FROM
        komisi_target_qty_detail k_detail
        INNER JOIN komisi_target ON k_detail.kode_target = komisi_target.kode_target
        INNER JOIN master_barang ON k_detail.kode_produk = master_barang.kode_produk
        WHERE bulan ='$bulan' AND tahun='$tahun' 
        GROUP BY id_karyawan) komisi ON (karyawan.id_karyawan = komisi.id_karyawan)
        
        LEFT JOIN (
          SELECT historibayar.id_karyawan, SUM(bayar) as realisasi_collection 
          FROM historibayar
          INNER JOIN penjualan ON historibayar.no_fak_penj	= penjualan.no_fak_penj
          WHERE penjualan.jenistransaksi != 'tunai' AND tglbayar BETWEEN '$dari' AND '$sampai'
          GROUP BY historibayar.id_karyawan
        ) collection ON (karyawan.id_karyawan = collection.id_karyawan)
		
        LEFT JOIN (
          SELECT id_karyawan,saldo_piutang
          FROM saldoawal_piutang
          WHERE bulan ='$bulan' AND tahun='$tahun'
        ) saldoawal_piutang ON (saldoawal_piutang.id_karyawan = karyawan.id_karyawan)
        
        LEFT JOIN (
          SELECT id_karyawan,SUM(IFNULL(penjualan.total,0) - IFNULL(retur.total,0)) as penjualankredit
          FROM penjualan
          INNER JOIN pelanggan ON penjualan.kode_pelanggan  = pelanggan.kode_pelanggan
          LEFT JOIN (
				    SELECT retur.no_fak_penj AS no_fak_penj,
				    SUM(total) AS total
				    FROM
					  retur
				    WHERE tglretur BETWEEN '$dari' AND '$sampai'
				    GROUP BY
				  	retur.no_fak_penj
			) retur ON (penjualan.no_fak_penj = retur.no_fak_penj) 
          WHERE tgltransaksi BETWEEN '$dari' AND '$sampai' AND jenistransaksi != 'tunai' AND datediff('$sampai', tgltransaksi) > (pelanggan.jatuhtempo+1)
          GROUP BY id_karyawan
        
        
        ) pj ON (pj.id_karyawan = karyawan.id_karyawan)
        LEFT JOIN (
        SELECT  id_karyawan,
        SUM(jumlah_target_collection) target_collection
        FROM
        komisi_collection_detail collection_detail
        INNER JOIN komisi_target ON collection_detail.kode_target = komisi_target.kode_target
        WHERE bulan ='$bulan' AND tahun='$tahun' 
        GROUP BY id_karyawan) komisi_collection ON (karyawan.id_karyawan = komisi_collection.id_karyawan)
        
        LEFT JOIN (
        SELECT  id_karyawan,
        SUM(jumlah_target_cashin) target_cashin
        FROM
        komisi_target_cashin_detail cashin_detail
        INNER JOIN komisi_target ON cashin_detail.kode_target = komisi_target.kode_target
        WHERE bulan ='$bulan' AND tahun='$tahun' 
        GROUP BY id_karyawan) komisi_cashin ON (karyawan.id_karyawan = komisi_cashin.id_karyawan)
        
        LEFT JOIN (
          SELECT karyawan.id_karyawan,
          (IFNULL(jml_belumsetorbulanlalu,0)+IFNULL(totalsetoran,0)) + IFNULL(jml_gmlast,0) - IFNULL(jml_gmnow,0) - IFNULL(jml_belumsetorbulanini,0) as realisasi_cashin
          FROM karyawan
          LEFT JOIN (
              SELECT id_karyawan,jumlah as jml_belumsetorbulanlalu FROM belumsetor_detail
              INNER JOIN belumsetor ON belumsetor_detail.kode_saldobs = belumsetor.kode_saldobs
              WHERE bulan='$bulanlast' AND tahun='$tahunlast'
          ) bs ON (karyawan.id_karyawan = bs.id_karyawan)

          LEFT JOIN (
            SELECT id_karyawan, SUM(lhp_tunai+lhp_tagihan) as totalsetoran FROM setoran_penjualan WHERE tgl_lhp BETWEEN '$dari' AND '$sampai' GROUP BY id_karyawan
          ) sp ON (karyawan.id_karyawan = sp.id_karyawan)


          LEFT JOIN (
            SELECT
              giro.id_karyawan,
              SUM( jumlah ) AS jml_gmlast 
            FROM
              giro
              INNER JOIN penjualan ON giro.no_fak_penj = penjualan.no_fak_penj
              LEFT JOIN ( SELECT id_giro FROM historibayar GROUP BY id_giro ) AS hb ON giro.id_giro = hb.id_giro 
            WHERE
              MONTH ( tgl_giro ) = '$bulanlast' 
              AND YEAR ( tgl_giro ) = '$tahun' 
              AND omset_tahun = '$tahun' 
              AND omset_bulan = '$bulan' 
              OR  MONTH ( tgl_giro ) = '$blnlast1' 
              AND YEAR ( tgl_giro ) = '$thnlast1' 
              AND omset_tahun = '$tahun' 
              AND omset_bulan = '$bulan' 
            GROUP BY
              id_karyawan
          ) gmlast ON (karyawan.id_karyawan = gmlast.id_karyawan)

          LEFT JOIN (
          SELECT
            giro.id_karyawan,
            SUM( jumlah ) AS jml_gmnow 
          FROM
            giro
            INNER JOIN penjualan ON giro.no_fak_penj = penjualan.no_fak_penj
            LEFT JOIN ( SELECT id_giro, tglbayar FROM historibayar GROUP BY id_giro, tglbayar ) AS hb ON giro.id_giro = hb.id_giro 
          WHERE
            tgl_giro >= '$dari' 
            AND tgl_giro <= '$sampai' AND tglbayar IS NULL AND omset_bulan = '0' AND omset_tahun = '' 
            OR  tgl_giro >= '$dari' 
            AND tgl_giro <= '$sampai' AND tglbayar >= '$end' 
            AND omset_bulan > '$bulan' 
            AND omset_tahun >= '$tahun' 
          GROUP BY
            giro.id_karyawan
          ) gmnow ON (karyawan.id_karyawan = gmnow.id_karyawan)

          LEFT JOIN (
              SELECT belumsetor_detail.id_karyawan, SUM(jumlah) as jml_belumsetorbulanini
              FROM belumsetor_detail
              INNER JOIN belumsetor ON belumsetor_detail.kode_saldobs = belumsetor.kode_saldobs
              WHERE bulan ='$bulan' AND tahun ='$tahun' GROUP BY id_karyawan
          ) bsnow ON (karyawan.id_karyawan = bsnow.id_karyawan)
        ) hb ON ( karyawan.id_karyawan = hb.id_karyawan )
        
        LEFT JOIN(
        SELECT penjualan.id_karyawan, 
        SUM(IF(kode_produk = 'AB' AND promo !='1',jumlah,0)) as AB,
        SUM(IF(kode_produk = 'AR' AND promo !='1',jumlah,0)) as AR,
        SUM(IF(kode_produk = 'AS' AND promo !='1',jumlah,0)) as `AS`,
        SUM(IF(kode_produk = 'BB' AND promo !='1',jumlah,0)) as BB,
        SUM(IF(kode_produk = 'CG' AND promo !='1',jumlah,0)) as CG,
        SUM(IF(kode_produk = 'CGG' AND promo !='1',jumlah,0)) as CGG,
        SUM(IF(kode_produk = 'DEP' AND promo !='1',jumlah,0)) as DEP,
        SUM(IF(kode_produk = 'DK' AND promo !='1',jumlah,0)) as DK,
        SUM(IF(kode_produk = 'DS' AND promo !='1',jumlah,0)) as DS,
        SUM(IF(kode_produk = 'SP' AND promo !='1',jumlah,0)) as SP,
        SUM(IF(kode_produk = 'BBP' AND promo !='1',jumlah,0)) as BBP,
        SUM(IF(kode_produk = 'SPP' AND promo !='1',jumlah,0)) as SPP,
        SUM(IF(kode_produk = 'CG5' AND promo !='1',jumlah,0)) as CG5
        FROM detailpenjualan
        INNER JOIN penjualan ON detailpenjualan.no_fak_penj = penjualan.no_fak_penj
        INNER JOIN barang ON detailpenjualan.kode_barang = barang.kode_barang
        LEFT JOIN (
          SELECT no_fak_penj,max(tglbayar) as lastpayment 
          FROM historibayar 
          GROUP BY no_fak_penj
        ) hb ON (hb.no_fak_penj = penjualan.no_fak_penj) 
        WHERE  status_lunas ='1' AND lastpayment BETWEEN '$dari' AND '$sampai'
        GROUP BY penjualan.id_karyawan
        ) realisasi ON (karyawan.id_karyawan = realisasi.id_karyawan)
        

       

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

  function komisicabang($tahun, $bulan)
  {
    if (empty($tahun)) {
      $tahun = date("Y");
    } else {
      $tahun = $tahun;
    }

    if (empty($bulan)) {
      $bulan = date("m");
    } else {
      $bulan = $bulan;
    }
    $cbg = "";
    $cabang = $this->session->userdata('cabang');

    if ($cabang != 'pusat') {
      $cbg .= " AND k.kode_cabang = '$cabang'";
    }
    $query = "SELECT targetqty.kode_target, k.kode_cabang,bulan,tahun,kp,mm,em,direktur
    FROM komisi_target_qty_detail targetqty 
    INNER JOIN karyawan k ON targetqty.id_karyawan = k.id_karyawan
    INNER JOIN komisi_target target ON target.kode_target = targetqty.kode_target
    WHERE tahun ='$tahun' AND bulan ='$bulan'" . $cbg . "
    GROUP BY targetqty.kode_target,k.kode_cabang,bulan,tahun,kp,mm,em,direktur";
    return $this->db->query($query);
  }

  function approvetarget($kode_target, $kode_cabang)
  {
    $time = date("Y-m-d H:i:s");
    $level_user = $this->session->userdata('level_user');
    if ($level_user == "kepala cabang") {
      $field1 = "kp";
      $field2 = "time_kp";
    } else if ($level_user == "manager marketing") {
      $field1 = "mm";
      $field2 = "time_mm";
    } else if ($level_user == "general manager") {
      $field1 = "em";
      $field2 = "time_mm";
    } else if ($level_user == "Administrator") {
      $field1 = "direktur";
      $field2 = "time_direktur";
    }
    $query = "UPDATE komisi_target_qty_detail 
    INNER JOIN karyawan k ON komisi_target_qty_detail.id_karyawan = k.id_karyawan
    INNER JOIN komisi_target target ON target.kode_target = komisi_target_qty_detail.kode_target
    SET $field1 = '1', $field2 = '$time'
    WHERE komisi_target_qty_detail.kode_target='$kode_target' AND k.kode_cabang = '$kode_cabang'";
    return $this->db->query($query);
  }

  function canceltarget($kode_target, $kode_cabang)
  {
    $time = date("Y-m-d H:i:s");
    $level_user = $this->session->userdata('level_user');
    if ($level_user == "kepala cabang") {
      $field1 = "kp";
      $field2 = "time_kp";
    } else if ($level_user == "manager marketing") {
      $field1 = "mm";
      $field2 = "time_mm";
    } else if ($level_user == "general manager") {
      $field1 = "em";
      $field2 = "time_mm";
    } else if ($level_user == "Administrator") {
      $field1 = "direktur";
      $field2 = "time_direktur";
    }
    $query = "UPDATE komisi_target_qty_detail 
    INNER JOIN karyawan k ON komisi_target_qty_detail.id_karyawan = k.id_karyawan
    INNER JOIN komisi_target target ON target.kode_target = komisi_target_qty_detail.kode_target
    SET $field1 = NULL, $field2 = '$time'
    WHERE komisi_target_qty_detail.kode_target='$kode_target' AND k.kode_cabang = '$kode_cabang'";
    return $this->db->query($query);
  }

  function generatetargetcashin($kode_target)
  {
    $query = "SELECT targetdetail.kode_target,targetdetail.id_karyawan,ROUND(SUM((jumlah_target*harga_dus) - ((jumlah_target*harga_dus) * 0.025))) as targetcashin
    FROM komisi_target_qty_detail targetdetail
    INNER JOIN karyawan k ON targetdetail.id_karyawan = k.id_karyawan
    INNER JOIN barang ON targetdetail.kode_produk = barang.kode_produk AND k.kode_cabang = barang.kode_cabang
    WHERE targetdetail.kode_target ='$kode_target'
    GROUP  BY targetdetail.id_karyawan
    
    ";
    return $this->db->query($query);
  }

  function cekTarget($kode, $id_karyawan)
  {
    return $this->db->get_where('komisi_target_cashin_detail', array('kode_target' => $kode, 'id_karyawan' => $id_karyawan));
  }

  function generatesaldopiutang($cabang, $bulan, $tahun)
  {
    $bulan = $bulan - 1;
    $tanggal = $tahun . "-" . $bulan . "-01";
    $akhirtanggal  = date('Y-m-t', strtotime($tanggal));
    $query = "SELECT salesbarunew,SUM((IFNULL(penjualan.total,0))-(IFNULL(retur.total,0))-IFNULL(jmlbayar,0))  as saldopiutang
    FROM penjualan
    LEFT JOIN (
      SELECT no_fak_penj,sum( historibayar.bayar ) AS jmlbayar
      FROM historibayar
      WHERE tglbayar <= '$akhirtanggal'
      GROUP BY no_fak_penj
    ) hblalu ON (penjualan.no_fak_penj = hblalu.no_fak_penj)
    
    
    LEFT JOIN (
      SELECT retur.no_fak_penj AS no_fak_penj,
      SUM(total) AS total
      FROM
        retur
      WHERE tglretur <= '$akhirtanggal'
      GROUP BY
        retur.no_fak_penj
    ) retur ON (penjualan.no_fak_penj = retur.no_fak_penj)
    LEFT JOIN (
        SELECT pj.no_fak_penj,
        IF(salesbaru IS NULL,pj.id_karyawan,salesbaru) as salesbarunew, karyawan.nama_karyawan as nama_sales,
        IF(cabangbaru IS NULL,karyawan.kode_cabang,cabangbaru) as cabangbarunew
        FROM penjualan pj
        INNER JOIN karyawan ON pj.id_karyawan = karyawan.id_karyawan
        LEFT JOIN (
          SELECT MAX(id_move) as id_move,no_fak_penj,move_faktur.id_karyawan as salesbaru,karyawan.kode_cabang as cabangbaru
          FROM move_faktur
          INNER JOIN karyawan ON move_faktur.id_karyawan = karyawan.id_karyawan
          WHERE tgl_move <= '$akhirtanggal'
          GROUP BY no_fak_penj,move_faktur.id_karyawan,karyawan.kode_cabang
        ) move_fak ON (pj.no_fak_penj = move_fak.no_fak_penj)
    
    ) pjmove ON (penjualan.no_fak_penj = pjmove.no_fak_penj)
    WHERE cabangbarunew ='$cabang' 
    AND penjualan.jenistransaksi != 'tunai'
    AND tgltransaksi <= '$akhirtanggal'
    AND (ifnull(penjualan.total,0) - (ifnull(retur.total,0))) != IFNULL(jmlbayar,0)
    GROUP BY salesbarunew
    ";

    return $this->db->query($query);
  }

  function cekSaldopiutang($kodesaldoawalpiutang)
  {
    return $this->db->get_where('saldoawal_piutang', array('kode_saldoawalpiutang' => $kodesaldoawalpiutang));
  }

  function loadsaldoawalpiutang($cabang, $bulan, $tahun)
  {
    $this->db->join('karyawan', 'saldoawal_piutang.id_karyawan = karyawan.id_karyawan');
    $this->db->where('karyawan.kode_cabang', $cabang);
    $this->db->where('bulan', $bulan);
    $this->db->where('tahun', $tahun);
    $this->db->from('saldoawal_piutang');
    $this->db->select('saldoawal_piutang.id_karyawan,nama_karyawan,bulan,tahun,saldo_piutang');
    return $this->db->get();
  }
}
