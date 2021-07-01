<?php
$level = $this->session->userdata('level_user');
foreach ($target as $t) { ?>
  <tr style="text-align: center;">
    <td><?php echo $t->kode_target; ?></td>
    <td><?php echo $bulan[$t->bulan]; ?></td>
    <td><?php echo $t->tahun; ?></td>
    <td>
      <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" class="btn btn-primary btn-sm settarget"><i class="fa fa-gear mr-2"></i>input Target Quantity</a>
      <!-- <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" class="btn btn-success btn-sm settargetcollection"><i class="fa fa-gear mr-2"></i>Input Target Collection</a>
      <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" class="btn btn-info btn-sm settargetcashin"><i class="fa fa-gear mr-2"></i>input Target Cash IN</a> -->
    </td>
  </tr>
<?php } ?>
<script>
  $(function() {
    $(".settarget").click(function(e) {
      e.preventDefault();
      var kodetarget = $(this).attr("data-kodetarget");
      $("#modalsettarget").modal("show");
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>komisi/inputsettarget',
        data: {
          kodetarget: kodetarget
        },
        cache: false,
        success: function(respond) {
          $("#loadformsettarget").html(respond);
        }
      });
    });

    $(".settargetcashin").click(function(e) {
      e.preventDefault();
      var kodetarget = $(this).attr("data-kodetarget");
      $("#modalsettargetcashin").modal("show");
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>komisi/inputsettargetcashin',
        data: {
          kodetarget: kodetarget
        },
        cache: false,
        success: function(respond) {
          $("#loadformsettargetcashin").html(respond);
        }
      });
    });

    $(".settargetcollection").click(function(e) {
      e.preventDefault();
      var kodetarget = $(this).attr("data-kodetarget");
      $("#modalsettargetcollection").modal("show");
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>komisi/inputsettargetcollection',
        data: {
          kodetarget: kodetarget
        },
        cache: false,
        success: function(respond) {
          $("#loadformsettargetcollection").html(respond);
        }
      });
    });

    $(".approve").click(function(e) {
      e.preventDefault();
      var kode_target = $(this).attr("data-kodetarget");
      var approve = $(this).attr("data-approve");
      var status = $(this).attr("data-status");
      var level = $(this).attr("data-level");
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>komisi/insertapprovlekomisi',
        data: {
          kode_target: kode_target,
          approve: approve,
          level: level,
          status: status
        },
        cache: false,
        success: function(respond) {
          window.location.reload();
        }
      });
    });
  });
</script>