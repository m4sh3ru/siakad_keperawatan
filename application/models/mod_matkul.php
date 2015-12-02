<?php 
	class Mod_matkul extends CI_Model{

		function get_matkul(){
			$this->db->order_by('semester', 'ASC');
			$sql = $this->db->get('mst_matkul');
			return $sql->result_array();
		}

		function matkul_semester($semester){
			$this->db->where('ref_prodi_id', $this->session->userdata('prodi'));
			$sql = $this->db->get('mst_krs')->result_array();
			foreach($sql as $rs){
				$data[] = $rs['mst_matkul_id'];
			}
			$this->db->where_in('id', $data);
			$this->db->where('semester', $semester);
			$sql2 = $this->db->get('mst_matkul');
			return $sql2->result_array();
		}

		function add_matkul($a, $b, $c, $d){
			$config = array(
				'kode_matkul'=>$a,
				'nama_matkul'=>ucwords($b),
				'sks'=>$c,
				'semester'=>$d,
			);

			$this->db->insert('mst_matkul', $config);
		}

		function check(){
			return $this->db->where('kode_matkul', strtoupper($this->input->post('kode_matkul')))
					 	->get('mst_matkul')
					 	->result_array();
		}

		function update_matkul($data){
			$this->db->where('kode_matkul',strtoupper($this->input->post('kode_matkul')))
			->update('mst_matkul',$data);
		}

		function total_sks()
		{
			$q = $this->db->get('mst_matkul')->result_array();
			$total = 0;
			foreach($q as $rs){
				$total = $total+$rs['sks'];
			}
			return $total;
		}

		function get_semester(){
			$this->db->distinct();
			$sql = $this->db->get('ref_semester');
			return $sql->result_array();
		}

		function semester_by_id($id){
			$this->db->where('id', $id);
			$sql = $this->db->get('ref_semester');
			return $sql->result_array();
		}

		function get_matkul_by_semester($a, $b){
			$sql = $this->db->where('semester',$a)
							->get('mst_matkul')
							->result_array();
			foreach($sql as $rs){
				$data[] = $rs['id'];
			}
			$this->db->where_in('mst_matkul_id', $data);
			$this->db->where('ref_prodi_id', $b);
			$sql2 = $this->db->get('mst_krs');
			#print_r($sql);
			return $sql2->result_array();

		}

		function get_all($sms, $prodi){

			$this->db->select('*');
			$this->db->select('mst_matkul.id as id', 'mst_nilai.nilai as nilai');
	        $this->db->from('mst_matkul');
	        $this->db->from('ref_prodi');
	        $this->db->join('ref_semester', 'ref_semester.id = mst_matkul.semester');
	        $this->db->join('mst_krs', 'mst_krs.mst_matkul_id = mst_matkul.id');
	        $this->db->where('ref_semester.id',$sms);
	        $this->db->where_in('mst_krs.ref_prodi_id',$prodi);
	        $this->db->group_by('mst_matkul.id');
			$sql = $this->db->get();
			return $sql->result_array();
			#return $sql->;             	
		}

		function set_edit($a, $b, $c, $d, $id){
			$config = array(
				'kode_matkul'=>$a,
				'nama_matkul'=>$b,
				'sks'=>$c,
				'semester'=>$d,
			);

			$this->db->where('id', $id);
			$this->db->update('mst_matkul', $config);
		}

		function get_matkul_by_id($id){
			$this->db->where('id', $id);
			$sql = $this->db->get('mst_matkul');

			return $sql->result_array();
		}

		function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('mst_matkul');	
	}	
	}
?>
