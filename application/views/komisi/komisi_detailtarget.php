<table class="table table-bordered table-striped" style="font-size:14px">
  <thead class="thead-dark" style="text-align:center;">
    <tr>
      <th rowspan="2">ID Sales</th>
      <th rowspan="2">Nama Sales</th>
      <th colspan="9">Target Quantity</th>
      <th rowspan="2">Cash IN</th>
    </tr>
    <tr>
      <th>AB</th>
      <th>AR</th>
      <th>AS</th>
      <th>BB</th>
      <th>DEP</th>
      <th>DS</th>
      <th>SP</th>
      <th>SC</th>
      <th>SP8</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $totalab = 0;
    $totalar = 0;
    $totalas = 0;
    $totalbb = 0;
    $totaldep = 0;
    $totalds = 0;
    $totalsp = 0;
    $totalsc = 0;
    $totalsp8 = 0;
    $totalcashin = 0;

    $grandtotalab = 0;
    $grandtotalar = 0;
    $grandtotalas = 0;
    $grandtotalbb = 0;
    $grandtotaldep = 0;
    $grandtotalds = 0;
    $grandtotalsp = 0;
    $grandtotalsc = 0;
    $grandtotalsp8 = 0;
    $grandtotalcashin = 0;
    foreach ($target as $key => $d) {
      $kode_cabang = @$target[$key + 1]->kode_cabang;
      $totalab += $d->AB;
      $totalar += $d->AR;
      $totalas += $d->AS;
      $totalbb += $d->BB;
      $totaldep += $d->DEP;
      $totalds += $d->DS;
      $totalsp += $d->SP;
      $totalsc += $d->SC;
      $totalsp8 += $d->SP8;
      $totalcashin += $d->jumlah_target_cashin;

      $grandtotalab += $d->AB;
      $grandtotalar += $d->AR;
      $grandtotalas += $d->AS;
      $grandtotalbb += $d->BB;
      $grandtotaldep += $d->DEP;
      $grandtotalds += $d->DS;
      $grandtotalsp += $d->SP;
      $grandtotalsc += $d->SC;
      $grandtotalsp8 += $d->SP8;
      $grandtotalcashin += $d->jumlah_target_cashin;
    ?>
      <tr>
        <td><?php echo $d->id_karyawan; ?></td>
        <td><?php echo $d->nama_karyawan; ?></td>
        <?php
        $cbg = $this->session->userdata('cabang');
        if ($cbg == 'pusat') {
        ?>
          <td align="right"><a href="#" class="koreksitarget" kodetarget="<?php echo $kodetarget; ?>" kodeproduk="AB" id_karyawan="<?php echo $d->id_karyawan; ?>"><?php echo number_format($d->AB, '0', '', '.'); ?></a></td>
          <td align="right"><a href="#" class="koreksitarget" kodetarget="<?php echo $kodetarget; ?>" kodeproduk="AR" id_karyawan="<?php echo $d->id_karyawan; ?>"><?php echo number_format($d->AR, '0', '', '.'); ?></a></td>
          <td align="right"><a href="#" class="koreksitarget" kodetarget="<?php echo $kodetarget; ?>" kodeproduk="AS" id_karyawan="<?php echo $d->id_karyawan; ?>"><?php echo number_format($d->AS, '0', '', '.'); ?></a></td>
          <td align="right"><a href="#" class="koreksitarget" kodetarget="<?php echo $kodetarget; ?>" kodeproduk="BB" id_karyawan="<?php echo $d->id_karyawan; ?>"><?php echo number_format($d->BB, '0', '', '.'); ?></a></td>
          <td align="right"><a href="#" class="koreksitarget" kodetarget="<?php echo $kodetarget; ?>" kodeproduk="DEP" id_karyawan="<?php echo $d->id_karyawan; ?>"><?php echo number_format($d->DEP, '0', '', '.'); ?></a></td>
          <td align="right"><a href="#" class="koreksitarget" kodetarget="<?php echo $kodetarget; ?>" kodeproduk="DS" id_karyawan="<?php echo $d->id_karyawan; ?>"><?php echo number_format($d->DS, '0', '', '.'); ?></a></td>
          <td align="right"><a href="#" class="koreksitarget" kodetarget="<?php echo $kodetarget; ?>" kodeproduk="SP" id_karyawan="<?php echo $d->id_karyawan; ?>"><?php echo number_format($d->SP, '0', '', '.'); ?></a></td>
          <td align="right"><a href="#" class="koreksitarget" kodetarget="<?php echo $kodetarget; ?>" kodeproduk="SC" id_karyawan="<?php echo $d->id_karyawan; ?>"><?php echo number_format($d->SC, '0', '', '.'); ?></a></td>
          <td align="right"><a href="#" class="koreksitarget" kodetarget="<?php echo $kodetarget; ?>" kodeproduk="SP8" id_karyawan="<?php echo $d->id_karyawan; ?>"><?php echo number_format($d->SP8, '0', '', '.'); ?></a></td>
        <?php } else { ?>
          <td align="right"><?php echo number_format($d->AB, '0', '', '.'); ?></td>
          <td align="right"><?php echo number_format($d->AR, '0', '', '.'); ?></td>
          <td align="right"><?php echo number_format($d->AS, '0', '', '.'); ?></td>
          <td align="right"><?php echo number_format($d->BB, '0', '', '.'); ?></td>
          <td align="right"><?php echo number_format($d->DEP, '0', '', '.'); ?></td>
          <td align="right"><?php echo number_format($d->DS, '0', '', '.'); ?></td>
          <td align="right"><?php echo number_format($d->SP, '0', '', '.'); ?></td>
          <td align="right"><?php echo number_format($d->SC, '0', '', '.'); ?></td>
          <td align="right"><?php echo number_format($d->SP8, '0', '', '.'); ?></td>
        <?php } ?>
        <td align="right"><?php echo number_format($d->jumlah_target_cashin, '0', '', '.'); ?></td>
      </tr>
      <?php
      if ($kode_cabang != $d->kode_cabang) {
      ?>
        <tr class="thead-dark">
          <th colspan="2">TOTAL <?php echo $d->kode_cabang ?></th>
          <th style="text-align:right"><?php echo number_format($totalab, '0', '', '.'); ?></th>
          <th style="text-align:right"><?php echo number_format($totalar, '0', '', '.'); ?></th>
          <th style="text-align:right"><?php echo number_format($totalas, '0', '', '.'); ?></th>
          <th style="text-align:right"><?php echo number_format($totalbb, '0', '', '.'); ?></th>
          <th style="text-align:right"><?php echo number_format($totaldep, '0', '', '.'); ?></th>
          <th style="text-align:right"><?php echo number_format($totalds, '0', '', '.'); ?></th>
          <th style="text-align:right"><?php echo number_format($totalsp, '0', '', '.'); ?></th>
          <th style="text-align:right"><?php echo number_format($totalsc, '0', '', '.'); ?></th>
          <th style="text-align:right"><?php echo number_format($totalsp8, '0', '', '.'); ?></th>
          <th style="text-align:right"><?php echo number_format($totalcashin, '0', '', '.'); ?></th>
        </tr>
    <?php
        $totalab = 0;
        $totalar = 0;
        $totalas = 0;
        $totalbb = 0;
        $totaldep = 0;
        $totalds = 0;
        $totalsp = 0;
        $totalsc = 0;
        $totalsp8 = 0;
        $totalcashin = 0;
      }
    }
    ?>
    <tr style="background-color: #cd201f;">
      <th colspan="2" style="color:white">GRAND TOTAL</th>
      <th style="text-align:right; color:white"><?php echo number_format($grandtotalab, '0', '', '.'); ?></th>
      <th style="text-align:right; color:white"><?php echo number_format($grandtotalar, '0', '', '.'); ?></th>
      <th style="text-align:right; color:white"><?php echo number_format($grandtotalas, '0', '', '.'); ?></th>
      <th style="text-align:right; color:white"><?php echo number_format($grandtotalbb, '0', '', '.'); ?></th>
      <th style="text-align:right; color:white"><?php echo number_format($grandtotaldep, '0', '', '.'); ?></th>
      <th style="text-align:right; color:white"><?php echo number_format($grandtotalds, '0', '', '.'); ?></th>
      <th style="text-align:right; color:white"><?php echo number_format($grandtotalsp, '0', '', '.'); ?></th>
      <th style="text-align:right; color:white"><?php echo number_format($grandtotalsc, '0', '', '.'); ?></th>
      <th style="text-align:right; color:white"><?php echo number_format($grandtotalsp8, '0', '', '.'); ?></th>
      <th style="text-align:right; color:white"><?php echo number_format($grandtotalcashin, '0', '', '.'); ?></th>
    </tr>
  </tbody>
</table>
<div class="modal modal-blur fade" id="modalkoreksitarget" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Koreksi Target</h5>
      </div>
      <div class="modal-body">
        <div id="loadkoreksitarget"></div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-white mr-auto" id="tutupmodalkoreksi">Close</a>
      </div>
    </div>
  </div>
</div>
<script>
  $(function() {
    $(".koreksitarget").click(function(e) {
      e.preventDefault();
      var kodetarget = "<?php echo $kodetarget; ?>";
      var kodeproduk = $(this).attr("kodeproduk");
      var id_karyawan = $(this).attr("id_karyawan");

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>komisi/getfrmkoreksitarget',
        data: {
          kodetarget: kodetarget,
          kodeproduk: kodeproduk,
          id_karyawan: id_karyawan
        },
        cache: false,
        success: function(respond) {
          $("#loadkoreksitarget").html(respond);
          $("#modalkoreksitarget").modal("show");
        }
      });

    });

    $("#tutupmodalkoreksi").click(function(e) {
      $("#modalkoreksitarget").modal("hide");
    });
  })
</script>