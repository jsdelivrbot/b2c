<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Footer_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_footer($id = NULL,$page = 0, $limit = 10){
		if($id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('footer',$limit,$from);
			return $query->result();
		}
		// return footer with id
		$query = $this->db->get_where('footer',array('id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('footer');
	 }
	
	 
	public function set_footer($id = NULL){
		$data = array(
			'type' => $this->input->post('type'),
			'value' => $this->input->post('value'),
			);
		if($id == NULL){
			// need to create entery
			return $this->db->insert('footer', $data);
		}
		// need to update entery
		$this->db->where('id',$id);
		return $this->db->update('footer', $data);
	}
	
	public function remove_footer($id){
		$this->db->where('id',$id);
		$this->db->delete('footer');
	}
	 
}