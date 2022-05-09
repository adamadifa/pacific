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
    if ($cb['nama_cabang'] == "PCF PUSAT") {
      echo "PACIFIC PUSAT";
    } else {
      echo "PACIFIC CABANG " . strtoupper($cb['nama_cabang']);
    }
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

<table class="datatable3" style="width:300%">
  <thead>
    <tr>
      <th colspan="<?php echo $jmlsales + 2; ?>" style="background-color:#199291; color:white">PENERIMAAN UANG DI CABANG <?php echo strtoupper($cb['nama_cabang']); ?></th>
      <th style="border:none; width:5%"></th>
      <th colspan="<?php echo $jmlbank + 2; ?>" style="background-color:#199291; color:white">PENERIMAAN UANG DIPUSAT</th>
    </tr>
    <tr>
      <th>TGL</th>
      <?php
      foreach ($salesman as $s) {
      ?>
        <th><?php echo $s->nama_karyawan; ?></th>
      <?php
      }
      ?>
      <th>TOTAL</th>
      <th style="border:none; width:5%"></th>
      <th>TGL</th>
      <?php
      foreach ($listbank as $b) {
      ?>
        <th><?php echo $b->nama_bank; ?></th>
      <?php
      }
      ?>
      <th>TOTAL</th>
    </tr>
  </thead>
  <tbody>
    <tr style="font-size:12px">
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
      <td><b>BELUM SETOR BULAN <?php echo $namaBulanlast[$bulanlast] . " " . $tahunlast; ?></b></td>
      <?php
      $totalsetoranbulanlast = 0;
      foreach ($salesman as $s) {
        $qsetoranbulanlast = "SELECT jumlah FROM belumsetor_detail
          INNER JOIN belumsetor ON belumsetor_detail.kode_saldobs = belumsetor.kode_saldobs
          WHERE bulan='$bulanlast' AND tahun='$tahunlast' AND id_karyawan='$s->id_karyawan'";
        $setoranbulanlast = $this->db->query($qsetoranbulanlast)->row_array();
        $totalsetoranbulanlast = $totalsetoranbulanlast + $setoranbulanlast['jumlah'];
      ?>
        <td style="text-align:right; color:red; font-weight:bold"><?php if (!empty($setoranbulanlast['jumlah'])) {
                                                                    echo uang($setoranbulanlast['jumlah']);
                                                                  } ?></td>
      <?php
      }
      ?>
      <td style="text-align:right; color:red; font-weight:bold"><?php if (!empty($totalsetoranbulanlast)) {
                                                                  echo uang($totalsetoranbulanlast);
                                                                } ?></td>
      <td></td>
      <td><b>UANG DISETOR BULAN <?php echo $namaBulanlast[$bulanlast] . " " . $tahunlast; ?></b></td>
      <?php
      $totalsetoranpusatlast = 0;
      foreach ($listbank as $b) {
        $qsetoranpusatlast     = "SELECT SUM(uang_kertas+uang_logam+giro+IFNULL(transfer,0)) as totalsetoranpusat FROM setoran_pusat WHERE tgl_diterimapusat<'$dari' AND bank='$b->kode_bank' AND kode_cabang='$cbg' AND status='1' AND omset_bulan ='$bulanskrg' AND omset_tahun='$tahunskrg'  GROUP BY omset_bulan,omset_tahun,bank";
        $setoranpusatlast      = $this->db->query($qsetoranpusatlast)->row_array();
        $totalsetoranpusatlast = $totalsetoranpusatlast + $setoranpusatlast['totalsetoranpusat'];
      ?>
        <td style="text-align:right; font-weight:bold">
          <?php if (!empty($setoranpusatlast['totalsetoranpusat'])) {
            echo uang($setoranpusatlast['totalsetoranpusat']);
          } ?></td>
      <?php
      }
      ?>
      <td style="text-align:right; font-weight:bold"><?php if (!empty($totalsetoranpusatlast)) {
                                                        echo uang($totalsetoranpusatlast);
                                                      } ?></td>
    </tr>
    <?php
    while (strtotime($dari) <= strtotime($sampai)) {
    ?>
      <tr style="font-size:12px">
        <td><?php echo DateToIndo2($dari); ?></td>
        <?php
        $totalsetoran = 0;
        $tglskrg = $tahunskrg . "-" . $bulanskrg . "-01";

        foreach ($salesman as $s) {
          $sampaibulanskrg =  date('Y-m-t', strtotime($tglskrg));
          if (strtotime($dari) <= strtotime($sampaibulanskrg)) {
            $qsetoran     = "SELECT SUM(lhp_tunai+lhp_tagihan) as totallhp FROM setoran_penjualan WHERE tgl_lhp='$dari' AND
          id_karyawan='$s->id_karyawan' GROUP BY tgl_lhp,id_karyawan";
            $setoran      = $this->db->query($qsetoran)->row_array();
            $setoranlhp = $setoran['totallhp'];
          } else {
            $setoranlhp = 0;
          }

          $totalsetoran = $totalsetoran + $setoranlhp;
        ?>
          <td style="text-align:right; font-weight:bold"><?php if (!empty($setoranlhp)) {
                                                            echo uang($setoranlhp);
                                                          } ?></td>
        <?php
        }
        ?>
        <td style="text-align:right; font-weight:bold"><?php if (!empty($totalsetoran)) {
                                                          echo uang($totalsetoran);
                                                        } ?></td>
        <td style="border:none; width:5%"></td>
        <td><?php echo DateToIndo2($dari); ?></td>
        <?php
        $totalsetoranpusat = 0;
        foreach ($listbank as $b) {

          $qsetoranpusat     = "SELECT SUM(uang_kertas+uang_logam+giro+IFNULL(transfer,0)) as totalsetoranpusat FROM setoran_pusat WHERE tgl_diterimapusat='$dari' AND bank='$b->kode_bank' AND kode_cabang='$cbg' AND status='1' AND omset_bulan ='$bulanskrg' AND omset_tahun='$tahunskrg'  GROUP BY tgl_diterimapusat,bank";
          $setoranpusat      = $this->db->query($qsetoranpusat)->row_array();
          $totalsetoranpusat = $totalsetoranpusat + $setoranpusat['totalsetoranpusat'];
        ?>
          <td style="text-align:right; font-weight:bold"><?php if (!empty($setoranpusat['totalsetoranpusat'])) {
                                                            echo uang($setoranpusat['totalsetoranpusat']);
                                                          } ?></td>
        <?php
        }
        ?>
        <td style="text-align:right; font-weight:bold"><?php if (!empty($totalsetoranpusat)) {
                                                          echo uang($totalsetoranpusat);
                                                        } ?></td>
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
        $qsetoranbulanlast = "SELECT jumlah FROM belumsetor_detail
          INNER JOIN belumsetor ON belumsetor_detail.kode_saldobs = belumsetor.kode_saldobs
          WHERE bulan='$bulanlast' AND tahun='$tahunlast' AND id_karyawan='$s->id_karyawan'";
        $setoranbulanlast = $this->db->query($qsetoranbulanlast)->row_array();

        $qallsetoran     = "SELECT SUM(lhp_tunai+lhp_tagihan) as totallhp FROM setoran_penjualan WHERE tgl_lhp BETWEEN '$from' AND '$sampaibulanskrg' AND id_karyawan='$s->id_karyawan' GROUP BY id_karyawan";
        $allsetoran      = $this->db->query($qallsetoran)->row_array();
        $totalallsetoran = $totalallsetoran + $allsetoran['totallhp'];
      ?>
        <td style="text-align:right; font-weight:bold"><?php if (!empty($allsetoran['totallhp'] + $setoranbulanlast['jumlah'])) {
                                                          echo uang($allsetoran['totallhp'] + $setoranbulanlast['jumlah']);
                                                        } ?></td>
      <?php
      }
      ?>
      <td style="text-align:right; font-weight:bold"><?php if (!empty($totalallsetoran + $totalsetoranbulanlast)) {
                                                        echo uang($totalallsetoran + $totalsetoranbulanlast);
                                                      } ?></td>
      <td style="border:none; width:5%; background-color:white"></td>
      <td><b>TOTAL</b></td>
      <?php
      $totalallsetoranpusat = 0;
      $totalallsetoranpusatlast = 0;
      foreach ($listbank as $b) {
        $qallsetoranpusatlast     = "SELECT SUM(uang_kertas+uang_logam+giro+IFNULL(transfer,0)) as totalsetoranpusat FROM setoran_pusat WHERE tgl_diterimapusat<'$dari' AND bank='$b->kode_bank' AND kode_cabang='$cbg' AND status='1' AND omset_bulan ='$bulanskrg' AND omset_tahun='$tahunskrg'  GROUP BY omset_bulan,omset_tahun,bank";
        $allsetoranpusatlast      = $this->db->query($qallsetoranpusatlast)->row_array();
        $totalallsetoranpusatlast = $totalallsetoranpusatlast + $allsetoranpusatlast['totalsetoranpusat'];

        // $qallsetoranpusat     = "SELECT SUM(uang_kertas+uang_logam+giro +IFNULL(transfer,0)) as totalsetoranpusat FROM setoran_pusat WHERE tgl_diterimapusat BETWEEN '$fromlast' AND '$sampai' AND bank='$b->kode_bank' AND kode_cabang='$cbg' AND status ='1' AND omset_bulan ='$bulanskrg' AND omset_tahun='$tahunskrg'  GROUP BY bank";
        // $allsetoranpusat      = $this->db->query($qallsetoranpusat)->row_array();
        // $totalallsetoranpusat = $totalallsetoranpusat + $allsetoranpusat['totalsetoranpusat'];
      ?>
        <td style="text-align:right; font-weight:bold"><?php if (!empty($allsetoranpusatlast['totalsetoranpusat'])) {
                                                          echo uang($allsetoranpusatlast['totalsetoranpusat']);
                                                        } ?></td>
      <?php
      }
      ?>
      <td style="text-align:right; font-weight:bold"><?php if (!empty($totalallsetoranpusatlast)) {
                                                        echo uang($totalallsetoranpusatlast);
                                                      } ?></td>
    </tr>
    <tr style="font-size:12px; background-color:#199291; color:white">
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
      <td><b>GM <?php echo strtoupper($namaBulanlast[$bulanlast]) . " " . $tahunlast; ?></b></td>
      <?php
      if ($bulanlast == 1) {
        $blnlast1 = 12;
        $thnlast1 = $tahunskrg - 1;
      } else {
        $blnlast1 = $bulanlast - 1;
        $thnlast1 = $tahunskrg;
      }
      $totalgmlast = 0;
      foreach ($salesman as $s) {
        $qgmlast = "SELECT giro.id_karyawan, SUM(jumlah) as jumlah
                    FROM giro
                    INNER JOIN penjualan ON giro.no_fak_penj = penjualan.no_fak_penj
                    LEFT JOIN (SELECT id_giro FROM historibayar GROUP BY id_giro) as hb
						      	ON giro.id_giro = hb.id_giro
                    WHERE 
		                giro.id_karyawan = '$s->id_karyawan' AND MONTH(tgl_giro) = '$bulanlast' AND YEAR(tgl_giro) ='$tahunlast'  AND omset_tahun='$tahunskrg' AND omset_bulan='$bulanskrg' AND penggantian IS NULL
		                OR 
		                giro.id_karyawan = '$s->id_karyawan' AND MONTH(tgl_giro) = '$blnlast1' AND YEAR(tgl_giro) ='$thnlast1'  AND omset_tahun='$tahunskrg' AND omset_bulan='$bulanskrg' AND penggantian IS NULL
		                GROUP BY id_karyawan";
        $gmlast = $this->db->query($qgmlast)->row_array();
        $totalgmlast = $totalgmlast + $gmlast['jumlah'];
      ?>
        <td style="text-align:right; font-weight:bold"><?php if (!empty($gmlast['jumlah'])) {
                                                          echo uang($gmlast['jumlah']);
                                                        } ?></td>
      <?php
      }
      ?>
      <td style="text-align:right; font-weight:bold"><?php if (!empty($totalgmlast)) {
                                                        echo uang($totalgmlast);
                                                      } ?></td>
    </tr>
    <tr style="font-size:12px; background-color:#199291; color:white">
      <?php
      $namaBulanskrg = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $tglskrg       = explode("-", $from);
      $bulanskrg     = $tglskrg[1] + 0;
      $tahunskrg     = $tglskrg[0];
      ?>
      <td><b>GM <?php echo strtoupper($namaBulanskrg[$bulanskrg]) . " " . $tahunskrg; ?></b></td>
      <?php
      $dari = $tahunskrg . "-" . $bulanskrg . "-01";
      $sampai = $tahunskrg . "-" . $bulanskrg . "-31";
      $totalgmnow = 0;

      if ($bulanskrg == 12) {
        $thnskr = $tahunskrg + 1;
        $om_bulan = "AND omset_bulan >= '1'";
        $om_tahun = "AND omset_tahun >= '$thnskr'";
      } else {
        $om_bulan = "AND omset_bulan > '$bulanskrg'";
        $om_tahun = "AND omset_tahun >= '$tahunskrg'";
      }
      foreach ($salesman as $s) {
        //echo $s->id_karyawan;
        $qgmnow  = "SELECT
          giro.id_karyawan,
          SUM(jumlah) as jumlah
        FROM
          giro
          INNER JOIN penjualan ON giro.no_fak_penj = penjualan.no_fak_penj
          LEFT JOIN (SELECT id_giro,tglbayar FROM historibayar GROUP BY id_giro,tglbayar) as hb
          ON giro.id_giro = hb.id_giro
        WHERE
          giro.id_karyawan = '$s->id_karyawan' AND
          tgl_giro >= '$dari' AND tgl_giro <= '$sampai'
          AND tglbayar IS NULL  AND omset_bulan =  '0' AND omset_tahun = ''
          OR
          giro.id_karyawan = '$s->id_karyawan' AND
          tgl_giro >= '$dari' AND tgl_giro <= '$sampai'
          AND tglbayar >=  '$end'" . $om_bulan . $om_tahun . "
          OR
          giro.id_karyawan = '$s->id_karyawan' AND
          tgl_giro >= '$dari' AND tgl_giro <= '$sampai'
          AND tglbayar IS NULL " . $om_bulan . $om_tahun . " 
          AND penggantian = 1
          GROUP BY giro.id_karyawan";
        $gmnow   = $this->db->query($qgmnow)->row_array();
        $totalgmnow = $totalgmnow + $gmnow['jumlah'];
      ?>
        <td style="text-align:right; font-weight:bold;"><?php if (!empty($gmnow['jumlah'])) {
                                                          echo uang($gmnow['jumlah']);
                                                        } ?></td>
      <?php
      }
      ?>
      <td style="text-align:right; font-weight:bold;"><?php if (!empty($totalgmnow)) {
                                                        echo uang($totalgmnow);
                                                      } ?></td>
    </tr>
    <tr style="font-size:12px; background-color:#199291; color:white">
      <td><b>UANG BELUM DI SETOR</b></td>
      <?php
      $totaltr = 0;
      foreach ($salesman as $s) {
        $qtr = "SELECT belumsetor_detail.id_karyawan, SUM(jumlah) as jumlah
          FROM belumsetor_detail
          INNER JOIN belumsetor ON belumsetor_detail.kode_saldobs = belumsetor.kode_saldobs
          WHERE bulan ='$bulanskrg' AND tahun ='$tahunskrg' AND id_karyawan='$s->id_karyawan'";
        $tr = $this->db->query($qtr)->row_array();
        $totaltr = $totaltr + $tr['jumlah'];
      ?>
        <td style="text-align:right; font-weight:bold; "><?php if (!empty($tr['jumlah'])) {
                                                            echo uang($tr['jumlah']);
                                                          } ?></td>
      <?php
      }
      ?>
      <td style="text-align:right; font-weight:bold;"><?php if (!empty($totaltr)) {
                                                        echo uang($totaltr);
                                                      } ?></td>
    </tr>
    <tr style="font-size:12px; background-color:#199291; color:white">
      <td><b>TOTAL</b></td>
      <?php
      $dari = $tahunskrg . "-" . $bulanskrg . "-01";
      $sampai = $tahunskrg . "-" . $bulanskrg . "-31";
      $grandall     = 0;
      $grandtotal   = 0;
      if ($bulanskrg == 12) {
        $thnskr = $tahunskrg + 1;
        $om_bulan = "AND omset_bulan >= '1'";
        $om_tahun = "AND omset_tahun >= '$thnskr'";
      } else {
        $om_bulan = "AND omset_bulan > '$bulanskrg'";
        $om_tahun = "AND omset_tahun >= '$tahunskrg'";
      }

      if ($bulanlast == 1) {
        $blnlast1 = 12;
        $thnlast1 = $tahunskrg - 1;
      } else {
        $blnlast1 = $bulanlast - 1;
        $thnlast1 = $tahunskrg;
      }
      foreach ($salesman as $s) {

        $qsetoranbulanlast = "SELECT jumlah FROM belumsetor_detail
          INNER JOIN belumsetor ON belumsetor_detail.kode_saldobs = belumsetor.kode_saldobs
          WHERE bulan='$bulanlast' AND tahun='$tahunlast' AND id_karyawan='$s->id_karyawan'";
        $setoranbulanlast = $this->db->query($qsetoranbulanlast)->row_array();

        $qallsetoran = "SELECT SUM(lhp_tunai+lhp_tagihan) as totallhp FROM setoran_penjualan WHERE tgl_lhp BETWEEN '$from' AND '$sampai' AND id_karyawan='$s->id_karyawan' GROUP BY id_karyawan";
        $allsetoran  = $this->db->query($qallsetoran)->row_array();

        $qgmlast    = "SELECT giro.id_karyawan, SUM(jumlah) as jumlah
                    FROM giro
                    INNER JOIN penjualan ON giro.no_fak_penj = penjualan.no_fak_penj
                    LEFT JOIN (SELECT id_giro FROM historibayar GROUP BY id_giro) as hb
						      	ON giro.id_giro = hb.id_giro
                    WHERE 
		                giro.id_karyawan = '$s->id_karyawan' AND MONTH(tgl_giro) = '$bulanlast' AND YEAR(tgl_giro) ='$tahunlast'  AND omset_tahun='$tahunskrg' AND omset_bulan='$bulanskrg' AND penggantian IS NULL
		                OR 
		                giro.id_karyawan = '$s->id_karyawan' AND MONTH(tgl_giro) = '$blnlast1' AND YEAR(tgl_giro) ='$thnlast1'  AND omset_tahun='$tahunskrg' AND omset_bulan='$bulanskrg' AND penggantian IS NULL
		                GROUP BY id_karyawan";
        $gmlast = $this->db->query($qgmlast)->row_array();

        $qgmnow = "SELECT
          giro.id_karyawan,
          SUM(jumlah) as jumlah
        FROM
          giro
          INNER JOIN penjualan ON giro.no_fak_penj = penjualan.no_fak_penj
          LEFT JOIN (SELECT id_giro,tglbayar FROM historibayar GROUP BY id_giro,tglbayar) as hb
          ON giro.id_giro = hb.id_giro
        WHERE
          giro.id_karyawan = '$s->id_karyawan' AND
          tgl_giro >= '$dari' AND tgl_giro <= '$sampai'
          AND tglbayar IS NULL AND omset_bulan =  '0' AND omset_tahun = ''
          OR
          giro.id_karyawan = '$s->id_karyawan' AND
          tgl_giro >= '$dari' AND tgl_giro <= '$sampai'
          AND tglbayar >=  '$end' " . $om_bulan . $om_tahun . "
          OR
          giro.id_karyawan = '$s->id_karyawan' AND
          tgl_giro >= '$dari' AND tgl_giro <= '$sampai'
          AND tglbayar IS NULL " . $om_bulan . $om_tahun . "
          AND penggantian = 1
          GROUP BY giro.id_karyawan";
        $gmnow = $this->db->query($qgmnow)->row_array();

        $qtr = "SELECT belumsetor_detail.id_karyawan, SUM(jumlah) as jumlah
          FROM belumsetor_detail
          INNER JOIN belumsetor ON belumsetor_detail.kode_saldobs = belumsetor.kode_saldobs
          WHERE bulan ='$bulanskrg' AND tahun ='$tahunskrg' AND id_karyawan='$s->id_karyawan'";
        $tr = $this->db->query($qtr)->row_array();


        $grandall   = $allsetoran['totallhp'] + $setoranbulanlast['jumlah'] + $gmlast['jumlah'] - $tr['jumlah'] - $gmnow['jumlah'];
        $grandtotal = $grandtotal + $grandall;
      ?>
        <td style="text-align:right; font-weight:bold;"><?php if (!empty($grandall)) {
                                                          echo uang($grandall);
                                                        } ?></td>
      <?php
      }
      ?>
      <td style="text-align:right; font-weight:bold;"><?php if (!empty($grandtotal)) {
                                                        echo uang($grandtotal);
                                                      } ?></td>
    </tr>
  </tfoot>
</table>
<br>
<br>
<table class="datatable3" style="font-size:16px">
  <tr>
    <td style="font-weight:bold; background-color:yellow">PENERIMAAN UANG DI CABANG BULAN INI</td>
    <td style="text-align:right; font-weight:bold;"><?php echo uang($grandtotal); ?></td>
  </tr>
  <tr>
    <td style="font-weight:bold; background-color:yellow">PENERIMAAN UANG DI PUSAT BULAN INI</td>
    <td style="text-align:right; font-weight:bold;"><?php echo uang($totalallsetoranpusatlast); ?></td>
  </tr>
  <tr>
    <td style="font-weight:bold; background-color:yellow">SELISIH</td>
    <td style="text-align:right; font-weight:bold;"><?php echo uang(($grandtotal) - $totalallsetoranpusatlast); ?></td>
  </tr>
</table>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>