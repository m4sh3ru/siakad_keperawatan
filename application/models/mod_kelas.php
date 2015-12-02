<?php 
	class Mod_kelas extends CI_Model{

		function get_kelas(){
			$this->db->select('*');
			$this->db->select('ref_kelas.id as id');
	        $this->db->from('ref_kelas');
	        $this->db->join('ref_periode', 'ref_periode.id = ref_kelas.ref_periode_id');
	        $this->db->join('ref_prodi', 'ref_prodi.id = ref_kelas.ref_prodi_id');
	        
			$sql = $this->db->get();
			return $sql->result_array();
			/*$sql = $this->db->get('ref_kelas');
			return $sql->result_array();*/
		}

		function getKelas(){
			$sql = $this->db->get('ref_kelas');
			return $sql->result_array();
		}

		function add_kelas($a, $b, $c){
			$config = array(
				'nama_kelas'=>strtoupper($a),
				'ref_prodi_id'=>$b,
				'ref_periode_id'=>$c,
			);

			$this->db->insert('ref_kelas', $config);
		}

		function check(){
			return $this->db->where('nama_kelas', strtoupper($this->input->post('kelas')))
							->where('ref_prodi_id', $this->input->post('prodi'))
							->where('ref_periode_id', $this->input->post('periode'))
					 		->get('ref_kelas')
					 		->result_array();
		}

		function update_kelas($a, $b, $c){
			$data = [
				'nama_kelas'=>strtoupper($a),
				'ref_prodi_id'=>$b,
				'ref_periode_id'=>$c,
			];
			$this->db->where('nama_kelas',strtoupper($this->input->post('thn_kelas')))
					 ->update('ref_kelas',$data);
		}

		function get_kelas_by_id($id){
			$this->db->where('id', $id);
			$sql = $this->db->get('ref_kelas');

			return $sql->result_array();
		}

		function set_edit($a, $b, $c, $id){
			$config = array(
				'nama_kelas'=>strtoupper($a),
				'ref_prodi_id'=>$b,
				'ref_periode_id'=>$c,
			);

			$this->db->where('id', $id);
			$this->db->update('ref_kelas', $config);
		}

		function delete($id){
			$this->db->where('id', $id);
			$this->db->delete('ref_kelas');
		}
	}

?>