<div class="container-fluid">
    <!-- Page title -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    Input E-Memo
                </h2>
            </div>
        </div>
    </div>
    <!-- Content here -->
    <div class="row">
        <div class="col-md-6 col-xs-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Input E-Memo</h4>
                </div>
                <div class="card-body">
                    <form name="autoSumForm" autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>memo/update">
                        <div class="mb-3">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-barcode"></i>
                                </span>
                                <input type="hidden" value="<?php echo $memo['id']; ?>" name="id">
                                <input type="text" value="<?php echo $memo['no_memo']; ?>" id="no_memo" name="no_memo" class="form-control" placeholder="No Memo" required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" id="tanggal" value="<?php echo $memo['tanggal']; ?>" name="tanggal" value="<?php echo date("Y-m-d"); ?>" class=" form-control" placeholder="Tanggal" required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" id="judul_memo" value="<?php echo $memo['judul_memo']; ?>" name="judul_memo" class="form-control" placeholder="Judul Memo" required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <select name="kategori" id="kategori" class="form-select" required>
                                    <option value="">Kategori</option>
                                    <option value="SOP">SOP</option>
                                    <option value="SK">SK</option>
                                    <option value="BERITA ACARA">BERITA ACARA</option>
                                    <option value="IM">IM</option>
                                    <option value="JOB DESK">JOB DESK</option>
                                    <option value="WORK INSTRUCTION">WORK INSTRUCTION</option>
                                    <option value="LAINNYA">LAINNYA</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <select name="kode_dept" id="kode_dept" class="form-select">
                                    <option <?php if ($memo['kode_dept'] == "ALL") {
                                                echo "selected";
                                            } ?> value="ALL">All Departemen</option>
                                    <option <?php if ($memo['kode_dept'] == "MKT") {
                                                echo "selected";
                                            } ?> value="MKT">Marketing</option>
                                    <option <?php if ($memo['kode_dept'] == "ACC") {
                                                echo "selected";
                                            } ?> value="ACC">Accounting</option>
                                    <option <?php if ($memo['kode_dept'] == "KEU") {
                                                echo "selected";
                                            } ?> value="KEU">Keuangan</option>
                                    <option <?php if ($memo['kode_dept'] == "PMB") {
                                                echo "selected";
                                            } ?> value="PMB">Pembelian</option>
                                    <option <?php if ($memo['kode_dept'] == "GAF") {
                                                echo "selected";
                                            } ?> value="GAF">General Affair</option>
                                    <option <?php if ($memo['kode_dept'] == "PRD") {
                                                echo "selected";
                                            } ?> value="PRD">Produksi</option>
                                    <option <?php if ($memo['kode_dept'] == "GDG") {
                                                echo "selected";
                                            } ?> value="GDG">Gudang</option>
                                    <option <?php if ($memo['kode_dept'] == "MTC") {
                                                echo "selected";
                                            } ?> value="MTC">Maintenance</option>
                                    <option <?php if ($memo['kode_dept'] == "HRD") {
                                                echo "selected";
                                            } ?> value="HRD">HRD</option>
                                    <option <?php if ($memo['kode_dept'] == "AUDIT") {
                                                echo "selected";
                                            } ?> value="AUDIT">AUDIT</option>
                                    <option <?php if ($memo['kode_dept'] == "PDQC") {
                                                echo "selected";
                                            } ?> value="PDQC">PDQC</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-link"></i>
                                </span>
                                <input type="text" value="<?php echo $memo['link']; ?>" id="link" name="link" class="form-control" placeholder="Link" required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary btn-block"><i class="fa fa-send mr-2"></i>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(document.getElementById('tanggal'), {});
    });
</script>
<script>
    $(document).ready(function() {

    });
</script>