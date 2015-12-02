<?php 
	class Mod_periode extends CI_Model{

		function get_periode(){
			$this->db->order_by('tahun_ajaran', 'ASC');
			$sql = $this->db->get('ref_periode');
			return $sql->result_array();
		}

		function add_periode($a){
			$config = array(
				'tahun_ajaran'=>$a,
			);

			$this->db->insert('ref_periode', $config);
		}

		function check(){
			return $this->db->where('tahun_ajaran', strtoupper($this->input->post('thn_periode')))
					 	->get('ref_periode')
					 	->result_array();
		}

		function update_periode($th){
			$data = [
				'tahun_ajaran'=>$th,
			];
			$this->db->where('tahun_ajaran',strtoupper($this->input->post('thn_periode')))
			->update('ref_periode',$data);
		}

		function get_periode_by_id($id){
			$this->db->where('id', $id);
			$sql = $this->db->get('ref_periode');

			return $sql->result_array();
		}

		function set_edit($a, $id){
			$config = array(
				'tahun_ajaran' =>$a,
			);

			$this->db->where('id', $id);
			$this->db->update('ref_periode', $config);
		}

		function delete($id){
			$this->db->where('id', $id);
			$this->db->delete('ref_periode');
		}
	}

?>