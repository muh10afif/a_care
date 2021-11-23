<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

   public function index()
   {
      $this->load->library('Cek_login_lib');
      $this->cek_login_lib->logged_in_2();

   	$this->load->view('V_login');
   }

   public function auth()
	{
		$u = $this->input->post('username', TRUE);
		$p = $this->input->post('password', TRUE);

		$username = trim(htmlspecialchars($u, ENT_QUOTES)); 
		$password = trim(htmlspecialchars($p, ENT_QUOTES)); 

		$cek_username = $this->M_login->cek_user_login($username);

		if ($cek_username->num_rows() != 0) {
			$data = $cek_username->row_array();
			
			// cek password dengan verify
			if (password_verify($password,$data['sha'])) {

				if ($data['id_level'] == 1) {
					$data_session = array(
						'nama' 	=> $data['username'],
						'masuk' => 'a_care',
						'level'	=> $data['level']
					);
					$this->session->set_userdata($data_session);

					// berhasil login
					echo json_encode(['hasil' => 2]);
				} else {
					// bukan user a-care
					echo json_encode(['hasil'	=> 3]);
				}

			} else {
				// password salah
				echo json_encode(['hasil'  => 1]);
			}

		} else {
			// username tidak ditemukan
			echo json_encode(['hasil'  => 0]);
		}

	}

   public function logout()
   {
		$us = $this->session->userdata('masuk');
	
		if ($us == 'a_care') {
			$this->session->sess_destroy();
			redirect('login');  
		} else {
			redirect('login');  
		}
   }

}