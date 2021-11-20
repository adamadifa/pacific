<?php

class Model_laporangudangjadi extends CI_Model
{


	function listproduk()
	{
		return $this->db->get('master_barang');
	}


	function get_produk($produk = null)
	{
		$this->db->where('kode_produk', $produk);
		return $this->db->get('master_barang');
	}

	function getSaldoAwalMutasi($dari, $sampai, $produk)
	{
		$this->db->where('tgl_mutasi_gudang <', $dari);
		$this->db->where('detail_mutasi_gudang.kode_produk', $produk);
		$this->db->join('mutasi_gudang_jadi', 'detail_mutasi_gudang.no_mutasi_gudang=mutasi_gudang_jadi.no_mutasi_gudang');
		$this->db->select(
			"SUM(IF( `inout` = 'IN', jumlah, 0)) AS jml_in,
			SUM(IF( `inout` = 'OUT', jumlah, 0)) AS jml_out,
			SUM(IF( `inout` = 'IN', jumlah, 0)) -SUM(IF( `inout` = 'OUT', jumlah, 0)) as saldo_awal"
		);
		$this->db->from('detail_mutasi_gudang');
		return $this->db->get();
	}


	function getSaldoAwalMutasiCabang($cabang, $dari, $sampai, $produk)
	{
		$tanggal = explode("-", $dari);
		$bulan 	 = $tanggal[1];
		$tahun 	 = $tanggal[0];
		$this->db->select('saldoawal_bj_detail.kode_produk,jumlah,isipcsdus,isipack,isipcs');
		$this->db->from('saldoawal_bj_detail');
		$this->db->join('saldoawal_bj', 'saldoawal_bj_detail.kode_saldoawal = saldoawal_bj.kode_saldoawal');
		$this->db->join('master_barang', 'saldoawal_bj_detail.kode_produk = master_barang.kode_produk');
		$this->db->where('MONTH(tanggal)', $bulan);
		$this->db->where('YEAR(tanggal)', $tahun);
		$this->db->where('kode_cabang', $cabang);
		$this->db->where('status', 'GS');
		$this->db->where('saldoawal_bj_detail.kode_produk', $produk);
		return $this->db->get();
	}

	function getSaldoAwalMutasiBadCabang($cabang, $dari, $sampai, $produk)
	{
		$tanggal = explode("-", $dari);
		$bulan 	 = $tanggal[1];
		$tahun 	 = $tanggal[0];
		$this->db->select('saldoawal_bj_detail.kode_produk,jumlah,isipcsdus,isipack,isipcs');
		$this->db->from('saldoawal_bj_detail');
		$this->db->join('saldoawal_bj', 'saldoawal_bj_detail.kode_saldoawal = saldoawal_bj.kode_saldoawal');
		$this->db->join('master_barang', 'saldoawal_bj_detail.kode_produk = master_barang.kode_produk');
		$this->db->where('MONTH(tanggal)', $bulan);
		$this->db->where('YEAR(tanggal)', $tahun);
		$this->db->where('kode_cabang', $cabang);
		$this->db->where('status', 'BS');
		$this->db->where('saldoawal_bj_detail.kode_produk', $produk);
		return $this->db->get();
	}

	function getMtsa($cabang, $dari, $produk)
	{
		$tanggal = explode("-", $dari);
		$bulan 	 = $tanggal[1];
		$tahun 	 = $tanggal[0];
		$mulai   = $tahun . "-" . $bulan . "-" . "01";
		$this->db->where('tgl_mutasi_gudang_cabang >=', $mulai);
		$this->db->where('tgl_mutasi_gudang_cabang <', $dari);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('kode_cabang', $cabang);
		$this->db->where('jenis_mutasi !=', 'KIRIM PUSAT');
		$this->db->join('mutasi_gudang_cabang', 'detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang=mutasi_gudang_cabang.no_mutasi_gudang_cabang');
		$this->db->join('master_barang', 'detail_mutasi_gudang_cabang.kode_produk=master_barang.kode_produk');
		$this->db->select(
			"SUM(IF( `inout_good` = 'IN', jumlah, 0)) AS jml_in,
			SUM(IF( `inout_good` = 'OUT', jumlah, 0)) AS jml_out,
			SUM(IF( `inout_good` = 'IN', jumlah, 0)) -SUM(IF( `inout_good` = 'OUT', jumlah, 0)) as jumlah,
			isipcsdus"
		);
		$this->db->from('detail_mutasi_gudang_cabang');
		return $this->db->get();
	}

	function getMtsaBad($cabang, $dari, $produk)
	{
		$tanggal = explode("-", $dari);
		$bulan 	 = $tanggal[1];
		$tahun 	 = $tanggal[0];
		$mulai   = $tahun . "-" . $bulan . "-" . "01";
		$this->db->where('tgl_mutasi_gudang_cabang >=', $mulai);
		$this->db->where('tgl_mutasi_gudang_cabang <', $dari);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('kode_cabang', $cabang);
		$this->db->where('kondisi', 'BAD');
		$this->db->join('mutasi_gudang_cabang', 'detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang=mutasi_gudang_cabang.no_mutasi_gudang_cabang');
		$this->db->join('master_barang', 'detail_mutasi_gudang_cabang.kode_produk=master_barang.kode_produk');
		$this->db->select(
			"SUM(IF( `inout_bad` = 'IN', jumlah, 0)) AS jml_in,
			SUM(IF( `inout_bad` = 'OUT', jumlah, 0)) AS jml_out,
			SUM(IF( `inout_bad` = 'IN', jumlah, 0)) -SUM(IF( `inout_bad` = 'OUT', jumlah, 0)) as jumlah,
			isipcsdus"
		);
		$this->db->from('detail_mutasi_gudang_cabang');
		return $this->db->get();
	}

	function mutasi($dari, $sampai, $produk)
	{

		$this->db->order_by('tgl_mutasi_gudang,mutasi_gudang_jadi.time_stamp', 'ASC');
		$this->db->where('tgl_mutasi_gudang >=', $dari);
		$this->db->where('tgl_mutasi_gudang <=', $sampai);
		$this->db->where('detail_mutasi_gudang.kode_produk', $produk);
		$this->db->join('mutasi_gudang_jadi', 'detail_mutasi_gudang.no_mutasi_gudang=mutasi_gudang_jadi.no_mutasi_gudang');
		$this->db->join('permintaan_pengiriman', 'mutasi_gudang_jadi.no_permintaan_pengiriman = permintaan_pengiriman.no_permintaan_pengiriman', 'LEFT');
		$this->db->join('master_barang', 'detail_mutasi_gudang.kode_produk=master_barang.kode_produk');
		$this->db->select('detail_mutasi_gudang.no_mutasi_gudang,tgl_mutasi_gudang,jenis_mutasi,inout,mutasi_gudang_jadi.keterangan,detail_mutasi_gudang.kode_produk,jumlah,
		kode_cabang');
		$this->db->from('detail_mutasi_gudang');
		return $this->db->get();
	}


	function mutasi_cabang($cabang, $dari, $sampai, $produk)
	{
		$this->db->order_by('tgl_mutasi_gudang_cabang,order,no_dpb', 'ASC');
		$this->db->where('tgl_mutasi_gudang_cabang >=', $dari);
		$this->db->where('tgl_mutasi_gudang_cabang <=', $sampai);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('mutasi_gudang_cabang.kode_cabang', $cabang);
		$this->db->where('jenis_mutasi !=', 'KIRIM PUSAT');
		$this->db->where('inout_good !=', '');
		$this->db->or_where('jenis_mutasi', 'PENYESUAIAN BAD');
		$this->db->where('tgl_mutasi_gudang_cabang >=', $dari);
		$this->db->where('tgl_mutasi_gudang_cabang <=', $sampai);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('mutasi_gudang_cabang.kode_cabang', $cabang);
		$this->db->where('inout_good !=', '');
		$this->db->join('mutasi_gudang_cabang', 'detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang=mutasi_gudang_cabang.no_mutasi_gudang_cabang');
		$this->db->join('master_barang', 'detail_mutasi_gudang_cabang.kode_produk=master_barang.kode_produk');
		$this->db->join('dpb', 'mutasi_gudang_cabang.no_dpb = dpb.no_dpb', 'LEFT');
		$this->db->join('karyawan', 'dpb.id_karyawan = karyawan.id_karyawan', 'LEFT');
		$this->db->select('detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang,tgl_mutasi_gudang_cabang,mutasi_gudang_cabang.no_dpb,nama_karyawan,tujuan,no_suratjalan,tgl_kirim,detail_mutasi_gudang_cabang.jumlah,isipcsdus,inout_good,promo,jenis_mutasi,
		date_format(mutasi_gudang_cabang.date_created, "%d %M %Y %H:%i:%s") as date_created, date_format(mutasi_gudang_cabang.date_updated, "%d %M %Y %H:%i:%s") as date_updated
		');
		$this->db->from('detail_mutasi_gudang_cabang');
		return $this->db->get();
	}

	function mutasibadstok_cabang($cabang, $dari, $sampai, $produk)
	{
		$kondisi = "BAD";
		$this->db->order_by('tgl_mutasi_gudang_cabang,order', 'ASC');
		$this->db->where('tgl_mutasi_gudang_cabang >=', $dari);
		$this->db->where('tgl_mutasi_gudang_cabang <=', $sampai);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('mutasi_gudang_cabang.kode_cabang', $cabang);
		$this->db->where('kondisi', $kondisi);
		$this->db->join('mutasi_gudang_cabang', 'detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang=mutasi_gudang_cabang.no_mutasi_gudang_cabang');
		$this->db->join('master_barang', 'detail_mutasi_gudang_cabang.kode_produk=master_barang.kode_produk');
		$this->db->select('detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang,no_dpb,tgl_mutasi_gudang_cabang,no_suratjalan,tgl_kirim,detail_mutasi_gudang_cabang.jumlah,isipcsdus,inout_bad,promo,jenis_mutasi,
		date_format(mutasi_gudang_cabang.date_created, "%d %M %Y %H:%i:%s") as date_created, date_format(mutasi_gudang_cabang.date_updated, "%d %M %Y %H:%i:%s") as date_updated
		');
		$this->db->from('detail_mutasi_gudang_cabang');
		return $this->db->get();
	}

	function rekapmutasi($dari, $sampai)
	{

		$query = "SELECT
					m.kode_produk,
					nama_barang,
					(
						SELECT
							IFNULL(SUM( IF ( `inout` = 'IN', jumlah, 0 ) ) -
							SUM( IF ( `inout` = 'OUT', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk AND tgl_mutasi_gudang < '$dari'
					) as saldoawal,
					jmlfsthp,
					jmlrepack,
					jmlreject,
					jmllainlain_in,
					jmllainlain_out,
					jmlsuratjalan
				FROM
					master_barang m
				LEFT JOIN (
					SELECT
							kode_produk,
							SUM(IF(jenis_mutasi = 'FSTHP' ,jumlah,0)) as jmlfsthp,
							SUM(IF(jenis_mutasi = 'REPACK',jumlah,0)) as jmlrepack,
							SUM(IF(jenis_mutasi = 'REJECT',jumlah,0)) as jmlreject,
							SUM(IF(jenis_mutasi = 'LAINLAIN' AND  `inout` ='IN',jumlah,0)) as jmllainlain_in,
							SUM(IF(jenis_mutasi = 'LAINLAIN' AND  `inout` ='OUT',jumlah,0)) as jmllainlain_out,
							SUM(IF(jenis_mutasi = 'SURAT JALAN',jumlah,0)) as jmlsuratjalan
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE
						tgl_mutasi_gudang BETWEEN '$dari' AND '$sampai' GROUP BY kode_produk) mutasi ON (m.kode_produk = mutasi.kode_produk) ";

		return $this->db->query($query);
	}

	function rekaphasilproduksi($bulan, $tahun)
	{

		$minggu1 = "'" . $tahun . "-" . $bulan . "-01'" . " AND '" . $tahun . "-" . $bulan . "-07'";
		$minggu2 = "'" . $tahun . "-" . $bulan . "-08'" . " AND '" . $tahun . "-" . $bulan . "-14'";
		$minggu3 = "'" . $tahun . "-" . $bulan . "-15'" . " AND '" . $tahun . "-" . $bulan . "-21'";
		$minggu4 = "'" . $tahun . "-" . $bulan . "-22'" . " AND '" . $tahun . "-" . $bulan . "-31'";
		$query = "SELECT
					m.kode_produk,
					nama_barang,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'FSTHP', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu1
					) as minggu1,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'FSTHP', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu2
					) as minggu2,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'FSTHP', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu3
					) as minggu3,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'FSTHP', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu4
					) as minggu4

				FROM master_barang m";
		return $this->db->query($query);
	}

	function rekappengeluaran($bulan, $tahun)
	{

		$minggu1 = "'" . $tahun . "-" . $bulan . "-01'" . " AND '" . $tahun . "-" . $bulan . "-07'";
		$minggu2 = "'" . $tahun . "-" . $bulan . "-08'" . " AND '" . $tahun . "-" . $bulan . "-14'";
		$minggu3 = "'" . $tahun . "-" . $bulan . "-15'" . " AND '" . $tahun . "-" . $bulan . "-21'";
		$minggu4 = "'" . $tahun . "-" . $bulan . "-22'" . " AND '" . $tahun . "-" . $bulan . "-31'";
		$query = "SELECT
					m.kode_produk,
					nama_barang,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'SURAT JALAN', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu1
					) as minggu1,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'SURAT JALAN', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu2
					) as minggu2,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'SURAT JALAN', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu3
					) as minggu3,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'SURAT JALAN', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu4
					) as minggu4

				FROM master_barang m";
		return $this->db->query($query);
	}

	function realisasipengeluaran($bulan, $tahun)
	{

		$minggu1 = "'" . $tahun . "-" . $bulan . "-01'" . " AND '" . $tahun . "-" . $bulan . "-07'";
		$minggu2 = "'" . $tahun . "-" . $bulan . "-08'" . " AND '" . $tahun . "-" . $bulan . "-14'";
		$minggu3 = "'" . $tahun . "-" . $bulan . "-15'" . " AND '" . $tahun . "-" . $bulan . "-21'";
		$minggu4 = "'" . $tahun . "-" . $bulan . "-22'" . " AND '" . $tahun . "-" . $bulan . "-31'";

		$query = "SELECT
					m.kode_produk,
					nama_barang,
					(
						SELECT
							IFNULL(SUM(jumlah),0)
						FROM
							detail_permintaan_pengiriman dp
						INNER JOIN permintaan_pengiriman pp
						ON dp.no_permintaan_pengiriman = pp.no_permintaan_pengiriman
						WHERE dp.kode_produk = m.kode_produk
						AND tgl_permintaan_pengiriman
						BETWEEN $minggu1
					) as pm1,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'FSTHP', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu1
					) as minggu1,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'SURAT JALAN', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu1
					) as sj1,
					(
						SELECT
							IFNULL(SUM(jumlah),0)
						FROM
							detail_permintaan_pengiriman dp
						INNER JOIN permintaan_pengiriman pp
						ON dp.no_permintaan_pengiriman = pp.no_permintaan_pengiriman
						WHERE dp.kode_produk = m.kode_produk
						AND tgl_permintaan_pengiriman
						BETWEEN $minggu2
					) as pm2,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'FSTHP', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu2
					) as minggu2,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'SURAT JALAN', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu2
					) as sj2,
					(
						SELECT
							IFNULL(SUM(jumlah),0)
						FROM
							detail_permintaan_pengiriman dp
						INNER JOIN permintaan_pengiriman pp
						ON dp.no_permintaan_pengiriman = pp.no_permintaan_pengiriman
						WHERE dp.kode_produk = m.kode_produk
						AND tgl_permintaan_pengiriman
						BETWEEN $minggu3
					) as pm3,

					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'FSTHP', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu3
					) as minggu3,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'SURAT JALAN', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu3
					) as sj3,
					(
						SELECT
							IFNULL(SUM(jumlah),0)
						FROM
							detail_permintaan_pengiriman dp
						INNER JOIN permintaan_pengiriman pp
						ON dp.no_permintaan_pengiriman = pp.no_permintaan_pengiriman
						WHERE dp.kode_produk = m.kode_produk
						AND tgl_permintaan_pengiriman
						BETWEEN $minggu4
					) as pm4,

					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'FSTHP', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu4
					) as minggu4,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'SURAT JALAN', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						WHERE d.kode_produk = m.kode_produk
						AND tgl_mutasi_gudang BETWEEN $minggu4
					) as sj4


				FROM master_barang m";

		return $this->db->query($query);
	}


	function realisasikiriman($cabang, $bulan, $tahun)
	{

		if ($cabang 	!= "") {
			$cabang = "AND kode_cabang = '" . $cabang . "' ";
		}
		$query = "SELECT
					m.kode_produk,
					nama_barang,
					(
						SELECT
							IFNULL(SUM(jumlah),0)
						FROM
							detail_permintaan_pengiriman dp
						INNER JOIN permintaan_pengiriman pp
						ON dp.no_permintaan_pengiriman = pp.no_permintaan_pengiriman
						WHERE dp.kode_produk = m.kode_produk
						AND MONTH(tgl_permintaan_pengiriman) = '$bulan'  AND YEAR(tgl_permintaan_pengiriman) = '$tahun'"
			. $cabang
			. "
					) as permintaan,
					(
						SELECT
							IFNULL(SUM(target_bulan),0)
						FROM
							target_pengiriman tp
						WHERE tp.kode_produk = m.kode_produk
						AND bulan = '$bulan'  AND tahun = '$tahun'"
			. $cabang
			. "
					) as target,
					(
						SELECT
							IFNULL(SUM( IF ( `jenis_mutasi` = 'SURAT JALAN', jumlah, 0 ) ),0)
						FROM
							detail_mutasi_gudang d
						INNER JOIN mutasi_gudang_jadi
						ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
						INNER JOIN permintaan_pengiriman pp
						ON mutasi_gudang_jadi.no_permintaan_pengiriman = pp.no_permintaan_pengiriman

						WHERE d.kode_produk = m.kode_produk
						AND MONTH(tgl_mutasi_gudang) = '$bulan' AND YEAR(tgl_mutasi_gudang) = '$tahun'"
			. $cabang
			. "
					) as realisasi

				FROM master_barang m ";

		return $this->db->query($query);
	}


	function rekapbjcabang($cabang, $dari, $sampai)
	{
		$tanggal = explode("-", $dari);
		$bulan 	 = $tanggal[1];
		$tahun 	 = $tanggal[0];
		$mulai   = $tahun . "-" . $bulan . "-" . "01";
		$query = "SELECT
			m.kode_produk,
			nama_barang,
			isipcsdus,
			isipack,
			isipcs,
			saldoawalgs,saldoawalbs,
			SUM(IF(jenis_mutasi = 'SURAT JALAN' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai',jumlah,0))
			as pusat,
			SUM(IF(jenis_mutasi = 'TRANSIT IN' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai',jumlah,0))
			as transit_in,
			SUM(IF(jenis_mutasi = 'RETUR' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai',jumlah,0))
			as retur,
			SUM(IF(jenis_mutasi = 'HUTANG KIRIM' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai'
			AND inout_good='IN' OR jenis_mutasi = 'PL TTR' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai'
			AND inout_good='IN' OR jenis_mutasi = 'PENYESUAIAN BAD' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai'
			AND inout_good='IN',jumlah,0))
			as lainlain_in,
			SUM(IF(jenis_mutasi = 'PENYESUAIAN' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai'
			AND inout_good='IN',jumlah,0))
			as penyesuaian_in,
			SUM(IF(jenis_mutasi = 'PENYESUAIAN BAD' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai'
			AND inout_bad='IN',jumlah,0))
			as penyesuaianbad_in,
			SUM(IF(jenis_mutasi = 'REPACK' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai',jumlah,0))
			as repack,
			SUM(IF(jenis_mutasi = 'PENJUALAN' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai',jumlah,0))
			as penjualan,
			SUM(IF(jenis_mutasi = 'PROMOSI'  AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai',jumlah,0))
			as promosi,
			SUM(IF(jenis_mutasi = 'REJECT PASAR' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai',jumlah,0))
			as reject_pasar,
			SUM(IF(jenis_mutasi = 'REJECT MOBIL' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai',jumlah,0))
			as reject_mobil,
			SUM(IF(jenis_mutasi = 'REJECT GUDANG' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai',jumlah,0))
			as reject_gudang,
			SUM(IF(jenis_mutasi = 'TRANSIT OUT' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai',jumlah,0))
			as transit_out,
			SUM(IF(jenis_mutasi = 'PL HUTANG KIRIM' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai'
			AND inout_good='OUT' OR jenis_mutasi = 'TTR' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai'
			AND inout_good='OUT' OR jenis_mutasi = 'GANTI BARANG' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai' AND inout_good='OUT'
			,jumlah,0))
			as lainlain_out,
			SUM(IF(jenis_mutasi = 'PENYESUAIAN' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai'
			AND inout_good='OUT',jumlah,0))
			as penyesuaian_out,
			SUM(IF(jenis_mutasi = 'PENYESUAIAN BAD' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai'
			AND inout_bad='OUT',jumlah,0))
			as penyesuaianbad_out,
		  SUM(IF(jenis_mutasi = 'KIRIM PUSAT' AND mc.kode_cabang='$cabang'
			AND mc.tgl_mutasi_gudang_cabang BETWEEN '$dari' AND '$sampai',jumlah,0))
			as kirimpusat,

			SUM(IF(mc.tgl_mutasi_gudang_cabang >= '$mulai' AND mc.tgl_mutasi_gudang_cabang < '$dari' AND mc.kode_cabang='$cabang'
				AND jenis_mutasi !='KIRIM PUSAT' AND inout_good='IN'
			,jumlah,0)) - SUM(IF(mc.tgl_mutasi_gudang_cabang >= '$mulai' AND mc.tgl_mutasi_gudang_cabang < '$dari' AND mc.kode_cabang='$cabang'
				AND jenis_mutasi !='KIRIM PUSAT' AND inout_good='OUT'
			,jumlah,0)) as sisamutasi,

			SUM(IF(mc.tgl_mutasi_gudang_cabang >= '$mulai' AND mc.tgl_mutasi_gudang_cabang < '$dari' AND mc.kode_cabang='$cabang'
				AND kondisi ='BAD' AND inout_bad='IN'
			,jumlah,0)) - SUM(IF(mc.tgl_mutasi_gudang_cabang >= '$mulai' AND mc.tgl_mutasi_gudang_cabang < '$dari' AND mc.kode_cabang='$cabang'
				AND kondisi ='BAD' AND inout_bad='OUT'
			,jumlah,0)) as sisamutasibad
		FROM master_barang m
		LEFT JOIN
		(SELECT kode_produk,jumlah as saldoawalgs FROM saldoawal_bj_detail
		 INNER JOIN saldoawal_bj ON saldoawal_bj_detail.kode_saldoawal = saldoawal_bj.kode_saldoawal
		 WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal)='$tahun' AND kode_cabang='$cabang' AND status='GS'
	  ) sags ON (m.kode_produk = sags.kode_produk)
		LEFT JOIN
		(SELECT kode_produk,jumlah as saldoawalbs FROM saldoawal_bj_detail
		 INNER JOIN saldoawal_bj ON saldoawal_bj_detail.kode_saldoawal = saldoawal_bj.kode_saldoawal
		 WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal)='$tahun' AND kode_cabang='$cabang' AND status='BS'
	 ) sabs ON (m.kode_produk = sabs.kode_produk)
		LEFT JOIN detail_mutasi_gudang_cabang d
		ON m.kode_produk = d.kode_produk
		LEFT JOIN mutasi_gudang_cabang mc
		ON d.no_mutasi_gudang_cabang = mc.no_mutasi_gudang_cabang
		GROUP BY m.kode_produk,nama_barang,
		isipcsdus,
		isipack,
		isipcs,saldoawalgs,saldoawalbs";
		return $this->db->query($query);
	}


	function mutasisuratjalan($cabang, $bulan, $tahun, $produk)
	{
		$this->db->order_by('tgl_mutasi_gudang_cabang', 'ASC');
		$this->db->where('MONTH(tgl_mutasi_gudang_cabang)', $bulan);
		$this->db->where('YEAR(tgl_mutasi_gudang_cabang)', $tahun);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('mutasi_gudang_cabang.kode_cabang', $cabang);
		$this->db->where('jenis_mutasi', 'SURAT JALAN');
		$this->db->or_where('jenis_mutasi', 'TRANSIT OUT');
		$this->db->where('MONTH(tgl_mutasi_gudang_cabang)', $bulan);
		$this->db->where('YEAR(tgl_mutasi_gudang_cabang)', $tahun);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('mutasi_gudang_cabang.kode_cabang', $cabang);
		$this->db->or_where('jenis_mutasi', 'TRANSIT IN');
		$this->db->where('MONTH(tgl_mutasi_gudang_cabang)', $bulan);
		$this->db->where('YEAR(tgl_mutasi_gudang_cabang)', $tahun);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('mutasi_gudang_cabang.kode_cabang', $cabang);
		$this->db->join('mutasi_gudang_cabang', 'detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang=mutasi_gudang_cabang.no_mutasi_gudang_cabang');
		$this->db->join('master_barang', 'detail_mutasi_gudang_cabang.kode_produk=master_barang.kode_produk');
		$this->db->join('dpb', 'mutasi_gudang_cabang.no_dpb = dpb.no_dpb', 'LEFT');
		$this->db->join('karyawan', 'dpb.id_karyawan = karyawan.id_karyawan', 'LEFT');
		$this->db->select('detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang,tgl_mutasi_gudang_cabang,mutasi_gudang_cabang.no_dpb,nama_karyawan,tujuan,no_suratjalan,tgl_kirim,detail_mutasi_gudang_cabang.jumlah,isipcsdus,inout_good,promo,jenis_mutasi,
		date_format(mutasi_gudang_cabang.date_created, "%d %M %Y %H:%i:%s") as date_created, date_format(mutasi_gudang_cabang.date_updated, "%d %M %Y %H:%i:%s") as date_updated
		');
		$this->db->from('detail_mutasi_gudang_cabang');
		return $this->db->get();
	}

	function mutasipenyesuaian($cabang, $bulan, $tahun, $produk)
	{
		$this->db->order_by('tgl_mutasi_gudang_cabang', 'ASC');
		$this->db->where('MONTH(tgl_mutasi_gudang_cabang)', $bulan);
		$this->db->where('YEAR(tgl_mutasi_gudang_cabang)', $tahun);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('mutasi_gudang_cabang.kode_cabang', $cabang);
		$this->db->where('jenis_mutasi', 'PENYESUAIAN');
		$this->db->where('inout_good', 'IN');
		$this->db->or_where('jenis_mutasi', 'PENYESUAIAN');
		$this->db->where('MONTH(tgl_mutasi_gudang_cabang)', $bulan);
		$this->db->where('YEAR(tgl_mutasi_gudang_cabang)', $tahun);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('mutasi_gudang_cabang.kode_cabang', $cabang);
		$this->db->where('inout_good', 'OUT');
		$this->db->join('mutasi_gudang_cabang', 'detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang=mutasi_gudang_cabang.no_mutasi_gudang_cabang');
		$this->db->join('master_barang', 'detail_mutasi_gudang_cabang.kode_produk=master_barang.kode_produk');
		$this->db->join('dpb', 'mutasi_gudang_cabang.no_dpb = dpb.no_dpb', 'LEFT');
		$this->db->join('karyawan', 'dpb.id_karyawan = karyawan.id_karyawan', 'LEFT');
		$this->db->select('detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang,tgl_mutasi_gudang_cabang,mutasi_gudang_cabang.no_dpb,nama_karyawan,tujuan,no_suratjalan,tgl_kirim,detail_mutasi_gudang_cabang.jumlah,isipcsdus,inout_good,promo,jenis_mutasi,
		date_format(mutasi_gudang_cabang.date_created, "%d %M %Y %H:%i:%s") as date_created, date_format(mutasi_gudang_cabang.date_updated, "%d %M %Y %H:%i:%s") as date_updated
		');
		$this->db->from('detail_mutasi_gudang_cabang');
		return $this->db->get();
	}


	function mutasidpbpengambilan($cabang, $bulan, $tahun, $produk)
	{
		$this->db->order_by('tgl_pengambilan', 'asc');
		$this->db->select('detail_dpb.no_dpb,dpb.kode_cabang,dpb.id_karyawan,nama_karyawan,tujuan,no_kendaraan,tgl_pengambilan,jml_pengambilan,tgl_pengembalian,jml_pengembalian');
		$this->db->from('detail_dpb');
		$this->db->join('dpb', 'detail_dpb.no_dpb = dpb.no_dpb');
		$this->db->join('karyawan', 'dpb.id_karyawan = karyawan.id_karyawan');
		$this->db->where('dpb.kode_cabang', $cabang);
		$this->db->where('MONTH(tgl_pengambilan)', $bulan);
		$this->db->where('YEAR(tgl_pengambilan)', $tahun);
		$this->db->where('kode_produk', $produk);
		return $this->db->get();
	}

	function mutasidpbpengembalian($cabang, $bulan, $tahun, $produk)
	{
		$this->db->order_by('tgl_pengembalian', 'asc');
		$this->db->select('detail_dpb.no_dpb,dpb.kode_cabang,dpb.id_karyawan,nama_karyawan,tujuan,no_kendaraan,tgl_pengambilan,jml_pengambilan,tgl_pengembalian,jml_pengembalian');
		$this->db->from('detail_dpb');
		$this->db->join('dpb', 'detail_dpb.no_dpb = dpb.no_dpb');
		$this->db->join('karyawan', 'dpb.id_karyawan = karyawan.id_karyawan');
		$this->db->where('dpb.kode_cabang', $cabang);
		$this->db->where('MONTH(tgl_pengembalian)', $bulan);
		$this->db->where('YEAR(tgl_pengembalian)', $tahun);
		$this->db->where('kode_produk', $produk);
		return $this->db->get();
	}


	function mutasireject($cabang, $bulan, $tahun, $produk)
	{
		$this->db->order_by('tgl_mutasi_gudang_cabang', 'ASC');
		$this->db->where('MONTH(tgl_mutasi_gudang_cabang)', $bulan);
		$this->db->where('YEAR(tgl_mutasi_gudang_cabang)', $tahun);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('mutasi_gudang_cabang.kode_cabang', $cabang);
		$this->db->like('jenis_mutasi', 'REJECT');
		// $this->db->where('jenis_mutasi', 'REJECT PASAR');
		// $this->db->or_where('jenis_mutasi', 'REJECT GUDANG');
		// $this->db->or_where('jenis_mutasi', 'REJECT MOBIL');
		$this->db->join('mutasi_gudang_cabang', 'detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang=mutasi_gudang_cabang.no_mutasi_gudang_cabang');
		$this->db->join('master_barang', 'detail_mutasi_gudang_cabang.kode_produk=master_barang.kode_produk');
		$this->db->join('dpb', 'mutasi_gudang_cabang.no_dpb = dpb.no_dpb', 'LEFT');
		$this->db->join('karyawan', 'dpb.id_karyawan = karyawan.id_karyawan', 'LEFT');
		$this->db->select('detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang,tgl_mutasi_gudang_cabang,mutasi_gudang_cabang.no_dpb,nama_karyawan,tujuan,no_suratjalan,tgl_kirim,detail_mutasi_gudang_cabang.jumlah,isipcsdus,inout_good,promo,jenis_mutasi,
    date_format(mutasi_gudang_cabang.date_created, "%d %M %Y %H:%i:%s") as date_created, date_format(mutasi_gudang_cabang.date_updated, "%d %M %Y %H:%i:%s") as date_updated
    ');
		$this->db->from('detail_mutasi_gudang_cabang');
		return $this->db->get();
	}

	function mutasirepack($cabang, $bulan, $tahun, $produk)
	{
		$this->db->order_by('tgl_mutasi_gudang_cabang', 'ASC');
		$this->db->where('MONTH(tgl_mutasi_gudang_cabang)', $bulan);
		$this->db->where('YEAR(tgl_mutasi_gudang_cabang)', $tahun);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('mutasi_gudang_cabang.kode_cabang', $cabang);
		$this->db->where('jenis_mutasi', 'REPACK');

		$this->db->join('mutasi_gudang_cabang', 'detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang=mutasi_gudang_cabang.no_mutasi_gudang_cabang');
		$this->db->join('master_barang', 'detail_mutasi_gudang_cabang.kode_produk=master_barang.kode_produk');
		$this->db->join('dpb', 'mutasi_gudang_cabang.no_dpb = dpb.no_dpb', 'LEFT');
		$this->db->join('karyawan', 'dpb.id_karyawan = karyawan.id_karyawan', 'LEFT');
		$this->db->select('detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang,tgl_mutasi_gudang_cabang,mutasi_gudang_cabang.no_dpb,nama_karyawan,tujuan,no_suratjalan,tgl_kirim,detail_mutasi_gudang_cabang.jumlah,isipcsdus,inout_good,promo,jenis_mutasi,
    date_format(mutasi_gudang_cabang.date_created, "%d %M %Y %H:%i:%s") as date_created, date_format(mutasi_gudang_cabang.date_updated, "%d %M %Y %H:%i:%s") as date_updated
    ');
		$this->db->from('detail_mutasi_gudang_cabang');
		return $this->db->get();
	}

	function mutasiretur($cabang, $bulan, $tahun, $produk)
	{
		$this->db->order_by('tgl_mutasi_gudang_cabang', 'ASC');
		$this->db->where('MONTH(tgl_mutasi_gudang_cabang)', $bulan);
		$this->db->where('YEAR(tgl_mutasi_gudang_cabang)', $tahun);
		$this->db->where('detail_mutasi_gudang_cabang.kode_produk', $produk);
		$this->db->where('mutasi_gudang_cabang.kode_cabang', $cabang);
		$this->db->where('jenis_mutasi', 'RETUR');

		$this->db->join('mutasi_gudang_cabang', 'detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang=mutasi_gudang_cabang.no_mutasi_gudang_cabang');
		$this->db->join('master_barang', 'detail_mutasi_gudang_cabang.kode_produk=master_barang.kode_produk');
		$this->db->join('dpb', 'mutasi_gudang_cabang.no_dpb = dpb.no_dpb', 'LEFT');
		$this->db->join('karyawan', 'dpb.id_karyawan = karyawan.id_karyawan', 'LEFT');
		$this->db->select('detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang,tgl_mutasi_gudang_cabang,mutasi_gudang_cabang.no_dpb,nama_karyawan,tujuan,no_suratjalan,tgl_kirim,detail_mutasi_gudang_cabang.jumlah,isipcsdus,inout_good,promo,jenis_mutasi,
    date_format(mutasi_gudang_cabang.date_created, "%d %M %Y %H:%i:%s") as date_created, date_format(mutasi_gudang_cabang.date_updated, "%d %M %Y %H:%i:%s") as date_updated
    ');
		$this->db->from('detail_mutasi_gudang_cabang');
		return $this->db->get();
	}

	function rekaphpp($bulan, $tahun)
	{
		$tgl1 = $tahun . "-" . $bulan . "-01";
		$tgl2 = date('Y-m-t', strtotime($tgl1));
		$query = "SELECT mb.kode_produk,nama_barang,mb.isipcsdus,harga_hpp,
		sa_tsm,
		mutasi_tsm,
		sa_bdg,
		mutasi_bdg,
		sa_bgr,
		mutasi_bgr,
		sa_skb,
		mutasi_skb,
		sa_tgl,
		mutasi_tgl,
		sa_pwt,
		mutasi_pwt,
		sa_sby,
		mutasi_sby,
		sa_smr,
		mutasi_smr,
		sa_klt,
		mutasi_klt,
		sa_pst,
		mutasi_pst,
		harga_tsm,
		harga_bdg,
		harga_skb,
		harga_tgl,
		harga_bgr,
		harga_pwt,
		harga_pst,
		harga_sby,
		harga_smr,
		harga_klt,
		saldoawal_gd,
		jmlfsthp_gd,
		jmllainlain_in_gd,
		jmlrepack_gd,
		jmlreject_gd,
		jmlsuratjalan_gd,
		jmllainlain_out_gd,
		harga_kirim_cabang

		FROM master_barang mb
		
		LEFT JOIN (
			SELECT sa_bj_detail.kode_produk,
			SUM(IF(sa_bj.kode_cabang ='TSM',jumlah,0)) as sa_tsm,
			SUM(IF(sa_bj.kode_cabang ='BDG',jumlah,0)) as sa_bdg,
			SUM(IF(sa_bj.kode_cabang ='SKB',jumlah,0)) as sa_skb,
			SUM(IF(sa_bj.kode_cabang ='BGR',jumlah,0)) as sa_bgr,
			SUM(IF(sa_bj.kode_cabang ='TGL',jumlah,0)) as sa_tgl,
			SUM(IF(sa_bj.kode_cabang ='PWT',jumlah,0)) as sa_pwt,
			SUM(IF(sa_bj.kode_cabang ='SBY',jumlah,0)) as sa_sby,
			SUM(IF(sa_bj.kode_cabang ='SMR',jumlah,0)) as sa_smr,
			SUM(IF(sa_bj.kode_cabang ='KLT',jumlah,0)) as sa_klt,
			SUM(IF(sa_bj.kode_cabang ='PST',jumlah,0)) as sa_pst
			FROM saldoawal_bj_detail sa_bj_detail
			INNER JOIN saldoawal_bj sa_bj ON sa_bj_detail.kode_saldoawal = sa_bj.kode_saldoawal
			WHERE bulan = '$bulan' AND tahun='$tahun' AND status='GS'
			GROUP BY sa_bj_detail.kode_produk
		) sa ON (mb.kode_produk = sa.kode_produk) 
		
		LEFT JOIN (
			SELECT dm.kode_produk,
			(SUM(IF(mgc.kode_cabang='TSM' AND inout_good = 'IN',jumlah,0)) - SUM(IF(mgc.kode_cabang='TSM' AND inout_good = 'OUT',jumlah,0))) as mutasi_tsm,
			(SUM(IF(mgc.kode_cabang='BDG' AND inout_good = 'IN',jumlah,0)) - SUM(IF(mgc.kode_cabang='BDG' AND inout_good = 'OUT',jumlah,0))) as mutasi_bdg,
			(SUM(IF(mgc.kode_cabang='BGR' AND inout_good = 'IN',jumlah,0)) - SUM(IF(mgc.kode_cabang='BGR' AND inout_good = 'OUT',jumlah,0))) as mutasi_bgr,
			(SUM(IF(mgc.kode_cabang='SKB' AND inout_good = 'IN',jumlah,0)) - SUM(IF(mgc.kode_cabang='SKB' AND inout_good = 'OUT',jumlah,0))) as mutasi_skb,
			(SUM(IF(mgc.kode_cabang='TGL' AND inout_good = 'IN',jumlah,0)) - SUM(IF(mgc.kode_cabang='TGL' AND inout_good = 'OUT',jumlah,0))) as mutasi_tgl,
			(SUM(IF(mgc.kode_cabang='PWT' AND inout_good = 'IN',jumlah,0)) - SUM(IF(mgc.kode_cabang='PWT' AND inout_good = 'OUT',jumlah,0))) as mutasi_pwt,
			(SUM(IF(mgc.kode_cabang='SBY' AND inout_good = 'IN',jumlah,0)) - SUM(IF(mgc.kode_cabang='SBY' AND inout_good = 'OUT',jumlah,0))) as mutasi_sby,
			(SUM(IF(mgc.kode_cabang='SMR' AND inout_good = 'IN',jumlah,0)) - SUM(IF(mgc.kode_cabang='SMR' AND inout_good = 'OUT',jumlah,0))) as mutasi_smr,
			(SUM(IF(mgc.kode_cabang='KLT' AND inout_good = 'IN',jumlah,0)) - SUM(IF(mgc.kode_cabang='KLT' AND inout_good = 'OUT',jumlah,0))) as mutasi_klt,
			(SUM(IF(mgc.kode_cabang='PST' AND inout_good = 'IN',jumlah,0)) - SUM(IF(mgc.kode_cabang='PST' AND inout_good = 'OUT',jumlah,0))) as mutasi_pst
			FROM detail_mutasi_gudang_cabang dm
			INNER JOIN mutasi_gudang_cabang mgc ON dm.no_mutasi_gudang_cabang = mgc.no_mutasi_gudang_cabang
			WHERE tgl_mutasi_gudang_cabang BETWEEN '$tgl1' AND '$tgl2'
			GROUP BY dm.kode_produk
			) mutasi ON (mb.kode_produk = mutasi.kode_produk)

		
			
		LEFT JOIN(
			SELECT kode_produk,harga_hpp
			FROM harga_hpp
			WHERE bulan='$bulan' AND tahun='$tahun'
		) hpp ON (mb.kode_produk = hpp.kode_produk)

		LEFT JOIN (
			SELECT
    m.kode_produk, 
		isipcsdus,
		((IFNULL(saldoawal,0) * IFNULL(harga_awal_produksi,0)) + (IFNULL(jmlbpbj,0) * IFNULL(harga_hpp,0))) / (IFNULL(saldoawal,0)  + IFNULL(jmlbpbj,0)) as harga_gudang,
		(
		(IFNULL(saldoawal_gd,0) * IFNULL(harga_awal_gudang,0)) 
		+ ((IFNULL(jmlfsthp_gd,0) * IFNULL((SELECT harga_gudang),0)))
		+ ((IFNULL(jmlrepack_gd,0) * IFNULL((SELECT harga_gudang),0)))
		+ ((IFNULL(jmllainlain_in_gd,0) * IFNULL((SELECT harga_gudang),0)))
		) / (IFNULL(saldoawal_gd,0) + IFNULL(jmlfsthp_gd,0) + IFNULL(jmlrepack_gd,0) + + IFNULL(jmllainlain_in_gd,0) ) as harga_kirim_cabang,
		
		ROUND((((ROUND(IFNULL(sa_tsm,0) / IFNULL(isipcsdus,0),2)) * IFNULL(harga_awal_tsm,0)) 
		+ ((ROUND(IFNULL(pusat_tsm,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(transit_in_tsm,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(retur_tsm,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(lainlain_tsm,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(repack_tsm,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))) /
		(ROUND(IFNULL(sa_tsm,0) / IFNULL(isipcsdus,0),2)
		+ ROUND(IFNULL(pusat_tsm,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(transit_in_tsm,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(retur_tsm,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(lainlain_tsm,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(repack_tsm,0) / IFNULL(isipcsdus,0),2) 	
		),9) as harga_tsm,
		
		
		ROUND((((ROUND(IFNULL(sa_bdg,0) / IFNULL(isipcsdus,0),2)) * IFNULL(harga_awal_bdg,0)) 
		+ ((ROUND(IFNULL(pusat_bdg,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(transit_in_bdg,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(retur_bdg,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(lainlain_bdg,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(repack_bdg,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))) /
		(ROUND(IFNULL(sa_bdg,0) / IFNULL(isipcsdus,0),2)
		+ ROUND(IFNULL(pusat_bdg,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(transit_in_bdg,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(retur_bdg,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(lainlain_bdg,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(repack_bdg,0) / IFNULL(isipcsdus,0),2) 	
		),9) as harga_bdg,
		
		ROUND((((ROUND(IFNULL(sa_skb,0) / IFNULL(isipcsdus,0),2)) * IFNULL(harga_awal_skb,0)) 
		+ ((ROUND(IFNULL(pusat_skb,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(transit_in_skb,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(retur_skb,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(lainlain_skb,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(repack_skb,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))) /
		(ROUND(IFNULL(sa_skb,0) / IFNULL(isipcsdus,0),2)
		+ ROUND(IFNULL(pusat_skb,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(transit_in_skb,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(retur_skb,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(lainlain_skb,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(repack_skb,0) / IFNULL(isipcsdus,0),2) 	
		),9) as harga_skb,
		
		ROUND((((ROUND(IFNULL(sa_tgl,0) / IFNULL(isipcsdus,0),2)) * IFNULL(harga_awal_tgl,0)) 
		+ ((ROUND(IFNULL(pusat_tgl,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(transit_in_tgl,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(retur_tgl,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(lainlain_tgl,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(repack_tgl,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))) /
		(ROUND(IFNULL(sa_tgl,0) / IFNULL(isipcsdus,0),2)
		+ ROUND(IFNULL(pusat_tgl,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(transit_in_tgl,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(retur_tgl,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(lainlain_tgl,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(repack_tgl,0) / IFNULL(isipcsdus,0),2) 	
		),9) as harga_tgl,
		
		ROUND((((ROUND(IFNULL(sa_bgr,0) / IFNULL(isipcsdus,0),2)) * IFNULL(harga_awal_bgr,0)) 
		+ ((ROUND(IFNULL(pusat_bgr,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(transit_in_bgr,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(retur_bgr,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(lainlain_bgr,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(repack_bgr,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))) /
		(ROUND(IFNULL(sa_bgr,0) / IFNULL(isipcsdus,0),2)
		+ ROUND(IFNULL(pusat_bgr,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(transit_in_bgr,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(retur_bgr,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(lainlain_bgr,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(repack_bgr,0) / IFNULL(isipcsdus,0),2) 	
		),9) as harga_bgr,
		
		ROUND((((ROUND(IFNULL(sa_pwt,0) / IFNULL(isipcsdus,0),2)) * IFNULL(harga_awal_pwt,0)) 
		+ ((ROUND(IFNULL(pusat_pwt,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(transit_in_pwt,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(retur_pwt,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(lainlain_pwt,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(repack_pwt,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))) /
		(ROUND(IFNULL(sa_pwt,0) / IFNULL(isipcsdus,0),2)
		+ ROUND(IFNULL(pusat_pwt,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(transit_in_pwt,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(retur_pwt,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(lainlain_pwt,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(repack_pwt,0) / IFNULL(isipcsdus,0),2) 	
		),9) as harga_pwt,
		
			ROUND((((ROUND(IFNULL(sa_pst,0) / IFNULL(isipcsdus,0),2)) * IFNULL(harga_awal_pst,0)) 
		+ ((ROUND(IFNULL(pusat_pst,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(transit_in_pst,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(retur_pst,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(lainlain_pst,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(repack_pst,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))) /
		(ROUND(IFNULL(sa_pst,0) / IFNULL(isipcsdus,0),2)
		+ ROUND(IFNULL(pusat_pst,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(transit_in_pst,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(retur_pst,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(lainlain_pst,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(repack_pst,0) / IFNULL(isipcsdus,0),2) 	
		),9) as harga_pst,
		
		ROUND((((ROUND(IFNULL(sa_sby,0) / IFNULL(isipcsdus,0),2)) * IFNULL(harga_awal_sby,0)) 
		+ ((ROUND(IFNULL(pusat_sby,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(transit_in_sby,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(retur_sby,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(lainlain_sby,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(repack_sby,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))) /
		(ROUND(IFNULL(sa_sby,0) / IFNULL(isipcsdus,0),2)
		+ ROUND(IFNULL(pusat_sby,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(transit_in_sby,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(retur_sby,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(lainlain_sby,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(repack_sby,0) / IFNULL(isipcsdus,0),2) 	
		),9) as harga_sby,
		
		ROUND((((ROUND(IFNULL(sa_smr,0) / IFNULL(isipcsdus,0),2)) * IFNULL(harga_awal_smr,0)) 
		+ ((ROUND(IFNULL(pusat_smr,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(transit_in_smr,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(retur_smr,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(lainlain_smr,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(repack_smr,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))) /
		(ROUND(IFNULL(sa_smr,0) / IFNULL(isipcsdus,0),2)
		+ ROUND(IFNULL(pusat_smr,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(transit_in_smr,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(retur_smr,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(lainlain_smr,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(repack_smr,0) / IFNULL(isipcsdus,0),2) 	
		),9) as harga_smr,
		
		ROUND((((ROUND(IFNULL(sa_klt,0) / IFNULL(isipcsdus,0),2)) * IFNULL(harga_awal_klt,0)) 
		+ ((ROUND(IFNULL(pusat_klt,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(transit_in_klt,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(retur_klt,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(lainlain_klt,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))
		+ ((ROUND(IFNULL(repack_klt,0) / IFNULL(isipcsdus,0),2)) * IFNULL((SELECT harga_kirim_cabang),0))) /
		(ROUND(IFNULL(sa_klt,0) / IFNULL(isipcsdus,0),2)
		+ ROUND(IFNULL(pusat_klt,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(transit_in_klt,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(retur_klt,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(lainlain_klt,0) / IFNULL(isipcsdus,0),2) 	
		+ ROUND(IFNULL(repack_klt,0) / IFNULL(isipcsdus,0),2) 	
		),9) as harga_klt,
		saldoawal_gd,
		jmlfsthp_gd,
		jmllainlain_in_gd,
		jmlrepack_gd,
		jmlreject_gd,
		jmlsuratjalan_gd,
		jmllainlain_out_gd
	
	
		FROM
			master_barang m
    LEFT JOIN (
      SELECT
      kode_produk,
      IFNULL(SUM( IF ( `inout` = 'IN', jumlah, 0 ) ) - SUM( IF ( `inout` = 'OUT', jumlah, 0 ) ),0 )  as saldoawal
      FROM
      detail_mutasi_produksi d
      INNER JOIN mutasi_produksi ON d.no_mutasi_produksi = mutasi_produksi.no_mutasi_produksi 
      WHERE tgl_mutasi_produksi < '$tgl1' 
			GROUP BY kode_produk
    ) sa ON (sa.kode_produk = m.kode_produk)
		
		LEFT JOIN (
		SELECT kode_produk,
			SUM(IF( jenis_mutasi = 'BPBJ', jumlah, 0 )) as jmlbpbj,
			SUM(IF( jenis_mutasi = 'FSTHP', jumlah, 0 )) as jmlfsthp,
			SUM(IF( jenis_mutasi = 'LAIN-LAIN' AND `inout` = 'IN', jumlah, 0 )) as mutasi_in,
			SUM(IF( jenis_mutasi = 'LAIN-LAIN' AND `inout` = 'OUT', jumlah, 0 )) as mutasi_out
    FROM
			detail_mutasi_produksi d
    INNER JOIN 
			mutasi_produksi ON d.no_mutasi_produksi = mutasi_produksi.no_mutasi_produksi 
    WHERE
			tgl_mutasi_produksi BETWEEN '$tgl1' AND '$tgl2' 
		GROUP BY kode_produk
		) dm ON (dm.kode_produk = m.kode_produk)
		
		LEFT JOIN (
			SELECT kode_produk,harga_hpp
			FROM harga_hpp
			WHERE bulan='$bulan' AND tahun='$tahun'
		) hpp ON (hpp.kode_produk = m.kode_produk)
		
		LEFT JOIN (
			SELECT kode_produk,
			SUM(IF(lokasi='PRD',harga_awal,0)) as harga_awal_produksi,
			SUM(IF(lokasi='GDG',harga_awal,0)) as harga_awal_gudang,
			SUM(IF(lokasi='TSM',harga_awal,0)) as harga_awal_tsm,
			SUM(IF(lokasi='BDG',harga_awal,0)) as harga_awal_bdg,
			SUM(IF(lokasi='SKB',harga_awal,0)) as harga_awal_skb,
			SUM(IF(lokasi='TGL',harga_awal,0)) as harga_awal_tgl,
			SUM(IF(lokasi='BGR',harga_awal,0)) as harga_awal_bgr,
			SUM(IF(lokasi='PWT',harga_awal,0)) as harga_awal_pwt,
			SUM(IF(lokasi='PST',harga_awal,0)) as harga_awal_pst,
			SUM(IF(lokasi='SBY',harga_awal,0)) as harga_awal_sby,
			SUM(IF(lokasi='SMR',harga_awal,0)) as harga_awal_smr,
			SUM(IF(lokasi='KLT',harga_awal,0)) as harga_awal_klt
			FROM harga_awal
			WHERE bulan='$bulan' AND tahun='$tahun'
			GROUP BY kode_produk
		) ha ON (ha.kode_produk = m.kode_produk) 
		
		LEFT JOIN (
			SELECT
				kode_produk,
				IFNULL(SUM( IF ( `inout` = 'IN', jumlah, 0 ) ) - SUM( IF ( `inout` = 'OUT', jumlah, 0 ) ),0) as saldoawal_gd
			FROM
				detail_mutasi_gudang d
			INNER JOIN 
				mutasi_gudang_jadi ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
			WHERE 
				tgl_mutasi_gudang < '$tgl1'
			GROUP BY
			kode_produk
		) sagd ON (sagd.kode_produk = m.kode_produk)
		
		LEFT JOIN (
			SELECT
					kode_produk,
					SUM(IF(jenis_mutasi = 'FSTHP' ,jumlah,0)) as jmlfsthp_gd,
					SUM(IF(jenis_mutasi = 'REPACK',jumlah,0)) as jmlrepack_gd,
					SUM(IF(jenis_mutasi = 'REJECT',jumlah,0)) as jmlreject_gd,
					SUM(IF(jenis_mutasi = 'LAINLAIN' AND  `inout` ='IN',jumlah,0)) as jmllainlain_in_gd,
					SUM(IF(jenis_mutasi = 'LAINLAIN' AND  `inout` ='OUT',jumlah,0)) as jmllainlain_out_gd,
					SUM(IF(jenis_mutasi = 'SURAT JALAN',jumlah,0)) as jmlsuratjalan_gd
				FROM
					detail_mutasi_gudang d
				INNER JOIN mutasi_gudang_jadi ON d.no_mutasi_gudang = mutasi_gudang_jadi.no_mutasi_gudang
				WHERE
					tgl_mutasi_gudang BETWEEN '$tgl1' AND '$tgl2' GROUP BY kode_produk
			) mutasi ON (m.kode_produk = mutasi.kode_produk) 
			
		LEFT JOIN(
			SELECT kode_produk,
			SUM(IF(kode_cabang='TSM',jumlah,0)) as sa_tsm,
			SUM(IF(kode_cabang='BDG',jumlah,0)) as sa_bdg,
			SUM(IF(kode_cabang='SKB',jumlah,0)) as sa_skb,
			SUM(IF(kode_cabang='TGL',jumlah,0)) as sa_tgl,
			SUM(IF(kode_cabang='BGR',jumlah,0)) as sa_bgr,
			SUM(IF(kode_cabang='PWT',jumlah,0)) as sa_pwt,
			SUM(IF(kode_cabang='PST',jumlah,0)) as sa_pst,
			SUM(IF(kode_cabang='SBY',jumlah,0)) as sa_sby,
			SUM(IF(kode_cabang='SMR',jumlah,0)) as sa_smr,
			SUM(IF(kode_cabang='KLT',jumlah,0)) as sa_klt
			FROM saldoawal_bj_detail s_detail
			INNER JOIN saldoawal_bj s ON s_detail.kode_saldoawal = s.kode_saldoawal 
			WHERE bulan ='$bulan' AND tahun ='$tahun' AND status='GS'
			GROUP BY kode_produk
		) sacab ON (sacab.kode_produk = m.kode_produk)
		
		LEFT JOIN (
			SELECT kode_produk,
				SUM(IF(jenis_mutasi = 'SURAT JALAN' AND mc.kode_cabang='TSM' ,jumlah,0)) as pusat_tsm,
				SUM(IF(jenis_mutasi = 'TRANSIT IN' AND mc.kode_cabang='TSM' ,jumlah,0)) as transit_in_tsm,
				SUM(IF(jenis_mutasi = 'RETUR' AND mc.kode_cabang='TSM' ,jumlah,0)) as retur_tsm,
				SUM(IF(jenis_mutasi = 'PENYESUAIAN' AND mc.kode_cabang='TSM' AND inout_good ='IN' 
				OR jenis_mutasi = 'HUTANG KIRIM' AND mc.kode_cabang='TSM' AND inout_good ='IN'
				OR jenis_mutasi = 'PL TTR' AND mc.kode_cabang='TSM' AND inout_good ='IN',jumlah,0)) as lainlain_tsm,
				SUM(IF(jenis_mutasi = 'REPACK' AND mc.kode_cabang='TSM' ,jumlah,0)) as repack_tsm,
				
				SUM(IF(jenis_mutasi = 'SURAT JALAN' AND mc.kode_cabang='BDG' ,jumlah,0)) as pusat_bdg,
				SUM(IF(jenis_mutasi = 'TRANSIT IN' AND mc.kode_cabang='BDG' ,jumlah,0)) as transit_in_bdg,
				SUM(IF(jenis_mutasi = 'RETUR' AND mc.kode_cabang='BDG' ,jumlah,0)) as retur_bdg,
				SUM(IF(jenis_mutasi = 'PENYESUAIAN' AND mc.kode_cabang='BDG' AND inout_good ='IN' 
				OR jenis_mutasi = 'HUTANG KIRIM' AND mc.kode_cabang='BDG' AND inout_good ='IN'
				OR jenis_mutasi = 'PL TTR' AND mc.kode_cabang='BDG' AND inout_good ='IN',jumlah,0)) as lainlain_bdg,
				SUM(IF(jenis_mutasi = 'REPACK' AND mc.kode_cabang='BDG' ,jumlah,0)) as repack_bdg,
				
				SUM(IF(jenis_mutasi = 'SURAT JALAN' AND mc.kode_cabang='SKB' ,jumlah,0)) as pusat_skb,
				SUM(IF(jenis_mutasi = 'TRANSIT IN' AND mc.kode_cabang='SKB' ,jumlah,0)) as transit_in_skb,
				SUM(IF(jenis_mutasi = 'RETUR' AND mc.kode_cabang='SKB' ,jumlah,0)) as retur_skb,
				SUM(IF(jenis_mutasi = 'PENYESUAIAN' AND mc.kode_cabang='SKB' AND inout_good ='IN' 
				OR jenis_mutasi = 'HUTANG KIRIM' AND mc.kode_cabang='SKB' AND inout_good ='IN'
				OR jenis_mutasi = 'PL TTR' AND mc.kode_cabang='SKB' AND inout_good ='IN',jumlah,0)) as lainlain_skb,
				SUM(IF(jenis_mutasi = 'REPACK' AND mc.kode_cabang='SKB' ,jumlah,0)) as repack_skb,
				
				SUM(IF(jenis_mutasi = 'SURAT JALAN' AND mc.kode_cabang='TGL' ,jumlah,0)) as pusat_tgl,
				SUM(IF(jenis_mutasi = 'TRANSIT IN' AND mc.kode_cabang='TGL' ,jumlah,0)) as transit_in_tgl,
				SUM(IF(jenis_mutasi = 'RETUR' AND mc.kode_cabang='TGL' ,jumlah,0)) as retur_tgl,
				SUM(IF(jenis_mutasi = 'PENYESUAIAN' AND mc.kode_cabang='TGL' AND inout_good ='IN' 
				OR jenis_mutasi = 'HUTANG KIRIM' AND mc.kode_cabang='TGL' AND inout_good ='IN'
				OR jenis_mutasi = 'PL TTR' AND mc.kode_cabang='TGL' AND inout_good ='IN',jumlah,0)) as lainlain_tgl,
				SUM(IF(jenis_mutasi = 'REPACK' AND mc.kode_cabang='TGL' ,jumlah,0)) as repack_tgl,
				
				SUM(IF(jenis_mutasi = 'SURAT JALAN' AND mc.kode_cabang='BGR' ,jumlah,0)) as pusat_bgr,
				SUM(IF(jenis_mutasi = 'TRANSIT IN' AND mc.kode_cabang='BGR' ,jumlah,0)) as transit_in_bgr,
				SUM(IF(jenis_mutasi = 'RETUR' AND mc.kode_cabang='BGR' ,jumlah,0)) as retur_bgr,
				SUM(IF(jenis_mutasi = 'PENYESUAIAN' AND mc.kode_cabang='BGR' AND inout_good ='IN' 
				OR jenis_mutasi = 'HUTANG KIRIM' AND mc.kode_cabang='BGR' AND inout_good ='IN'
				OR jenis_mutasi = 'PL TTR' AND mc.kode_cabang='BGR' AND inout_good ='IN',jumlah,0)) as lainlain_bgr,
				SUM(IF(jenis_mutasi = 'REPACK' AND mc.kode_cabang='BGR' ,jumlah,0)) as repack_bgr,
				
				SUM(IF(jenis_mutasi = 'SURAT JALAN' AND mc.kode_cabang='PWT' ,jumlah,0)) as pusat_pwt,
				SUM(IF(jenis_mutasi = 'TRANSIT IN' AND mc.kode_cabang='PWT' ,jumlah,0)) as transit_in_pwt,
				SUM(IF(jenis_mutasi = 'RETUR' AND mc.kode_cabang='PWT' ,jumlah,0)) as retur_pwt,
				SUM(IF(jenis_mutasi = 'PENYESUAIAN' AND mc.kode_cabang='PWT' AND inout_good ='IN' 
				OR jenis_mutasi = 'HUTANG KIRIM' AND mc.kode_cabang='PWT' AND inout_good ='IN'
				OR jenis_mutasi = 'PL TTR' AND mc.kode_cabang='PWT' AND inout_good ='IN',jumlah,0)) as lainlain_pwt,
				SUM(IF(jenis_mutasi = 'REPACK' AND mc.kode_cabang='PWT' ,jumlah,0)) as repack_pwt,
				
				SUM(IF(jenis_mutasi = 'SURAT JALAN' AND mc.kode_cabang='PST' ,jumlah,0)) as pusat_pst,
				SUM(IF(jenis_mutasi = 'TRANSIT IN' AND mc.kode_cabang='PST' ,jumlah,0)) as transit_in_pst,
				SUM(IF(jenis_mutasi = 'RETUR' AND mc.kode_cabang='PST' ,jumlah,0)) as retur_pst,
				SUM(IF(jenis_mutasi = 'PENYESUAIAN' AND mc.kode_cabang='PST' AND inout_good ='IN' 
				OR jenis_mutasi = 'HUTANG KIRIM' AND mc.kode_cabang='PST' AND inout_good ='IN'
				OR jenis_mutasi = 'PL TTR' AND mc.kode_cabang='PST' AND inout_good ='IN',jumlah,0)) as lainlain_pst,
				SUM(IF(jenis_mutasi = 'REPACK' AND mc.kode_cabang='PST' ,jumlah,0)) as repack_pst,
				
				SUM(IF(jenis_mutasi = 'SURAT JALAN' AND mc.kode_cabang='SBY' ,jumlah,0)) as pusat_sby,
				SUM(IF(jenis_mutasi = 'TRANSIT IN' AND mc.kode_cabang='SBY' ,jumlah,0)) as transit_in_sby,
				SUM(IF(jenis_mutasi = 'RETUR' AND mc.kode_cabang='SBY' ,jumlah,0)) as retur_sby,
				SUM(IF(jenis_mutasi = 'PENYESUAIAN' AND mc.kode_cabang='SBY' AND inout_good ='IN' 
				OR jenis_mutasi = 'HUTANG KIRIM' AND mc.kode_cabang='SBY' AND inout_good ='IN'
				OR jenis_mutasi = 'PL TTR' AND mc.kode_cabang='SBY' AND inout_good ='IN',jumlah,0)) as lainlain_sby,
				SUM(IF(jenis_mutasi = 'REPACK' AND mc.kode_cabang='SBY' ,jumlah,0)) as repack_sby,
				
				SUM(IF(jenis_mutasi = 'SURAT JALAN' AND mc.kode_cabang='SMR' ,jumlah,0)) as pusat_smr,
				SUM(IF(jenis_mutasi = 'TRANSIT IN' AND mc.kode_cabang='SMR' ,jumlah,0)) as transit_in_smr,
				SUM(IF(jenis_mutasi = 'RETUR' AND mc.kode_cabang='SMR' ,jumlah,0)) as retur_smr,
				SUM(IF(jenis_mutasi = 'PENYESUAIAN' AND mc.kode_cabang='SMR' AND inout_good ='IN' 
				OR jenis_mutasi = 'HUTANG KIRIM' AND mc.kode_cabang='SMR' AND inout_good ='IN'
				OR jenis_mutasi = 'PL TTR' AND mc.kode_cabang='SMR' AND inout_good ='IN',jumlah,0)) as lainlain_smr,
				SUM(IF(jenis_mutasi = 'REPACK' AND mc.kode_cabang='SMR' ,jumlah,0)) as repack_smr,
				
				SUM(IF(jenis_mutasi = 'SURAT JALAN' AND mc.kode_cabang='KLT' ,jumlah,0)) as pusat_klt,
				SUM(IF(jenis_mutasi = 'TRANSIT IN' AND mc.kode_cabang='KLT' ,jumlah,0)) as transit_in_klt,
				SUM(IF(jenis_mutasi = 'RETUR' AND mc.kode_cabang='KLT' ,jumlah,0)) as retur_klt,
				SUM(IF(jenis_mutasi = 'PENYESUAIAN' AND mc.kode_cabang='KLT' AND inout_good ='IN' 
				OR jenis_mutasi = 'HUTANG KIRIM' AND mc.kode_cabang='KLT' AND inout_good ='IN'
				OR jenis_mutasi = 'PL TTR' AND mc.kode_cabang='KLT' AND inout_good ='IN',jumlah,0)) as lainlain_klt,
				SUM(IF(jenis_mutasi = 'REPACK' AND mc.kode_cabang='KLT' ,jumlah,0)) as repack_klt
				
			FROM detail_mutasi_gudang_cabang dmc
			INNER JOIN mutasi_gudang_cabang mc ON dmc.no_mutasi_gudang_cabang = mc.no_mutasi_gudang_cabang
			WHERE tgl_mutasi_gudang_cabang BETWEEN '$tgl1' AND '$tgl2'
			GROUP BY kode_produk
		) mcab ON (mcab.kode_produk = m.kode_produk)
		ORDER BY urutan ASC 
		) harga ON (harga.kode_produk = mb.kode_produk) ORDER BY urutan ASC
		";

		return $this->db->query($query);
	}
	
	function konsolidasibjpenjualan($cabang, $dari, $sampai)
	{
		$tanggal = explode("-", $dari);
		$bulan 	 = $tanggal[1];
		$tahun 	 = $tanggal[0];
		$mulai   = $tahun . "-" . $bulan . "-" . "01";
		$query = "SELECT master_barang.kode_produk,nama_barang,isipcsdus,totalpenjualan,totalpersediaan, IFNULL(totalpenjualan,0) - IFNULL(totalpersediaan,0) as selisih
		FROM master_barang
		LEFT JOIN (
			SELECT kode_produk, SUM(jumlah) as totalpenjualan
			FROM detailpenjualan
			INNER JOIN barang ON detailpenjualan.kode_barang = barang.kode_barang
			INNER JOIN penjualan ON detailpenjualan.no_fak_penj = penjualan.no_fak_penj
			INNER JOIN karyawan ON penjualan.id_karyawan = karyawan.id_karyawan
			WHERE tgltransaksi BETWEEN '2021-09-01' AND '2021-09-30' AND karyawan.kode_cabang ='BDG'
			GROUP BY kode_produk
		) dp ON (master_barang.kode_produk = dp.kode_produk)

		LEFT JOIN (
			SELECT kode_produk,SUM(jumlah) as totalpersediaan
			FROM detail_mutasi_gudang_cabang
			INNER JOIN mutasi_gudang_cabang 
			ON detail_mutasi_gudang_cabang.no_mutasi_gudang_cabang = mutasi_gudang_cabang.no_mutasi_gudang_cabang
			WHERE jenis_mutasi = 'PENJUALAN'  
			AND tgl_mutasi_gudang_cabang BETWEEN '2021-09-01' AND '2021-09-30'
			AND kode_cabang ='BDG'
			GROUP BY kode_produk
		) persediaan ON (master_barang.kode_produk = persediaan.kode_produk)";
		return $this->db->query($query);
	}
}
