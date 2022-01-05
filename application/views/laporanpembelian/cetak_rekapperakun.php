<?php
error_reporting(0);
function uang($nilai)
{
  return number_format($nilai, '2', ',', '.');
}
function angka($nilai)
{
  return number_format($nilai, '2', ',', '.');
}
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:14px; font-family:Calibri">
  REKAP PEMBELIAN <?php if ($ppn === "1") {
                    echo "(PPN)";
                  } else if ($ppn === "0") {
                    echo "(Non PPN)";
                  } ?> PER AKUN <br>
  PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br>
</b>
<br>
<br>
<table class="datatable3" style="width:70%" border="1">
  <thead bgcolor="#024a75" style="color:white; font-size:12;">
    <tr bgcolor="#024a75" style="color:white; font-size:12; text-align:center">
      <td>KODE AKUN</td>
      <td>NAMA AKUN</td>
      <td>TOTAL DEBET</td>
      <td>TOTAL KREDIT</td>
    </tr>
  </thead>
  <tbody>
    <?php
    $totalkredit   = 0;
    $totaldebet    = 0;
    $no            = 1;
    foreach ($pmb as $key => $d) {
      if ($d->status == 'PNJ') {
        $debet      = $d->jurnaldebet;
        $kredit     = $d->total + $d->jurnalkredit;
      } else {
        $debet      = $d->total + $d->jurnaldebet;
        $kredit     = $d->jurnalkredit;
      }
      $totaldebet += $debet;
      $totalkredit += $kredit;

    ?>
      <tr style="background-color:<?php echo $bgcolor; ?>">
        <td><?php echo "'" . $d->kode_akun; ?></td>
        <td><?php echo $d->nama_akun; ?></td>
        <td align="right"><?php if (!empty($debet)) {
                            echo uang($debet);
                          } ?></td>
        <td align="right"><?php if (!empty($kredit)) {
                            echo uang($kredit);
                          } ?></td>
      </tr>
    <?php
      $no++;
    }
    ?>
    <?php
    $query = "SELECT 
    jurnal_koreksi.kode_akun,nama_akun,
    SUM(IF(status_dk='D',(jurnal_koreksi.qty*jurnal_koreksi.harga),0)) as jurnaldebet,
    SUM(IF(status_dk='K',(jurnal_koreksi.qty*jurnal_koreksi.harga),0)) as jurnalkredit,
    pmb,
    pnj
    FROM jurnal_koreksi
    INNER JOIN coa ON coa.kode_akun=jurnal_koreksi.kode_akun
    LEFT JOIN(
      SELECT pembelian.kode_akun,
      SUM(IF( STATUS = 'PMB',( detail_pembelian.qty * detail_pembelian.harga ) + penyesuaian, 0 )) AS pmb,
      SUM(IF( STATUS = 'PNJ',( detail_pembelian.qty * detail_pembelian.harga ) + penyesuaian, 0 )) AS pnj
      FROM pembelian
      INNER JOIN detail_pembelian ON pembelian.nobukti_pembelian=detail_pembelian.nobukti_pembelian
      WHERE tgl_pembelian BETWEEN '$dari' AND '$sampai'
      GROUP BY kode_akun
      ) dp ON (dp.kode_akun=jurnal_koreksi.kode_akun)
    WHERE tgl_jurnalkoreksi BETWEEN '$dari' AND '$sampai' 
    GROUP BY kode_akun,nama_akun,pnj,pmb
 ";
    $data = $this->db->query($query)->result();
    $totalkredits   = 0;
    $totaldebets    = 0;
    $no            = 1;
    foreach ($data as $key => $s) {

      
        if ($s->status == 'PNJ') {
          $debets      = $s->pmb - $s->pnj + $s->jurnaldebet;
          $kredits     = $s->jurnalkredit;
        } else {
          $kredits     = $s->pmb - $s->pnj + $s->jurnalkredit;
          $debets      = $s->jurnaldebet;
        }
        $totaldebets += $debets;
        $totalkredits += $kredits;
      
     
    ?>
      <tr style="background-color:<?php echo $bgcolor; ?>">
        <td><?php echo "'" . $s->kode_akun; ?></td>
        <td><?php echo $s->nama_akun; ?></td>
        <td align="right"><?php if (!empty($debets)) {
                            echo uang($debets);
                          } ?></td>
        <td align="right"><?php if (!empty($kredits)) {
                            echo uang($kredits);
                          } ?></td>
      </tr>
    <?php } ?>
    <tr bgcolor="#024a75" style="color:white">
      <td colspan="2"><b>TOTAL</b></td>
      <td align="right"><b><?php echo uang($totaldebet + $totaldebets); ?></b></td>
      <td align="right"><b><?php echo uang($totalkredit + $totalkredits); ?></b></td>
    </tr>
  </tbody>

</table>