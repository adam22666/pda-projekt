<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prenajom_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	function ZobrazPrenajom($id="") {
		if(!empty($id)){
			$query = $this->db->get_where('prenajom', array('id' => $id));
			return $query->row_array();
		}else{
			$query = $this->db->get('prenajom');
			return $query->result_array();
		}

	}
	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('prenajom', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('prenajom', $data, array('id'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('prenajom',array('id'=>$id));
		return $delete?true:false;
	}

}