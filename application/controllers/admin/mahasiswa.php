<?php
class Mahasiswa extends CI_Controller{
		
		public function __construct(){

			parent::__construct();

			if ($this->session->userdata('username')=='') {
				redirect ('/');
			}elseif ($this->session->userdata('level')==3) {
				redirect ('mahasiswa', 'refresh');
			}
			$this->load->library('upload');
			$this->load->helper('download');
			$this->load->model(array('mod_periode', 'mod_prodi', 'mod_mahasiswa'));
		}

		public function index(){
			$data['header'] = "Data Mahasiswa";
			$data['username'] = $this->session->userdata('username');
			$data['content'] = 'admin/mahasiswa/index';
			$data['mhs'] = 'class=active';
			$data['get_mahasiswa'] = $this->mod_mahasiswa->get_mahasiswa();
			$this->load->view('layout/template', $data);
		}

		public function auth_add_mahasiswa(){
			$klik = $this->input->post('add_mahasiswa');

			$nim = $this->input->post('nim');
			$nm_mahasiswa = $this->input->post('nama_lengkap');
			$agama  = $this->input->post('agama');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$periode = $this->input->post('periode');
			$jk = $this->input->post('jk');
			$jurusan = $this->input->post('prodi');
			$no_telp = $this->input->post('no_telp');
			$alamat = $this->input->post('alamat');

			if ($nim) {
				$this->mod_mahasiswa->add_mahasiswa($nim, $nm_mahasiswa, 
					$tempat_lahir,$periode,  $tgl_lahir, $jk, $jurusan, $agama, $no_telp, $alamat);
				$this->session->set_flashdata('notif', '<p id="notif" class="alert alert-success" id="notif">Data Inputan Mahasiswa telah berhasil disimpan.</p>');
				redirect ('admin/mahasiswa', 'refresh');				
			}else{
				$this->session->set_flashdata('notif', '<p id="notif" class="alert alert-danger" id="notif">Maaf!Anda mengakses halaman secara tidak sah!</p>');
				redirect ('admin/mahasiswa', 'refresh');
			}
							
		}

		public function add_mahasiswa(){
			$data['header'] = 'Tambah Data Mahasiswa';
			$data['periode'] = $this->mod_periode->get_periode();
			$data['prodi'] = $this->mod_prodi->get_prodi();
			$data['agama'] = $this->mod_mahasiswa->get_agama();
			$data['content'] = 'admin/mahasiswa/add_mahasiswa';

			$this->load->view('layout/template', $data);
		}

		public function auth_edit_mahasiswa(){
			$id = $this->input->post('id');

			$nim = $this->input->post('nim');
			$nm_mahasiswa = $this->input->post('nama_lengkap');
			$agama  = $this->input->post('agama');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$periode = $this->input->post('periode');
			$jk = $this->input->post('jk');
			$jurusan = $this->input->post('prodi');
			$no_telp = $this->input->post('no_telp');
			$alamat = $this->input->post('alamat');

			if ($id !=null) {
				# code...
				$this->mod_mahasiswa->set_edit($nim, $nm_mahasiswa, 
					$tempat_lahir,$periode,  $tgl_lahir, $jk, $jurusan, $agama, $no_telp, $alamat, $id);
				$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif">Perubahan data berhasi disimpan</p>');
				redirect('admin/mahasiswa', 'refresh');
			}
				$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif">Perubaha data gagal di proses, Silahkan periksa kembali inputan anda</p>');
				redirect('admin/mahasiswa', 'refresh');
		}

		public function edit_mahasiswa(){
			$data['header']	= "Edit Data Mahasiswa";
			$data['content'] = 'admin/mahasiswa/edit_mahasiswa';
			$data['periode'] = $this->mod_periode->get_periode();
			$data['prodi'] = $this->mod_prodi->get_prodi();
			$data['agama'] = $this->mod_mahasiswa->get_agama();

			$data['mhs_by_id'] = $this->mod_mahasiswa->get_mahasiswa_by_id($this->uri->segment(4));
			$this->load->view('layout/template', $data);
		}

		public function del_mahasiswa(){
			$id = $this->uri->segment(4);

			if ($id !=null) {
				# code...
				$this->mod_mahasiswa->delete($id);
				$this->session->set_flashdata('notif', '<p class="alert alert-success" id="notif">Data mahasiswa berhasil dihapus!</p>');
				redirect('admin/mahasiswa', 'refresh');
			}
				$this->session->set_flashdata('notif', '<p class="alert alert-danger" id="notif">Penghapusan data gagal dilakukan. Periksa kembali data anda!</p>');
				redirect('admin/mahasiswa', 'refresh');
		}


		public function import_file()
		{
			$config['upload_path'] = './uploaded/';
    		$config['allowed_types'] = 'xls|xlsx|csv';

		
			
			//$this->upload->initialize($config);
			$this->upload->initialize($config);
			#$this->load->library('upload', $config);
    
				if($this->upload->do_upload('userfile')) {
					$data = array('error' => false);
            		$upload_data = $this->upload->data();

					

		            $file =  $upload_data['full_path'];
		            echo $file;
				            //read file from path
					$objPHPExcel = PHPExcel_IOFactory::load($file);
					//get only the Cell Collection
					$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
					//extract to a PHP readable array format
					foreach ($cell_collection as $cell) {
					    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
					    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
					    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
					    //header will/should be in row 1 only. of course this can be modified to suit your need.
					    if ($row == 1) {
					        $header[$row][$column] = $data_value;
					    } else {
					        $arr_data[$row][$column] = $data_value;
					    }
					}
					//send the data in an array format
					$data['header'] = $header;
					$data['values'] = $arr_data;
					#print_r($arr_data);
					foreach($arr_data as $r){
						$this->mod_mahasiswa->add_mahasiswa($r['B'], $r['C'], $r['D'], $r['E'], $r['F'], $r['G'], $r['H'], $r['I'], $r['J'], $r['K'] );
					}
		           
					$this->session->set_flashdata('notif','<i class="alert alert-success"><strong>Sukses!</strong> Import data telah berhasil di proses!</i>');
					redirect('admin/mahasiswa', 'refresh');
				} else {

					$this->session->set_flashdata('notif','<i class="alert alert-danger"><strong>Error!</strong> Import data gagal diproses. Silahkan periksa data anda!</i>');
					redirect('admin/mahasiswa', 'refresh');
				}
		}

		public function download_template(){
			$data = file_get_contents("./uploaded/temp/format_import_mahasiswa.xlsx"); // Read the file's contents
			$name = 'data_mahasiswa.xlsx';

			force_download($name, $data); 
		}
	}
?>