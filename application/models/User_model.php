<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function show(){
		return $this->db->get('crud')->result_array();
	}

	public function add($data){
		return $this->db->insert('crud',$data);
	}

	public function get_user($id){
		$this->db->where('id',$id);
		return $this->db->get('crud')->row_array();
	}

	public function update_user($id,$data){
		$this->db->where('id',$id);
		$this->db->update('crud',$data);
	}

	public function delete_user($id){
		$this->db->where('id', $id);
		return $this->db->delete('crud');
	}
}
