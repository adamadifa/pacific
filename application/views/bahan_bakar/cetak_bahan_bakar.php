<?php

function uang($nilai)
{

  return number_format($nilai, 0, ',', '.');
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
<table class="datatable3" style="width:70%" border="1">
  <thead>
    <tr>
      <th bgcolor="#024a75" style="color:white; font-size:14;">TANGGAL</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">MASUK</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">SUPPLIER</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">PEMAKAIAN</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">SALDO</th>
    </tr>
    <tr>
      <th bgcolor="red" style="color:white; font-size:14;" colspan="4">SALDO AWAL</th>
      <th bgcolor="" style="color:black; font-size:14;" ><?php echo uang($saldoawal['qty']);?></th>
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
    $totaljmlhpemakaian   = 0;
    $totalqtysaldoakhir   = 0;
    $totaljmlhsaldoakhir  = 0;
    while (strtotime($dari) <= strtotime($sampai)) {

      $qmasuk           = "SELECT 
      SUM( qty ) AS qtypemb,
      SUM( qty ) AS qtypemb,
      db.harga AS harga,
      nama_supplier
      FROM pemasukan_bb 
      INNER JOIN detail_pemasukan_bb 
      ON detail_pemasukan_bb.nobukti_pemasukan=pemasukan_bb.nobukti_pemasukan 
      INNER JOIN supplier 
      ON supplier.kode_supplier=pemasukan_bb.kode_supplier 
      LEFT JOIN (
        SELECT pembelian.nobukti_pembelian,kode_barang,harga FROM detail_pembelian 
        INNER JOIN pembelian ON pembelian.nobukti_pembelian=detail_pembelian.nobukti_pembelian
        WHERE  tgl_pembelian = '$dari' AND kode_barang = '$kode_barang'
        GROUP BY pembelian.nobukti_pembelian,kode_barang,harga
      ) db ON (db.nobukti_pembelian=pemasukan_bb.nobukti_pemasukan)
      WHERE tgl_pemasukan ='$dari' AND detail_pemasukan_bb.kode_barang = '$kode_barang'
      GROUP BY tgl_pemasukan,harga,nama_supplier";
      $masuk            = $this->db->query($qmasuk)->row_array();

      $qkeluar           = "SELECT  qty,tgl_pengeluaran
      FROM pengeluaran_bb 
      INNER JOIN detail_pengeluaran_bb 
      ON detail_pengeluaran_bb.nobukti_pengeluaran=pengeluaran_bb.nobukti_pengeluaran 
      WHERE tgl_pengeluaran ='$dari' AND detail_pengeluaran_bb.kode_barang = '$kode_barang'
      GROUP BY qty,tgl_pengeluaran";
      $keluar            = $this->db->query($qkeluar)->row_array();


      $qtypembelian = $masuk['qtypemb'];
      $hargamasuk   = $masuk['harga'];
      $jmlpembelian = $hargamasuk * $qtypembelian;
      
      
      if(substr($dari,8,2) == '01'){
        $qtysaldoawal   = $saldoawalqty;
        $hargasaldoawal = $saldoawalharga / $qtysaldoawal;
        $jmlhsaldoawal  = $qtysaldoawal * $hargasaldoawal;
        $qtypemakaian   = $keluar['qty'];
        $hargakeluar    = ($jmlhsaldoawal+$jmlpembelian)/($qtysaldoawal+$qtypembelian);
        $jmlhpemakaian  = $hargakeluar * $qtypemakaian;
      }else{
        $qtysaldoawal   = $qtysaldoakhir;
        $hargasaldoawal = $hargakeluar;
        $jmlhsaldoawal  = $qtysaldoawal * $hargasaldoawal;
        $qtypemakaian   = $keluar['qty'];
        $hargakeluar    = ($jmlhsaldoawal+$jmlpembelian)/($qtysaldoawal+$qtypembelian);
        $jmlhpemakaian  = $hargakeluar * $qtypemakaian;
      }

      $qtysaldoakhir    = $qtysaldoawal+$qtypembelian-$qtypemakaian;
      $jmlhsaldoakhir   = $qtysaldoakhir*$hargakeluar;

      $totalqtysaldoawal    += $qtysaldoawal;
      $totaljmlhsaldoawal   += $jmlhsaldoawal;
      $totalqtypemakaian    += $qtypemakaian;
      $totaljmlhpemakaian   += $jmlhpemakaian;
      $totalqtypembelian    += $qtypembelian;
      $totaljmlpembelian    += $jmlpembelian;
      $totalqtysaldoakhir   += $qtysaldoakhir;
      $totaljmlhsaldoakhir  += $jmlhsaldoakhir;

    ?>
      <tr style="color:black; font-size:14;">
        <td><?php echo $dari; ?></td>
        <td align="center">
          <?php
          if (isset($qtypembelian) and $qtypembelian != "0") {
            echo uang($qtypembelian);
          }
          ?>
        </td>
        <td align="left"><?php echo $masuk['nama_supplier'];?></td>
        <td align="center">
          <?php
           if (isset($qtypemakaian) and $qtypemakaian != "0") {
            echo uang($qtypemakaian);
          }
          ?>
        </td>
        <td align="center">
          <?php
           if (isset($qtysaldoakhir) and $qtysaldoakhir != "0") {
            echo uang($qtysaldoakhir);
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
      <th style="color:white; font-size:14;"><?php echo uang($totalqtypembelian); ?></th>
      <th style="color:white; font-size:14;"></th>
      <th style="color:white; font-size:14;"><?php echo uang($totalqtypemakaian); ?></th>
      <th style="color:white; font-size:14;"><?php echo uang($qtysaldoakhir); ?></th>
    </tr>
  </tfoot>
</table>