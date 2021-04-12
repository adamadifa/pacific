<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Data Maintenance
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-6 col-xs-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Maintenance</h4>
        </div>
        <div class="card-body">
        <form autocomplete="off" class="Form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>maintenance/insert_maintnanace">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <div class="form-group">
                    <label class="form-label">Nama Pemohon</label>
                    <input type="text" id="nama_pemohon" required name="nama_pemohon" class="form-control" placeholder="Nama Pemohon">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <div class="form-group">
                    <label class="form-label">Tanggal</label>
                    <input type="text" id="tanggal_pengajuan" required value="<?php echo date('Y-m-d');?>" name="tanggal_pengajuan" class="form-control" placeholder="Tanggal">
                  </div>
                </div>
              </div>
            </div>
            <?php if($cabang == "pusat"){ ?>
              <div class="row">
                <div class="col-md-12">
                  <label class="form-label">Departemen</label>
                  <div class="mb-3">
                    <div class="form-group">
                      <select id="departemen" name="departemen" class="form-select" required>
                        <option value="">-- Pilih Departemen --</option>
                        <option value="Pembelian">Pembelian</option>
                        <option value="Keuangan">Keuangan</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Gudang Bahan / Kemasan">Gudang Bahan / Kemasan</option>
                        <option value="Gudang Logisik">Gudang Logisik</option>
                        <option value="Gudang Jadi">Gudang Jadi</option>
                        <option value="Audit">Audit</option>
                        <option value="Produksi">Produksi</option>
                        <option value="PDQC">PDQC</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            <?php }else{ ?>
              <div class="row" hidden>
                <div class="col-md-12">
                  <label class="form-label">Cabang</label>
                  <div class="mb-3">
                    <div class="form-group">
                      <input type="text" required id="departemen" name="departemen" value="<?php echo $cabang;?>" class="form-control" placeholder="Cabang">
                    </div>
                  </div>
                </div>
              </div>
            <?php  } ?>
            <div class="row" hidden>
              <div class="col-md-12">
                <label class="form-label">Jenis Permohonan</label>
                <div class="mb-3">
                  <div class="form-group">
                    <input type="text" value="" id="jenis_permohonan" name="jenis_permohonan" class="form-control" placeholder="Jenis Permohonan">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="form-label">Keterangan</label>
                <div class="mb-3">
                  <div class="form-group">
                    <textarea type="text" required rows="20" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="row mb-3">
              <div class="form-group">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-label">Foto</div>
                    <div class="form-file">
                      <input type="file" id="foto" name="foto" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="row ">
              <div class="form-group">
                <div class="mb-3">
                  <div class="d-flex justify-content-end">
                    <button type="submit" name="simpan" class="btn btn-primary" value="1"><i class="fa fa-save mr-2"></i>SIMPAN</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

<script>
  flatpickr(document.getElementById('tanggal_pengajuan'), {});
</script>
