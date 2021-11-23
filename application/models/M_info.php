<?php

class M_info extends CI_Model
{
    public function input_data($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function cari_data($tabel, $where)
    {
        return $this->db->get_where($tabel, $where);
    }

    public function ubah_data($tabel, $data, $where)
    {
        $this->db->update($tabel, $data, $where);
    }

    public function hapus_data($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }

    public function get_informasi()
    {
        $this->db->select('i.informasi, mi.jenis_informasi, mi.id_jenis_informasi');
        $this->db->from('informasi as i');
        $this->db->join('m_jenis_informasi as mi', 'mi.id_jenis_informasi = i.id_jenis_informasi', 'right');
        $this->db->order_by('id_jenis_informasi', 'asc');
        

        return $this->db->get();
    }

    public function simpan_data_info($where, $data)
    {
        $this->db->update('informasi', $data, $where);
    }

    public function get_jadwal_lelang1()
    {
    	$this->db->select('j.alamat, j.jadwal_lelang, j.id_jadwal_lelang, ja.jenis_asset, ja.id_jenis_asset');
    	$this->db->from('jadwal_lelang as j');
        $this->db->join('m_jenis_asset as ja', 'ja.id_jenis_asset = j.id_asset');

    	return $this->db->get();
    }

    // DAFTAR REKANAN 

    public function get_daftar_rekanan()
    {
        $this->_get_datatables_query_daftar_rekanan();

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    var $kolom_order_daftar_rekanan = [null, 'nama_rekanan'];
    var $kolom_cari_daftar_rekanan  = ['LOWER(nama_rekanan)'];
    var $order_daftar_rekanan       = ['id_rekanan' => 'desc'];

    public function _get_datatables_query_daftar_rekanan()
    {
        $this->db->from('m_rekanan');

        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_daftar_rekanan;

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

            $kolom_order = $this->kolom_order_daftar_rekanan;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_daftar_rekanan)) {
            
            $order = $this->order_daftar_rekanan;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
        
    }

    public function jumlah_semua_daftar_rekanan()
    {
        $this->db->from('m_rekanan');
        
        return $this->db->count_all_results();
    }

    public function jumlah_filter_daftar_rekanan()
    {
        $this->_get_datatables_query_daftar_rekanan();

        return $this->db->get()->num_rows();
        
    }

    public function get_jadwal_lelang()
    {
        $this->_get_datatables_query_jadwal_lelang();

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    var $kolom_order_jadwal_lelang = [null, 'j.alamat', 'ja.jenis_asset', 'CAST(j.jadwal_lelang as VARCHAR)'];
    var $kolom_cari_jadwal_lelang  = ['LOWER(j.alamat)', 'LOWER(ja.jenis_asset)', 'CAST(j.jadwal_lelang as VARCHAR)'];
    var $order_jadwal_lelang       = ['j.id_jadwal_lelang' => 'desc'];

    public function _get_datatables_query_jadwal_lelang()
    {
        $this->db->select('j.alamat, j.jadwal_lelang, j.id_jadwal_lelang, ja.jenis_asset, ja.id_jenis_asset');
    	$this->db->from('jadwal_lelang as j');
        $this->db->join('m_jenis_asset as ja', 'ja.id_jenis_asset = j.id_asset');

        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_jadwal_lelang;

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

            $kolom_order = $this->kolom_order_jadwal_lelang;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_jadwal_lelang)) {
            
            $order = $this->order_jadwal_lelang;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
    }

    public function jumlah_semua_jadwal_lelang()
    {
        $this->db->select('j.alamat, j.jadwal_lelang, j.id_jadwal_lelang, ja.jenis_asset, ja.id_jenis_asset');
    	$this->db->from('jadwal_lelang as j');
        $this->db->join('m_jenis_asset as ja', 'ja.id_jenis_asset = j.id_asset');

        return $this->db->count_all_results();
    }

    public function jumlah_filter_jadwal_lelang()
    {
        $this->_get_datatables_query_jadwal_lelang();
        return $this->db->get()->num_rows();
        
    }

    public function get_info_kontak()
    {
        return $this->db->get('kontak');
        
    }

    // menampilkan data kontak
    public function get_data_kontak($where)
    {
        return $this->db->get_where('kontak', $where);
        
    }

    /***************************************************************/
    /*                                                             */
    /*                      JADWAL LELANG                          */
    /*                                                             */
    /***************************************************************/

    public function simpan_lelang($data)
    {
        $this->db->insert('jadwal_lelang', $data);
    }

    public function ambil_data_lelang($where)
    {
        $this->db->from('jadwal_lelang');
        $this->db->where($where);

        return $this->db->get();
    }

    public function ubah_lelang($where, $data)
    {
        $this->db->update('jadwal_lelang', $data, $where);

        return $this->db->affected_rows();
    }

    public function hapus_data_lelang($data)
    {
        $this->db->delete('jadwal_lelang', $data);
    }

    /***************************************************************/
    /*                                                             */
    /*                      DAFTAR REKANAN                         */
    /*                                                             */
    /***************************************************************/

    public function get_ajax_rekanan($id_rekanan)
    {
        $this->db->from('m_rekanan');
        $this->db->where('id_rekanan', $id_rekanan);

        return $this->db->get();
    }

    public function ubah_ajax_rekanan($where, $data)
    {
        $this->db->update('m_rekanan', $data, $where);

        return $this->db->affected_rows();
    }

    public function simpan_rekanan($data)
    {
        $this->db->insert('m_rekanan', $data);
    }

    public function hapus_data_rekanan($id_rekanan)
    {
        $this->db->where('id_rekanan', $id_rekanan);
        $this->db->delete('m_rekanan');

        return $this->db->affected_rows();
    }
}