<?php 
class Dosen extends CI_Controller{
	
	public function __construct(){

		if ($this->session->userdata('username')=='') {
			redirect ('/');
		}elseif ($this->session->userdata('level')==3) {
			redirect ('mahasiswa', 'refresh');
		}
		$this->load->helper('dompdf', 'file');
		$this->load->model(['mod_dosen', 'mod_mahasiswa']);
	}

	public function index(){
		$data['header'] = "Data Dosen";
		$data['username'] = $this->session->userdata('username');
		$data['content'] = 'admin/dosen/index';
		$data['get_dosen'] = $this->mod_dosen->get_dosen();
		
		#$data['get_kelamin'] = $this->mod_dosen->get_kelamin();

		$this->load->view('layout/template', $data);
	}

	public function auth_add_dosen(){
		$klik = $this->input->post('add_dosen');

		$nama_lengkap = $this->input->post('nama_lengkap');
		$nidn = $this->input->post('nidn');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jns_kelamin = $this->input->post('jns_kelamin');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');

		if (isset($klik)) {
			$this->mod_dosen->add_dosen($nama_lengkap, $nidn, $tempat_lahir,$tanggal_lahir, $jns_kelamin, $agama, $alamat, $no_telp);
			$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif">Proses SUKSES</p>');
			redirect('admin/dosen', 'refresh');	
		}
			$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif">Proses GAGAL</p>');
	}

	function pdf()
	{
	     #$this->load->helper(array('dompdf_helper', 'file'));
	     // page info here, db calls, etc.     
	     #$html = $this->load->view('controller/viewfile', $data, true);

		$html =
		 'haiiiiiii';


 		#$data = pdf_create($html, '', false);
		pdf_show($html,"sample.pdf", true);
	     #pdf_create($html, 'filename.pdf');
	    /* or
	     $data = pdf_create($html, '', false);
	     write_file('name', $data);*/
	     //if you want to write it to disk and/or send it as an attachment    
	}

	public function add_dosen(){
		$data['header'] = "Menambahkan Data Dosen";
		$data['content'] = 'admin/dosen/add_dosen';
		$data['agama'] = $this->mod_mahasiswa->get_agama();

		$this->load->view('layout/template', $data);
	}

	public function auth_edit_dosen(){
		$id= $this->input->post('id');

		$nama_lengkap = $this->input->post('nama_lengkap');
		$nidn = $this->input->post('nidn');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jns_kelamin = $this->input->post('jns_kelamin');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');

		if ($id !=null){
			$this->mod_dosen->set_edit($nama_lengkap, $nidn, $tempat_lahir, $tanggal_lahir, 
										$jns_kelamin, $agama, $alamat, $no_telp,$id);
			$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif">Data Inputan Dosen baru berhasil disimpan.</p>');
			redirect('admin/dosen', 'refresh');
		}
			$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif">Data Inputan Dosen gagal diproses. Silahkan periksa kembali!</p>');
			redirect('admin/dosen', 'refresh');
	}

	public function edit_dosen(){
		$data['header'] = "Edit Data Dosen";
		$data['content'] = 'admin/dosen/edit_dosen';
		$data['agama'] = $this->mod_mahasiswa->get_agama();
		
		$data['dosen_by_id'] = $this->mod_dosen->get_dosen_by_id($this->uri->segment(4));

		$this->load->view('layout/template', $data);
	}

	public function del_dosen(){
		$id = $this->uri->segment(4);	

		if ($id !=null) {
			# code...
			$this->mod_dosen->delete($id);
			$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif"><strong>Sukses!</strong> Data dosen berhasil di Hapus/</p>');
			redirect('admin/dosen', 'refresh');
		}
			$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif"><strong>Danger!</strong> Data gagal di proses.</p>');	
			redirect('admin/dosen', 'refresh');
	}
}
?>