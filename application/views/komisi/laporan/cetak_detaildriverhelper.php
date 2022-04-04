<?php
error_reporting(0);
function formatnumber($nilai)
{

    return number_format($nilai, '2', ',', '.');
}

function formatnumber2($nilai)
{

    return number_format($nilai, '0', ',', '.');
}
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<b style="font-size:16px; font-family:Calibri">
    LAPORAN DETAIL QTY DRIVER & HELPER<br>
    PERIODE BULAN <?= $bulan[$bln]; ?> TAHUN <?= $tahun; ?><br>
    <?php
    if ($driverhelper['kategori'] == 'DRIVER') {
    ?>
        NAMA DRIVER : <?php echo $driverhelper['nama_driver_helper']; ?>
    <?php } else { ?>
        NAMA HELPER : <?php echo $driverhelper['nama_driver_helper']; ?>
    <?php } ?>
    <br>
    CABANG <?= $driverhelper['kode_cabang']; ?>
</b>
<table class="datatable3">
    <thead>
        <tr bgcolor="#024a75" style="color:white; font-size:14px;">
            <th>NO</th>
            <th>NO.DPB</th>
            <th>TGL PENGAMBILAN</th>
            <th>NO. KENDARAAN</th>
            <th>TUJUAN</th>
            <th>SALESMAN</th>
            <th>JUMLAH PENJUALAN</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $totalpenjualan = 0;
        foreach ($detail as $d) {
            $totalpenjualan += $d->jml_penjualan;
        ?>
            <tr style="font-size:14px">
                <td><?php echo $no; ?></td>
                <td><?php echo $d->no_dpb; ?></td>
                <td><?php echo DateToIndo2($d->tgl_pengambilan); ?></td>
                <td><?php echo $d->no_kendaraan; ?></td>
                <td><?php echo $d->tujuan; ?></td>
                <td><?php echo $d->nama_karyawan; ?></td>
                <td align="center"><?php echo formatnumber($d->jml_penjualan); ?></td>
            </tr>
        <?php
            $no++;
        } ?>
        <tr bgcolor="#024a75" style="color:white; font-size:14px;">
            <th colspan="6">TOTAL</th>
            <th align="center"><?php echo formatnumber($totalpenjualan); ?></th>
        </tr>
    </tbody>
</table>