<div class="container-fluid">
      <!-- Page title -->
      <div class="page-header">
            <div class="row align-items-center">
                  <div class="col-auto">
                        <h2 class="page-title">
                              Data Barang
                        </h2>
                  </div>
            </div>
      </div>
      <div class="row">
            <div class="col-md-6">
                  <div class="card">
                        <div class="card-header">
                              <div class="card-title">Ganti Password</div>
                        </div>
                        <div class="card-body">
                              <form action="<?php echo base_url(); ?>auth/updatepassword" method="POST">
                                    <input type="hidden" value="<?php echo $this->session->userdata('id_user'); ?>">
                                    <label for="" class="form-label">Password Lama</label>
                                    <div class="form-group mb-3">
                                          <input type="password" name="old_password" class="form-control">
                                    </div>
                                    <label for="" class="form-label">Password Baru</label>
                                    <div class="form-group mb-3">
                                          <input type="password" name="new_password" class="form-control">
                                    </div>
                                    <button class="btn btn-primary w-100"><i class="fa fa-key mr-2"></i> Ganti Password</button>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</div>