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
    <?php } ?>

    <?php if($t->kp == ''){ ?>
      <td><span class="badge bg-orange"><i class="fa fa-history"></i></span></td>
    <?php }else if($t->kp == '1' AND $t->status >= 2){ ?>
      <td><span class="badge bg-green"><i class="fa fa-check"></i></span></td>
    <?php } ?>

    <?php if($t->mm == ''){ ?>
      <td><span class="badge bg-orange"><i class="fa fa-history"></i></span></td>
    <?php }else if($t->mm == '1' AND $t->status >= 3){ ?>
      <td><span class="badge bg-green"><i class="fa fa-check"></i></span></td>
    <?php } ?>

    <?php if($t->em == ''){ ?>
      <td><span class="badge bg-orange"><i class="fa fa-history"></i></span></td>
    <?php }else if($t->em == '1' AND $t->status >= 4){ ?>
      <td><span class="badge bg-green"><i class="fa fa-check"></i></span></td>
    <?php } ?>

    <?php if($t->dr == ''){ ?>
      <td><span class="badge bg-orange"><i class="fa fa-history"></i></span></td>
    <?php }else if($t->dr == '1' AND $t->status >= 5){ ?>
      <td><span class="badge bg-green"><i class="fa fa-check"></i></span></td>
    <?php } ?>

    <td>
      <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" class="btn btn-primary btn-sm settarget"><i class="fa fa-gear mr-2"></i>Detail Target Quantity</a>
      <a href="#" data-kodetarget="<?php echo $t->kode_target; ?>" class="btn btn-info btn-sm settargetcashin"><i class="fa fa-gear mr-2"></i>Detail Target Cash IN</a>
      <?php if($t->status == ''){ ?>
        <a href="#" class="btn btn-success btn-sm"><i class="fa fa-checklish mr-2"></i>Approve</a>
        <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-checklish mr-2"></i>Tolak</a>
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
        url: '<?php echo base_url(); ?>komisi/detailsettarget',
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
        url: '<?php echo base_url(); ?>komisi/detailsettargetcashin',
        data: {
          kodetarget: kodetarget
        },
        cache: false,
        success: function(respond) {
          $("#loadformsettargetcashin").html(respond);
        }
      });
    });
  });
</script>