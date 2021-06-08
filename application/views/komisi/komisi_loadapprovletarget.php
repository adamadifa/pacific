<?php 
$level = $this->session->userdata('level_user');
foreach ($target as $t) { ?>
  <tr>
    <td><?php echo $t->kode_target; ?></td>
    <td><?php echo $bulan[$t->bulan]; ?></td>
    <td><?php echo $t->tahun; ?></td>

    <?php if($t->ka == ''){ ?>
      <td><span class="badge bg-orange"><i class="fa fa-history"></i></span></td>
    <?php }else if($t->ka == '1' AND $t->status >= 1){ ?>
      <td><span class="badge bg-green"><i class="fa fa-check"></i></span></td>
    <?php }else if($t->ka == '2'){ ?>
      <td><span class="badge bg-red"><i class="fa fa-book"></i></span></td>
    <?php } ?>

    <?php if($t->kp == '' OR $t->ka == '2'){ ?>
      <td><span class="badge bg-orange"><i class="fa fa-history"></i></span></td>
    <?php }else if($t->kp == '1' AND $t->status >= 2){ ?>
      <td><span class="badge bg-green"><i class="fa fa-check"></i></span></td>
    <?php } ?>

    <?php if($t->mm == '' OR $t->ka == '2'){ ?>
      <td><span class="badge bg-orange"><i class="fa fa-history"></i></span></td>
    <?php }else if($t->mm == '1' AND $t->status >= 3){ ?>
      <td><span class="badge bg-green"><i class="fa fa-check"></i></span></td>
    <?php } ?>

    <?php if($t->em == '' OR $t->ka == '2'){ ?>
      <td><span class="badge bg-orange"><i class="fa fa-history"></i></span></td>
    <?php }else if($t->em == '1' AND $t->status >= 4){ ?>
      <td><span class="badge bg-green"><i class="fa fa-check"></i></span></td>
    <?php } ?>

    <?php if($t->dr == '' OR $t->ka == '2'){ ?>
      <td><span class="badge bg-orange"><i class="fa fa-history"></i></span></td>
    <?php }else if($t->dr == '1' AND $t->status >= 5){ ?>
      <td><span class="badge bg-green"><i class="fa fa-check"></i></span></td>
    <?php } ?>

    <td style="width: 500px;text-align:center">
      <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" class="btn btn-primary btn-sm settarget"><i class="fa fa-gear mr-2"></i>input Target Quantity</a>
      <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" class="btn btn-success btn-sm settargetcollection"><i class="fa fa-gear mr-2"></i>Input Target Collection</a>
      <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" class="btn btn-info btn-sm settargetcashin"><i class="fa fa-gear mr-2"></i>input Target Cash IN</a>
    </td>
    <td>
      <?php if($t->ka == '' AND $level == 'kepala admin'){ ?>
          <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" data-approve="1" data-status="1" data-level="kepala admin" class="btn btn-danger btn-sm approve"></i>Approve</a>
        <?php }else if($t->ka == '2' AND $t->status == '1' AND $level == 'kepala admin'){ ?>
          <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" data-approve="1" data-status="1" data-level="kepala admin" class="btn btn-warning btn-sm approve"></i>Selesai Revisi</a>
        <?php }else if($t->ka == '1' AND $t->status == '1' AND $level == 'kepala cabang'){ ?>
          <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" data-approve="1" data-status="2" data-level="kepala cabang" class="btn btn-danger btn-sm approve"></i>Approve</a>
          <!-- <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" data-approve="2" data-status="1" data-level="kepala admin" class="btn btn-warning btn-sm approve"></i>Revisi</a> -->
        <?php }else if($t->kp == '1' AND $t->status == '2' AND $level == 'manager marketing'){ ?>
          <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" data-approve="1" data-status="3" data-level="manager marketing" class="btn btn-danger btn-sm approve"></i>Approve</a>
          <!-- <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" data-approve="2" data-status="1" data-level="kepala admin" class="btn btn-warning btn-sm approve"></i>Revisi</a> -->
        <?php }else if($t->mm == '1' AND $t->status == '3' AND $level == 'general manager'){ ?>
          <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" data-approve="1" data-status="4" data-level="general manager" class="btn btn-danger btn-sm approve"></i>Approve</a>
          <!-- <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" data-approve="2" data-status="1" data-level="kepala admin" class="btn btn-warning btn-sm approve"></i>Revisi</a> -->
        <?php }else if($t->em == '1' AND $t->status == '4' AND $level == 'Administrator'){ ?>
          <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" data-approve="1" data-status="5" data-level="Administrator" class="btn btn-danger btn-sm approve"></i>Approve</a>
          <!-- <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" data-approve="2" data-status="1" data-level="kepala admin" class="btn btn-warning btn-sm approve"></i>Revisi</a> -->
        <?php } ?>
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
      var status  = $(this).attr("data-status");
      var level   = $(this).attr("data-level");
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