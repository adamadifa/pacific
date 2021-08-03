<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          INPUT HPP
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-10 col-xs-12">
      <div class="row">
        <div class="col-md-7">

          <div class="card">
            <div class="card-header">
              <h4 class="card-title">INPUT HPP</h4>
            </div>
            <div class="card-body">
              <form class="form-horizontal" method="post" action="#" autocomplete="off">
                <div class="form-group mb-3">
                  <select class="form-select" id="bulan" name="bulan">
                    <option value="">Bulan</option>
                    <?php for ($a = 1; $a <= 12; $a++) { ?>
                      <option value="<?php echo $a;  ?>"><?php echo $bulan[$a]; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <select class="form-select" id="tahun" name="tahun">
                    <option value="">Tahun</option>
                    <?php for ($t = 2019; $t <= $tahun; $t++) { ?>
                      <option value="<?php echo $t;  ?>"><?php echo $t; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <select class="form-select" name="kodeproduk" id="kodeproduk">
                        <option value="">Pilih Produk</option>
                        <?php foreach ($produk as $p) { ?>
                          <option value="<?php echo $p->kode_produk; ?>"><?php echo $p->nama_barang; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <!-- Download SVG icon from http://tabler-icons.io/i/report-money -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                          <rect x="9" y="3" width="6" height="4" rx="2" />
                          <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                          <path d="M12 17v1m0 -8v1" />
                        </svg>
                      </span>
                      <input type="text" placeholder="Harga HPP" style="text-align: right;" name="hargahpp" id="hargahpp" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <a href="#" class="btn btn-primary" id="tambah_hpp"><i class="fa fa-plus mr-2"></i>Tambah</a>
                    </div>
                  </div>
                </div>
              </form>

              <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped table-hover" style="width:100%" id="mytable">
                  <thead class="thead-dark">
                    <tr>
                      <th>Kode Produk</th>
                      <th>Nama Barang</th>
                      <th>HPP</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="loadhpp">

                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <?php $this->load->view('menu/menu_accounting_administrator'); ?>
    </div>
  </div>
</div>

<script>
  $(function() {
    function loadhpp() {
      var bulan = $("#bulan").val();
      var tahun = $("#tahun").val();
      $.ajax({
        type: 'post',
        url: '<?php echo base_url(); ?>accounting/loadhpp',
        data: {
          bulan: bulan,
          tahun: tahun
        },
        cache: false,
        success: function(respond) {
          $("#loadhpp").html(respond);
        }
      });
    }

    loadhpp();
    $("#bulan").change(function(e) {
      e.preventDefault();
      loadhpp();
    });

    $("#tahun").change(function(e) {
      e.preventDefault();
      loadhpp();
    });
    $('#hargahpp').maskMoney();
    $("#tambah_hpp").click(function(e) {
      var bulan = $("#bulan").val();
      var tahun = $("#tahun").val();
      var kodeproduk = $("#kodeproduk").val();
      var hargahpp = $("#hargahpp").val();

      if (bulan == "") {
        swal("Oops", "Bulan Harus Dipilih !", "warning");
      } else if (tahun == "") {
        swal("Oops", "Tahun Harus Dipilih !", "warning");
      } else if (kodeproduk == "") {
        swal("Oops", "Produk Harus Dipilih !", "warning");
      } else if (hargahpp == "") {
        swal("Oops", "Harga Harus Diisi !", "warning");
      } else {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>accounting/inserthpp',
          data: {
            bulan: bulan,
            tahun: tahun,
            kodeproduk: kodeproduk,
            hargahpp: hargahpp
          },
          cache: false,
          success: function(respond) {
            if (respond == 1) {
              swal("Oops", "Data sudah diinputkan", "warning");
            } else {
              loadhpp();
            }
          }
        });
      }
    });


  });
</script>