
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">

<br>
<b style="font-size:14px; font-family:Calibri">
	<?php
	if ($cb['nama_cabang'] != "") {
		if ($cb['nama_cabang'] == "PCF PUSAT") {
			echo "PACIFIC PUSAT";
		}else{
			echo "PACIFIC CABANG " . strtoupper($cb['nama_cabang']);
		}
	} else {
		echo "PACIFIC ALL CABANG";
	}
	?>
	<br>
	KAS BESAR<br>
	PERIODE <?php echo DateToIndo2($dari)." s/d ".DateToIndo2($sampai); ?><br>
	<?php
		if($salesman['nama_karyawan'] != ""){
			echo "NAMA SALES : ". strtoupper($salesman['nama_karyawan']);
		}else{
			echo "ALL SALES";
		}
	?>
	<br>
	<?php
		if($pelanggan['nama_pelanggan'] != ""){
			echo "NAMA PELANGGAN : ". strtoupper($pelanggan['nama_pelanggan']);
		}
	?>
</b>
<br>
<br>
<table class="datatable3">
	<thead bgcolor="#024a75" style="color:white; font-size:12;">
		<tr bgcolor="#024a75" style="color:white; font-size:12;">
			<th rowspan="2">Tgl Pembayaran</th>
			<th rowspan="2">No Faktur</th>
			<th rowspan="2">Tgl Faktur</th>
			<th rowspan="2">Sales Faktur</th>
			<th rowspan="2">Kode Pel.</th>
			<th rowspan="2">Nama Pelanggan</th>
			<th rowspan="2">TUNAI</th>
			<th rowspan="2">TITIP BAYAR</th>
			<th rowspan="2">TAGIHAN</th>
			
			<th rowspan="2">Total</th>
			<th rowspan="2">Saldo Akhir</th>
			<th rowspan="2">Keterangan</th>
			<th rowspan="2">Tanggal Input</th>
			<th rowspan="2">Tanggal Update</th>
		</tr>
	
	</thead>
	<tbody>
	<?php
		$saldo 					= 0;
		$totaltunai 		= 0;
		$totaltitip 		= 0;
		$totalother 		= 0;
		$totalpelunasan = 0;
		$totalbayar 		= 0;
		foreach($kasbesar as $k){
			if(empty($k->status_bayar)){
				if($k->jenisbayar == "tunai"){
					$tunai 			= $k->bayar;
					$pelunasan	= 0;
					$titipan		=	0;
					$other 			=	0;
					$bayar 			= $tunai;
					$cekbg 			= "";
					$bank 			= "";
					$tglcair 		= "";
				}elseif($k->jenisbayar == "titipan"){
					$tbayar = $k->totalbayar - $k->bayarterakhir;
					$p 			= $k->bayar + $tbayar;
					if($p >= $k->totalpenjualan){
						$tunai 		= 0;
						$pelunasan= $k->bayar;
						$titipan	=	0;
						$other 		=	0;
						$bayar 		= $pelunasan;
						$cekbg 		= "";
						$bank 		= "";
						$tglcair 	= "";
					}else{
						$tunai 		= 0;
						$pelunasan= 0;
						$titipan	=	$k->bayar;
						$other 		=	0;
						$bayar 		= $titipan;
						$cekbg 		= "";
						$bank 		= "";
						$tglcair 	= "";
					}
					//echo $k->totalbayar ." = ".$k->totalpenjualan."<br>";
				}else{
					$tunai 		= 	0;
					$pelunasan	= 	0;
					$titipan	=	0;
					$other 		=	$k->bayar;
					$bayar 		=   $other;
					if($k->no_giro != ""){
						$bank 		= $k->bankgiro;
						$cekbg 		= $k->no_giro;
						$tglcair 	= DateToIndo2($k->tglbayar);
					}else{
						$cekbg 		= "TRANSFER";
						$bank 		= $k->banktransfer;
						$tglcair 	= DateToIndo2($k->tglbayar);
					}
				}

				$saldo 			= $saldo + $bayar;
				$totaltunai		= $totaltunai + $tunai;
				$totaltitip 	= $totaltitip + $titipan;
				$totalother 	= $totalother + $other;
				$totalpelunasan = $totalpelunasan + $pelunasan;
				$totalbayar 	= $totalbayar + $bayar;
		?>
			<tr>

				<td><?php echo DateToIndo2($k->tglbayar); ?></td>
				<td><?php echo $k->no_fak_penj;?></td>
				<td><?php echo DateToIndo2($k->tgltransaksi);?></td>
				<td><?php echo $k->nama_karyawan;?></td>
				<td><?php echo $k->kode_pelanggan;?></td>
				<td><?php echo $k->nama_pelanggan;?></td>
				<td style="text-align:right"><?php echo number_format($tunai,'0','','.'); ?></td>
				<td style="text-align:right"><?php echo number_format($titipan,'0','','.'); ?></td>
				<td style="text-align:right"><?php echo number_format($pelunasan,'0','','.'); ?></td>

			
				
				<td style="text-align:right"><?php echo number_format($bayar,'0','','.'); ?></td>
				<td style="text-align:right"><?php echo number_format($saldo,'0','','.'); ?></td>
				<td>
					<?php
						if($k->girotocash=="1"){

							echo "Penggantian Giro Ke Cash";
						}
					?>

				</td>
				<td><?php echo $k->date_created; ?></td>
				<td><?php echo $k->date_updated; ?></td>
			</tr>
			</tr>
		<?php
			}
		}
		?>
	</tbody>
	<tr bgcolor="#024a75" style="color:white; font-size:12;">
		<td colspan="6">TOTAL</td>
		<td style="text-align: right"><?php echo number_format($totaltunai,'0','','.');  ?></td>
		<td style="text-align: right"><?php echo number_format($totaltitip,'0','','.');  ?></td>
		<td style="text-align: right"><?php echo number_format($totalpelunasan,'0','','.');  ?></td>
	
		
		<td style="text-align: right"><?php echo number_format($totalbayar,'0','','.');  ?></td>
		<td style="text-align: right"><?php echo number_format($totalbayar,'0','','.');  ?></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>
<br>
<br>
<br>
<div>
  <h4>LIST GIRO <br> </h4>
  <table class="datatable3">

    <thead bgcolor="#024a75" style="color:white; font-size:12;">
      <tr bgcolor="#024a75" style="color:white; font-size:12;">
        <th style="padding:10px !important">Tgl Giro</th>
        <th>No Faktur</th>
        <th>Kode Pel.</th>
        <th>Nama Pelanggan</th>
        <th>No Giro</th>
        <th>Nama Bank</th>
        <th>Jumlah</th>
        <th>Jatuh tempo</th>
				<th>Status</th>
				<th>Tanggal Cair</th>
      </tr>
    </thead>
    <tbody>
      <?php
			$totalgiro = 0;
			foreach($listgiro as $g){

				if($g->status == 0){
					$status = "Pending";
					$color  = "yellow";
				}else if($g->status==1){
					$status = "Diterima";
					$color  = "Green";
				}else if($g->status==2){
					$status = "Ditolak";
					$color  = "red";
				}

				$totalgiro = $totalgiro + $g->jumlah;
			?>
      <tr>
        <td><?php echo DateToIndo2($g->tgl_giro) ?></td>
        <td><?php echo $g->no_fak_penj ?></td>
        <td><?php echo $g->kode_pelanggan ?></td>
        <td><?php echo $g->nama_pelanggan ?></td>
        <td><?php echo $g->no_giro ?></td>
        <td><?php echo $g->namabank ?></td>
        <td style="text-align:right"><?php echo number_format($g->jumlah,'0','','.'); ?></td>
        <td><?php echo DateToIndo2($g->tglcair) ?></td>
        <td style="background-color:<?php echo $color; ?>">
          <?php echo $status; ?>
				</td>
				<td><?php if(!empty($g->tglbayar)){echo DateToIndo2($g->tglbayar); } ?></td>
      </tr>
      <?php } ?>
    </tbody>
    <tfoot bgcolor="#024a75" style="color:white; font-size:12;">
      <tr>
        <th>Total</th>
        <th colspan="5"></th>
        <th style="text-align:right"><?php echo number_format($totalgiro,'0','','.'); ?></th>
        <th colspan="3"></th>

      </tr>
    </tfoot>
  </table>
  <div>
    <div>
      <h4>LIST TRANSFER <br> <br></h4>
      <table class="datatable3">
        <thead bgcolor="#024a75" style="color:white; font-size:12;">
          <tr bgcolor="#024a75" style="color:white; font-size:12;">
            <th style="padding:10px !important">Tgl Transfer</th>
            <th>No Faktur</th>
            <th>Kode Pel.</th>
            <th>Nama Pelanggan</th>
            <th>Nama Bank</th>
            <th>Jumlah</th>
            <th>Jatuh tempo</th>
						<th>Status</th>
						<th>Tanggal Cair</th>
          </tr>
        </thead>
        <tbody>
          <?php
						$totaltransfer = 0;
						foreach($listtransfer as $t){
							if($t->status == 0){
								$status = "Pending";
								$color  = "yellow";
							}else if($t->status==1){
								$status = "Diterima";
								$color  = "Green";
							}else if($t->status==2){
								$status = "Ditolak";
								$color  = "red";
							}
							$totaltransfer = $totaltransfer + $t->jumlah;
          ?>
          <tr>
            <td><?php echo DateToIndo2($t->tgl_transfer) ?></td>
            <td><?php echo $t->no_fak_penj ?></td>
            <td><?php echo $t->kode_pelanggan ?></td>
            <td><?php echo $t->nama_pelanggan ?></td>
            <td><?php echo $t->namabank ?></td>
            <td style="text-align:right"><?php echo number_format($t->jumlah,'0','','.'); ?></td>
            <td><?php echo DateToIndo2($t->tglcair) ?></td>
            <td style="background-color:<?php echo $color; ?>">
              <?php echo $status; ?>
						</td>
						<td><?php if(!empty($t->tglbayar)){echo DateToIndo2($t->tglbayar); } ?></td>
          </tr>
          <?php } ?>
        </tbody>
        <tfoot bgcolor="#024a75" style="color:white; font-size:12;">
          <tr>
            <th>Total</th>
            <th colspan="5"></th>
            <th style="text-align:right"><?php echo number_format($totaltransfer,'0','','.'); ?></th>
            <th colspan="2"></th>

          </tr>
        </tfoot>
      </table>
      <div>
    <div>
    <h4>SUMMARY </h4>
    <?php
      $totalsummary = $totaltunai + $totaltitip + $totalpelunasan+$totalgiro+$totaltransfer;
  	?>
			<table class="datatable3">
				<tr>
					<th bgcolor="#024a75" style="color:white; font-size:12; padding:5px !important">Penjualan Tunai</th>
					<td style="text-align: right; font-size:12px; font-weight:bold">
						<?php echo number_format($totaltunai,'0','','.');  ?></td>
				</tr>
				<tr>
					<th bgcolor="#024a75" style="color:white; font-size:12; padding:5px !important">Tagihan</th>
					<td style="text-align: right; font-size:12px; font-weight:bold">
						<?php echo number_format($totaltitip+$totalpelunasan,'0','','.');  ?></td>
				</tr>
				<tr>
					<th bgcolor="#024a75" style="color:white; font-size:12; padding:5px !important">Giro</th>
					<td style="text-align: right; font-size:12px; font-weight:bold">
						<?php echo number_format($totalgiro,'0','','.');  ?></td>
				</tr>
				<tr>
					<th bgcolor="#024a75" style="color:white; font-size:12; padding:5px !important">Transfer</th>
					<td style="text-align: right; font-size:12px; font-weight:bold">
						<?php echo number_format($totaltransfer,'0','','.');  ?></td>
				</tr>
				
				<tr>
					<th bgcolor="#024a75" style="color:white; font-size:12; padding:5px !important">TOTAL</th>
					<td style="background-color:green; color:white; text-align: right; font-size:12px; font-weight:bold">
						<?php echo number_format($totalsummary,'0','','.');  ?></td>
				</tr>
			</table>
    <div>
<br>
<br>
<br>

<b style="font-size:14px; font-family:Calibri">
PEMBAYARAN VOUCHER<br>
PERIODE <?php echo DateToIndo2($dari)." s/d ".DateToIndo2($sampai); ?><br>
</b>
<br>
<br>
<table class="datatable3">
	<thead bgcolor="#024a75" style="color:white; font-size:12;">
		<tr bgcolor="#024a75" style="color:white; font-size:12;">
			<th>Tanggal</th>
			<th>No Faktur</th>
			<th>Kode Pelanggan</th>
			<th>Nama Pelanggan</th>
			<th>Jumlah</th>
		</tr>
	<thead>
	<tbody>
		<?php
			$totalvoucher = 0;
			foreach ($sb as $v)
			{
				$totalvoucher = $totalvoucher + $v->bayar;
		?>
				<tr>
					<td><?php echo DateToIndo2($v->tglbayar); ?></td>
					<td><?php echo $v->no_fak_penj; ?></td>
					<td><?php echo $v->kode_pelanggan; ?></td>
					<td><?php echo $v->nama_pelanggan; ?></td>
					<td align="right"><?php echo number_format($v->bayar,'0','','.'); ?></td>
				</tr>
		<?php
			}
		?>
		<tr bgcolor="#024a75" style="color:white; font-size:12;">
			<td colspan="4">TOTAL</td>
			<td align="right"><?php echo number_format($totalvoucher,'0','','.'); ?></td>
		</tr>
	</tbody>
</table>
