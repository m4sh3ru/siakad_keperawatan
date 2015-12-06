<?php

class Dashboard extends CI_Controller{
	
	public function __construct(){

	parent::__construct();

		if ($this->session->userdata('username')=='') {
			redirect ('/');
		}
	}

	public function index(){

		if($this->session->userdata('level')==3) {
			redirect ('mahasiswa', 'refresh');
		}

		$data['header'] = 'Dashboard';
		$data['username'] = $this->session->userdata('username');
		$data['t_mahasiswa'] = $this->db->count_all('mst_mahasiswa');
		$data['t_dosen'] = $this->db->count_all('mst_dosen');
		$data['t_user'] = $this->db->count_all('mst_user');
		$data['content'] = "admin/index";
		$data['dash'] = 'class=active';
		$this->load->view('layout/template', $data);
	}

	public function logout(){
		$this->session->unset_userdata('username', '');
		$this->session->unset_userdata('level', '');
		$this->session->unset_userdata('prodi', '');
		$this->session->unset_userdata('mahasiswa', '');
		$this->session->unset_userdata('id', '');
		session_destroy();
		redirect('/');
	}
}
?>