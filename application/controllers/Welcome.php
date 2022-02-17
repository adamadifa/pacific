<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function cekdpb()
	{
		$hariini = date("Y-m-d");
		$query = $this->db->query("SELECT kode_cabang FROM cabang WHERE kode_cabang NOT IN (SELECT kode_cabang FROM dpb WHERE tgl_pengambilan ='$hariini')")->result();
		echo json_encode($query);
	}


	function cekpenjualan()
	{
		$tanggal = date("Y-m-d");
		$day = date('D', strtotime($tanggal));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		if ($dayList[$day] == "Senin") {

			$tgl_kemarin    = date('Y-m-d', strtotime("-2 day", strtotime(date("Y-m-d"))));
		} else {
			$tgl_kemarin    = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
		}
		$query = $this->db->query("SELECT kode_cabang FROM cabang WHERE kode_cabang NOT IN (SELECT kode_cabang FROM penjualan INNER JOIN karyawan ON penjualan.id_karyawan = karyawan.id_karyawan WHERE tgltransaksi ='$tgl_kemarin') ")->result();


		echo json_encode($query);
	}
}
