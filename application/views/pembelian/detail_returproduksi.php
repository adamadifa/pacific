<table class="table table-bordered table-hover table-striped">
  <thead class="thead-dark">
    <tr style="font-weight:bold">
      <th>Tanggal</th>
      <th>Kode Supplier</th>
      <th>Supplier</th>
      <th>NO Bukti</th>
    </tr>
    <tr>
      <td><?php echo DateToIndo2($data['tgl_retur']); ?></td>
      <td><?php echo $data['kode_supplier']; ?></td>
      <td><?php echo $data['nama_supplier']; ?></td>
      <td><?php echo $data['nobukti_retur']; ?></td>
    </tr>
  </thead>
</table>
<table class="table table-bordered table-hover table-striped">
  <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>Kode Barang Barang</th>
      <th>Nama Barang</th>
      <th>Satuan</th>
      <th>Ket</th>
      <th>Qty</th>
      <th>Berat</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no     = 1;
    foreach ($detail->result() as $d) {
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $d->kode_barang; ?></td>
        <td><?php echo $d->nama_barang; ?></td>
        <td><?php echo $d->satuan; ?></td>
        <td><?php echo $d->keterangan; ?></td>
        <td><?php echo number_format($d->qty, 2); ?></td>
        <td><?php echo number_format($d->qty_berat, 2); ?></td>
      </tr>
    <?php $no++;
    }  ?>
  </tbody>
</table>

<div class="col-md-12">
  <div class="col-md-12">
    <div class="form-group">
      <div class="input-icon">
        <input id="tgl_retur2" type="text" placeholder="Tanggal" class="form-control" name="tgl_retur" />
        <span class="input-icon-addon"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <rect x="4" y="5" width="16" height="16" rx="2" />
            <line x1="16" y1="3" x2="16" y2="7" />
            <line x1="8" y1="3" x2="8" y2="7" />
            <line x1="4" y1="11" x2="20" y2="11" />
            <line x1="11" y1="15" x2="12" y2="15" />
            <line x1="12" y1="15" x2="12" y2="18" /></svg>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <div class="col-md-offset-11">
        <a href="#" data-supplier="<?php echo $data['kode_supplier']; ?>" data-tgl="<?php echo $data['tgl_retur']; ?>" data-nobukti="<?php echo $data['nobukti_retur']; ?>" class="btn btn-md btn-success approve">Approve</a>
      </div>
    </div>
  </div>
</div>

<script>
  flatpickr(document.getElementById('tgl_retur2'), {});
</script>

<script type="text/javascript">
  $(function() {

    $(".approve").click(function(e) {
      e.preventDefault();

      var nobukti = $(this).attr("data-nobukti");
      var tgl_approve_pemb = $('#tgl_retur2').val();

      if (tgl_approve_pemb == "") {

        swal("Oops!", "Silahkan Pilih Tanggal terlebih dahulu!", "warning");

      } else {

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>pembelian/insert_returproduksi',
          data: {
            nobukti: nobukti,
            tgl_approve_pemb: tgl_approve_pemb
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