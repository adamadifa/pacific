<?php

function uang($nilai)
{

  return number_format($nilai, '0', '', '.');
}

function persentase($nilai)
{

  return number_format($nilai, '2', ',', '.');
}
error_reporting(0);

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<style>
  .table-scroll {
    position: relative;
    max-width: 100%;
    margin: auto;
    overflow: hidden;

  }

  .table-wrap {
    width: 100%;
    overflow: auto;
  }

  .table-scroll table {
    width: 100%;
    margin: auto;
    border-collapse: separate;
    border-spacing: 0;
  }


  .clone {
    position: absolute;
    top: 0;
    left: 0;
    pointer-events: none;
  }

  .clone th,
  .clone td {
    visibility: hidden
  }

  .clone td,
  .clone th {
    border-color: transparent
  }

  .clone tbody th {
    visibility: visible;
    color: red;
  }

  .clone .fixed-side {
    border: 1px solid #000;
    background: #eee;
    visibility: visible;
  }
</style>
<br>
<b style="font-size:18px; font-family:Calibri">


  <?php
  if ($cb['nama_cabang'] != "") {
    echo "PACIFIC CABANG " . strtoupper($cb['nama_cabang']);
  } else {
    echo "PACIFIC ALL CABANG";
  }

  $namabulan   = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
  ?>
  <br>
  LAPORAN DATA PERTUMBUHAN PRODUK<br>
  <?= $namabulan[$bulan] . " " . $tahun ?>


</b>
<br>
<br>
<div id="table-scroll" class="table-scroll">
  <div class="table-wrap">
    <table class="datatable3">
      <thead bgcolor="#295ea9" style="color:white; font-size:14;">
        <tr>
          <td rowspan="4" style="background-color:#295ea9; color:white" class="fixed-side" scope="col">#</td>
          <td rowspan="4" style="background-color:#295ea9; color:white" class="fixed-side" scope="col">Cabang</td>
          <td colspan="108">Produk</td>
        </tr>
        <tr style="text-align:center">
          <td colspan="10">AR</td>
          <td colspan="10">AB</td>
          <td colspan="10">AS</td>
          <td colspan="10">BB</td>
          <td colspan="10">CG</td>
          <td colspan="10">CGG</td>
          <td colspan="10">DEP</td>
          <td colspan="10">DS</td>
          <td colspan="10">SP</td>

        </tr>
        <tr style="text-align: center;">
          <td colspan="5" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="5">s/d <?= $namabulan[$bulan] ?></td>
          <td colspan="5" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="5">s/d <?= $namabulan[$bulan] ?></td>
          <td colspan="5" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="5">s/d <?= $namabulan[$bulan] ?></td>
          <td colspan="5" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="5">s/d <?= $namabulan[$bulan] ?></td>
          <td colspan="5" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="5">s/d <?= $namabulan[$bulan] ?></td>
          <td colspan="5" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="5">s/d <?= $namabulan[$bulan] ?></td>
          <td colspan="5" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="5">s/d <?= $namabulan[$bulan] ?></td>
          <td colspan="5" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="5">s/d <?= $namabulan[$bulan] ?></td>
          <td colspan="5" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="5">s/d <?= $namabulan[$bulan] ?></td>
        </tr>

        <tr style="text-align: center;">
          <td style="background-color: #25b70a;">Real <?php echo $tahun - 1; ?></td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Grw(%)</td>
          <td>Real <?php echo $tahun - 1; ?></td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Grw(%)</td>

          <td style="background-color: #25b70a;">Real <?php echo $tahun - 1; ?></td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Grw(%)</td>
          <td>Real <?php echo $tahun - 1; ?></td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Grw(%)</td>

          <td style="background-color: #25b70a;">Real <?php echo $tahun - 1; ?></td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Grw(%)</td>
          <td>Real <?php echo $tahun - 1; ?></td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Grw(%)</td>

          <td style="background-color: #25b70a;">Real <?php echo $tahun - 1; ?></td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Grw(%)</td>
          <td>Real <?php echo $tahun - 1; ?></td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Grw(%)</td>

          <td style="background-color: #25b70a;">Real <?php echo $tahun - 1; ?></td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Grw(%)</td>
          <td>Real <?php echo $tahun - 1; ?></td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Grw(%)</td>

          <td style="background-color: #25b70a;">Real <?php echo $tahun - 1; ?></td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Grw(%)</td>
          <td>Real <?php echo $tahun - 1; ?></td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Grw(%)</td>

          <td style="background-color: #25b70a;">Real <?php echo $tahun - 1; ?></td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Grw(%)</td>
          <td>Real <?php echo $tahun - 1; ?></td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Grw(%)</td>

          <td style="background-color: #25b70a;">Real <?php echo $tahun - 1; ?></td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Grw(%)</td>
          <td>Real <?php echo $tahun - 1; ?></td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Grw(%)</td>

          <td style="background-color: #25b70a;">Real <?php echo $tahun - 1; ?></td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Grw(%)</td>
          <td>Real <?php echo $tahun - 1; ?></td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Grw(%)</td>

        </tr>


      </thead>
      <tbody style="font-size:14;">
        <?php
        foreach ($produk as $p) {
          if ($p->kode_produk == "AB") {
            $isipcs_ab = $p->isipcsdus;
          }
          if ($p->kode_produk == "AR") {
            $isipcs_ar = $p->isipcsdus;
          }
          if ($p->kode_produk == "AS") {
            $isipcs_as = $p->isipcsdus;
          }

          if ($p->kode_produk == "BB") {
            $isipcs_bb = $p->isipcsdus;
          }

          if ($p->kode_produk == "CG") {
            $isipcs_cg = $p->isipcsdus;
          }

          if ($p->kode_produk == "CGG") {
            $isipcs_cgg = $p->isipcsdus;
          }

          if ($p->kode_produk == "DEP") {
            $isipcs_dep = $p->isipcsdus;
          }

          if ($p->kode_produk == "DS") {
            $isipcs_ds = $p->isipcsdus;
          }

          if ($p->kode_produk == "SP") {
            $isipcs_sp = $p->isipcsdus;
          }
        }



        $no = 1;
        foreach ($dppp as $d) {
        ?>
          <tr>
            <td class="fixed-side" scope="col"><?php echo $no; ?></td>
            <td class="fixed-side" scope="col"><?php echo strtoupper($d->nama_cabang); ?></td>



          </tr>

        <?php
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
  // requires jquery library
  jQuery(document).ready(function() {
    jQuery(".datatable3").clone(true).appendTo('#table-scroll').addClass('clone');
  });
</script>