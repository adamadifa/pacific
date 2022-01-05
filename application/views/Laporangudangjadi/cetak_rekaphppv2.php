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
        <table class="datatable3" style="width:300%" margin-bottom: 30px" border="1">
            <thead bgcolor="#024a75" style="color:white; font-size:16px">
                <tr>
                    <th rowspan="3" class="fixed-side" scope="col" style="background-color:#024a75 ;">NO</th>
                    <th rowspan="3" class="fixed-side" scope="col" style="background-color:#024a75 ;">PRODUK</th>
                    <th colspan="3" rowspan="2" style="background-color:#024a75 ;">SALDO AWAL</th>
                    <th colspan="21" style="background-color:#31a501 ;">PENERIMAAN</th>
                    <th colspan="27" style="background-color:#961a06 ;">PENGELUARAN</th>
                    <th colspan="3" rowspan="2" style="background-color:#31a501 ;">SALDO AKHIR</th>
                </tr>
                <tr>
                    <th colspan="3" style="background-color:#31a501 ;">PRODUKSI</th>
                    <th colspan="3" style="background-color:#31a501 ;">PUSAT</th>
                    <th colspan="3" style="background-color:#31a501 ;">REPACK</th>
                    <th colspan="3" style="background-color:#31a501 ;">TRANSIT IN</th>
                    <th colspan="3" style="background-color:#31a501 ;">RETUR</th>
                    <th colspan="3" style="background-color:#31a501 ;">PENYESUAIAN</th>
                    <th colspan="3" style="background-color:#31a501 ;">LAIN LAIN</th>
                    <th colspan="3" style="background-color:#961a06 ;">KIRIM CABANG</th>
                    <th colspan="3" style="background-color:#961a06 ;">PENJUALAN</th>
                    <th colspan="3" style="background-color:#961a06 ;">PROMOSI</th>
                    <th colspan="3" style="background-color:#961a06 ;">REJECT PASAR</th>
                    <th colspan="3" style="background-color:#961a06 ;">REJECT MOBIL</th>
                    <th colspan="3" style="background-color:#961a06 ;">REJECT GUDANG</th>
                    <th colspan="3" style="background-color:#961a06 ;">TRANSIT OUT</th>
                    <th colspan="3" style="background-color:#961a06 ;">PENYESUAIAN</th>
                    <th colspan="3" style="background-color:#961a06 ;">LAIN LAIN</th>
                </tr>
                <tr>
                    <th style="background-color:#024a75 ;">QTY</th>
                    <th style="background-color:#024a75 ;">HARGA</th>
                    <th style="background-color:#024a75 ;">JUMLAH</th>
                    <th style="background-color:#31a501 ;">QTY</th>
                    <th style="background-color:#31a501 ;">HARGA</th>
                    <th style="background-color:#31a501 ;">JUMLAH</th>
                    <th style="background-color:#31a501 ;">QTY</th>
                    <th style="background-color:#31a501 ;">HARGA</th>
                    <th style="background-color:#31a501 ;">JUMLAH</th>
                    <th style="background-color:#31a501 ;">QTY</th>
                    <th style="background-color:#31a501 ;">HARGA</th>
                    <th style="background-color:#31a501 ;">JUMLAH</th>
                    <th style="background-color:#31a501 ;">QTY</th>
                    <th style="background-color:#31a501 ;">HARGA</th>
                    <th style="background-color:#31a501 ;">JUMLAH</th>
                    <th style="background-color:#31a501 ;">QTY</th>
                    <th style="background-color:#31a501 ;">HARGA</th>
                    <th style="background-color:#31a501 ;">JUMLAH</th>
                    <th style="background-color:#31a501 ;">QTY</th>
                    <th style="background-color:#31a501 ;">HARGA</th>
                    <th style="background-color:#31a501 ;">JUMLAH</th>
                    <th style="background-color:#31a501 ;">QTY</th>
                    <th style="background-color:#31a501 ;">HARGA</th>
                    <th style="background-color:#31a501 ;">JUMLAH</th>
                    <th style="background-color:#961a06 ;">QTY</th>
                    <th style="background-color:#961a06 ;">HARGA</th>
                    <th style="background-color:#961a06 ;">JUMLAH</th>
                    <th style="background-color:#961a06 ;">QTY</th>
                    <th style="background-color:#961a06 ;">HARGA</th>
                    <th style="background-color:#961a06 ;">JUMLAH</th>
                    <th style="background-color:#961a06 ;">QTY</th>
                    <th style="background-color:#961a06 ;">HARGA</th>
                    <th style="background-color:#961a06 ;">JUMLAH</th>
                    <th style="background-color:#961a06 ;">QTY</th>
                    <th style="background-color:#961a06 ;">HARGA</th>
                    <th style="background-color:#961a06 ;">JUMLAH</th>
                    <th style="background-color:#961a06 ;">QTY</th>
                    <th style="background-color:#961a06 ;">HARGA</th>
                    <th style="background-color:#961a06 ;">JUMLAH</th>
                    <th style="background-color:#961a06 ;">QTY</th>
                    <th style="background-color:#961a06 ;">HARGA</th>
                    <th style="background-color:#961a06 ;">JUMLAH</th>
                    <th style="background-color:#961a06 ;">QTY</th>
                    <th style="background-color:#961a06 ;">HARGA</th>
                    <th style="background-color:#961a06 ;">JUMLAH</th>
                    <th style="background-color:#961a06 ;">QTY</th>
                    <th style="background-color:#961a06 ;">HARGA</th>
                    <th style="background-color:#961a06 ;">JUMLAH</th>
                    <th style="background-color:#961a06 ;">QTY</th>
                    <th style="background-color:#961a06 ;">HARGA</th>
                    <th style="background-color:#961a06 ;">JUMLAH</th>
                    <th style="background-color:#31a501 ;">QTY</th>
                    <th style="background-color:#31a501 ;">HARGA</th>
                    <th style="background-color:#31a501 ;">JUMLAH</th>
                </tr>
            </thead>
            <tbody style="font-size:12px;">
                <?php
                $no = 1;
                $totalsaldoawal = 0;
                $totalproduksi = 0;
                $totalpusat = 0;
                $totalrepack = 0;
                $totaltransit_in = 0;
                $totalretur = 0;
                $totalpenyesuaian_in = 0;
                $totallainlain_in = 0;
                $totalkirimcabang = 0;
                $totalpenjualan = 0;
                $totalpromosi = 0;
                $totalrejectpasar = 0;
                $totalrejectmobil = 0;
                $totalrejectgudang = 0;
                $totaltransit_out = 0;
                $totalpenyesuaian_out = 0;
                $totallainlain_out = 0;
                $totalsaldoakhir = 0;

                foreach ($rekaphpp as $d) {

                ?>
                    <tr>
                        <td class="fixed-side"><?php echo $no; ?></td>
                        <td class="fixed-side"><?php echo $d->nama_barang; ?></td>
                        <td align="right">
                            <?php
                            if ($d->saldoawal != 0.00) {
                                echo number_format($d->saldoawal, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->harga_awal != 0.00) {
                                echo number_format($d->harga_awal, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlsaldoawal = $d->saldoawal * $d->harga_awal;
                            if ($jmlsaldoawal != 0.00) {
                                echo number_format($jmlsaldoawal, '2', ',', '.');
                            } ?>
                        </td>

                        <td align="right">
                            <?php
                            if ($d->produksi != 0.00) {
                                echo number_format($d->produksi, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->harga_hpp != 0.00) {
                                echo number_format($d->harga_hpp, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlproduksi = $d->produksi * $d->harga_hpp;
                            if ($jmlproduksi != 0.00) {
                                echo number_format($jmlproduksi, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->pusat != 0.00) {
                                echo number_format($d->pusat, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->harga_penerimaan != 0.00) {
                                echo number_format($d->harga_penerimaan, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlpusat = $d->pusat * $d->harga_penerimaan;
                            if ($jmlpusat != 0.00) {
                                echo number_format($jmlpusat, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->repack != 0.00) {
                                echo number_format($d->repack, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->harga_penerimaan != 0.00) {
                                echo number_format($d->harga_penerimaan, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlrepack = $d->repack * $d->harga_penerimaan;
                            if ($jmlrepack != 0.00) {
                                echo number_format($jmlrepack, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->transit_in != 0.00) {
                                echo number_format($d->transit_in, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->harga_penerimaan != 0.00) {
                                echo number_format($d->harga_penerimaan, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmltransit_in = $d->transit_in * $d->harga_penerimaan;
                            if ($jmltransit_in != 0.00) {
                                echo number_format($jmltransit_in, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->retur != 0.00) {
                                echo number_format($d->retur, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->harga_penerimaan != 0.00) {
                                echo number_format($d->harga_penerimaan, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlretur = $d->retur * $d->harga_penerimaan;
                            if ($jmlretur != 0.00) {
                                echo number_format($jmlretur, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->penyesuaian_in != 0.00) {
                                echo number_format($d->penyesuaian_in, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->harga_penerimaan != 0.00) {
                                echo number_format($d->harga_penerimaan, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlpenyesuaian_in = $d->penyesuaian_in * $d->harga_penerimaan;
                            if ($jmlpenyesuaian_in != 0.00) {
                                echo number_format($jmlpenyesuaian_in, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->lainlain_in != 0.00) {
                                echo number_format($d->lainlain_in, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->harga_penerimaan != 0.00) {
                                echo number_format($d->harga_penerimaan, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmllainlain_in = $d->lainlain_in * $d->harga_penerimaan;
                            if ($jmllainlain_in != 0.00) {
                                echo number_format($jmllainlain_in, '2', ',', '.');
                            } ?>
                        </td>
                        <?php
                        $qty_penerimaan = $d->saldoawal + $d->produksi + $d->pusat + $d->repack + $d->retur + $d->penyesuaian_in + $d->lainlain_in;
                        $total_penerimaan = $jmlsaldoawal + $jmlproduksi + $jmlpusat + $jmlrepack + $jmlretur + $jmlpenyesuaian_in + $jmllainlain_in;
                        if ($qty_penerimaan != 0) {
                            $harga_pengeluaran = ROUND($total_penerimaan / $qty_penerimaan, 0);
                        } else {
                            $harga_pengeluaran = 0;
                        }
                        ?>

                        <td align="right">
                            <?php
                            if ($d->kirimcabang != 0.00) {
                                echo number_format($d->kirimcabang, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($harga_pengeluaran != 0) {
                                echo number_format($harga_pengeluaran, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlkirimcabang = $d->kirimcabang * $harga_pengeluaran;
                            if ($jmlkirimcabang != 0.00) {
                                echo number_format($jmlkirimcabang, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->penjualan != 0.00) {
                                echo number_format($d->penjualan, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($harga_pengeluaran != 0) {
                                echo number_format($harga_pengeluaran, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlpenjualan = $d->penjualan * $harga_pengeluaran;
                            if ($jmlpenjualan != 0.00) {
                                echo number_format($jmlpenjualan, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->promosi != 0.00) {
                                echo number_format($d->promosi, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($harga_pengeluaran != 0) {
                                echo number_format($harga_pengeluaran, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlpromosi = $d->promosi * $harga_pengeluaran;
                            if ($jmlpromosi != 0.00) {
                                echo number_format($jmlpromosi, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->reject_pasar != 0.00) {
                                echo number_format($d->reject_pasar, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($harga_pengeluaran != 0) {
                                echo number_format($harga_pengeluaran, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlrejectpasar = $d->reject_pasar * $harga_pengeluaran;
                            if ($jmlrejectpasar != 0.00) {
                                echo number_format($jmlrejectpasar, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->reject_mobil != 0.00) {
                                echo number_format($d->reject_mobil, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($harga_pengeluaran != 0) {
                                echo number_format($harga_pengeluaran, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlrejectmobil = $d->reject_mobil * $harga_pengeluaran;
                            if ($jmlrejectmobil != 0.00) {
                                echo number_format($jmlrejectmobil, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->reject != 0.00) {
                                echo number_format($d->reject, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($harga_pengeluaran != 0) {
                                echo number_format($harga_pengeluaran, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlreject = $d->reject * $harga_pengeluaran;
                            if ($jmlreject != 0.00) {
                                echo number_format($jmlreject, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->transit_out != 0.00) {
                                echo number_format($d->transit_out, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($harga_pengeluaran != 0) {
                                echo number_format($harga_pengeluaran, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmltransit_out = $d->transit_out * $harga_pengeluaran;
                            if ($jmltransit_out != 0.00) {
                                echo number_format($jmltransit_out, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->penyesuaian_out != 0.00) {
                                echo number_format($d->penyesuaian_out, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($harga_pengeluaran != 0) {
                                echo number_format($harga_pengeluaran, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlpenyesuaian_out = $d->penyesuaian_out * $harga_pengeluaran;
                            if ($jmlpenyesuaian_out != 0.00) {
                                echo number_format($jmlpenyesuaian_out, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->lainlain_out != 0.00) {
                                echo number_format($d->lainlain_out, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($harga_pengeluaran != 0) {
                                echo number_format($harga_pengeluaran, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmllainlain_out = $d->lainlain_out * $harga_pengeluaran;
                            if ($jmllainlain_out != 0.00) {
                                echo number_format($jmllainlain_out, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($d->saldoakhir != 0.00) {
                                echo number_format($d->saldoakhir, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            if ($harga_pengeluaran != 0) {
                                echo number_format($harga_pengeluaran, '2', ',', '.');
                            } ?>
                        </td>
                        <td align="right">
                            <?php
                            $jmlsaldokahir = $d->saldoakhir * $harga_pengeluaran;
                            if ($jmlsaldokahir != 0.00) {
                                echo number_format($jmlsaldokahir, '2', ',', '.');
                            } ?>
                        </td>
                    </tr>
                <?php
                    $totalsaldoawal += $jmlsaldoawal;
                    $totalproduksi += $jmlproduksi;
                    $totalpusat += $jmlpusat;
                    $totalrepack += $jmlrepack;
                    $totaltransit_in += $jmltransit_in;
                    $totalretur += $jmlretur;
                    $totalpenyesuaian_in += $jmlpenyesuaian_in;
                    $totallainlain_in += $jmllainlain_in;
                    $totalkirimcabang += $jmlkirimcabang;
                    $totalpenjualan += $jmlpenjualan;
                    $totalpromosi += $jmlpromosi;
                    $totalrejectpasar += $jmlrejectpasar;
                    $totalrejectmobil += $jmlrejectmobil;
                    $totalrejectgudang += $jmlreject;
                    $totaltransit_out += $jmltransit_out;
                    $totalpenyesuaian_out = $jmlpenyesuaian_out;
                    $totallainlain_out += $jmllainlain_out;
                    $totalsaldoakhir += $jmlsaldokahir;
                    $no++;
                }
                ?>
                <tr>
                    <td class="fixed-side">TOTAL</td>
                    <td colspan="3"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalsaldoawal, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalproduksi, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalpusat, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalrepack, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totaltransit_in, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalretur, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalpenyesuaian_in, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totallainlain_in, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalkirimcabang, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalpenjualan, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalpromosi, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalrejectpasar, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalrejectmobil, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalrejectgudang, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totaltransit_out, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalpenyesuaian_out, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totallainlain_out, '2', ',', '.');
                        ?>
                    </td>
                    <td colspan="2"></td>
                    <td align="right" style="font-weight: bold;">
                        <?php
                        echo number_format($totalsaldoakhir, '2', ',', '.');
                        ?>
                    </td>
                </tr>
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