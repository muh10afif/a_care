<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Information
 */
class Info extends CI_controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->library('Cek_login_lib');
		$this->cek_login_lib->logged_in();
        $this->load->model(array('M_info','M_home'));
	}
    
    // menampilkan halaman informasi
    public function index()
    {
        $data = [
            'jenis_asset'   => $this->M_home->get_jenis_asset()->result_array(),
            'informasi'     => $this->M_info->get_informasi()->result_array()
        ];

    	$this->template->load('layout/template','V_info_sk', $data);
    }

    // proses simpan informasi 
    public function simpan_informasi()
    {
        $informasi      = $this->input->post('informasi');
        $id_jns_info    = $this->input->post('id_jenis_informasi');
        
        foreach ($id_jns_info as $a => $value) {
            $nm_info = $informasi[$a];
            $id_jns  = $id_jns_info[$a];

            $cr = $this->M_info->cari_data('informasi', array('id_jenis_informasi' => $id_jns))->num_rows();

            if ($cr == 0) {
                $this->M_info->input_data('informasi', array('informasi' => $nm_info, 'id_jenis_informasi' => $id_jns));
            } else {
                $this->M_info->ubah_data('informasi', array('informasi' => $nm_info), array('id_jenis_informasi' => $id_jns));
            }
            
        }

        echo json_encode(['status' => TRUE]);
    }

    /***************************************************************/
    /*                                                             */
    /*                      JADWAL LELANG                          */
    /*                                                             */
    /***************************************************************/

    // menampilkan data jadwal lelang 
    public function tampil_jadwal_lelang()
    {
        $list = $this->M_info->get_jadwal_lelang();

        $data   = array();
        $no     = $this->input->post('start');

        foreach ($list as $a) {
            $no++;
            $tbody = array();

            $tbody[]    = "<div align='center'>".$no."</div>";
            $tbody[]    = $a['alamat'];
            $tbody[]    = $a['jenis_asset'];
            $tbody[]    = nice_date($a['jadwal_lelang'], 'd F Y');
            $tbody[]    = "<div align='center'><div align='center' id='namanya'><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-info btn-sm mr-3 edit-lelang' data-id='".$a['id_jadwal_lelang']."'>Edit</button><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-danger btn-sm hapus-lelang' data-id='".$a['id_jadwal_lelang']."'>Hapus</button></div></div>";

            // <div class='spinner-border spinner-border-sm text-info' id='spinner' hidden role='status'><span class='sr-only'>Loading...</span></div>

            $data[]     = $tbody;
        }

        $output = [ "draw"             => $_POST['draw'],
                    "recordsTotal"     => $this->M_info->jumlah_semua_jadwal_lelang(),
                    "recordsFiltered"  => $this->M_info->jumlah_filter_jadwal_lelang(),   
                    "data"             => $data
                ];

        echo json_encode($output);
    }

    // proses tambah jadwal lelang
    public function aksi_jadwal_lelang()
    {
        $id_jenis_asset     = $this->input->post('id_jenis_asset');
        $alamat             = $this->input->post('alamat');
        $tgl_lelang         = nice_date($this->input->post('tgl_lelang'), 'Y-m-d');
        $aksi               = $this->input->post('aksi');
        $id_jadwal_lelang   = $this->input->post('id_jadwal_lelang');

        $data_input = [ 'id_asset'      => $id_jenis_asset,
                        'alamat'        => $alamat,
                        'jadwal_lelang' => $tgl_lelang
                        ];
        
        if ($aksi == 'Tambah') {
            $this->M_info->input_data('jadwal_lelang', $data_input);
        } elseif($aksi == 'Edit') {
            $this->M_info->ubah_data('jadwal_lelang', $data_input, array('id_jadwal_lelang' => $id_jadwal_lelang));
        } else {
            $this->M_info->hapus_data('jadwal_lelang', array('id_jadwal_lelang' => $id_jadwal_lelang));
        }

        echo json_encode(['status' => TRUE]);
    }

    // proses ambil data jadwal lelang
    public function ambil_data_ajax_lelang($id_jadwal_lelang)
    {
        $where = ['id_jadwal_lelang' => $id_jadwal_lelang];

        $dl = $this->M_info->ambil_data_lelang($where)->row_array();

        $data = ['id_jadwal_lelang' => $dl['id_jadwal_lelang'],
                 'id_asset'         => $dl['id_asset'],
                 'alamat'           => $dl['alamat'],
                 'jadwal_lelang'    => nice_date($dl['jadwal_lelang'], 'd F Y')
                ];

        echo json_encode($data);
    }

    /***************************************************************/
    /*                                                             */
    /*                      DAFTAR REKANAN                         */
    /*                                                             */
    /***************************************************************/

    // menampilkan data daftar rekanan 
    public function tampil_daftar_rekanan()
    {
        $list = $this->M_info->get_daftar_rekanan();

        $data   = array();
        $no     = $this->input->post('start');

        foreach ($list as $a) {
            $no++;
            $tbody = array();

            $tbody[]    = "<div align='center'>".$no."</div>";
            $tbody[]    = $a['nama_rekanan'];
            $tbody[]    = "<div align='center'><div align='center' id='namanya'><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-info btn-sm mr-3 edit-rekanan' data-id='".$a['id_rekanan']."'>Edit</button><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-danger btn-sm hapus-rekanan' data-id='".$a['id_rekanan']."'>Hapus</button></div></div>";

            $data[]     = $tbody;
        }

        $output = [ "draw"             => $_POST['draw'],
                    "recordsTotal"     => $this->M_info->jumlah_semua_daftar_rekanan(),
                    "recordsFiltered"  => $this->M_info->jumlah_filter_daftar_rekanan(),   
                    "data"             => $data
                ];

        echo json_encode($output);
    }

    // proses aksi daftar rekanan 
    public function aksi_daftar_rekanan()
    {
        $id_rekanan     = $this->input->post('id_rekanan');
        $aksi_rekanan   = $this->input->post('aksi_rekanan');
        $nama_rekanan   = $this->input->post('nama_rekanan');
        
        if ($aksi_rekanan == 'Tambah') {
            $this->M_info->input_data('m_rekanan', array('nama_rekanan' => $nama_rekanan));
        } elseif($aksi_rekanan == 'Edit') {
            $this->M_info->ubah_data('m_rekanan', array('nama_rekanan' => $nama_rekanan), array('id_rekanan' => $id_rekanan));
        } else {
            $this->M_info->hapus_data('m_rekanan', array('id_rekanan' => $id_rekanan));
        }

        echo json_encode(['status' => TRUE]);
    }

    public function ambil_data_ajax_rekanan($id_rekanan)
    {
        $data = $this->M_info->get_ajax_rekanan($id_rekanan)->row();

        echo json_encode($data);
    }

    public function ubah_data_ajax_rekanan()
    {
        $data = ['nama_rekanan'=>$this->input->post('nama_rekanan')];

        $this->M_info->ubah_ajax_rekanan(array('id_rekanan' => $this->input->post('id_rekanan')),$data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-check"></i>Data Berhasil Diubah</div>');
        } else {
           $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-check"></i>Data Gagal Diubah</div>');
        }
        echo json_encode(array('status'=>TRUE));

    }

    public function tambah_rekanan()
    {
        $data = ['nama_rekanan'=>$this->input->post('nama_rekanan')];

        $this->M_info->simpan_rekanan($data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-check"></i>Data Berhasil Ditambahkan</div>');
        } else {
           $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-check"></i>Data Gagal Ditambahkan</div>');
        }

        echo json_encode(array('status'=>TRUE));

    }

    public function hapus_rekanan($id_rekanan)
    {
        $this->M_info->hapus_data_rekanan($id_rekanan);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible col-md-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-check"></i>Data Berhasil Dihapus</div>');
        } else {
           $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-check"></i>Data Gagal Dihapus</div>');
        }


        echo json_encode(array('status'=>TRUE));
    }

    // menampilkan data kontak
    public function tampil_kontak()
    {
        $data_kontak = $this->M_info->get_info_kontak()->result_array();

        $no = 1;
        foreach ($data_kontak as $d) {
            $tbody  = array();

            $id_kontak  = $d['id_kontak'];

            $tbody[]    = "<div align='center'>".$no++."</div>";
            $tbody[]    = $d['nama'];
            $tbody[]    = $d['no_telp'];
            $tbody[]    = $d['no_wa'];
            $aksi       = "<div align='center'><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-info btn-sm mr-3 edit-kontak' data-id='".$d['id_kontak']."'>Edit</button></div>";
            $tbody[]    = $aksi;
            $data[]     = $tbody;
        }

        if ($data_kontak) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
        
    }

    public function ambil_data_ajax_kontak($id_kontak)
    {
        $where = ['id_kontak'   => $id_kontak];

        $hasil = $this->M_info->get_data_kontak($where)->row();

        echo json_encode($hasil);
    }

    public function ubah_data_kontak()
    {
        $data = ['nama'     => $this->input->post('nama_kontak'),
                 'no_telp'  => $this->input->post('no_telp'),
                 'no_wa'    => $this->input->post('no_wa')     
                ];

        $where = ['id_kontak'   => $this->input->post('id_kontak')];

        $hasil = $this->M_info->ubah_data('kontak', $data, $where);

        echo json_encode($hasil);

    }

}