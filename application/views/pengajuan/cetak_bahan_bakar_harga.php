<?php

function uang($nilai)
{

  return number_format($nilai,2, ',', '.');
}
// error_reporting(0);
?>
<style>
  .besar {
    text-transform: uppercase;
  }
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:20px; font-family:Calibri" class="besar">
  MAKMUR PERMATA<br>
  REKAPITULASI PERSEDIAAN <?php if($barang['kode_barang'] == 'GA-007'){
    echo "BAHAN BAKAR SOLAR AIDA";
  }else{
    echo "BAHAN BAKAR OLI BOILER";
  }; ?><br>
  PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br>
</b>
<br>
<style>
tr:nth-child(even) {
  background-color: #d6d6d6c2;
}
</style>
<table class="datatable3" style="width:100%" border="1">
  <thead>
    <tr>
      <th rowspan="3" bgcolor="#024a75" style="color:white; font-size:14;">TANGGAL</th>
      <!-- <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;">BTB</th> -->
      <th rowspan="2" colspan="3" bgcolor="green" style="color:white; font-size:14;">SALDO AWAL</th>
      <th colspan="6" bgcolor="#024a75" style="color:white; font-size:14;">MASUK</th>
      <th colspan="3" bgcolor="#024a75" style="color:white; font-size:14;">KELUAR</th>
      <th rowspan="2" colspan="3" bgcolor="green" style="color:white; font-size:14;">SALDO AKHIR</th>
    </tr>
    <tr >
      <th bgcolor="green" style="color:white; font-size:14;" colspan="3">PEMBELIAN</th>
      <th bgcolor="green" style="color:white; font-size:14;" colspan="3">PENERIMAAN LAINNYA</th>
      <th bgcolor="green" style="color:white; font-size:14;" colspan="3">PEMAKAIAN</th>
    </tr>
    <tr >
      <th bgcolor="#024a75" style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">JUMLAH</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $saldoawalqty         = $saldoawal['qty'];
    $saldoawalharga       = $saldoawal['harga'];
    $totalqtysaldoawal    = 0;
    $totaljmlhsaldoawal   = 0;
    $totalqtypemakaian    = 0;
    $totaljmlpembelian    = 0;
    $totalqtypembelian    = 0;
    $totaljmllainnya    = 0;
    $totalqtylainnya    = 0;
    $totaljmlhpemakaian   = 0;
    $totalqtysaldoakhir   = 0;
    $totaljmlhsaldoakhir  = 0;
    while (strtotime($dari) <= strtotime($sampai)) {

      $qmasuk           = "SELECT 
      SUM( IF( pemasukan_bb.status = '1' , qty ,0 )) AS qtypemb,
      SUM( IF( pemasukan_bb.status = '2' , qty ,0 )) AS qtylainya,
      SUM( IF( pemasukan_bb.status = '2' , pemasukan_bb.harga ,0 )) AS hargalainnya,
      db.harga AS harga
      FROM pemasukan_bb 
      INNER JOIN detail_pemasukan_bb 
      ON detail_pemasukan_bb.nobukti_pemasukan=pemasukan_bb.nobukti_pemasukan 
      LEFT JOIN (
        SELECT pembelian.nobukti_pembelian,kode_barang,harga FROM detail_pembelian 
        INNER JOIN pembelian ON pembelian.nobukti_pembelian=detail_pembelian.nobukti_pembelian
        WHERE  tgl_pembelian = '$dari' AND kode_barang = '$kode_barang'
        GROUP BY pembelian.nobukti_pembelian,kode_barang,harga
      ) db ON (db.nobukti_pembelian=pemasukan_bb.nobukti_pemasukan)
      WHERE tgl_pemasukan ='$dari' AND detail_pemasukan_bb.kode_barang = '$kode_barang'
      GROUP BY tgl_pemasukan,harga";
      $masuk            = $this->db->query($qmasuk)->row_array();

      $qkeluar           = "SELECT  qty,tgl_pengeluaran
      FROM pengeluaran_bb 
      INNER JOIN detail_pengeluaran_bb 
      ON detail_pengeluaran_bb.nobukti_pengeluaran=pengeluaran_bb.nobukti_pengeluaran 
      WHERE tgl_pengeluaran ='$dari' AND detail_pengeluaran_bb.kode_barang = '$kode_barang'
      GROUP BY qty,tgl_pengeluaran";
      $keluar            = $this->db->query($qkeluar)->row_array();


      $qtypembelian = $masuk['qtypemb'];
      $qtylainnya   = $masuk['qtylainya'];
      $hargamasuk   = $masuk['harga'];
      $hargalainnya = $masuk['hargalainnya'];
      $jmlpembelian = $hargamasuk * $qtypembelian;
      $jmllainnya   = $hargalainnya * $qtylainnya;
      
      
      if(substr($dari,8,2) == '01'){
        $qtysaldoawal   = $saldoawalqty;
        $hargasaldoawal = $saldoawalharga / $qtysaldoawal;
        $jmlhsaldoawal  = $qtysaldoawal * $hargasaldoawal;
        $qtypemakaian   = $keluar['qty'];
        $hargakeluar    = ($jmlhsaldoawal+$jmlpembelian+$jmllainnya)/($qtysaldoawal+$qtypembelian+$qtylainnya);
        $jmlhpemakaian  = $hargakeluar * $qtypemakaian;
      }else{
        $qtysaldoawal   = $qtysaldoakhir;
        $hargasaldoawal = $hargakeluar;
        $jmlhsaldoawal  = $qtysaldoawal * $hargasaldoawal;
        $qtypemakaian   = $keluar['qty'];
        $hargakeluar    = ($jmlhsaldoawal+$jmlpembelian+$jmllainnya)/($qtysaldoawal+$qtypembelian+$qtylainnya);
        $jmlhpemakaian  = $hargakeluar * $qtypemakaian;
      }

      $qtysaldoakhir    = $qtysaldoawal+$qtypembelian+$qtylainnya-$qtypemakaian;
      $jmlhsaldoakhir   = $qtysaldoakhir*$hargakeluar;

      $totalqtysaldoawal    += $qtysaldoawal;
      $totaljmlhsaldoawal   += $jmlhsaldoawal;
      $totalqtypemakaian    += $qtypemakaian;
      $totaljmlhpemakaian   += $jmlhpemakaian;
      $totalqtypembelian    += $qtypembelian;
      $totaljmlpembelian    += $jmlpembelian;
      $totalqtylainnya      += $qtylainnya;
      $totaljmllainnya      += $jmllainnya;
      $totalqtysaldoakhir   += $qtysaldoakhir;
      $totaljmlhsaldoakhir  += $jmlhsaldoakhir;

    ?>
      <tr style="color:black; font-size:14;">
        <td><?php echo $dari; ?></td>
        <td align="right"><?php echo uang($qtysaldoawal); ?></td>
        <td align="right"><?php echo uang($hargasaldoawal); ?></td>
        <td align="right"><?php echo uang($jmlhsaldoawal); ?></td>
        <td align="right">
          <?php
          if (isset($qtypembelian) and $qtypembelian != "0") {
            echo uang($qtypembelian);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($hargamasuk) and $hargamasuk != "0") {
            echo uang($hargamasuk);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtypembelian) and $qtypembelian != "0") {
            echo uang($jmlpembelian);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtylainnya) and $qtylainnya != "0") {
            echo uang($qtylainnya);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtylainnya) and $qtylainnya != "0") {
            echo uang($hargalainnya);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtylainnya) and $qtylainnya != "0") {
            echo uang($jmllainnya);
          }
          ?>
        </td>
        <td align="right">
          <?php
           if (isset($qtypemakaian) and $qtypemakaian != "0") {
            echo uang($qtypemakaian);
          }
          ?>
        </td>
        <td align="right">
          <?php
           if (isset($qtypemakaian) and $qtypemakaian != "0") {
            echo uang($hargakeluar);
          }
          ?>
        </td>
        <td align="right">
          <?php
           if (isset($qtypemakaian) and $qtypemakaian != "0") {
            echo uang($jmlhpemakaian);
          }
          ?>
        </td>
        <td align="right">
          <?php
           if (isset($qtysaldoakhir) and $qtysaldoakhir != "0") {
            echo uang($qtysaldoakhir);
          }
          ?>
        </td>
        <td align="right">
          <?php
           if (isset($hargakeluar) and $hargakeluar != "0") {
            echo uang($hargakeluar);
          }
          ?>
        </td>
        <td align="right">
          <?php
           if (isset($jmlhsaldoakhir) and $jmlhsaldoakhir != "0") {
            echo uang($jmlhsaldoakhir);
          }
          ?>
        </td>
      </tr>
    <?php
      $dari = date("Y-m-d", strtotime("+1 day", strtotime($dari))); //looping tambah 1 date
    } ?>
  </tbody>
  <tfoot>
    <tr bgcolor="#31869b">
      <th colspan="" style="color:white; font-size:14;">TOTAL</th>
      <th style="color:white; font-size:14;"></th>
      <th style="color:white; font-size:14;"></th>
      <th style="color:white; font-size:14;"></th>
      <th style="color:white; font-size:14;"><?php echo uang($totalqtypembelian); ?></th>
      <th style="color:white; font-size:14;"></th>
      <th style="color:white; font-size:14;"><?php echo uang($totaljmlpembelian); ?></th>
      <th style="color:white; font-size:14;"><?php echo uang($totalqtylainnya); ?></th>
      <th style="color:white; font-size:14;"></th>
      <th style="color:white; font-size:14;"><?php echo uang($totaljmllainnya); ?></th>
      <th style="color:white; font-size:14;"><?php echo uang($totalqtypemakaian); ?></th>
      <th style="color:white; font-size:14;"></th>
      <th style="color:white; font-size:14;"><?php echo uang($totaljmlhpemakaian); ?></th>
      <th style="color:white; font-size:14;"></th>
      <th style="color:white; font-size:14;"></th>
      <th style="color:white; font-size:14;"></th>
      
    </tr>
  </tfoot>
</table>