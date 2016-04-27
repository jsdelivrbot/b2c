<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trusted_clients_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_trusted_client($id = NULL,$page = 0, $limit = 10){
		if($id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('trusted_clients',$limit,$from);
			return $query->result();
		}
		// return trusted_client with id
		$query = $this->db->get_where('trusted_clients',array('id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('trusted_clients');
	 }
	
	 
	public function set_trusted_client($image=NULL,$id = NULL){
		$data = array(
			'title' => $this->input->post('title'),
			'sequence' => $this->input->post('sequence'),
			'image' => $image,
			'status' => $this->input->post('status'),

		);
		if($id == NULL){
			// need to create entery
			return $this->db->insert('trusted_clients', $data);
		}
		// need to update entery
		$this->db->where('id',$id);
		return $this->db->update('trusted_clients', $data);
	}
	
	public function remove_trusted_client($id){
		$this->db->where('id',$id);
		$this->db->delete('trusted_clients');
	}

	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('trusted_clients',$data);

	}
	 
}