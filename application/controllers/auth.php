<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){

		parent::__construct();

		if ($this->session->userdata('username')) {
			if($this->session->userdata('level')==1){
				redirect ('admin/dashboard');
			}elseif($this->session->userdata('level')==3){
				redirect ('mahasiswa');
			}
		}
	}

	public function index() {
		$this->load->view('front');
	}

	public function login() {
		$this->load->view('index');
	}

	public function cek_login() {

		$user = $this->input->post('userid');
		$pass = $this->input->post('password');
		$this->db->where('username',$user);
        $this->db->where('password',md5($pass));
        $hasil = $this->db->get('mst_user');
		if ($hasil->num_rows >= 1) {
			foreach ($hasil->result() as $rs) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['id'] = $rs->id;
				$sess_data['username'] = $rs->username;
				$sess_data['level'] = $rs->ref_level_id;
				$this->session->set_userdata($sess_data);
			}
			$dat = [
					'last_login'=>date('Y-m-d'.' '.'H:m:s'),
				];
				$user = $this->input->post('userid');
               	$this->db->where('username',$user);
               	$this->db->update('mst_user',$dat);

			if ($this->session->userdata('level')==1) {
				redirect('admin/dashboard');
			}
			elseif ($this->session->userdata('level')==3) {
				redirect('mahasiswa');
			}		
		}else {
			
			redirect(base_url(), 'refresh');
			//echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

}

?>
