<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct(){

		parent::__construct();

		if ($this->session->userdata('username')=='') {
			redirect ('/');
		}elseif ($this->session->userdata('level')==1) {
			redirect ('admin/dashboard', 'refresh');
		}
		$this->load->model(['mod_matkul','mod_krs', 'mod_prodi','model_user', 'mod_mahasiswa', 'mod_khs']);
	}

	public function index() {
		$data['content'] = 'mahasiswa/index';
		$data['title'] = "Dashboard";
		$data['icon'] = "fa fa-dashboard";
		$data['dash'] = "class=enable";
		$data['mahasiswa'] = $this->mod_mahasiswa->mahasiswa_by_nim($this->session->userdata('username'));
		$data['sess'] = $this->mod_krs->krs_mhs($this->session->userdata('username'));
		$this->load->view('layout/publik-template', $data);
	}

	public function kartu_rencana_studi(){
		$sms = $this->uri->segment(3);
		if($sms){
			$data['krs'] = $this->mod_krs->get_krs_by_sms($this->session->userdata('username'), $sms);

		}
		$data['content'] = 'mahasiswa/krs';
		$data['title'] = "Kartu Rencana Studi";
		$data['icon'] = "fa fa-outdent";
		$data['kr'] = "class=enable";
		$data['semester'] = $this->mod_matkul->get_semester();
		$this->load->view('layout/publik-template', $data);
	}

	public function filter_sms(){
		

	}

	public function kartu_hasil_studi(){
		$data['content'] = 'mahasiswa/khs';
		$data['title'] = "Kartu Hasil Studi";
		$data['icon'] = "fa fa-tasks";
		$data['kh'] = "class=enable";
		$data['semester'] = $this->mod_matkul->get_semester();
		$data['khs'] = $this->mod_khs->get_matkul_khs($this->session->userdata('prodi'));
		$data['mahasiswa'] = $this->mod_mahasiswa->get_mahasiswa_by_id($this->session->userdata('mahasiswa'));
		$data['prodi'] = $this->mod_prodi->get_prodi_by_id($this->session->userdata('prodi'));
		$data['index'] = $this->mod_khs->grade();
		$this->load->view('layout/publik-template', $data);
	}

	function ubah_kata_sandi(){
		$data['content'] = 'mahasiswa/ubah_sandi';
		$data['title'] = "Ubah Kata Sandi";
		$data['icon'] = "fa fa-unlock";
		$this->load->view('layout/publik-template', $data);
	}

	function auth_sandi(){
		$pass = $this->input->post('password');
		$data = ['password'=>md5($pass), 'password_text'=>$pass,];
		$this->model_user->update_sandi($data, $this->session->userdata('username'));
		$this->session->set_flashdata('notif', '<p id="notif" class="alert alert-success" id="notif"><strong>Sukses!</strong> Perubahan kata sandi berhasil di proses.</p>');
		redirect('mahasiswa', 'refresh');
	}
	
}

?>

