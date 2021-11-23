<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agunan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_agunan'));
		$this->load->library(array('upload','datatables','Cek_login_lib'));
		$this->cek_login_lib->logged_in();
	}

	//////////////////////////////////////////////////////////////
	//						DOKUMEN AGUNAN
	/////////////////////////////////////////////////////////////
	//						NON KELOLAAN
	/////////////////////////////////////////////////////////////

	public function tes()
	{
		$this->db->order_by('id_tes', 'asc');
		
		$hasil = $this->db->get('tes')->result_array();
		
		foreach ($hasil as $h) {
			// echo $h['Nama']."<br>";

			$b = strtolower($h['Nama']);

			$this->db->where("LOWER(nama_warga) LIKE '%$b%'");
			$a = $this->db->get('warga')->row_array();

			if ($a['id'] == null) {
				echo ""."<br>";
			} else {
				echo $a['id']."<br>";
			}
			
			
		}
		
	}

	public function non_kelolaan()
	{
		$data =	['a_non_kel'	=> 'a',
				 'aset' 		=> 'aktif',
    			 'asset'	  	=> $this->M_agunan->get_asset_debitur(0)->result_array(),
    			 'jenis_asset'	=> $this->M_agunan->get_jenis_asset()->result_array()
    			];

		$this->template->load('layout/template','V_dokumen_non_agunan', $data);
	}

	public function index()
	{
		$data = [ 'bank'		=> $this->M_agunan->get_data('m_bank')->result_array(),
				  'asuransi'	=> $this->M_agunan->get_data('m_asuransi')->result_array(),
				  'verifikator'	=> $this->M_agunan->get_verifikator()->result_array()
				];

		$this->template->load('layout/template', 'V_dokumen_agunan', $data);
	}

	// tampil data debitur kelolaan
	public function tampil_deb_kelolaan()
	{
		$dt = [ 'asuransi'          => $this->input->post('asuransi'),
                'cabang_asuransi'   => $this->input->post('cabang_asuransi'),
                'bank'              => $this->input->post('bank'),
                'cabang_bank'       => $this->input->post('cabang_bank'),
				'capem_bank'        => $this->input->post('capem_bank'),
				'ver'				=> $this->input->post('verifikator')
        ];

        $list = $this->M_agunan->get_data_deb_kelolaan($dt);

        $data   = array();
		$no     = $this->input->post('start');
		
		foreach ($list as $a) {
			$no++;
			$tbody = array();

			$tbody[]    = "<div align='center'>".$no."</div>";
			$tbody[]    = $a['nama_debitur'];
			$tbody[]    = $a['no_klaim'];
			$tbody[]    = $a['bank'];
			$tbody[]    = $a['cabang_bank'];
			$tbody[]    = $a['tgl_klaim'];
			$tbody[] 	= $a['cabang_asuransi'];
			// <a href="agunan/detail_agunan/$1"><button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Detail Dokumen Agunan"><i class="fa fa-info" aria-hidden="true"></i></button></a>
			$tbody[]    = "<div align='center'><a href='".base_url('agunan/detail_agunan/'.$a['id_debitur'])."'><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-info'>Detail</button></a></div>";
			$data[]     = $tbody;
		}
        
        $output = [ "draw"             => $_POST['draw'],
                    "recordsTotal"     => $this->M_agunan->jumlah_semua_deb_kelolaan($dt),
                    "recordsFiltered"  => $this->M_agunan->jumlah_filter_deb_kelolaan($dt),   
                    "data"             => $data
                ];

        echo json_encode($output);
	}

	// menampilkan list asset debitur 
	public function list_asset_deb()
	{
		$id_debitur = $this->input->post('id_debitur');

		$nm = $this->M_agunan->cari_data('debitur', array('id_debitur' => $id_debitur))->row_array();

		$data = [ 'nama_debitur'	=> $nm['nama_debitur'],
				  'id_debitur'		=> $id_debitur,
				  'jenis_asset'		=> $this->M_agunan->get_jenis_asset()->result_array()
				];

		$this->load->view('V_list_asset_deb', $data);
	}

	// menampilkan data asset debitur
	public function tampil_asset_deb($id_debitur)
	{
        $list = $this->M_agunan->get_asset_debitur($id_debitur)->result_array();

		$no     = 1;
		
		foreach ($list as $a) {
			$tbody = array();

			$tbody[]    = "<div align='center'>".$no++."</div>";
			$tbody[]    = "<div align='center'><input type='hidden' name='id_dok_asset[]' value='".$a['id_dokumen_asset']."'><input type='checkbox' class='pilih_asset' name='id_dok[]' value='".$a['id_dokumen_asset']."'></div>";
			$tbody[]    = $a['jenis_asset'];
			$tbody[]    = $a['alamat'];
			$tbody[]    = nice_date($a['tanggal_dok'], 'd F Y H:i:s');
			$tbody[]    = "<div align='center'><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-info detail-deb' data-id=".$a['id_debitur']." id_dok_asset=".$a['id_dokumen_asset'].">Detail</button></div>";
			$data[]     = $tbody;
		}

		if ($list) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
        
	}

	public function ambil_cabang_asuransi()
    {
        $id_asuransi = $this->input->post('id_asuransi');

        if ($id_asuransi == "a") {
            $option = "<option value='a'>-- Pilih Cabang Asuransi --</option>";
        } else {
            $list_as = $this->M_agunan->cari_cab_asuransi($id_asuransi)->result_array();

            $option = "<option value='a'>-- Pilih Cabang Asuransi --</option>";

            foreach ($list_as as $a) {
                $option .= "<option value='".$a['id_cabang_asuransi']."'>".$a['cabang_asuransi']."</option>";
            }
        }
        $data = ['cabang_as'    => $option];

        echo json_encode($data);
        
    }

    // menampilkan cabang bank 
    public function ambil_cabang_bank()
    {
        $id_bank = $this->input->post('id_bank');
        
        if ($id_bank == "a") {
            $option = "<option value='a'>-- Pilih Cabang Bank --</option>";
        } else {
            $list_bank = $this->M_agunan->cari_cab_bank($id_bank)->result_array();

            $option = "<option value='a'>-- Pilih Cabang Bank --</option>";

            foreach ($list_bank as $a) {
                $option .= "<option value='".$a['id_cabang_bank']."'>".$a['cabang_bank']."</option>";
            }
        }

        $option1 = "<option value='a'>-- Pilih Capem Bank --</option>";

        $data = ['cabang_bank'    => $option, 'option1' => $option1];

        echo json_encode($data);
    }

    // menampilkan capem bank
    public function ambil_capem_bank()
    {
        $id_cabang_bank = $this->input->post('id_cabang_bank');

        if ($id_cabang_bank == "a") {
            $option = "<option value='a'>-- Pilih Capem Bank --</option>";
        } else {
            $list_cap_b = $this->M_agunan->cari_cap_bank($id_cabang_bank)->result_array();

            $option = "<option value='a'>-- Pilih Capem Bank --</option>";

            foreach ($list_cap_b as $a) {
                $option .= "<option value='".$a['id_capem_bank']."'>".$a['capem_bank']."</option>";
            }
        }
        $data = ['capem_bank'    => $option];

        echo json_encode($data);
	}

	// menampilkan verifikator
    public function ambil_verifikator()
    {
        $id_capem_bank = $this->input->post('id_capem_bank');
        
        if ($id_capem_bank == "a") {

            $ver = $this->M_agunan->get_verifikator()->result_array();

            $option = "<option value='a'>-- Pilih Verfikator --</option>";

            foreach ($ver as $a) {
                $option .= "<option value='".$a['id_karyawan']."'>".$a['nama_lengkap']."</option>";
            }
            
        } else {
            $list_ver = $this->M_agunan->cari_ver($id_capem_bank)->result_array();

            $option = "<option value='a'>-- Pilih Verfikator --</option>";

            foreach ($list_ver as $a) {
                $option .= "<option value='".$a['id_karyawan']."'>".$a['nama_lengkap']."</option>";
            }
        }
        
        $data = ['ver'    => $option];

        echo json_encode($data);
    }

	function json() {
        header('Content-Type: application/json');
        echo $this->M_agunan->json_data_debitur();
    }

    public function pindah_data()
    {
    	$this->template->load('template','V_pindah_data');
    }

    // BUAT YANG BENER
    public function Proses_Coy()
    {
    	$list_debitur = $this->M_agunan->GetListDebitur()->result_array();
    	foreach ($list_debitur as $deb)
    	{
    		$id_deb = $deb['id_debitur'];
    		$id_dok = $deb['id_dokumen_asset'];
    		$fasilities = $this->M_agunan->get_fasilitas()->result_array();
    		foreach ($fasilities as $value) 
    		{
    			$id_fa 		= $value['id_fasilitas_asset'];
    			$nama_fa	= $value['fasilitas_asset'];

				$jumlah = $this->M_agunan->GetCount($id_dok,$id_deb, $id_fa);
    			$this->M_agunan->UpdateJumlah($nama_fa,$jumlah['jumlah'] ,$id_deb, $id_dok);
    		}
    	}
    }

    // halaman detail agunan
    public function detail_agunan($id_debitur)
    {
		$nm_deb = $this->M_agunan->cari_data('debitur', array('id_debitur' => $id_debitur))->row_array();

    	$data =	['aset' 		=> 'aktif',
    			 'a_kel'		=> 'a',
    			 'asset'	  	=> $this->M_agunan->get_asset_debitur($id_debitur)->result_array(),
				 'id_debitur' 	=> $id_debitur,
				 'nama_deb'		=> $nm_deb['nama_debitur'],
    			 'jenis_asset'	=> $this->M_agunan->get_jenis_asset()->result_array()
    			];

    	$this->template->load('layout/template', 'V_detail_debitur', $data);
    }

	// proses tambah agunan
	public function tambah_agunan($id_debitur, $jenis_asset)
	{
		$cek = $this->M_agunan->cek_id_deb('dokumen_asset', array('id_debitur' => $id_debitur, 'id_jenis_dok' => 2, 'status' => 1))->num_rows();

		$nm = $this->M_agunan->cari_data('debitur', array('id_debitur' => $id_debitur))->row_array();

		$data = ['aset' 		=> 'aktif',
				 'fasilitas'	=> $this->M_agunan->get_data('fasilitas_asset')->result_array(),
				 'legalitas'	=> $this->M_agunan->get_data('legalitas_asset')->result_array(),
				 'jenis'		=> $this->M_agunan->get_data('m_jenis_asset')->result_array(),
				 'sifat'		=> $this->M_agunan->get_data('m_sifat_asset')->result_array(),
				 'cek' 			=> $cek,
				 'id_debitur'	=> $id_debitur,
				 'nm_deb'		=> $nm['nama_debitur'],
				 'tampak_asset' => $this->M_agunan->get_tampak_asset()->result_array(),
				 'jenis_asset'	=> $jenis_asset,
				 'nm_asset'		=> $this->M_agunan->cari_data('m_jenis_asset', array('id_jenis_asset' => $jenis_asset))->row_array(),
				 'status_milik'	=> $this->M_agunan->get_data('m_status_milik')->result_array(),
				 'sifat_asset'	=> $this->M_agunan->get_data('m_sifat_asset')->result_array()
				];

		$da = $data['deb'] = $this->M_agunan->get_debitur($id_debitur)->row_array();

		$recov = $this->M_agunan->cari_recov($da['id_debitur'])->row_array();

		$data['shs']	= $da['subrogasi_as'] - $recov['hitung'];

		$this->template->load('layout/template', 'V_tambah_agunan', $data);
	}

	public function coba_input()
	{
		$a = '';
		$p = "Rumah'";

		$data = ['id_dokumen_asset'	=> 999,
				 'id_debitur'		=> 999,
				 'jml_lantai'		=> ($a == '') ? null : $a,
				 'batas_utara'		=> ''.$p.''
				];

		$this->db->insert('dokumen_asset', $data);
		
	}

	public function simpan_dok_agunan_baru_1()
	{
		$id_jenis_asset	= $this->uri->segment(3);
		$id_debitur 	= $this->uri->segment(4);

		$nama_deb 		= $this->input->post('nama_deb');
		$ini_foto 		= $this->input->post('ini_foto');

		$max_id_dok_asset = $this->M_agunan->cari_max_id_dok_asset(array('id_debitur' => $id_debitur))->row_array();

		$cari_id_debitur  = $this->M_agunan->cari_id_debitur(array('id_debitur' => $id_debitur))->num_rows();

		$h_max = $max_id_dok_asset['max'];
		
		$max = $max_id_dok_asset['max'] + 1;

		$tampak_asset = $this->M_agunan->get_tampak_asset()->result_array();

		$d_tampak = array();

		foreach ($tampak_asset as $t) {
			$tpk = str_replace(" ", "_", $t['tampak_asset']);
			array_push($d_tampak, $tpk);
		}

		if ($cari_id_debitur != 0) {
			// insert baru
			$data = [
					'id_dokumen_asset'		=> $max,
					'id_debitur'			=> $id_debitur,
					'id_jenis_asset'		=> $id_jenis_asset,

					'alamat'				=> $this->input->post('alamat'),
					'batas_utara'			=> $this->input->post('batas_utara'),
					'batas_selatan'			=> $this->input->post('batas_selatan'),
					'batas_barat'			=> $this->input->post('batas_barat'),
					'batas_timur'			=> $this->input->post('batas_timur'),
					'lokasi'				=> $this->input->post('lokasi'),
					'aksesbilitas'			=> $this->input->post('aksesbilitas'),
					'pusat_belanja'			=> $this->input->post('pusat_belanja'),
					'sekolah'				=> $this->input->post('sekolah'),
					'transportasi'			=> $this->input->post('transportasi'),
					'rekreasi'				=> $this->input->post('rekreasi'),
					'data_hunian'			=> $this->input->post('mayor_data_hunian'),
					'jaringan_listrik'		=> $this->input->post('jaringan_listrik'),
					'jaringan_air_bersih'	=> $this->input->post('jaringan_air_bersih'),
					'jaringan_telepon'		=> $this->input->post('jaringan_telepon'),
					'jaringan_gas'			=> $this->input->post('jaringan_gas'),
					'jalan_masuk'			=> $this->input->post('jalan_masuk'),
					'jalan_depan_objek'		=> $this->input->post('jalan_depan_objek'),
					'saluran_air'			=> $this->input->post('saluran_air'),
					'trotoar' 				=> $this->input->post('trotoar'),
					'jenis_tanah'			=> $this->input->post('jenis_tanah'),
					'penghijauan'			=> $this->input->post('penghijauan'),
					'penataan_lingkungan'	=> $this->input->post('penataan_lingkungan'),
					'resiko_banjir'			=> $this->input->post('resiko_banjir'),
					'tinggi_tanah'			=> $this->input->post('tinggi_tanah'),
					'tusuk_sate'			=> $this->input->post('tusuk_sate'),
					'sutet'					=> $this->input->post('sutet'),
					'lampu_jalan'			=> $this->input->post('lampu_jalan'),
					'jml_lantai'			=> ($this->input->post('jumlah_lantai') == '') ? null : $this->input->post('jumlah_lantai'),
					'konstruksi'			=> $this->input->post('konstruksi'),
					'pondasi'				=> $this->input->post('pondasi'),
					'dinding'				=> $this->input->post('dinding'),
					'partisi'				=> $this->input->post('partisi'),
					'lantai'				=> $this->input->post('lantai'),
					'langit'				=> $this->input->post('langit_langit'),
					'atap'					=> $this->input->post('atap'),
					'jendela'				=> $this->input->post('jendela'),
					'pintu'					=> $this->input->post('pintu'),
					'r_tamu'				=> ($this->input->post('ruang_tamu') == '') ? null : $this->input->post('ruang_tamu'),
					'r_keluarga'			=> ($this->input->post('ruang_keluarga') == '') ? null : $this->input->post('ruang_keluarga'),
					'k_tidur'				=> ($this->input->post('kamar_tidur') == '') ? null : $this->input->post('kamar_tidur'),
					'toilet'				=> ($this->input->post('toilet') == '') ? null : $this->input->post('toilet'),
					'dapur'					=> ($this->input->post('dapur') == '') ? null : $this->input->post('dapur'),
					'garasi'				=> $this->input->post('garasi'),
					'b_lain'				=> $this->input->post('bangunan_lain'),
					'jenis_dok'				=> $this->input->post('dokumen'),
					'l_tanah'				=> ($this->input->post('luas_tanah') == '') ? null : $this->input->post('luas_tanah'),
					'l_bangunan'			=> ($this->input->post('luas_bangunan') == '') ? null : $this->input->post('luas_bangunan'),
					'status_milik'			=> ($this->input->post('status_agunan') == '') ? null : $this->input->post('status_agunan'),
					'total_harga'			=> ($this->input->post('total_harga') == '') ? null : str_replace('.','',$this->input->post('total_harga')),
					'keterangan'			=> $this->input->post('ket_tambahan'),
					'no_telepon'			=> $this->input->post('telepon'),
					'nomor_polisi'			=> $this->input->post('nomor_polisi'),
					'nama_stnk'				=> $this->input->post('nama_pemilik_stnk'),
					'nomor_rangka'			=> $this->input->post('no_rangka'),
					'nomor_mesin'			=> $this->input->post('no_mesin'),
					'warna_kendaraan'		=> $this->input->post('warna_kdr'),
					'jenis_kendaraan'		=> $this->input->post('jenis_kendaraan'),
					'merek'					=> $this->input->post('merk'),
					'type_kendaraan'		=> $this->input->post('type_kdr'),
					'tahun_pembuatan'		=> $this->input->post('thn_buat'),
					'cc'					=> $this->input->post('cc'),
					'bahan_bakar'			=> $this->input->post('bahan_bakar'),
					'warna_tnkb'			=> $this->input->post('warna_tnkb'),
					'bentuk_tanah'			=> $this->input->post('bentuk_tanah'),
					'kawasan_property'		=> $this->input->post('kawasan_properti'),
					'lebar_jalan'			=> $this->input->post('lebar_jalan'),
					'listrik'				=> $this->input->post('listrik'),
					'atas_nama'				=> $this->input->post('atas_nama'),
					'nomor_bpkb'			=> $this->input->post('nomor_bpkb'),
					'bertemu'				=> $this->input->post('yang_dijumpai'),
					'status_pic'			=> $this->input->post('status_pic'),
					'penampungan_sampah'	=> $this->input->post('penampungan_sampah'),
					'kepadatan_bangunan'	=> $this->input->post('kepadatan_bangunan'),
					'pertumbuhan_bangunan'	=> $this->input->post('pertumbuhan_bangunan'),
					'nilai_taksiran'		=> ($this->input->post('nilai_taksiran') == '') ? null : str_replace('.','',$this->input->post('nilai_taksiran')),
					'lokasi_cat'			=> $this->input->post('lokasi_cat'),
					'wilayah'				=> $this->input->post('wilayah'),
					'air'					=> $this->input->post('air'),
					'pagar'					=> $this->input->post('pagar'),
					'bpkb'					=> $this->input->post('bpkb'),
					'pajak_berlaku'			=> $this->input->post('pajak_berlaku'),

					'id_jenis_dok'			=> 2,
					'status' 				=> 1 

				];

			$this->M_agunan->proses_simpan_dok_agunan($data);

			$config['upload_path'] 		= '../vcare/images/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2048';

			if ($ini_foto) {
				
				$jml_foto = count($_FILES['foto_banyak']['name']);

	            for ($i = 0; $i < $jml_foto; $i++) {

	                $_FILES['foto_banyak[]']['name']       = $_FILES['foto_banyak']['name'][$i];
	                $_FILES['foto_banyak[]']['type']       = $_FILES['foto_banyak']['type'][$i];
	                $_FILES['foto_banyak[]']['tmp_name']   = $_FILES['foto_banyak']['tmp_name'][$i];
	                $_FILES['foto_banyak[]']['error']      = $_FILES['foto_banyak']['error'][$i];
	                $_FILES['foto_banyak[]']['size']       = $_FILES['foto_banyak']['size'][$i];

	                $nama_baru 	= strtoupper(trim($nama_deb)).'-('.date('Y-m-d').')-Tampak_Lain_lain'.'-'.uniqid().'.png';
					$config['file_name']	= $nama_baru;

	                $this->upload->initialize($config);

	                $this->upload->do_upload('foto_banyak[]');

	                $a        = $this->upload->data();

	                $gbr 	= $a['file_name'];

					if (!empty($_FILES['foto_banyak[]']['name'])) {
						$v = $max_id_dok_asset['max'];

						$data_f = ['id_dokumen_asset'	=> $max,
								   'foto'				=> $gbr,
								   'id_tampak_asset'	=> 6,
								   'id_debitur'			=> $id_debitur,
								   'status'				=> 0
								  ];

						$this->M_agunan->simpan_file_foto($data_f);
					}
	                
	            }

			} else {
				for ($i = 0; $i <= count($tampak_asset); $i++) {

					if ($_FILES['foto'.$i]['name']) {
						

						$n = 'Tampak_'.$d_tampak[$i];

						$nama_baru 	= strtoupper(trim($nama_deb)).'-('.date('Y-m-d').')-'.$n.'-'.uniqid().'.png';
						$config['file_name']	= $nama_baru;

						
						$this->upload->initialize($config);
						
						$this->upload->do_upload("foto".$i);

						$a 		= $this->upload->data();

						/*$config['image_library'] 	= 'gd2';
				        $config['source_image'] 	= '../vcare/images/'.$a['file_name'];
				        $config['create_thumb'] 	= FALSE;
				        $config['maintain_ratio'] 	= TRUE;
				        $config['quality'] 			= '50%';
				        $config['width']         	= 800;
				        $config['new_image'] 		= '../vcare/images/'.$a['file_name'];
				        $this->load->library('image_lib', $config);
				        $this->image_lib->resize();*/

						$gbr 	= $a['file_name'];

						if (!empty($_FILES['foto'.$i]['name'])) {
							$v = $max_id_dok_asset['max'];

							$data_f = ['id_dokumen_asset'	=> $max,
									   'foto'				=> $gbr,
									   'id_tampak_asset'	=> $i+1,
									   'id_debitur'			=> $id_debitur,
									   'status'				=> 0
									  ];

							$this->M_agunan->simpan_file_foto($data_f);
						}
					}

				}

			}


		} else {
			// update data
			$data = [
				'id_dokumen_asset'		=> $max,
				'id_debitur'			=> $id_debitur,
				'id_jenis_asset'		=> $id_jenis_asset,

				'alamat'				=> $this->input->post('alamat'),
				'batas_utara'			=> $this->input->post('batas_utara'),
				'batas_selatan'			=> $this->input->post('batas_selatan'),
				'batas_barat'			=> $this->input->post('batas_barat'),
				'batas_timur'			=> $this->input->post('batas_timur'),
				'lokasi'				=> $this->input->post('lokasi'),
				'aksesbilitas'			=> $this->input->post('aksesbilitas'),
				'pusat_belanja'			=> $this->input->post('pusat_belanja'),
				'sekolah'				=> $this->input->post('sekolah'),
				'transportasi'			=> $this->input->post('transportasi'),
				'rekreasi'				=> $this->input->post('rekreasi'),
				'data_hunian'			=> $this->input->post('mayor_data_hunian'),
				'jaringan_listrik'		=> $this->input->post('jaringan_listrik'),
				'jaringan_air_bersih'	=> $this->input->post('jaringan_air_bersih'),
				'jaringan_telepon'		=> $this->input->post('jaringan_telepon'),
				'jaringan_gas'			=> $this->input->post('jaringan_gas'),
				'jalan_masuk'			=> $this->input->post('jalan_masuk'),
				'jalan_depan_objek'		=> $this->input->post('jalan_depan_objek'),
				'saluran_air'			=> $this->input->post('saluran_air'),
				'trotoar' 				=> $this->input->post('trotoar'),
				'jenis_tanah'			=> $this->input->post('jenis_tanah'),
				'penghijauan'			=> $this->input->post('penghijauan'),
				'penataan_lingkungan'	=> $this->input->post('penataan_lingkungan'),
				'resiko_banjir'			=> $this->input->post('resiko_banjir'),
				'tinggi_tanah'			=> $this->input->post('tinggi_tanah'),
				'tusuk_sate'			=> $this->input->post('tusuk_sate'),
				'sutet'					=> $this->input->post('sutet'),
				'lampu_jalan'			=> $this->input->post('lampu_jalan'),
				'jml_lantai'			=> ($this->input->post('jumlah_lantai') == '') ? null : $this->input->post('jumlah_lantai'),
				'konstruksi'			=> $this->input->post('konstruksi'),
				'pondasi'				=> $this->input->post('pondasi'),
				'dinding'				=> $this->input->post('dinding'),
				'partisi'				=> $this->input->post('partisi'),
				'lantai'				=> $this->input->post('lantai'),
				'langit'				=> $this->input->post('langit_langit'),
				'atap'					=> $this->input->post('atap'),
				'jendela'				=> $this->input->post('jendela'),
				'pintu'					=> $this->input->post('pintu'),
				'r_tamu'				=> ($this->input->post('ruang_tamu') == '') ? null : $this->input->post('ruang_tamu'),
				'r_keluarga'			=> ($this->input->post('ruang_keluarga') == '') ? null : $this->input->post('ruang_keluarga'),
				'k_tidur'				=> ($this->input->post('kamar_tidur') == '') ? null : $this->input->post('kamar_tidur'),
				'toilet'				=> ($this->input->post('toilet') == '') ? null : $this->input->post('toilet'),
				'dapur'					=> ($this->input->post('dapur') == '') ? null : $this->input->post('dapur'),
				'garasi'				=> $this->input->post('garasi'),
				'b_lain'				=> $this->input->post('bangunan_lain'),
				'jenis_dok'				=> $this->input->post('dokumen'),
				'l_tanah'				=> ($this->input->post('luas_tanah') == '') ? null : $this->input->post('luas_tanah'),
				'l_bangunan'			=> ($this->input->post('luas_bangunan') == '') ? null : $this->input->post('luas_bangunan'),
				'status_milik'			=> ($this->input->post('status_agunan') == '') ? null : $this->input->post('status_agunan'),
				'total_harga'			=> ($this->input->post('total_harga') == '') ? null : str_replace('.','',$this->input->post('total_harga')),
				'keterangan'			=> $this->input->post('ket_tambahan'),
				'no_telepon'			=> $this->input->post('telepon'),
				'nomor_polisi'			=> $this->input->post('nomor_polisi'),
				'nama_stnk'				=> $this->input->post('nama_pemilik_stnk'),
				'nomor_rangka'			=> $this->input->post('no_rangka'),
				'nomor_mesin'			=> $this->input->post('no_mesin'),
				'warna_kendaraan'		=> $this->input->post('warna_kdr'),
				'jenis_kendaraan'		=> $this->input->post('jenis_kendaraan'),
				'merek'					=> $this->input->post('merk'),
				'type_kendaraan'		=> $this->input->post('type_kdr'),
				'tahun_pembuatan'		=> $this->input->post('thn_buat'),
				'cc'					=> $this->input->post('cc'),
				'bahan_bakar'			=> $this->input->post('bahan_bakar'),
				'warna_tnkb'			=> $this->input->post('warna_tnkb'),
				'bentuk_tanah'			=> $this->input->post('bentuk_tanah'),
				'kawasan_property'		=> $this->input->post('kawasan_properti'),
				'lebar_jalan'			=> $this->input->post('lebar_jalan'),
				'listrik'				=> $this->input->post('listrik'),
				'atas_nama'				=> $this->input->post('atas_nama'),
				'nomor_bpkb'			=> $this->input->post('nomor_bpkb'),
				'bertemu'				=> $this->input->post('yang_dijumpai'),
				'status_pic'			=> $this->input->post('status_pic'),
				'penampungan_sampah'	=> $this->input->post('penampungan_sampah'),
				'kepadatan_bangunan'	=> $this->input->post('kepadatan_bangunan'),
				'pertumbuhan_bangunan'	=> $this->input->post('pertumbuhan_bangunan'),
				'nilai_taksiran'		=> ($this->input->post('nilai_taksiran') == '') ? null : str_replace('.','',$this->input->post('nilai_taksiran')),
				'lokasi_cat'			=> $this->input->post('lokasi_cat'),
				'wilayah'				=> $this->input->post('wilayah'),
				'air'					=> $this->input->post('air'),
				'pagar'					=> $this->input->post('pagar'),
				'bpkb'					=> $this->input->post('bpkb'),
				'pajak_berlaku'			=> $this->input->post('pajak_berlaku'),

				'id_jenis_dok'			=> 2,
				'status' 				=> 1 
				];

			$this->M_agunan->proses_simpan_dok_agunan($data);

			$config['upload_path'] 		= '../vcare/images/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2048';

			if ($ini_foto) {

				$jml_foto = count($_FILES['foto_banyak']['name']);

	            for ($i = 0; $i < $jml_foto; $i++) {

	                $_FILES['foto_banyak[]']['name']       = $_FILES['foto_banyak']['name'][$i];
	                $_FILES['foto_banyak[]']['type']       = $_FILES['foto_banyak']['type'][$i];
	                $_FILES['foto_banyak[]']['tmp_name']   = $_FILES['foto_banyak']['tmp_name'][$i];
	                $_FILES['foto_banyak[]']['error']      = $_FILES['foto_banyak']['error'][$i];
	                $_FILES['foto_banyak[]']['size']       = $_FILES['foto_banyak']['size'][$i];

	                $nama_baru 	= strtoupper(trim($nama_deb)).'-('.date('Y-m-d').')-Tampak_Lain_lain'.'-'.uniqid().'.png';
					$config['file_name']	= $nama_baru;

	                $this->upload->initialize($config);

	                $this->upload->do_upload('foto_banyak[]');

	                $a        = $this->upload->data();

	                $gbr 	= $a['file_name'];

					if (!empty($_FILES['foto_banyak[]']['name'])) {
						$v = $max_id_dok_asset['max'];

						$data_f = ['id_dokumen_asset'	=> 1,
								   'foto'				=> $gbr,
								   'id_tampak_asset'	=> 6,
								   'id_debitur'			=> $id_debitur,
								   'status'				=> 0
								  ];

						$this->M_agunan->simpan_file_foto($data_f);
					}
	                
	            }
				
			} else {

				for ($i = 0; $i <= count($tampak_asset); $i++) {

					if ($_FILES['foto'.$i]['name']) {

						$n = 'Tampak_'.$d_tampak[$i];

						$nama_baru 	= strtoupper(trim($nama_deb)).'-('.date('Y-m-d').')-'.$n.'-'.uniqid().'.png';
						$config['file_name']	= $nama_baru;

						$this->upload->initialize($config);
						
						$this->upload->do_upload("foto".$i);
						$a 		= $this->upload->data();
						$gbr 	= $a['file_name'];

						if (!empty($_FILES['foto'.$i]['name'])) {
							$v = $max_id_dok_asset['max'];

							$data_f = ['id_dokumen_asset'	=> 1,
									   'foto'				=> $gbr,
									   'id_tampak_asset'	=> $i+1,
									   'id_debitur'			=> $id_debitur,
									   'status'				=> 0
									  ];

							$this->M_agunan->simpan_file_foto($data_f);
						}
					}

				}
				
			}

		}

		if ($id_debitur == 0) {
			redirect('agunan/non_kelolaan/');
		} else {
			redirect('agunan/detail_agunan/'.$id_debitur);
		}

	}

	
	// proses ubah status debitur
	public function ubah_status_debitur($id_debitur)
	{
		$asset	  = $this->M_agunan->get_asset_debitur('dokumen_asset', array('id_debitur' => $id_debitur))->result_array();

		for ($i = 1; $i <= count($asset); $i++) {
			$id_dok_semua 	 = $this->input->post('id_dok_asset'.$i);
			
			$id_dok_terpilih = $this->input->post('id_dok'.$i);

			$hasil = array_diff($id_dok_semua, $id_dok_terpilih);

			foreach ($hasil as $h) {
				$this->M_agunan->ubah_status_deb('dokumen_asset',array('status' => 0), array('id_debitur' => $id_debitur, 'id_dokumen_asset' => $h));
			}

		}

		if ($id_debitur == 0) {
			redirect("agunan/non_kelolaan/");
		} else {
			redirect("agunan/detail_agunan/$id_debitur");
		}
		
		
	}

	// ubah status non kelolaan
	public function ubah_status_non_debitur($id_debitur = 0)
	{
		$id_dok_semua 	 = $this->input->post('id_dok_asset');
			
		$id_dok_terpilih = $this->input->post('id_dok');

		if (!empty($id_dok_terpilih)) {
			$hasil = array_diff($id_dok_semua, $id_dok_terpilih);

			foreach ($hasil as $h) {
				$this->M_agunan->ubah_status_deb('dokumen_asset',array('status' => 0), array('id_debitur' => $id_debitur, 'id_dokumen_asset' => $h));
			}
		} else {
			foreach ($id_dok_semua as $h) {
				$this->M_agunan->ubah_status_deb('dokumen_asset',array('status' => 0), array('id_debitur' => $id_debitur, 'id_dokumen_asset' => $h));
			}
		}

		echo json_encode(['status' => TRUE]);
	}

}

/* End of file Agunan.php */
/* Location: ./application/controllers/Agunan.php */