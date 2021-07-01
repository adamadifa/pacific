<table class="table table-bordered table-striped" style="font-size:11px">
  <thead class="thead-dark" style="text-align:center;">
    <tr>
      <th rowspan="2">ID Sales</th>
      <th rowspan="2">Nama Sales</th>
      <th colspan="<?php echo $jmlproduk; ?>">Target Quantity</th>
    </tr>
    <tr>
      <?php foreach ($produk as $p) { ?>
        <th><?php echo $p->kode_produk; ?></th>
      <?php } ?>
    </tr>
  </thead>
  <?php foreach ($salesman as $s) { ?>
    <tr>
      <td style="width:10%"><?php echo $s->id_karyawan; ?></td>
      <td style="width:10%"><?php echo $s->nama_karyawan; ?></td>
      <?php foreach ($produk as $p) {
        $cekvaluetarget = $this->db->get_where('komisi_target_qty_detail', array('kode_target' => $kodetarget, 'id_karyawan' => $s->id_karyawan, 'kode_produk' => $p->kode_produk))->row_array();
        $cekcabang = $this->db->get_where('karyawan', array('id_karyawan' => $s->id_karyawan))->row_array();
        $cekapproval = $this->db->query("SELECT targetqty.kode_target, k.kode_cabang,bulan,tahun,kp,mm,em,direktur
      FROM komisi_target_qty_detail targetqty 
      INNER JOIN karyawan k ON targetqty.id_karyawan = k.id_karyawan
      INNER JOIN komisi_target target ON target.kode_target = targetqty.kode_target
      WHERE targetqty.kode_target = '$kodetarget' AND k.kode_cabang = '$cekcabang[kode_cabang]' 
      GROUP BY targetqty.kode_target,k.kode_cabang,bulan,tahun,kp,mm,em,direktur")->row_array();
        if ($cekvaluetarget['jumlah_target'] > 0) {
          $bgcolor = "#d1ff7a";
        } else {
          $bgcolor = "";
        }

        if (!empty($cekapproval['kp'])) {
          $readonly = "readonly";
          $cek = 1;
        } else {
          $readonly = "";
          $cek = 0;
        }
      ?>
        <td style="text-align: right;">
          <?php if (!empty($cekvaluetarget['jumlah_target'])) {
            echo number_format($cekvaluetarget['jumlah_target'], '0', '', '.');
          } ?>
        </td>
      <?php } ?>
    </tr>
  <?php } ?>
</table>