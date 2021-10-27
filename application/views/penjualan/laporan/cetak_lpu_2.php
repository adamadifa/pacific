<?php
//error_reporting(0);
function uang($nilai)
{
    return number_format($nilai, '0', '', '.');
}
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<b style="font-size:20px; font-family:Calibri">
    LAPORAN PENERIMAAN UANG
    <br>
    <?php
    if ($cb['nama_cabang'] != "") {
        echo "PACIFIC CABANG " . strtoupper($cb['nama_cabang']);
    } else {
        echo "PACIFIC ALL CABANG";
    }
    $from = $dari;
    $end = $sampai;
    ?>
    <br>
    PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br>
</b>
<br>

<table class="datatable3" style="width:200%">
    <thead>
        <tr>
            <th colspan="<?php echo $jmlsales  + 2; ?>" style="background-color:#199291; color:white">LHP CABANG <?php echo strtoupper($cb['nama_cabang']); ?></th>
            <th style="border:none; width:5%"></th>
            <th colspan="<?php echo $jmlsales + 2; ?>" style="background-color:#199291; color:white">SETORAN SALES CABANG <?php echo strtoupper($cb['nama_cabang']); ?></th>
        </tr>
        <tr>
            <th rowspan="2">TGL</th>
            <?php
            foreach ($salesman as $s) {
            ?>
                <th><?php echo $s->nama_karyawan; ?></th>
            <?php
            }
            ?>
            <th rowspan="2">TOTAL</th>
            <th style="border:none; width:5%"></th>
            <th>TGL</th>
            <?php
            foreach ($salesman as $s) {
            ?>
                <th><?php echo $s->nama_karyawan; ?></th>
            <?php
            }
            ?>
            <th rowspan="2">TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $namaBulanlast  = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $tgl            = date('Y-m-d', strtotime(date($from) . '- 1 month'));
        $tglskrg        = explode("-", $from);
        $tgllast        = explode("-", $tgl);
        $bulanlast      = $tgllast[1] + 0;
        $tahunlast      = $tgllast[0];
        $bulanskrg      = $tglskrg[1] + 0;
        $tahunskrg      = $tglskrg[0];
        ?>
        <?php
        while (strtotime($dari) <= strtotime($sampai)) {
        ?>
            <tr style="font-size:12px">
                <td><?php echo DateToIndo2($dari); ?></td>
                <?php
                $totalsetoran = 0;
                foreach ($salesman as $s) {
                    $qsetoran     = "SELECT SUM(lhp_tunai+lhp_tagihan) as totallhp FROM setoran_penjualan WHERE tgl_lhp='$dari' AND  id_karyawan='$s->id_karyawan' GROUP BY tgl_lhp,id_karyawan";
                    $setoran      = $this->db->query($qsetoran)->row_array();
                    $setoranlhp    = $setoran['totallhp'];
                    $totalsetoran = $totalsetoran + $setoranlhp;
                ?>

                    <td style="text-align:right; font-weight:bold">
                        <?php if (!empty($setoranlhp)) {
                            echo uang($setoranlhp);
                        } ?>
                    </td>
                <?php
                }
                ?>
                <td style="text-align:right; font-weight:bold">
                    <?php if (!empty($totalsetoran)) {
                        echo uang($totalsetoran);
                    } ?>
                </td>
                <td style="border:none; width:5%"></td>
                <td><?php echo DateToIndo2($dari); ?></td>
                <?php
                $totalsetoransales = 0;
                foreach ($salesman as $s) {
                    $qsetoransales     = "SELECT SUM(setoran_kertas+setoran_logam + setoran_transfer + setoran_bg) as totalsetoransales FROM setoran_penjualan WHERE tgl_lhp='$dari' AND  id_karyawan='$s->id_karyawan' GROUP BY tgl_lhp,id_karyawan";
                    $setoransales      = $this->db->query($qsetoransales)->row_array();
                    $setoransalesman   = $setoransales['totalsetoransales'];
                    $totalsetoransales = $totalsetoransales + $setoransalesman;
                ?>

                    <td style="text-align:right; font-weight:bold">
                        <?php if (!empty($setoransalesman)) {
                            echo uang($setoransalesman);
                        } ?>
                    </td>
                <?php
                }
                ?>
                <td style="text-align:right; font-weight:bold">
                    <?php if (!empty($totalsetoransales)) {
                        echo uang($totalsetoransales);
                    } ?>
                </td>
            </tr>
        <?php
            $dari = date("Y-m-d", strtotime("+1 day", strtotime($dari))); //looping tambah 1 date
        }
        ?>
    </tbody>
    <tfoot>
        <tr style="font-size:12px; background-color:#199291; color:white">
            <td><b>TOTAL</b></td>
            <?php
            $totalallsetoran = 0;
            foreach ($salesman as $s) {
                $qallsetoran     = "SELECT SUM(lhp_tunai+lhp_tagihan) as totallhp FROM setoran_penjualan WHERE tgl_lhp BETWEEN '$from' AND '$sampai' AND id_karyawan='$s->id_karyawan' GROUP BY id_karyawan";
                $allsetoran      = $this->db->query($qallsetoran)->row_array();
                $totalallsetoran = $totalallsetoran + $allsetoran['totallhp'];
            ?>
                <td style="text-align:right; font-weight:bold"><?php if (!empty($allsetoran['totallhp'])) {
                                                                    echo uang($allsetoran['totallhp']);
                                                                } ?></td>
            <?php
            }
            ?>
            <td style="text-align:right; font-weight:bold">
                <?php if (!empty($totalallsetoran)) {
                    echo uang($totalallsetoran);
                } ?>
            </td>
            <td style="border:none; width:5%; background-color:white"></td>
            <td><b>TOTAL</b></td>
            <?php
            $totalallsetoransales = 0;
            foreach ($salesman as $s) {
                $qallsetoransales     = "SELECT SUM( IFNULL(setoran_kertas,0) + IFNULL(setoran_logam,0) + IFNULL(setoran_transfer,0) + IFNULL(setoran_bg,0) ) as totalsetoransales FROM setoran_penjualan WHERE tgl_lhp BETWEEN '$from' AND '$sampai' AND id_karyawan='$s->id_karyawan' GROUP BY id_karyawan";
                $allsetoransales      = $this->db->query($qallsetoransales)->row_array();
                $totalallsetoransales = $totalallsetoransales + $allsetoransales['totalsetoransales'];
            ?>
                <td style="text-align:right; font-weight:bold">
                    <?php if (!empty($allsetoransales['totalsetoransales'])) {
                        echo uang($allsetoransales['totalsetoransales']);
                    } ?>
                </td>
            <?php
            }
            ?>
            <td style="text-align:right; font-weight:bold">
                <?php if (!empty($totalallsetoransales)) {
                    echo uang($totalallsetoransales);
                } ?>
            </td>
        </tr>
    </tfoot>
</table>
<br>
<br>
<table class="datatable3" style="font-size:16px">
    <tr>
        <td style="font-weight:bold; background-color:yellow">PENERIMAAN LHP</td>
        <td style="text-align:right; font-weight:bold;"><?php echo uang($totalallsetoran); ?></td>
    </tr>
    <tr>
        <td style="font-weight:bold; background-color:yellow">SETORAN SALES</td>
        <td style="text-align:right; font-weight:bold;"><?php echo uang($totalallsetoransales); ?></td>
    </tr>
    <tr>
        <td style="font-weight:bold; background-color:yellow">SELISIH</td>
        <td style="text-align:right; font-weight:bold;"><?php echo uang(($totalallsetoran) - $totalallsetoransales); ?></td>
    </tr>
</table>