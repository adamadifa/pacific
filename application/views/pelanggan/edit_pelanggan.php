<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Edit Pelanggan
        </h2>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Pelanggan</h4>
        </div>
        <div class="card-body">
          <form autocomplete="off" class="pelangganForm" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>pelanggan/edit_pelanggan">
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">Kode Pelanggan</label>
                <div class="form-group">
                  <input readonly type="text" value="<?php echo $pel['kode_pelanggan']; ?>" id="kode_pelanggan" name="kode_pelanggan" class="form-control" placeholder="Kode Pelanggan" required>

                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">NIK</label>
                  <input type="text" id="nik" value="<?php echo $pel['nik']; ?>" name="nik" class="form-control" placeholder="NIK">
                </div>
              </div>
              <div class="col-md-6 ">
                <label class="form-label">NO Kartu Keluarga</label>
                <div class="form-group">
                  <input type="text" id="nokk" value="<?php echo $pel['no_kk']; ?>" name="nokk" class="form-control" placeholder="NO Kartu Keluarga">
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">Nama Pelanggan</label>
                <div class="form-group">
                  <input type="text" value="<?php echo $pel['nama_pelanggan']; ?>" id="nama_pelanggan" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan">
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">Tanggal Lahir</label>
                <div class="input-icon">
                  <input type="date" value="<?php echo $pel['tgl_lahir']; ?>" id="tgllahir" name="tgllahir" class="form-control" placeholder="Ex: 2018-07-16" />
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
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">Alamat</label>
                <div class="form-group">
                  <input type="text" value="<?php echo $pel['alamat_pelanggan']; ?>" id="alamat" name="alamat" class="form-control" placeholder="Alamat">
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-6">
                <label class="form-label">Kelurahan</label>
                <div class="form-group">
                  <input type="text" value="<?php echo $pel['kecamatan']; ?>" id="kecamatan" name="kecamatan" class="form-control" placeholder="Kecamatan">
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Kecamatan</label>
                <div class="form-group">
                  <input type="text" value="<?php echo $pel['kelurahan']; ?>" id="kelurahan" name="kelurahan" class="form-control" placeholder="Kelurahan">
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">Alamat Toko / Pengiriman</label>
                <div class="form-group">
                  <input type="text" value="<?php echo $pel['alamat_toko']; ?>" id="alamat_toko" name="alamat_toko" class="form-control" placeholder="Alamat Toko">
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">No HP</label>
                <div class="form-group">
                  <input type="text" value="<?php echo $pel['no_hp']; ?>" id="nohp" name="nohp" class="form-control" placeholder="No HP">
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-6">
                <label class="form-label">Pasar</label>
                <div class="form-group">
                  <input type="text" value="<?php echo $pel['pasar']; ?>" id="pasar" name="pasar" class="form-control" placeholder="Pasar">
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <label class="form-label">Hari</label>
                <div class="form-group">
                  <select id="hari" name="hari" class="form-select">
                    <option value="">-- Pilih Hari --</option>
                    <option <?php if ($pel['hari'] == "Senin") {
                              echo "selected";
                            } ?> value="Senin">Senin</option>
                    <option <?php if ($pel['hari'] == "Selasa") {
                              echo "selected";
                            } ?> value="Selasa">Selasa</option>
                    <option <?php if ($pel['hari'] == "Rabu") {
                              echo "selected";
                            } ?> value="Rabu">Rabu</option>
                    <option <?php if ($pel['hari'] == "Kamis") {
                              echo "selected";
                            } ?> value="Kamis">Kamis</option>
                    <option <?php if ($pel['hari'] == "Jumat") {
                              echo "selected";
                            } ?> value="Jumat">Jumat</option>
                    <option <?php if ($pel['hari'] == "Sabtu") {
                              echo "selected";
                            } ?> value="Sabtu">Sabtu</option>
                    <option <?php if ($pel['hari'] == "Minggu") {
                              echo "selected";
                            } ?> value="Minggu">Minggu</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">Cabang</label>
                <div class="form-group">
                  <select id="cabang" name="cabang" class="form-select">
                    <option value="">-- Pilih Cabang -- </option>
                    <?php foreach ($cabang as $c) { ?>
                      <option <?php if ($pel['kode_cabang'] == $c->kode_cabang) {
                                echo "selected";
                              } ?> value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">Salesman</label>
                <div class="form-group">
                  <select id="salesman" name="salesman" class="form-select">
                    <option value="">-- Pilih Salesman -- </option>
                    <?php foreach ($sales as $s) { ?>
                      <option <?php if ($pel['id_sales'] == $s->id_karyawan) {
                                echo "selected";
                              } ?> value="<?php echo $s->id_karyawan; ?>"><?php echo strtoupper($s->nama_karyawan); ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">Status Kepemilikan</label>
                <div class="form-group">
                  <select id="kepemilikan" name="kepemilikan" class="form-select">
                    <option value="">-- Pilih Kepemilikan -- </option>
                    <option <?php if ($pel['kepemilikan'] == "Sewa") {
                              echo "selected";
                            } ?> value="Sewa">Sewa</option>
                    <option <?php if ($pel['kepemilikan'] == "Milik Sendiri") {
                              echo "selected";
                            } ?> value="Milik Sendiri">Milik Sendiri</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">Lama Berjualan</label>
                <div class="form-group">
                  <select id="lama_berjualan" name="lama_berjualan" class="form-select">
                    <option value="">-- Pilih Lama Berjualan -- </option>
                    <option <?php if ($pel['lama_berjualan'] == "Kurang 1 Tahun") {
                              echo "selected";
                            } ?> value="Kurang 1 Tahun">Kurang 1 Tahun</option>
                    <option <?php if ($pel['lama_berjualan'] == "2-5 Tahun") {
                              echo "selected";
                            } ?> value="2-5 Tahun">2-5 Tahun</option>
                    <option <?php if ($pel['lama_berjualan'] == "Lebih 5 Tahun") {
                              echo "selected";
                            } ?> value="Lebih 5 Tahun">Lebih 5 Tahun</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">Limit Pelanggan</label>
                <div class="form-group">
                  <input type="text" id="limitpel" value="<?php echo $pel['limitpel']; ?>" name="limitpel" class="form-control" placeholder="Limit Pelanggan">
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">Jatuh Tempo</label>
                <div class="form-group">
                  <select name="jatuhtempo" class="form-select">
                    <option value="">Jatuh Tempo</option>
                    <option value="14" <?php if ($pel['jatuhtempo'] == 14) {
                                          echo "selected";
                                        } ?>>14</option>
                    <option value="30" <?php if ($pel['jatuhtempo'] == 30) {
                                          echo "selected";
                                        } ?>>30</option>
                    <option value="45" <?php if ($pel['jatuhtempo'] == 45) {
                                          echo "selected";
                                        } ?>>45</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-6">
                <label class="form-label">Latitude</label>
                <div class="form-group">
                  <input type="text" id="latitude" value="<?php echo $pel['latitude']; ?>" name="latitude" class="form-control" placeholder="Latitude" placeholder="Kecamatan">
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Longitude</label>
                <div class="form-group">
                  <input type="text" value="<?php echo $pel['longitude']; ?>" id="longitude" name="longitude" class="form-control" placeholder="Longitude">
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="form-group">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-label">Foto</div>
                    <div class="form-file">
                      <input type="hidden" value="<?php echo $pel['foto']; ?>" id="old_foto" name="old_foto" class="form-control" />
                      <input type="file" id="foto" name="foto" class="form-control" id="customFile">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="form-label">Status</label>
                <div class="form-group">
                  <select name="status_pelanggan" class="form-select" id="">
                    <option value="1" <?php if ($pel['status_pelanggan'] == 1) {
                                        echo "selected";
                                      } ?>>Aktif</option>
                    <option value="0" <?php if ($pel['status_pelanggan'] == 0) {
                                        echo "selected";
                                      } ?>>Non Aktif</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="form-group">
                <div class="d-flex justify-content-end">
                  <button type="submit" name="simpan" class="btn btn-primary" value="1"><i class="fa fa-save mr-2"></i>SIMPAN</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  flatpickr(document.getElementById('tgllahir'), {});
</script>
<script>
  $(function() {
    $('.pelangganForm').bootstrapValidator({
      message: 'This value is not valid',
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        nik: {
          message: 'NIK Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'NIK Harus Diisi !'
            }


          }
        },

        nokk: {
          validators: {
            notEmpty: {
              message: 'No KK Harus Diisi !'
            }


          }
        },

        nama_pelanggan: {
          validators: {
            notEmpty: {
              message: 'Nama Pelanggan Harus Diisi !'
            }


          }
        },

        alamat: {
          validators: {
            notEmpty: {
              message: 'Alamat Harus Diisi !'
            }


          }
        },

        kecamatan: {
          validators: {
            notEmpty: {
              message: 'Kecamatan Harus Diisi !'
            }


          }
        },

        nohp: {
          validators: {
            notEmpty: {
              message: 'No HP Harus Diisi !'
            }
          }
        },

        kelurahan: {
          validators: {
            notEmpty: {
              message: 'Kelurahan Harus Diisi !'
            }
          }
        },

        pasar: {
          validators: {
            notEmpty: {
              message: 'Pasar Harus Diisi !'
            }
          }
        },

        hari: {
          validators: {
            notEmpty: {
              message: 'Hari Harus Diisi !'
            }
          }
        },

        cabang2: {
          validators: {
            notEmpty: {
              message: 'Cabang Harus Diisi !'
            }
          }
        },

        salesman2: {
          validators: {
            notEmpty: {
              message: 'Salesman  Harus Diisi !'
            }
          }
        },



      }
    });
    $("#cabang2").change(function() {

      var id = $("#cabang2").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>pelanggan/get_salespel',
        data: {
          kode_cabang: id
        },
        cache: false,
        success: function(respond) {

          $("#salesman2").html(respond);


        }
      });

    });
  });
</script>