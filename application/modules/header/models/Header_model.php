<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Header_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_header($id = NULL,$page = 0, $limit = 10){
		if($id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('header',$limit,$from);
			return $query->result();
		}
		// return header with id
		$query = $this->db->get_where('header',array('id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('header');
	 }
	
	 
	public function set_header($id = NULL){
		$data = array(
'type' => $this->input->post('type'),
'value' => $this->input->post('value'),
		);
		if($id == NULL){
			// need to create entery
			return $this->db->insert('header', $data);
		}
		// need to update entery
		$this->db->where('id',$id);
		return $this->db->update('header', $data);
	}
	
	public function remove_header($id){
		$this->db->where('id',$id);
		$this->db->delete('header');
	}
	 
}