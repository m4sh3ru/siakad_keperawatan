<?php

class Account extends CI_Controller{

	public function __construct(){
		parent::__construct();

			if ($this->session->userdata('username')=="") {
				# code...
				redirect('auth');
			}
		$this->load->model('model_user');
	}

	public function index(){
		$data['header'] = "Data Mahasiswa";
		
		$data['content'] = 'admin/akun/index';
		$data['akun'] = 'class=active';
		$data['user'] = $this->model_user->get_user();
		$this->load->view('layout/template', $data);
	}

	public function add(){
		$data['header'] = "Menambahkan Data Pengguna";
		$data['content'] = 'admin/akun/add';
		$data['akun'] = 'class=active';
		$data['level'] = $this->model_user->get_level();

		$this->load->view('layout/template', $data);
	}

	public function auth_add(){
		
		$submit = $this->input->post('save');
		$data = [
			'username'=>$this->input->post('user'),
			'password'=>md5($this->input->post('pass')),
			'password_text'=>$this->input->post('pass'),
			'ref_level_id'=>$this->input->post('level'),
			'status'=>1
		];
		if(isset($submit)){
			$this->model_user->add($data);
			$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif">Inputan data pengguna berhasil disimpan.</p>');
			redirect('admin/account', 'refresh');
		}
		$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif"><strong>Danger!</strong> Anda mengakses halaman secara illegal</p>');
		redirect('admin/account', 'refresh');

	}

	public function edit(){
		$data['header'] = "Mengubah Data Pengguna";
		$data['content'] = 'admin/akun/edit';
		$data['akun'] = 'class=active';
		$data['level'] = $this->model_user->get_level();
		$data['user'] = $this->model_user->user_by_id($this->uri->segment(4));
		$this->load->view('layout/template', $data);
	}

	public function update(){
		$id = $this->input->post('id');
		$data = [
			'username'=>$this->input->post('user'),
			'password'=>md5($this->input->post('pass')),
			'password_text'=>$this->input->post('pass'),
			'ref_level_id'=>$this->input->post('level'),
			'status'=>1
		];
		if($id){
			$this->model_user->update($data, $id);
			$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif"><strong>Sukses!</strong>Inputan data pengguna berhasil disimpan.</p>');
			redirect('admin/account', 'refresh');
		}
		$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif"><strong>Danger!</strong> Perubahan gagal di proses.</p>');
		redirect('admin/account', 'refresh');
	}

	public function del(){
		$id = $this->uri->segment(4);	

		if ($id !=null) {
			$this->model_user->delete($id);
			$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif"><strong>Sukses!</strong> Data dosen berhasil di Hapus.</p>');
			redirect('admin/account', 'refresh');
		}
			$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif"><strong>Danger!</strong> Data gagal di proses.</p>');	
			redirect('admin/account', 'refresh');
	}

}

	