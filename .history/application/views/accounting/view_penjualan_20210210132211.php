<?php if ($kode_akun == "1-1401") { ?>
  <?php
  $no = 1;
  $total = 0;
  foreach ($penjualannet as $dey => $d) {
    $total += $d->total;
    if (empty($d->ceknobukti)) {
      $color = "";
      $textcolor = "";
    } else {
      if ($d->total != $d->debet) {
        $color = "#d93333c9";
        $textcolor = "white";
      } else {
        $color = "#8fdcaac4";
        $textcolor = "";
      }
    }
  ?>
    <tr style="font-size:12;background-color: <?php echo $color; ?>;">
      <td><?php echo $no; ?></td>
      <td><?php echo $d->tgltransaksi; ?></td>
      <td><?php echo $d->no_fak_penj; ?></td>
      <td>Penjualan Netto</td>
      <td><?php echo $kode_akun; ?></td>
      <td align="right"><?php echo number_format($d->total, 2); ?></td>
      <td></td>
      <td>
        <?php if (empty($d->ceknobukti)) { ?>
          <a href="#" class="btn btn-success btn-sm tambah" data-sumber="Penjualan Netto" data-nobukti="<?php echo $d->ceknobukti; ?>" data-noref="<?php echo $d->no_fak_penj; ?>"><i class="fa fa-plus"></i></a>
        <?php } else { ?>
          <a href="#" class="btn btn-danger btn-sm hapus" data-nobukti="<?php echo $d->ceknobukti; ?>"><i class="fa fa-close"></i></a>
          <?php
          if ($d->total != $d->debet) {
          ?>
            <a href="#" class="btn btn-primary btn-sm refresh" data-nobukti="<?php echo $d->ceknobukti; ?>" data-noref="<?php echo $d->no_fak_penj; ?>"><i class=" fa fa-refresh"></i></a>
          <?php
          }
          ?>

        <?php } ?>
      </td>
    </tr>
  <?php
    $no++;
  }
  ?>
  <tr style="font-size:30;">
    <th colspan="5" style="text-align: center;">Total</th>
    <th style="text-align: right;"><?php echo number_format($total, 2); ?></th>
    <th><?php echo 0; ?></th>
  </tr>
<?php } else if ($kode_akun == "4-2201") { ?>
  <?php
  $no = 1;
  $total = 0;
  foreach ($potonganpenjualan as $dey => $d) {
    $total += $d->potongan + $d->potistimewa;
    if (empty($d->ceknobukti)) {
      $color = "";
      $textcolor = "";
    } else {
      if ($d->potongan + $d->potistimewa != $d->debet) {
        $color = "#d93333c9";
        $textcolor = "white";
      } else {
        $color = "#8fdcaac4";
        $textcolor = "";
      }
    }
  ?>
    <tr style="font-size:12;background-color: <?php echo $color; ?>;">
      <td><?php echo $no; ?></td>
      <td><?php echo $d->tgltransaksi; ?></td>
      <td><?php echo $d->no_fak_penj; ?></td>
      <td>Potongan Penjualan</td>
      <td><?php echo $kode_akun; ?></td>
      <td align="right"><?php echo number_format($d->potongan + $d->potistimewa, 2); ?></td>
      <td></td>
      <td>
        <?php if (empty($d->ceknobukti)) { ?>
          <a href="#" class="btn btn-success btn-sm tambah" data-sumber="Potongan Penjualan" data-nobukti="<?php echo $d->ceknobukti; ?>" data-noref="<?php echo $d->no_fak_penj; ?>"><i class="fa fa-plus"></i></a>
        <?php } else { ?>
          <a href="#" class="btn btn-danger btn-sm hapus" data-nobukti="<?php echo $d->ceknobukti; ?>"><i class="fa fa-close"></i></a>
          <?php
          if ($d->potongan + $d->potistimewa != $d->debet) {
          ?>
            <a href="#" class="btn btn-primary btn-sm refresh" data-nobukti="<?php echo $d->ceknobukti; ?>" data-noref="<?php echo $d->no_fak_penj; ?>"><i class=" fa fa-refresh"></i></a>
          <?php
          }
          ?>

        <?php } ?>
      </td>
    </tr>
  <?php
    $no++;
  }
  ?>
  <tr style="font-size:30;">
    <th colspan="5" style="text-align: center;">Total</th>
    <th style="text-align: right;"><?php echo number_format($total, 2); ?></th>
    <th><?php echo 0; ?></th>
  </tr>
<?php } else if ($kode_akun == "4-2201") { ?>
  <?php
  $no = 1;
  $total = 0;
  foreach ($returpenjualan as $dey => $d) {
    $total += $d->total + $d->potistimewa;
    if (empty($d->ceknobukti)) {
      $color = "";
      $textcolor = "";
    } else {
      if ($d->total  != $d->debet) {
        $color = "#d93333c9";
        $textcolor = "white";
      } else {
        $color = "#8fdcaac4";
        $textcolor = "";
      }
    }
  ?>
    <tr style="font-size:12;background-color: <?php echo $color; ?>;">
      <td><?php echo $no; ?></td>
      <td><?php echo $d->tgltransaksi; ?></td>
      <td><?php echo $d->no_fak_penj; ?></td>
      <td>Potongan Penjualan</td>
      <td><?php echo $kode_akun; ?></td>
      <td align="right"><?php echo number_format($d->potongan + $d->potistimewa, 2); ?></td>
      <td></td>
      <td>
        <?php if (empty($d->ceknobukti)) { ?>
          <a href="#" class="btn btn-success btn-sm tambah" data-sumber="Potongan Penjualan" data-nobukti="<?php echo $d->ceknobukti; ?>" data-noref="<?php echo $d->no_fak_penj; ?>"><i class="fa fa-plus"></i></a>
        <?php } else { ?>
          <a href="#" class="btn btn-danger btn-sm hapus" data-nobukti="<?php echo $d->ceknobukti; ?>"><i class="fa fa-close"></i></a>
          <?php
          if ($d->potongan + $d->potistimewa != $d->debet) {
          ?>
            <a href="#" class="btn btn-primary btn-sm refresh" data-nobukti="<?php echo $d->ceknobukti; ?>" data-noref="<?php echo $d->no_fak_penj; ?>"><i class=" fa fa-refresh"></i></a>
          <?php
          }
          ?>

        <?php } ?>
      </td>
    </tr>
  <?php
    $no++;
  }
  ?>
  <tr style="font-size:30;">
    <th colspan="5" style="text-align: center;">Total</th>
    <th style="text-align: right;"><?php echo number_format($total, 2); ?></th>
    <th><?php echo 0; ?></th>
  </tr>
<?php } else { ?>
  <?php
  $no = 1;
  $total = 0;
  foreach ($penjualan as $dey => $d) {
    $total += $d->subtotal;
    if (empty($d->ceknobukti)) {
      $color = "";
      $textcolor = "";
    } else {
      if ($d->subtotal != $d->kredit) {
        $color = "#d93333c9";
        $textcolor = "white";
      } else {
        $color = "#8fdcaac4";
        $textcolor = "";
      }
    }
  ?>
    <tr style="font-size:12;background-color: <?php echo $color; ?>;">
      <td><?php echo $no; ?></td>
      <td><?php echo $d->tgltransaksi; ?></td>
      <td><?php echo $d->no_fak_penj; ?></td>
      <td><?php echo $d->nama_barang; ?></td>
      <td><?php echo $d->kode_akun; ?></td>
      <td></td>
      <!-- <td align="right"><?php echo number_format($d->kredit, 2); ?></td> -->
      <td align="right"><?php echo number_format($d->subtotal, 2); ?></td>
      <td>
        <?php if (empty($d->ceknobukti)) { ?>
          <a href="#" class="btn btn-success btn-sm tambah" data-sumber="Penjualan" data-nobukti="<?php echo $d->ceknobukti; ?>" data-noref="<?php echo $d->no_fak_penj; ?>"><i class="fa fa-plus"></i></a>
        <?php } else { ?>
          <a href="#" class="btn btn-danger btn-sm hapus" data-nobukti="<?php echo $d->ceknobukti; ?>"><i class="fa fa-close"></i></a>
          <?php
          if ($d->subtotal != $d->kredit) {
          ?>
            <a href="#" class="btn btn-primary btn-sm refresh" data-nobukti="<?php echo $d->ceknobukti; ?>" data-noref="<?php echo $d->no_fak_penj; ?>"><i class=" fa fa-refresh"></i></a>
          <?php
          }
          ?>

        <?php } ?>
      </td>
    </tr>
  <?php
    $no++;
  }
  ?>
  <tr style="font-size:30;">
    <th colspan="5" style="text-align: center;">Total</th>
    <th><?php echo 0; ?></th>
    <th style="text-align: right;"><?php echo number_format($total, 2); ?></th>
  </tr>
<?php } ?>

<script>
  $(function() {
    function loadpenjualan() {
      var bulan = $('#bulan').val();
      var tahun = $('#tahun').val();
      var kode_akun = $('#kode_akun').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>accounting/view_penjualan',
        data: {
          kode_akun: kode_akun,
          tahun: tahun,
          bulan: bulan
        },
        cache: false,
        success: function(respond) {
          $("#loadpenjualan").html(respond);
        }
      });

    }

    $(".hapus").click(function(e) {
      e.preventDefault();
      var nobukti = $(this).attr("data-nobukti");

      //alert(nobukti);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>accounting/hapusbukubesar",
        cache: false,
        data: {
          nobukti: nobukti

        },
        success: function(respond) {
          if (respond == 1) {
            loadpenjualan();
          } else {
            loadpenjualan();
          }
        }
      });
    });

    $(".tambah").click(function(e) {
      e.preventDefault();
      var kode_akun = $('#kode_akun').val();
      var bulan = $('#bulan').val();
      var tahun = $('#tahun').val();
      var nobukti = $(this).attr("data-nobukti");
      var sumber = $(this).attr("data-sumber");
      var noref = $(this).attr("data-noref");
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>accounting/tambahbukubesar",
        cache: false,
        data: {
          nobukti: nobukti,
          sumber: sumber,
          noref: noref,
          bulan: bulan,
          tahun: tahun,
          kode_akun: kode_akun
        },
        success: function(respond) {
          console.log(respond);
          if (respond == 1) {

            //swal("Success", "Data Berhasil Disimpan !", "success");
            loadpenjualan();
          } else {
            loadpenjualan();
          }
        }
      });
    });

    $(".refresh").click(function(e) {
      e.preventDefault();
      var nobukti = $(this).attr("data-nobukti");
      var sumber = "Penjualan";
      var noref = $(this).attr("data-noref");
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>accounting/updatebukubesar",
        cache: false,
        data: {
          nobukti: nobukti,
          sumber: sumber,
          noref: noref
        },
        success: function(respond) {
          console.log(respond);
          if (respond == 1) {
            swal("Success", "Data Berhasil Di Update !", "success");
            loadpenjualan();
          } else {
            loadpenjualan();
          }
        }
      });
    });
  });
</script>