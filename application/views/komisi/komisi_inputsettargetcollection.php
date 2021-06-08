<div class="row mb-3">
  <input type="hidden" id="kodetarget" value="<?php echo $kodetarget; ?>">
  <div class="form-group mb-3">
    <select name="cabang" id="cabang" class="form-select">
      <option value="">Pilih Cabang</option>
      <?php foreach ($cabang as $c) { ?>
        <option value="<?php echo $c->kode_cabang; ?>"><?php echo $c->nama_cabang; ?></option>
      <?php } ?>
    </select>
  </div>
</div>
<div class="row mb-3">
  <table class="table table-bordered table-striped">
    <thead class="thead-dark" style="text-align:center;">
      <tr>
        <th>ID Sales</th>
        <th>Nama Sales</th>
        <th>Target Collection</th>
      </tr>
    </thead>
    <tbody id="loadlisttargetcollection">

    </tbody>
  </table>
</div>
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

    $("#cabang").change(function(e) {
      loadlisttargetcollection();
    });
  });
</script>