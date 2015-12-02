<?php 
	class Mod_dosen extends CI_Model{
		function get_dosen(){
			$this->db->select('*');
			$this->db->select('mst_dosen.id as id');
	        $this->db->from('mst_dosen');
	        $this->db->join('ref_agama', 'ref_agama.id = mst_dosen.ref_agama_id');
	        
			$sql = $this->db->get();
			return $sql->result_array();             	
		}

		function add_dosen($a, $b, $d, $e, $f, $g, $h, $i){
			$config = array(
				'nama_lengkap'=>$a,
				'nidn'=>$b,
				'tempat_lahir'=>$d,
				'tanggal_lahir'=>$e,
				'jenis_kelamin'=>$f,
				'ref_agama_id'=>$g,
				'alamat'=>$h,
				'no_telp'=>$i,
			);
			$this->db->insert('mst_dosen', $config);
		}
	

		function get_dosen_by_id($id){
			$this->db->where('id', $id);
			$sql = $this->db->get('mst_dosen');

			return $sql->result_array();
		}

		function set_edit($a, $b, $d, $e, $f, $g, $h, $i,$id){
			$config = array(
				'nama_lengkap'=>$a,
				'nidn'=>$b,
				'tempat_lahir'=>$d,
				'tanggal_lahir'=>$e,
				'jenis_kelamin'=>$f,
				'ref_agama_id'=>$g,
				'alamat'=>$h,
				'no_telp'=>$i,
			);

			$this->db->where('id', $id);
			$this->db->update('mst_dosen', $config);
		}

		function delete($id){
			$this->db->where('id', $id);
			$this->db->delete('mst_dosen');
		}
	}
?>