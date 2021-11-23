<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_agunan extends CI_Model 
{
	// fungsi cari data
	public function cari_data($tabel, $where)
	{
		return $this->db->get_where($tabel, $where);		
	}

	public function get_verifikator()
	{
		$this->db->select('k.nama_lengkap, k.id_karyawan');
        $this->db->from('karyawan k');
        $this->db->join('penempatan p', 'p.id_karyawan = k.id_karyawan', 'inner');
        $this->db->group_by('k.id_karyawan');
        $this->db->group_by('k.nama_lengkap');
        
        return $this->db->get();  
	}

	// mencari verfikator
	public function cari_ver($id_capem_bank)
	{
		$this->db->select('k.id_karyawan, k.nama_lengkap');
		$this->db->from('penempatan p');
		$this->db->join('karyawan k', 'k.id_karyawan = p.id_karyawan', 'inner');
		$this->db->where('p.id_capem_bank', $id_capem_bank);
		
		$this->db->group_by('k.id_karyawan')->group_by('k.nama_lengkap');
		
		return $this->db->get();
	}

	// server side debitur kelolaan
	public function get_data_deb_kelolaan($dt)
	{
		$this->_get_datatables_query_deb_kelolaan($dt);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
	}

	var $kolom_order_deb_kelolaan = [null, 'LOWER(d.nama_debitur)', 'LOWER(d.no_klaim)', 'LOWER(b.bank)', 'LOWER(cab.cabang_bank)', 'CAST(d.tgl_klaim AS VARCHAR)', 'LOWER(asu.cabang_asuransi)'];
    var $kolom_cari_deb_kelolaan  = ['LOWER(d.nama_debitur)', 'LOWER(d.no_klaim)', 'LOWER(b.bank)', 'LOWER(cab.cabang_bank)', 'CAST(d.tgl_klaim AS VARCHAR)', 'LOWER(asu.cabang_asuransi)'];
    var $order_deb_kelolaan       = ['d.nama_debitur' => 'asc'];

	public function _get_datatables_query_deb_kelolaan($dt)
	{
		$this->db->select('d.id_debitur, d.nama_debitur, d.tgl_klaim, d.no_klaim, cab.cabang_bank, cap.capem_bank, b.bank, asu.cabang_asuransi');
		$this->db->from('debitur as d');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','inner');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','inner');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
		$this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'left');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'left');

		if ($dt['asuransi'] != 'a') {
            $this->db->where('asr.id_asuransi', $dt['asuransi']);
        }
        if ($dt['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $dt['cabang_asuransi']);
        }
        if ($dt['bank'] != 'a') {
            $this->db->where('b.id_bank', $dt['bank']);
        }
        if ($dt['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $dt['cabang_bank']);
        }
        if ($dt['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $dt['capem_bank']);
		}
		if ($dt['ver'] != 'a') {
            $this->db->where('k.id_karyawan', $dt['ver']);
        }
		
		$b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_deb_kelolaan;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($b === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $b ) {
                    $this->db->group_end();
                }
            }

            $b++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->kolom_order_deb_kelolaan;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_deb_kelolaan)) {
            
            $order = $this->order_deb_kelolaan;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
	}

	public function jumlah_semua_deb_kelolaan($dt)
	{
		$this->db->select('d.id_debitur, d.nama_debitur, d.tgl_klaim, d.no_klaim, cab.cabang_bank, cap.capem_bank, b.bank, asu.cabang_asuransi');
		$this->db->from('debitur as d');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','inner');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','inner');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
		$this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'left');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'left');

		if ($dt['asuransi'] != 'a') {
            $this->db->where('asr.id_asuransi', $dt['asuransi']);
        }
        if ($dt['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $dt['cabang_asuransi']);
        }
        if ($dt['bank'] != 'a') {
            $this->db->where('b.id_bank', $dt['bank']);
        }
        if ($dt['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $dt['cabang_bank']);
        }
        if ($dt['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $dt['capem_bank']);
		}
		if ($dt['ver'] != 'a') {
            $this->db->where('k.id_karyawan', $dt['ver']);
        }

		return $this->db->count_all_results();
		
	}

	public function jumlah_filter_deb_kelolaan($dt)
	{
		$this->_get_datatables_query_deb_kelolaan($dt);
		return $this->db->get()->num_rows();
		
	}


	public function cari_cab_asuransi($id_asuransi)
    {
        $this->db->select('c.id_cabang_asuransi, c.cabang_asuransi');
        $this->db->from('m_asuransi as s');
        $this->db->join('m_korwil_asuransi as k', 'k.id_asuransi = s.id_asuransi', 'inner');
        $this->db->join('m_cabang_asuransi as c', 'c.id_korwil_asuransi = k.id_korwil_asuransi', 'inner');
        $this->db->where('s.id_asuransi', $id_asuransi);
        
        return $this->db->get();
        
    }

    // mencari cabang bank
    public function cari_cab_bank($id_bank)
    {
        $this->db->select('cb.cabang_bank, cb.id_cabang_bank');
        $this->db->from('m_bank as b');
        $this->db->join('m_cabang_bank as cb', 'cb.id_bank = b.id_bank', 'inner');
        $this->db->where('b.id_bank', $id_bank);
        
        return $this->db->get();
        
    }

    // mencari capem bank
    public function cari_cap_bank($id_cabang_bank)
    {
        $this->db->select('c.id_capem_bank, c.capem_bank');
        $this->db->from('m_cabang_bank as cb');
        $this->db->join('m_capem_bank as c', 'c.id_cabang_bank = cb.id_cabang_bank', 'inner');
        $this->db->where('cb.id_cabang_bank', $id_cabang_bank);
        
        return $this->db->get();
    }

	public function GetListDebitur()
	{
		return $this->db->get('dokumen_asset');
	}

	public function GetCount($id_dokumen,$id_debitur, $id_fasilitas)
	{
		$query = "SELECT COUNT(id_tr_fa) as jumlah FROM tr_fasilitas_asset WHERE id_fasilitas_asset = $id_fasilitas AND id_dokumen_asset = $id_dokumen AND id_debitur = $id_debitur";
		return $this->db->query($query)->row_array();
	}

	public function UpdateJumlah($kolom, $jumlah, $id_debitur, $id_dokumen_asset)
	{
		$query = "UPDATE dokumen_asset SET dapur = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		if($kolom == 'Kolam')
		{
			$query = "UPDATE dokumen_asset SET kolam = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		}
		else if($kolom == 'Kamar Mandi')
		{
			$query = "UPDATE dokumen_asset SET kamar_mandi = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		}
		else if($kolom == 'Balkon')
		{
			$query = "UPDATE dokumen_asset SET balkon = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		}
		else if($kolom == 'Pagar')
		{
			$query = "UPDATE dokumen_asset SET pagar = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		}
		else if($kolom == 'Garasi')
		{
			$query = "UPDATE dokumen_asset SET garasi = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		}
		else if($kolom == 'Bertingkat')
		{
			$query = "UPDATE dokumen_asset SET bertingkat = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		}
		else if($kolom == 'Tempat Usaha')
		{
			$query = "UPDATE dokumen_asset SET tempat_usaha = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		}
		else if($kolom == 'Air PDAM')
		{
			$query = "UPDATE dokumen_asset SET air = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		}else if($kolom == 'Mewah')
		{
			$query = "UPDATE dokumen_asset SET mewah = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		}else if($kolom == 'Kamar Tidur')
		{
			$query = "UPDATE dokumen_asset SET kamar_tidur = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		}else if($kolom == 'Kamar Tamu')
		{
			$query = "UPDATE dokumen_asset SET kamar_tamu = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		}else if($kolom == 'Ruang Keluarga')
		{
			$query = "UPDATE dokumen_asset SET ruang_keluarga = $jumlah WHERE id_debitur = $id_debitur AND id_dokumen_asset = $id_dokumen_asset";
		}


		$this->db->query($query);
	}

	// cari id_fasilitas_asset
	public function cari_id_fasilitas_asset($id_fasilitas_asset)
	{
		return $this->db->get_where('tr_fasilitas_asset', array('id_fasilitas_asset' => $id_fasilitas_asset));
	}

	// proses ubah data dokumen asset
	public function update_data_dok($tabel, $where, $data)
	{
		$this->db->where($where);
		$this->db->update($tabel, $data);
	}

	public function hitung_fasilitas($id_fasilitas_asset, $id_deb, $id_dok)
	{
		$this->db->select('count(id_tr_fa) as jml');
		$this->db->from('tr_fasilitas_asset');
		$this->db->where('id_fasilitas_asset', $id_fasilitas_asset);
		$this->db->where('id_debitur', $id_deb);
		$this->db->where('id_dokumen_asset', $id_dok);

		return $this->db->get();
	}

	public function get_fasilitas()
	{
		return $this->db->get('fasilitas_asset');
	}

	public function cari_tr_fasilitas($id_deb, $id_dok)
	{
		return $this->db->get_where('tr_fasilitas_asset', array('id_debitur' => $id_deb, 'id_dokumen_asset' => $id_dok));
	}

	// list dokumen asset
	public function get_dokumen_asset()
	{
		return $this->db->get('dokumen_asset');
	}

	// //////////////////// ////////////////

	// list jenis asset
	public function get_jenis_asset()
	{
		$this->db->order_by('jenis_asset', 'asc');
		return $this->db->get('m_jenis_asset');
	}

	// list tampak asset
	public function get_tampak_asset()
	{
		return $this->db->get('tampak_asset');
	}

	// ubah status debitur
	public function ubah_status_deb($tabel, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($tabel, $data);
	}

	// mencari detail
	public function get_detail($id_jenis_asset, $id_debitur)
	{
		$this->db->select('d.*, e.*, d.add_time as tanggal');
		$this->db->from('dokumen_asset as d');
		$this->db->join('debitur as e', 'e.id_debitur = d.id_debitur', 'inner');
		$this->db->where('d.id_jenis_asset', $id_jenis_asset);
		$this->db->where('d.id_debitur', $id_debitur);
		$this->db->where('d.id_jenis_dok', 2);
		$this->db->where('d.status', 1);
		$this->db->order_by('d.id_dokumen_asset', 'desc');

		return $this->db->get();
	}

	// mencari asset debitur
	public function get_asset_debitur($id_debitur)
	{
		$this->db->select('d.id_dokumen_asset, d.alamat, j.jenis_asset, d.id_debitur, d.atas_nama, d.add_time as tanggal_dok, d.status, d.id_jenis_asset');
		$this->db->from('dokumen_asset as d');
		$this->db->join('m_jenis_asset as j', 'j.id_jenis_asset = d.id_jenis_asset', 'inner');
		$this->db->where('d.id_debitur', $id_debitur);
		$this->db->where('d.status', 1);
		$this->db->where('d.id_jenis_dok', 2);
		$this->db->order_by('d.id_jenis_asset', 'asc');

		return $this->db->get();
	}

	// cari detail debitur
	public function get_detail_debitur($tabel, $where)
	{
		return $this->db->get_where($tabel, $where);
	}

	// load json data debitur
	public function json_data_debitur()
	{
		$this->datatables->select('d.no_klaim, d.tgl_klaim, UPPER(d.nama_debitur) as nama_debitur, d.id_debitur as ID, ma.cabang_asuransi, b.bank, ca.cabang_bank');
		$this->datatables->from('debitur as d');
		$this->datatables->join('m_cabang_asuransi as ma', 'ma.id_cabang_asuransi = d.id_cabang_as', 'left');
		$this->datatables->join('m_capem_bank as cb', 'cb.id_capem_bank = d.id_capem_bank', 'left');
		$this->datatables->join('m_cabang_bank as ca', 'ca.id_cabang_bank = cb.id_cabang_bank', 'left');
		$this->datatables->join('m_bank as b', 'b.id_bank = ca.id_bank', 'left');
		$this->datatables->add_column('aksi', '<div align="center"><a href="agunan/detail_agunan/$1"><button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Detail Dokumen Agunan"><i class="fa fa-info" aria-hidden="true"></i></button></a></div>', 'ID');

		return $this->datatables->generate();
	}

	/*
	$this->db->select('d.*, ma.cabang_asuransi, b.bank, ca.cabang_bank');
	$this->db->from('debitur as d');
	$this->db->join('m_cabang_asuransi as ma', 'ma.id_cabang_asuransi = d.id_cabang_as', 'inner');
	$this->db->join('m_capem_bank as cb', 'cb.id_capem_bank = d.id_capem_bank', 'inner');
	$this->db->join('m_cabang_bank as ca', 'ca.id_cabang_bank = cb.id_cabang_bank', 'inner');
	$this->db->join('m_bank as b', 'b.id_bank = ca.id_bank', 'inner');
	$this->db->order_by('d.id_debitur', 'asc');

		$hasil = $this->db->get()->result_array();
	*/

	// ubah status menjadi 0 
	public function ubah_status_dok_agunan($tabel, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($tabel, $data);
	}

	// cek_id_deb
	public function cek_id_deb($tabel, $where)
	{
		return $this->db->get_where($tabel, $where);
	}

	// simpan tr_file_foto
	public function simpan_file_foto($data)
	{
		$this->db->insert('tr_foto_dokumen', $data);
	}

	// simpan fasilitas asset
	public function simpan_fasilitas_asset($data)
	{
		$this->db->insert('tr_fasilitas_asset', $data);
	}

	// ubah dokumen asset
	public function proses_ubah_dok_agunan($data, $id_dok_a, $id_deb)
	{
		$this->db->where('id_dokumen_asset', $id_dok_a);
		$this->db->where('id_debitur', $id_deb);
		$this->db->update('dokumen_asset', $data);
	}

	// simpan baru dokumen asset
	public function proses_simpan_dok_agunan($data)
	{
		$this->db->insert('dokumen_asset', $data);
	}

	// cari id_debitur pada dokumen asset
	public function cari_id_debitur($where)
	{
		return $this->db->get_where('dokumen_asset', $where);
	}

	// cari id_max_dokumen_asset
	public function cari_max_id_dok_asset($where)
	{
		$this->db->select('max(id_dokumen_asset) as max');
		$this->db->from('dokumen_asset');
		$this->db->where($where);

		return $this->db->get();
	}


	// get fasilitas
	public function get_data($tabel)
	{
		return $this->db->get($tabel);
	}

	// get_debitur
	public function get_debitur($id_debitur)
	{
		$this->db->select('d.*, ma.cabang_asuransi, b.bank, ca.cabang_bank');
		$this->db->from('debitur as d');
		$this->db->join('m_cabang_asuransi as ma', 'ma.id_cabang_asuransi = d.id_cabang_as', 'inner');
		$this->db->join('m_capem_bank as cb', 'cb.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as ca', 'ca.id_cabang_bank = cb.id_cabang_bank', 'inner');
		$this->db->join('m_bank as b', 'b.id_bank = ca.id_bank', 'inner');
		$this->db->where('d.id_debitur', $id_debitur);

		return $this->db->get();
	}

	// cari recov
	public function cari_recov($id_debitur)
	{
		$this->db->select('sum(nominal) as hitung');
		$this->db->from('recoveries');
		$this->db->where('id_debitur', $id_debitur);
		$this->db->group_by('id_debitur');

		return $this->db->get();
	}

	// menampilkan data debitur
	public function get_data_debitur()
	{
		$this->db->select('d.*, ma.cabang_asuransi, b.bank, ca.cabang_bank');
		$this->db->from('debitur as d');
		$this->db->join('m_cabang_asuransi as ma', 'ma.id_cabang_asuransi = d.id_cabang_as', 'inner');
		$this->db->join('m_capem_bank as cb', 'cb.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as ca', 'ca.id_cabang_bank = cb.id_cabang_bank', 'inner');
		$this->db->join('m_bank as b', 'b.id_bank = ca.id_bank', 'inner');
		$this->db->order_by('d.id_debitur', 'asc');

		$hasil = $this->db->get()->result_array();

		$rec = 0;
		$value = array();
		foreach ($hasil as $h) {
			$id_debitur 	= $h['id_debitur'];
			$no_klaim 		= $h['no_klaim'];
			$nama_debitur	= $h['nama_debitur'];
			$tgl_klaim 		= $h['tgl_klaim'];
			$bank 			= $h['bank'];
			$cabang_bank 	= $h['cabang_bank'];
			$cabang_asuransi= $h['cabang_asuransi'];
			$subrogasi 		= $h['subrogasi'];

			$this->db->select('sum(nominal) as hitung');
			$this->db->from('recoveries');
			$this->db->where('id_debitur', $id_debitur);
			$this->db->group_by('id_debitur');
			$rec = $this->db->get()->row('hitung');

			$shs_total = ($subrogasi - $rec);
			$value[] = array(
						'id_debitur' 		=> $id_debitur,
						'no_klaim'			=> $no_klaim,
						'nama_debitur'		=> $nama_debitur,
						'tgl_klaim' 		=> $tgl_klaim,
						'bank' 				=> $bank,
						'cabang_bank'		=> $cabang_bank,
						'cabang_asuransi'	=> $cabang_asuransi,
						'shs'				=> $shs_total
			); 

		}

		return $value;
	}



}

/* End of file M_agunan.php */
/* Location: ./application/models/M_agunan.php */