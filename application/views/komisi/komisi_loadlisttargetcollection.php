<?php foreach ($salesman as $s) {
  $cekvaluetarget = $this->db->get_where('komisi_collection_detail', array('kode_target' => $kodetarget, 'id_karyawan' => $s->id_karyawan))->row_array();
  if ($cekvaluetarget['jumlah_target_collection'] > 0) {
    $bgcolor = "#d1ff7a";
  } else {
    $bgcolor = "";
  }
?>
  <tr>
    <td style="width:20%"><?php echo $s->id_karyawan; ?></td>
    <td style="width:20%"><?php echo $s->nama_karyawan; ?></td>
    <td>
      <input type="text" value="<?php echo number_format($cekvaluetarget['jumlah_target_collection'], '0', '', '.'); ?>" style="text-align:right; background-color: <?php echo $bgcolor; ?>;" class="form-control settargetcollectionsales" data-salesman="<?php echo $s->id_karyawan; ?>">
    </td>
  </tr>
<?php } ?>

<script>
  $(function() {
    function loadlisttargetcollection() {
      var kodetarget = $("#kodetarget").val();
      var cabang = $("#cabang").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>komisi/loadlisttargetcollection',
        data: {
          cabang: cabang,
          kodetarget: kodetarget
        },
        cache: false,
        success: function(respond) {
          $("#loadlisttargetcollection").html(respond);
        }
      });
    }

    $(".settargetcollectionsales").on('change', function() {
      var salesman = $(this).attr("data-salesman");
      var jmltarget = $(this).val();
      var kodetarget = $("#kodetarget").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>komisi/simpantargetcollection',
        data: {
          kodetarget: kodetarget,
          salesman: salesman,
          jmltarget: jmltarget
        },
        cache: false,
        success: function(respond) {
          loadlisttargetcollection();
        }
      });
    });
  });
</script>