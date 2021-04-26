<?php
function uang($nilai)
{

  return number_format($nilai, '0', '', '.');
}

function persentase($nilai)
{

  return number_format($nilai, '2', ',', '.');
}
?>
<table class="table table-bordered table-striped table-hover">
  <thead class="thead-dark">
    <tr style="text-align: center;">
      <th rowspan="2">#</th>
      <th rowspan="2">Produk</th>
      <th colspan="5">Per Bulan</th>
      <th colspan="5">Sampai Dengan Bulan</th>
    </tr>
    <tr>
      <th>Real <?php echo $tahunlalu; ?></th>
      <th>Target</th>
      <th>Real <?php echo $tahunini; ?></th>
      <th>Ach %</th>
      <th>Grw %</th>
      <th>Real <?php echo $tahunlalu; ?></th>
      <th>Target</th>
      <th>Real <?php echo $tahunini; ?></th>
      <th>Ach %</th>
      <th>Grw %</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;
    foreach ($dppp as $d) {
      $realisasi_bulanini_tahunlalu = floor($d->realisasi_bulanini_tahunlalu / $d->isipcsdus);
      $realisasi_bulanini_tahunini = floor($d->realisasi_bulanini_tahunini / $d->isipcsdus);
      $realisasi_sampaibulanini_tahunlalu = floor($d->realisasi_sampaibulanini_tahunlalu / $d->isipcsdus);
      $realisasi_sampaibulanini_tahunini = floor($d->realisasi_sampaibulanini_tahunini / $d->isipcsdus);
      if (!empty($d->jmltarget)) {
        $ach_bulanini = ($realisasi_bulanini_tahunini / $d->jmltarget) * 100;
      } else {
        $ach_bulanini = 0;
      }

      if (!empty($d->jmltarget_sampaibulanini)) {
        $ach_sampaibulanini = ($realisasi_sampaibulanini_tahunini / $d->jmltarget_sampaibulanini) * 100;
      } else {
        $ach_sampaibulanini = 0;
      }

      if (!empty($realisasi_bulanini_tahunlalu)) {
        $grw_bulanini = ($realisasi_bulanini_tahunini / $realisasi_bulanini_tahunlalu) * 100;
      } else {
        $grw_bulanini = 0;
      }

      if (!empty($realisasi_sampaibulanini_tahunlalu)) {
        $grw_sampaibulanini = ($realisasi_sampaibulanini_tahunini / $realisasi_sampaibulanini_tahunlalu) * 100;
      } else {
        $grw_sampaibulanini = 0;
      }
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $d->kode_produk; ?></td>
        <td align="right">
          <?php if (!empty($realisasi_bulanini_tahunlalu)) {
            echo uang($realisasi_bulanini_tahunlalu);
          } ?>
        </td>
        <td align="right">
          <?php if (!empty($d->jmltarget)) {
            echo uang($d->jmltarget);
          } ?>
        </td>
        <td align="right">
          <?php if (!empty($realisasi_bulanini_tahunini)) {
            echo uang($realisasi_bulanini_tahunini);
          } ?>
        </td>
        <td align="right">
          <?php if (!empty($ach_bulanini)) {
            echo persentase($ach_bulanini);
          } ?>
        </td>
        <td align="right">
          <?php if (!empty($grw_bulanini)) {
            echo persentase($grw_bulanini);
          } ?>
        </td>
        <td align="right">
          <?php if (!empty($realisasi_sampaibulanini_tahunlalu)) {
            echo uang($realisasi_sampaibulanini_tahunlalu);
          } ?>
        </td>
        <td align="right">
          <?php if (!empty($d->jmltarget_sampaibulanini)) {
            echo uang($d->jmltarget_sampaibulanini);
          } ?>
        </td>
        <td align="right">
          <?php if (!empty($realisasi_sampaibulanini_tahunini)) {
            echo uang($realisasi_sampaibulanini_tahunini);
          } ?>
        </td>
        <td align="right">
          <?php if (!empty($ach_sampaibulanini)) {
            echo persentase($ach_sampaibulanini);
          } ?>
        </td>
        <td align="right">
          <?php if (!empty($grw_sampaibulanini)) {
            echo persentase($grw_sampaibulanini);
          } ?>
        </td>
      </tr>
    <?php $no++;
    } ?>
  </tbody>
</table>