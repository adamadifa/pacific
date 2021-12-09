<?php

class Model_barang extends CI_Model
{

	function view_barang()
	{

		$cabang = $this->session->userdata('cabang');

		if ($cabang != "pusat") {

			$this->db->where('barang.kode_cabang', $cabang);
		}
		$this->db->select('kode_barang,nama_barang,kategori,satuan,harga_dus,harga_pack,harga_pcs,harga_returdus,harga_returpack,harga_returpcs,stok,isipcsdus,isipack,isipcs,nama_cabang');
		$this->db->from('barang');
		$this->db->join('cabang', 'barang.kode_cabang=cabang.kode_cabang');
		return $this->db->get();
	}


	public function getdataBarang($rowno, $rowperpage, $cabang = "", $kategori_harga = "")
	{
		$cbg = $this->session->userdata('cabang');
		if (!empty($cbg)) {
			if ($cbg != "pusat") {
				$this->db->where('barang.kode_cabang', $cbg);
			}
		} else {
			if (!empty($cabang)) {
				$this->db->where('barang.kode_cabang', $cabang);
			}
		}
		$this->db->select('kode_barang,nama_barang,kategori,satuan,harga_dus,harga_pack,harga_pcs,harga_returdus,harga_returpack,harga_returpcs,stok,isipcsdus,isipack,isipcs,nama_cabang,kategori_harga');
		$this->db->from('barang');
		$this->db->join('cabang', 'barang.kode_cabang=cabang.kode_cabang');
		if ($kategori_harga != '') {
			$this->db->where('kategori_harga', $kategori_harga);
		}
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		//echo $sampai;
		return $query->result_array();
	}

	// Select total records
	public function getrecordBarang($cabang, $kategori_harga)
	{
		$cbg = $this->session->userdata('cabang');
		if (!empty($cbg)) {
			if ($cbg != "pusat") {
				$this->db->where('barang.kode_cabang', $cbg);
			}
		} else {
			if (!empty($cabang)) {
				$this->db->where('barang.kode_cabang', $cabang);
			}
		}
		$this->db->select('count(kode_barang) as allcount');
		$this->db->from('barang');
		$this->db->join('cabang', 'barang.kode_cabang=cabang.kode_cabang');

		$cabang = $this->session->userdata('cabang');
		if ($kategori_harga != '') {
			$this->db->where('kategori_harga', $kategori_harga);
		}

		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	function view_barangcab($kodecabang, $kategori_salesman)
	{
		$this->db->where('kode_cabang', $kodecabang);
		if (!empty($kategori_salesman)) {
			$this->db->where('kategori_harga', $kategori_salesman);
		} else {
			$this->db->where('kategori_harga', 'NORMAL');
		}
		$this->db->order_by('kode_produk', 'ASC');
		$this->db->from('barang');
		return $this->db->get();
	}


	function get_barang($kodebarang)
	{
		$this->db->where('kode_barang', $kodebarang);
		return $this->db->get('barang');
	}


	function insert_barang()
	{

		$kodebarang 	= $this->input->post('kodebarang');
		$namabarang 	= $this->input->post('namabarang');
		$kategori 		= $this->input->post('kategori');
		$satuan 		 = $this->input->post('satuan');
		$hargadus 		= $this->input->post('hargadus');
		$hargapack 		= $this->input->post('hargapack');
		$hargapcs 		= $this->input->post('hargapcs');
		$hargareturdus 	= $this->input->post('hargareturdus');
		$hargareturpack = $this->input->post('hargareturpack');
		$hargareturpcs  = $this->input->post('hargareturpcs');
		$stokdus 		= $this->input->post('stokdus');
		$stokpack 		= $this->input->post('stokpack');
		$stokpcs 		= $this->input->post('stokpcs');

		$jmlpcsdus 		= $this->input->post('jmlpcsdus');
		$jmlpackdus 	= $this->input->post('jmlpackdus');
		$jmlpcspack     = $this->input->post('jmlpcspack');
		$cabang 		= $this->input->post('cabang');
		$stok 			= ($stokdus * $jmlpcsdus) + ($stokpack * $jmlpcspack) + $stokpcs;


		$data 			= array(


			'kode_barang' 		=> $kodebarang,
			'nama_barang' 		=> $namabarang,
			'kategori'    		=> $kategori,
			'satuan' 	  		=> $satuan,
			'harga_dus'   		=> $hargadus,
			'harga_pack'  		=> $hargapack,
			'harga_pcs'  		=> $hargapcs,
			'harga_returdus'	=> $hargareturdus,
			'harga_returpack' 	=> $hargareturpack,
			'harga_returpcs' 	=> $hargareturpcs,
			'isipcsdus' 		=> $jmlpcsdus,
			'isipack' 			=> $jmlpackdus,
			'isipcs' 			=> $jmlpcspack,
			'stok' 				=> $stok,
			'kode_cabang'		=> $cabang


		);

		$cek_data = $this->db->get_where('barang', array('kode_barang' => $kodebarang));
		if ($cek_data->num_rows() != 0) {
			$this->db->update('barang', $data, array('kode_barang' => $kodebarang));
		} else {

			$this->db->insert('barang', $data);
		}
	}


	function hapus($id)
	{
		$this->db->delete('barang', array('kode_barang' => $id));
	}

	function getMasterproduk()
	{
		return $this->db->get('master_barang');
	}
}
