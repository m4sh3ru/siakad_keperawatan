<?php 
	class Mod_nilai extends CI_Model{

		function get_nilai(){
			$this->db->select('*');
			$this->db->select('mst_nilai.id as id');
	        $this->db->from('mst_nilai');
	        $this->db->join('mst_mahasiswa', 'mst_mahasiswa.id = mst_nilai.mst_mahasiswa_id');
	        $this->db->join('mst_matkul', 'mst_matkul.id = mst_nilai.mst_matkul_id');
	        #$this->db->join('ref_prodi', 'ref_prodi.id = mst_nilai.ref_prodi_id');
	        $this->db->join('ref_semester', 'ref_semester.id = mst_nilai.ref_semester_id');
	        #$this->db->join('ref_grade', 'ref_grade.id = mst_nilai.ref_grade_id');
	        
			$sql = $this->db->get();
			return $sql->result_array();
		}

		function add_nilai($a, $b, $c, $d, $f){
			$config = array(
				'mst_mahasiswa_id'=>$a,
				'mst_matkul_id'=>$b,
				'ref_prodi_id'=>$c,
				'ref_semester_id'=>$d,
				#'ref_kelas_id'=>$e,
				'nilai'=>$f,
			);

			$this->db->insert('mst_nilai', $config);
		}

		function check($a, $b, $c, $d){
			return $this->db->where('mst_mahasiswa_id', $a)
							->where('mst_matkul_id', $b)
							->where('ref_prodi_id', $c)
							->where('ref_semester_id', $d)
							#->where('ref_kelas_id', $e)
					 	->get('mst_nilai')
					 	->result_array();
		}

		function check_value_grade($nilai){
			$this->db->query("SELECT * FROM ref_grade WHERE value = '$nilai'")->num_rows();
		}

		function update_nilai($a, $b, $c, $d, $f){
			$data = [
				'nilai'=>$f,
			];
			return $this->db->where('mst_mahasiswa_id', $a)
							->where('mst_matkul_id', $b)
							->where('ref_prodi_id', $c)
							->where('ref_semester_id', $d)
							#->where('ref_kelas_id', $e)
					 		->update('mst_nilai', $data);
		}

		function get_mahasiswa(){
			#return $this->db->get('mst_mahasiswa')->result_array();
			$sql = $this->db->get('mst_nilai')->result_array();
			foreach ($sql as $rs) {
				$data = $rs['mst_mahasiswa_id'];
			}
			$sql2 = $this->db->where_not_in('id', $data)->get('mst_mahasiswa')->result_array();
			return $sql2;
		}

/*		function update_nilai($th){
			$data = [
				'nama_nilai'=>$th,
			];
			$this->db->where('nama_nilai',strtoupper($this->input->post('thn_nilai')))
			->update('mst_nilai',$data);
		}*/

		function get_nilai_by_id($id){
			$this->db->where('id', $id);
			$sql = $this->db->get('mst_nilai');

			return $sql->result_array();
		}

		function set_edit($a, $id){
			$config = array(
				'nama_nilai' =>$a,
			);

			$this->db->where('id', $id);
			$this->db->update('mst_nilai', $config);
		}

		function delete($id){
			$this->db->where('id', $id);
			$this->db->delete('mst_nilai');
		}
	}

?>