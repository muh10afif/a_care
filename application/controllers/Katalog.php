 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Katalog
 */
class Katalog extends CI_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('Cek_login_lib','pagination','upload'));
        $this->cek_login_lib->logged_in();
        $this->load->model(array('M_katalog','M_agunan'));
    }
    
    public function index()
    {
        $data = [
            'katalog1'          => 'aktif1',
            'jenis_asset'       => 'katalog',
            'j_asset'           => $this->M_katalog->get_jenis_asset()->result_array(),
            'jml_sudah_terjual' => $this->M_katalog->get_sdh_terjual(),
            'jml_belum_terjual' => $this->M_katalog->get_blm_terjual(),
            'd_jenis_asset'     => $this->M_katalog->get_jenis_asset()
        ];

    	$this->template->load('layout/template','V_katalog', $data);
    }

    /***************************************************************/
    /*                                                             */
    /*                      KATALOG ASSETS                         */
    /*                                                             */
    /***************************************************************/

    public function cetak_brosur($id_jenis_asset,$id)
    {
        $a = $this->M_katalog->cari_id_jenis_asset($id_jenis_asset)->row_array();

        $jenis_asset = $a['jenis_asset'];

        $data = [
            'foto'  => $this->M_katalog->get_data_brosur($jenis_asset, $id)->row_array()
        ];

        $this->load->view('cetak_brosur', $data);
    }

    public function asset($id_jenis_asset)
    {
        $a = $this->M_katalog->cari_id_jenis_asset($id_jenis_asset)->row_array();

        $jenis_asset = $a['jenis_asset'];

        // Jika telah menekan button pencarian
        if (isset($_POST['cari'])) {
                
            $order = $this->input->post('order');

            if ($order == 'asc') {
                $urut = "TERLAMA";
            } else {
                $urut = "TERBARU";
            }

            $kota  = $this->input->post('kota');
            $harga = $this->input->post('harga');
            if ($harga == 'asc') {
                $urut_h = "TERMURAH";
            } else {
                $urut_h = "TERMAHAL";
            }
            $cabang = $this->input->post('cabang');

             $data = [
                'katalog1'          => 'aktif1',
                'jenis_asset'       => $jenis_asset,
                'id_jenis_asset'    => $id_jenis_asset,
                'asset'             => $this->M_katalog->cari_data_asset($id_jenis_asset,$order,$kota,$harga,$cabang),
                'kota'              => $this->M_katalog->get_data_kota(),
                'cabang'            => $this->M_katalog->get_data_cabang(),
                'status'            => $this->M_katalog->get_status_asset(),
                'd_jenis_asset'     => $this->M_katalog->get_jenis_asset()
            ];

            if (!empty($order) && empty($kota) && empty($harga) && empty($cabang)) {
                 $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-filter"></i>Menampilkan filter data dari <b>'.$urut.'</b></div>');
            } elseif (empty($order) && !empty($kota) && empty($harga) && empty($cabang)) {
                 $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-filter"></i>Menampilkan filter data kota <b>'.$kota.'</b></div>');
            } elseif (empty($order) && empty($kota) && !empty($harga) && empty($cabang)) {
                 $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-filter"></i>Menampilkan filter Total Harga dari <b>'.$urut_h.'</b></div>');
            } elseif (empty($order) && empty($kota) && empty($harga) && !empty($cabang)) {
                 $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-filter"></i>Menampilkan filter data cabang <b>'.$cabang.'</b></div>');

            } elseif (!empty($order) && !empty($kota) && empty($harga) && empty($cabang)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-filter"></i>Menampilkan filter data kota <b>'.$kota.'</b> dari <b>'.$urut.'</b></div>');
            } elseif (!empty($order) && empty($kota) && !empty($harga) && empty($cabang)) {
                echo '<script type="text/javascript">
                      alert("Data tidak bisa difilter");
                        </script>';
            } elseif (!empty($order) && empty($kota) && empty($harga) && !empty($cabang)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-filter"></i>Menampilkan filter data cabang <b>'.$cabang.'</b> dari <b>'.$urut.'</b></div>');

            } elseif (empty($order) && !empty($kota) && !empty($harga) && empty($cabang)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-filter"></i>Menampilkan filter data kota <b>'.$kota.'</b> dari <b>'.$urut_h.'</b></div>');
            } elseif (empty($order) && empty($kota) && !empty($harga) && !empty($cabang)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-filter"></i>Menampilkan filter data cabang <b>'.$cabang.'</b> dari <b>'.$urut_h.'</b></div>');

            } elseif (empty($order) && !empty($kota) && !empty($harga) && !empty($cabang)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-filter"></i>Menampilkan filter data wilayah <b>'.$kota.'</b> Cabang Bank <b>'.$cabang.'</b> dari total harga <b>'.$urut_h.'</b></div>');  

            } elseif (!empty($order) && !empty($kota) && empty($harga) && !empty($cabang)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-filter"></i>Menampilkan filter data wilayah <b>'.$kota.'</b> Cabang Bank <b>'.$cabang.'</b> dari data <b>'.$urut.'</b></div>');  
                
            } elseif (!empty($order) && !empty($kota) && !empty($harga) && !empty($cabang)) {
                 echo '<script type="text/javascript">
                      alert("Data tidak bisa difilter, Pilih salah satu pengurutan menurut Harga atau Order By");
                        </script>';

            } 

        // belum melakukan aksi pencarian
        } else {
            $data = [
                'katalog1'          => 'aktif1',
                'jenis_asset'       => $jenis_asset,
                'id_jenis_asset'    => $id_jenis_asset,
                'asset'             => $this->M_katalog->get_data_asset($id_jenis_asset),
                'kota'              => $this->M_katalog->get_data_kota(),
                'cabang'            => $this->M_katalog->get_data_cabang(),
                'status'            => $this->M_katalog->get_status_asset(),
                'd_jenis_asset'     => $this->M_katalog->get_jenis_asset(),
                'status_dok'        => $this->M_katalog->get_data('status_info')->result_array(),
                'sifat_asset'       => $this->M_katalog->get_data('m_sifat_asset')->result_array()
            ];
        }
        
    	$this->template->load('layout/template', 'V_assets', $data);
    }

    // menampilkan data list debitur 
    public function tampil_deb_asset($id_jns_asset)
    {
        $dt = [ 'urutkan'       => $this->input->post('urutkan'),
                'id_kota'       => $this->input->post('wilayah'),
                'harga'         => $this->input->post('harga'),
                'cabang_bank'   => $this->input->post('cabang_bank'),
                'id_jns_asset'  => $id_jns_asset
        ];

        $list = $this->M_katalog->get_data_deb_asset($dt);

        $data = array();

        $no   = $this->input->post('start');

        foreach ($list as $o) {
            $no++;
            $tbody = array();

            $status_asset   = $o['id_status_asset'];
            $status_info    = $o['status_info'];
            $sifat_asset    = $o['id_sifat_asset'];
            $favorit        = $o['favorit'];
            $publis         = $o['publis'];
            
            if ($status_asset == null && $status_info == null && $sifat_asset == null && $favorit == null && $publis == null) {
                $status = "<span class='label label-info mr-2 mt-2'>Pilih Status</span>";
            } else {
                $status = '';
            }

            if ($status_asset != null) {
                $status .= "<span class='label label-success mr-2 mt-2'>Status ".$o['status_asset']."</span>";
            } else {
                $status .= '';
            }

            if ($status_info != null) {
                $status .= "<span class='label label-info mr-2 mt-2'>Dokumen ".$o['nama_si']."</span>";
            } else {
                $status .= '';
            }

            if ($sifat_asset != null) {
                $status .= "<span class='label label-warning mr-2 mt-2'>".$o['sifat_asset']."</span>";
            } else {
                $status .= '';
            }

            if ($publis != null) {
                if ($publis == 1) {
                    $publis = 'Publish';
                } else {
                    $publis = 'Tidak Publish';
                }
                $status .= "<span class='label label-success mr-2 mt-2'>".$publis."</span>";
            } else {
                $status .= '';
            }

            if ($favorit != null) {
                if ($favorit == 1) {
                    $favorit = 'Favorit';
                } else {
                    $favorit = 'Tidak Favorit';
                }
                $status .= "<span class='label label-primary mr-2 mt-2'>".$favorit."</span>";
            } else {
                $status .= '';
            }

            $tbody[]    = "<div align='center'>".$no."</div>";
            $tbody[]    = $o['nama_debitur'];
            $tbody[]    = $o['atas_nama'];
            $tbody[]    = $o['alamat'];
            $tbody[]    = $o['kota'];
            $tbody[]    = nice_date($o['add_time'], 'd-M-Y');
            $tbody[]    = "Rp. ".number_format($o['total_harga']);
            $tbody[]    = $o['cabang_bank'];
            $tbody[]    = "<span class='status' onclick='ubah_status(".$o['id_dokumen_asset'].",".$o['id_debitur'].")'>".$status."</span>";
            $tbody[]    = "<div align='center'><div align='center' id='namanya'><a href='".base_url('katalog/detail_asset/'.$o['id_jenis_asset'].'/'.$o['id_debitur'].'/'.$o['id_dokumen_asset'])."'><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-success btn-sm detail-asset' data-id='".$o['id_dokumen_asset']."'>Detail</button></a></div></div>";
            $data[]     = $tbody;
        }

        $output = [ "draw"             => $_POST['draw'],
                    "recordsTotal"     => $this->M_katalog->jumlah_semua_deb_asset($dt),
                    "recordsFiltered"  => $this->M_katalog->jumlah_filter_deb_asset($dt),   
                    "data"             => $data
                ];

        echo json_encode($output);
    }

    public function ambil_data_status($id_dok, $id_deb)
    {
        $data = $this->M_katalog->get_status($id_dok, $id_deb)->row();

        echo json_encode($data);
    }

    public function ubah_data_status()
    {
        $favorit    = $this->input->post('favorit');
        $status     = $this->input->post('status');
        $id         = $this->input->post('id_status');
        $publis     = $this->input->post('publis');
        $id_deb     = $this->input->post('id_debitur');
        $status_dok = $this->input->post('status_dok');
        $sifat_as   = $this->input->post('sifat_asset');

        $data = [
            'favorit'           => ($favorit == 'a') ? null : $favorit,
            'id_status_asset'   => ($status == 'a') ? null : $status,
            'publis'            => ($publis == 'a') ? null : $publis,
            'status_info'       => ($status_dok == 'a') ? null : $status_dok,
            'id_sifat_asset'    => ($sifat_as == 'a') ? null : $sifat_as
              
        ];

        $this->M_katalog->ubah_status(array('id_dokumen_asset' => $id, 'id_debitur' => $id_deb), $data); 

        echo json_encode(array('status' => true));

    }

    public function lihat_katalog($id_jenis_asset = NULL)
    {
        $a = $this->M_katalog->cari_id_jenis_asset($id_jenis_asset)->row_array();

        $jenis_asset = $a['jenis_asset'];
        
        if (isset($_POST['cari'])) {
            $data = [
                // 'foto' => $this->M_katalog->get_foto_bangunan(),
                'katalog1'          => 'aktif1',
                'jenis_asset'       => $jenis_asset,
                'id_jenis_asset'    => $id_jenis_asset,
                'kota'              => $this->M_katalog->get_data_kota(),
                'agen'              => $this->M_katalog->get_agen()
            ];

            $kota  = $this->input->post('kota');
            $harga = $this->input->post('harga');
            if ($harga == 'asc') {
                $urut_h = "TERMURAH";
            } else {
                $urut_h = "TERMAHAL";
            }

            $data['foto'] = $this->M_katalog->cari_get_foto_asset($jenis_asset, $kota, $harga)->result_array(); 

            if (!empty($kota) && empty($harga)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></i>Menampilkan filter data wilayah kota <b>'.$kota.'</b></div>');
            } elseif (empty($kota) && !empty($harga)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Menampilkan filter data dari total harga <b>'.$urut_h.'</b></div>');
            } elseif (!empty($kota) && !empty($harga)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Menampilkan filter data wilayah kota <b>'.$kota.'</b> dari total harga <b>'.$urut_h.'</b></div>');
            }

        } else {
            $data = [
                // 'foto' => $this->M_katalog->get_foto_bangunan(),
                'katalog1'          => 'aktif1',
                'jenis_asset'       => $jenis_asset,
                'id_jenis_asset'    => $id_jenis_asset,
                'kota'              => $this->M_katalog->get_data_kota(),
                'agen'              => $this->M_katalog->get_agen()
            ];
            

            //konfigurasi pagination
            $config['base_url']     = site_url("katalog/lihat_katalog/$id_jenis_asset"); //site url
            $config['total_rows']   = $this->M_katalog->get_foto_asset_h($jenis_asset); //total row
            $config['per_page']     = 60;  //show record per halaman
            $config["uri_segment"]  = 4;  // uri parameter
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"]    = floor($choice);

            // Membuat Style pagination untuk BootStrap v4
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
     
            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

            $data['foto']       = $this->M_katalog->get_foto_asset($id_jenis_asset,$config["per_page"], $data['page']);  
            $data['pagination'] = $this->pagination->create_links();
        }
 
    	$this->template->load('layout/template', 'V_kat_assets', $data);
    }

    public function get_pembeli()
    {
        $id = $this->input->post('id');

        $data = $this->M_katalog->get_calon_pembeli($id);

        echo json_encode($data);
        
    }

    public function detail_asset($id_jenis_asset,$id_debitur,$id_dokumen_asset, $aksi = 'tampil')
    {
        $a = $this->M_katalog->cari_id_jenis_asset($id_jenis_asset)->row_array();

        $jenis_asset = $a['jenis_asset'];
        
        $nm_deb = $this->M_katalog->cari_data('debitur', array('id_debitur' => $id_debitur))->row_array();

        $data = [
            'katalog1'          => 'aktif1',
            'detail'            => $this->M_katalog->get_detail_asset($jenis_asset,$id_debitur, $id_dokumen_asset)->row_array(),
            'fasilitas'         => $this->M_katalog->get_fasilitas($id_debitur, $id_dokumen_asset)->result_array(),
            'jenis_asset'       => $jenis_asset,
            'id_jenis_asset'    => $id_jenis_asset,
            'foto'              => $this->M_katalog->get_detail_foto($id_debitur, $id_dokumen_asset)->result_array(),
            'aksi'              => $aksi,
            'id_jenis_asset'    => $id_jenis_asset,
            'id_debitur'        => $id_debitur,
            'nama_debitur'      => $nm_deb['nama_debitur'],
            'id_dokumen_asset'  => $id_dokumen_asset,
            'd_jenis_asset'     => $this->M_katalog->get_jenis_asset(),
            'legalitas'         => $this->M_katalog->get_legalitas(),
            'd_fasilitas'       => $this->M_katalog->get_fasilitas_d()->result_array(),
            'sifat'             => $this->M_katalog->get_sifat_asset()->result_array(),
            'status_asset'      => $this->M_katalog->get_status_asset()->result_array(),
            'status_milik'	    => $this->M_agunan->get_data('m_status_milik')->result_array(),
        ];

        $data['jml_tampak_asset'] = $jml_tampak_asset  = $this->M_katalog->get_data_tampak_asset()->result_array();

        foreach ($jml_tampak_asset as $t) {
            $b = str_replace(" ", "_", $t['tampak_asset']);
            $c = str_replace("-", "_", $b);
            $a = 'foto_'.strtolower($c);

            $data[$a] = $this->M_katalog->get_detail_foto_e($id_debitur, $id_dokumen_asset, $t['id_tampak_asset'])->row_array();
        }

        $this->template->load('layout/template','V_detail_assets',$data);
    }

    // simpan foto
    public function simpan_foto($id_debitur, $id_dok_asset, $id_jenis_asset)
    {
        $id_tampak_foto = $this->input->post('tampak_foto');

        $nm = $this->M_katalog->cari_data('debitur', array('id_debitur' => $id_debitur))->row_array();
        $ft = $this->M_katalog->cari_data('tampak_asset', array('id_tampak_asset' => $id_tampak_foto))->row_array();

        $nama_deb       = $nm['nama_debitur'];
        $ft             = str_replace(' ', '_', $ft['tampak_asset']);
        $tampak_foto    = "Tampak_$ft";

        $max_id_dok_asset = $this->M_agunan->cari_max_id_dok_asset(array('id_debitur' => $id_debitur))->row_array();
        
        $max        = $max_id_dok_asset['max'] + 1;

        $config['upload_path']      = '../vcare_new/images/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '2048';

        $jml_foto = count($_FILES['foto_banyak']['name']);


        for ($i = 0; $i < $jml_foto; $i++) {

            $_FILES['foto_banyak[]']['name']       = $_FILES['foto_banyak']['name'][$i];
            $_FILES['foto_banyak[]']['type']       = $_FILES['foto_banyak']['type'][$i];
            $_FILES['foto_banyak[]']['tmp_name']   = $_FILES['foto_banyak']['tmp_name'][$i];
            $_FILES['foto_banyak[]']['error']      = $_FILES['foto_banyak']['error'][$i];
            $_FILES['foto_banyak[]']['size']       = $_FILES['foto_banyak']['size'][$i];

            $nama_baru  = strtoupper(trim($nama_deb)).'-('.date('Y-m-d').')-'.$tampak_foto.'-'.uniqid().'.png';
            $config['file_name']    = $nama_baru;

            $this->upload->initialize($config);

            $this->upload->do_upload('foto_banyak[]');

            $a        = $this->upload->data();

            $gbr    = $a['file_name'];

            if (!empty($_FILES['foto_banyak[]']['name'])) {

                $data_f = [ 'id_dokumen_asset'   => $id_dok_asset,
                            'foto'               => $gbr,
                            'id_tampak_asset'    => $id_tampak_foto,
                            'id_debitur'         => $id_debitur,
                            'status'             => 0
                            ];

                $this->M_agunan->simpan_file_foto($data_f);
            }
            
        }

        
        redirect("katalog/detail_asset/$id_jenis_asset/$id_debitur/$id_dok_asset/edit",'refresh');
        
    }

    // proses ubah detail asset yang baru
    public function ubah_detail_asset_baru()
    {
        $uri            = $this->input->post('uri');
        $id_j_asset     = $this->input->post('id_jenis_asset');

        $id_dok         = $this->input->post('id_dokumen_asset');
        $id_deb         = $this->input->post('id_debitur');
        $nama_deb       = $this->input->post('nama_deb');

        $ini_foto       = $this->input->post('ini_foto');
        $foto_lama      = $this->input->post('foto_lama');
        

        $max_id_dok_asset = $this->M_agunan->cari_max_id_dok_asset(array('id_debitur' => $id_deb))->row_array();

        $h_max      = $max_id_dok_asset['max'];
        
        $max        = $max_id_dok_asset['max'] + 1;

        $data = [
                 'id_dokumen_asset'     => $max,
                 'id_debitur'           => $id_deb,
                 'id_jenis_asset'       => $id_j_asset,

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

                 'id_jenis_dok'         => 2,
                 'status'               => 1 
                ];

        $this->M_agunan->proses_simpan_dok_agunan($data);

        $this->M_agunan->ubah_status_dok_agunan('dokumen_asset', array('status' => 0), array('id_dokumen_asset' => $id_dok, 'id_debitur' => $id_deb));

        $jml_tampak_asset  = $this->M_katalog->get_data_tampak_asset()->result_array();

        $nama_tampak = array();

        foreach ($jml_tampak_asset as $t) {

            $tampak = str_replace(" ", "_", $t['tampak_asset']);;
            $c      = str_replace("-", "_", $tampak);

            array_push($nama_tampak, $c);
        }

        // jika upload banyak foto -> tampak lain lain
        // jika ada value pada field ini foto
        if ($ini_foto) {
            
            if (empty($_FILES['foto_banyak']['name']['0'])) {
                
                $jml_foto_byk = $this->input->post('foto_lama_banyak');

                for ($i = 0; $i < count($jml_foto_byk); $i++) {

                    $ft = $jml_foto_byk[$i];

                    $data_f = ['id_dokumen_asset'   => $max,
                               'foto'               => $ft,
                               'id_tampak_asset'    => 6,
                               'id_debitur'         => $id_deb,
                               'status'             => 0
                              ];

                    $this->M_agunan->simpan_file_foto($data_f);
                    
                }

            } else {

                $config['upload_path']      = '../vcare_new/images/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '2048';

                $jml_foto = count($_FILES['foto_banyak']['name']);

                for ($i = 0; $i < $jml_foto; $i++) {

                    $_FILES['foto_banyak[]']['name']       = $_FILES['foto_banyak']['name'][$i];
                    $_FILES['foto_banyak[]']['type']       = $_FILES['foto_banyak']['type'][$i];
                    $_FILES['foto_banyak[]']['tmp_name']   = $_FILES['foto_banyak']['tmp_name'][$i];
                    $_FILES['foto_banyak[]']['error']      = $_FILES['foto_banyak']['error'][$i];
                    $_FILES['foto_banyak[]']['size']       = $_FILES['foto_banyak']['size'][$i];

                    $nama_baru  = strtoupper(trim($nama_deb)).'-('.date('Y-m-d').')-Tampak_Lain_lain'.'-'.uniqid().'.png';
                    $config['file_name']    = $nama_baru;

                    $this->upload->initialize($config);

                    $this->upload->do_upload('foto_banyak[]');

                    $a        = $this->upload->data();

                    $gbr    = $a['file_name'];

                    if (!empty($_FILES['foto_banyak[]']['name'])) {

                        $data_f = ['id_dokumen_asset'   => $max,
                                   'foto'               => $gbr,
                                   'id_tampak_asset'    => 6,
                                   'id_debitur'         => $id_deb,
                                   'status'             => 0
                                  ];

                        $this->M_agunan->simpan_file_foto($data_f);
                    }
                    
                }

            }

        // jika bukan foto banyak
        } else {
            
            for ($i = 0; $i < count($jml_tampak_asset) ; $i++) {
                if ($_FILES['foto']['name'][$i] == null) {
                    unset($_FILES['foto']['name'][$i]);
                }
            }

            if (empty($_FILES['foto']['name'])) {

                for ($i = 0; $i < count($jml_tampak_asset); $i++) {
                    if ($foto_lama[$i] != null) {
                        $ft = $foto_lama[$i];

                        $data_f = ['id_dokumen_asset'   => $max,
                                   'foto'               => $ft,
                                   'id_tampak_asset'    => $i+1,
                                   'id_debitur'         => $id_deb,
                                   'status'             => 0
                                  ];

                        $this->M_agunan->simpan_file_foto($data_f);
                    }
                }

            } else {

                for ($i = 0; $i < count($jml_tampak_asset); $i++) {
                    
                    if (!empty($_FILES['foto']['name'][$i])) {
                        $config['upload_path']      = '../vcare_new/images/';
                        $config['allowed_types']    = 'gif|jpg|png|jpeg';
                        $config['max_size']         = '2048';

                        $n = 'Tampak_'.$nama_tampak[$i];

                        $nama_baru              = strtoupper(trim($nama_deb)).'-('.date('Y-m-d').')-'.$n.'-'.uniqid().'.png';
                        $config['file_name']    = $nama_baru;

                        $this->upload->initialize($config);

                        $_FILES['foto[]']['name']     = $_FILES['foto']['name'][$i];
                        $_FILES['foto[]']['type']     = $_FILES['foto']['type'][$i];
                        $_FILES['foto[]']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                        $_FILES['foto[]']['error']    = $_FILES['foto']['error'][$i];
                        $_FILES['foto[]']['size']     = $_FILES['foto']['size'][$i];
                        
                        $this->upload->do_upload("foto[]");
                        $a      = $this->upload->data();

                        $gbr    = $a['file_name'];
                        
                        if (!empty($_FILES['foto']['name'][$i])) {
                            $v = $max_id_dok_asset['max'];

                            $data_f = ['id_dokumen_asset'   => $max,
                                       'foto'               => $gbr,
                                       'id_tampak_asset'    => $i+1,
                                       'id_debitur'         => $id_deb,
                                       'status'             => 0
                                      ];

                            $this->M_agunan->simpan_file_foto($data_f);
                        }
                    }

                }
            }

        }


        if ($uri == 'edit_deb') {
            redirect("katalog/detail_asset/$id_j_asset/$id_deb/$max/det_debitur");
        } else {
            redirect("katalog/detail_asset/$id_j_asset/$id_deb/$max/");
        }


    }

    public function ubah_detail_asset()
    {
        $uri        = $this->input->post('uri');
        $id_j_asset = $this->input->post('id_jenis_asset');

        $id_dok     = $this->input->post('id_dokumen_asset');
        $id_deb     = $this->input->post('id_debitur');
        $nama_deb   = $this->input->post('nama_deb');

        $jenis      = $this->input->post('jenis');
        $legalitas  = $this->input->post('legalitas');
        $alamat     = $this->input->post('alamat');
        $fasilitas  = $this->input->post('fasilitas');
        $sifat      = $this->input->post('sifat');
        $harga      = str_replace('.', '', $this->input->post('harga'));
        $status     = $this->input->post('status');
        $foto_lama  = $this->input->post('foto_lama');

        $max_id_dok_asset = $this->M_agunan->cari_max_id_dok_asset(array('id_debitur' => $id_deb))->row_array();

        $h_max      = $max_id_dok_asset['max'];
        
        $max        = $max_id_dok_asset['max'] + 1;

        $data       = [ 'id_dokumen_asset'   => $max,
                        'id_debitur'         => $id_deb,
                        'id_jenis_asset'     => $jenis,
                        'id_legalitas_asset' => $legalitas,
                        'alamat'             => $alamat,
                        'harga'              => $harga,
                        'id_sifat_asset'     => $sifat,
                        'id_status_asset'    => $status,
                        'status'             => 1,
                        'id_jenis_dok'       => 2
                      ];

        $this->M_agunan->proses_simpan_dok_agunan($data);

        $this->M_agunan->ubah_status_dok_agunan('dokumen_asset', array('status' => 0), array('id_dokumen_asset' => $id_dok, 'id_debitur' => $id_deb));

        for ($i = 0; $i < count($fasilitas); $i++) {

            $data = array('id_fasilitas_asset' => $fasilitas[$i],
                          'id_dokumen_asset'   => $max,
                          'id_debitur'         => $id_deb
                          );

            $this->M_agunan->simpan_fasilitas_asset($data);    
        }

        $jml_tampak_asset  = $this->M_katalog->get_data_tampak_asset()->result_array();

        $nama_tampak = array();

        foreach ($jml_tampak_asset as $t) {

            $tampak = str_replace(" ", "_", $t['tampak_asset']);;

            array_push($nama_tampak, $tampak);
        }

        for ($i = 0; $i < count($jml_tampak_asset) ; $i++) {
            if ($_FILES['foto']['name'][$i] == null) {
                unset($_FILES['foto']['name'][$i]);
            }
        }

        if (empty($_FILES['foto']['name'])) {

            for ($i = 0; $i < count($jml_tampak_asset); $i++) {
                if ($foto_lama[$i] != null) {
                    $ft = $foto_lama[$i];

                    $data_f = ['id_dokumen_asset'   => $max,
                               'foto'               => $ft,
                               'id_tampak_asset'    => $i+1,
                               'id_debitur'         => $id_deb
                              ];

                    $this->M_agunan->simpan_file_foto($data_f);
                }
            }

        } else {

            for ($i = 0; $i < count($jml_tampak_asset); $i++) {
                
                if ($_FILES['foto']['name'][$i]) {
                    $config['upload_path']      = '../vcare_new/images/';
                    $config['allowed_types']    = 'gif|jpg|png|jpeg';
                    $config['max_size']         = '2048';

                    $n = 'Tampak_'.$nama_tampak[$i];

                    $nama_baru              = strtoupper(trim($nama_deb)).'-('.date('Y-m-d').')-'.$n.'-'.uniqid().'.png';
                    $config['file_name']    = $nama_baru;

                    $this->upload->initialize($config);

                    $_FILES['foto[]']['name']     = $_FILES['foto']['name'][$i];
                    $_FILES['foto[]']['type']     = $_FILES['foto']['type'][$i];
                    $_FILES['foto[]']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                    $_FILES['foto[]']['error']    = $_FILES['foto']['error'][$i];
                    $_FILES['foto[]']['size']     = $_FILES['foto']['size'][$i];
                    
                    $this->upload->do_upload("foto[]");
                    $a      = $this->upload->data();

                    $gbr    = $a['file_name'];
                    
                    if (!empty($_FILES['foto']['name'][$i])) {
                        $v = $max_id_dok_asset['max'];

                        $data_f = ['id_dokumen_asset'   => $max,
                                   'foto'               => $gbr,
                                   'id_tampak_asset'    => $i+1,
                                   'id_debitur'         => $id_deb,
                                   'status'             => 0
                                  ];

                        $this->M_agunan->simpan_file_foto($data_f);
                    }
                }

            }
        }

        if ($uri == 'edit_deb') {
            redirect("katalog/detail_asset/$id_j_asset/$id_deb/$max/det_debitur");
        } else {
            redirect("katalog/detail_asset/$id_j_asset/$id_deb/$max/");
        }
        

    }

    // proses pilih foto detail asset
    public function proses_pilih_foto()
    {
        $id_deb     = $this->input->post('id_deb');
        $id_dok     = $this->input->post('id_dok');
        $id_jenis   = $this->input->post('id_jenis');
        $tampil     = $this->input->post('pilih_foto'); 
        $uri        = $this->input->post('uri');

        if (!empty($tampil)) {
            for ($i = 0; $i < count($tampil); $i++) {

                $data = ['status'   => 1 ];

                $this->M_katalog->update_status_foto('tr_foto_dokumen',array('id_foto_dokumen' => $tampil[$i]), $data);
            }

            $foto = $this->M_katalog->get_detail_foto_d($id_deb, $id_dok)->result_array();

            $a = array();
            foreach ($foto as $f) {
                array_push($a, $f['id_foto_dokumen']);
            }

            // mengecek perbedaan antara 2 array, menampilkan nilai yang tidak ada dikeduanya
            $cek = array_diff($a, $tampil);
        
            foreach ($cek as $c) {
                
                $data1 = ['status'   => 0];

                $this->M_katalog->update_status_foto('tr_foto_dokumen',array('id_foto_dokumen' => $c), $data1);
            }

        } else {
            $foto   = $this->M_katalog->get_detail_foto($id_deb, $id_dok)->result_array();

            foreach ($foto as $f) {

                $data2 = ['status'   => 0];

                $this->M_katalog->update_status_foto('tr_foto_dokumen',array('id_foto_dokumen' => $f['id_foto_dokumen']), $data2);
            }
        }

        echo json_encode(['status' => $tampil]);       
        
    }

}