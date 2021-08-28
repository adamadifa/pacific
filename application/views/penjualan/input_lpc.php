<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-10">
      <div class="row">
        <div class="col-md-6 col-xs-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Pengiriman LPC</h4>
            </div>
            <div class="card-body">

              <form action="<?php echo base_url(); ?>komisi/approvetargetkomisi" method="POST">
                <div class="form-group mb-3">
                  <select name="bulan" id="bulan" class="form-select">
                    <option value="">Bulan</option>
                    <?php
                    $bl = date("m");
                    for ($i = 1; $i < count($bln); $i++) {
                    ?>
                      <option <?php if ($bl == $i) {
                                echo "selected";
                              } ?> value="<?php echo $i; ?>"><?php echo $bln[$i]; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <select name="tahun" class="form-select" id="tahun" name="tahun">
                    <option value="">Tahun</option>
                    <?php
                    $tahun = date("Y");
                    $tahunmulai = 2021;
                    for ($thn = $tahunmulai; $thn <= date('Y'); $thn++) {
                    ?>
                      <option <?php if ($tahun == $thn) {
                                echo "selected";
                              } ?> value="<?php echo $thn; ?>"><?php echo $thn; ?>
                      </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </form>
              <a href="#" class="btn btn-primary mb-3 inputlpc"> <i class="fa fa-plus mr-2"></i> Tambah</a>
              <div class="row clearfix">
                <div class="col-sm-12">
                  <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th>Cabang</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Tgl Kirim LPC</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="loadlpc">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <?php $this->load->view('menu/menu_penjualan_administrator'); ?>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="modalinputlpc" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Input Pengiriman LPC</h5>
      </div>
      <div class="modal-body">

        <div class="row mb-3">
          <?php if ($sess_cab == 'pusat') { ?>
            <div class="form-group">
              <select name="cabang" id="cabang" class="form-select">
                <option value="">-- Pilih Cabang --</option>
                <?php foreach ($cabang as $c) { ?>
                  <option value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                <?php } ?>
              </select>
            </div>
          <?php } else { ?>
            <input type="hidden" name="cabang" id="cabang" value="<?php echo $sess_cab; ?>">
          <?php } ?>
        </div>
        <div class="form-group mb-3">
          <select name="bulanlpc" id="bulanlpc" class="form-select">
            <option value="">Bulan</option>
            <?php
            $bl = date("m");
            for ($i = 1; $i < count($bln); $i++) {
            ?>
              <option <?php if ($bl == $i) {
                        echo "selected";
                      } ?> value="<?php echo $i; ?>"><?php echo $bln[$i]; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group mb-3">

          <select name="tahunlpc" class="form-select" id="tahunlpc" name="tahunlpc">
            <option value="">Tahun</option>
            <?php
            $tahun = date("Y");
            $tahunmulai = 2020;
            for ($thn = $tahunmulai; $thn <= date('Y'); $thn++) {
            ?>
              <option <?php if ($tahun == $thn) {
                        echo "selected";
                      } ?> value="<?php echo $thn; ?>"><?php echo $thn; ?>
              </option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="input-icon">
              <input type="date" id="tgl_lpc" name="tgl_lpc" class="form-control" placeholder="Tanggal LPC" />
              <span class="input-icon-addon"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <rect x="4" y="5" width="16" height="16" rx="2" />
                  <line x1="16" y1="3" x2="16" y2="7" />
                  <line x1="8" y1="3" x2="8" y2="7" />
                  <line x1="4" y1="11" x2="20" y2="11" />
                  <line x1="11" y1="15" x2="12" y2="15" />
                  <line x1="12" y1="15" x2="12" y2="18" />
                </svg>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group mb-3">
          <a href="#" class="btn btn-primary w-100" id="tambahlpc">Submit</a>
        </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div class="modal modal-blur fade" id="modaleditlpc" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Edit Pengiriman LPC</h5>
      </div>
      <div class="modal-body" id="loadeditlpc">


      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<script>
  flatpickr(document.getElementById('tgl_lpc'), {});
</script>
<script>
  $(function() {
    $(".inputlpc").click(function(e) {
      e.preventDefault();
      $("#modalinputlpc").modal("show");
    });

    function loadlpc() {
      var tahun = $("#tahun").val();
      var bulan = $("#bulan").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>/penjualan/loadlpc',
        data: {
          bulan: bulan,
          tahun: tahun
        },
        cache: false,
        success: function(respond) {
          $("#loadlpc").html(respond);
        }
      });
    }
    loadlpc();

    $("#bulan").change(function() {

      loadlpc();
    });

    $("#tahun").change(function() {
      loadlpc();
    });
    $("#tambahlpc").click(function(e) {
      e.preventDefault();
      var tgl_lpc = $("#tgl_lpc").val();
      var cabang = $("#cabang").val();
      var bulanlpc = $("#bulanlpc").val();
      var tahunlpc = $("#tahunlpc").val();

      if (tgl_lpc == "") {
        swal("Oops", "Tanggal LPC Harus Diisi !", "warning");
      } else if (cabang == "") {
        swal("Oops", "Cabang Harus Diisi !", 'warning');
      } else if (bulanlpc == "") {
        swal("Oops", "Bulan  Harus Diisi !", 'warning');
      } else if (tahunlpc == "") {
        swal("Oops", "Tahun Harus Diisi !", 'warning');
      } else {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>penjualan/insertlpc',
          data: {
            tgl_lpc: tgl_lpc,
            cabang: cabang,
            bulanlpc: bulanlpc,
            tahunlpc: tahunlpc
          },
          cache: false,
          success: function(respond) {
            if (respond == 1) {
              swal("Berhasil", "Data Berhasil Disimpan", "success");
            } else {
              swal("Oops", "Data Gagal Disimpan", "danger");
            }
            loadlpc();
            $("#modalinputlpc").modal("hide");
          }
        });
      }
    });
  });
</script>