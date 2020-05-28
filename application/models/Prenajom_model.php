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
	function ZobrazPrenajomSpravne($id=""){
		if(!empty($id)){
			$this->db->select('prenajom.id, CONCAT(meno," ", priezvisko) AS cele_meno, najomca_idnajomca, mesto')
				->from('najomca')
				->join('prenajom', 'najomca.idnajomca = prenajom.najomca_idnajomca')
				->where('prenajom.id',$id);
			$query = $this->db->get();
			return $query->row_array();
		}else{
			$this->db->select('prenajom.id, CONCAT(meno," ", priezvisko) AS cele_meno, najomca_idnajomca, mesto')
				->from('najomca')
				->join('prenajom', 'najomca.idnajomca = prenajom.najomca_idnajomca');
			$query = $this->db->get();
			return $query->result_array();
		}

	}
	function ZobrazPrenajomSpravne2($id=""){
		if(!empty($id)){
			$this->db->select('prenajom.id, CONCAT(mesto," ", PSČ) AS mesto_PSČ, Kontakt_idKontakt, email')
				->from('kontakt')
				->join('prenajom', 'kontakt.idKontakt = prenajom.Kontakt_idKontakt')
				->where('prenajom.id',$id);
			$query = $this->db->get();
			return $query->row_array();
		}else{
			$this->db->select('prenajom.id, CONCAT(mesto," ", PSČ) AS mesto_PSČ, Kontakt_idKontakt, email')
				->from('kontakt')
				->join('prenajom', 'kontakt.idKontakt = prenajom.Kontakt_idKontakt');
			$query = $this->db->get();
			return $query->result_array();
		}

	}

//  naplnenie selectu z tabulky najomca
	public function NaplnDropdownNajomca($id = ""){
		$this->db->order_by('priezvisko')
			->select('idnajomca, CONCAT(meno," ", priezvisko) AS cele_meno')
			->from('najomca');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$dropdowns = $query->result();
			foreach ($dropdowns as $dropdown)
			{
				$dropdownlist[$dropdown->idnajomca] = $dropdown->cele_meno;
			}
			$dropdownlist[''] = 'Vyberte nájomcu';
			return $dropdownlist;
		}
	}
	//  naplnenie selectu z tabulky kontakt
	public function NaplnDropdownKontakt($id = ""){
		$this->db->order_by('mesto')
			->select('idKontakt, CONCAT(mesto," ", PSČ) AS mesto_PSČ')
			->from('kontakt');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$dropdowns = $query->result();
			foreach ($dropdowns as $dropdown)
			{
				$dropdownlist[$dropdown->idKontakt] = $dropdown->mesto_PSČ;
			}
			$dropdownlist[''] = 'Vyberte kontakt';
			return $dropdownlist;
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
