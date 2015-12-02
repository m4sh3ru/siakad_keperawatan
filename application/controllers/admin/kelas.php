<?php 
	class Kelas extends CI_Controller{

		public function __construct(){
			parent::__construct();

			if($this->session->userdata('username')==""){
				redirect('auth');
			}
			$this->load->model(['mod_kelas', 'mod_periode', 'mod_prodi']);
		}

		public function index(){
			$data['header'] = "Kelas Mahasiswa";
			$data['username'] = $this->session->userdata('username');
			$data['content'] = 'admin/kelas/index';
			$data['get_kelas'] = $this->mod_kelas->get_kelas();
			
			$this->load->view('layout/template', $data);
		}

		public function auth_add_kelas(){
			$klik = $this->input->post('submit');
			$exists = $this->mod_kelas->check();
			$kelas= $this->input->post('kelas');
			$prodi= $this->input->post('prodi');
			$th= $this->input->post('periode');

			if ($klik) {
				# code...
				if(!$exists){
					$this->mod_kelas->add_kelas($kelas, $prodi, $th);
					$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif"><strong>Sukses!</strong>Inputan data tahun ajaran telah berhasil di simpan.</p>');
					
				}else{
					#$this->mod_kelas->update_kelas($kelas, $prodi, $th);
					$this->session->set_flashdata('notif', '<p class="alert alert-info" id="notif"><strong>Maaf!</strong> Data telah tersedia didalam sistem.</p>');
				}
				redirect('admin/kelas', 'refresh');
				
			}
				$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif"><strong>Error!</strong> Inputan data tahun ajaran gagal di proses. Silahkan periksa inputan anda!</p>');
				redirect('admin/kelas', 'refresh');
		}

		public function add_kelas(){
			$data['header']	= 'Tambah Data kelas';
			$data['content']= 'admin/kelas/add';
			$data['periode'] = $this->mod_periode->get_periode();
			$data['prodi'] = $this->mod_prodi->get_prodi();
			$this->load->view('layout/template', $data);

		}

		public function update_kelas(){
			$id = $this->input->post('id');

			$kelas= $this->input->post('kelas');
			$prodi= $this->input->post('prodi');
			$th= $this->input->post('periode');
			
			if ($id !==null) {
					# code...
					$this->mod_kelas->set_edit($kelas, $prodi, $th, $id);
					$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif"><strong>Sukses!</strong> Perubahan data tahun ajaran berhasil di simpan.</p>');
					redirect('admin/kelas', 'refresh');
				}	
					$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif"><strong>Error!</strong> Perubahan gagal dilakukan. Silahkan periksa kembali inputan anda!</p>');
					redirect('admin/kelas', 'refresh');
		}

		public function edit_kelas(){
			$data['header'] = 'Edit Data kelas';
			$data['content'] = 'admin/kelas/edit';
			$data['periode'] = $this->mod_periode->get_periode();
			$data['prodi'] = $this->mod_prodi->get_prodi();
			$data['kelas_by_id'] = $this->mod_kelas->get_kelas_by_id($this->uri->segment(4));

			$this->load->view('layout/template', $data);
		}

		public function del_kelas($id){
			$id = $this->uri->segment(4);

			if ($id !==null) {
				# code...
				$this->mod_kelas->delete($id);
				$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif"><strong>Sukses!</strong> Data tahun ajaran telah berhasil di hapus.</p>');
				redirect('admin/kelas', 'refresh');
			}

				$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif"><strong>Error!</strong> Penghapusan data gagal dilakukan. Silahkan periksa kembali !</p>');
				redirect('admin/kelas', 'refresh');
		}

	}
?>
