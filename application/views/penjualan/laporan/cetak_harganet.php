<?php
error_reporting(0);
function uang($nilai)
{
  return number_format($nilai, '0', '', '.');
}

?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:18px; font-family:Calibri">
  <br>
  HARGA NET<br>
  PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br>
</b>
<br>
<br>
<table class="datatable3">
  <tr>
    <th rowspan="2">KETERANGAN</th>
    <th colspan="11">NAMA PRODUK</th>
  </tr>
  <tr>
    <th>AIDA BESAR 500 GR</th>
    <th>AIDA RENTENG</th>
    <th>AIDA SEDANG 250 GR</th>
    <th>SAOS BAWANG BALL</th>
    <th>SAOS BAWANG BALL PROMO</th>
    <th>CABE GILING KG</th>
    <th>CABE GILING MURAH</th>
    <th>CABE GILING 5KG</th>
    <th>SAUS EXTRA PEDAS</th>
    <th>SAUS STICK</th>
    <th>SAUS PREMIUM</th>
  </tr>
  <tr style="font-size:14px;">
    <td>PENJUALAN BRUTO</td>
    <td align="right"><?php echo number_format($harganet['bruto_AB'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['bruto_AR'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['bruto_AS'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['bruto_BB'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['bruto_BBP'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['bruto_CG'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['bruto_CGG'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['bruto_CG5'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['bruto_DEP'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['bruto_DS'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['bruto_SP'], '0', '', '.'); ?></td>
  </tr>
  <tr style="font-size:14px;">
    <td>DISKON QTY / PRODUK</td>
    <td align="right"><?php echo number_format($harganet['diskon_AB'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['diskon_AR'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['diskon_AS'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['diskon_BB'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['diskon_BBP'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['diskon_CG'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['diskon_CGG'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['diskon_CG5'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['diskon_DEP'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['diskon_DS'], '0', '', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['diskon_SP'], '0', '', '.'); ?></td>
  </tr>
  <tr style="font-size:14px;">
    <td>PENJUALAN QTY DUS</td>
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

      if ($p->kode_produk == "BBP") {
        $isipcs_bbp = $p->isipcsdus;
      }

      if ($p->kode_produk == "CG") {
        $isipcs_cg = $p->isipcsdus;
      }

      if ($p->kode_produk == "CGG") {
        $isipcs_cgg = $p->isipcsdus;
      }

      if ($p->kode_produk == "CG5") {
        $isipcs_cg5 = $p->isipcsdus;
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
    ?>
    <td align="right"><?php echo number_format($harganet['qty_AB'] / $isipcs_ab, '2', ',', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['qty_AR'] / $isipcs_ar, '2', ',', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['qty_AS'] / $isipcs_as, '2', ',', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['qty_BB'] / $isipcs_bb, '2', ',', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['qty_BBP'] / $isipcs_bbp, '2', ',', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['qty_CG'] / $isipcs_cg, '2', ',', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['qty_CGG'] / $isipcs_cgg, '2', ',', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['qty_CG5'] / $isipcs_cg5, '2', ',', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['qty_DEP'] / $isipcs_dep, '2', ',', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['qty_DS'] / $isipcs_ds, '2', ',', '.'); ?></td>
    <td align="right"><?php echo number_format($harganet['qty_SP'] / $isipcs_sp, '2', ',', '.'); ?></td>
  </tr>
</table>