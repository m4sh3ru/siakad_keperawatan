<?php

class Nilai extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if ($this->session->userdata('username')=='') {
			redirect ('/');
		}elseif ($this->session->userdata('level')==3) {
			redirect ('mahasiswa', 'refresh');
		}
		$this->load->model(['mod_nilai', 'mod_matkul', 'mod_periode', 'mod_kelas', 'mod_prodi', 'mod_mahasiswa']);
	}

	public function index(){
		$session = ['prodi'=>'', 'semester'=>'', 'mahasiswa'=>''];
		$this->session->unset_userdata($session);

		$data['header'] = "Nilai Mahasiswa";
		$data['content'] = 'admin/nilai/index';
		$data['nl'] = 'class=active';
		$data['nilai'] = $this->mod_nilai->get_nilai();
		$data['periode'] = $this->mod_periode->get_periode();
		$data['prodi'] = $this->mod_prodi->get_prodi();
		$data['mahasiswa'] = $this->mod_mahasiswa->get_mahasiswa();
		#$data['kelas'] = $this->mod_kelas->getKelas();
		$data['semester'] = $this->mod_matkul->get_semester();
		$this->load->view('layout/template', $data);
	}

	public function filter(){

		$id_prodi = $this->input->post('prodi');
		$id_sms = $this->input->post('semester');
		#$id_kls = $this->input->post('kelas');
		$id_mhs = $this->input->post('mahasiswa');

		if($id_prodi == NULL){
			redirect('admin/nilai', 'refresh');
		}

		$exists = $this->mod_khs->check($id_prodi, $id_mhs);
		if($exists == NULL){
			$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif"><strong>Error!</strong> Data pencarian <strong>tidak</strong> ditemukan.</p>');
			redirect('admin/nilai', 'refresh');
		}else{
			$session = [
					'prodi'=>$id_prodi,
					'semester'=>$id_sms,
					#'kelas'=>$id_kls,
					'mahasiswa'=>$id_mhs,
				];
			$this->session->set_userdata($session);
			redirect('admin/nilai/nilai_mahasiswa/', 'refresh'); 
		}

	}

	public function nilai_mahasiswa(){

		$prodi = $this->session->userdata('prodi');
		$sms = $this->session->userdata('semester');
		#$kelas = $this->session->userdata('kelas');
		$mhs = $this->session->userdata('mahasiswa');
		
		if($this->session->userdata('mahasiswa') == NULL){
			redirect('admin/nilai', 'refresh');
		}
		$data['header'] = "Nilai Mahasiswa";
		$data['content'] = 'admin/nilai/nilai_mahasiswa';
		$data['nl'] = 'class=active';
		$data['mahasiswa'] = $this->mod_mahasiswa->get_mahasiswa_by_id($mhs);
		$data['get'] = $this->mod_matkul->get_all($sms, $prodi);
		$data['semester'] = $this->mod_matkul->semester_by_id($sms);
		#$data['kelas'] = $this->mod_kelas->get_kelas_by_id($kelas);
		$data['prodi'] = $this->mod_prodi->get_prodi_by_id($prodi);
		
		#$data['semester'] = $this->mod_matkul->get_semester();
		$this->load->view('layout/template', $data);
	}

	public function auth_insert_nilai(){
		$prodi = $this->session->userdata('prodi');
		$sms = $this->session->userdata('semester');
		#$kelas = $this->session->userdata('kelas');
		$mhs = $this->session->userdata('mahasiswa');
		$nilai = str_replace(',','.',$this->input->post('id'));
		$matkul = $this->input->post('matkul');

		$exists = $this->mod_nilai->check($mhs, $matkul, $prodi, $sms);
		$check_grade2 = $this->mod_nilai->check_value_grade($nilai);
		$check_grade = $this->db->where('value', $nilai)->get('ref_grade')->num_rows();
		
		if($check_grade >= 1){
			if(!$exists){
				$this->mod_nilai->add_nilai($mhs, $matkul, $prodi, $sms, $nilai);
				echo "<p class='alert alert-success'><strong>Sukses!</strong> Data yang anda masukkan berhasil di proses.</p>";
			}else{
				$this->mod_nilai->update_nilai($mhs, $matkul, $prodi, $sms, $nilai);
				echo "<p class='alert alert-success'><strong>Sukses!</strong> Perbaruan data berhasil di proses.</p>";
			}
			
		}else{
			echo "<p class='alert alert-danger'><strong>Error!</strong> Data gagal diproses. Nilai yang anda masukkan tidak dikenali!</p>";
		}
	}

	/*public function filter_matkul(){
		$mhs = $this->input->post('mahasiswa');
		$mt = $this->input->post('matkul');
		if(is_null($mhs) or is_null($mt)){
			redirect('admin/nilai/nilai_mahasiswa');
		}
		redirect('admin/nilai/input_nilai_mahasiswa/'.$mhs.'/'.$mt, 'refresh');
	}

	public function input_nilai_mahasiswa(){
		$mhs = $this->uri->segment(4);
		$prodi = $this->session->userdata('prodi');
		$sms = $this->session->userdata('semester');
		#$kelas = $this->session->userdata('kelas');

		if($this->session->userdata('prodi') == NULL or $mhs == NULL){
			redirect('admin/nilai', 'refresh');
		}
		$data['semester'] = $this->mod_matkul->semester_by_id($sms);
		$data['kelas'] = $this->mod_kelas->get_kelas_by_id($kelas);
		$data['prodi'] = $this->mod_prodi->get_prodi_by_id($prodi);
		$data['mahasiswa'] = $this->mod_mahasiswa->get_mahasiswa_by_id($mhs);
		$data['header'] = "Nilai Mahasiswa";
		$data['content'] = 'admin/nilai/input_nilai';
		$data['nl'] = 'class=active';
		$this->load->view('layout/template', $data);
		

	}*/

	
}



