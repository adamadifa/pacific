<?php

class Model_laporanaccounting extends CI_Model
{
  function getBukubesar($bulan, $tahun, $kode_akun)
  {
    $awal = $tahun . "-" . $bulan . "-01";
    $akhir = $tahun . "-" . $bulan . "-31";
    $this->db->where('tanggal >=', $awal);
    $this->db->where('tanggal <=', $akhir);
    $this->db->where('buku_besar.kode_akun', $kode_akun);
    $this->db->order_by('tanggal,no_bukti', 'asc');
    $this->db->join('ledger_bank', 'buku_besar.no_ref = ledger_bank.no_bukti', 'left');
    $this->db->join('coa', 'buku_besar.kode_akun = coa.kode_akun', 'left');
    $this->db->select("buku_besar.no_bukti,tanggal,sumber,buku_besar.keterangan,buku_besar.kode_akun,nama_akun,buku_besar.debet,buku_besar.kredit,bank");
    $this->db->from('buku_besar');
    return $this->db->get();
  }

  function getJurnalUmum($dari, $sampai)
  {
    $this->db->where('tanggal >=', $dari);
    $this->db->where('tanggal <=', $sampai);
    $this->db->where('sumber =', 'GU');
    $this->db->order_by('tanggal,no_bukti', 'asc');
    $this->db->join('coa', 'buku_besar.kode_akun = coa.kode_akun', 'left');
    $this->db->select("buku_besar.no_bukti,tanggal,sumber,buku_besar.keterangan,buku_besar.kode_akun,nama_akun,buku_besar.debet,buku_besar.kredit");
    $this->db->from('buku_besar');
    return $this->db->get();
  }

  function coa($kode_akun)
  {
    return $this->db->query("SELECT * FROM coa WHERE sub_akun != '0' AND kode_akun = '$kode_akun' ");
  }

  function getSaldoawalBB($bulan, $tahun, $kode_akun)
  {
    $this->db->where('bulan', $bulan);
    $this->db->where('tahun', $tahun);
    $this->db->where('kode_akun', $kode_akun);
    $this->db->join('saldoawal_bb', 'detailsaldoawal_bb.kode_saldoawal_bb = saldoawal_bb.kode_saldoawal_bb');
    return $this->db->get('detailsaldoawal_bb');
  }
}
