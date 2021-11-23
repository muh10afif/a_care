<?php

class M_login extends CI_Model
{
	// public function cek_user_login($user,$pass)
	// {
	// 	$this->db->select('l.level, k.nama_lengkap, k.alamat');
	// 	$this->db->from('pengguna as p');
	// 	$this->db->join('level as l', 'l.id_level = p.level','left');
	// 	$this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan','left');
	// 	$this->db->join('status_pengguna as sp', 'sp.id_status_pengguna = p.status_pengguna','left');
	// 	$this->db->where('p.username', $user)->where('p.password', $pass);

	// 	return $this->db->get();
	// }

	// cek username
	public function cek_user_login($username)
	{
		$this->db->select('p.username, p.sha, l.level, l.id_level');
		$this->db->from('pengguna as p');
		$this->db->join('level as l', 'l.id_level = p.level', 'inner');
		$this->db->where('p.username', $username);
		
		
		return $this->db->get();
		
	}

}