 <div class="container-fluid">
   <!-- Page title -->
   <div class="page-header">
     <div class="row align-items-center">
       <div class="col-auto">
         <h2 class="page-title">
           Saldo Awal Piutang
         </h2>
       </div>
     </div>
   </div>
   <!-- Content here -->
   <div class="row">
     <div class="col-md-10 col-xs-12">
       <div class="card">
         <div class="card-header">
           <h4 class="card-title"> Saldo Awal Piutang</h4>
         </div>
         <div class="card-body">
           <form method="post" action="#" autocomplete="off">
             <?php if ($cb == 'pusat') { ?>
               <div class="mb-3">
                 <select name="cabang" id="cabang" class="form-select">
                   <option value="">-- Pilih Cabang --</option>
                   <?php foreach ($cabang as $c) { ?>
                     <option <?php if ($cbg == $c->kode_cabang) {
                                echo "selected";
                              } ?> value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                   <?php } ?>
                 </select>
               </div>
             <?php } else { ?>
               <input type="hidden" name="cabang" id="cabang" value="<?php echo $cbg; ?>">
             <?php } ?>
             <div class="form-group mb-3">
               <select class="form-select" id="bulan" name="bulan">
                 <option value="">Bulan</option>
                 <?php for ($a = 1; $a <= 12; $a++) { ?>
                   <option <?php if ($bln == $a) {
                              echo "selected";
                            } ?> value="<?php echo $a;  ?>"><?php echo $bulan[$a]; ?></option>
                 <?php } ?>
               </select>
             </div>
             <div class="form-group mb-3">
               <select class="form-select" id="tahun" name="tahun">
                 <option value="">Tahun</option>
                 <?php for ($t = 2019; $t <= $tahun; $t++) { ?>
                   <option <?php if ($thn == $t) {
                              echo "selected";
                            } ?> value="<?php echo $t;  ?>"><?php echo $t; ?></option>
                 <?php } ?>
               </select>
             </div>
             <div class="mb-3">
               <button type="submit" name="submit" class="btn btn-primary btn-block mr-2" id="generatesaldopiutang" value="1"><i class="fa fa-gear mr-2"></i>Generate Saldo Awal Piutang</button>
             </div>
           </form>
           <hr>
           <div class="table-responsive">
             <table class="table table-bordered table-striped table-hover" style="width:100%" id="mytable">
               <thead class="thead-dark">
                 <tr>
                   <th width="10px">No</th>
                   <th>Bulan</th>
                   <th>ID Sales</th>
                   <th>Nama Sales</th>
                   <th>Saldo Piutang</th>
                 </tr>
               </thead>
               <tbody>
               </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
     <div class="col-md-2">
       <?php
        $this->load->view('menu/menu_kasbesar_administrator');
        ?>
     </div>
   </div>
 </div>
 <script>
   $(function() {
     $("#generatesaldopiutang").click(function(e) {
       e.preventDefault();

     });
   });
 </script>