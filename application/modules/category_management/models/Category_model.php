<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_category($id = NULL,$page = 0, $limit = 10){
		if($id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('category',$limit,$from);
			return $query->result();
		}
		// return category with id
		$query = $this->db->get_where('category',array('id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('category');
	 }
	
	 
	public function set_category($image=NULL,$id =NULL){
		$data = array(
		'name' => $this->input->post('name'),
		'slug' => $this->input->post('slug'),
		'parent_id' => $this->input->post('parent_id'),
		'description' => $this->input->post('description'),
		'image' => $image,

		);
		if($id == NULL){
			// need to create entery
			return $this->db->insert('category', $data);
		}else{
		// need to update entery
		$this->db->where('id',$id);
		return $this->db->update('category', $data); }
	}
	
	public function remove_category($id){
		$this->db->where('id',$id);
		$this->db->delete('category');
	}
	 
}