<?php 
class Mod_prodi extends CI_Model{
	
	function get_prodi(){
		$this->db->select('*');
		$this->db->select('ref_prodi.id as id');
        $this->db->from('ref_prodi');
        $this->db->join('mst_dosen', 'mst_dosen.id = ref_prodi.mst_dosen_id');
		$sql = $this->db->get();
		return $sql->result_array();
	}

	function add_prodi($a, $b, $c){
		$config = array(
			'no_izin'=>$a,
			'nama_prodi'=>$b,
			'mst_dosen_id'=>$c,
		);

		$this->db->insert('ref_prodi', $config);
	}

	function get_prodi_by_id($id){
		$this->db->where('id', $id);
		$sql = $this->db->get('ref_prodi');

		return $sql->result_array();
	}

	function set_edit($a, $b, $c, $id){
		$config = array(
			'no_izin'=>$a,
			'nama_prodi'=>$b,
			'mst_dosen_id'=>$c,
		);

		$this->db->where('id', $id);
		$this->db->update('ref_prodi', $config);
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('ref_prodi');	
	}
}
?>