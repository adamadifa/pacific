<?php

function uang($nilai)
{

  return number_format($nilai, '2',',', '.');
}
// error_reporting(0);

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:20px; font-family:Calibri">
  MAKMUR PERMATA<br>
  REKAPITULASI PERSEDIAAN GUDANG
  <?php if ($kategori == 'B001') {
    echo "BAHAN";
  } else {
    echo "KEMASAN";
  } ?><br>
  BULAN <?php echo $bulan; ?><br>
  TAHUN <?php echo $tahun; ?><br>
</b>
<br>
<style>
tr:nth-child(even) {
  background-color: #d6d6d6c2;
}
</style>
<table class="datatable3" style="width:250%;zoom:85%" border="1">
  <thead>
    <tr bgcolor="#024a75">
      <th rowspan="4" bgcolor="#024a75" style="color:white; font-size:14;">NO</th>
      <th rowspan="4" bgcolor="#024a75" style="color:white; font-size:14;">KODE BARANG</th>
      <th rowspan="4" bgcolor="#024a75" style="color:white; font-size:14;">NAMA BARANG</th>
      <th rowspan="4" bgcolor="#024a75" style="color:white; font-size:14;">SATUAN</th>
    </tr>
    <tr bgcolor="#28a745">
      <th colspan="3" rowspan="2" bgcolor="#28a745" style="color:white; font-size:14;">SALDO AWAL</th>
      <th colspan="9" bgcolor="#28a745" style="color:white; font-size:14;">PEMASUKAN</th>
      <th colspan="18" bgcolor="#28a745" style="color:white; font-size:14;">PENGELUARAN</th>
      <th colspan="3" rowspan="2" bgcolor="#28a745" style="color:white; font-size:14;">SALDO AKHIR</th>
      <th colspan="3" rowspan="2" bgcolor="#28a745" style="color:white; font-size:14;">OPNAME STOK</th>
      <th colspan="2" rowspan="2" bgcolor="#28a745" style="color:white; font-size:14;">SELISIH</th>
    </tr>
    <tr bgcolor="red">
      <th style="color:white; font-size:14;" colspan="3">PEMBELIAN</th>
      <th style="color:white; font-size:14;" colspan="3">LAINNYA</th>
      <th style="color:white; font-size:14;" colspan="3">RETUR PENGGANTI</th>
      <th style="color:white; font-size:14;" colspan="3">PRODUKSI</th>
      <th style="color:white; font-size:14;" colspan="3">SEASONING</th>
      <th style="color:white; font-size:14;" colspan="3">PDQC</th>
      <th style="color:white; font-size:14;" colspan="3">SUSUT</th>
      <th style="color:white; font-size:14;" colspan="3">CABANG</th>
      <th style="color:white; font-size:14;" colspan="3">LAINNYA</th>
    </tr>
    <tr bgcolor="red">
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $hargaminyak                = $this->db->query("SELECT harga FROM harga_minyak WHERE bulan = '$bulan' AND tahun = '$tahun' ")->row_array();
    $no                         = 1;
    $grandtotalqtysaldoawal     = 0;
    $grandtotaljmlsaldoawal     = 0;
    $grandtotalqtypemberlian    = 0;
    $grandtotaljmlpemberlian    = 0;
    $grandtotalqtypengganti     = 0;
    $grandtotaljmlpengganti     = 0;
    $grandtotalqtylainnya       = 0;
    $grandtotaljmllainnya       = 0;
    $grandtotalqtyproduksi      = 0;
    $grandtotaljmlproduksi      = 0;
    $grandtotalqtypdqc          = 0;
    $grandtotaljmlpdqc          = 0;
    $grandtotalqtyseasoning     = 0;
    $grandtotaljmlseasoning     = 0;
    $grandtotalqtysusut         = 0;
    $grandtotaljmlsusut         = 0;
    $grandtotalqtycabang        = 0;
    $grandtotaljmlcabang        = 0;
    $grandtotalqtylain          = 0;
    $grandtotaljmllain          = 0;
    $grandtotalqtysaldoakhir    = 0;
    $grandtotaljmlsaldoakhir    = 0;
    $grandtotalqtyopname        = 0;
    $grandtotaljmlopname        = 0;

    $totalqtyopname             = 0;
    $totaljumlahsaldoawal       = 0;
    $totalqtysaldoawal          = 0;
    $totalqtypembelian          = 0;
    $totaljumlahopname          = 0;
    $totalqtylainnya            = 0;
    $totaljumlahlainnya         = 0;
    $totalqtyproduksi           = 0;
    $totalqtyseasoning          = 0;
    $totalqtypdqc               = 0;
    $totaljumlahlain            = 0;
    $totalqtycabang             = 0;
    $totalqtysusut              = 0;
    $totalqtypengganti          = 0;
    $totaljumlahpembelian       = 0;
    $totaljumlahpengganti       = 0;
    $totaljumlahproduksi        = 0;
    $totaljumlahseasoning       = 0;
    $totaljumlahpdqc            = 0;
    $totalqtylain               = 0;
    $totaljumlahcabang          = 0;
    $totaljumlahsusut           = 0;
    $totalqtysaldoakhir         = 0;
    $totaljumlahsaldoakhir      = 0;
    foreach ($data as $key => $d) {

      if($d->satuan == 'KG'){

        $qtysaldoawal       = $d->qtyberatsa * 1000;
        if($qtysaldoawal == 0){
          $hargasaldoawal     = 0;
        }else{
          $hargasaldoawal     = $d->harga / $qtysaldoawal;
        }
        $jumlahsaldoawal      = $d->harga;
        
        $qtypembelian         = $d->qtypemb2 * 1000;
        if($qtypembelian == 0){
          $qtypembelian       = 0;
          $hargapembelian     = $hargasaldoawal;
        }else{
          $hargapembelian     = $d->totalharga / $qtypembelian;
        }
        $jumlahpembelian      = $d->totalharga;
        
        $qtylainnya         = $d->qtylainnya2 * 1000;
        if($qtylainnya == 0){
          $hargalainnya     = 0;
        }else{
          $hargalainnya     = $hargapembelian;
        }
        $jumlahlainnya      = $qtylainnya * $hargalainnya;

        $qtypengganti         = $d->qtypengganti2 * 1000;
        if($qtypengganti == 0){
          $hargapengganti       = 0;
        }else{
          $hargapengganti     = $hargapembelian;
        }
        $jumlahpengganti      = $qtypengganti * $hargapengganti;

        $qtyproduksi         = $d->qtyprod4 * 1000;
        if($qtyproduksi == 0){
          $hargaproduksi       = 0;
        }else{
          $hargaproduksi     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahproduksi      = $qtyproduksi * $hargaproduksi;

        $qtyseasoning         = $d->qtyseas4 * 1000;
        if($qtyseasoning == 0){
          $hargaseasoning     = 0;
        }else{
          $hargaseasoning     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahseasoning      = $qtyseasoning * $hargaseasoning;
        
        $qtypdqc            = $d->qtypdqc4 * 1000;
        if($qtypdqc == 0){
          $hargapdqc        = 0;
        }else{
          $hargapdqc        = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahpdqc         = $qtypdqc * $hargapdqc;

        $qtysusut         = $d->qtysus4 * 1000;
        if($qtysusut == 0){
          $hargasusut     = 0;
        }else{
          $hargasusut     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahsusut      = $qtysusut * $hargasusut;

        $qtycabang         = $d->qtycabang4 * 1000;
        if($qtycabang == 0){
          $hargacabang     = 0;
        }else{
          $hargacabang     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahcabang      = $qtycabang * $hargacabang;

        $qtylain         = $d->qtylain4 * 1000;
        if($qtylain == 0){
          $hargalain     = 0;
        }else{
          $hargalain     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahlain      = $qtylain * $hargalain;

        $qtysaldoakhir         = ($qtysaldoawal + $qtypembelian + $qtylainnya + $qtypengganti) - ($qtyproduksi + $qtypdqc + $qtyseasoning + $qtysusut + $qtycabang + $qtylain);
        if($qtysaldoakhir == 0){
          $hargasaldoakhir     = 0;
        }else{
          $hargasaldoakhir     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahsaldoakhir      = $qtysaldoakhir * $hargasaldoakhir;

        $qtyopname       = $d->qtyberatop * 1000;
        if($qtyopname == 0){
          $hargaopname     = 0;
        }else{
          $hargaopname     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahopname      = $qtyopname * $hargaopname;
        
        $totalqtysaldoawal          += $qtysaldoawal;
        $totaljumlahsaldoawal       += $jumlahsaldoawal;
        $totalqtypembelian          += $qtypembelian;
        $totaljumlahpembelian       += $jumlahpembelian;
        $totalqtylainnya            += $qtylainnya;
        $totaljumlahlainnya         += $jumlahlainnya;
        $totalqtypengganti          += $qtypengganti;
        $totaljumlahpengganti       += $jumlahpengganti;
        $totalqtyproduksi           += $qtyproduksi;
        $totaljumlahproduksi        += $jumlahproduksi;
        $totalqtyseasoning          += $qtyseasoning;
        $totaljumlahseasoning       += $jumlahseasoning;
        $totalqtypdqc               += $qtypdqc;
        $totaljumlahpdqc            += $jumlahpdqc;
        $totalqtysusut              += $qtysusut;
        $totaljumlahsusut           += $jumlahsusut;
        $totalqtycabang             += $qtycabang;
        $totaljumlahcabang          += $jumlahcabang;
        $totalqtylain               += $qtylain;
        $totaljumlahlain            += $jumlahlain;
        $totalqtysaldoakhir         += $qtysaldoakhir;
        $totaljumlahsaldoakhir      += $qtysaldoakhir * $hargasaldoakhir;
        $totalqtyopname             += $qtyopname;
        $totaljumlahopname          += $jumlahopname;

        $grandtotalqtysaldoawal     += $qtysaldoawal;;
        $grandtotaljmlsaldoawal     += $jumlahsaldoawal;
        $grandtotalqtypemberlian    += $qtypembelian;
        $grandtotaljmlpemberlian    += $jumlahpembelian;
        $grandtotalqtypengganti     += $qtypengganti;
        $grandtotaljmlpengganti     += $jumlahpengganti;
        $grandtotalqtylainnya       += $qtylainnya;
        $grandtotaljmllainnya       += $jumlahlainnya;
        $grandtotalqtyproduksi      += $qtyproduksi;
        $grandtotaljmlproduksi      += $jumlahproduksi;
        $grandtotalqtypdqc          += $qtypdqc;
        $grandtotaljmlpdqc          += $jumlahpdqc;
        $grandtotalqtyseasoning     += $qtyseasoning;
        $grandtotaljmlseasoning     += $jumlahseasoning;
        $grandtotalqtysusut         += $qtysusut;
        $grandtotaljmlsusut         += $jumlahsusut;
        $grandtotalqtycabang        += $qtycabang;
        $grandtotaljmlcabang        += $jumlahcabang;
        $grandtotalqtylain          += $qtylain;
        $grandtotaljmllain          += $jumlahlain;
        $grandtotalqtysaldoakhir    += $qtysaldoakhir;
        $grandtotaljmlsaldoakhir    += $jumlahsaldoakhir;
        $grandtotalqtyopname        += $qtyopname;
        $grandtotaljmlopname        += $jumlahopname;

      }else if($d->satuan == 'Liter'){

        $hargakilo          = $hargaminyak['harga'];
        $qtysaldoawal       = ($d->qtyberatsa * 1000) * ($hargakilo);
        if($qtysaldoawal == 0){
          $hargasaldoawal     = 0;
        }else{
          $hargasaldoawal     = $d->harga / $qtysaldoawal;
        }
        $jumlahsaldoawal      = $d->harga;
        
        $qtypembelian         = ($d->qtypemb2 * 1000) * ($hargakilo);
        if($qtypembelian == 0){
          $qtypembelian       = 0;
          $hargapembelian     = $hargasaldoawal;
        }else{
          $hargapembelian     = $d->totalharga / $qtypembelian;
        }
        $jumlahpembelian      = $d->totalharga;
        
        $qtylainnya         = ($d->qtylainnya2 * 1000) * ($hargakilo);
        if($qtylainnya == 0){
          $hargalainnya     = 0;
        }else{
          $hargalainnya     = $hargapembelian;
        }
        $jumlahlainnya      = $qtylainnya * $hargalainnya;

        $qtypengganti         = ($d->qtypengganti2 * 1000) * ($hargakilo);
        if($qtypengganti == 0){
          $hargapengganti       = 0;
        }else{
          $hargapengganti     = $hargapembelian;
        }
        $jumlahpengganti      = $qtypengganti * $hargapengganti;

        $qtyproduksi         = ($d->qtyprod4 * 1000) * ($hargakilo);
        if($qtyproduksi == 0){
          $hargaproduksi       = 0;
        }else{
          $hargaproduksi     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahproduksi      = $qtyproduksi * $hargaproduksi;

        $qtyseasoning         = ($d->qtyseas4 * 1000) * ($hargakilo);
        if($qtyseasoning == 0){
          $hargaseasoning     = 0;
        }else{
          $hargaseasoning     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahseasoning      = $qtyseasoning * $hargaseasoning;
        
        $qtypdqc            = ($d->qtypdqc4 * 1000) * ($hargakilo);
        if($qtypdqc == 0){
          $hargapdqc        = 0;
        }else{
          $hargapdqc        = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahpdqc         = $qtypdqc * $hargapdqc;

        $qtysusut         = ($d->qtysus4 * 1000) * ($hargakilo);
        if($qtysusut == 0){
          $hargasusut     = 0;
        }else{
          $hargasusut     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahsusut      = $qtysusut * $hargasusut;

        $qtycabang         = ($d->qtycabang4 * 1000) * ($hargakilo);
        if($qtycabang == 0){
          $hargacabang     = 0;
        }else{
          $hargacabang     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahcabang      = $qtycabang * $hargacabang;

        $qtylain         = ($d->qtylain4 * 1000) * ($hargakilo);
        if($qtylain == 0){
          $hargalain     = 0;
        }else{
          $hargalain     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahlain      = $qtylain * $hargalain;
        
        $qtysaldoakhir         = ($qtysaldoawal + $qtypembelian + $qtylainnya + $qtypengganti) - ($qtyproduksi + $qtypdqc + $qtyseasoning + $qtysusut + $qtycabang + $qtylain);
        if($qtysaldoakhir == 0){
          $hargasaldoakhir     = 0;
        }else{
          $hargasaldoakhir     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahsaldoakhir      = $qtysaldoakhir * $hargasaldoakhir;

        $qtyopname             = ($d->qtyberatop * 1000) * $hargakilo;
        if($qtyopname == 0){
          $hargaopname         = 0;
        }else{
          $hargaopname         = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahopname          = $qtyopname * $hargaopname;

        
        $totalqtysaldoawal          += $qtysaldoawal;
        $totaljumlahsaldoawal       += $jumlahsaldoawal;
        $totalqtypembelian          += $qtypembelian;
        $totaljumlahpembelian       += $jumlahpembelian;
        $totalqtylainnya            += $qtylainnya;
        $totaljumlahlainnya         += $jumlahlainnya;
        $totalqtypengganti          += $qtypengganti;
        $totaljumlahpengganti       += $jumlahpengganti;
        $totalqtyproduksi           += $qtyproduksi;
        $totaljumlahproduksi        += $jumlahproduksi;
        $totalqtyseasoning          += $qtyseasoning;
        $totaljumlahseasoning       += $jumlahseasoning;
        $totalqtypdqc               += $qtypdqc;
        $totaljumlahpdqc            += $jumlahpdqc;
        $totalqtysusut              += $qtysusut;
        $totaljumlahsusut           += $jumlahsusut;
        $totalqtycabang             += $qtycabang;
        $totaljumlahcabang          += $jumlahcabang;
        $totalqtylain               += $qtylain;
        $totaljumlahlain            += $jumlahlain;
        $totalqtysaldoakhir         += $qtysaldoakhir;
        $totaljumlahsaldoakhir      += $qtysaldoakhir * $hargasaldoakhir;
        $totalqtyopname             += $qtyopname;
        $totaljumlahopname          += $jumlahopname;

        $grandtotalqtysaldoawal     += $qtysaldoawal;;
        $grandtotaljmlsaldoawal     += $jumlahsaldoawal;
        $grandtotalqtypemberlian    += $qtypembelian;
        $grandtotaljmlpemberlian    += $jumlahpembelian;
        $grandtotalqtypengganti     += $qtypengganti;
        $grandtotaljmlpengganti     += $jumlahpengganti;
        $grandtotalqtylainnya       += $qtylainnya;
        $grandtotaljmllainnya       += $jumlahlainnya;
        $grandtotalqtyproduksi      += $qtyproduksi;
        $grandtotaljmlproduksi      += $jumlahproduksi;
        $grandtotalqtypdqc          += $qtypdqc;
        $grandtotaljmlpdqc          += $jumlahpdqc;
        $grandtotalqtyseasoning     += $qtyseasoning;
        $grandtotaljmlseasoning     += $jumlahseasoning;
        $grandtotalqtysusut         += $qtysusut;
        $grandtotaljmlsusut         += $jumlahsusut;
        $grandtotalqtycabang        += $qtycabang;
        $grandtotaljmlcabang        += $jumlahcabang;
        $grandtotalqtylain          += $qtylain;
        $grandtotaljmllain          += $jumlahlain;
        $grandtotalqtysaldoakhir    += $qtysaldoakhir;
        $grandtotaljmlsaldoakhir    += $jumlahsaldoakhir;
        $grandtotalqtyopname        += $qtyopname;
        $grandtotaljmlopname        += $jumlahopname;

      }else{

        $qtysaldoawal         = $d->qtyunitsa;
        if($qtysaldoawal == 0){
          $hargasaldoawal     = 0;
        }else{
          $hargasaldoawal     = $d->harga / $qtysaldoawal;
        }
        $jumlahsaldoawal      = $d->harga;

        $qtypembelian         = $d->qtypemb1;
        if($qtypembelian == 0){
          $qtypembelian       = 0;
          $hargapembelian     = $hargasaldoawal;
        }else{
          $hargapembelian     = $d->totalharga / $qtypembelian;
        }
        $jumlahpembelian      = $d->totalharga;

        $qtylainnya         = $d->qtylainnya1;
        if($qtylainnya == 0){
          $hargalainnya       = 0;
        }else{
          if($d->kode_barang == 'BK-45' AND $bulan == '9' AND $tahun == '2021'){
            $hargalainnya     = 9078.43;
          }else if($d->kode_barang == 'BK-44' AND $bulan == '9' AND $tahun == '2021'){
            $hargalainnya     = 14612.79;
          }else{
            $hargalainnya     = $hargapembelian;
          }
        }
        $jumlahlainnya      = $qtylainnya * $hargalainnya;

        $qtypengganti         = $d->qtypengganti1;
        if($qtypengganti == 0){
          $hargapengganti       = 0;
        }else{
          $hargapengganti     = $hargapembelian;
        }
        $jumlahpengganti      = $qtypengganti * $hargapengganti;
        
        $qtyproduksi         = $d->qtyprod3;
        if($qtyproduksi == 0){
          $hargaproduksi       = 0;
        }else{
          $hargaproduksi     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahproduksi      = $qtyproduksi * $hargaproduksi;

        $qtyseasoning         = $d->qtyseas3;
        if($qtyseasoning == 0){
          $hargaseasoning     = 0;
        }else{
          $hargaseasoning     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahseasoning      = $qtyseasoning * $hargaseasoning;

        $qtypdqc         = $d->qtypdqc3;
        if($qtypdqc == 0){
          $hargapdqc     = 0;
        }else{
          $hargapdqc     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahpdqc      = $qtypdqc * $hargapdqc;

        $qtysusut         = $d->qtysus3;
        if($qtysusut == 0){
          $hargasusut     = 0;
        }else{
          $hargasusut     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahsusut      = $qtysusut * $hargasusut;

        $qtycabang         = $d->qtycabang3;
        if($qtycabang == 0){
          $hargacabang     = 0;
        }else{
          $hargacabang     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahcabang      = $qtycabang * $hargacabang;

        $qtylain         = $d->qtylain3;
        if($qtylain == 0){
          $hargalain     = 0;
        }else{
          $hargalain     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahlain      = $qtylain * $hargalain;
        
        $qtysaldoakhir         = ($qtysaldoawal + $qtypembelian + $qtylainnya + $qtypengganti) - ($qtyproduksi + $qtypdqc + $qtyseasoning + $qtysusut + $qtycabang + $qtylain);
        if($qtysaldoakhir == 0){
          $hargasaldoakhir     = 0;
        }else{
          $hargasaldoakhir     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahsaldoakhir      = $qtysaldoakhir * $hargasaldoakhir;

        $qtyopname       = $d->qtyunitop;
        if($qtyopname == 0){
          $hargaopname     = 0;
        }else{
          $hargaopname     = ($jumlahsaldoawal + $jumlahpembelian + $jumlahlainnya + $jumlahpengganti) / ($qtysaldoawal + $qtypembelian + $qtypengganti + $qtylainnya);
        }
        $jumlahopname      = $qtyopname * $hargaopname;

        $totalqtysaldoawal          += $qtysaldoawal;
        $totaljumlahsaldoawal       += $jumlahsaldoawal;
        $totalqtypembelian          += $qtypembelian;
        $totaljumlahpembelian       += $jumlahpembelian;
        $totalqtylainnya            += $qtylainnya;
        $totaljumlahlainnya         += $jumlahlainnya;
        $totalqtypengganti          += $qtypengganti;
        $totaljumlahpengganti       += $jumlahpengganti;
        $totalqtyproduksi           += $qtyproduksi;
        $totaljumlahproduksi        += $jumlahproduksi;
        $totalqtyseasoning          += $qtyseasoning;
        $totaljumlahseasoning       += $jumlahseasoning;
        $totalqtypdqc               += $qtypdqc;
        $totaljumlahpdqc            += $jumlahpdqc;
        $totalqtysusut              += $qtysusut;
        $totaljumlahsusut           += $jumlahsusut;
        $totalqtycabang             += $qtycabang;
        $totaljumlahcabang          += $jumlahcabang;
        $totalqtylain               += $qtylain;
        $totaljumlahlain            += $jumlahlain;
        $totalqtysaldoakhir         += $qtysaldoakhir;
        $totaljumlahsaldoakhir      += $qtysaldoakhir * $hargasaldoakhir;
        $totalqtyopname             += $qtyopname;
        $totaljumlahopname          += $jumlahopname;

        $grandtotalqtysaldoawal     += $qtysaldoawal;;
        $grandtotaljmlsaldoawal     += $jumlahsaldoawal;
        $grandtotalqtypemberlian    += $qtypembelian;
        $grandtotaljmlpemberlian    += $jumlahpembelian;
        $grandtotalqtypengganti     += $qtypengganti;
        $grandtotaljmlpengganti     += $jumlahpengganti;
        $grandtotalqtylainnya       += $qtylainnya;
        $grandtotaljmllainnya       += $jumlahlainnya;
        $grandtotalqtyproduksi      += $qtyproduksi;
        $grandtotaljmlproduksi      += $jumlahproduksi;
        $grandtotalqtypdqc          += $qtypdqc;
        $grandtotaljmlpdqc          += $jumlahpdqc;
        $grandtotalqtyseasoning     += $qtyseasoning;
        $grandtotaljmlseasoning     += $jumlahseasoning;
        $grandtotalqtysusut         += $qtysusut;
        $grandtotaljmlsusut         += $jumlahsusut;
        $grandtotalqtycabang        += $qtycabang;
        $grandtotaljmlcabang        += $jumlahcabang;
        $grandtotalqtylain          += $qtylain;
        $grandtotaljmllain          += $jumlahlain;
        $grandtotalqtysaldoakhir    += $qtysaldoakhir;
        $grandtotaljmlsaldoakhir    += $jumlahsaldoakhir;
        $grandtotalqtyopname        += $qtyopname;
        $grandtotaljmlopname        += $jumlahopname;
      }

      $jenis_barang     = @$data[$key + 1]->jenis_barang;
    ?>
      <tr style="font-size: 14;">
        <td><?php echo $no++; ?></td>
        <td><?php echo $d->kode_barang; ?></td>
        <td><?php echo $d->nama_barang; ?></td>
        <td><?php echo $d->satuan; ?></td>
        <td align="right"><?php if($qtysaldoawal != 0){ echo uang($qtysaldoawal); } ?></td>
        <td align="right"><?php if($qtysaldoawal != 0){ echo uang($hargasaldoawal); } ?></td>
        <td align="right"><?php if($qtysaldoawal != 0){ echo uang($jumlahsaldoawal); } ?></td>
        <td align="right"><?php if($qtypembelian != 0){ echo uang($qtypembelian); } ?></td>
        <td align="right"><?php if($qtypembelian != 0){ echo uang($hargapembelian); } ?></td>
        <td align="right"><?php if($qtypembelian != 0){ echo uang($jumlahpembelian); } ?></td>
        <td align="right"><?php if($qtylainnya != 0){ echo uang($qtylainnya); } ?></td>
        <td align="right"><?php if($qtylainnya != 0){ echo uang($hargalainnya); } ?></td>
        <td align="right"><?php if($qtylainnya != 0){ echo uang($jumlahlainnya); } ?></td>
        <td align="right"><?php if($qtypengganti != 0){ echo uang($qtypengganti); } ?></td>
        <td align="right"><?php if($qtypengganti != 0){ echo uang($hargapengganti); } ?></td>
        <td align="right"><?php if($qtypengganti != 0){ echo uang($jumlahpengganti); } ?></td>
        <td align="right"><?php if($qtyproduksi != 0){ echo uang($qtyproduksi); } ?></td>
        <td align="right"><?php if($qtyproduksi != 0){ echo uang($hargaproduksi); } ?></td>
        <td align="right"><?php if($qtyproduksi != 0){ echo uang($jumlahproduksi); } ?></td>
        <td align="right"><?php if($qtyseasoning != 0){ echo uang($qtyseasoning); } ?></td>
        <td align="right"><?php if($qtyseasoning != 0){ echo uang($hargaseasoning); } ?></td>
        <td align="right"><?php if($qtyseasoning != 0){ echo uang($jumlahseasoning); } ?></td>
        <td align="right"><?php if($qtypdqc != 0){ echo uang($qtypdqc); } ?></td>
        <td align="right"><?php if($qtypdqc != 0){ echo uang($hargapdqc); } ?></td>
        <td align="right"><?php if($qtypdqc != 0){ echo uang($jumlahpdqc); } ?></td>
        <td align="right"><?php if($qtysusut != 0){ echo uang($qtysusut); } ?></td>
        <td align="right"><?php if($qtysusut != 0){ echo uang($hargasusut); } ?></td>
        <td align="right"><?php if($qtysusut != 0){ echo uang($jumlahsusut); } ?></td>
        <td align="right"><?php if($qtycabang != 0){ echo uang($qtycabang); } ?></td>
        <td align="right"><?php if($qtycabang != 0){ echo uang($hargacabang); } ?></td>
        <td align="right"><?php if($qtycabang != 0){ echo uang($jumlahcabang); } ?></td>
        <td align="right"><?php if($qtylain != 0){ echo uang($qtylain); } ?></td>
        <td align="right"><?php if($qtylain != 0){ echo uang($hargalain); } ?></td>
        <td align="right"><?php if($qtylain != 0){ echo uang($jumlahlain); } ?></td>
        <td align="right"><?php if($qtysaldoakhir != 0){ echo uang($qtysaldoakhir); } ?></td>
        <td align="right"><?php if($qtysaldoakhir != 0){ echo uang($hargasaldoakhir); } ?></td>
        <td align="right"><?php if($qtysaldoakhir != 0){ echo uang($jumlahsaldoakhir); } ?></td>
        <td align="right"><?php if($qtyopname != 0){ echo uang($qtyopname); } ?></td>
        <td align="right"><?php if($qtyopname != 0){ echo uang($hargaopname); } ?></td>
        <td align="right"><?php if($qtyopname != 0){ echo uang($jumlahopname); } ?></td>
        <td align="right"><?php if($qtysaldoakhir-$qtyopname != 0){ echo uang($qtysaldoakhir-$qtyopname); } ?></td>
        <td align="right"><?php if($jumlahsaldoakhir-$jumlahopname != 0){ echo uang($jumlahsaldoakhir-$jumlahopname); } ?></td>
      </tr>

      <?php if ($jenis_barang != $d->jenis_barang && $d->satuan == "KG") { ?>
      <tr bgcolor="#024a75">
        <th colspan="4"  bgcolor="#024a75" style="color:white; font-size:14;">Subtotal <?php echo $d->jenis_barang;?></th>

        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totalqtysaldoawal)) {
            echo uang($totalqtysaldoawal);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totaljumlahsaldoawal)) {
            echo uang($totaljumlahsaldoawal);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totalqtypembelian)) {
            echo uang($totalqtypembelian);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totaljumlahpembelian)) {
            echo uang($totaljumlahpembelian);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totalqtylainnya)) {
            echo uang($totalqtylainnya);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totaljumlahlainnya)) {
            echo uang($totaljumlahlainnya);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totalqtypengganti)) {
            echo uang($totalqtypengganti);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totaljumlahpengganti)) {
            echo uang($totaljumlahpengganti);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totalqtyproduksi)) {
            echo uang($totalqtyproduksi);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totaljumlahproduksi)) {
            echo uang($totaljumlahproduksi);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totalqtyseasoning)) {
            echo uang($totalqtyseasoning);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totaljumlahseasoning)) {
            echo uang($totaljumlahseasoning);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totalqtypdqc)) {
            echo uang($totalqtypdqc);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totaljumlahpdqc)) {
            echo uang($totaljumlahpdqc);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totalqtysusut)) {
            echo uang($totalqtysusut);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totaljumlahsusut)) {
            echo uang($totaljumlahsusut);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totalqtycabang)) {
            echo uang($totalqtycabang);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totaljumlahcabang)) {
            echo uang($totaljumlahcabang);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totalqtylain)) {
            echo uang($totalqtylain);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totaljumlahlain)) {
            echo uang($totaljumlahlain);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totalqtysaldoakhir)) {
            echo uang($totalqtysaldoakhir);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totaljumlahsaldoakhir)) {
            echo uang($totaljumlahsaldoakhir);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totalqtyopname)) {
            echo uang($totalqtyopname);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($totaljumlahopname)) {
            echo uang($totaljumlahopname);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75"></th>
      </tr>
    <?php 
      $totalqtyopname  = 0;
      $totaljumlahsaldoawal  = 0;
      $totalqtysaldoawal  = 0;
      $totalqtypembelian  = 0;
      $totaljumlahopname  = 0;
      $totalqtylainnya  = 0;
      $totaljumlahlainnya  = 0;
      $totalqtyproduksi  = 0;
      $totalqtyseasoning  = 0;
      $totalqtypdqc  = 0;
      $totaljumlahlain  = 0;
      $totalqtycabang  = 0;
      $totalqtysusut  = 0;
      $totalqtypengganti  = 0;
      $totaljumlahpembelian  = 0;
      $totaljumlahpengganti  = 0;
      $totaljumlahproduksi  = 0;
      $totaljumlahseasoning  = 0;
      $totaljumlahpdqc  = 0;
      $totalqtylain = 0;
      $totaljumlahcabang      = 0;
      $totaljumlahsusut       = 0;
      $totalqtysaldoakhir      = 0;
      $totaljumlahsaldoakhir  = 0;
    } ?>
    <?php } ?>
    <tr>
      <th colspan="4" style="background:red; color:white; font-size:14;">TOTAL</th>

      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotalqtysaldoawal)) {
          echo uang($grandtotalqtysaldoawal);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotaljmlsaldoawal)) {
          echo uang($grandtotaljmlsaldoawal);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotalqtypemberlian)) {
          echo uang($grandtotalqtypemberlian);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotaljmlpemberlian)) {
          echo uang($grandtotaljmlpemberlian);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotalqtylainnya)) {
          echo uang($grandtotalqtylainnya);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotaljmllainnya)) {
          echo uang($grandtotaljmllainnya);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red;color:white; font-size:14;">
        <?php if (!empty($grandtotalqtypengganti)) {
          echo uang($grandtotalqtypengganti);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red;color:white; font-size:14;"></th>
      <th align="center" style="background:red;color:white; font-size:14;">
        <?php if (!empty($grandtotaljmlpengganti)) {
          echo uang($grandtotaljmlpengganti);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotalqtyproduksi)) {
          echo uang($grandtotalqtyproduksi);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotaljmlproduksi)) {
          echo uang($grandtotaljmlproduksi);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotalqtyseasoning)) {
          echo uang($grandtotalqtyseasoning);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotaljmlseasoning)) {
          echo uang($grandtotaljmlseasoning);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotalqtypdqc)) {
          echo uang($grandtotalqtypdqc);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotaljmlpdqc)) {
          echo uang($grandtotaljmlpdqc);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotalqtysusut)) {
          echo uang($grandtotalqtysusut);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotaljmlsusut)) {
          echo uang($grandtotaljmlsusut);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotalqtycabang)) {
          echo uang($grandtotalqtycabang);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotaljmlcabang)) {
          echo uang($grandtotaljmlcabang);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotalqtylain)) {
          echo uang($grandtotalqtylain);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotaljmllain)) {
          echo uang($grandtotaljmllain);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotalqtysaldoakhir)) {
          echo uang($grandtotalqtysaldoakhir);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotaljmlsaldoakhir)) {
          echo uang($grandtotaljmlsaldoakhir);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotalqtyopname)) {
          echo uang($grandtotalqtyopname);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($grandtotaljmlopname)) {
          echo uang($grandtotaljmlopname);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th style="background:red;"></th>
    </tr>
  </tbody>
</table>