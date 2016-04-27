<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_product($id = NULL,$page = 0, $limit = 10){
		if($id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('product',$limit,$from);
			return $query->result();
		}
		// return product with id
		$con=array('product.id' => $id);
		$this->db->select('product.id as p_id,product_gallery.id as pg_id,product.*,product_gallery.*');
        $this->db->join('product_gallery', 'product_gallery.product_id = product.id');
		$query = $this->db->get_where('product',$con);
	    //echo $this->db->last_query();die();
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('product');
	 }
	
	 
	public function set_product($image=NULL , $id = NULL){

		$data = array(
			'type' => $this->input->post('type'),
			'name' => $this->input->post('name'),
			'slug' => $this->input->post('slug'),
			'price' => $this->input->post('price'),
			'description' => $this->input->post('description'),
			

		);
		if($id == NULL){
			// need to create entery
			$data['creation_date']= date('Y-m-d H:i:s');
			 $this->db->insert('product', $data);
			 $product_id = $this->db->insert_id();
			 if($image!='' ){
            $filename1 = explode(',',$image);

           foreach($filename1 as $file){
		 				$data1 = array(
		 					'image_path' => ('assets/upload/product_gallery/'.$file),
							'title' => $this->input->post('title'),
							'product_id'=>$product_id,
							);
						// print'<pre>';print_r($data1);die;
			 			$this->db->insert('product_gallery', $data1);
			 		 }
  				  }
			   }
				// need to update entery

				$this->db->where('id',$id);
			    $this->db->update('product', $data);
			   //return $this->db->last_query();die;
		 				$data1 = array(
		 					//'image_path' => ('assets/upload/product_gallery/'.$file),
							'title' => $this->input->post('title'),
							);
						$this->db->where('product_id',$id);
						$this->db->update('product_gallery', $data1);
			 			 //echo $this->db->last_query();die;
			 		
                  
                   
                  
		 				
			 		 
			 		 
  				  
				
	}
	
	public function remove_product($id){
		$this->db->where('id',$id);
		$this->db->delete('product');
	}

	public function get_product_images($id){

	$con=array(
				'product.id' => $id
		   	);
			
			$this->db->select('product.*,product_gallery.*');
	        $this->db->join('product_gallery', 'product_gallery.product_id = product.id','inner');
			$query = $this->db->get_where('product',$con);
			return $query->result();
     }
	
	 
}