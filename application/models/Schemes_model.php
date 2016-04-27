<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schemes_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_scheme($scheme_id = NULL,$page = 0, $limit = 10){
		if($scheme_id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('schemes',$limit,$from);
			return $query->result();
		}
		// return scheme with scheme_id
		$query = $this->db->get_where('schemes',array('scheme_id' => $scheme_id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('schemes');
	 }
	
	 
	public function set_scheme($scheme_id = NULL){
		$data = array(
			'code' => $this->input->post('code'),
'duration' => $this->input->post('duration'),

		);
		if($scheme_id == NULL){
			// need to create entery
			return $this->db->insert('schemes', $data);
		}
		// need to update entery
		$this->db->where('scheme_id',$scheme_id);
		return $this->db->update('schemes', $data);
	}
	
	public function remove_scheme($scheme_id){
		$this->db->where('scheme_id',$scheme_id);
		$this->db->delete('schemes');
	}
	 
}