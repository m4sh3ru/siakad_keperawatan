<?php 
class Matakuliah extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('username')==""){
			redirect('auth');
		}

		$this->load->model('mod_matkul');
	}

	public function index(){
		$data['header'] = "Data Mata Kuliah";
		$data['content'] = 'admin/matkul/index';
		$data['get_matkul'] = $this->mod_matkul->get_matkul();
		$data['sks'] = $this->mod_matkul->total_sks();

		$this->load->view('layout/template', $data);
	}

	public function auth_add_matkul(){
		$klik = $this->input->post('submit');

		$kode_matkul = $this->input->post('kode_matkul');
		$nm_matkul = $this->input->post('nm_matkul');
		$sks = $this->input->post('sks');
		$semester = $this->input->post('semester');

		if (isset($klik)) {
			$exists = $this->mod_matkul->check();
			if(!$exists){
				$this->mod_matkul->add_matkul($kode_matkul, $nm_matkul, $sks, $semester);
			}else{
				$data = [
					'kode_matkul'=>$kode_matkul, 
					'nama_matkul'=>ucwords($nm_matkul),
					'sks'=>$sks,
					'semester'=>$semester,
				];
				$this->mod_matkul->update_matkul($data);
			}
			$this->session->set_flashdata('notif','<p class="alert alert-success" id="notif">Inputan data mata kuliah berhasil di simpan.</p>');
			redirect('admin/matakuliah', 'refresh');
			
		}
			$this->session->set_flashdata('notif','<p class="alert alert-danger" id="notif">Inputan gagal di proses. Silahkan periksa kembali inputan anda!</p>');
			redirect('admin/matakuliah', 'refresh');
	}

	public function add_matkul(){
		$data['header'] = "Tambah Data Matakuliah";
		$data['content'] = 'admin/matkul/add_matkul';
		$data['get_semester'] = $this->mod_matkul->get_semester();

		$this->load->view('layout/template', $data);
	}

	public function auth_edit_matkul(){
		$id = $this->input->post('id');

		$kode_matkul = $this->input->post('kode_matkul');
		$nm_matkul = $this->input->post('nm_matkul');
		$sks = $this->input->post('sks');
		$semester = $this->input->post('semester');

		if ($id !=null) {
				# code...
				$this->mod_matkul->set_edit($kode_matkul, $nm_matkul, $sks, $semester, $id);
				$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif">Perubahan data mata kuliah berhasil diproses.</p>');
				redirect('admin/matakuliah', 'refresh');
			}
				$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif">Perubahan data mata kuliah gagal di proses. Silahkan periksa inputan anda!</p>');
				redirect('admin/matakuliah', 'refresh');
	}

	public function edit_matkul(){
		$data['header'] = 'Edit Data Matakuliah';
		$data['content'] = 'admin/matkul/edit_matkul';
		$data['get_semester'] = $this->mod_matkul->get_semester();

		$data['matkul_by_id'] = $this->mod_matkul->get_matkul_by_id($this->uri->segment(4));
		$this->load->view('layout/template', $data);
	}

	public function del_matkul(){
		$id = $this->uri->segment(4);

			if ($id !=null) {
				# code...
				$this->mod_matkul->delete($id);
				$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif">Data mata kuliah berhasil di proses.</p>');
				redirect('admin/matakuliah', 'refresh');	
			}
			$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif">Penghapusan data mata kuliah gagal dilakukan. Silahkan periksa kembali inputan anda!</p>');
			redirect('admin/matakuliah', 'refresh');
	}
}

?>