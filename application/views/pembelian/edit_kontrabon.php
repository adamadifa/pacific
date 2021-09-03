<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Edit Kontra BON
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <form autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>pembelian/update_kontrabon">
    <div class="row">

      <div class="col-md-10 col-xs-12">
        <div class="row">
          <div class="col-md-5">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data Kontra BON</h4>
              </div>
              <div class="card-body">
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-barcode"></i>
                    </span>
                    <input type="text" readonly value="<?php echo $kb['no_kontrabon']; ?>" id="nokontrabon" name="nokontrabon" class="form-control" placeholder="No Kontra BON" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-user"></i>
                    </span>
                    <input type="hidden" value="<?php echo $kb['kode_supplier']; ?>" id="kodesupplier" name="kodesupplier" class="form-control" placeholder="Kode Supplier" data-error=".errorTxt19" />
                    <input readonly type="text" value="<?php echo $kb['nama_supplier']; ?>" id="supplier" name="supplier" class="form-control" placeholder="Supplier" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-calendar"></i>
                    </span>
                    <input type="text" value="<?php echo $kb['tgl_kontrabon']; ?>" id="tgl_kontrabon" name="tgl_kontrabon" class="form-control" placeholder="Tanggal Kontra Bon" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <select class="form-select show-tick" id="status" name="status" data-error=".errorTxt1">
                    <option value="">--Pilih Jenis Pengajuan--</option>
                    <option <?php if ($kb['kategori'] == "KB") {
                              echo "selected";
                            } ?> value="KB">Kontra BON</option>
                    <option <?php if ($kb['kategori'] == "IM") {
                              echo "selected";
                            } ?> value="IM">Internal Memo</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-file-o"></i>
                    </span>
                    <input type="text" value="<?php echo $kb['no_dokumen']; ?>" id="nodokumen" name="nodokumen" class="form-control" placeholder="No Dokumen" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <select class="form-select show-tick" id="jenisbayar" name="jenisbayar" data-error=".errorTxt1">
                    <option value="">--Pilih Jenis Bayar--</option>
                    <option <?php if ($kb['jenisbayar'] == "tunai") {
                              echo "selected";
                            } ?> value="tunai">Tunai</option>
                    <option <?php if ($kb['jenisbayar'] == "transfer") {
                              echo "selected";
                            } ?> value="transfer">Transfer</option>
                  </select>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-7 col-xs-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-sm">
                  <div class="card-body d-flex align-items-center">
                    <span class="bg-blue text-white stamp mr-3" style="height:9rem !important; min-width:8rem !important ">
                      <i class="fa f fa-shopping-cart" style="font-size: 4rem;"></i>
                    </span>
                    <div class="ml-3 lh-lg">
                      <div class="strong" style="font-size: 3rem;" id="grandtotal">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Detail Kontra BON</h4>
              </div>
              <div class="card-body">
                <div class="row">

                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="input-icon">
                        <span class="input-icon-addon">
                          <i class="fa fa-barcode"></i>
                        </span>
                        <input type="text" readonly id="nobukti" name="nobukti" class="form-control" placeholder="No Bukti" data-error=".errorTxt19" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <div class="input-icon">
                        <span class="input-icon-addon">
                          <i class="fa fa-money"></i>
                        </span>
                        <input type="text" style="text-align:right" value="0" readonly id="totalharga" name="totalharga" class="form-control" placeholder="Total Harga" data-error=".errorTxt19" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <div class="input-icon">
                        <span class="input-icon-addon">
                          <i class="fa fa-money"></i>
                        </span>
                        <input type="text" style="text-align:right" value="" id="jmlbayar" name="jmlbayar" class="form-control" placeholder="Jumlah Bayar" data-error=".errorTxt19" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="input-icon">
                        <span class="input-icon-addon">
                          <i class="fa fa-file-o"></i>
                        </span>
                        <input type="text" style="text-align:right" value="" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" data-error=".errorTxt19" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <a href="#" id="tambahbarang" class="btn btn-primary">
                        <i class="fa fa-cart-plus mr-2"></i> Tambah
                      </a>
                    </div>
                  </div>

                </div>
                <div class="row mt-3">
                  <div class="col-md-12">

                    <table class="table table-bordered table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th>No</th>
                          <th>No Bukti</th>
                          <th>Jumlah Bayar</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $total = 0;
                        foreach ($detail as $d) {
                          $total = $total + $d->jmlbayar;

                        ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d->nobukti_pembelian; ?></td>
                            <td align="right"><?php echo number_format($d->jmlbayar, '2', ',', '.'); ?></td>
                            <td>
                              <a href="#" data-nokontrabon="<?php echo $d->no_kontrabon; ?>" data-nobukti="<?php echo $d->nobukti_pembelian; ?>" class="btn btn-sm btn-primary edit"><i class="fa fa-pencil"></i></a>
                              <a href="#" data-nokontrabon="<?php echo $d->no_kontrabon; ?>" data-nobukti="<?php echo $d->nobukti_pembelian; ?>" class="btn btn-sm btn-danger hapus"><i class="fa fa-trash-o"></i></a>
                            </td>
                          </tr>
                        <?php $no++;
                        }  ?>
                      </tbody>
                      <tr>
                        <th colspan="2">TOTAL</th>
                        <td align="right">
                          <b id="total"> <?php echo number_format($total, '2', ',', '.'); ?></b>
                          <input type="hidden" id="grandtot" name="grandtot" value="<?php echo number_format($total, '2', ',', '.'); ?>">
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Terbilang</th>
                        <td colspan="2" align="right"><b><?php echo strtoupper(terbilang($total)); ?></b></td>
                        <td></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="mb-3 d-flex justify-content-end">
                  <button type="submit" name="submit" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-send mr-2"></i>Update</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-2">
        <?php $this->load->view('menu/menu_keuangan_administrator'); ?>
      </div>
    </div>
  </form>
</div>
<div class="modal modal-blur fade" id="modal-hapus" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Are you sure?</div>
        <div>If you proceed, you will lose all your personal data.</div>
      </div>
      <div class="modal-footer">
        <form action="<?php echo base_url(); ?>pembelian/hapusitemkb" method="post">
          <input type="hidden" name="nobon" id="nobon">
          <input type="hidden" name="nobuktihapus" id="nobuktihapus">
          <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger" name="submit">Yes, delete all my data</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="editkontrabon" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Edit Kontrabon</h5>
      </div>
      <div class="modal-body">
        <div id="loadeditkontrabon"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="datapembelian" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Data Pembelian</h5>
      </div>
      <div class="modal-body">
        <div id="tabelpembelian"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  flatpickr(document.getElementById('tgl_kontrabon'), {});
</script>
<script>
  var h = document.getElementById('jmlbayar');
  h.addEventListener('keyup', function(e) {
    h.value = formatRupiah(this.value, '');
    //alert(b);
  });
  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
  }

  function convertToRupiah(angka) {
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++)
      if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return rupiah.split('', rupiah.length - 1).reverse().join('');
  }
</script>
<script type="text/javascript">
  $(function() {
    function loadtabelpembelian() {
      var supplier = $("#kodesupplier").val();
      $("#tabelpembelian").load("<?php echo base_url(); ?>pembelian/tabelpembelian/" + supplier);
    }

    $("#nobukti").click(function() {
      var supplier = $("#kodesupplier").val();
      if (supplier == "") {
        swal("Oops!", "Silahkan Pilih Supplier terlebih dahulu!", "warning");
      } else {
        loadtabelpembelian();
        $("#datapembelian").modal("show");
      }

    });

    function loadgrandtotal() {
      var grandtot = $("#grandtot").val();
      $("#grandtotal").text(grandtot);
    }

    loadgrandtotal();

    $('.edit').click(function(e) {
      var nokontrabon = $(this).attr('data-nokontrabon');
      var nobukti = $(this).attr('data-nobukti');
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>pembelian/edit_detailkb',
        data: {
          nokontrabon: nokontrabon,
          nobukti: nobukti
        },
        cache: false,
        success: function(respond) {
          $("#loadeditkontrabon").html(respond);
          $("#editkontrabon").modal("show");
        }
      });

    });

    $(".hapus").click(function(e) {
      e.preventDefault();
      var nobon = $(this).attr("data-nokontrabon");
      var nobukti = $(this).attr("data-nobukti");
      $("#modal-hapus").modal("show");
      $("#nobon").val(nobon);
      $("#nobuktihapus").val(nobukti);
    });

    function resetBrg() {
      $("#nobukti").val("");
      $("#keterangan").val("");
      $("#jmlbayar").val("");
      $("#totalharga").val("");
    }

    $("#tambahbarang").click(function(e) {
      e.preventDefault();
      var nobukti = $("#nobukti").val();
      var keterangan = $("#keterangan").val();
      var jmlbayar = $("#jmlbayar").val();
      var supplier = $("#kodesupplier").val();
      var totalharga = $("#totalharga").val();
      var nokontrabon = $("#nokontrabon").val();

      var total = parseInt(totalharga.replace(/\./g, ""));
      var jmlbyr = parseInt(jmlbayar.replace(/\./g, ""));
      if (nobukti == "") {
        swal("Oops!", "Silahkan Pilih Bukti Pembelian !", "warning");
      } else if (jmlbayar == "") {
        swal("Oops!", "Jumlah Bayar Tidak Boleh Kosong!", "warning");
      } else if (jmlbyr > total) {
        swal("Oops!", "Jumlah Bayar Melebihi Total!" + total, "warning");
      } else {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>pembelian/insertitemkb',
          data: {
            nobukti: nobukti,
            keterangan: keterangan,
            jmlbayar: jmlbayar,
            supplier: supplier,
            nokontrabon: nokontrabon
          },
          cache: false,
          success: function(respond) {
            if (respond == 1) {
              swal("Oops!", "Data Sudah Di Inputkan!", "warning");
            }
            location.reload();
            resetBrg();
          }
        });
      }
    });
  });
</script>