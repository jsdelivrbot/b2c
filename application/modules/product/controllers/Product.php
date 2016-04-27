<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->helper('url');
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->product_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Product';
		$data['product'] = $this->product_model->get_product(NULL,$page,$data['per_page']);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Product created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Product';
	
		$this->form_validation->set_rules('type', 'Type', 'required');
$this->form_validation->set_rules('name', 'Name', 'required');
$this->form_validation->set_rules('slug', 'Slug', 'required');
$this->form_validation->set_rules('price', 'Price', 'required');
$this->form_validation->set_rules('description', 'Description', 'required');
//$this->form_validation->set_rules('creation_date', 'Creation Date', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->product_model->set_product();
			redirect('/product/create/1');
		}
		
		$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Product View';
		$data['product'] = $this->product_model->get_product($id);
		if(empty($data['product'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Product updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['product'] = $this->product_model->get_product($id);
		if(empty($data['product'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Product';
	
		$this->form_validation->set_rules('type', 'Type', 'required');
$this->form_validation->set_rules('name', 'Name', 'required');
$this->form_validation->set_rules('slug', 'Slug', 'required');
$this->form_validation->set_rules('price', 'Price', 'required');
$this->form_validation->set_rules('description', 'Description', 'required');
//$this->form_validation->set_rules('creation_date', 'Creation Date', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->product_model->set_product($id);
			redirect('/product/edit/'.$id.'/1');
		}
		$data['view']='edit';
        $this->load->view('backend/layout', $data);
	}
	
	
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->product_model->remove_product($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('product/');
		}
	}
}