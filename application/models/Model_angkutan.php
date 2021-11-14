<?php

class Model_angkutan extends CI_Model
{
  
  public function getDataAngkutan($rowno, $rowperpage, $no_surat_jalan = "", $tgl_mutasi_gudang = "")
  {

    $this->db->select('*');
    $this->db->from('angkutan');
    $this->db->join('mutasi_gudang_jadi', 'angkutan.no_surat_jalan = mutasi_gudang_jadi.no_dok','left');
    $this->db->order_by('tgl_mutasi_gudang', 'DESC');

    if ($no_surat_jalan != '') {
      $this->db->like('no_surat_jalan', $no_surat_jalan);
    }

    if ($tgl_mutasi_gudang != '') {
      $this->db->where('tgl_mutasi_gudang', $tgl_mutasi_gudang);
    }

    $this->db->limit($rowperpage, $rowno);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getrecordAngkutanCount($no_surat_jalan = "", $tgl_mutasi_gudang = "")
  {

    $this->db->select('count(*) as allcount');
    $this->db->from('angkutan');
    $this->db->join('mutasi_gudang_jadi', 'angkutan.no_surat_jalan = mutasi_gudang_jadi.no_dok','left');
    $this->db->order_by('tgl_mutasi_gudang', 'DESC');

    if ($no_surat_jalan != '') {
      $this->db->like('no_surat_jalan', $no_surat_jalan);
    }

    if ($tgl_mutasi_gudang != '') {
      $this->db->where('tgl_mutasi_gudang', $tgl_mutasi_gudang);
    }

    $query  = $this->db->get();
    $result = $query->result_array();
    return $result[0]['allcount'];
  }

  
  public function getDataKontrabon($rowno, $rowperpage, $no_kontrabon = "", $tgl_kontrabon = "",$keterangan = "")
  {

    $this->db->select('*');
    $this->db->from('kontrabon_angkutan');

    $this->db->order_by('kontrabon_angkutan.tgl_kontrabon', 'DESC');

    if ($no_kontrabon != '') {
      $this->db->like('no_kontrabon', $no_kontrabon);
    }

    if ($tgl_kontrabon != '') {
      $this->db->where('kontrabon_angkutan.tgl_kontrabon', $tgl_kontrabon);
    }

    if ($keterangan != '') {
      $this->db->like('keterangan', $keterangan);
    }


    $this->db->limit($rowperpage, $rowno);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getrecordKontrabonCount($no_kontrabon = "", $tgl_kontrabon = "", $keterangan = "")
  {

    $this->db->select('count(*) as allcount');
    $this->db->from('kontrabon_angkutan');

    $this->db->order_by('kontrabon_angkutan.tgl_kontrabon', 'DESC');

    if ($no_kontrabon != '') {
      $this->db->like('no_kontrabon', $no_kontrabon);
    }

    if ($keterangan != '') {
      $this->db->like('keterangan', $keterangan);
    }


    if ($tgl_kontrabon != '') {
      $this->db->where('kontrabon_angkutan.tgl_kontrabon', $tgl_kontrabon);
    }

    $query  = $this->db->get();
    $result = $query->result_array();
    return $result[0]['allcount'];
  }

  public function insert_angkutan(){

    $no_surat_jalan = $this->input->post('no_surat_jalan');
    $angkutan       = $this->input->post('angkutan');
    $tujuan         = $this->input->post('tujuan');
    $nopol          = $this->input->post('nopol');
    $tarif          = $this->input->post('tarif');
    $bs             = $this->input->post('bs');
    $tepung         = $this->input->post('tepung');
    $keterangan     = $this->input->post('keterangan');

    $data = array(
      'no_surat_jalan'  => $no_surat_jalan,
      'angkutan'        => $angkutan,
      'tujuan'          => $tujuan,
      'nopol'           => $nopol,
      'tarif'           => $tarif,
      'bs'              => $bs,
      'tepung'          => $tepung,
      'keterangan'      => $keterangan,
    );

    if($keterangan != 1){
      $this->db->insert('angkutan',$data);
    }else{
      $this->db->where('no_surat_jalan',$no_surat_jalan);
      $this->db->update('angkutan',$data);
    }
  }
  
  public function insert_detail(){

    $no_surat_jalan     = $this->input->post('no_surat_jalan');
    $no_kontrabon       = $this->input->post('no_kontrabon');

    $data = array(
      'no_surat_jalan'    => $no_surat_jalan,
      'no_kontrabon'      => $no_kontrabon,
    );

    $this->db->insert('detail_kontrabon_angkutan',$data);
  }

  public function listAngkutan($dari="",$sampai="",$angkutan){

    if($angkutan != ''){
      $angkutan = "AND angkutan = '".$angkutan."' ";
    }
    return $this->db->query("SELECT * FROM angkutan
    INNER JOIN mutasi_gudang_jadi ON mutasi_gudang_jadi.no_dok=angkutan.no_surat_jalan
    WHERE tgl_mutasi_gudang BETWEEN '$dari' AND '$sampai' "
    .$angkutan
    ." ORDER BY tgl_mutasi_gudang ");
  }
 
  public function insert_ledger(){

    $tgl_ledger         = $this->input->post('tgl_ledger');
    $cabang             = "PST";
    $tanggal            = explode("-", $tgl_ledger);
    $tahun              = substr($tanggal[0], 2, 2);
    $qledger            = "SELECT no_bukti FROM ledger_bank WHERE LEFT(no_bukti,7) = 'LR$cabang$tahun' ORDER BY no_bukti DESC LIMIT 1 ";
    $ceknolast          = $this->db->query($qledger)->row_array();
    $nobuktilast        = $ceknolast['no_bukti'];
    $nobukti            = buatkode($nobuktilast, 'LR' . $cabang . $tahun, 4);
    $pelanggan          = $this->input->post('pelanggan');
    $no_ref             = $this->input->post('no_ref');
    $keterangan         = $this->input->post('keterangan');
    $bank               = $this->input->post('via');
    $no_kontrabon       = $this->input->post('no_kontrabon');
    $bulan              = $tanggal[1];
    

    $jmlhangkutan = $this->db->query("SELECT SUM(tarif+bs+tepung) as jumlah FROM detail_kontrabon_angkutan
    INNER JOIN angkutan ON angkutan.no_surat_jalan=detail_kontrabon_angkutan.no_surat_jalan
    INNER JOIN mutasi_gudang_jadi ON mutasi_gudang_jadi.no_dok=angkutan.no_surat_jalan
    WHERE MONTH(tgl_mutasi_gudang) = '$bulan' AND no_kontrabon = '$no_kontrabon'
     ")->row_array();

    $jmlhhutang = $this->db->query("SELECT SUM(tarif+bs+tepung) as jumlah FROM detail_kontrabon_angkutan
    INNER JOIN angkutan ON angkutan.no_surat_jalan=detail_kontrabon_angkutan.no_surat_jalan
    INNER JOIN mutasi_gudang_jadi ON mutasi_gudang_jadi.no_dok=angkutan.no_surat_jalan
    WHERE MONTH(tgl_mutasi_gudang) != '$bulan' AND no_kontrabon = '$no_kontrabon' ")->row_array();

    if($jmlhangkutan['jumlah'] != ''){
      $data = array(
        'no_bukti'            => $nobukti,
        'tgl_ledger'          => $tgl_ledger,
        'bank'                => $bank,
        'no_ref'              => $no_ref,
        'pelanggan'           => $pelanggan,
        'keterangan'          => $keterangan,
        'kode_akun'           => '6-1114',
        'jumlah'              => $jmlhangkutan['jumlah'],
        'status_validasi'     => 1,
        'status_dk'           => 'D',
        'peruntukan'          => 'MP',
        'ket_peruntukan'      => 'PST',
      );
      $this->db->insert('ledger_bank',$data);
    }

    $qledgers            = "SELECT no_bukti FROM ledger_bank WHERE LEFT(no_bukti,7) = 'LR$cabang$tahun' ORDER BY no_bukti DESC LIMIT 1 ";
    $ceknolasts          = $this->db->query($qledgers)->row_array();
    $nobuktilasts        = $ceknolasts['no_bukti'];
    $nobuktis            = buatkode($nobuktilasts, 'LR' . $cabang . $tahun, 4);
    
    if($jmlhhutang['jumlah'] != ''){
      $data = array(
        'no_bukti'            => $nobuktis,
        'tgl_ledger'          => $tgl_ledger,
        'no_ref'              => $no_ref,
        'bank'                => $bank,
        'pelanggan'           => $pelanggan,
        'keterangan'          => $keterangan,
        'kode_akun'           => '2-1800',
        'jumlah'              => $jmlhhutang['jumlah'],
        'status_validasi'     => 1,
        'status_dk'           => 'D',
        'peruntukan'          => 'MP',
        'ket_peruntukan'      => 'PST',
      );
      $this->db->insert('ledger_bank',$data);
    }

    $updated = $this->db->query("SELECT * FROM detail_kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' ")->result();
    foreach ($updated as $d) {
      $data2 = array(
        'tgl_bayar'       => $tgl_ledger,
      );
      $this->db->where('no_surat_jalan',$d->no_surat_jalan);
      $this->db->update('angkutan',$data2);
    }
    $this->db->query("UPDATE kontrabon_angkutan SET status = '1' WHERE no_kontrabon = '$no_kontrabon' ");
    redirect('angkutan/kontrabon');
  }
  
  
  public function insert_kontrabon(){

    $no_kontrabon       = $this->input->post('no_kontrabon');
    $tgl_kontrabon      = $this->input->post('tgl_kontrabon');
    $keterangan         = $this->input->post('keterangan');

    $data = array(
      'tgl_kontrabon'       => $tgl_kontrabon,
      'no_kontrabon'        => $no_kontrabon,
      'keterangan'          => $keterangan,
    );

    $this->db->insert('kontrabon_angkutan',$data);

    $updated = $this->db->query("SELECT * FROM detail_kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' ")->result();
    foreach ($updated as $d) {
      $data2 = array(
        'tgl_kontrabon'       => $tgl_kontrabon,
      );
      $this->db->where('no_surat_jalan',$d->no_surat_jalan);
      $this->db->update('angkutan',$data2);
    }

    redirect('angkutan/kontrabon');
  }


  public function hapusangkutan(){
    $no_surat_jalan = $this->uri->segment(3);
    $this->db->query("DELETE FROM angkutan WHERE no_surat_jalan = '$no_surat_jalan' ");
    redirect('angkutan');
  }
  
  public function hapuskontrabon(){

    $no_kontrabon = str_replace(".","/",$this->uri->segment(3));
    $this->db->query("DELETE FROM kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' ");
    $updated = $this->db->query("SELECT * FROM detail_kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' ")->result();
    foreach ($updated as $d) {
      $data2 = array(
        'tgl_kontrabon'       => NULL,
      );
      $this->db->where('no_surat_jalan',$d->no_surat_jalan);
      $this->db->update('angkutan',$data2);
    }
    $this->db->query("DELETE FROM detail_kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' ");
    redirect('angkutan/kontrabon');
  }

  public function getDetailAngkutan(){
    
    $kontrabon       = $this->input->post('no_kontrabon');
    if($kontrabon != ""){
      $no_kontrabon       = $this->input->post('no_kontrabon');
    }else{
      $no_kontrabon = str_replace(".","/",$this->uri->segment(3));
    }
    return $this->db->query("SELECT * FROM detail_kontrabon_angkutan INNER JOIN angkutan ON angkutan.no_surat_jalan=detail_kontrabon_angkutan.no_surat_jalan
    INNER JOIN mutasi_gudang_jadi ON detail_kontrabon_angkutan.no_surat_jalan = mutasi_gudang_jadi.no_dok  WHERE no_kontrabon = '$no_kontrabon' ");
  }

  public function getAngkutan(){
  
    $no_kontrabon = str_replace(".","/",$this->uri->segment(3));
    return $this->db->query("SELECT * FROM  kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' ");
  }
  
  public function getDetailAngkutanCount(){
    
    $no_kontrabon         = $this->input->post('no_kontrabon');
    $no_surat_jalan       = $this->input->post('no_sj');
    return $this->db->query("SELECT * FROM detail_kontrabon_angkutan WHERE no_kontrabon = '$no_kontrabon' AND no_surat_jalan = '$no_surat_jalan' ");
  }

  
  public function hapus_detailkontrabon(){
    
    $no_surat_jalan       = $this->input->post('no_surat_jalan');
    $this->db->query("DELETE FROM detail_kontrabon_angkutan WHERE no_surat_jalan = '$no_surat_jalan' ");
  }


  function jsonPilihSuratJalan()
  {
    $no_surat_jalan = '';
    $data =  $this->db->query("SELECT no_surat_jalan FROM detail_kontrabon_angkutan")->result();
  
    $this->datatables->select('no_surat_jalan,tgl_mutasi_gudang,FORMAT(tarif,"c") AS tarif,FORMAT(bs,"c") AS bs,FORMAT(tepung,"c") AS tepung,angkutan.angkutan');
    $this->datatables->from('angkutan');
    $this->datatables->join('mutasi_gudang_jadi', 'angkutan.no_surat_jalan = mutasi_gudang_jadi.no_dok','left');
    $this->datatables->where('angkutan.tgl_kontrabon', NULL);
    $this->datatables->where('angkutan.tarif!=', 0);
    foreach ($data as $d) {
      $data = array(
        $this->db->where_not_in('angkutan.no_surat_jalan',$d->no_surat_jalan)
      );
    }
    $this->datatables->add_column('view', '<a href="#"  data-toggle="modal" data-sj="$1" data-tgl="$2"  data-tarif="$3"  data-bs="$4"  data-tepung="$5" data-angkutan="$" class="btn btn-danger btn-sm waves-effect pilih">Pilih</a>', 'no_surat_jalan,tgl_mutasi_gudang,tarif,bs,tepung,angkutan.angkutan');
    return $this->datatables->generate();
  }
  

}
