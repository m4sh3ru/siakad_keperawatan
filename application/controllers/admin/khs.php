<?php 

class Khs extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if ($this->session->userdata('username')=='') {
			redirect ('/');
		}elseif ($this->session->userdata('level')==3) {
			redirect ('mahasiswa', 'refresh');
		}
		$this->load->helper('dompdf_helper');
		$this->load->model(['mod_krs', 'mod_prodi', 'mod_matkul', 'mod_mahasiswa']);
	}

	public function index()
	{
		$session = ['prodi'=>'', 'mahasiswa'=>''];
		$this->session->unset_userdata($session);

		$data['header'] = "Kartu Hasil Studi (KHS)";
		$data['content'] = 'admin/khs/index';
		$data['prodi'] = $this->mod_prodi->get_prodi();
		$data['mahasiswa'] = $this->mod_mahasiswa->get_mahasiswa();
		$this->load->view('layout/template', $data);
	}

	public function auth_filter(){
		$prodi = $this->input->post('prodi');
		$mahasiswa = $this->input->post('mahasiswa');
		$exists = $this->mod_khs->check($prodi, $mahasiswa);

		if(is_null($prodi)){
			$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif"><strong>Maaf!</strong> Data yang anda cari tidak ditemukan di dalam sistem.</p>');
			redirect('admin/khs', 'refresh');
		}
		if($exists == NULL){
			$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif"><strong>Error!</strong> Data pencarian <strong>tidak</strong> ditemukan.</p>');
			redirect('admin/khs', 'refresh');
		}else{
			$session = [
				'prodi'=>$prodi,
				'mahasiswa'=>$mahasiswa,
			];
			$this->session->set_userdata($session);
			#redirect ke method hasil pencarian
			$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif"><strong>Berhasil!</strong> Data pencarian ditemukan.</p>');
			redirect('admin/khs/khs_mahasiswa', 'refresh');
		}
		

	}

	public function khs_mahasiswa(){
		
		if($this->session->userdata('prodi') == NULL){
			redirect('admin/khs', 'refresh');
		}

		$data['header'] = "Kartu Hasil Studi Mahasiswa";
		$data['content'] = 'admin/khs/khs_mahasiswa';
		$data['khs'] = $this->mod_khs->get_matkul_khs($this->session->userdata('prodi'));
		$data['mahasiswa'] = $this->mod_mahasiswa->get_mahasiswa_by_id($this->session->userdata('mahasiswa'));
		$data['prodi'] = $this->mod_prodi->get_prodi_by_id($this->session->userdata('prodi'));
		$data['get_semester'] = $this->mod_matkul->get_semester();
		$data['index'] = $this->mod_khs->grade();
		#$data['khs'] = $this->mod_khs->filter_khs($this->session->userdata('prodi'),$this->session->userdata('mahasiswa'));
		$this->load->view('layout/template', $data);
	}

	public function dd(){
		return $this->load->view('admin/khs/khs_view');
	}

	public function kartu_hasil_studi(){
		$data['khs'] = $this->mod_khs->get_matkul_khs($this->session->userdata('prodi'));
		$data['mahasiswa'] = $this->mod_mahasiswa->get_mahasiswa_by_id($this->session->userdata('mahasiswa'));
		$data['prodi'] = $this->mod_prodi->get_prodi_by_id($this->session->userdata('prodi'));
		$data['get_semester'] = $this->mod_matkul->get_semester();
		$data['index'] = $this->mod_khs->grade();
		$html = $this->load->view('admin/khs/khs_view',$data, TRUE);
		#echo $this->load->view('admin/khs/khs_view');
		pdf_show($html,"sample.pdf",true);
		#return $html;
	}

	
}