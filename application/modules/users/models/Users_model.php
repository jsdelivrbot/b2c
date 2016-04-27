<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_user($user_id = NULL,$page = 0, $limit = 10){
		if($user_id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('users',$limit,$from);
			return $query->result();
		}
		// return user with user_id
		$query = $this->db->get_where('users',array('user_id' => $user_id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('users');
	 }
	
	 
	public function set_user($image=NULL,$user_id = NULL){
		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get('users');
		$data = array(
			'name' => $this->input->post('firstname').' '.$this->input->post('surname'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'firstname' => $this->input->post('firstname'),
			'surname' => $this->input->post('surname'),
			'stret_no' => $this->input->post('stret_no'),
			'building_name' => $this->input->post('building_name'),
			'street' => $this->input->post('street'),
			'suburb' => $this->input->post('suburb'),
			'city' => $this->input->post('city'),
			'country' => $this->input->post('country'),
			'image' => $image,

		);
		//print'<pre>';print_r($data);die;
		if($user_id == NULL){
			$data['password'] = md5($this->input->post('password'));
			// need to create entery
			return $this->db->insert('users', $data);
		}
		// need to update entery
		$this->db->where('user_id',$user_id);
		return $this->db->update('users', $data);
	}
	
	public function remove_user($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->delete('users');
	}
	  
	public function get_user_by_contact($contact = NULL){
		
		// return user with user_id
		$query = $this->db->get_where('users',array('contact' => $contact));
		return $query->first_row();
	 } 

	public function get_user_email($email){
		$query = $this->db->get_where('users',array('email' => $email));
		//echo $this->db->last_query();die();
		return $query->first_row();
	 }
}
