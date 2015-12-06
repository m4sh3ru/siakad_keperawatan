<?php 
class Prodi extends CI_Controller{
		

public function __construct(){

		parent::__construct();

		if ($this->session->userdata('username')=='') {
			redirect ('/');
		}elseif ($this->session->userdata('level')==3) {
			redirect ('mahasiswa', 'refresh');
		}
		$this->load->model(['mod_dosen', 'mod_prodi']);
		}

		public function index(){
			$data['header'] = "Data Prodi";
			$data['prd'] = 'class=active';
			$data['content'] = 'admin/prodi/index';
			$data['get_prodi'] = $this->mod_prodi->get_prodi();
			$data['dosen'] = $this->mod_dosen->get_dosen();
			$this->load->view('layout/template', $data);
		}

		public function auth_add_prodi(){
			$klik = $this->input->post('add_prodi');

			$no_izin = $this->input->post('no_izin');
			$nm_prodi = $this->input->post('nm_prodi');
			$nm_ketua = $this->input->post('nm_ketua');

			if (isset($klik)) {
				# code...
				$this->mod_prodi->add_prodi($no_izin, $nm_prodi, $nm_ketua);
				$this->session->set_flashdata('notif', '<p id="notif" class="alert alert-success" id="notif">Data Inputan Prodi telah berhasil disimpan.</p>');
				redirect('admin/prodi', 'refresh');
			}
				$this->session->set_flashdata('notif', '<p id="notif" class="alert alert-danger" id="notif">Maaf!Anda mengakses halaman secara tidak sah!</p>');
				redirect('admin/prodi', 'refresh');
		}

		public function add_prodi(){
			$data['header'] = 'Tambah Data Prodi';
			$data['content'] = 'admin/prodi/add_prodi';
			$data['dosen'] = $this->mod_dosen->get_dosen();
			$this->load->view('layout/template', $data);
		}

		public function auth_edit_prodi(){
			$id = $this->input->post('id');

			$no_izin = $this->input->post('no_izin');
			$nm_prodi = $this->input->post('nm_prodi');
			$nm_ketua = $this->input->post('nm_ketua');

			if ($id != null) {
				# code...
				$this->mod_prodi->set_edit($no_izin, $nm_prodi, $nm_ketua, $id);
				$this->session->set_flashdata('notif', '<p id="notif" class="alert alert-success" id="notif">Perubahan data prodi berhasil di simpan.</p>');
				redirect('admin/prodi', 'refresh');
			}
				$this->session->set_flashdata('notif', '<p id="notif" class="alert alert-danger" id="notif">Maaf!Anda mengakses halaman secara tidak sah!</p>');
		}

		public function edit_prodi(){
			$data['header'] = "Edit Prodi";
			$data['content'] = 'admin/prodi/edit_prodi';
			$data['dosen'] = $this->mod_dosen->get_dosen();
			$data['prodi_by_id'] = $this->mod_prodi->get_prodi_by_id($this->uri->segment(4));

			$this->load->view('layout/template', $data);
		}

		public function del_prodi(){
			$id = $this->uri->segment(4);

			if ($id !=null) {
				# code...
				$this->mod_prodi->delete($id);
				$this->session->set_flashdata('notif', '<p id="notif" class="alert alert-success" id="notif">Data Prodi berhasil di Hapus.</p>');
				redirect('admin/prodi', 'refresh');	
			}
			$this->session->set_flashdata('notif', '<p id="notif" class="alert alert-success" id="notif">Penghapusan data gagal. Silahkan periksa kembali!</p>');
			redirect('admin/prodi', 'refresh');
		}
}
?>