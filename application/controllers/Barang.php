<?php

class Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model(array('Model_barang', 'Model_cabang'));
	}

	function view_api()
	{
		$this->template->load('template/template', 'template/test');
	}

	function view_barang($rowno = 0)
	{
		// Search text
		$cbg = $this->session->userdata('cabang');
		if (empty($cbg)) {

			$cabang    		  = "";
		} else {
			$cabang = $cbg;
		}
		$kategori_harga   = "";
		if ($this->input->post('submit') != NULL) {
			$cabang  = $this->input->post('cabang');
			$kategori_harga = $this->input->post('kategori_harga');
			$data     = array(
				'cabang'    		 => $cabang,
				'kategori_harga'   => $kategori_harga
			);
			$this->session->set_userdata($data);
		} else {
			if ($this->session->userdata('cabang') != NULL) {
				$cabang = $this->session->userdata('cabang');
			}
			if ($this->session->userdata('kategori_harga') != NULL) {
				$kategori_harga = $this->session->userdata('kategori_harga');
			}
		}
		// Row per page
		$rowperpage = 16;
		// Row position
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}

		if (empty($cabang) && empty($kategori_harga)) {
			$allcount = 0;
			$users_record = 0;
		} else {
			// All records count
			$allcount     = $this->Model_barang->getrecordBarang($cabang, $kategori_harga);
			// Get records
			$users_record = $this->Model_barang->getdataBarang($rowno, $rowperpage, $cabang, $kategori_harga);
		}

		$config['base_url']         = base_url() . 'barang/view_barang';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows']       = $allcount;
		$config['per_page']         = $rowperpage;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		// Initialize
		$this->pagination->initialize($config);
		$data['pagination']         = $this->pagination->create_links();
		$data['result']             = $users_record;
		$data['row']               	= $rowno;
		$data['cabang']            	= $cabang;
		$data['kategori_harga'] 	= $kategori_harga;
		$data['leveluser']		= $this->session->userdata('level_user');
		$data['cab'] = $this->Model_cabang->view_cabang()->result();
		$this->template->load('template/template', 'barang/view_barang', $data);
	}

	function view_barangcab()
	{
		$kodecabang 	= $this->input->post('kodecabang');
		$kategori_salesman = $this->input->post('kategori_salesman');
		$data['barang'] = $this->Model_barang->view_barangcab($kodecabang, $kategori_salesman)->result();
		$this->load->view('penjualan/view_barang', $data);
	}

	function view_barangcabgb()
	{
		$kodecabang 	= $this->input->post('kodecabang');
		$data['barang'] = $this->Model_barang->view_barangcab($kodecabang)->result();
		$this->load->view('penjualan/view_baranggb', $data);
	}

	function input_barang()
	{
		if (isset($_POST['submit'])) {
			$this->Model_barang->insert_barang();
			$this->session->set_flashdata(
				'msg',
				'<div class="alert bg-green alert-dismissible" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                 <i class="material-icons" style="float:left; margin-right:10px">check</i> Data Berhasil Di Simpan !
	          </div>'
			);
			redirect('barang/view_barang');
		} else {
			$data['cabang'] = $this->Model_cabang->view_cabang()->result();
			$this->load->view('barang/input_barang', $data);
		}
	}


	function edit_barang()
	{
		$id 			= $this->uri->segment(3);
		$data['getbrg'] = $this->Model_barang->get_barang($id)->row_array();

		$data['cabang'] = $this->Model_cabang->view_cabang()->result();
		$this->load->view('barang/edit_barang', $data);
	}

	function detail_barang()
	{
		$id 			= $this->uri->segment(3);
		$data['getbrg'] = $this->Model_barang->get_barang($id)->row_array();

		$data['cabang'] = $this->Model_cabang->view_cabang()->result();
		$this->load->view('barang/detail_barang', $data);
	}

	function hapus()
	{

		$kodebarang = $this->uri->segment(3);
		$this->Model_barang->hapus($kodebarang);
		$this->session->set_flashdata(
			'msg',
			'<div class="alert bg-green alert-dismissible" role="alert">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                 <i class="material-icons" style="float:left; margin-right:10px">check</i> Data Berhasil Di Hapus !
	          </div>'
		);
		redirect('barang/view_barang');
	}

	function view_barangcab_gj()
	{
		$kodecabang 	= $this->input->post('kodecabang');
		$data['barang'] = $this->Model_barang->view_barangcab($kodecabang)->result();
		$this->load->view('penjualan/view_barangcab_gj', $data);
	}

	function view_barangcab_gjbs()
	{
		$kodecabang 	= $this->input->post('kodecabang');
		$data['barang'] = $this->Model_barang->view_barangcab($kodecabang)->result();
		$this->load->view('repackreject/view_barangcab_gj', $data);
	}
}
