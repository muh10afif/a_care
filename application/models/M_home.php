<?php

class M_home extends CI_Model
{
    // 03-03-2020

        public function cari_data($tabel, $where)
        {
            return $this->db->get_where($tabel, $where);
        }

    // Akhir 03-03-2020

    // 14-03-2020

        // menampilkan cabang wilayah sesuai dokumen asset
        public function cari_cabang_wilayah()
        {

            $this->db->select('cb.cabang_bank, count(da.id_debitur) as jml_debitur');
            $this->db->from('dokumen_asset as da');
            $this->db->join('debitur as d', 'd.id_debitur = da.id_debitur', 'inner');
            $this->db->join('m_capem_bank as ca', 'ca.id_capem_bank = d.id_capem_bank', 'inner');
            $this->db->join('m_cabang_bank as cb', 'cb.id_cabang_bank = ca.id_cabang_bank', 'inner');
            $this->db->where('da.status', 1);
            $this->db->group_by('cb.cabang_bank');
            $this->db->order_by('jml_debitur', 'desc');
            $this->db->limit(5);
            
            return $this->db->get();
            
        }

    // Akhir 14-03-2020

    public function get_data($tabel)
    {
        return $this->db->get($tabel);
        
    }

    public function get_jenis_asset()
    {
        $this->db->order_by('jenis_asset', 'asc');
    	return $this->db->get('m_jenis_asset');
    }

    public function get_data_asset($id_jenis_asset)
    {
        $this->db->select('id_dokumen_asset as id, d.nama_debitur, da.alamat, da.add_time, s.status_asset, ma.jenis_asset');
        $this->db->from('dokumen_asset as da');        
        $this->db->join('m_jenis_asset as ma', 'ma.id_jenis_asset = da.id_jenis_asset', 'left');
        $this->db->join('debitur as d', 'd.id_debitur = da.id_debitur', 'left');
        $this->db->join('status_asset as s', 's.id_status_asset = da.id_status_asset', 'left');
        $this->db->join('kota as k', 'k.id_kota = da.id_kota', 'left');
        $this->db->join('m_sifat_asset as ms', 'ms.id_sifat_asset = da.id_sifat_asset', 'left');
        $this->db->where('da.id_jenis_dok', '2');
        $this->db->where('da.status', '1');
        $this->db->where('ma.id_jenis_asset', $id_jenis_asset);

    	return $this->db->get();
    }

    public function tampil_favorite()
    {
        $this->db->select('a.id_dokumen_asset, ma.jenis_asset, de.nama_debitur, a.id_debitur');
        $this->db->from('dokumen_asset as a');        
        $this->db->join('m_jenis_asset as ma', 'ma.id_jenis_asset = a.id_jenis_asset', 'inner');
        $this->db->join('debitur as de', 'de.id_debitur = a.id_debitur', 'inner');
        $this->db->where('a.id_jenis_dok', '2');
        $this->db->where('a.status', 1);
        $this->db->WHERE('a.favorit', 1);

        $hasil =  $this->db->get()->result_array();
        
        $value = array();
        foreach ($hasil as $h) {
            $id_dok     = $h['id_dokumen_asset'];
            $jns_aset   = $h['jenis_asset'];
            $nm_deb     = $h['nama_debitur'];
            $id_deb     = $h['id_debitur'];

            $this->db->from('tr_foto_dokumen');
            $this->db->where('id_dokumen_asset', $id_dok);
            $this->db->where('id_debitur', $id_deb);
            $this->db->where('status', 1);

            $hasil_2 = $this->db->get()->result_array();

            

            foreach ($hasil_2 as $d) {
                $foto = $d['foto'];

                $value[] = ['id_dokumen_asset'  => $id_dok,
                            'jenis_asset'       => $jns_aset,
                            'nama_debitur'      => $nm_deb,
                            'id_debitur'        => $id_deb,
                            'foto'              => $foto
                         ];
            }
        }

        return $value;
    }

    public function jml_status_asset($status)
    {
        $this->db->from('dokumen_asset as da');
        $this->db->join('status_asset as s', 's.id_status_asset = da.id_status_asset', 'left');
        $this->db->where('da.id_jenis_dok', '2');
        $this->db->where('da.status', '1');
        $this->db->where('s.status_asset', $status);

        return $this->db->count_all_results();
    }

}