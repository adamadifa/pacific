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
          <td colspan="10">AB</td>
          <td colspan="10">AR</td>
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


        $total_reallastbulanini_ab = 0;
        $total_reallastsampaibulanini_ab = 0;
        $total_realbulanini_ab = 0;
        $total_realsampaibulanini_ab = 0;
        $total_targetbulanini_ab = 0;
        $total_targetsampaibulanini_ab = 0;

        $total_reallastbulanini_ar = 0;
        $total_reallastsampaibulanini_ar = 0;
        $total_realbulanini_ar = 0;
        $total_realsampaibulanini_ar = 0;
        $total_targetbulanini_ar = 0;
        $total_targetsampaibulanini_ar = 0;

        $total_reallastbulanini_as = 0;
        $total_reallastsampaibulanini_as = 0;
        $total_realbulanini_as = 0;
        $total_realsampaibulanini_as = 0;
        $total_targetbulanini_as = 0;
        $total_targetsampaibulanini_as = 0;

        $total_reallastbulanini_bb = 0;
        $total_reallastsampaibulanini_bb = 0;
        $total_realbulanini_bb = 0;
        $total_realsampaibulanini_bb = 0;
        $total_targetbulanini_bb = 0;
        $total_targetsampaibulanini_bb = 0;

        $total_reallastbulanini_cg = 0;
        $total_reallastsampaibulanini_cg = 0;
        $total_realbulanini_cg = 0;
        $total_realsampaibulanini_cg = 0;
        $total_targetbulanini_cg = 0;
        $total_targetsampaibulanini_cg = 0;

        $total_reallastbulanini_cgg = 0;
        $total_reallastsampaibulanini_cgg = 0;
        $total_realbulanini_cgg = 0;
        $total_realsampaibulanini_cgg = 0;
        $total_targetbulanini_cgg = 0;
        $total_targetsampaibulanini_cgg = 0;

        $total_reallastbulanini_dep = 0;
        $total_reallastsampaibulanini_dep = 0;
        $total_realbulanini_dep = 0;
        $total_realsampaibulanini_dep = 0;
        $total_targetbulanini_dep = 0;
        $total_targetsampaibulanini_dep = 0;

        $total_reallastbulanini_ds = 0;
        $total_reallastsampaibulanini_ds = 0;
        $total_realbulanini_ds = 0;
        $total_realsampaibulanini_ds = 0;
        $total_targetbulanini_ds = 0;
        $total_targetsampaibulanini_ds = 0;

        $total_reallastbulanini_sp = 0;
        $total_reallastsampaibulanini_sp = 0;
        $total_realbulanini_sp = 0;
        $total_realsampaibulanini_sp = 0;
        $total_targetbulanini_sp = 0;
        $total_targetsampaibulanini_sp = 0;



        $no = 1;
        foreach ($dppp as $d) {
          $reallastbulanini_ab = floor($d->reallastbulanini_ab / $isipcs_ab);
          $reallastsampaibulanini_ab = floor($d->reallastsampaibulanini_ab / $isipcs_ab);
          $realbulanini_ab = floor($d->realbulanini_ab / $isipcs_ab);
          $realsampaibulanini_ab = floor($d->realsampaibulanini_ab / $isipcs_ab);
          $targetbulanini_ab = $d->ab_bulanini;
          $targetsampaibulanini_ab = $d->ab_sampaibulanini;

          if ($targetbulanini_ab == 0) {
            $ach_ab_bulanini = 0;
          } else {
            $ach_ab_bulanini   = ($realbulanini_ab / $targetbulanini_ab) * 100;
          }

          if ($reallastbulanini_ab == 0) {
            $grw_ab_bulanini = 0;
          } else {
            $grw_ab_bulanini   = ($realbulanini_ab / $reallastbulanini_ab) * 100;
          }

          if ($targetsampaibulanini_ab == 0) {
            $ach_ab_sampaibulanini = 0;
          } else {
            $ach_ab_sampaibulanini   = ($realsampaibulanini_ab / $targetsampaibulanini_ab) * 100;
          }

          if ($reallastsampaibulanini_ab == 0) {
            $grw_ab_sampaibulanini = 0;
          } else {
            $grw_ab_sampaibulanini   = ($realsampaibulanini_ab / $reallastsampaibulanini_ab) * 100;
          }


          $reallastbulanini_ar = floor($d->reallastbulanini_ar / $isipcs_ar);
          $reallastsampaibulanini_ar = floor($d->reallastsampaibulanini_ar / $isipcs_ar);
          $realbulanini_ar = floor($d->realbulanini_ar / $isipcs_ar);
          $realsampaibulanini_ar = floor($d->realsampaibulanini_ar / $isipcs_ar);
          $targetbulanini_ar = $d->ar_bulanini;
          $targetsampaibulanini_ar = $d->ar_sampaibulanini;

          if ($targetbulanini_ar == 0) {
            $ach_ar_bulanini = 0;
          } else {
            $ach_ar_bulanini   = ($realbulanini_ar / $targetbulanini_ar) * 100;
          }

          if ($reallastbulanini_ar == 0) {
            $grw_ar_bulanini = 0;
          } else {
            $grw_ar_bulanini   = ($realbulanini_ar / $reallastbulanini_ar) * 100;
          }

          if ($targetsampaibulanini_ar == 0) {
            $ach_ar_sampaibulanini = 0;
          } else {
            $ach_ar_sampaibulanini   = ($realsampaibulanini_ar / $targetsampaibulanini_ar) * 100;
          }

          if ($reallastsampaibulanini_ar == 0) {
            $grw_ar_sampaibulanini = 0;
          } else {
            $grw_ar_sampaibulanini   = ($realsampaibulanini_ar / $reallastsampaibulanini_ar) * 100;
          }

          $reallastbulanini_as = floor($d->reallastbulanini_as / $isipcs_as);
          $reallastsampaibulanini_as = floor($d->reallastsampaibulanini_as / $isipcs_as);
          $realbulanini_as = floor($d->realbulanini_as / $isipcs_as);
          $realsampaibulanini_as = floor($d->realsampaibulanini_as / $isipcs_as);
          $targetbulanini_as = $d->as_bulanini;
          $targetsampaibulanini_as = $d->as_sampaibulanini;

          if ($targetbulanini_as == 0) {
            $ach_as_bulanini = 0;
          } else {
            $ach_as_bulanini   = ($realbulanini_as / $targetbulanini_as) * 100;
          }

          if ($reallastbulanini_as == 0) {
            $grw_as_bulanini = 0;
          } else {
            $grw_as_bulanini   = ($realbulanini_as / $reallastbulanini_as) * 100;
          }

          if ($targetsampaibulanini_as == 0) {
            $ach_as_sampaibulanini = 0;
          } else {
            $ach_as_sampaibulanini   = ($realsampaibulanini_as / $targetsampaibulanini_as) * 100;
          }

          if ($reallastsampaibulanini_as == 0) {
            $grw_as_sampaibulanini = 0;
          } else {
            $grw_as_sampaibulanini   = ($realsampaibulanini_as / $reallastsampaibulanini_as) * 100;
          }

          $reallastbulanini_bb = floor($d->reallastbulanini_bb / $isipcs_bb);
          $reallastsampaibulanini_bb = floor($d->reallastsampaibulanini_bb / $isipcs_bb);
          $realbulanini_bb = floor($d->realbulanini_bb / $isipcs_bb);
          $realsampaibulanini_bb = floor($d->realsampaibulanini_bb / $isipcs_bb);
          $targetbulanini_bb = $d->bb_bulanini;
          $targetsampaibulanini_bb = $d->bb_sampaibulanini;

          if ($targetbulanini_bb == 0) {
            $ach_bb_bulanini = 0;
          } else {
            $ach_bb_bulanini   = ($realbulanini_bb / $targetbulanini_bb) * 100;
          }

          if ($reallastbulanini_bb == 0) {
            $grw_bb_bulanini = 0;
          } else {
            $grw_bb_bulanini   = ($realbulanini_bb / $reallastbulanini_bb) * 100;
          }

          if ($targetsampaibulanini_bb == 0) {
            $ach_bb_sampaibulanini = 0;
          } else {
            $ach_bb_sampaibulanini   = ($realsampaibulanini_bb / $targetsampaibulanini_bb) * 100;
          }

          if ($reallastsampaibulanini_bb == 0) {
            $grw_bb_sampaibulanini = 0;
          } else {
            $grw_bb_sampaibulanini   = ($realsampaibulanini_bb / $reallastsampaibulanini_bb) * 100;
          }


          $reallastbulanini_cg = floor($d->reallastbulanini_cg / $isipcs_cg);
          $reallastsampaibulanini_cg = floor($d->reallastsampaibulanini_cg / $isipcs_cg);
          $realbulanini_cg = floor($d->realbulanini_cg / $isipcs_cg);
          $realsampaibulanini_cg = floor($d->realsampaibulanini_cg / $isipcs_cg);
          $targetbulanini_cg = $d->cg_bulanini;
          $targetsampaibulanini_cg = $d->cg_sampaibulanini;

          if ($targetbulanini_cg == 0) {
            $ach_cg_bulanini = 0;
          } else {
            $ach_cg_bulanini   = ($realbulanini_cg / $targetbulanini_cg) * 100;
          }

          if ($reallastbulanini_cg == 0) {
            $grw_cg_bulanini = 0;
          } else {
            $grw_cg_bulanini   = ($realbulanini_cg / $reallastbulanini_cg) * 100;
          }

          if ($targetsampaibulanini_cg == 0) {
            $ach_cg_sampaibulanini = 0;
          } else {
            $ach_cg_sampaibulanini   = ($realsampaibulanini_cg / $targetsampaibulanini_cg) * 100;
          }

          if ($reallastsampaibulanini_cg == 0) {
            $grw_cg_sampaibulanini = 0;
          } else {
            $grw_cg_sampaibulanini   = ($realsampaibulanini_cg / $reallastsampaibulanini_cg) * 100;
          }

          $reallastbulanini_cgg = floor($d->reallastbulanini_cgg / $isipcs_cgg);
          $reallastsampaibulanini_cgg = floor($d->reallastsampaibulanini_cgg / $isipcs_cgg);
          $realbulanini_cgg = floor($d->realbulanini_cgg / $isipcs_cgg);
          $realsampaibulanini_cgg = floor($d->realsampaibulanini_cgg / $isipcs_cgg);
          $targetbulanini_cgg = $d->cgg_bulanini;
          $targetsampaibulanini_cgg = $d->cgg_sampaibulanini;

          if ($targetbulanini_cgg == 0) {
            $ach_cgg_bulanini = 0;
          } else {
            $ach_cgg_bulanini   = ($realbulanini_cgg / $targetbulanini_cgg) * 100;
          }

          if ($reallastbulanini_cgg == 0) {
            $grw_cgg_bulanini = 0;
          } else {
            $grw_cgg_bulanini   = ($realbulanini_cgg / $reallastbulanini_cgg) * 100;
          }

          if ($targetsampaibulanini_cgg == 0) {
            $ach_cgg_sampaibulanini = 0;
          } else {
            $ach_cgg_sampaibulanini   = ($realsampaibulanini_cgg / $targetsampaibulanini_cgg) * 100;
          }

          if ($reallastsampaibulanini_cgg == 0) {
            $grw_cgg_sampaibulanini = 0;
          } else {
            $grw_cgg_sampaibulanini   = ($realsampaibulanini_cgg / $reallastsampaibulanini_cgg) * 100;
          }

          $reallastbulanini_dep = floor($d->reallastbulanini_dep / $isipcs_dep);
          $reallastsampaibulanini_dep = floor($d->reallastsampaibulanini_dep / $isipcs_dep);
          $realbulanini_dep = floor($d->realbulanini_dep / $isipcs_dep);
          $realsampaibulanini_dep = floor($d->realsampaibulanini_dep / $isipcs_dep);
          $targetbulanini_dep = $d->dep_bulanini;
          $targetsampaibulanini_dep = $d->dep_sampaibulanini;

          if ($targetbulanini_dep == 0) {
            $ach_dep_bulanini = 0;
          } else {
            $ach_dep_bulanini   = ($realbulanini_dep / $targetbulanini_dep) * 100;
          }

          if ($reallastbulanini_dep == 0) {
            $grw_dep_bulanini = 0;
          } else {
            $grw_dep_bulanini   = ($realbulanini_dep / $reallastbulanini_dep) * 100;
          }

          if ($targetsampaibulanini_dep == 0) {
            $ach_dep_sampaibulanini = 0;
          } else {
            $ach_dep_sampaibulanini   = ($realsampaibulanini_dep / $targetsampaibulanini_dep) * 100;
          }

          if ($reallastsampaibulanini_dep == 0) {
            $grw_dep_sampaibulanini = 0;
          } else {
            $grw_dep_sampaibulanini   = ($realsampaibulanini_dep / $reallastsampaibulanini_dep) * 100;
          }

          $reallastbulanini_ds = floor($d->reallastbulanini_ds / $isipcs_ds);
          $reallastsampaibulanini_ds = floor($d->reallastsampaibulanini_ds / $isipcs_ds);
          $realbulanini_ds = floor($d->realbulanini_ds / $isipcs_ds);
          $realsampaibulanini_ds = floor($d->realsampaibulanini_ds / $isipcs_ds);
          $targetbulanini_ds = $d->ds_bulanini;
          $targetsampaibulanini_ds = $d->ds_sampaibulanini;

          if ($targetbulanini_ds == 0) {
            $ach_ds_bulanini = 0;
          } else {
            $ach_ds_bulanini   = ($realbulanini_ds / $targetbulanini_ds) * 100;
          }

          if ($reallastbulanini_ds == 0) {
            $grw_ds_bulanini = 0;
          } else {
            $grw_ds_bulanini   = ($realbulanini_ds / $reallastbulanini_ds) * 100;
          }

          if ($targetsampaibulanini_ds == 0) {
            $ach_ds_sampaibulanini = 0;
          } else {
            $ach_ds_sampaibulanini   = ($realsampaibulanini_ds / $targetsampaibulanini_ds) * 100;
          }

          if ($reallastsampaibulanini_ds == 0) {
            $grw_ds_sampaibulanini = 0;
          } else {
            $grw_ds_sampaibulanini   = ($realsampaibulanini_ds / $reallastsampaibulanini_ds) * 100;
          }

          $reallastbulanini_sp = floor($d->reallastbulanini_sp / $isipcs_sp);
          $reallastsampaibulanini_sp = floor($d->reallastsampaibulanini_sp / $isipcs_sp);
          $realbulanini_sp = floor($d->realbulanini_sp / $isipcs_sp);
          $realsampaibulanini_sp = floor($d->realsampaibulanini_sp / $isipcs_sp);
          $targetbulanini_sp = $d->sp_bulanini;
          $targetsampaibulanini_sp = $d->sp_sampaibulanini;

          if ($targetbulanini_sp == 0) {
            $ach_sp_bulanini = 0;
          } else {
            $ach_sp_bulanini   = ($realbulanini_sp / $targetbulanini_sp) * 100;
          }

          if ($reallastbulanini_sp == 0) {
            $grw_sp_bulanini = 0;
          } else {
            $grw_sp_bulanini   = ($realbulanini_sp / $reallastbulanini_sp) * 100;
          }

          if ($targetsampaibulanini_sp == 0) {
            $ach_sp_sampaibulanini = 0;
          } else {
            $ach_sp_sampaibulanini   = ($realsampaibulanini_sp / $targetsampaibulanini_sp) * 100;
          }

          if ($reallastsampaibulanini_sp == 0) {
            $grw_sp_sampaibulanini = 0;
          } else {
            $grw_sp_sampaibulanini   = ($realsampaibulanini_sp / $reallastsampaibulanini_sp) * 100;
          }

          $total_reallastbulanini_ab += $reallastbulanini_ab;
          $total_reallastsampaibulanini_ab += $reallastsampaibulanini_ab;
          $total_realbulanini_ab += $realbulanini_ab;
          $total_realsampaibulanini_ab += $realsampaibulanini_ab;
          $total_targetbulanini_ab += $targetbulanini_ab;
          $total_targetsampaibulanini_ab += $targetsampaibulanini_ab;

          if ($total_targetbulanini_ab == 0) {
            $total_ach_ab_bulanini = 0;
          } else {
            $total_ach_ab_bulanini   = ($total_realbulanini_ab / $total_targetbulanini_ab) * 100;
          }

          if ($total_reallastbulanini_ab == 0) {
            $total_grw_ab_bulanini = 0;
          } else {
            $total_grw_ab_bulanini   = ($total_realbulanini_ab / $total_reallastbulanini_ab) * 100;
          }

          if ($total_targetsampaibulanini_ab == 0) {
            $total_ach_ab_sampaibulanini = 0;
          } else {
            $total_ach_ab_sampaibulanini   = ($total_realsampaibulanini_ab / $total_targetsampaibulanini_ab) * 100;
          }

          if ($total_reallastsampaibulanini_ab == 0) {
            $total_grw_ab_sampaibulanini = 0;
          } else {
            $total_grw_ab_sampaibulanini   = ($total_realsampaibulanini_ab / $total_reallastsampaibulanini_ab) * 100;
          }


          $total_reallastbulanini_ar += $reallastbulanini_ar;
          $total_reallastsampaibulanini_ar += $reallastsampaibulanini_ar;
          $total_realbulanini_ar += $realbulanini_ar;
          $total_realsampaibulanini_ar += $realsampaibulanini_ar;
          $total_targetbulanini_ar += $targetbulanini_ar;
          $total_targetsampaibulanini_ar += $targetsampaibulanini_ar;

          if ($total_targetbulanini_ar == 0) {
            $total_ach_ar_bulanini = 0;
          } else {
            $total_ach_ar_bulanini   = ($total_realbulanini_ar / $total_targetbulanini_ar) * 100;
          }

          if ($total_reallastbulanini_ar == 0) {
            $total_grw_ar_bulanini = 0;
          } else {
            $total_grw_ar_bulanini   = ($total_realbulanini_ar / $total_reallastbulanini_ar) * 100;
          }

          if ($total_targetsampaibulanini_ar == 0) {
            $total_ach_ar_sampaibulanini = 0;
          } else {
            $total_ach_ar_sampaibulanini   = ($total_realsampaibulanini_ar / $total_targetsampaibulanini_ar) * 100;
          }

          if ($total_reallastsampaibulanini_ar == 0) {
            $total_grw_ar_sampaibulanini = 0;
          } else {
            $total_grw_ar_sampaibulanini   = ($total_realsampaibulanini_ar / $total_reallastsampaibulanini_ar) * 100;
          }


          $total_reallastbulanini_as += $reallastbulanini_as;
          $total_reallastsampaibulanini_as += $reallastsampaibulanini_as;
          $total_realbulanini_as += $realbulanini_as;
          $total_realsampaibulanini_as += $realsampaibulanini_as;
          $total_targetbulanini_as += $targetbulanini_as;
          $total_targetsampaibulanini_as += $targetsampaibulanini_as;

          if ($total_targetbulanini_as == 0) {
            $total_ach_as_bulanini = 0;
          } else {
            $total_ach_as_bulanini   = ($total_realbulanini_as / $total_targetbulanini_as) * 100;
          }

          if ($total_reallastbulanini_as == 0) {
            $total_grw_as_bulanini = 0;
          } else {
            $total_grw_as_bulanini   = ($total_realbulanini_as / $total_reallastbulanini_as) * 100;
          }

          if ($total_targetsampaibulanini_as == 0) {
            $total_ach_as_sampaibulanini = 0;
          } else {
            $total_ach_as_sampaibulanini   = ($total_realsampaibulanini_as / $total_targetsampaibulanini_as) * 100;
          }

          if ($total_reallastsampaibulanini_as == 0) {
            $total_grw_as_sampaibulanini = 0;
          } else {
            $total_grw_as_sampaibulanini   = ($total_realsampaibulanini_as / $total_reallastsampaibulanini_as) * 100;
          }

          $total_reallastbulanini_bb += $reallastbulanini_bb;
          $total_reallastsampaibulanini_bb += $reallastsampaibulanini_bb;
          $total_realbulanini_bb += $realbulanini_bb;
          $total_realsampaibulanini_bb += $realsampaibulanini_bb;
          $total_targetbulanini_bb += $targetbulanini_bb;
          $total_targetsampaibulanini_bb += $targetsampaibulanini_bb;

          if ($total_targetbulanini_bb == 0) {
            $total_ach_bb_bulanini = 0;
          } else {
            $total_ach_bb_bulanini   = ($total_realbulanini_bb / $total_targetbulanini_bb) * 100;
          }

          if ($total_reallastbulanini_bb == 0) {
            $total_grw_bb_bulanini = 0;
          } else {
            $total_grw_bb_bulanini   = ($total_realbulanini_bb / $total_reallastbulanini_bb) * 100;
          }

          if ($total_targetsampaibulanini_bb == 0) {
            $total_ach_bb_sampaibulanini = 0;
          } else {
            $total_ach_bb_sampaibulanini   = ($total_realsampaibulanini_bb / $total_targetsampaibulanini_bb) * 100;
          }

          if ($total_reallastsampaibulanini_bb == 0) {
            $total_grw_bb_sampaibulanini = 0;
          } else {
            $total_grw_bb_sampaibulanini   = ($total_realsampaibulanini_bb / $total_reallastsampaibulanini_bb) * 100;
          }

          $total_reallastbulanini_cg += $reallastbulanini_cg;
          $total_reallastsampaibulanini_cg += $reallastsampaibulanini_cg;
          $total_realbulanini_cg += $realbulanini_cg;
          $total_realsampaibulanini_cg += $realsampaibulanini_cg;
          $total_targetbulanini_cg += $targetbulanini_cg;
          $total_targetsampaibulanini_cg += $targetsampaibulanini_cg;

          if ($total_targetbulanini_cg == 0) {
            $total_ach_cg_bulanini = 0;
          } else {
            $total_ach_cg_bulanini   = ($total_realbulanini_cg / $total_targetbulanini_cg) * 100;
          }

          if ($total_reallastbulanini_cg == 0) {
            $total_grw_cg_bulanini = 0;
          } else {
            $total_grw_cg_bulanini   = ($total_realbulanini_cg / $total_reallastbulanini_cg) * 100;
          }

          if ($total_targetsampaibulanini_cg == 0) {
            $total_ach_cg_sampaibulanini = 0;
          } else {
            $total_ach_cg_sampaibulanini   = ($total_realsampaibulanini_cg / $total_targetsampaibulanini_cg) * 100;
          }

          if ($total_reallastsampaibulanini_cg == 0) {
            $total_grw_cg_sampaibulanini = 0;
          } else {
            $total_grw_cg_sampaibulanini   = ($total_realsampaibulanini_cg / $total_reallastsampaibulanini_cg) * 100;
          }

          $total_reallastbulanini_cgg += $reallastbulanini_cgg;
          $total_reallastsampaibulanini_cgg += $reallastsampaibulanini_cgg;
          $total_realbulanini_cgg += $realbulanini_cgg;
          $total_realsampaibulanini_cgg += $realsampaibulanini_cgg;
          $total_targetbulanini_cgg += $targetbulanini_cgg;
          $total_targetsampaibulanini_cgg += $targetsampaibulanini_cgg;

          if ($total_targetbulanini_cgg == 0) {
            $total_ach_cgg_bulanini = 0;
          } else {
            $total_ach_cgg_bulanini   = ($total_realbulanini_cgg / $total_targetbulanini_cgg) * 100;
          }

          if ($total_reallastbulanini_cgg == 0) {
            $total_grw_cgg_bulanini = 0;
          } else {
            $total_grw_cgg_bulanini   = ($total_realbulanini_cgg / $total_reallastbulanini_cgg) * 100;
          }

          if ($total_targetsampaibulanini_cgg == 0) {
            $total_ach_cgg_sampaibulanini = 0;
          } else {
            $total_ach_cgg_sampaibulanini   = ($total_realsampaibulanini_cgg / $total_targetsampaibulanini_cgg) * 100;
          }

          if ($total_reallastsampaibulanini_cgg == 0) {
            $total_grw_cgg_sampaibulanini = 0;
          } else {
            $total_grw_cgg_sampaibulanini   = ($total_realsampaibulanini_cgg / $total_reallastsampaibulanini_cgg) * 100;
          }


          $total_reallastbulanini_dep += $reallastbulanini_dep;
          $total_reallastsampaibulanini_dep += $reallastsampaibulanini_dep;
          $total_realbulanini_dep += $realbulanini_dep;
          $total_realsampaibulanini_dep += $realsampaibulanini_dep;
          $total_targetbulanini_dep += $targetbulanini_dep;
          $total_targetsampaibulanini_dep += $targetsampaibulanini_dep;

          if ($total_targetbulanini_dep == 0) {
            $total_ach_dep_bulanini = 0;
          } else {
            $total_ach_dep_bulanini   = ($total_realbulanini_dep / $total_targetbulanini_dep) * 100;
          }

          if ($total_reallastbulanini_dep == 0) {
            $total_grw_dep_bulanini = 0;
          } else {
            $total_grw_dep_bulanini   = ($total_realbulanini_dep / $total_reallastbulanini_dep) * 100;
          }

          if ($total_targetsampaibulanini_dep == 0) {
            $total_ach_dep_sampaibulanini = 0;
          } else {
            $total_ach_dep_sampaibulanini   = ($total_realsampaibulanini_dep / $total_targetsampaibulanini_dep) * 100;
          }

          if ($total_reallastsampaibulanini_dep == 0) {
            $total_grw_dep_sampaibulanini = 0;
          } else {
            $total_grw_dep_sampaibulanini   = ($total_realsampaibulanini_dep / $total_reallastsampaibulanini_dep) * 100;
          }

          $total_reallastbulanini_ds += $reallastbulanini_ds;
          $total_reallastsampaibulanini_ds += $reallastsampaibulanini_ds;
          $total_realbulanini_ds += $realbulanini_ds;
          $total_realsampaibulanini_ds += $realsampaibulanini_ds;
          $total_targetbulanini_ds += $targetbulanini_ds;
          $total_targetsampaibulanini_ds += $targetsampaibulanini_ds;

          if ($total_targetbulanini_ds == 0) {
            $total_ach_ds_bulanini = 0;
          } else {
            $total_ach_ds_bulanini   = ($total_realbulanini_ds / $total_targetbulanini_ds) * 100;
          }

          if ($total_reallastbulanini_ds == 0) {
            $total_grw_ds_bulanini = 0;
          } else {
            $total_grw_ds_bulanini   = ($total_realbulanini_ds / $total_reallastbulanini_ds) * 100;
          }

          if ($total_targetsampaibulanini_ds == 0) {
            $total_ach_ds_sampaibulanini = 0;
          } else {
            $total_ach_ds_sampaibulanini   = ($total_realsampaibulanini_ds / $total_targetsampaibulanini_ds) * 100;
          }

          if ($total_reallastsampaibulanini_ds == 0) {
            $total_grw_ds_sampaibulanini = 0;
          } else {
            $total_grw_ds_sampaibulanini   = ($total_realsampaibulanini_ds / $total_reallastsampaibulanini_ds) * 100;
          }

          $total_reallastbulanini_sp += $reallastbulanini_sp;
          $total_reallastsampaibulanini_sp += $reallastsampaibulanini_sp;
          $total_realbulanini_sp += $realbulanini_sp;
          $total_realsampaibulanini_sp += $realsampaibulanini_sp;
          $total_targetbulanini_sp += $targetbulanini_sp;
          $total_targetsampaibulanini_sp += $targetsampaibulanini_sp;

          if ($total_targetbulanini_sp == 0) {
            $total_ach_sp_bulanini = 0;
          } else {
            $total_ach_sp_bulanini   = ($total_realbulanini_sp / $total_targetbulanini_sp) * 100;
          }

          if ($total_reallastbulanini_sp == 0) {
            $total_grw_sp_bulanini = 0;
          } else {
            $total_grw_sp_bulanini   = ($total_realbulanini_sp / $total_reallastbulanini_sp) * 100;
          }

          if ($total_targetsampaibulanini_sp == 0) {
            $total_ach_sp_sampaibulanini = 0;
          } else {
            $total_ach_sp_sampaibulanini   = ($total_realsampaibulanini_sp / $total_targetsampaibulanini_sp) * 100;
          }

          if ($total_reallastsampaibulanini_sp == 0) {
            $total_grw_sp_sampaibulanini = 0;
          } else {
            $total_grw_sp_sampaibulanini   = ($total_realsampaibulanini_sp / $total_reallastsampaibulanini_sp) * 100;
          }

        ?>
          <tr>
            <td class="fixed-side" scope="col"><?php echo $no; ?></td>
            <td class="fixed-side" scope="col"><?php echo strtoupper($d->nama_cabang); ?></td>
            <td align="right">
              <?php if (!empty($reallastbulanini_ab)) {
                echo uang($reallastbulanini_ab);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($targetbulanini_ab)) {
                echo uang($targetbulanini_ab);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($realbulanini_ab)) {
                echo uang($realbulanini_ab);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($ach_ab_bulanini)) {
                echo persentase($ach_ab_bulanini);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($grw_ab_bulanini)) {
                echo persentase($grw_ab_bulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($reallastsampaibulanini_ab)) {
                echo uang($reallastsampaibulanini_ab);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($targetsampaibulanini_ab)) {
                echo uang($targetsampaibulanini_ab);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($realsampaibulanini_ab)) {
                echo uang($realsampaibulanini_ab);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($ach_ab_sampaibulanini)) {
                echo persentase($ach_ab_sampaibulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($grw_ab_sampaibulanini)) {
                echo persentase($grw_ab_sampaibulanini);
              } ?>
            </td>


            <td align="right">
              <?php if (!empty($reallastbulanini_ar)) {
                echo uang($reallastbulanini_ar);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($targetbulanini_ar)) {
                echo uang($targetbulanini_ar);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($realbulanini_ar)) {
                echo uang($realbulanini_ar);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($ach_ar_bulanini)) {
                echo persentase($ach_ar_bulanini);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($grw_ar_bulanini)) {
                echo persentase($grw_ar_bulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($reallastsampaibulanini_ar)) {
                echo uang($reallastsampaibulanini_ar);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($targetsampaibulanini_ar)) {
                echo uang($targetsampaibulanini_ar);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($realsampaibulanini_ar)) {
                echo uang($realsampaibulanini_ar);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($ach_ar_sampaibulanini)) {
                echo persentase($ach_ar_sampaibulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($grw_ar_sampaibulanini)) {
                echo persentase($grw_ar_sampaibulanini);
              } ?>
            </td>


            <td align="right">
              <?php if (!empty($reallastbulanini_as)) {
                echo uang($reallastbulanini_as);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($targetbulanini_as)) {
                echo uang($targetbulanini_as);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($realbulanini_as)) {
                echo uang($realbulanini_as);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($ach_as_bulanini)) {
                echo persentase($ach_as_bulanini);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($grw_as_bulanini)) {
                echo persentase($grw_as_bulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($reallastsampaibulanini_as)) {
                echo uang($reallastsampaibulanini_as);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($targetsampaibulanini_as)) {
                echo uang($targetsampaibulanini_as);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($realsampaibulanini_as)) {
                echo uang($realsampaibulanini_as);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($ach_as_sampaibulanini)) {
                echo persentase($ach_as_sampaibulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($grw_as_sampaibulanini)) {
                echo persentase($grw_as_sampaibulanini);
              } ?>
            </td>

            <td align="right">
              <?php if (!empty($reallastbulanini_bb)) {
                echo uang($reallastbulanini_bb);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($targetbulanini_bb)) {
                echo uang($targetbulanini_bb);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($realbulanini_bb)) {
                echo uang($realbulanini_bb);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($ach_bb_bulanini)) {
                echo persentase($ach_bb_bulanini);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($grw_bb_bulanini)) {
                echo persentase($grw_bb_bulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($reallastsampaibulanini_bb)) {
                echo uang($reallastsampaibulanini_bb);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($targetsampaibulanini_bb)) {
                echo uang($targetsampaibulanini_bb);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($realsampaibulanini_bb)) {
                echo uang($realsampaibulanini_bb);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($ach_bb_sampaibulanini)) {
                echo persentase($ach_bb_sampaibulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($grw_bb_sampaibulanini)) {
                echo persentase($grw_bb_sampaibulanini);
              } ?>
            </td>

            <td align="right">
              <?php if (!empty($reallastbulanini_cg)) {
                echo uang($reallastbulanini_cg);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($targetbulanini_cg)) {
                echo uang($targetbulanini_cg);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($realbulanini_cg)) {
                echo uang($realbulanini_cg);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($ach_cg_bulanini)) {
                echo persentase($ach_cg_bulanini);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($grw_cg_bulanini)) {
                echo persentase($grw_cg_bulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($reallastsampaibulanini_cg)) {
                echo uang($reallastsampaibulanini_cg);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($targetsampaibulanini_cg)) {
                echo uang($targetsampaibulanini_cg);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($realsampaibulanini_cg)) {
                echo uang($realsampaibulanini_cg);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($ach_cg_sampaibulanini)) {
                echo persentase($ach_cg_sampaibulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($grw_cg_sampaibulanini)) {
                echo persentase($grw_cg_sampaibulanini);
              } ?>
            </td>

            <td align="right">
              <?php if (!empty($reallastbulanini_cgg)) {
                echo uang($reallastbulanini_cgg);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($targetbulanini_cgg)) {
                echo uang($targetbulanini_cgg);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($realbulanini_cgg)) {
                echo uang($realbulanini_cgg);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($ach_cgg_bulanini)) {
                echo persentase($ach_cgg_bulanini);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($grw_cgg_bulanini)) {
                echo persentase($grw_cgg_bulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($reallastsampaibulanini_cgg)) {
                echo uang($reallastsampaibulanini_cgg);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($targetsampaibulanini_cgg)) {
                echo uang($targetsampaibulanini_cgg);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($realsampaibulanini_cgg)) {
                echo uang($realsampaibulanini_cgg);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($ach_cgg_sampaibulanini)) {
                echo persentase($ach_cgg_sampaibulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($grw_cgg_sampaibulanini)) {
                echo persentase($grw_cgg_sampaibulanini);
              } ?>
            </td>

            <td align="right">
              <?php if (!empty($reallastbulanini_dep)) {
                echo uang($reallastbulanini_dep);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($targetbulanini_dep)) {
                echo uang($targetbulanini_dep);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($realbulanini_dep)) {
                echo uang($realbulanini_dep);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($ach_dep_bulanini)) {
                echo persentase($ach_dep_bulanini);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($grw_dep_bulanini)) {
                echo persentase($grw_dep_bulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($reallastsampaibulanini_dep)) {
                echo uang($reallastsampaibulanini_dep);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($targetsampaibulanini_dep)) {
                echo uang($targetsampaibulanini_dep);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($realsampaibulanini_dep)) {
                echo uang($realsampaibulanini_dep);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($ach_dep_sampaibulanini)) {
                echo persentase($ach_dep_sampaibulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($grw_dep_sampaibulanini)) {
                echo persentase($grw_dep_sampaibulanini);
              } ?>
            </td>

            <td align="right">
              <?php if (!empty($reallastbulanini_ds)) {
                echo uang($reallastbulanini_ds);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($targetbulanini_ds)) {
                echo uang($targetbulanini_ds);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($realbulanini_ds)) {
                echo uang($realbulanini_ds);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($ach_ds_bulanini)) {
                echo persentase($ach_ds_bulanini);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($grw_ds_bulanini)) {
                echo persentase($grw_ds_bulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($reallastsampaibulanini_ds)) {
                echo uang($reallastsampaibulanini_ds);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($targetsampaibulanini_ds)) {
                echo uang($targetsampaibulanini_ds);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($realsampaibulanini_ds)) {
                echo uang($realsampaibulanini_ds);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($ach_ds_sampaibulanini)) {
                echo persentase($ach_ds_sampaibulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($grw_ds_sampaibulanini)) {
                echo persentase($grw_ds_sampaibulanini);
              } ?>
            </td>

            <td align="right">
              <?php if (!empty($reallastbulanini_sp)) {
                echo uang($reallastbulanini_sp);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($targetbulanini_sp)) {
                echo uang($targetbulanini_sp);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($realbulanini_sp)) {
                echo uang($realbulanini_sp);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($ach_sp_bulanini)) {
                echo persentase($ach_sp_bulanini);
              } ?>
            </td>
            <td align="right">
              <?php if (!empty($grw_sp_bulanini)) {
                echo persentase($grw_sp_bulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($reallastsampaibulanini_sp)) {
                echo uang($reallastsampaibulanini_sp);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($targetsampaibulanini_sp)) {
                echo uang($targetsampaibulanini_sp);
              } ?>
            </td>

            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($realsampaibulanini_sp)) {
                echo uang($realsampaibulanini_sp);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($ach_sp_sampaibulanini)) {
                echo persentase($ach_sp_sampaibulanini);
              } ?>
            </td>
            <td align="right" style="background-color: #e2e2e2;">
              <?php if (!empty($grw_sp_sampaibulanini)) {
                echo persentase($grw_sp_sampaibulanini);
              } ?>
            </td>
          </tr>

        <?php
          $no++;
        }
        ?>
      </tbody>
      <tfoot style="font-size:16px; font-weight:bold">
        <tr>
          <th colspan="2" class="fixed-side">TOTAL</th>
          <td align="right">
            <?php if (!empty($total_reallastbulanini_ab)) {
              echo uang($total_reallastbulanini_ab);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_targetbulanini_ab)) {
              echo uang($total_targetbulanini_ab);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_realbulanini_ab)) {
              echo uang($total_realbulanini_ab);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_ach_ab_bulanini)) {
              echo persentase($total_ach_ab_bulanini);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_grw_ab_bulanini)) {
              echo persentase($total_grw_ab_bulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_reallastsampaibulanini_ab)) {
              echo uang($total_reallastsampaibulanini_ab);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_targetsampaibulanini_ab)) {
              echo uang($total_targetsampaibulanini_ab);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_realsampaibulanini_ab)) {
              echo uang($total_realsampaibulanini_ab);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_ach_ab_sampaibulanini)) {
              echo persentase($total_ach_ab_sampaibulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_grw_ab_sampaibulanini)) {
              echo persentase($total_grw_ab_sampaibulanini);
            } ?>
          </td>


          <td align="right">
            <?php if (!empty($total_reallastbulanini_ar)) {
              echo uang($total_reallastbulanini_ar);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_targetbulanini_ar)) {
              echo uang($total_targetbulanini_ar);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_realbulanini_ar)) {
              echo uang($total_realbulanini_ar);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_ach_ar_bulanini)) {
              echo persentase($total_ach_ar_bulanini);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_grw_ar_bulanini)) {
              echo persentase($total_grw_ar_bulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_reallastsampaibulanini_ar)) {
              echo uang($total_reallastsampaibulanini_ar);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_targetsampaibulanini_ar)) {
              echo uang($total_targetsampaibulanini_ar);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_realsampaibulanini_ar)) {
              echo uang($total_realsampaibulanini_ar);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_ach_ar_sampaibulanini)) {
              echo persentase($total_ach_ar_sampaibulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_grw_ar_sampaibulanini)) {
              echo persentase($total_grw_ar_sampaibulanini);
            } ?>
          </td>


          <td align="right">
            <?php if (!empty($total_reallastbulanini_as)) {
              echo uang($total_reallastbulanini_as);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_targetbulanini_as)) {
              echo uang($total_targetbulanini_as);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_realbulanini_as)) {
              echo uang($total_realbulanini_as);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_ach_as_bulanini)) {
              echo persentase($total_ach_as_bulanini);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_grw_as_bulanini)) {
              echo persentase($total_grw_as_bulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_reallastsampaibulanini_as)) {
              echo uang($total_reallastsampaibulanini_as);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_targetsampaibulanini_as)) {
              echo uang($total_targetsampaibulanini_as);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_realsampaibulanini_as)) {
              echo uang($total_realsampaibulanini_as);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_ach_as_sampaibulanini)) {
              echo persentase($total_ach_as_sampaibulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_grw_as_sampaibulanini)) {
              echo persentase($total_grw_as_sampaibulanini);
            } ?>
          </td>

          <td align="right">
            <?php if (!empty($total_reallastbulanini_bb)) {
              echo uang($total_reallastbulanini_bb);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_targetbulanini_bb)) {
              echo uang($total_targetbulanini_bb);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_realbulanini_bb)) {
              echo uang($total_realbulanini_bb);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_ach_bb_bulanini)) {
              echo persentase($total_ach_bb_bulanini);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_grw_bb_bulanini)) {
              echo persentase($total_grw_bb_bulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_reallastsampaibulanini_bb)) {
              echo uang($total_reallastsampaibulanini_bb);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_targetsampaibulanini_bb)) {
              echo uang($total_targetsampaibulanini_bb);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_realsampaibulanini_bb)) {
              echo uang($total_realsampaibulanini_bb);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_ach_bb_sampaibulanini)) {
              echo persentase($total_ach_bb_sampaibulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_grw_bb_sampaibulanini)) {
              echo persentase($total_grw_bb_sampaibulanini);
            } ?>
          </td>

          <td align="right">
            <?php if (!empty($total_reallastbulanini_cg)) {
              echo uang($total_reallastbulanini_cg);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_targetbulanini_cg)) {
              echo uang($total_targetbulanini_cg);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_realbulanini_cg)) {
              echo uang($total_realbulanini_cg);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_ach_cg_bulanini)) {
              echo persentase($total_ach_cg_bulanini);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_grw_cg_bulanini)) {
              echo persentase($total_grw_cg_bulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_reallastsampaibulanini_cg)) {
              echo uang($total_reallastsampaibulanini_cg);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_targetsampaibulanini_cg)) {
              echo uang($total_targetsampaibulanini_cg);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_realsampaibulanini_cg)) {
              echo uang($total_realsampaibulanini_cg);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_ach_cg_sampaibulanini)) {
              echo persentase($total_ach_cg_sampaibulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_grw_cg_sampaibulanini)) {
              echo persentase($total_grw_cg_sampaibulanini);
            } ?>
          </td>

          <td align="right">
            <?php if (!empty($total_reallastbulanini_cgg)) {
              echo uang($total_reallastbulanini_cgg);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_targetbulanini_cgg)) {
              echo uang($total_targetbulanini_cgg);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_realbulanini_cgg)) {
              echo uang($total_realbulanini_cgg);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_ach_cgg_bulanini)) {
              echo persentase($total_ach_cgg_bulanini);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_grw_cgg_bulanini)) {
              echo persentase($total_grw_cgg_bulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_reallastsampaibulanini_cgg)) {
              echo uang($total_reallastsampaibulanini_cgg);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_targetsampaibulanini_cgg)) {
              echo uang($total_targetsampaibulanini_cgg);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_realsampaibulanini_cgg)) {
              echo uang($total_realsampaibulanini_cgg);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_ach_cgg_sampaibulanini)) {
              echo persentase($total_ach_cgg_sampaibulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_grw_cgg_sampaibulanini)) {
              echo persentase($total_grw_cgg_sampaibulanini);
            } ?>
          </td>

          <td align="right">
            <?php if (!empty($total_reallastbulanini_dep)) {
              echo uang($total_reallastbulanini_dep);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_targetbulanini_dep)) {
              echo uang($total_targetbulanini_dep);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_realbulanini_dep)) {
              echo uang($total_realbulanini_dep);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_ach_dep_bulanini)) {
              echo persentase($total_ach_dep_bulanini);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_grw_dep_bulanini)) {
              echo persentase($total_grw_dep_bulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_reallastsampaibulanini_dep)) {
              echo uang($total_reallastsampaibulanini_dep);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_targetsampaibulanini_dep)) {
              echo uang($total_targetsampaibulanini_dep);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_realsampaibulanini_dep)) {
              echo uang($total_realsampaibulanini_dep);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_ach_dep_sampaibulanini)) {
              echo persentase($total_ach_dep_sampaibulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_grw_dep_sampaibulanini)) {
              echo persentase($total_grw_dep_sampaibulanini);
            } ?>
          </td>

          <td align="right">
            <?php if (!empty($total_reallastbulanini_ds)) {
              echo uang($total_reallastbulanini_ds);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_targetbulanini_ds)) {
              echo uang($total_targetbulanini_ds);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_realbulanini_ds)) {
              echo uang($total_realbulanini_ds);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_ach_ds_bulanini)) {
              echo persentase($total_ach_ds_bulanini);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_grw_ds_bulanini)) {
              echo persentase($total_grw_ds_bulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_reallastsampaibulanini_ds)) {
              echo uang($total_reallastsampaibulanini_ds);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_targetsampaibulanini_ds)) {
              echo uang($total_targetsampaibulanini_ds);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_realsampaibulanini_ds)) {
              echo uang($total_realsampaibulanini_ds);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_ach_ds_sampaibulanini)) {
              echo persentase($total_ach_ds_sampaibulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_grw_ds_sampaibulanini)) {
              echo persentase($total_grw_ds_sampaibulanini);
            } ?>
          </td>

          <td align="right">
            <?php if (!empty($total_reallastbulanini_sp)) {
              echo uang($total_reallastbulanini_sp);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_targetbulanini_sp)) {
              echo uang($total_targetbulanini_sp);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_realbulanini_sp)) {
              echo uang($total_realbulanini_sp);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_ach_sp_bulanini)) {
              echo persentase($total_ach_sp_bulanini);
            } ?>
          </td>
          <td align="right">
            <?php if (!empty($total_grw_sp_bulanini)) {
              echo persentase($total_grw_sp_bulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_reallastsampaibulanini_sp)) {
              echo uang($total_reallastsampaibulanini_sp);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_targetsampaibulanini_sp)) {
              echo uang($total_targetsampaibulanini_sp);
            } ?>
          </td>

          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_realsampaibulanini_sp)) {
              echo uang($total_realsampaibulanini_sp);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_ach_sp_sampaibulanini)) {
              echo persentase($total_ach_sp_sampaibulanini);
            } ?>
          </td>
          <td align="right" style="background-color: #e2e2e2;">
            <?php if (!empty($total_grw_sp_sampaibulanini)) {
              echo persentase($total_grw_sp_sampaibulanini);
            } ?>
          </td>
        </tr>
      </tfoot>
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