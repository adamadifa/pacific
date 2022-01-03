<?php
error_reporting(0);
$jmldus     = floor($getbrg['stok'] / $getbrg['isipcsdus']);
$sisadus    = $getbrg['stok'] % $getbrg['isipcsdus'];

if ($getbrg['isipack'] == 0) {
  $jmlpack    = 0;
  $sisapack   = $sisadus;
} else {

  $jmlpack    = floor($sisadus / $getbrg['isipcs']);
  $sisapack   = $sisadus % $getbrg['isipcs'];
}

$jmlpcs = $sisapack;
?>
<form autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>barang/updatebarang">

  <label class="form-label">Kode Barang</label>
  <div class="form-group mb-2">
    <div class="form-line">
      <input type="text" readonly value="<?php echo $getbrg['kode_barang']; ?>" id="kodebarang" name="kodebarang" class="form-control" placeholder="Kode Barang" data-error=".errorTxt1" />

    </div>
    <div class="errorTxt1"></div>
  </div>
  <label class="form-label">Nama Barang</label>
  <div class="form-group mb-2">
    <div class="form-line">
      <input type="text" value="<?php echo $getbrg['nama_barang']; ?>" id="namabarang" name="namabarang" class="form-control" placeholder="Nama Barang" data-error=".errorTxt2" />

    </div>
    <div class="errorTxt2"></div>
  </div>


  <label class="form-label">Harga/Dus</label>
  <div class="form-grou mb-2">
    <div class="form-line">
      <input type="text" value="<?php echo $getbrg['harga_dus']; ?>" id="hargadus" name="hargadus" class="form-control" placeholder="Harga / Dus" data-error=".errorTxt4" />

    </div>
    <div class="errorTxt4"></div>
  </div>
  <label class="form-label">Harga/Pack</label>
  <div class="form-group mb-2">
    <div class="form-line">
      <input type="text" value="<?php echo $getbrg['harga_pack']; ?>" id="hargapack" name="hargapack" class="form-control" placeholder="Harga / Pack" data-error=".errorTxt5" />

    </div>
    <div class="errorTxt5"></div>
  </div>
  <label class="form-label">Harga/Pcs</label>
  <div class="form-group mb-2">
    <div class="form-line">
      <input type="text" value="<?php echo $getbrg['harga_pcs']; ?>" id="hargapcs" name="hargapcs" class="form-control" placeholder="Harga / Pcs" data-error=".errorTxt6" />

    </div>
    <div class="errorTxt6"></div>
  </div>
  <label class="form-label">Harga Retur/Dus</label>
  <div class="form-group mb-2">
    <div class="form-line">
      <input type="text" value="<?php echo $getbrg['harga_returdus']; ?>" id="hargareturdus" name="hargareturdus" class="form-control" placeholder="Harga / Dus" data-error=".errorTxt7" />

    </div>
    <div class="errorTxt7"></div>
  </div>
  <label class="form-label">Harga Retur/Pack</label>
  <div class="form-group mb-2">
    <div class="form-line">
      <input type="text" value="<?php echo $getbrg['harga_returpack']; ?>" id="hargareturpack" name="hargareturpack" class="form-control" placeholder="Harga / Pack" data-error=".errorTxt8" />

    </div>
    <div class="errorTxt8"></div>
  </div>
  <label class="form-label">Harga Retur/Pcs</label>
  <div class="form-group mb-2">
    <div class="form-line">
      <input type="text" value="<?php echo $getbrg['harga_returpcs']; ?>" id="hargareturpcs" name="hargareturpcs" class="form-control" placeholder="Harga / Pcs" data-error=".errorTxt9" />

    </div>
    <div class="errorTxt9"></div>
  </div>

  <div class="form-group mt-2">
    <button type="submit" name="submit" class="btn btn-primary">
      <i class="fa fa-save mr-2"></i> Simpan
    </button>
    <button type="button" data-dismiss="modal" class="btn btn-danger">
      Batalkan
    </button>
  </div>

</form>

<script type="text/javascript">
  $(function() {



    $("#cabang").change(function() {

      id = $("#cabang").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>pelanggan/get_salespel',
        data: {
          kode_cabang: id
        },
        cache: false,
        success: function(respond) {

          $("#salesman").html(respond);


        }
      });

    });
    $("#formValidate").validate({
      rules: {
        kodebarang: "required",
        namabarang: "required",
        kategori: "required",
        satuan: "required",
        hargadus: "required",
        hargapack: "required",
        hargapcs: "required",
        hargareturdus: "required",
        hargareturpack: "required",
        hargareturpcs: "required",
        stokdus: "required",
        stokpack: "required",
        stokpcs: "required",
        cabang: "required",
        jmlpcsdus: "required",
        jmlpackdus: "required",
        jmlpcspack: "required",
      },
      //For custom messages
      messages: {

        kodebarang: "Kode Barang Harus Diisi !",
        namabarang: "Nama Barang Harus Diisi !",
        kategori: "Kategori Harus Diisi !",
        satuan: "Satuan Harus Diisi !",
        hargadus: "Harga Dus Harus Diisi !",
        hargapack: "Harga Pack Harus Diisi !",
        hargapcs: "Harga Pcs Harus Diisi !",
        hargareturdus: "Harga Retur Dus Harus Diisi !",
        hargareturpack: "Harga Retur Pack Harus Diisi !",
        hargareturpcs: "Harga Retur PCs Harus Diisi !",
        stokdus: "Stok Dus Harus Diisi !",
        stokpack: "Stok Pack Harus Diisi !",
        stokpcs: "Stok Pcs Harus Diisi !",
        cabang: "Cabang Harus Diisi !",
        jmlpcsdus: "Jumlah Pcs / Dus Harus Diisi !",
        jmlpackdus: "Jumlah Pack / Dus Harus Diisi !",
        jmlpcspack: "Jumlah Pcs / Pack Harus Diisi !",
      },
      errorElement: 'div',
      errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
          $(placement).append(error)
        } else {
          error.insertAfter(element);
        }
      }
    });


  });
</script>