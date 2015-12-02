<?php 
	class Tahun_ajaran extends CI_Controller{

		public function __construct(){
			parent::__construct();

			if($this->session->userdata('username')==""){
				redirect('auth');
			}
			$this->load->model('mod_periode');
		}

		public function index(){
			$data['header'] = "Tahun periode";
			$data['username'] = $this->session->userdata('username');
			$data['content'] = 'admin/periode/index';
			$data['get_periode'] = $this->mod_periode->get_periode();

			$this->load->view('layout/template', $data);
		}

		public function auth_add_periode(){
			$klik = $this->input->post('add_periode');
			$exists = $this->mod_periode->check();
			$thn_periode = $this->input->post('thn_periode');

			if ($thn_periode) {
				# code...
				if(!$exists){
					$this->mod_periode->add_periode($thn_periode);
					$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif">Inputan data tahun ajaran telah berhasil di simpan.</p>');
					
				}else{
					$this->mod_periode->update_periode($thn_periode);
					$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif">Inputan data tahun ajaran telah berhasil di simpan.</p>');
				}
				redirect('admin/tahun_ajaran', 'refresh');
				
			}
				$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif">Inputan data tahun ajaran gagal di proses. Silahkan periksa inputan anda!</p>');
				redirect('admin/tahun_ajaran', 'refresh');
		}

		public function add_periode(){
			$data['header']	= 'Tambah Data periode';
			$data['content']= 'admin/periode/add';

			$this->load->view('layout/template', $data);

		}

		public function update_periode(){
			$id = $this->input->post('id');

			$thn_periode = $this->input->post('thn_periode');
			
			if ($id !==null) {
					# code...
					$this->mod_periode->set_edit($thn_periode, $id);
					$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif">Perubahan data tahun ajaran berhasil di simpan.</p>');
					redirect('admin/tahun_ajaran', 'refresh');
				}	
					$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif">Perubahan gagal dilakukan. Silahkan periksa kembali inputan anda!</p>');
					redirect('admin/tahun_ajaran', 'refresh');
		}

		public function edit_periode(){
			$data['header'] = 'Edit Data periode';
			$data['content'] = 'admin/periode/edit';

			$data['periode_by_id'] = $this->mod_periode->get_periode_by_id($this->uri->segment(4));

			$this->load->view('layout/template', $data);
		}

		public function del_periode($id){
			$id = $this->uri->segment(4);

			if ($id !==null) {
				# code...
				$this->mod_periode->delete($id);
				$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif">Data tahun ajaran telah berhasil di hapus.</p>');
				redirect('admin/tahun_ajaran', 'refresh');
			}

				$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif">Penghapusan data gagal dilakukan. Silahkan periksa kembali !</p>');
				redirect('admin/tahun_ajaran', 'refresh');
		}

	}
?>