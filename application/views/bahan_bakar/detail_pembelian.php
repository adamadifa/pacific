<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
      <tr style="font-weight:bold">
        <th>Tanggal</th>
        <th>NO Bukti</th>
        <th>Supplier</th>
        <th>Departemen</th>
      </tr>
      <tr>
        <td><?php echo DateToIndo2($pmb['tgl_pembelian']); ?></td>
        <td><?php echo $pmb['nobukti_pembelian']; ?></td>
        <td><?php echo $pmb['nama_supplier']; ?></td>
        <td><?php echo $pmb['nama_dept']; ?></td>
      </tr>
    </thead>
  </table>
  <table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Satuan</th>
        <th>Ket</th>
        <th>Qty</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no     = 1;
      $total  = 0;
      foreach ($detail as $d) {
        $total = $total + $d->qty;
      ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $d->kode_barang; ?></td>
          <td><?php echo $d->nama_barang; ?></td>
          <td><?php echo $d->satuan; ?></td>
          <td><?php echo $d->keterangan; ?></td>
          <td><?php echo $d->qty; ?></td>
        </tr>
      <?php
        $no++;
      }
      ?>
      <tr>
        <th colspan="5">TOTAL PEMBELIAN</th>
        <td align="left"><b> <?php echo number_format($total, '2', ',', '.'); ?></b></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="col-md-12">
  <div class="col-md-12">
    <div class="form-group">
      <div class="input-icon">
        <input id="tgl_pemasukan2" hidden value="<?php echo date('Y-m-d');?>" name="tgl_pemasukan" />
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <div class="col-md-offset-11">
        <a href="#" data-nobukti="<?php echo $pmb['nobukti_pembelian']; ?>" class="btn btn-md btn-success approve">Approve</a>
      </div>
    </div>
  </div>
</div>

<script>
  flatpickr(document.getElementById('tgl_pemasukan2'), {});
</script>

<script type="text/javascript">
  $(function() {

    $(".approve").click(function(e) {
      e.preventDefault();

      var nobukti = $(this).attr("data-nobukti");
      var tgl_pemasukan = $('#tgl_pemasukan2').val();

      if (tgl_pemasukan == "") {

        swal("Oops!", "Silahkan Pilih Tanggal terlebih dahulu!", "warning");

      } else {

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>bahan_bakar/insert_pembelian',
          data: {
            nobukti: nobukti,
            tgl_pemasukan: tgl_pemasukan
          },
          cache: false,
          success: function() {

            window.location.reload(false);

          }

        });
      }

    });
  });
</script>