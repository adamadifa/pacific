<?php


?>
<style>
	body {
		letter-spacing: 0px;
		font-family: Tahoma;
		font-size: 14px;
	}

	table {
		font-family: Tahoma;
		font-size: 14px;
	}

	.garis5,
	.garis5 td,
	.garis5 tr,
	.garis5 th {
		border: 2px solid black;
		border-collapse: collapse;
	}

	.table {
		border: solid 1px #000000;
		width: 100%;
		font-size: 12px;
		margin: auto;
	}

	.table th {
		border: 1px #000000;
		font-size: 12px;

		font-family: Arial;
	}

	.table td {
		border: solid 1px #000000;
	}
</style>

<table border="0" width="100%">
	<tr>
		<td style="width:150px">
			<table class="garis5">
				<tr>
					<td>SURAT JALAN</td>
				</tr>
				<tr>
					<td>NOMOR <?php echo $faktur['no_fak_penj'] ?></td>

				</tr>
			</table>
		</td>
		<td colspan="6" align="left">
			<b>

				<?php
				$query = "SELECT * FROM cabang WHERE kode_cabang ='$faktur[kode_cabang]'";
				$cabang = $this->db->query($query)->row_array();
				?>
				<b>
					<?php
					$query = "SELECT * FROM cabang WHERE kode_cabang ='$faktur[kode_cabang]'";
					$cabang = $this->db->query($query)->row_array();
					?>
					<?php if ($faktur['kode_pelanggan'] == 'PST-00008' || $faktur['kode_pelanggan'] == 'PST-00007' || $faktur['kode_pelanggan'] == 'TSM-00466' || $faktur['kode_pelanggan'] == 'TSM-02234' || $faktur['kode_pelanggan'] == 'TSM-01117' || $faktur['kode_pelanggan'] == 'TSM-00493' || $faktur['kode_pelanggan'] == 'TSM-00548' || $faktur['kode_pelanggan'] == 'TSM-00494') { ?> <b>CV MAKMUR PERMATA <br> Jl. Perintis Kemerdekaan </b><br> <?php } else { ?> <b>CV PACIFIC CABANG <?php echo strtoupper($cabang['nama_cabang']); ?></b><br>
						<b><?php echo $cabang['alamat_cabang']; ?></b>
					<?php } ?>
				</b>
		</td>
	</tr>
	<tr>
		<td colspan="7" align="center">
			<hr>
		</td>
	</tr>

	<tr>
		<td width="15%">Tgl Faktur</td>
		<td width="1%">:</td>
		<td width="40%"><?php echo DatetoIndo2($faktur['tgltransaksi']); ?></td>
		<td>Nama Customer</td>
		<td>:</td>
		<td><?php echo $faktur['nama_pelanggan']; ?></td>
	</tr>
	<tr>
		<td>No. Kendaraan</td>
		<td>:</td>
		<td></td>
		<td>Alamat</td>
		<td>:</td>
		<td><?php if (!empty($faktur['alamat_toko'])) {
				echo $faktur['alamat_toko'];
			} else {
				echo $faktur['alamat_pelanggan'];
			} ?></td>
	</tr>
	<tr>
		<td>Jenis Transaksi</td>
		<td>:</td>
		<td><?php echo strtoupper($faktur['jenistransaksi']); ?></td>
	</tr>

	<tr>
		<td colspan="7">

			<table class="garis5" width="100%">
				<thead>
					<tr>
						<th rowspan="2">NO</th>
						<th rowspan="2">KODE BARANG</th>
						<th rowspan="2">NAMA BARANG</th>

						<th colspan="3">JUMLAH</th>

					</tr>
					<tr>
						<th>BOX</th>
						<th>PACK</th>
						<th>PCS</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($barang as $b) {
						$jmldus     = floor($b->jumlah / $b->isipcsdus);
						$sisadus    = $b->jumlah % $b->isipcsdus;

						if ($b->isipack == 0) {
							$jmlpack    = 0;
							$sisapack   = $sisadus;
						} else {

							$jmlpack    = floor($sisadus / $b->isipcs);
							$sisapack   = $sisadus % $b->isipcs;
						}

						$jmlpcs = $sisapack;


					?>
						<tr>
							<td align="center"><?php echo $no; ?></td>
							<td><?php echo $b->kode_barang; ?></td>
							<td><?php echo $b->nama_barang; ?></td>

							<td align="center"><?php echo $jmldus; ?></td>
							<td align="center"><?php echo $jmlpack; ?></td>
							<td align="center"><?php echo $jmlpcs; ?></td>

						</tr>
					<?php $no++;
					} ?>

				</tbody>

			</table>

		</td>
	</tr>
	<tr>
		<table class="garis5" width="100%">
			<tr style="font-weight:bold; text-align:center">
				<td>Dibuat</td>
				<td>Diserahkan</td>
				<td>Diterima</td>
				<td>Mengetahui</td>
				<td>Jam Masuk</td>
			</tr>
			<tr style="font-weight:bold;">
				<td rowspan="3"></td>
				<td rowspan="3"></td>
				<td rowspan="3"></td>
				<td rowspan="3"></td>

			</tr>
			<tr>
				<td style="height: 20px"></td>
			</tr>
			<tr>
				<td style="font-weight:bold; text-align:center">Jam Keluar</td>
			</tr>
			<tr style="font-weight:bold; text-align:center">
				<td>Penjualan</td>
				<td>Pengirim</td>
				<td>Pelanggan</td>
				<td>Security</td>
				<td></td>
			</tr>
		</table>
	</tr>
</table>
<br>

<p style="font-weight: bold; font-size: 18px"><i>Catatan : Mohon tidak untuk menulis Retur / Bs di surat Jalan !</i></p>