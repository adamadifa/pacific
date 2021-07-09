<table class="table table-bordered table-striped table-hover" style="width:100%"  id="mytable">
  <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>No SJ</th>
      <th>Tgl SJ</th>
      <th>Tarif</th>
      <th>BS</th>
      <th>Tepung</th>
      <th>Aksi</th>
    </tr>
  </thead>
</table>
<script type="text/javascript">
  $(function(){
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };
    var t = $("#mytable").dataTable({
      initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
        .off('.DT')
        .on('keyup.DT', function(e){
          if (e.keyCode == 13) {
            api.search(this.value).draw();
          }
        });
      },
      oLanguage: {
        sProcessing: "loading..."
      },
      processing    : true,
      serverSide    : true,
      bLengthChange : false,
      ajax          : {"url"  : "<?php echo base_url();?>angkutan/jsonPilihSuratJalan", "type": "POST"},
      columns       : [
      {
        "data"      : "no_surat_jalan",
        "orderable" : false
      },
      {"data": "no_surat_jalan"},
      {"data": "tgl_mutasi_gudang"},
      {"data": "tarif"},
      {"data": "bs"},
      {"data": "tepung"},
      {"data": "view"}
      ],
      order       : [[1, 'asc']],
      rowCallback : function(row, data, iDisplayIndex) {
        var info    = this.fnPagingInfo();
        var page    = info.iPage;
        var length  = info.iLength;
        var index   = page * length + (iDisplayIndex + 1);
        $('td:eq(0)', row).html(index);
      }
    });

    function formatAngka(angka) {
      if (typeof(angka) != 'string') angka = angka.toString();
      var reg = new RegExp('([0-9]+)([0-9]{3})');
      while (reg.test(angka)) angka = angka.replace(reg, '$1.$2');
      return angka;
    }

    $('#mytable tbody').on('click', '.pilih', function () {
      var no_sj      = $(this).attr('data-sj');
      var tgl        = $(this).attr('data-tgl');
      var tarif      = $(this).attr('data-tarif');
      var bs         = $(this).attr('data-bs');
      var tepung     = $(this).attr('data-tepung');

      $("#no_sj").val(no_sj);
      $("#tgl_surat_jalan").val(tgl);
      $("#tarif").val(formatAngka(tarif));
      $("#tepung").val(formatAngka(tepung));
      $("#bs").val(formatAngka(bs));

      var no_kontrabon  = $('#no_kontrabon').val();
      var no_sj         = $('#no_sj').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>angkutan/getDetailAngkutanCount',
        data: {
          no_sj        : no_sj,
          no_kontrabon : no_kontrabon
        },
        cache: false,
        success: function(html) {

          $("#cekdata").val(html);

        }
      });

      $("#datasuratjalan").modal('hide');
    });
  });
</script>
