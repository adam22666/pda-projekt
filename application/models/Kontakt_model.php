<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kontakt_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	function ZobrazKontakt($id="") {
		if(!empty($id)){
			$query = $this->db->get_where('kontakt', array('idKontakt' => $id));
			return $query->row_array();
		}else{
			$query = $this->db->get('kontakt');
			return $query->result_array();
		}

	}
	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('kontakt', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('kontakt', $data, array('idKontakt'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('kontakt',array('idKontakt'=>$id));
		return $delete?true:false;
	}

}
