<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * HOME A-Care
 */
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Cek_login_lib');
		$this->cek_login_lib->logged_in();
		$this->load->model(array('M_home','M_info'));
	}

	public function tes()
	{
		// $this->db->select('t.telp_debitur');
		// $this->db->from('tes as a');
		// $this->db->join('telp_debitur as t', 't.id_debitur = a.id_debitur', 'inner');
		// $this->db->group_by('t.id_id_debitur');
		
		$this->db->order_by('no', 'asc');
		
		$hasil = $this->db->get('tes')->result_array();

		// print_r($hasil); exit();

		$array = array();
		foreach ($hasil as $t) {

			$this->db->from('ots');
			$this->db->where('id_debitur', $t['id_debitur']);
			$this->db->order_by('add_time', 'desc');
			// $this->db->select('*');
			// $this->db->from('alamat_debitur');
			// $this->db->where('id_debitur', $t['id_debitur']);
			// $this->db->order_by('add_time', 'desc');
			
			$ha = $this->db->get()->row_array();

			// $this->db->from('debitur');
			// $this->db->where('id_debitur', $t['id_debitur']);
			
			// $hasil = $this->db->get()->row_array();

			// $this->db->from('penempatan');
			// $this->db->where('id_capem_bank', $hasil['id_capem_bank']);
			
			// $id_kar = $this->db->get()->row_array();
			
			// if ($ha['telp_debitur'] == null) {
			// 	echo "-"."<br>";
			// } else {
			// 	echo $ha['telp_debitur']."<br>";
			// }
			
			echo $ha['id_ots']."<br>";
		}

		
	}

	// 03-03-2020

		public function index()
		{
			$data = [
				'judul'         => 'Home',
				'jenis_asset'   => $this->M_home->get_jenis_asset(),
				'rekanan'       => $this->M_home->get_data('m_rekanan'),
				'favorite'      => $this->M_home->tampil_favorite(),
				'siap_lelang'   => $this->M_home->jml_status_asset('Siap Lelang'),
				'siap_jual'     => $this->M_home->jml_status_asset('Siap Jual'),
				'nego_ulang'    => $this->M_home->jml_status_asset('Nego Ulang'),
				'proses'        => $this->M_home->jml_status_asset('Proses'),
				'tunggu_bayar'  => $this->M_home->jml_status_asset('Tunggu Bayar'),
				'wilayah'		=> $this->M_home->cari_cabang_wilayah()->result_array()
			];

			$this->template->load('layout/template', 'V_home', $data);
		}
	
	// Akhir 03-03-2020

    public function unduh_data($jenis, $id_jenis_asset)
    {
		$cari = $this->M_home->cari_data('m_jenis_asset', array('id_jenis_asset' => $id_jenis_asset))->row_array();

    	$data = [
			'asset' 	=> $this->M_home->get_data_asset($id_jenis_asset)->result_array(),
			'report'	=> 'Asset '.$cari['jenis_asset']
    	];

    	if ($jenis == 'excel') {
    		$this->template->load('template_excel', 'unduh/cetak_excel', $data);
    	} else {
    		$this->template->load('template_pdf', 'unduh/cetak_pdf', $data);
    	}
    	
    }
}