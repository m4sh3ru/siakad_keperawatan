<?php
	session_start();

	class Dashboard extends CI_Controller{
		
		public function __construct(){

		parent::__construct();

		if ($this->session->userdata('username')=="") {
			# code...
			redirect ('auth');
		}
		$this->load->helper('text');
		}

		public function index(){
			$data['header'] = 'Dashboard';
			$data['username'] = $this->session->userdata('username');
			$data['content'] = "admin/index";
			$data['dash'] = 'class=active';
			$this->load->view('layout/template', $data);
		}

		public function logout(){
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('level');
			session_destroy();
			redirect('/');
		}
	}
?>