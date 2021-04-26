<?php

class Model_dashboard extends CI_Model
{

	function grafikPenjualan()
	{
		$thisyear = date("Y");
		$lastyear = $thisyear - 1;
		$query = "SELECT MONTH(tgltransaksi) as bulan, SUM(IF(YEAR(tgltransaksi)='$lastyear',total,0)) as lastyear,SUM(IF(YEAR(tgltransaksi)='$thisyear',total,0)) as thisyear
			FROM penjualan
			GROUP BY bulan ";
		return $this->db->query($query);
	}


	function jumlahPelanggan()
	{
		$cabang = $this->session->userdata('cabang');
		if ($cabang != "pusat") {

			$this->db->where('kode_cabang', $cabang);
		}

		$this->db->select('COUNT(kode_pelanggan) as totalpelanggan');
		$this->db->from('pelanggan');
		$this->db->where('nama_pelanggan !=', 'BATAL');
		return $this->db->get();
	}


	function jumlahSales()
	{
		$cabang = $this->session->userdata('cabang');
		if ($cabang != "pusat") {

			$this->db->where('kode_cabang', $cabang);
		}

		$this->db->select('COUNT(id_karyawan) as totalsales');
		$this->db->from('karyawan');
		return $this->db->get();
	}


	function jumlahBarang()
	{
		$cabang = $this->session->userdata('cabang');
		if ($cabang != "pusat") {

			$this->db->where('kode_cabang', $cabang);
		}

		$this->db->select('COUNT(kode_barang) as totalbrg');
		$this->db->from('barang');
		return $this->db->get();
	}


	function penjualan($tahun)
	{
		$cabang = $this->session->userdata('cabang');
		if ($cabang != "pusat") {

			$cabang = "AND pelanggan.kode_cabang = '$cabang'";
		} else {

			$cabang = "";
		}
		$query = "SELECT

					(
					ifnull( SUM(penjualan.total), 0 ) - ( ifnull( SUM(r.totalpf), 0 ) - ifnull( SUM(r.totalgb), 0 ) )
					) AS totalpenjualan

				FROM
					penjualan
					JOIN pelanggan ON penjualan.kode_pelanggan = pelanggan.kode_pelanggan
					JOIN cabang    ON pelanggan.kode_cabang = cabang.kode_cabang
					LEFT JOIN
					(SELECT retur.no_fak_penj AS no_fak_penj,sum(retur.subtotal_gb) AS totalgb,sum(retur.subtotal_pf) AS totalpf from retur WHERE YEAR(tglretur) ='$tahun' group by retur.no_fak_penj
					) r ON ( penjualan.no_fak_penj = r.no_fak_penj )
					LEFT JOIN view_historibayar ON penjualan.no_fak_penj = view_historibayar.no_fak_penj


				WHERE YEAR(tgltransaksi) ='$tahun'"

			. $cabang
			. "
				GROUP BY
				YEAR(tgltransaksi)

				";


		return $this->db->query($query);
	}



	function piutang()
	{
		$cabang = $this->session->userdata('cabang');
		if ($cabang != "pusat") {
			$this->db->where('kode_cabang', $cabang);
		}

		$this->db->select('SUM(sisabayar) as totalpiutang');
		$this->db->from('view_pembayaran');
		return $this->db->get();
	}


	function girojatuhtempo($hariini)
	{
		$this->db->select('id_giro,giro.no_fak_penj,penjualan.kode_pelanggan,nama_pelanggan,kode_cabang,no_giro,materai,namabank,jumlah,tglcair,giro.status,ket');
		$this->db->from('giro');
		$this->db->join('penjualan', 'giro.no_fak_penj = penjualan.no_fak_penj');
		$this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
		$this->db->where('tglcair', $hariini);
		$cabang = $this->session->userdata('cabang');
		if ($cabang != "pusat") {
			$this->db->where('kode_cabang', $cabang);
		}
		$this->db->order_by('nama_pelanggan', 'ASC');
		return $this->db->get();
	}


	function transferjatuhtempo($hariini)
	{

		$this->db->select('id_transfer,transfer.no_fak_penj,penjualan.kode_pelanggan,nama_pelanggan,kode_cabang,norek,namapemilikrek,namabank,jumlah,tglcair,transfer.status,ket');
		$this->db->from('transfer');
		$this->db->join('penjualan', 'transfer.no_fak_penj = penjualan.no_fak_penj');
		$this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
		$this->db->where('tglcair', $hariini);
		$cabang = $this->session->userdata('cabang');
		if ($cabang != "pusat") {
			$this->db->where('kode_cabang', $cabang);
		}
		return $this->db->get();
	}


	function rekapbjcabang($cabang)
	{
		$sampai = "Y-m-d";
		$query  = "SELECT
							m.kode_produk,
							nama_barang,
							isipcsdus,
							isipack,
							isipcs,
							SUM(IF(inout_good='IN' AND mc.kode_cabang='$cabang' AND d.kode_produk = m.kode_produk
						    AND mc.tgl_mutasi_gudang_cabang <= '$sampai',jumlah,0)) -
							SUM(IF(inout_good='OUT' AND mc.kode_cabang='$cabang' AND d.kode_produk = m.kode_produk
						    AND mc.tgl_mutasi_gudang_cabang <= '$sampai',jumlah,0)) as saldoakhir,
							SUM(IF(inout_bad='IN' AND mc.kode_cabang='$cabang' AND d.kode_produk = m.kode_produk
						    AND mc.tgl_mutasi_gudang_cabang <= '$sampai',jumlah,0)) -
							SUM(IF(inout_bad='OUT' AND mc.kode_cabang='$cabang' AND d.kode_produk = m.kode_produk
						    AND mc.tgl_mutasi_gudang_cabang <= '$sampai',jumlah,0))
						    as saldoakhir_bs

					FROM master_barang m
					LEFT JOIN detail_mutasi_gudang_cabang d
					ON m.kode_produk = d.kode_produk
					LEFT JOIN mutasi_gudang_cabang mc
					ON d.no_mutasi_gudang_cabang = mc.no_mutasi_gudang_cabang
					GROUP BY m.kode_produk";

		return $this->db->query($query);
	}


	function persediaangudang()
	{
		$sampai = date("Y-m-d");
		$query  = "SELECT
							m.kode_produk,
							nama_barang,
							isipcsdus,
							isipack,
							isipcs,
							SUM(IF(`inout`='IN'  AND d.kode_produk = m.kode_produk
						    AND mc.tgl_mutasi_gudang <= '$sampai',jumlah,0)) -
							SUM(IF(`inout`='OUT' AND d.kode_produk = m.kode_produk
						    AND mc.tgl_mutasi_gudang <= '$sampai',jumlah,0)) as saldoakhir
							FROM master_barang m
							LEFT JOIN detail_mutasi_gudang d
							ON m.kode_produk = d.kode_produk
							LEFT JOIN mutasi_gudang_jadi mc
							ON d.no_mutasi_gudang = mc.no_mutasi_gudang
							GROUP BY m.kode_produk";

		return $this->db->query($query);
	}

	function permintaanproduksi($bulan, $tahun)
	{

		$this->db->select('detail_permintaan_produksi.kode_produk,nama_barang,oman_mkt,stok_gudang,buffer_stok');
		$this->db->from('detail_permintaan_produksi');
		$this->db->join('master_barang', 'detail_permintaan_produksi.kode_produk = master_barang.kode_produk');
		$this->db->join('permintaan_produksi', 'detail_permintaan_produksi.no_permintaan = permintaan_produksi.no_permintaan');
		$this->db->join('oman', 'permintaan_produksi.no_order = oman.no_order');
		$this->db->where('bulan', $bulan);
		$this->db->where('tahun', $tahun);
		return $this->db->get();
	}


	function get_permintaanproduksi($bulan, $tahun)
	{

		$status = 1;
		$this->db->select('permintaan_produksi.no_permintaan,tgl_permintaan,permintaan_produksi.no_order,bulan,tahun');
		$this->db->from('permintaan_produksi');
		$this->db->join('oman', 'permintaan_produksi.no_order = oman.no_order');
		$this->db->where('bulan', $bulan);
		$this->db->where('tahun', $tahun);
		$this->db->where('permintaan_produksi.status', $status);
		return $this->db->get();
	}

	function rekappersediaan()
	{
		$query = "SELECT * FROM cabang ";

		return $this->db->query($query);
	}

	function getRekapProduksi($tahun)
	{
		$query = "SELECT kode_produk,
		SUM(IF(MONTH(tgl_mutasi_produksi)=1 AND jenis_mutasi='BPBJ',jumlah,0)) as januari,
		SUM(IF(MONTH(tgl_mutasi_produksi)=2 AND jenis_mutasi='BPBJ',jumlah,0)) as februari,
		SUM(IF(MONTH(tgl_mutasi_produksi)=3 AND jenis_mutasi='BPBJ',jumlah,0)) as maret,
		SUM(IF(MONTH(tgl_mutasi_produksi)=4 AND jenis_mutasi='BPBJ',jumlah,0)) as april,
		SUM(IF(MONTH(tgl_mutasi_produksi)=5 AND jenis_mutasi='BPBJ',jumlah,0)) as mei,
		SUM(IF(MONTH(tgl_mutasi_produksi)=6 AND jenis_mutasi='BPBJ',jumlah,0)) as juni,
		SUM(IF(MONTH(tgl_mutasi_produksi)=7 AND jenis_mutasi='BPBJ',jumlah,0)) as juli,
		SUM(IF(MONTH(tgl_mutasi_produksi)=8 AND jenis_mutasi='BPBJ',jumlah,0)) as agustus,
		SUM(IF(MONTH(tgl_mutasi_produksi)=9 AND jenis_mutasi='BPBJ',jumlah,0)) as september,
		SUM(IF(MONTH(tgl_mutasi_produksi)=10 AND jenis_mutasi='BPBJ',jumlah,0)) as oktober,
		SUM(IF(MONTH(tgl_mutasi_produksi)=11 AND jenis_mutasi='BPBJ',jumlah,0)) as november,
		SUM(IF(MONTH(tgl_mutasi_produksi)=12 AND jenis_mutasi='BPBJ',jumlah,0)) as desember
		FROM detail_mutasi_produksi
		INNER JOIN mutasi_produksi ON detail_mutasi_produksi.no_mutasi_produksi = mutasi_produksi.no_mutasi_produksi
		WHERE YEAR(tgl_mutasi_produksi)='$tahun'
		GROUP BY kode_produk ORDER BY kode_produk ASC
		";

		return $this->db->query($query);
	}

	function rekappenjualancashin($bulan, $tahun)
	{
		$dari = $tahun . "-" . $bulan . "-01";
		$sampai = date('Y-m-t', strtotime($dari));

		$query = "SELECT cabang.kode_cabang,nama_cabang,ifnull(total,0) - ifnull(totalretur,0) as netto,totalbayar
		FROM cabang
		LEFT JOIN (
			SELECT karyawan.kode_cabang,SUM(total) as total
			FROM penjualan 
			INNER JOIN karyawan ON penjualan.id_karyawan = karyawan.id_karyawan
		WHERE tgltransaksi BETWEEN '$dari'  AND '$sampai'
		GROUP BY karyawan.kode_cabang
		) pj ON (cabang.kode_cabang = pj.kode_cabang)
		
		LEFT JOIN (
				SELECT karyawan.kode_cabang, SUM(retur.total )AS totalretur
				FROM retur
				INNER JOIN penjualan ON retur.no_fak_penj = penjualan.no_fak_penj
				INNER JOIN karyawan ON penjualan.id_karyawan = karyawan.id_karyawan
				WHERE tglretur BETWEEN '$dari'  AND '$sampai'
				GROUP BY karyawan.kode_cabang) r ON ( cabang.kode_cabang = r.kode_cabang )
		LEFT JOIN (
				SELECT karyawan.kode_cabang, SUM(bayar )AS totalbayar
				FROM historibayar
				INNER JOIN penjualan ON historibayar.no_fak_penj = penjualan.no_fak_penj
				INNER JOIN karyawan ON historibayar.id_karyawan = karyawan.id_karyawan
				WHERE tglbayar BETWEEN '$dari'  AND '$sampai' AND status_bayar IS NULL
				GROUP BY karyawan.kode_cabang) hb ON ( cabang.kode_cabang = hb.kode_cabang )";

		return $this->db->query($query);
	}

	function aupallcabang($tanggal_aup, $exclude)
	{
		if ($exclude == "yes") {
			$cabang = "AND cabangbarunew !='PST'";
		}
		$query = "SELECT
		cabangbarunew,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) <= 15,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as duaminggu,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) <= 31 AND datediff( '$tanggal_aup', tgltransaksi ) > 15,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as satubulan,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) <= 46 AND datediff( '$tanggal_aup', tgltransaksi ) > 31,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as satubulan15,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) <= 60 AND datediff( '$tanggal_aup', tgltransaksi ) > 46,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as duabulan,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) <= 90 AND datediff( '$tanggal_aup', tgltransaksi ) > 60,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as tigabulan,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) <= 180 AND datediff( '$tanggal_aup', tgltransaksi ) > 90,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as enambulan,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) > 180,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as lebihenambulan
	FROM
		penjualan
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
				tgl_move <= '$tanggal_aup' 
			GROUP BY
				no_fak_penj,
				move_faktur.id_karyawan,
				karyawan.kode_cabang 
			) move_fak ON ( pj.no_fak_penj = move_fak.no_fak_penj ) 
			) pjmove ON (
		penjualan.no_fak_penj = pjmove.no_fak_penj 
		)
		LEFT JOIN 
		(SELECT no_fak_penj, sum( historibayar.bayar ) AS jmlbayar 
		FROM historibayar WHERE tglbayar <= '$tanggal_aup' GROUP BY no_fak_penj ) hblalu ON ( penjualan.no_fak_penj = hblalu.no_fak_penj )
		LEFT JOIN ( 
		SELECT retur.no_fak_penj AS no_fak_penj, SUM( total ) AS total 
		FROM retur WHERE tglretur <= '$tanggal_aup' GROUP BY retur.no_fak_penj ) retur ON ( penjualan.no_fak_penj = retur.no_fak_penj ) 
	
		WHERE tgltransaksi <= '$tanggal_aup' AND (ifnull( penjualan.total, 0 ) - (ifnull( retur.total, 0 ))) != IFNULL( jmlbayar, 0 ) " . $cabang . " GROUP BY cabangbarunew";

		return $this->db->query($query);
	}

	function aupcabang($cbg, $tanggal_aup)
	{

		$query = "SELECT
		salesbarunew,nama_sales,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) <= 15,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as duaminggu,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) <= 31 AND datediff( '$tanggal_aup', tgltransaksi ) > 15,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as satubulan,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) <= 46 AND datediff( '$tanggal_aup', tgltransaksi ) > 31,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as satubulan15,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) <= 60 AND datediff( '$tanggal_aup', tgltransaksi ) > 46,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as duabulan,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) <= 90 AND datediff( '$tanggal_aup', tgltransaksi ) > 60,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as tigabulan,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) <= 180 AND datediff( '$tanggal_aup', tgltransaksi ) > 90,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as enambulan,
		SUM(IF(datediff( '$tanggal_aup', tgltransaksi ) > 180,(IFNULL(penjualan.total,0)-IFNULL(retur.total,0)-IFNULL(jmlbayar,0)),0)) as lebihenambulan
	FROM
		penjualan
		LEFT JOIN (
		SELECT
			pj.no_fak_penj,
		IF
			( salesbaru IS NULL, pj.id_karyawan, salesbaru ) AS salesbarunew,
		IF
			( salesbaru IS NULL,karyawan.nama_karyawan, nama_sales_baru ) AS nama_sales,
		IF
			( cabangbaru IS NULL, karyawan.kode_cabang, cabangbaru ) AS cabangbarunew 
		FROM
			penjualan pj
			INNER JOIN karyawan ON pj.id_karyawan = karyawan.id_karyawan
			LEFT JOIN (
			SELECT
				MAX( id_move ) AS id_move,
				no_fak_penj,
				move_faktur.id_karyawan AS salesbaru,karyawan.nama_karyawan AS nama_sales_baru,
				karyawan.kode_cabang AS cabangbaru 
			FROM
				move_faktur
				INNER JOIN karyawan ON move_faktur.id_karyawan = karyawan.id_karyawan 
			WHERE
				tgl_move <= '$tanggal_aup' 
			GROUP BY
				no_fak_penj,
				move_faktur.id_karyawan,
				karyawan.kode_cabang 
			) move_fak ON ( pj.no_fak_penj = move_fak.no_fak_penj ) 
			) pjmove ON (
		penjualan.no_fak_penj = pjmove.no_fak_penj 
		)
		LEFT JOIN 
		(SELECT no_fak_penj, sum( historibayar.bayar ) AS jmlbayar 
		FROM historibayar WHERE tglbayar <= '$tanggal_aup' GROUP BY no_fak_penj ) hblalu ON ( penjualan.no_fak_penj = hblalu.no_fak_penj )
		LEFT JOIN ( 
		SELECT retur.no_fak_penj AS no_fak_penj, SUM( total ) AS total 
		FROM retur WHERE tglretur <= '$tanggal_aup' GROUP BY retur.no_fak_penj ) retur ON ( penjualan.no_fak_penj = retur.no_fak_penj ) 
		WHERE tgltransaksi <= '$tanggal_aup' AND cabangbarunew='$cbg' AND (ifnull( penjualan.total, 0 ) - (ifnull( retur.total, 0 ))) != IFNULL( jmlbayar, 0 ) GROUP BY salesbarunew,nama_sales";

		return $this->db->query($query);
	}

	function rekapkendaraan($cabang, $bulan, $tahun)
	{
		if (!empty($cabang)) {
			$cabang = "WHERE kendaraan.kode_cabang ='$cabang'";
		}
		$dari = $tahun . "-" . $bulan . "-01";
		$sampai = date('Y-m-t', strtotime($dari));
		$query = "SELECT kendaraan.no_polisi,model,jml_berangkat,jmlpenjualan
		FROM kendaraan
		LEFT JOIN (
		SELECT no_kendaraan,COUNT(no_kendaraan) as jml_berangkat
		FROM dpb
		WHERE tgl_pengambilan BETWEEN '$dari' AND '$sampai'
		GROUP BY no_kendaraan
		) dpb ON (kendaraan.no_polisi = dpb.no_kendaraan)
		
		LEFT JOIN (SELECT no_kendaraan,
				ROUND(SUM(IF(jenis_mutasi = 'PENJUALAN',jumlah,0) /isipcsdus),2) as jmlpenjualan
				FROM detail_mutasi_gudang_cabang
				INNER JOIN mutasi_gudang_cabang ON detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang = mutasi_gudang_cabang.no_mutasi_gudang_cabang
				INNER JOIN dpb ON mutasi_gudang_cabang.no_dpb = dpb.no_dpb
				INNER JOIN master_barang ON detail_mutasi_gudang_cabang.kode_produk = master_barang.kode_produk
				WHERE tgl_mutasi_gudang_cabang BETWEEN  '$dari' AND '$sampai'
				GROUP BY no_kendaraan) penjualan ON (kendaraan.no_polisi = penjualan.no_kendaraan)
		" . $cabang;
		return $this->db->query($query);
	}

	function dppp($cabang, $bulan, $tahun)
	{
		$tahunini = $tahun;
		$tahunlalu = $tahun - 1;

		$tgllalu1 = $tahunlalu . "-" . $bulan . "-01";
		$tgllalu2 = date('Y-m-t', strtotime($tgllalu1));

		$tglini1 = $tahunini . "-" . $bulan . "-01";
		$tglini2 = date('Y-m-t', strtotime($tglini1));

		if (!empty($cabang)) {
			$cbg = "AND karyawan.kode_cabang = '$cabang'";
		} else {
			$cbg = "";
		}

		$query = "SELECT mb.kode_produk,nama_barang,isipcsdus,
		realisasi_bulanini_tahunlalu,
		jmltarget,
		realisasi_bulanini_tahunini,
		realisasi_sampaibulanini_tahunlalu,
		jmltarget_sampaibulanini,
		realisasi_sampaibulanini_tahunini
		FROM master_barang mb
		
		LEFT JOIN (
		SELECT kt.kode_produk,SUM(jumlah_target) as jmltarget
		FROM komisi_target_qty_detail kt 
		INNER JOIN komisi_target ON kt.kode_target = komisi_target.kode_target
		INNER JOIN karyawan ON kt.id_karyawan = karyawan.id_karyawan
		WHERE bulan ='$bulan' AND tahun ='$tahunini'" . $cbg . " 
		GROUP BY kt.kode_produk
		) target ON (target.kode_produk = mb.kode_produk)
		
		LEFT JOIN (
		SELECT kt.kode_produk,SUM(jumlah_target) as jmltarget_sampaibulanini
		FROM komisi_target_qty_detail kt 
		INNER JOIN komisi_target ON kt.kode_target = komisi_target.kode_target
		INNER JOIN karyawan ON kt.id_karyawan = karyawan.id_karyawan
		WHERE bulan BETWEEN '1' AND '$bulan' AND tahun ='$tahunini'" . $cbg . " 
		GROUP BY kt.kode_produk
		) target2 ON (target2.kode_produk = mb.kode_produk)
		
		
		
		LEFT JOIN (
			SELECT b.kode_produk,SUM(jumlah) as realisasi_bulanini_tahunlalu
			FROM detailpenjualan dp 
			INNER JOIN barang b ON dp.kode_barang = b.kode_barang
			INNER JOIN penjualan p ON dp.no_fak_penj = p.no_fak_penj
			INNER JOIN karyawan ON p.id_karyawan = karyawan.id_karyawan
			LEFT JOIN (
				SELECT no_fak_penj,max(tglbayar) as lastpayment 
				FROM historibayar 
				GROUP BY no_fak_penj
			) hb ON (hb.no_fak_penj = p.no_fak_penj)
			WHERE tgltransaksi BETWEEN '$tgllalu1' AND '$tgllalu2'  AND status_lunas = '1' AND lastpayment <= '$tgllalu2'" . $cbg . "  
			GROUP BY b.kode_produk
			
		) dpen ON (dpen.kode_produk = mb.kode_produk)
		
		LEFT JOIN (
			SELECT b.kode_produk,SUM(jumlah) as realisasi_bulanini_tahunini
			FROM detailpenjualan dp 
			INNER JOIN barang b ON dp.kode_barang = b.kode_barang
			INNER JOIN penjualan p ON dp.no_fak_penj = p.no_fak_penj
			INNER JOIN karyawan ON p.id_karyawan = karyawan.id_karyawan
			LEFT JOIN (
				SELECT no_fak_penj,max(tglbayar) as lastpayment 
				FROM historibayar 
				GROUP BY no_fak_penj
			) hb ON (hb.no_fak_penj = p.no_fak_penj)
			WHERE tgltransaksi BETWEEN '$tglini1' AND '$tglini2'  AND status_lunas = '1' AND lastpayment <= '$tglini2'" . $cbg . "  
			GROUP BY b.kode_produk
			
		) dpen2 ON (dpen2.kode_produk = mb.kode_produk) 
		
		LEFT JOIN (
			SELECT b.kode_produk,SUM(jumlah) as realisasi_sampaibulanini_tahunlalu
			FROM detailpenjualan dp 
			INNER JOIN barang b ON dp.kode_barang = b.kode_barang
			INNER JOIN penjualan p ON dp.no_fak_penj = p.no_fak_penj
			INNER JOIN karyawan ON p.id_karyawan = karyawan.id_karyawan
			LEFT JOIN (
				SELECT no_fak_penj,max(tglbayar) as lastpayment 
				FROM historibayar 
				GROUP BY no_fak_penj
			) hb ON (hb.no_fak_penj = p.no_fak_penj)
			WHERE tgltransaksi BETWEEN '$tgllalu1' AND '$tgllalu2'  AND status_lunas = '1' AND lastpayment <= '$tgllalu2'" . $cbg . "   
			GROUP BY b.kode_produk
			
		) dpen3 ON (dpen3.kode_produk = mb.kode_produk)
		
		
		LEFT JOIN (
			SELECT b.kode_produk,SUM(jumlah) as realisasi_sampaibulanini_tahunini
			FROM detailpenjualan dp 
			INNER JOIN barang b ON dp.kode_barang = b.kode_barang
			INNER JOIN penjualan p ON dp.no_fak_penj = p.no_fak_penj
			INNER JOIN karyawan ON p.id_karyawan = karyawan.id_karyawan
			LEFT JOIN (
				SELECT no_fak_penj,max(tglbayar) as lastpayment 
				FROM historibayar 
				GROUP BY no_fak_penj
			) hb ON (hb.no_fak_penj = p.no_fak_penj)
			WHERE tgltransaksi BETWEEN '$tglini1' AND '$tglini2'  AND status_lunas = '1' AND lastpayment <= '$tglini2'" . $cbg . "  
			GROUP BY b.kode_produk
			
		) dpen4 ON (dpen4.kode_produk = mb.kode_produk)";

		return $this->db->query($query);
	}
}
