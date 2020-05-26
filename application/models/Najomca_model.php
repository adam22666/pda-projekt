<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Najomca_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	function ZobrazNajomcu($id="") {
		if(!empty($id)){
			$query = $this->db->get_where('najomca', array('idnajomca' => $id));
			return $query->row_array();
		}else{
			$query = $this->db->get('najomca');
			return $query->result_array();
		}

	}
	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('najomca', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('najomca', $data, array('idnajomca'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('najomca',array('idnajomca'=>$id));
		return $delete?true:false;
	}

}
