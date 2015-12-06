<?php
	class Mod_krs extends CI_Model{
		function get_mahasiswa(){
			$sql = $this->db->get('mst_mahasiswa');
			return $sql->result_array(); 
		}

		function get_all_krs(){
			$this->db->where('ref_prodi_id',$this->session->userdata('prodi'));
			$sql = $this->db->get('mst_krs');
			return $sql->result_array(); 
		}

		function get_krs()
		{
			$this->db->select('*');
			$this->db->select('mst_nilai.id as id');
	        $this->db->from('mst_nilai');
	        $this->db->join('mst_mahasiswa', 'mst_mahasiswa.id = mst_nilai.mst_mahasiswa_id');
	        $this->db->join('mst_matkul', 'mst_matkul.id = mst_nilai.mst_matkul_id');
	        $this->db->join('ref_semester', 'ref_semester.id = mst_nilai.ref_semester_id');
	        #$this->db->join('ref_grade', 'ref_grade.id = mst_nilai.ref_grade_id');
	        
			$sql = $this->db->get();
			return $sql->result_array();           
		}

		function add_krs($data){
			$this->db->insert('mst_krs', $data);
		}

		function get_matkul(){
			$krs = $this->get_all_krs();
			if($krs != NULL){
				foreach($krs as $k){
					$this->db->where_not_in('id',$k['mst_matkul_id']);
					
				}
				$sql = $this->db->get('mst_matkul');
				return $sql->result_array();
			}else{
				$sql = $this->db->get('mst_matkul');
				return $sql->result_array();
			}
			
		}

		function get_semester(){
			#$this->db->distinct();
			$this->db->where('ref_prodi_id', $this->session->userdata('prodi'));
			$sql = $this->db->get('mst_krs')->result_array();
			
			if($sql != NULL){
				foreach($sql as $rs){
					$data[] = $rs['mst_matkul_id'];
				}
				
				$this->db->where_in('id',$data);
				$sql2 = $this->db->get('mst_matkul')->result_array();

				if($sql2 != NULL){
					foreach($sql2 as $r){
						$data2[] = $r['semester'];
						
					}
					$this->db->where_in('id',$data2);
					$sql3 = $this->db->get('ref_semester')->result_array();
					return $sql3;
				}
				
			}

		}

		function get_krs_by_prodi($id){
			return $this->db->select('*')
							->select('mst_krs.id as id')
							->from('mst_krs')
	        				->join('mst_matkul', 'mst_matkul.id = mst_krs.mst_matkul_id')
							->where('mst_krs.ref_prodi_id',$id)
							->get()
							->result_array();
		}

		function get_mahasiswa_by_id($id){
			$this->db->where('id', $id);
			$sql = $this->db->get('mst_mahasiswa');

			return $sql->result_array();
		}

		function krs_mhs($mhs){
			$this->db->where('nim', $mhs);
			$sql = $this->db->get('mst_mahasiswa')->result_array();

			
			foreach($sql as $mh){
				$data = ['prodi'=> $mh['ref_prodi_id'], 'mahasiswa'=> $mh['id'],];
				$this->session->set_userdata($data);
			}
		}


		function get_krs_by_sms($mhs, $sms){
			$this->db->where('nim', $mhs);
			$sql = $this->db->get('mst_mahasiswa')->result_array();

			
			foreach($sql as $mh){
				$data = ['prodi'=> $mh['ref_prodi_id'], 'mahasiswa'=> $mh['id'],];
				$this->session->set_userdata($data);
				return $this->db->select('*')
							->select('mst_matkul.id as id_matkul')
							->from('mst_krs')
	        				->join('mst_matkul', 'mst_matkul.id = mst_krs.mst_matkul_id')
							->where('mst_krs.ref_prodi_id',$mh['ref_prodi_id'])
							->where('mst_matkul.semester',$sms)
							->group_by('mst_matkul.id')
							->get()
							->result_array();
			}
			
		}

	}
?>