<?php

function uang($nilai)
{

  return number_format($nilai, '0', '', '.');
}
error_reporting(0);

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">

<div style="margin-top:10px; margin-left:10px;">
  <h2 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">ANALISA AJUAN KREDIT</h2>
  <br>
  <br>
  <h2 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"><u>KUALITATIF</u></h2>
  <br>
  <br>
  <table class="datatable3" style="font-size: 14px;">
  <tr style="text-align: left;">
      <td bgcolor="#024a75" style="color:white;">No. Pengajuan</td>
      <td><?php echo $pengajuan['no_pengajuan']; ?></td>
	  </tr>
    <tr style="text-align: left;">
      <td bgcolor="#024a75" style="color:white;">Tanggal. Pengajuan</td>
      <td><?php echo $pengajuan['tgl_pengajuan']; ?></td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#024a75" style="color:white">Nama Pelanggan</td>
      <td><?php echo $pengajuan['nama_pelanggan']; ?></td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#024a75" style="color:white">Koordinat GPS</td>
      <td><?php echo $pengajuan['latitude'] . "," . $pengajuan['longitude']; ?></td>
    </tr>
    <tr style="text-align: left;">
      <td bgcolor="#024a75" style="color:white">Cabang</td>
      <td><?php echo $pengajuan['kode_cabang']; ?></td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#024a75" style="color:white">Nomor Identitas</td>
      <td><?php echo $pengajuan['nik']; ?></td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#024a75" style="color:white">Type Outlet</td>
      <td>
        <?php
        if ($pengajuan['type_outlet'] == 1) {
          echo "Grosir";
        } else {
          echo "Retail";
        }
        ?>
      </td>
    <tr style="text-align: left;">
      <td bgcolor="#024a75" style="color:white">Salesman</td>
      <td><?php echo $pengajuan['nama_karyawan']; ?></td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#024a75" style="color:white">Nama Outlet</td>
      <td><?php echo $pengajuan['nama_pelanggan']; ?></td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#024a75" style="color:white">Hari Kunjungan</td>
      <td><?php echo $pengajuan['hari']; ?></td>
    </tr>
    <tr style="text-align: left;">
      <td bgcolor="#024a75" style="color:white">Alamat KTP</td>
      <td><?php echo $pengajuan['alamat_pelanggan']; ?></td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#024a75" style="color:white">Alamat Toko</td>
      <td><?php echo $pengajuan['alamat_toko']; ?></td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#024a75" style="color:white">No HP/Telepon</td>
      <td><?php echo $pengajuan['no_hp']; ?></td>
    </tr>
    <tr style="text-align: left;">
      <td bgcolor="#024a75" style="color:white">Kode Pelanggan</td>
      <td style="width:300px;"><?php echo $pengajuan['kode_pelanggan']; ?></td>

    </tr>
  </table>
  <br>
  <br>
  <h2 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"><u>KUANTITATIF</u></h2>
  <br>
  <br>
  <table class="datatable3" style="font-size: 14px;">
    <tr style="text-align: left;">
      <td bgcolor="#1d9e27" style="color:white;">Status Pelanggan</td>
      <td>
        <?php if ($pengajuan['status_outlet'] == "1") {
          echo "New Outlet";
        } else {
          echo "Existing Outlet";
        } ?>
      </td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#1d9e27" style="color:white">TOP</td>
      <td><?php echo $pengajuan['jatuhtempo'] . " Hari" ?></td>
    </tr>
    <tr style="text-align: left;">
      <td bgcolor="#1d9e27" style="color:white;">Cara Pembayaran</td>
      <td>
        <?php if ($pengajuan['cara_pembayaran'] == "1") {
          echo "Bank Transfer";
        } else if ($pengajuan['cara_pembayaran'] == "2") {
          echo "Advance Cash";
        } else {
          echo "Cheque / Bilyet Giro";
        } ?>
      </td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#1d9e27" style="color:white">Tempat Usaha</td>
      <td><?php echo $pengajuan['kepemilikan']; ?></td>

    </tr>
    <tr style="text-align: left;">
      <td bgcolor="#1d9e27" style="color:white;">Histori Pembayaran Transaksi</td>
      <td><?php echo $pengajuan['histori_transaksi']; ?></td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#1d9e27" style="color:white">Omset Toko</td>
      <td align="right"><?php echo number_format($pengajuan['omset_toko'], '0', '', '.'); ?></td>
    </tr>
    <tr style="text-align: left;">
      <td bgcolor="#1d9e27" style="color:white;">Terakhir Top UP</td>
      <td>
        <?php if ($pengajuan['lama_topup'] > "31") {
          echo "> 1 Bulan";
        } else {
          echo "< 1 Bulan";
        } ?>
      </td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#1d9e27" style="color:white">Mulai Langganan</td>
      <td><?php echo $pengajuan['lama_langganan']; ?></td>
    </tr>
    <tr style="text-align: left;">
      <td bgcolor="#1d9e27" style="color:white;">Lama Usaha</td>
      <td><?php echo $pengajuan['lama_usaha']; ?></td>
      <td style="border:0px; width:50px"></td>
      <td bgcolor="#1d9e27" style="color:white">Jaminan</td>
      <td>
        <?php if ($pengajuan['jaminan'] == "1") {
          echo "Ada";
        } else {
          echo "Tidak Ada";
        } ?>
      </td>
    </tr>
    <tr style="text-align: left;">
      <td bgcolor="#1d9e27" style="color:white;">Jumlah Faktur</td>
      <td><?php echo $pengajuan['jml_faktur']; ?></td>
    </tr>
  </table>
  <br>
  <br>
  <table class="datatable3" style="font-size: 14px;">
    <tr style="text-align: left;">
      <td bgcolor="#024a75" style="color:white;">Limit Kredit Sebelumnya</td>
      <td align="right"><?php echo number_format($pengajuan['limitpel'], '0', '', '.'); ?></td>
    </tr>
    <tr style="text-align: left;">
      <td bgcolor="#024a75" style="color:white;">Pengajuan Tambahan</td>
      <td align="right"><?php echo number_format($pengajuan['jumlah'] - $pengajuan['limitpel'], '0', '', '.'); ?></td>
    </tr>
  </table>
  <br>
  <br>
  <table class="datatable3" style="font-size: 14px;">
    <tr style="text-align: left;">
      <td bgcolor="#02bfd2" style="color:white;">Total Limit Kredit</td>
      <td align="right"><?php echo number_format($pengajuan['jumlah'], '0', '', '.'); ?></td>
      <td rowspan="4" style="width: 400px;"></td>
    </tr>
    <tr style="text-align: left;">
      <td bgcolor="#02bfd2" style="color:white;">Level Otorisasi</td>
      <td align="right">Direktur</td>
    </tr>
    <tr style="text-align: left;">
      <td bgcolor="#02bfd2" style="color:white;">Total Score</td>
      <td align="right"><?php echo $pengajuan['skor']; ?></td>
    </tr>
    <tr style="text-align: left;">
      <td bgcolor="#02bfd2" style="color:white;">Rekomendasi</td>
      <td align="right">
        <?php
        $scoreakhir =  $pengajuan['skor'];
        if ($scoreakhir <= 2) {
          $rekomendasi = "Tidak Layak";
        } else if ($scoreakhir > 2 && $scoreakhir <= 4) {
          $rekomendasi = "Tidak Disarankan";
        } else if ($scoreakhir > 4 && $scoreakhir <= 6) {
          $rekomendasi = "Beresiko";
        } else if ($scoreakhir > 6 && $scoreakhir <= 8.5) {
          $rekomendasi = "Layak Dengan Pertimbangan";
        } else if ($scoreakhir > 8.5 && $scoreakhir <= 10) {
          $rekomendasi = "Layak";
        }
        echo $rekomendasi;
        ?>
      </td>
    </tr>
  </table>
  <br>
  <br>
  <table class="datatable3" style="font-size: 14px;">
    <tr>
      <td colspan="2" align="center" style="width: 200px;">Diajukan Oleh</td>
      <td colspan="2" align="center" style="width: 200px;">Disetujui Cabang</td>
      <td colspan="3" align="center" style="width: 300px;">Disetujui Pusat</td>
    </tr>
    <tr>
      <td style="height: 100px; width:100px"></td>
      <td style="height: 100px; width:100px"></td>
      <td style="height: 100px; width:100px"></td>
      <td style="height: 100px; width:100px"></td>
      <td style="height: 100px; width:100px"></td>
      <td style="height: 100px; width:100px"></td>
      <td style="height: 100px; width:100px"></td>
    </tr>
    <tr>
      <td style="height: 30px;"></td>
      <td style="height: 30px;"></td>
      <td style="height: 30px;"></td>
      <td style="height: 30px;"></td>
      <td style="height: 30px;"></td>
      <td style="height: 30px;"></td>
      <td style="height: 30px;"></td>
    </tr>
    <tr style="text-align: center;">
      <td>Salesman</td>
      <td>Driver</td>
      <td>Ka. Penjualan</td>
      <td>Ka. Admin</td>
      <td>Marketing Manager</td>
      <td>Executive Manager</td>
      <td>Direktur</td>
    </tr>
  </table>
</div>