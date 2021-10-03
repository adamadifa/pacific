<form autocomplete="off" class="Form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>pengajuan/updatePengajuanBarang">
  <div class="container-fluid">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
            EDIT DATA PENGAJUAN KE-PUSAT
          </h2>
        </div>
      </div>
    </div>
    <div class="col-md-12" style="zoom:90%">
      <div class="row">
        <div class="col-md-10">
          <!-- Content here -->
          <div class="row">
            <div class="col-md-5 col-xs-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">EDIT DATA PENGAJUAN KE-PUSAT</h4>
                </div>
                <div class="card-body">
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-barcode"></i>
                      </span>
                      <input type="hidden" value="" id="cekdata" name="cekdata" />
                      <input type="text" value="<?php echo $data['nobukti'];?>" id="nobukti" name="nobukti" class="form-control" placeholder="No Bukti Pengajuan" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-calendar-o"></i>
                      </span>
                      <input type="text" value="<?php echo $data['tanggal'];?>" id="tanggal" name="tanggal" class="form-control datepicker date" placeholder="Tanggal Pengajuan" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-book"></i>
                      </span>
                      <input type="text" value="<?php echo $data['nama_lengkap'];?>" id="nama_pemohon" name="nama_pemohon" class="form-control" placeholder="Nama Pemohon" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="mb-3">
                    <select class="form-control selectoption" id="keterangan" name="keterangan">
                      <option value="">Jenis Pengajuan</option>
                      <option <?php if($data['keterangan'] == "Barang"){ echo "selected"; }?> value="Barang">Barang</option>
                      <option <?php if($data['keterangan'] == "Jasa"){ echo "selected"; }?> value="Jasa">Jasa - Service</option>
                      <option <?php if($data['keterangan'] == "ATK"){ echo "selected"; }?> value="ATK">ATK</option>
                      <option <?php if($data['keterangan'] == "Lainnya"){ echo "selected"; }?> value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-book"></i>
                      </span>
                      <input type="text" value="<?php echo $data['foto'];?>" id="foto" name="foto" class="form-control" placeholder="Link Google Drive" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" name="submit" id="simpan" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-send mr-2"></i>Simpan</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-xs-12">
             
            </div>
          </div>
        </div>
        <div class="col-md-2">
        </div>
      </div>
    </div>
  </div>
</form>
<script>
  flatpickr(document.getElementById('tanggal'), {});
  $('.selectoption').selectize({});
</script>

<script>
  $(function() {

    function formatAngka(angka) {
      if (typeof(angka) != 'string') angka = angka.toString();
      var reg = new RegExp('([0-9]+)([0-9]{3})');
      while (reg.test(angka)) angka = angka.replace(reg, '$1,$2');
      return angka;
    }

    tampiltemp();

    function tampiltemp() {

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>pengajuan/viewDetailPengajuanBarangTemp',
        data: '',
        cache: false,
        success: function(html) {

          $("#loadpengajuan").html(html);

          $('#approval').val("");
          $('#approval').focus();

        }

      });

    }

    $("#simpan").click(function() {

      var nobukti = $('#nobukti').val();
      var tanggal = $('#tanggal').val();
      var nama_pemohon = $('#nama_pemohon').val();

      if (nobukti == 0) {

        swal("Oops!", "No Bukti Harus Diisi!", "warning");
        return false;

      } else if (nama_pemohon == '') {

        swal("Oops!", "Nama Pemohon Harus Diisi!", "warning");
        return false;

      }else if (tanggal == 0) {

        swal("Oops!", "Tanggal Harus Diisi!", "warning");
        return false;

      } else {

        return true;

      }

    });
    
  });
</script>