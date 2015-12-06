<?php
	class Mod_mahasiswa extends CI_Controller{
		function get_mahasiswa(){
			$this->db->select('*');
			$this->db->select('mst_mahasiswa.id as id');
	        $this->db->from('mst_mahasiswa');
	        $this->db->join('ref_periode', 'ref_periode.id = mst_mahasiswa.ref_periode_id');
	        $this->db->join('ref_agama', 'ref_agama.id = mst_mahasiswa.ref_agama_id');
	        $this->db->join('ref_prodi', 'ref_prodi.id = mst_mahasiswa.ref_prodi_id');
	        
			$sql = $this->db->get();
			return $sql->result_array();             	
		}

		function mahasiswa(){
		$sql = $this->db->get('mst_mahasiswa');
			return $sql->result_array();
		}

		function mahasiswa_by_nim($nim){
			$this->db->select('*');
			$this->db->select('mst_mahasiswa.id as id');
	        $this->db->from('mst_mahasiswa');
	        $this->db->join('ref_prodi', 'ref_prodi.id = mst_mahasiswa.ref_prodi_id');
	        $this->db->join('ref_agama', 'ref_agama.id = mst_mahasiswa.ref_agama_id');	        
	        $this->db->where('mst_mahasiswa.nim', $nim);
			$sql = $this->db->get();
			return $sql->result_array();
		}

		function get_agama(){
			$sql = $this->db->get('ref_agama');
			return $sql->result_array();
		}

		function add_mahasiswa($a, $b, $c, $d, $e, $f, $g, $h, $i, $j){
			$config = array(
				'nim'=>$a,
				'nama_lengkap'=>strtoupper($b),
				'tempat_lahir'=>ucwords($c),
				'ref_periode_id'=>$d,
				'tgl_lahir'=>$e,
				'jenis_kelamin'=>$f,
				'ref_prodi_id'=>$g,
				'ref_agama_id'=>$h,
				'hp'=>$i,
				'alamat'=>$j,
			);
			$data = [
				'username'=>$a,
				'password'=>md5($a),
				'text'=>$a,
				'ref_level_id'=>3,
			];
			$this->db->insert('mst_user', $data);
			$this->db->insert('mst_mahasiswa', $config);

		}

		function get_mahasiswa_by_id($id){
			$this->db->where('id', $id);
			$sql = $this->db->get('mst_mahasiswa');

			return $sql->result_array();
		}	

		function set_edit($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $id){
			$config = array(
				'nim'=>$a,
				'nama_lengkap'=>strtoupper($b),
				'tempat_lahir'=>ucwords($c),
				'ref_periode_id'=>$d,
				'tgl_lahir'=>$e,
				'jenis_kelamin'=>$f,
				'ref_prodi_id'=>$g,
				'ref_agama_id'=>$h,
				'hp'=>$i,
				'alamat'=>$j,
			);

			$this->db->where('id', $id);
			$this->db->update('mst_mahasiswa', $config);
		}

		function delete($id){
			$this->db->where('id', $id);
			$this->db->delete('mst_mahasiswa');
		}

		function import_mahasiswa($data)
	    {
	        for($i=0;$i<count($data);$i++){
	            $data = array(
	                'nim'=>$data[$i]['nim'],
	                'nama_lengkap'=>$data[$i]['nama_lengkap'],
	                'tanggal_lahir'=>$data[$i]['tanggal_lahir'],
	            );
	            $this->db->insert('mst_mahasiswa', $data);
	        }
	   	}

		
	}
?>