<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_banners_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_tbl_banner($id = NULL,$page = 0, $limit = 10){
		if($id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('tbl_banners',$limit,$from);
			return $query->result();
		}
		// return tbl_banner with id
		$query = $this->db->get_where('tbl_banners',array('id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('tbl_banners');
	 }
	
	 
	public function set_tbl_banner($image=NULL,$id = NULL){
		$data = array(
			'title' => $this->input->post('title'),
				'link' => $this->input->post('link'),
				'subtitle' => $this->input->post('subtitle'),
				'image' => $image,
				'sequence' => $this->input->post('sequence'),
				'status' => $this->input->post('status'),
				'updated_on' => date('Y-m-d H:i:s'),

		);
		if($id == NULL){
			$data['created_on'] = date('Y-m-d H:i:s');
			$data['status'] = 0;
			
			// need to create entery
			return $this->db->insert('tbl_banners', $data);
		}
		// need to update entery
		
		$this->db->where('id',$id);
		return $this->db->update('tbl_banners', $data);
	}
	
	public function remove_tbl_banner($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_banners');
	}

	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_banners',$data);

	}
	 
}