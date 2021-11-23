<?php

class M_katalog extends CI_Model
{

    public function get_data($tabel)
    {
        return $this->db->get($tabel);
    }

    public function cari_data($tabel, $where)
    {
        return $this->db->get_where($tabel, $where);
    }

	/***************************************************************/
    /*                                                             */
    /*                          KATALOG                            */
    /*                                                             */
    /***************************************************************/

    // server side debitur asset 
    public function get_data_deb_asset($dt)
    {
        $this->_get_datatables_query_deb_asset($dt);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    var $kolom_order_deb_asset = [null, 'd.nama_debitur', 'da.atas_nama', 'da.alamat', 'k.kota', 'da.add_time', 'da.total_harga', 'cab.cabang_bank'];
    var $kolom_cari_deb_asset  = ['LOWER(d.nama_debitur)', 'LOWER(da.atas_nama)', 'LOWER(da.atas_nama)', 'LOWER(k.kota)', 'CAST(da.add_time as VARCHAR)', 'CAST(da.total_harga as VARCHAR)', 'LOWER(cab.cabang_bank)'];
    var $order_deb_asset       = ['d.nama_debitur' => 'asc'];

    public function _get_datatables_query_deb_asset($dt)
    {
        $this->db->select('id_dokumen_asset, da.add_time, da.total_harga, cab.cabang_bank, da.atas_nama, da.id_debitur, d.nama_debitur, da.id_status_asset, da.alamat, da.keterangan, da.favorit, da.publis, s.status_asset, k.kota, da.status_info, da.id_sifat_asset, si.status_info as nama_si, ms.sifat_asset, da.id_jenis_asset');
        $this->db->from('dokumen_asset as da');        
        $this->db->join('m_jenis_asset as ma', 'ma.id_jenis_asset = da.id_jenis_asset', 'inner');
        $this->db->join('debitur as d', 'd.id_debitur = da.id_debitur', 'left');
        $this->db->join('status_asset as s', 's.id_status_asset = da.id_status_asset', 'left');
        $this->db->join('kota as k', 'k.id_kota = da.id_kota', 'left');
        $this->db->join('m_sifat_asset as ms', 'ms.id_sifat_asset = da.id_sifat_asset', 'left');
        $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'left');
        $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'left');
        $this->db->join('status_info as si', 'si.id_status_info = da.status_info', 'left');
        $this->db->where('da.id_jenis_asset', $dt['id_jns_asset']);
        $this->db->where('da.id_jenis_dok', 2);
        $this->db->where('da.status', 1);

        if ($dt['urutkan'] != 'a') {
            $this->db->order_by('da.add_time', $dt['urutkan']);
        }
        if ($dt['id_kota'] != 'a') {
            $this->db->where('k.id_kota', $dt['id_kota']);
        }
        if ($dt['harga'] != 'a') {
            $this->db->order_by('da.total_harga', $dt['harga']);
        }
        if ($dt['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $dt['cabang_bank']);
        }

        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_deb_asset;

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

            $kolom_order = $this->kolom_order_deb_asset;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_deb_asset)) {
            
            $order = $this->order_deb_asset;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }

    }

    public function jumlah_semua_deb_asset($dt)
    {
        $this->db->select('id_dokumen_asset, da.add_time, da.total_harga, cab.cabang_bank, da.atas_nama, da.id_debitur, d.nama_debitur, da.id_status_asset, da.alamat, da.keterangan, da.favorit, da.publis, s.status_asset, k.kota, da.status_info, da.id_sifat_asset, si.status_info as nama_si, ms.sifat_asset, da.id_jenis_asset');
        $this->db->from('dokumen_asset as da');        
        $this->db->join('m_jenis_asset as ma', 'ma.id_jenis_asset = da.id_jenis_asset', 'inner');
        $this->db->join('debitur as d', 'd.id_debitur = da.id_debitur', 'left');
        $this->db->join('status_asset as s', 's.id_status_asset = da.id_status_asset', 'left');
        $this->db->join('kota as k', 'k.id_kota = da.id_kota', 'left');
        $this->db->join('m_sifat_asset as ms', 'ms.id_sifat_asset = da.id_sifat_asset', 'left');
        $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'left');
        $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'left');
        $this->db->join('status_info as si', 'si.id_status_info = da.status_info', 'left');
        $this->db->where('da.id_jenis_asset', $dt['id_jns_asset']);
        $this->db->where('da.id_jenis_dok', 2);
        $this->db->where('da.status', 1);

        if ($dt['urutkan'] != 'a') {
            $this->db->order_by('da.add_time', $dt['urutkan']);
        }
        if ($dt['id_kota'] != 'a') {
            $this->db->where('k.id_kota', $dt['id_kota']);
        }
        if ($dt['harga'] != 'a') {
            $this->db->order_by('da.total_harga', $dt['harga']);
        }
        if ($dt['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $dt['cabang_bank']);
        }

        return $this->db->count_all_results();
        
    }

    public function jumlah_filter_deb_asset($dt)
    {
        $this->_get_datatables_query_deb_asset($dt);
        return $this->db->get()->num_rows();
        
    }

    // list data tampak asset
    public function get_data_tampak_asset()
    {
        $this->db->order_by('id_tampak_asset', 'asc');
        return $this->db->get('tampak_asset');
    }

    // update status foto
    public function update_status_foto($tabel, $where, $data)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    // mencari fasilitas asset
    public function get_fasilitas_id($id_deb, $id_dok)
    {
        $where = array('tf.id_debitur' => $id_deb, 'tf.id_dokumen_asset' => $id_dok);
        
        $this->db->select('tf.id_tr_fa');
        $this->db->from('tr_fasilitas_asset as tf');
        $this->db->join('fasilitas_asset as fa', 'fa.id_fasilitas_asset = tf.id_fasilitas_asset', 'left');
        $this->db->where($where);

        return $this->db->get();
    }

    // simpan fasilitas asset
    public function simpan_fasilitas_asset($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    // cek fasilitas asset
    public function cek_fasilitas_as($tabel, $where)
    {
        return $this->db->get_where($tabel, $where);
    }

    // ubah fasilitas asset
    public function ubah_fasilitas_asset($tabel, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    // ubah dokumen asset
    public function ubah_dokumen_asset($tabel, $where, $data)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    // list foto
    public function get_detail_foto_e($id_deb, $id_dok, $id_tampak)
    {
        $this->db->select('f.*, t.*, f.id_tampak_asset');
        $this->db->from('tr_foto_dokumen as f');
        $this->db->join('tampak_asset as t', 't.id_tampak_asset = f.id_tampak_asset', 'left');
        $this->db->where('f.id_dokumen_asset', $id_dok);
        $this->db->where('f.id_debitur', $id_deb);
        $this->db->where('f.id_tampak_asset', $id_tampak);

        return $this->db->get();
    }

    // list sifat asset
    public function get_sifat_asset()
    {
        return $this->db->get('m_sifat_asset');
    }

    // list legalitas asset
    public function get_fasilitas_d()
    {
        return $this->db->get('fasilitas_asset');
    }

    // mencari legalitas
    public function get_legalitas()
    {
        return $this->db->get('legalitas_asset');
    }

    // mencari fasilitas asset
    public function get_fasilitas($id_deb, $id_dok)
    {
        $where = array('tf.id_debitur' => $id_deb, 'tf.id_dokumen_asset' => $id_dok);
        
        $this->db->from('tr_fasilitas_asset as tf');
        $this->db->join('fasilitas_asset as fa', 'fa.id_fasilitas_asset = tf.id_fasilitas_asset', 'left');
        $this->db->where($where);

        return $this->db->get();
    }

    // ambil jenis asset
    public function get_jenis_asset()
    {
        $this->db->select('j.jenis_asset, j.id_jenis_asset, j.icon, (SELECT COUNT(d.id_dokumen_asset) as jml_siap_lelang FROM dokumen_asset as d WHERE d.status = 1 and d.id_jenis_asset = j.id_jenis_asset)');
        $this->db->from('m_jenis_asset as j');
        $this->db->order_by('j.jenis_asset', 'asc');
        
        return $this->db->get();   
    }

    // mencari jenis_asset
    public function cari_id_jenis_asset($id_jenis_asset)
    {
        return $this->db->get_where('m_jenis_asset', array('id_jenis_asset' => $id_jenis_asset));
    }

    public function get_jumlah_lelang($asset)
    {
        $this->db->from('dokumen_asset as d');
        $this->db->join('m_jenis_asset as ma', 'ma.id_jenis_asset = d.id_jenis_asset');
        $this->db->join('status_asset as sa', 'sa.id_status_asset = d.status');
        $this->db->where('sa.status_asset', 'Siap Lelang');
        $this->db->where('ma.jenis_asset', $asset);
        $this->db->where('d.status', '1');

        return $this->db->count_all_results();
    }

    public function get_sdh_terjual()
    {
        $this->db->from('dokumen_asset as d');
        $this->db->join('status_asset as sa', 'sa.id_status_asset = d.id_status_asset');
        $this->db->where('sa.status_asset', 'Sudah Terjual');
        $this->db->where('d.id_jenis_dok', '2');
        $this->db->where('d.status', '1');

        return $this->db->count_all_results();        
    }

    public function get_blm_terjual()
    {
        $this->db->from('dokumen_asset as d');
        $this->db->join('status_asset as sa', 'sa.id_status_asset = d.id_status_asset');
        $this->db->where('sa.status_asset', 'Belum Terjual');
        $this->db->where('d.id_jenis_dok', '2');
        $this->db->where('d.status', '1');

        return $this->db->count_all_results();        
    }

    public function get_data_asset($jenis_asset)
    {
        $this->db->select('id_dokumen_asset as id, da.atas_nama, da.id_debitur, d.nama_debitur, da.alamat, da.keterangan, da.favorit, da.publis, s.status_asset');
        $this->db->from('dokumen_asset as da');        
        $this->db->join('m_jenis_asset as ma', 'ma.id_jenis_asset = da.id_jenis_asset', 'left');
        $this->db->join('debitur as d', 'd.id_debitur = da.id_debitur', 'left');
        $this->db->join('status_asset as s', 's.id_status_asset = da.id_status_asset', 'left');
        $this->db->join('kota as k', 'k.id_kota = da.id_kota', 'left');
        $this->db->join('m_sifat_asset as ms', 'ms.id_sifat_asset = da.id_sifat_asset', 'left');
        $this->db->where('da.id_jenis_asset', $jenis_asset);
        $this->db->where('da.id_jenis_dok', 2);
        $this->db->where('da.status', 1);
        $this->db->order_by('d.nama_debitur', 'asc');

    	return $this->db->get();
    }

    public function get_detail_asset($jenis_asset,$id_deb, $id_dok)
    {
        $this->db->select('d.nama_debitur, d.no_reff, ms.id_sifat_asset, s.id_status_asset, da.*, da.total_harga as harga, da.l_tanah as luas_tanah, ma.jenis_asset, l.legalitas_asset, ms.sifat_asset, s.status_asset');
        $this->db->from('dokumen_asset as da');        
        $this->db->join('m_jenis_asset as ma', 'ma.id_jenis_asset = da.id_jenis_asset', 'left');
        $this->db->join('debitur as d', 'd.id_debitur = da.id_debitur', 'left');
        $this->db->join('status_asset as s', 's.id_status_asset = da.id_status_asset', 'left');
        $this->db->join('kota as k', 'k.id_kota = da.id_kota', 'left');
        $this->db->join('m_sifat_asset as ms', 'ms.id_sifat_asset = da.id_sifat_asset', 'left');
        $this->db->join('legalitas_asset as l', 'l.id_legalitas_asset = da.id_legalitas_asset', 'left');
        $this->db->where('ma.jenis_asset', $jenis_asset);
        $this->db->where('da.id_jenis_dok', '2');
        $this->db->where('da.status', '1');
        $this->db->where('da.id_dokumen_asset', $id_dok);
        $this->db->where('da.id_debitur', $id_deb);


    	return $this->db->get();
    }

    public function get_detail_foto($id_deb, $id_dok)
    {
        $this->db->from('tr_foto_dokumen as f');
        $this->db->join('tampak_asset as t', 't.id_tampak_asset = f.id_tampak_asset', 'left');
        $this->db->where('f.id_dokumen_asset', $id_dok);
        $this->db->where('f.id_debitur', $id_deb);
        $this->db->order_by('f.id_foto_dokumen', 'asc');

        return $this->db->get();
    }

    public function get_detail_foto_d($id_deb, $id_dok)
    {
        $this->db->select('f.id_foto_dokumen');
        $this->db->from('tr_foto_dokumen as f');
        $this->db->join('tampak_asset as t', 't.id_tampak_asset = f.id_tampak_asset', 'left');
        $this->db->where('f.id_dokumen_asset', $id_dok);
        $this->db->where('f.id_debitur', $id_deb);
        $this->db->order_by('f.id_tampak_asset', 'asc');

        return $this->db->get();
    }

    public function get_data_kota()
    {
        return $this->db->get('kota');
    }

    public function get_agen()
    {
        return $this->db->get('agen_pemasaran');
    }

    public function get_calon_pembeli($id)
    {
        $this->db->from('tr_pemasaran');
        $this->db->where('id_agen', $id);

        return $this->db->get()->result_array();
    }

    public function get_data_cabang()
    {
        return $this->db->get('m_cabang_bank');
    }

    public function cari_data_asset($jenis_asset,$order,$kota,$harga,$cabang)
    {
        $this->db->select('id_dokumen_asset as id, da.atas_nama, d.nama_debitur, da.alamat, da.keterangan, d.id_debitur, da.favorit, da.publis, s.status_asset');
        $this->db->from('dokumen_asset as da');        
        $this->db->join('m_jenis_asset as ma', 'ma.id_jenis_asset = da.id_jenis_asset', 'left');
        $this->db->join('debitur as d', 'd.id_debitur = da.id_debitur', 'left');
        $this->db->join('status_asset as s', 's.id_status_asset = da.id_status_asset', 'left');
        $this->db->join('kota as k', 'k.id_kota = da.id_kota', 'left');
        $this->db->join('m_sifat_asset as ms', 'ms.id_sifat_asset = da.id_sifat_asset', 'left');
        $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'left');
        $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'left');
        $this->db->where('ma.id_jenis_asset', $jenis_asset);
        $this->db->where('da.id_jenis_dok', '2');
        $this->db->where('da.status', '1');

        if (!empty($order) && empty($kota) && empty($harga) && empty($cabang)) {
            $this->db->order_by('da.add_time', $order);
        } elseif (empty($order) && !empty($kota) && empty($harga) && empty($cabang)) {
            $this->db->where('k.kota', $kota);
        } elseif (empty($order) && empty($kota) && !empty($harga) && empty($cabang)) {
            $this->db->order_by('da.harga', $harga);
        } elseif (empty($order) && empty($kota) && empty($harga) && !empty($cabang)) {
            $this->db->where('cab.cabang_bank', $cabang);
        } elseif (!empty($order) && !empty($kota) && empty($harga) && empty($cabang)) {
            $this->db->where('k.kota', $kota);
            $this->db->order_by('da.add_time', $order);
        } elseif (!empty($order) && empty($kota) && empty($harga) && !empty($cabang)) {
            $this->db->where('cab.cabang_bank', $cabang);
            $this->db->order_by('da.add_time', $order);
        } elseif (empty($order) && !empty($kota) && !empty($harga) && empty($cabang)) {
            $this->db->where('k.kota', $kota);
            $this->db->order_by('da.harga', $harga);
        } elseif (empty($order) && empty($kota) && !empty($harga) && !empty($cabang)) {
            $this->db->where('cab.cabang_bank', $cabang);
            $this->db->order_by('da.harga', $harga);

        } elseif (empty($order) && !empty($kota) && !empty($harga) && !empty($cabang)) {
            $this->db->where('k.kota', $kota);
            $this->db->where('cab.cabang_bank', $cabang);
            $this->db->order_by('da.harga', $harga);

        } elseif (!empty($order) && !empty($kota) && empty($harga) && !empty($cabang)) {
            $this->db->where('k.kota', $kota);
            $this->db->where('cab.cabang_bank', $cabang);
            $this->db->order_by('da.add_time', $order);
        }

        $this->db->order_by('d.nama_debitur', 'asc');
        
        return $this->db->get();
    }

    public function get_status($id_dok, $id_deb)
    {
        $this->db->select('id_dokumen_asset as id_asset, da.id_debitur, ma.jenis_asset,ma.id_jenis_asset,da.id_status_asset as status, d.nama_debitur, da.alamat, da.favorit, da.publis, s.status_asset, da.id_sifat_asset, da.status_info');
        $this->db->from('dokumen_asset as da');        
        $this->db->join('m_jenis_asset as ma', 'ma.id_jenis_asset = da.id_jenis_asset', 'left');
        $this->db->join('debitur as d', 'd.id_debitur = da.id_debitur', 'left');
        $this->db->join('status_asset as s', 's.id_status_asset = da.id_status_asset', 'left');
        $this->db->join('kota as k', 'k.id_kota = da.id_kota', 'left');
        $this->db->join('m_sifat_asset as ms', 'ms.id_sifat_asset = da.id_sifat_asset', 'left');
        $this->db->where('da.id_dokumen_asset', $id_dok);
        $this->db->where('da.id_debitur', $id_deb);
        $this->db->where('da.id_jenis_dok', '2');

        return $this->db->get();
    }

    public function get_status_asset()
    {
        return $this->db->get('status_asset');
    }

    public function ubah_status($where, $data)
    {
        $this->db->update('dokumen_asset', $data, $where);

        return $this->db->affected_rows();
    }

    public function get_data_brosur($jenis_asset, $id)
    {
        $this->db->SELECT('d.foto,e.jenis_asset,a.harga, k.nama_lengkap, k.telfon, a.alamat, a.keterangan, sa.status_asset, b.nama_debitur');
        $this->db->from('dokumen_asset as a');
        $this->db->join('status_asset sa', 'sa.id_status_asset = a.id_status_asset','left');
        $this->db->JOIN('debitur b','b.id_debitur = a.id_debitur','left');
        $this->db->JOIN('m_jenis_asset e','a.id_jenis_asset = e.id_jenis_asset','left');
        $this->db->JOIN('tr_foto_dokumen d','d.id_dokumen_asset = a.id_dokumen_asset','left');
        $this->db->join('karyawan as k', 'k.id_karyawan = a.id_karyawan', 'left');
        $this->db->where('d.id_tampak_asset', 3);
        $this->db->where('e.jenis_asset', $jenis_asset);
        $this->db->where('a.id_dokumen_asset', $id);
        $this->db->order_by('a.add_time', 'desc');


        return $this->db->get();
    }

    public function get_foto_asset($jenis_asset,$limit, $start)
    {
        $this->db->SELECT('e.jenis_asset, sa.status_asset, b.nama_debitur, a.id_debitur, a.id_dokumen_asset');
        $this->db->FROM('dokumen_asset a');
        $this->db->join('status_asset sa', 'sa.id_status_asset = a.id_status_asset','left');
        $this->db->JOIN('debitur b','b.id_debitur = a.id_debitur','inner');
        $this->db->JOIN('m_jenis_asset e','a.id_jenis_asset = e.id_jenis_asset','inner');
        $this->db->where('a.publis', 1);
        $this->db->where('a.id_jenis_asset', $jenis_asset);
        $this->db->where('a.id_jenis_dok', 2);
        $this->db->where('a.status', 1);
        $this->db->order_by('a.add_time', 'desc');

        $hasil = $this->db->get()->result_array();

        $value = array();

        foreach ($hasil as $h) {
            $jenis_asset        = $h['jenis_asset'];
            $status_asset       = $h['status_asset'];
            $nama_debitur       = $h['nama_debitur'];
            $id_dokumen_asset   = $h['id_dokumen_asset'];
            $id_debitur         = $h['id_debitur'];

            $this->db->select('foto');
            $this->db->from('tr_foto_dokumen as f');
            $this->db->where('f.id_dokumen_asset', $id_dokumen_asset);
            $this->db->where('f.id_debitur', $id_debitur);
            $this->db->where('f.status', 1);
            $this->db->limit($limit,$start);

            $hasil_2 = $this->db->get()->result_array();

            foreach ($hasil_2 as $d) {
                $foto = $d['foto'];

                $value[] = ['foto'          => $foto,
                            'jenis_asset'   => $jenis_asset,
                            'status_asset'  => $status_asset,
                            'nama_debitur'  => $nama_debitur
                            ];
            }

        }

        return $value;
    }

    public function cari_get_foto_asset($jenis_asset,$kota, $harga)
    {
        $this->db->SELECT('d.foto,e.jenis_asset, sa.status_asset, b.nama_debitur');
        $this->db->FROM('dokumen_asset a');
        $this->db->join('status_asset sa', 'sa.id_status_asset = a.id_status_asset');
        $this->db->join('kota k', 'k.id_kota = a.id_kota');
        $this->db->JOIN('debitur b','b.id_debitur = a.id_debitur');
        $this->db->JOIN('m_jenis_asset e','a.id_jenis_asset = e.id_jenis_asset');
        $this->db->JOIN('tr_foto_dokumen d','d.id_dokumen_asset = a.id_dokumen_asset');
        $this->db->where('a.publis', 1);
        $this->db->where('a.status', 1);
        $this->db->where('d.status', 1);
        $this->db->where('e.jenis_asset', $jenis_asset);

         if (!empty($kota) && empty($harga)) {
            $this->db->where('k.kota', $kota);
        } elseif (empty($kota) && !empty($harga)) {
             $this->db->order_by('a.total_harga', $harga);
        } elseif (!empty($kota) && !empty($harga)) {
            $this->db->where('k.kota', $kota);
            $this->db->order_by('a.total_harga', $harga);
        }

        return $this->db->get();
    }

    public function get_foto_asset_h($jenis_asset)
    {
        $this->db->SELECT('d.foto,e.jenis_asset, sa.status_asset');
        $this->db->FROM('dokumen_asset a');
        $this->db->join('status_asset sa', 'sa.id_status_asset = a.id_status_asset');
        $this->db->JOIN('debitur b','b.id_debitur = a.id_debitur');
        $this->db->JOIN('m_jenis_asset e','a.id_jenis_asset = e.id_jenis_asset');
        $this->db->JOIN('tr_foto_dokumen d','d.id_dokumen_asset = a.id_dokumen_asset');
        $this->db->where('a.publis', 1);
        $this->db->where('e.jenis_asset', $jenis_asset);
        $this->db->where('a.id_jenis_dok', 2);
        $this->db->where('a.status', 1);
        $this->db->where('d.status', 1);
        $this->db->order_by('a.add_time', 'desc');

        return $this->db->count_all_results();
    }


}