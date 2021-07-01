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
      <td>
        <input type="text" <?php echo $readonly; ?> style="background-color: <?php echo $bgcolor; ?>;" class="form-control settargetproduksales" value="<?php echo $cekvaluetarget['jumlah_target']; ?>" data-salesman="<?php echo $s->id_karyawan; ?>" data-produk="<?php echo $p->kode_produk; ?>">
      </td>
    <?php } ?>
  </tr>
<?php } ?>
<script>
  $(function() {
    function loadalert() {
      var cek = <?php echo $cek ?>;
      if (cek == 1) {
        alert('Data Sudah Dikunci, Karena Sudah Dilakukan Approval');
      }
    }

    loadalert();

    function loadlisttarget() {
      var kodetarget = $("#kodetarget").val();
      var cabang = $("#cabang").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>komisi/loadlisttarget',
        data: {
          cabang: cabang,
          kodetarget: kodetarget
        },
        cache: false,
        success: function(respond) {
          $("#loadlisttarget").html(respond);
        }
      });
    }
    $(".settargetproduksales").on('change', function() {
      var salesman = $(this).attr("data-salesman");
      var produk = $(this).attr("data-produk");
      var jmltarget = $(this).val();
      var kodetarget = $("#kodetarget").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>komisi/simpantarget',
        data: {
          kodetarget: kodetarget,
          salesman: salesman,
          produk: produk,
          jmltarget: jmltarget
        },
        cache: false,
        success: function(respond) {
          loadlisttarget();
        }
      });
    });
  });
</script>