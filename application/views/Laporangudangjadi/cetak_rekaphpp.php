<?php
function uang($nilai)
{
  return number_format($nilai, '2', ',', '.');
}
$namabulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
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
<b style="font-size:20px; font-family:Calibri">
  REKAPITULASI PERSEDIAAN BARANG JADI<br>
  BULAN <?php echo $namabulan[$bulan] . " " . $tahun; ?>
</b>
<br>
<div id="table-scroll" class="table-scroll">
  <div class="table-wrap">
    <table class="datatable3" style="width:150%" margin-bottom: 30px" border="1">
      <thead bgcolor="#024a75" style="color:white; font-size:18px">
        <tr>
          <th rowspan="3" class="fixed-side" scope="col" style="background-color:#024a75 ;">NO</th>
          <th rowspan="3" class="fixed-side" scope="col" style="background-color:#024a75 ;">PRODUK</th>
          <th colspan="27" bgcolor="#024a75">CABANG</th>
        </tr>
        <tr style="background-color: #03b058;">
          <th colspan="3">TASIKMALAYA</th>
          <th colspan="3">BANDUNG</th>
          <th colspan="3">BOGOR</th>
          <th colspan="3">SUKABUMI</th>
          <th colspan="3">TEGAL</th>
          <th colspan="3">PURWOKETO</th>
          <th colspan="3">SURABAYA</th>
          <th colspan="3">SEMARANG</th>
          <th colspan="3">KLATEN</th>
        </tr>
        <tr style="background-color: #03b058;">
          <th>QTY</th>
          <th>HARGA</th>
          <th>JUMLAH</th>
          <th>QTY</th>
          <th>HARGA</th>
          <th>JUMLAH</th>
          <th>QTY</th>
          <th>HARGA</th>
          <th>JUMLAH</th>
          <th>QTY</th>
          <th>HARGA</th>
          <th>JUMLAH</th>
          <th>QTY</th>
          <th>HARGA</th>
          <th>JUMLAH</th>
          <th>QTY</th>
          <th>HARGA</th>
          <th>JUMLAH</th>
          <th>QTY</th>
          <th>HARGA</th>
          <th>JUMLAH</th>
          <th>QTY</th>
          <th>HARGA</th>
          <th>JUMLAH</th>
          <th>QTY</th>
          <th>HARGA</th>
          <th>JUMLAH</th>
        </tr>
      </thead>
      <tbody style="font-size:14px;">
        <?php $no = 1;
        foreach ($rekaphpp as $d) {
          $qtytsm = ($d->sa_tsm + $d->mutasi_tsm) / $d->isipcsdus;
          $qtybdg = ($d->sa_bdg + $d->mutasi_bdg) / $d->isipcsdus;
          $qtybgr = ($d->sa_bgr + $d->mutasi_bgr) / $d->isipcsdus;
          $qtyskb = ($d->sa_skb + $d->mutasi_skb) / $d->isipcsdus;
          $qtytgl = ($d->sa_tgl + $d->mutasi_tgl) / $d->isipcsdus;
          $qtypwt = ($d->sa_pwt + $d->mutasi_pwt) / $d->isipcsdus;
          $qtysby = ($d->sa_sby + $d->mutasi_sby) / $d->isipcsdus;
          $qtysmr = ($d->sa_smr + $d->mutasi_smr) / $d->isipcsdus;
          $qtyklt = ($d->sa_klt + $d->mutasi_klt) / $d->isipcsdus;
        ?>
          <tr>
            <td class="fixed-side" scope="col"><?php echo $no; ?></td>
            <td class="fixed-side" scope="col"><?php echo $d->nama_barang; ?></td>
            <td align="right"><?php echo number_format($qtytsm, '2', ',', '.'); ?></td>
            <td></td>
            <td></td>
            <td align="right"><?php echo number_format($qtybdg, '2', ',', '.'); ?></td>
            <td></td>
            <td></td>
            <td align="right"><?php echo number_format($qtybgr, '2', ',', '.'); ?></td>
            <td></td>
            <td></td>
            <td align="right"><?php echo number_format($qtyskb, '2', ',', '.'); ?></td>
            <td></td>
            <td></td>
            <td align="right"><?php echo number_format($qtytgl, '2', ',', '.'); ?></td>
            <td></td>
            <td></td>
            <td align="right"><?php echo number_format($qtypwt, '2', ',', '.'); ?></td>
            <td></td>
            <td></td>
            <td align="right"><?php echo number_format($qtysby, '2', ',', '.'); ?></td>
            <td></td>
            <td></td>
            <td align="right"><?php echo number_format($qtysmr, '2', ',', '.'); ?></td>
            <td></td>
            <td></td>
            <td align="right"><?php echo number_format($qtyklt, '2', ',', '.'); ?></td>
            <td></td>
            <td></td>
          </tr>
        <?php $no++;
        } ?>
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