<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Laporan Kas Kecil
        </h2>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-10">
        <!-- Content here -->
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-dark text-white">
                <h4 class="card-title">Laporan Kas Kecil</h4>
              </div>
              <div class="card-body">
                <form class="formValidate FormPenjualan" id="formValidate" method="POST" action="<?php echo base_url(); ?>laporankaskecil/cetak_kaskecil" target="_blank">
                  <?php if ($cb == 'pusat') { ?>
                    <div class="form-group mb-3">
                      <select name="cabang" id="cabang" class="form-select">
                        <option value="">-- Semua Cabang --</option>
                        <?php foreach ($cabang as $c) { ?>
                          <option value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <?php } else { ?>
                    <input type="hidden" name="cabang" id="cabang" value="<?php echo $cb; ?>">
                  <?php } ?>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <select name="kodeakun1" id="kodeakun1" class="form-select">
                        <option value="">Kode Akun</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <select name="kodeakun2" id="kodeakun2" class="form-select">
                        <option value="">Kode Akun</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-icon">
                          <input id="dari" type="date" placeholder="Dari" class="form-control" name="dari" />
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

                      <div class="col-md-6 mb-3">
                        <div class="input-icon">
                          <input id="sampai" type="date" placeholder="Sampai" class="form-control" name="sampai" />
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
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <button type="submit" name="cetak" class="btn btn-primary btn-block">
                          <i class="fa fa-print mr-2"></i>
                          CETAK
                        </button>
                      </div>
                      <div class="col-md-6">
                        <button type="submit" name="export" class="btn btn-success btn-block">
                          <i class="fa fa-download mr-2"></i>
                          <span>EXPORT EXCEL</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <?php $this->load->view('menu/menu_keuangan_administrator'); ?>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('dari'), {});
    flatpickr(document.getElementById('sampai'), {});
  });
</script>
<script>
  $(function() {

    function loadkodeakun() {
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporankeuangan/get_coa',
        cache: false,
        success: function(respond) {
          $('#kodeakun1').selectize()[0].selectize.destroy();
          $('#kodeakun2').selectize()[0].selectize.destroy();
          $("#kodeakun1").html(respond);
          $("#kodeakun2").html(respond);
          $('#kodeakun1').selectize({});
          $('#kodeakun2').selectize({});
        }
      });
    }
    loadkodeakun();
    $('#pelanggan').selectize({});

    $('.formValidate').bootstrapValidator({
      message: 'This value is not valid',
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },

      fields: {
        
        dari: {
          validators: {
            notEmpty: {
              message: 'Peridoe Harus Diisi !'
            }
          }
        },
        sampai: {
          validators: {
            notEmpty: {
              message: 'Periode Harus Diisi !'
            }
          }
        },
      }
    });


  });
</script>