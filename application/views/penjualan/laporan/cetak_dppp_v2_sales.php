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
          <td rowspan="4" style="background-color:#295ea9; color:white" class="fixed-side" scope="col">Salesman</td>
          <td colspan="108">Produk</td>
        </tr>
        <tr style="text-align:center">
          <td colspan="12">AB</td>
          <td colspan="12">AR</td>
          <td colspan="12">AS</td>
          <td colspan="12">BB</td>
          <td colspan="12">CG</td>
          <td colspan="12">CGG</td>
          <td colspan="12">DEP</td>
          <td colspan="12">DS</td>
          <td colspan="12">SP</td>

        </tr>
        <tr style="text-align: center;">
          <td colspan="4"><?= $tahun ?></td>
          <td colspan="4" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="4">s/d <?= $namabulan[$bulan] ?></td>
          <td colspan="4"><?= $tahun ?></td>
          <td colspan="4" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="4">s/d <?= $namabulan[$bulan] ?></td>
          <td colspan="4"><?= $tahun ?></td>
          <td colspan="4" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="4">s/d <?= $namabulan[$bulan] ?></td>
          <td colspan="4"><?= $tahun ?></td>
          <td colspan="4" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="4">s/d <?= $namabulan[$bulan] ?></td>
          <td colspan="4"><?= $tahun ?></td>
          <td colspan="4" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="4">s/d <?= $namabulan[$bulan] ?></td>

          <td colspan="4"><?= $tahun ?></td>
          <td colspan="4" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="4">s/d <?= $namabulan[$bulan] ?></td>

          <td colspan="4"><?= $tahun ?></td>
          <td colspan="4" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="4">s/d <?= $namabulan[$bulan] ?></td>

          <td colspan="4"><?= $tahun ?></td>
          <td colspan="4" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="4">s/d <?= $namabulan[$bulan] ?></td>

          <td colspan="4"><?= $tahun ?></td>
          <td colspan="4" style="background-color: #25b70a;"><?= $namabulan[$bulan] ?></td>
          <td colspan="4">s/d <?= $namabulan[$bulan] ?></td>
        </tr>

        <tr>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Sisa</td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>

          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Sisa</td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>

          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Sisa</td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>

          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Sisa</td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>

          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Sisa</td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>

          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Sisa</td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>

          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Sisa</td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>

          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Sisa</td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>

          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>
          <td style="background-color: #25b70a;">Target</td>
          <td style="background-color: #25b70a;">Realisasi</td>
          <td style="background-color: #25b70a;">Ach(%)</td>
          <td style="background-color: #25b70a;">Sisa</td>
          <td>Target</td>
          <td>Realisasi</td>
          <td>Ach(%)</td>
          <td>Sisa</td>
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

          $real_ab_tahun = floor($d->real_ab_tahun / $isipcs_ab);
          $real_ab_bulanini = floor($d->real_ab_bulanini / $isipcs_ab);
          $real_ab_sampaibulanini = floor($d->real_ab_sampaibulanini / $isipcs_ab);
          if ($d->ab_tahun == 0) {
            $ach_ab_tahun = 0;
          } else {
            $ach_ab_tahun   = ($real_ab_tahun / $d->ab_tahun) * 100;
          }

          if ($d->ab_bulanini == 0) {
            $ach_ab_bulanini = 0;
          } else {
            $ach_ab_bulanini   = ($real_ab_bulanini / $d->ab_bulanini) * 100;
          }

          if ($d->ab_sampaibulanini == 0) {
            $ach_ab_sampaibulanini = 0;
          } else {
            $ach_ab_sampaibulanini   = ($real_ab_sampaibulanini / $d->ab_sampaibulanini) * 100;
          }

          if ($real_ab_tahun > $d->ab_tahun) {
            $sisa_ab = 0;
          } else {
            $sisa_ab = $d->ab_tahun - $real_ab_tahun;
          }

          if ($real_ab_bulanini > $d->ab_bulanini) {
            $sisabulanini_ab = 0;
          } else {
            $sisabulanini_ab = $d->ab_bulanini - $real_ab_bulanini;
          }

          if ($real_ab_sampaibulanini > $d->ab_sampaibulanini) {
            $sisasampaibulanini_ab = 0;
          } else {
            $sisasampaibulanini_ab = $d->ab_sampaibulanini - $real_ab_sampaibulanini;
          }

          //AR
          $real_ar_tahun = floor($d->real_ar_tahun / $isipcs_ar);
          $real_ar_bulanini = floor($d->real_ar_bulanini / $isipcs_ar);
          $real_ar_sampaibulanini = floor($d->real_ar_sampaibulanini / $isipcs_ar);
          if ($d->ar_tahun == 0) {
            $ach_ar_tahun = 0;
          } else {
            $ach_ar_tahun   = ($real_ar_tahun / $d->ar_tahun) * 100;
          }

          if ($d->ar_bulanini == 0) {
            $ach_ar_bulanini = 0;
          } else {
            $ach_ar_bulanini   = ($real_ar_bulanini / $d->ar_bulanini) * 100;
          }

          if ($d->ar_sampaibulanini == 0) {
            $ach_ar_sampaibulanini = 0;
          } else {
            $ach_ar_sampaibulanini   = ($real_ar_sampaibulanini / $d->ar_sampaibulanini) * 100;
          }

          if ($real_ar_tahun > $d->ar_tahun) {
            $sisa_ar = 0;
          } else {
            $sisa_ar = $d->ar_tahun - $real_ar_tahun;
          }

          if ($real_ar_bulanini > $d->ar_bulanini) {
            $sisabulanini_ar = 0;
          } else {
            $sisabulanini_ar = $d->ar_bulanini - $real_ar_bulanini;
          }

          if ($real_ar_sampaibulanini > $d->ar_sampaibulanini) {
            $sisasampaibulanini_ar = 0;
          } else {
            $sisasampaibulanini_ar = $d->ar_sampaibulanini - $real_ar_sampaibulanini;
          }


          //AS
          $real_as_tahun = floor($d->real_as_tahun / $isipcs_as);
          $real_as_bulanini = floor($d->real_as_bulanini / $isipcs_as);
          $real_as_sampaibulanini = floor($d->real_as_sampaibulanini / $isipcs_as);
          if ($d->as_tahun == 0) {
            $ach_as_tahun = 0;
          } else {
            $ach_as_tahun   = ($real_as_tahun / $d->as_tahun) * 100;
          }

          if ($d->as_bulanini == 0) {
            $ach_as_bulanini = 0;
          } else {
            $ach_as_bulanini   = ($real_as_bulanini / $d->as_bulanini) * 100;
          }

          if ($d->as_sampaibulanini == 0) {
            $ach_as_sampaibulanini = 0;
          } else {
            $ach_as_sampaibulanini   = ($real_as_sampaibulanini / $d->as_sampaibulanini) * 100;
          }

          if ($real_as_tahun > $d->as_tahun) {
            $sisa_as = 0;
          } else {
            $sisa_as = $d->as_tahun - $real_as_tahun;
          }

          if ($real_as_bulanini > $d->as_bulanini) {
            $sisabulanini_as = 0;
          } else {
            $sisabulanini_as = $d->as_bulanini - $real_as_bulanini;
          }

          if ($real_as_sampaibulanini > $d->as_sampaibulanini) {
            $sisasampaibulanini_as = 0;
          } else {
            $sisasampaibulanini_as = $d->as_sampaibulanini - $real_as_sampaibulanini;
          }

          //BB
          $real_bb_tahun = floor($d->real_bb_tahun / $isipcs_bb);
          $real_bb_bulanini = floor($d->real_bb_bulanini / $isipcs_bb);
          $real_bb_sampaibulanini = floor($d->real_bb_sampaibulanini / $isipcs_bb);
          if ($d->bb_tahun == 0) {
            $ach_bb_tahun = 0;
          } else {
            $ach_bb_tahun   = ($real_bb_tahun / $d->bb_tahun) * 100;
          }

          if ($d->bb_bulanini == 0) {
            $ach_bb_bulanini = 0;
          } else {
            $ach_bb_bulanini   = ($real_bb_bulanini / $d->bb_bulanini) * 100;
          }

          if ($d->bb_sampaibulanini == 0) {
            $ach_bb_sampaibulanini = 0;
          } else {
            $ach_bb_sampaibulanini   = ($real_bb_sampaibulanini / $d->bb_sampaibulanini) * 100;
          }

          if ($real_bb_tahun > $d->bb_tahun) {
            $sisa_bb = 0;
          } else {
            $sisa_bb = $d->bb_tahun - $real_bb_tahun;
          }

          if ($real_bb_bulanini > $d->bb_bulanini) {
            $sisabulanini_bb = 0;
          } else {
            $sisabulanini_bb = $d->bb_bulanini - $real_bb_bulanini;
          }

          if ($real_bb_sampaibulanini > $d->bb_sampaibulanini) {
            $sisasampaibulanini_bb = 0;
          } else {
            $sisasampaibulanini_bb = $d->bb_sampaibulanini - $real_bb_sampaibulanini;
          }

          //CG
          $real_cg_tahun = floor($d->real_cg_tahun / $isipcs_cg);
          $real_cg_bulanini = floor($d->real_cg_bulanini / $isipcs_cg);
          $real_cg_sampaibulanini = floor($d->real_cg_sampaibulanini / $isipcs_cg);
          if ($d->cg_tahun == 0) {
            $ach_cg_tahun = 0;
          } else {
            $ach_cg_tahun   = ($real_cg_tahun / $d->cg_tahun) * 100;
          }

          if ($d->cg_bulanini == 0) {
            $ach_cg_bulanini = 0;
          } else {
            $ach_cg_bulanini   = ($real_cg_bulanini / $d->cg_bulanini) * 100;
          }

          if ($d->cg_sampaibulanini == 0) {
            $ach_cg_sampaibulanini = 0;
          } else {
            $ach_cg_sampaibulanini   = ($real_cg_sampaibulanini / $d->cg_sampaibulanini) * 100;
          }

          if ($real_cg_tahun > $d->cg_tahun) {
            $sisa_cg = 0;
          } else {
            $sisa_cg = $d->cg_tahun - $real_cg_tahun;
          }

          if ($real_cg_bulanini > $d->cg_bulanini) {
            $sisabulanini_cg = 0;
          } else {
            $sisabulanini_cg = $d->cg_bulanini - $real_cg_bulanini;
          }

          if ($real_cg_sampaibulanini > $d->cg_sampaibulanini) {
            $sisasampaibulanini_cg = 0;
          } else {
            $sisasampaibulanini_cg = $d->cg_sampaibulanini - $real_cg_sampaibulanini;
          }

          //CGG
          $real_cgg_tahun = floor($d->real_cgg_tahun / $isipcs_cgg);
          $real_cgg_bulanini = floor($d->real_cgg_bulanini / $isipcs_cgg);
          $real_cgg_sampaibulanini = floor($d->real_cgg_sampaibulanini / $isipcs_cgg);
          if ($d->cgg_tahun == 0) {
            $ach_cgg_tahun = 0;
          } else {
            $ach_cgg_tahun   = ($real_cgg_tahun / $d->cgg_tahun) * 100;
          }

          if ($d->cgg_bulanini == 0) {
            $ach_cgg_bulanini = 0;
          } else {
            $ach_cgg_bulanini   = ($real_cgg_bulanini / $d->cgg_bulanini) * 100;
          }

          if ($d->cgg_sampaibulanini == 0) {
            $ach_cgg_sampaibulanini = 0;
          } else {
            $ach_cgg_sampaibulanini   = ($real_cgg_sampaibulanini / $d->cgg_sampaibulanini) * 100;
          }

          if ($real_cgg_tahun > $d->cgg_tahun) {
            $sisa_cgg = 0;
          } else {
            $sisa_cgg = $d->cgg_tahun - $real_cgg_tahun;
          }

          if ($real_cgg_bulanini > $d->cgg_bulanini) {
            $sisabulanini_cgg = 0;
          } else {
            $sisabulanini_cgg = $d->cgg_bulanini - $real_cgg_bulanini;
          }

          if ($real_cgg_sampaibulanini > $d->cgg_sampaibulanini) {
            $sisasampaibulanini_cgg = 0;
          } else {
            $sisasampaibulanini_cgg = $d->cgg_sampaibulanini - $real_cgg_sampaibulanini;
          }

          //CGG
          $real_cgg_tahun = floor($d->real_cgg_tahun / $isipcs_cgg);
          $real_cgg_bulanini = floor($d->real_cgg_bulanini / $isipcs_cgg);
          $real_cgg_sampaibulanini = floor($d->real_cgg_sampaibulanini / $isipcs_cgg);
          if ($d->cgg_tahun == 0) {
            $ach_cgg_tahun = 0;
          } else {
            $ach_cgg_tahun   = ($real_cgg_tahun / $d->cgg_tahun) * 100;
          }

          if ($d->cgg_bulanini == 0) {
            $ach_cgg_bulanini = 0;
          } else {
            $ach_cgg_bulanini   = ($real_cgg_bulanini / $d->cgg_bulanini) * 100;
          }

          if ($d->cgg_sampaibulanini == 0) {
            $ach_cgg_sampaibulanini = 0;
          } else {
            $ach_cgg_sampaibulanini   = ($real_cgg_sampaibulanini / $d->cgg_sampaibulanini) * 100;
          }

          if ($real_cgg_tahun > $d->cgg_tahun) {
            $sisa_cgg = 0;
          } else {
            $sisa_cgg = $d->cgg_tahun - $real_cgg_tahun;
          }

          if ($real_cgg_bulanini > $d->cgg_bulanini) {
            $sisabulanini_cgg = 0;
          } else {
            $sisabulanini_cgg = $d->cgg_bulanini - $real_cgg_bulanini;
          }

          if ($real_cgg_sampaibulanini > $d->cgg_sampaibulanini) {
            $sisasampaibulanini_cgg = 0;
          } else {
            $sisasampaibulanini_cgg = $d->cgg_sampaibulanini - $real_cgg_sampaibulanini;
          }

          //DEP
          $real_dep_tahun = floor($d->real_dep_tahun / $isipcs_dep);
          $real_dep_bulanini = floor($d->real_dep_bulanini / $isipcs_dep);
          $real_dep_sampaibulanini = floor($d->real_dep_sampaibulanini / $isipcs_dep);
          if ($d->dep_tahun == 0) {
            $ach_dep_tahun = 0;
          } else {
            $ach_dep_tahun   = ($real_dep_tahun / $d->dep_tahun) * 100;
          }

          if ($d->dep_bulanini == 0) {
            $ach_dep_bulanini = 0;
          } else {
            $ach_dep_bulanini   = ($real_dep_bulanini / $d->dep_bulanini) * 100;
          }

          if ($d->dep_sampaibulanini == 0) {
            $ach_dep_sampaibulanini = 0;
          } else {
            $ach_dep_sampaibulanini   = ($real_dep_sampaibulanini / $d->dep_sampaibulanini) * 100;
          }

          if ($real_dep_tahun > $d->dep_tahun) {
            $sisa_dep = 0;
          } else {
            $sisa_dep = $d->dep_tahun - $real_dep_tahun;
          }

          if ($real_dep_bulanini > $d->dep_bulanini) {
            $sisabulanini_dep = 0;
          } else {
            $sisabulanini_dep = $d->dep_bulanini - $real_dep_bulanini;
          }

          if ($real_dep_sampaibulanini > $d->dep_sampaibulanini) {
            $sisasampaibulanini_dep = 0;
          } else {
            $sisasampaibulanini_dep = $d->dep_sampaibulanini - $real_dep_sampaibulanini;
          }

          //DS
          $real_ds_tahun = floor($d->real_ds_tahun / $isipcs_ds);
          $real_ds_bulanini = floor($d->real_ds_bulanini / $isipcs_ds);
          $real_ds_sampaibulanini = floor($d->real_ds_sampaibulanini / $isipcs_ds);
          if ($d->ds_tahun == 0) {
            $ach_ds_tahun = 0;
          } else {
            $ach_ds_tahun   = ($real_ds_tahun / $d->ds_tahun) * 100;
          }

          if ($d->ds_bulanini == 0) {
            $ach_ds_bulanini = 0;
          } else {
            $ach_ds_bulanini   = ($real_ds_bulanini / $d->ds_bulanini) * 100;
          }

          if ($d->ds_sampaibulanini == 0) {
            $ach_ds_sampaibulanini = 0;
          } else {
            $ach_ds_sampaibulanini   = ($real_ds_sampaibulanini / $d->ds_sampaibulanini) * 100;
          }

          if ($real_ds_tahun > $d->ds_tahun) {
            $sisa_ds = 0;
          } else {
            $sisa_ds = $d->ds_tahun - $real_ds_tahun;
          }

          if ($real_ds_bulanini > $d->ds_bulanini) {
            $sisabulanini_ds = 0;
          } else {
            $sisabulanini_ds = $d->ds_bulanini - $real_ds_bulanini;
          }

          if ($real_ds_sampaibulanini > $d->ds_sampaibulanini) {
            $sisasampaibulanini_ds = 0;
          } else {
            $sisasampaibulanini_ds = $d->ds_sampaibulanini - $real_ds_sampaibulanini;
          }

          //SP

          $real_sp_tahun = floor($d->real_sp_tahun / $isipcs_sp);
          $real_sp_bulanini = floor($d->real_sp_bulanini / $isipcs_sp);
          $real_sp_sampaibulanini = floor($d->real_sp_sampaibulanini / $isipcs_sp);
          if ($d->sp_tahun == 0) {
            $ach_sp_tahun = 0;
          } else {
            $ach_sp_tahun   = ($real_sp_tahun / $d->sp_tahun) * 100;
          }

          if ($d->sp_bulanini == 0) {
            $ach_sp_bulanini = 0;
          } else {
            $ach_sp_bulanini   = ($real_sp_bulanini / $d->sp_bulanini) * 100;
          }

          if ($d->sp_sampaibulanini == 0) {
            $ach_sp_sampaibulanini = 0;
          } else {
            $ach_sp_sampaibulanini   = ($real_sp_sampaibulanini / $d->sp_sampaibulanini) * 100;
          }

          if ($real_sp_tahun > $d->sp_tahun) {
            $sisa_sp = 0;
          } else {
            $sisa_sp = $d->sp_tahun - $real_sp_tahun;
          }

          if ($real_sp_bulanini > $d->sp_bulanini) {
            $sisabulanini_sp = 0;
          } else {
            $sisabulanini_sp = $d->sp_bulanini - $real_sp_bulanini;
          }

          if ($real_sp_sampaibulanini > $d->sp_sampaibulanini) {
            $sisasampaibulanini_sp = 0;
          } else {
            $sisasampaibulanini_sp = $d->sp_sampaibulanini - $real_sp_sampaibulanini;
          }

        ?>
          <tr>
            <td class="fixed-side" scope="col"><?php echo $no; ?></td>
            <td class="fixed-side" scope="col"><?php echo strtoupper($d->nama_karyawan); ?></td>
            <td align="right"><?php echo uang($d->ab_tahun); ?></td>
            <td align="right"><?php echo uang($real_ab_tahun); ?></td>
            <td align="right"><?php echo persentase($ach_ab_tahun); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisa_ab); ?></td>
            <td align="right"><?php echo uang($d->ab_bulanini); ?></td>
            <td align="right"><?php echo uang($real_ab_bulanini); ?></td>
            <td align="right"><?php echo persentase($ach_ab_bulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisabulanini_ab); ?></td>
            <td align="right"><?php echo uang($d->ab_sampaibulanini); ?></td>
            <td align="right"><?php echo uang($real_ab_sampaibulanini); ?></td>
            <td align="right"><?php echo persentase($ach_ab_sampaibulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisasampaibulanini_ab); ?></td>


            <td align="right"><?php echo uang($d->ar_tahun); ?></td>
            <td align="right"><?php echo uang($real_ar_tahun); ?></td>
            <td align="right"><?php echo persentase($ach_ar_tahun); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisa_ar); ?></td>
            <td align="right"><?php echo uang($d->ar_bulanini); ?></td>
            <td align="right"><?php echo uang($real_ar_bulanini); ?></td>
            <td align="right"><?php echo persentase($ach_ar_bulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisabulanini_ar); ?></td>
            <td align="right"><?php echo uang($d->ar_sampaibulanini); ?></td>
            <td align="right"><?php echo uang($real_ar_sampaibulanini); ?></td>
            <td align="right"><?php echo persentase($ach_ar_sampaibulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisasampaibulanini_ar); ?></td>

            <td align="right"><?php echo uang($d->as_tahun); ?></td>
            <td align="right"><?php echo uang($real_as_tahun); ?></td>
            <td align="right"><?php echo persentase($ach_as_tahun); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisa_as); ?></td>
            <td align="right"><?php echo uang($d->as_bulanini); ?></td>
            <td align="right"><?php echo uang($real_as_bulanini); ?></td>
            <td align="right"><?php echo persentase($ach_as_bulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisabulanini_as); ?></td>
            <td align="right"><?php echo uang($d->as_sampaibulanini); ?></td>
            <td align="right"><?php echo uang($real_as_sampaibulanini); ?></td>
            <td align="right"><?php echo persentase($ach_as_sampaibulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisasampaibulanini_as); ?></td>

            <td align="right"><?php echo uang($d->bb_tahun); ?></td>
            <td align="right"><?php echo uang($real_bb_tahun); ?></td>
            <td align="right"><?php echo persentase($ach_bb_tahun); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisa_bb); ?></td>
            <td align="right"><?php echo uang($d->bb_bulanini); ?></td>
            <td align="right"><?php echo uang($real_bb_bulanini); ?></td>
            <td align="right"><?php echo persentase($ach_bb_bulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisabulanini_bb); ?></td>
            <td align="right"><?php echo uang($d->bb_sampaibulanini); ?></td>
            <td align="right"><?php echo uang($real_bb_sampaibulanini); ?></td>
            <td align="right"><?php echo persentase($ach_bb_sampaibulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisasampaibulanini_bb); ?></td>

            <td align="right"><?php echo uang($d->cg_tahun); ?></td>
            <td align="right"><?php echo uang($real_cg_tahun); ?></td>
            <td align="right"><?php echo persentase($ach_cg_tahun); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisa_cg); ?></td>
            <td align="right"><?php echo uang($d->cg_bulanini); ?></td>
            <td align="right"><?php echo uang($real_cg_bulanini); ?></td>
            <td align="right"><?php echo persentase($ach_cg_bulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisabulanini_cg); ?></td>
            <td align="right"><?php echo uang($d->cg_sampaibulanini); ?></td>
            <td align="right"><?php echo uang($real_cg_sampaibulanini); ?></td>
            <td align="right"><?php echo persentase($ach_cg_sampaibulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisasampaibulanini_cg); ?></td>

            <td align="right"><?php echo uang($d->cgg_tahun); ?></td>
            <td align="right"><?php echo uang($real_cgg_tahun); ?></td>
            <td align="right"><?php echo persentase($ach_cgg_tahun); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisa_cgg); ?></td>
            <td align="right"><?php echo uang($d->cgg_bulanini); ?></td>
            <td align="right"><?php echo uang($real_cgg_bulanini); ?></td>
            <td align="right"><?php echo persentase($ach_cgg_bulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisabulanini_cgg); ?></td>
            <td align="right"><?php echo uang($d->cgg_sampaibulanini); ?></td>
            <td align="right"><?php echo uang($real_cgg_sampaibulanini); ?></td>
            <td align="right"><?php echo persentase($ach_cgg_sampaibulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisasampaibulanini_cgg); ?></td>

            <td align="right"><?php echo uang($d->dep_tahun); ?></td>
            <td align="right"><?php echo uang($real_dep_tahun); ?></td>
            <td align="right"><?php echo persentase($ach_dep_tahun); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisa_dep); ?></td>
            <td align="right"><?php echo uang($d->dep_bulanini); ?></td>
            <td align="right"><?php echo uang($real_dep_bulanini); ?></td>
            <td align="right"><?php echo persentase($ach_dep_bulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisabulanini_dep); ?></td>
            <td align="right"><?php echo uang($d->dep_sampaibulanini); ?></td>
            <td align="right"><?php echo uang($real_dep_sampaibulanini); ?></td>
            <td align="right"><?php echo persentase($ach_dep_sampaibulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisasampaibulanini_dep); ?></td>

            <td align="right"><?php echo uang($d->ds_tahun); ?></td>
            <td align="right"><?php echo uang($real_ds_tahun); ?></td>
            <td align="right"><?php echo persentase($ach_ds_tahun); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisa_ds); ?></td>
            <td align="right"><?php echo uang($d->ds_bulanini); ?></td>
            <td align="right"><?php echo uang($real_ds_bulanini); ?></td>
            <td align="right"><?php echo persentase($ach_ds_bulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisabulanini_ds); ?></td>
            <td align="right"><?php echo uang($d->ds_sampaibulanini); ?></td>
            <td align="right"><?php echo uang($real_ds_sampaibulanini); ?></td>
            <td align="right"><?php echo persentase($ach_ds_sampaibulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisasampaibulanini_ds); ?></td>

            <td align="right"><?php echo uang($d->sp_tahun); ?></td>
            <td align="right"><?php echo uang($real_sp_tahun); ?></td>
            <td align="right"><?php echo persentase($ach_sp_tahun); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisa_sp); ?></td>
            <td align="right"><?php echo uang($d->sp_bulanini); ?></td>
            <td align="right"><?php echo uang($real_sp_bulanini); ?></td>
            <td align="right"><?php echo persentase($ach_sp_bulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisabulanini_sp); ?></td>
            <td align="right"><?php echo uang($d->sp_sampaibulanini); ?></td>
            <td align="right"><?php echo uang($real_sp_sampaibulanini); ?></td>
            <td align="right"><?php echo persentase($ach_sp_sampaibulanini); ?></td>
            <td style="background-color: #ec8181;" align="right"><?php echo persentase($sisasampaibulanini_sp); ?></td>
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