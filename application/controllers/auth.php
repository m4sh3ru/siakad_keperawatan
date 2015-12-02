<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index() {
		$this->load->view('index');
	}

	public function cek_login() {
		$data = array('username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);
		$this->load->model('model_user'); // load model_user
		$hasil = $this->model_user->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $rs) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['id'] = $rs->id;
				$sess_data['username'] = $rs->username;
				$sess_data['level'] = $rs->ref_level_id;
				$this->session->set_userdata($sess_data);
				
			}
			$dat = [
					'last_login'=>date('Y-m-d'.' '.'H:m:s')
				];
				$user = $this->input->post('userid');
               	$this->db->where('username',$user);
               	$this->db->update('mst_user',$dat);

			if ($this->session->userdata('level')==1) {
				redirect('admin/dashboard');
			}
			elseif ($this->session->userdata('level')==2) {
				redirect('mahasiswa/c_mahasiswa');
			}		
		}
		else {
			$this->session->set_flashdata('notif', 'Username dan Password tidak sesuai!');
			redirect(base_url(), 'refresh');
			//echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

}

?>
