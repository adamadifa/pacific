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
                   <th>ID Sales</th>
                   <th>Nama Sales</th>
                   <th>Saldo Piutang</th>
                 </tr>
               </thead>
               <tbody id="loadsaldoawalpiutang">
               </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
     <div class="col-md-2">
       <?php
        $this->load->view('menu/menu_marketing_administrator');
        ?>
     </div>
   </div>
 </div>
 <script>
   $(function() {
     function loadsaldoawalpiutang() {
       var cabang = $("#cabang").val();
       var bulan = $("#bulan").val();
       var tahun = $("#tahun").val();
       $.ajax({
         type: 'POST',
         url: '<?php echo base_url(); ?>komisi/loadsaldoawalpiutang',
         data: {
           cabang: cabang,
           bulan: bulan,
           tahun: tahun
         },
         cache: false,
         success: function(respond) {
           console.log(respond);
           $("#loadsaldoawalpiutang").html(respond);
         }
       });
     }
     $("#cabang").change(function() {
       loadsaldoawalpiutang();
     });
     $("#bulan").change(function() {
       loadsaldoawalpiutang();
     });
     $("#tahun").change(function() {
       loadsaldoawalpiutang();
     });
     $("#generatesaldopiutang").click(function(e) {
       e.preventDefault();
       var cabang = $("#cabang").val();
       var bulan = $("#bulan").val();
       var tahun = $("#tahun").val();
       if (cabang == "") {
         swal("Oops", "Cabang Harus Dipilih", "warning");
       } else if (bulan == "") {
         swal("Oops", "Bulan Harus Dipilih", "warning");
       } else if (tahun == "") {
         swal("Oops", "Tahun Harus Dipilih", "warning");
       } else {
         $.ajax({
           type: 'POST',
           url: '<?php echo base_url(); ?>komisi/generatesaldopiutang',
           data: {
             cabang: cabang,
             bulan: bulan,
             tahun: tahun
           },
           cache: false,
           success: function(respond) {
             console.log(respond);
             loadsaldoawalpiutang();
           }
         });
       }

     });
   });
 </script>