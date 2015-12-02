<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_user extends CI_Model {

		public function cek_user($data) {
			$query = $this->db->get_where('mst_user', $data);
			return $query;
		}

		public function get_user()
		{
			return $this->db->get('mst_user')->result_array();
		}

		public function get_level()
		{
			return $this->db->get('ref_level')->result_array();
		}

		public function add($data){
			$this->db->insert('mst_user', $data);
		}

		public function user_by_id($id){
			$this->db->where('id', $id);
			$sql = $this->db->get('mst_user');
			return $sql->result_array();
		}

		public function update($config,$id){
			$this->db->where('id', $id);
			$this->db->update('mst_user', $config);
		}

		function delete($id){
			$this->db->where('id', $id);
			$this->db->delete('mst_user');
		}

	}

?>
