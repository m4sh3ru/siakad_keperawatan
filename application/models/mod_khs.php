<?php

class Mod_khs extends CI_Model{
	function get_khs(){
		$sql = $this->db->get('ref_khs');
		return $sql->result_array(); 
	}

	function filter_khs($prodi, $mahasiswa){
		$this->db->where('ref_prodi_id', $prodi)
				 ->where('mst_mahasiswa_id',$mahasiswa);
		$sql = $this->db->get('mst_nilai');
		return $sql->result_array(); 
	}

	function get_matkul_khs($prodi){
		$this->db->select('*');
		$this->db->select('mst_matkul.id as id_matkul');
		$this->db->select('ref_semester.id as id_sms');
        $this->db->from('mst_krs');
        $this->db->join('ref_prodi', 'ref_prodi.id = mst_krs.ref_prodi_id');
        $this->db->join('mst_matkul', 'mst_matkul.id = mst_krs.mst_matkul_id');
        $this->db->join('ref_semester', 'ref_semester.id = mst_matkul.semester');
        #$this->db->join('mst_mahasiswa', 'mst_mahasiswa.id = mst_nilai.mst_mahasiswa_id');
        $this->db->where('ref_prodi.id',$prodi);
        $this->db->order_by('ref_semester.id','ASC');
        $this->db->group_by('mst_matkul.id');
        
		$sql = $this->db->get()->result_array();
		
		return $sql;         	
	}

	function get_nilai($prodi, $mhs, $matkul){
		return $this->db->where('ref_prodi_id', $prodi)
				 		->where('mst_mahasiswa_id', $mhs)
				 		->where('mst_matkul_id', $matkul)
				 		->get('mst_nilai')
				 		->result_array();
	}

	function grade(){
		return $this->db->get('ref_grade')->result_array();
	}

	function t_sms($semester){
		$sql=$this->db->where('ref_prodi_id', $this->session->userdata('prodi'))
				 		->get('mst_krs')
				 		->result_array();
		foreach($sql as $sq){
			$data[] = $sq['mst_matkul_id'];
		}
		return $this->db->where_in('id', $data)
						->where('semester', $semester)
				 		->from('mst_matkul')
				 		->count_all_results();
	}



}
