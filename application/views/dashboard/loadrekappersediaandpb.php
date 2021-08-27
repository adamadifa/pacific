<?php
function uang($nilai)
{
  return number_format($nilai, '2', ',', '.');
}

$hariini = date("Y-m-d");


?>
<div class="table-responsive">

  <table class="table">
    <thead class="">
      <tr>
        <th>Nama Cabang</th>
        <th>AB</th>
        <th>AR</th>
        <th>AS</th>
        <th>BB</th>
        <th>BBP</th>
        <th>CG</th>
        <th>CG5</th>
        <th>CGG</th>
        <th>DEP</th>
        <th>DK</th>
        <th>DS</th>
        <th>SP</th>
        <th>SPP</th>
      </tr>
    </thead>

    <?php
    $gAB = 0;
    $gAR = 0;
    $gAS = 0;
    $gBB = 0;
    $gBBP = 0;
    $gCG = 0;
    $gCG5 = 0;
    $gCGG = 0;
    $gDEP = 0;
    $gDK = 0;
    $gDS = 0;
    $gSP = 0;
    $gSPP = 0;
    foreach ($rekap as $g) {

      if ($g->kode_produk == "AB") {
        $gAB = $gAB + $g->saldoakhir;
      }

      if ($g->kode_produk == "AR") {
        $gAR = $gAR + $g->saldoakhir;
      }

      if ($g->kode_produk == "AS") {
        $gAS = $gAS + $g->saldoakhir;
      }

      if ($g->kode_produk == "BB") {
        $gBB = $gBB + $g->saldoakhir;
      }

      if ($g->kode_produk == "BBP") {
        $gBBP = $gBBP + $g->saldoakhir;
      }

      if ($g->kode_produk == "CG") {
        $gCG = $gCG + $g->saldoakhir;
      }

      if ($g->kode_produk == "CG5") {
        $gCG = $gCG + $g->saldoakhir;
      }

      if ($g->kode_produk == "CGG") {
        $gCGG = $gCGG + $g->saldoakhir;
      }

      if ($g->kode_produk == "DEP") {
        $gDEP = $gDEP + $g->saldoakhir;
      }

      if ($g->kode_produk == "DK") {
        $gDK = $gDK + $g->saldoakhir;
      }

      if ($g->kode_produk == "DS") {
        $gDS = $gDS + $g->saldoakhir;
      }

      if ($g->kode_produk == "SP") {
        $gSP =  $gSP + $g->saldoakhir;
      }

      if ($g->kode_produk == "SPP") {
        $gSPP =  $gSPP + $g->saldoakhir;
      }
    }

    if ($gAB <= 0) {
      $colorgAB = "bg-red";
    } else {
      $colorgAB = "bg-green";
    }

    if ($gAS <= 0) {
      $colorgAS = "bg-red";
    } else {
      $colorgAS = "bg-green";
    }

    if ($gAR <= 0) {
      $colorgAR = "bg-red";
    } else {
      $colorgAR = "bg-green";
    }

    if ($gAS <= 0) {
      $colorgAS = "bg-red";
    } else {
      $colorgAS = "bg-green";
    }

    if ($gBB <= 0) {
      $colorgBB = "bg-red";
    } else {
      $colorgBB = "bg-green";
    }

    if ($gBBP <= 0) {
      $colorgBBP = "bg-red";
    } else {
      $colorgBBP = "bg-green";
    }

    if ($gCG <= 0) {
      $colorgCG = "bg-red";
    } else {
      $colorgCG = "bg-green";
    }

    if ($gCG5 <= 0) {
      $colorgCG5 = "bg-red";
    } else {
      $colorgCG5 = "bg-green";
    }

    if ($gCGG <= 0) {
      $colorgCGG = "bg-red";
    } else {
      $colorgCGG = "bg-green";
    }

    if ($gDEP <= 0) {
      $colorgDEP = "bg-red";
    } else {
      $colorgDEP = "bg-green";
    }

    if ($gDK <= 0) {
      $colorgDK = "bg-red";
    } else {
      $colorgDK = "bg-green";
    }

    if ($gDS <= 0) {
      $colorgDS = "bg-red";
    } else {
      $colorgDS = "bg-green";
    }

    if ($gSP <= 0) {
      $colorgSP = "bg-red";
    } else {
      $colorgSP = "bg-green";
    }

    if ($gSPP <= 0) {
      $colorgSPP = "bg-red";
    } else {
      $colorgSPP = "bg-green";
    }
    ?>
    <tr>
      <td>GUDANG PUSAT</td>
      <td><span class="badge <?php echo $colorgAB; ?>"><?php echo number_format(floor($gAB), '0', ',', '.'); ?></span></td>
      <td><span class="badge <?php echo $colorgAR; ?>"><?php echo number_format(floor($gAR), '0', ',', '.'); ?></span></td>
      <td><span class="badge <?php echo $colorgAS; ?>"><?php echo number_format(floor($gAS), '0', ',', '.'); ?></span></td>
      <td><span class="badge <?php echo $colorgBB; ?>"><?php echo number_format(floor($gBB), '0', ',', '.'); ?></span></td>
      <td><span class="badge <?php echo $colorgBBP; ?>"><?php echo number_format(floor($gBBP), '0', ',', '.'); ?></span></td>
      <td><span class="badge <?php echo $colorgCG; ?>"><?php echo number_format(floor($gCG), '0', ',', '.'); ?></span></td>
      <td><span class="badge <?php echo $colorgCG5; ?>"><?php echo number_format(floor($gCG5), '0', ',', '.'); ?></span></td>
      <td><span class="badge <?php echo $colorgCGG; ?>"><?php echo number_format(floor($gCGG), '0', ',', '.'); ?></span></td>
      <td><span class="badge <?php echo $colorgDEP; ?>"><?php echo number_format(floor($gDEP), '0', ',', '.'); ?></span></td>
      <td><span class="badge <?php echo $colorgDK; ?>"><?php echo number_format(floor($gDK), '0', ',', '.'); ?></span></td>
      <td><span class="badge <?php echo $colorgDS; ?>"><?php echo number_format(floor($gDS), '0', ',', '.'); ?></span></td>
      <td><span class="badge <?php echo $colorgSP; ?>"><?php echo number_format(floor($gSP), '0', ',', '.'); ?></span></td>
      <td><span class="badge <?php echo $colorgSPP; ?>"><?php echo number_format(floor($gSPP), '0', ',', '.'); ?></span></td>
    </tr>
    <?php
    foreach ($saldo as $r) {
      $ab = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='AB' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $ar = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='AR' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $as = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='AS' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $bb = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='BB' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $bbp = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='BBP' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $cg = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='CG' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $cg5 = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='CG5' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $cgg = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='CGG' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $db = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='DB' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $dep = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='DEP' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $dk = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='DK' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $ds = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='DS' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $sp = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='SP' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();

      $spp = $this->db->query("SELECT tanggal,kode_produk,jumlah FROM saldoawal_bj_detail saldodetail
    INNER JOIN saldoawal_bj ON saldodetail.kode_saldoawal = saldoawal_bj.kode_saldoawal 
    WHERE kode_cabang ='$r->kode_cabang' AND kode_produk='SPP' AND status='GS' ORDER BY tanggal DESC LIMIT 1")->row_array();


      $msjab = $this->db->query("SELECT 
   SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
   SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
   FROM `detail_mutasi_gudang_cabang` 
   JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
   WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'AB' 
   AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
   AND `jenis_mutasi` = 'SURAT JALAN' 
   OR `jenis_mutasi` = 'TRANSIT OUT' 
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'AB' 
   AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
   OR `jenis_mutasi` = 'TRANSIT IN'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'AB' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
   OR `jenis_mutasi` = 'REJECT GUDANG'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'AB' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
   OR `jenis_mutasi` = 'REJECT PASAR'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'AB' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
   OR `jenis_mutasi` = 'REPACK'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'AB' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
   OR `jenis_mutasi` = 'PENYESUAIAN'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'AB' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
   ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();

      $dpbambilab = $this->db->query("SELECT
   TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali  
   FROM
   `detail_dpb`
   JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
  WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
   AND `kode_produk` = 'AB' AND kode_cabang='$r->kode_cabang'")->row_array();





      $msjar = $this->db->query("SELECT 
   SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
   SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
   FROM `detail_mutasi_gudang_cabang` 
   JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
   WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'AR' 
   AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
   AND `jenis_mutasi` = 'SURAT JALAN' 
   OR `jenis_mutasi` = 'TRANSIT OUT' 
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'AR' 
   AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
   OR `jenis_mutasi` = 'TRANSIT IN'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'AR' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
   OR `jenis_mutasi` = 'REJECT GUDANG'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'AR' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
   OR `jenis_mutasi` = 'REJECT PASAR'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'AR' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
   OR `jenis_mutasi` = 'REPACK'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'AR' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
   OR `jenis_mutasi` = 'PENYESUAIAN'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'AR' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
   ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();

      $dpbambilar = $this->db->query("SELECT
   TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali   
   FROM
   `detail_dpb`
   JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
  WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
   AND `kode_produk` = 'AR' AND kode_cabang='$r->kode_cabang'")->row_array();





      $msjas = $this->db->query("SELECT 
  SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
  SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
  FROM `detail_mutasi_gudang_cabang` 
  JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
  WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'AS' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  AND `jenis_mutasi` = 'SURAT JALAN' 
  OR `jenis_mutasi` = 'TRANSIT OUT' 
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'AS' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'TRANSIT IN'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'AS' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'REJECT GUDANG'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'AS' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REJECT PASAR'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'AS' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REPACK'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'AS' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'PENYESUAIAN'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'AS' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();

      $dpbambilas = $this->db->query("SELECT
  TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali   
  FROM
  `detail_dpb`
  JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
  WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
  AND `kode_produk` = 'AS' AND kode_cabang='$r->kode_cabang'")->row_array();




      $msjbb = $this->db->query("SELECT 
  SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
  SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
  FROM `detail_mutasi_gudang_cabang` 
  JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
  WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'BB' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  AND `jenis_mutasi` = 'SURAT JALAN' 
  OR `jenis_mutasi` = 'TRANSIT OUT' 
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'BB' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'TRANSIT IN'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'BB' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'REJECT GUDANG'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'BB' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REJECT PASAR'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'BB' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REPACK'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'BB' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'PENYESUAIAN'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'BB' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();


      $dpbambilbb = $this->db->query("SELECT
  TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali   
  FROM
  `detail_dpb`
  JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
  WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
  AND `kode_produk` = 'BB' AND kode_cabang='$r->kode_cabang'")->row_array();

      $msjbbp = $this->db->query("SELECT 
  SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
  SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
  FROM `detail_mutasi_gudang_cabang` 
  JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
  WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'BBP' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  AND `jenis_mutasi` = 'SURAT JALAN' 
  OR `jenis_mutasi` = 'TRANSIT OUT' 
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'BBP' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'TRANSIT IN'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'BBP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'REJECT GUDANG'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'BBP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REJECT PASAR'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'BBP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REPACK'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'BBP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'PENYESUAIAN'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'BBP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();


      $dpbambilbbp = $this->db->query("SELECT
  TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali   
  FROM
  `detail_dpb`
  JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
  WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
  AND `kode_produk` = 'BBP' AND kode_cabang='$r->kode_cabang'")->row_array();



      $msjcg = $this->db->query("SELECT 
  SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
  SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
  FROM `detail_mutasi_gudang_cabang` 
  JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
  WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'CG' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  AND `jenis_mutasi` = 'SURAT JALAN' 
  OR `jenis_mutasi` = 'TRANSIT OUT' 
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'CG' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'TRANSIT IN'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'CG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'REJECT GUDANG'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'CG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REJECT PASAR'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'CG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REPACK'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'CG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'PENYESUAIAN'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'CG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();

      $dpbambilcg = $this->db->query("SELECT
  TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali   
  FROM
  `detail_dpb`
  JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
  WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
  AND `kode_produk` = 'CG' AND kode_cabang='$r->kode_cabang'")->row_array();




      $msjcg = $this->db->query("SELECT 
SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
FROM `detail_mutasi_gudang_cabang` 
JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'CG' 
AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
AND `jenis_mutasi` = 'SURAT JALAN' 
OR `jenis_mutasi` = 'TRANSIT OUT' 
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'CG' 
AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
OR `jenis_mutasi` = 'TRANSIT IN'  
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
'CG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
OR `jenis_mutasi` = 'REJECT GUDANG'  
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
'CG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
OR `jenis_mutasi` = 'REJECT PASAR'  
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
'CG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
OR `jenis_mutasi` = 'REPACK'  
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
'CG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
OR `jenis_mutasi` = 'PENYESUAIAN'  
 AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
 'CG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();

      $dpbambilcg = $this->db->query("SELECT
TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali   
FROM
`detail_dpb`
JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
AND `kode_produk` = 'CG' AND kode_cabang='$r->kode_cabang'")->row_array();



      $msjcgg = $this->db->query("SELECT 
  SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
  SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
  FROM `detail_mutasi_gudang_cabang` 
  JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
  WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'CGG' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  AND `jenis_mutasi` = 'SURAT JALAN' 
  OR `jenis_mutasi` = 'TRANSIT OUT' 
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'CGG' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'TRANSIT IN'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'CGG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'REJECT GUDANG'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'CGG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REJECT PASAR'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'CGG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REPACK'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'CGG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'PENYESUAIAN'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'CGG' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();

      $dpbambilcgg = $this->db->query("SELECT
  TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali   
  FROM
  `detail_dpb`
  JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
  WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
  AND `kode_produk` = 'CGG' AND kode_cabang='$r->kode_cabang'")->row_array();




      $msjdep = $this->db->query("SELECT 
  SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
  SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
  FROM `detail_mutasi_gudang_cabang` 
  JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
  WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'DEP' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  AND `jenis_mutasi` = 'SURAT JALAN' 
  OR `jenis_mutasi` = 'TRANSIT OUT' 
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'DEP' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'TRANSIT IN'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'DEP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'REJECT GUDANG'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'DEP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REJECT PASAR'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'DEP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REPACK'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'DEP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'PENYESUAIAN'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'DEP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();

      $dpbambildep = $this->db->query("SELECT
  TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali   
  FROM
  `detail_dpb`
  JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
  WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
  AND `kode_produk` = 'DEP' AND kode_cabang='$r->kode_cabang'")->row_array();




      $msjdk = $this->db->query("SELECT 
  SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
  SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
  FROM `detail_mutasi_gudang_cabang` 
  JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
  WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'DK' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  AND `jenis_mutasi` = 'SURAT JALAN' 
  OR `jenis_mutasi` = 'TRANSIT OUT' 
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'DK' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'TRANSIT IN'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'DK' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'REJECT GUDANG'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'DK' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REJECT PASAR'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'DK' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REPACK'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'DK' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'PENYESUAIAN'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'DK' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();

      $dpbambildk = $this->db->query("SELECT
  TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali   
  FROM
  `detail_dpb`
  JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
  WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
  AND `kode_produk` = 'DK' AND kode_cabang='$r->kode_cabang'")->row_array();




      $msjds = $this->db->query("SELECT 
  SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
  SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
  FROM `detail_mutasi_gudang_cabang` 
  JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
  WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'DS' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  AND `jenis_mutasi` = 'SURAT JALAN' 
  OR `jenis_mutasi` = 'TRANSIT OUT' 
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'DS' 
  AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'TRANSIT IN'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'DS' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
  OR `jenis_mutasi` = 'REJECT GUDANG'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'DS' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REJECT PASAR'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'DS' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'REPACK'  
  AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
  'DS' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  OR `jenis_mutasi` = 'PENYESUAIAN'  
   AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
   'DS' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
  ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();

      $dpbambilds = $this->db->query("SELECT
  TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali   
  FROM
  `detail_dpb`
  JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
  WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
  AND `kode_produk` = 'DS' AND kode_cabang='$r->kode_cabang'")->row_array();



      $msjsp = $this->db->query("SELECT 
SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
FROM `detail_mutasi_gudang_cabang` 
JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'SP' 
AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
AND `jenis_mutasi` = 'SURAT JALAN' 
OR `jenis_mutasi` = 'TRANSIT OUT' 
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'SP' 
AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
OR `jenis_mutasi` = 'TRANSIT IN'  
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
'SP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
OR `jenis_mutasi` = 'REJECT GUDANG'  
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
'SP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
OR `jenis_mutasi` = 'REJECT PASAR'  
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
'SP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
OR `jenis_mutasi` = 'REPACK'  
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
'SP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
OR `jenis_mutasi` = 'PENYESUAIAN'  
 AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
 'SP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();

      $dpbambilsp = $this->db->query("SELECT
TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali   
FROM
`detail_dpb`
JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
AND `kode_produk` = 'SP' AND kode_cabang='$r->kode_cabang'")->row_array();


      $msjspp = $this->db->query("SELECT 
SUM(IF(inout_good ='IN' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini'  ,jumlah,0))-
SUM(IF(inout_good ='OUT' AND tgl_mutasi_gudang_cabang >= '$ab[tanggal]' AND tgl_mutasi_gudang_cabang <= '$hariini' ,jumlah,0)) as jumlah
FROM `detail_mutasi_gudang_cabang` 
JOIN `mutasi_gudang_cabang` ON `detail_mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`=`mutasi_gudang_cabang`.`no_mutasi_gudang_cabang`  
WHERE `detail_mutasi_gudang_cabang`.`kode_produk` = 'SPP' 
AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
AND `jenis_mutasi` = 'SURAT JALAN' 
OR `jenis_mutasi` = 'TRANSIT OUT' 
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 'SPP' 
AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
OR `jenis_mutasi` = 'TRANSIT IN'  
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
'SPP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang'
OR `jenis_mutasi` = 'REJECT GUDANG'  
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
'SPP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
OR `jenis_mutasi` = 'REJECT PASAR'  
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
'SPP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
OR `jenis_mutasi` = 'REPACK'  
AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
'SPP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
OR `jenis_mutasi` = 'PENYESUAIAN'  
 AND `detail_mutasi_gudang_cabang`.`kode_produk` = 
 'SPP' AND `mutasi_gudang_cabang`.`kode_cabang` = '$r->kode_cabang' 
ORDER BY `tgl_mutasi_gudang_cabang` ASC")->row_array();

      $dpbambilspp = $this->db->query("SELECT
TRUNCATE(SUM(jml_pengambilan),2) as jumlah,TRUNCATE(SUM(jml_pengembalian),2) as jumlah_kembali   
FROM
`detail_dpb`
JOIN `dpb` ON `detail_dpb`.`no_dpb` = `dpb`.`no_dpb`
WHERE tgl_pengambilan >= '$ab[tanggal]' AND tgl_pengambilan <= '$hariini'
AND `kode_produk` = 'SPP' AND kode_cabang='$r->kode_cabang'")->row_array();




      $sab = ($ab['jumlah'] / 30) + ($msjab['jumlah'] / 30) - $dpbambilab['jumlah'] + $dpbambilab['jumlah_kembali'];
      $sar = ($ar['jumlah'] / 240) + ($msjar['jumlah'] / 240) - $dpbambilar['jumlah'] + $dpbambilar['jumlah_kembali'];
      $sas = ($as['jumlah'] / 36) + ($msjas['jumlah'] / 36) - $dpbambilas['jumlah'] + $dpbambilas['jumlah_kembali'];
      $sbb = ($bb['jumlah'] / 20) + ($msjbb['jumlah'] / 20) - $dpbambilbb['jumlah'] + $dpbambilbb['jumlah_kembali'];
      $sbbp = ($bbp['jumlah'] / 20) + ($msjbbp['jumlah'] / 20) - $dpbambilbbp['jumlah'] + $dpbambilbbp['jumlah_kembali'];
      $scg  = ($cg['jumlah'] / 10) + ($msjcg['jumlah'] / 10) - $dpbambilcg['jumlah'] + $dpbambilcg['jumlah_kembali'];
      $scg5  = ($cg5['jumlah'] / 10) + ($msjcg5['jumlah'] / 10) - $dpbambilcg5['jumlah'] + $dpbambilcg5['jumlah_kembali'];
      $scgg = ($cgg['jumlah'] / 10) + ($msjcgg['jumlah'] / 10) - $dpbambilcgg['jumlah'] + $dpbambilcgg['jumlah_kembali'];

      $sdep = ($dep['jumlah'] / 20) + ($msjdep['jumlah'] / 20) - $dpbambildep['jumlah'] + $dpbambildep['jumlah_kembali'];
      $sdk  = ($dk['jumlah'] / 30) + ($msjdk['jumlah'] / 30) - $dpbambildk['jumlah'] + $dpbambildk['jumlah_kembali'];
      $sds  = ($ds['jumlah'] / 504) + ($msjds['jumlah'] / 504) - $dpbambilds['jumlah'] + $dpbambilds['jumlah_kembali'];
      $ssp  = ($sp['jumlah'] / 12) + ($msjsp['jumlah'] / 12) - $dpbambilsp['jumlah'] + $dpbambilsp['jumlah_kembali'];
      $sspp  = ($spp['jumlah'] / 1) + ($msjspp['jumlah'] / 1) - $dpbambilspp['jumlah'] + $dpbambilspp['jumlah_kembali'];

      if ($sab <= 0) {
        $colorab = "bg-red";
      } else {
        $colorab = "bg-green";
      }

      if ($sar <= 0) {
        $colorar = "bg-red";
      } else {
        $colorar = "bg-green";
      }

      if ($sas <= 0) {
        $coloras = "bg-red";
      } else {
        $coloras = "bg-green";
      }

      if ($sbb <= 0) {
        $colorbb = "bg-red";
      } else {
        $colorbb = "bg-green";
      }

      if ($sbbp <= 0) {
        $colorbbp = "bg-red";
      } else {
        $colorbbp = "bg-green";
      }

      if ($scg <= 0) {
        $colorcg = "bg-red";
      } else {
        $colorcg = "bg-green";
      }

      if ($scg5 <= 0) {
        $colorcg5 = "bg-red";
      } else {
        $colorcg5 = "bg-green";
      }

      if ($scgg <= 0) {
        $colorcgg = "bg-red";
      } else {
        $colorcgg = "bg-green";
      }



      if ($sdep <= 0) {
        $colorsdep = "bg-red";
      } else {
        $colorsdep = "bg-green";
      }

      if ($sdk <= 0) {
        $colorsdk = "bg-red";
      } else {
        $colorsdk = "bg-green";
      }

      if ($sds <= 0) {
        $colorsds = "bg-red";
      } else {
        $colorsds = "bg-green";
      }

      if ($ssp <= 0) {
        $colorssp = "bg-red";
      } else {
        $colorssp = "bg-green";
      }

      if ($sspp <= 0) {
        $colorsspp = "bg-red";
      } else {
        $colorsspp = "bg-green";
      }


    ?>
      <tr>
        <td><?php echo strtoupper($r->nama_cabang); ?></td>
        <td><span class="badge <?php echo $colorab; ?>"><?php echo number_format(floor($sab), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorar; ?>"><?php echo number_format(floor($sar), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $coloras; ?>"><?php echo number_format(floor($sas), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorbb; ?>"><?php echo number_format(floor($sbb), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorbbp; ?>"><?php echo number_format(floor($sbbp), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorcg; ?>"><?php echo number_format(floor($scg), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorcg5; ?>"><?php echo number_format(floor($scg5), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorcgg; ?>"><?php echo number_format(floor($scgg), '0', ',', '.'); ?></span></td>

        <td><span class="badge <?php echo $colorsdep; ?>"><?php echo number_format(floor($sdep), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorsdk; ?>"><?php echo number_format(floor($sdk), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorsds; ?>"><?php echo number_format(floor($sds), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorssp; ?>"><?php echo number_format(floor($ssp), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorsspp; ?>"><?php echo number_format(floor($sspp), '0', ',', '.'); ?></span></td>
        <!-- <td><span class="badge <?php echo $colorsspp; ?>">Sedang Maintenance</span></td> -->
      </tr>
    <?php } ?>
  </table>
</div>