<?php 
	class Krs extends CI_Controller{

		public function __construct(){
			parent::__construct();

			if ($this->session->userdata('username')=='') {
				redirect ('/');
			}elseif ($this->session->userdata('level')==3) {
				redirect ('mahasiswa', 'refresh');
			}
			$this->load->model(['mod_prodi','mod_periode','mod_krs', 'mod_matkul', 'mod_prodi']);
		}

		public function index(){
			$session = ['prodi'=>'',];
			$this->session->unset_userdata($session);

			$data['header'] = "Data krs mahasiswa";
			$data['content'] = 'admin/krs/index';
			$data['get_krs'] = $this->mod_krs->get_krs();
			$data['periode'] = $this->mod_periode->get_periode();
			$data['prodi'] = $this->mod_prodi->get_prodi();
			$data['semester'] = $this->mod_matkul->get_semester();
			$this->load->view('layout/template', $data);
		}

		public function nilai_mahasiswa(){
			$data['header'] = "daftar nilai mahasiswa prodi X";
			$data['content'] = 'admin/krs/list_mahasiswa';
			$this->load->view('layout/template', $data);
		}

		public function filter_prodi()
		{
			$prodi = $this->input->post('prodi');
				$session = [
				'prodi'=>$prodi,
			];
			$this->session->set_userdata($session);
			if($prodi == NULL){
				redirect('admin/krs', 'refresh');
			}
			redirect('admin/krs/prodi/', 'refresh');
		}

		public function prodi()
		{
			$prodi = $this->session->userdata('prodi');
			if($prodi==NULL){
				redirect('admin/krs', 'refresh');
			}
			$data['header'] = "Data krs Prodi";
			$data['content'] = 'admin/krs/list_krs';
			$data['prodi_by_id'] = $this->mod_prodi->get_prodi_by_id($prodi);
			$data['krs'] = $this->mod_krs->get_krs_by_prodi($prodi);
			$data['matkul'] = $this->mod_krs->get_matkul();
			$data['all_krs'] = $this->mod_krs->get_all_krs();
			$data['semester'] = $this->mod_krs->get_semester();

			$this->load->view('layout/template', $data);
			
		}

		public function insert_krs(){
			$matkul = $this->input->post('matkul');
			$prodi = $this->input->post('prodi');
			
			if(!is_null($matkul)){
				foreach($matkul as $rs){
					$data = [
						'ref_prodi_id'=>$prodi,
						'mst_matkul_id'=>$rs,
					];
					$this->mod_krs->add_krs($data);
				}
				$this->session->set_flashdata('notif', '<p id="notif" class="alert alert-success" id="notif">Data Kartu Rencana Studi berhasil disimpan</p>');
				redirect ('admin/krs/prodi/'.$prodi, 'refresh');
			}
			$this->session->set_flashdata('notif', '<p id="notif" class="alert alert-danger" id="notif">Maaf! Pemrosesan data gagal. Silahkan periksa inputan anda!</p>');
			redirect ('admin/krs/prodi/'.$prodi, 'refresh');
		}	

		public function add_krs(){
			$data=array();
			foreach ($this->input->post('kode_matkul') as $km) {
				# code...
			}
			$data['header'] = 'Input KRS';
			$data['content'] = 'admin/krs/input_krs';
			$data['get_matkul']	= $this->mod_krs->get_matkul();
			$data['mahasiswa_by_id'] = $this->mod_krs->get_mahasiswa_by_id($this->uri->segment(4));
			$data['get_mahasiswa'] = $this->mod_krs->get_mahasiswa();
			$data['get_semester'] = $this->mod_krs->get_semester();
			$this->load->view('layout/template', $data);
		}
	}
?>