<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->helper('url');
		$this->load->library('upload');
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
	  if(isset($_POST)&&!empty($_POST)) {
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');

		
		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		
			
			 $files = $_FILES;
			 // print'<pre>';print_r($files);die;
                $cpt = count($_FILES['userfile']['name']);
                 for($i=0; $i<$cpt; $i++)
                {
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                 $images[] = $fileName;
        }
             $image = implode(',',$images);
			//print'<pre>';print_r($image);die;
			//$this->product_model->set_product();
			$this->product_model->set_product($image);
			
			redirect('/product/admin/create/1');
		}
		}
		$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function set_upload_options()
  { 
  // upload an image options
  	$filename=time() . date('Ymd');
         $config = array();
         $config['upload_path'] = 'assets/upload/product_gallery/'; //give the path to upload the image in folder
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size'] = '0';
         
         $config['overwrite'] = FALSE;

  return $config;
  }


	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Product View';
		$data['product'] = $this->product_model->get_product($id);
		$data['product_images'] = $this->product_model->get_product_images($id);
		//print'<pre>';print_r($data['product']);
		//print'<pre>';print_r($data['product_images']);die;

		if(empty($data['product'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL,$p_id = NULL){
		if($status == 1){
			$data['message'] = 'Product updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['product'] = $this->product_model->get_product($id);
		$data['product_images'] = $this->product_model->get_product_images($id);
		
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
		

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			//print'<pre>';print_r($_POST);
			//print'<pre>';print_r($_FILES);die;
		$files = $_FILES;
			 
                $cpt = count($_FILES['userfile']['name']);
                 for($i=0; $i<$cpt; $i++)
                {
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                 $images[] = $fileName;
        }
             $image = implode(',',$images);
			//print'<pre>';print_r($image);die;
			//$this->product_model->set_product();
			$this->product_model->set_product($image,$id);
			redirect('/product/admin/edit/'.$id.'/1');
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
 