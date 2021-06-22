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
		<div class="col-md-10 col-xs-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Edit COA</h4>
				</div>
                <div class="card-body">
                    <form autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>coa/edit_coa">

                        <label for="kode_pelanggan">Kode Akun</label>
                        <div class="form-group mb-3">
                            <div class="form-line">
                                <input type="text" readonly id="kode_akun" value="<?php echo $data['kode_akun'];?>" name="kode_akun" class="form-control" placeholder="Kode Akun" data-error=".errorTxt1" />
                            </div>
                            <div class="errorTxt1"></div>
                        </div>
                        <label for="nama_akun">Nama Akun</label>
                        <div class="form-group mb-3">
                            <div class="form-line">
                                <input type="text" id="nama_akun" value="<?php echo $data['nama_akun'];?> " name="nama_akun" class="form-control" placeholder="Nama Akun" data-error=".errorTxt1" />

                            </div>
                            <div class="errorTxt1"></div>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="submit" class="btn btn-primary waves-effect">
                                <span>SIMPAN</span>
                            </button>
                            <button type="button" data-dismiss="modal" class="btn btn-danger waves-effect">
                                <span>Batal</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/forms/advanced-form-elements.js"></script>
<script>
    $(function() {
        $("#sub_akun").selectize();
        $("form").submit(function() {

            var kode_akun = $("#kode_akun").val();
            var nama_akun = $("#nama_akun").val();

            if (kode_akun == "") {
                swal("Oops!", "Kode Akun Masih Kosong!", "warning");
                return false;
            } else if (nama_akun == "") {
                swal("Oops!", "Nama Akun BPBJ Masih Kosong!", "warning");
                return false;
            } else {
                return true;
            }


        });

    });
</script>