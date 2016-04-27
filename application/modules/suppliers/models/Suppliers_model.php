<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suppliers_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_supplier($id = NULL,$page = 0, $limit = 10){
		if($id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('suppliers',$limit,$from);
			return $query->result();
		}
		// return supplier with id
		$query = $this->db->get_where('suppliers',array('id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('suppliers');
	 }
	
	 
	public function set_supplier($image=NULL,$id = NULL){
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'type' => $this->input->post('type'),
			'varified' => $this->input->post('varified'),
			'about' => $this->input->post('about'),
			'profile_pic' => $image,

		);

		//print'<pre>';print_r($data);die;
		if($id == NULL){
			// need to create entery
			return $this->db->insert('suppliers', $data);
		}
		// need to update entery
		$this->db->where('id',$id);
		return $this->db->update('suppliers', $data);
	}
	
	public function remove_supplier($id){
		$this->db->where('id',$id);
		$this->db->delete('suppliers');
	}
	 
}