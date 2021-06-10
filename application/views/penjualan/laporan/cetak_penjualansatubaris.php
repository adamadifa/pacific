<?php
error_reporting(0);
function uang($nilai)
{

  return number_format($nilai, '0', '', '.');
}

function formatqty($nilai)
{

  return number_format($nilai, '2', ',', '.');
}

?>

<?php

if ($dari < '2018-09-01') {
?>

  <div class="alert alert-danger">
    <strong>Sorry Bro!</strong> Maaf Untuk Data Penjualan Kurang Dari Bulan September 2018 Tidak Dapat Ditampilkan.!
  </div>
<?php


} else {
?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">

  <br>
  <b style="font-size:14px; font-family:Calibri">


    <?php
    if ($cb['nama_cabang'] != "") {
      echo "PACIFIC CABANG " . strtoupper($cb['nama_cabang']);
    } else {
      echo "PACIFIC ALL CABANG";
    }

    ?>
    <br>
    LAPORAN PENJUALAN<br>
    PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br>

    <?php
    if ($salesman['nama_karyawan'] != "") {
      echo "NAMA SALES : " . strtoupper($salesman['nama_karyawan']);
    } else {
      echo "ALL SALES";
    }

    ?>
    <br>
    <?php
    if ($pelanggan['nama_pelanggan'] != "") {
      echo "NAMA PELANGGAN : " . strtoupper($pelanggan['nama_pelanggan']);
    }
    ?>


  </b>
  <br>
  <br>
  <table class="datatable3" style="width:150%" border="1">
    <thead bgcolor="#024a75" style="color:white; font-size:12;">
      <tr bgcolor="#024a75" style="color:white; font-size:12;">
        <th rowspan="2" style="width: 1%;">No</th>
        <th rowspan="2" style="width: 5%;">No Faktur</th>
        <th rowspan="2" style="width: 5%;">Tgl Transaksi</th>
        <th rowspan="2" style="width: 5%;">Kode Pelanggan</th>
        <th rowspan="2" style="width: 5%;">Nama Pelanggan</th>
        <th rowspan="2" style="width: 5%;">Salesman</th>
        <th rowspan="2" style="width: 3%;">Pasar</th>
        <th rowspan="2" style="width: 3%;">Hari</th>
        <th colspan="13" style="background-color: #19c116;">Produk</th>
      </tr>
      <tr style="background-color: #19c116;">
        <th style="width: 1%;">AB</th>
        <th style="width: 1%;">AR</th>
        <th style="width: 1%;">AS</th>
        <th style="width: 1%;">BB</th>
        <th style="width: 1%;">CG</th>
        <th style="width: 1%;">CGG</th>
        <th style="width: 1%;">DEP</th>
        <th style="width: 1%;">DK</th>
        <th style="width: 1%;">DS</th>
        <th style="width: 1%;">SP</th>
        <th style="width: 1%;">BBP</th>
        <th style="width: 1%;">SPP</th>
        <th style="width: 1%;">CG5</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($penjualan as $d) {
      ?>
        <tr style="font-size: 14px;">
          <td align="center"><?php echo $no; ?></td>
          <td align="center"><?php echo $d->no_fak_penj; ?></td>
          <td align="center"><?php echo DateToIndo2($d->tgltransaksi); ?></td>
          <td align="center"><?php echo $d->kode_pelanggan; ?></td>
          <td align="left"><?php echo strtoupper($d->nama_pelanggan); ?></td>
          <td align="left"><?php echo strtoupper($d->nama_karyawan); ?></td>
          <td align="left"><?php echo strtoupper($d->pasar); ?></td>
          <td align="left"><?php echo strtoupper($d->hari); ?></td>
          <td align="center">
            <?php
            if ($d->AB != 0.00) {
              echo formatqty($d->AB);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if ($d->AR != 0.00) {
              echo formatqty($d->AR);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if ($d->AS != 0.00) {
              echo formatqty($d->AS);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if ($d->BB != 0.00) {
              echo formatqty($d->BB);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if ($d->CG != 0.00) {
              echo formatqty($d->CG);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if ($d->CGG != 0.00) {
              echo formatqty($d->CGG);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if ($d->DEP != 0.00) {
              echo formatqty($d->DEP);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if ($d->DK != 0.00) {
              echo formatqty($d->DK);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if ($d->DS != 0.00) {
              echo formatqty($d->DS);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if ($d->SP != 0.00) {
              echo formatqty($d->SP);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if ($d->BBP != 0.00) {
              echo formatqty($d->BBP);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if ($d->SPP != 0.00) {
              echo formatqty($d->SPP);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if ($d->CG5 != 0.00) {
              echo formatqty($d->CG5);
            }
            ?>

          </td>
        </tr>
      <?php
        $no++;
      }
      ?>
    </tbody>
  </table>
<?php  } ?>