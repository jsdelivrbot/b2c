<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('category_model');
		$this->load->helper('url');
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->category_model->get_row_count();
		$data['per_page'] = 10;
		$data['current_page'] = $page;
	
		$data['title'] = 'Category';
		$data['category'] = $this->category_model->get_category(NULL,$page,$data['per_page']);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
        
	}
	
	public function create($status = 0){
		
		if($status == 1){
			$data['message'] = 'Category Created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Category';
		$data['category'] = $this->category_model->get_category();
		//print'<pre>';print_r($data['category']);die;
		
	   if(isset($_POST)&&!empty($_POST)){

			$this->form_validation->set_rules('name', 'Name', 'required');
		    $this->form_validation->set_rules('slug', 'Slug', 'required');
	        $this->form_validation->set_rules('parent_id', 'Parent Id', 'required');
	        $this->form_validation->set_rules('description', 'Description', 'required');
		if ($this->form_validation->run() === FALSE){	
		}else{


		//print'<pre>';print_r($_POST);die;
			$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/category_image/",
						'allowed_types' => "gif|jpg|png|doc|pdf|txt|jpge|docx",
						'overwrite' => TRUE,
						'max_size' => "2048000", 
						'file_name' => $filename
						);
						$this->load->library('upload', $config);
						if($this->upload->do_upload('fileToUpload'))
						{
						$data = array('upload_data' => $this->upload->data());
						$image=$data['upload_data']['file_name'];
						}
						else
						{
						$error = array('error' => $this->upload->display_errors());
						echo $error['error'];die;
						}
			}
			$this->category_model->set_category($image);
			redirect('category_management/admin/create');

   }
	 }
	$data['view']='/category_management/create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Category View';
		$data['category'] = $this->category_model->get_category($id);
		if(empty($data['category'])){
			show_404();
		}
		
		$data['view']='category_management/view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			
			$data['message'] = 'Category Updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['category'] = $this->category_model->get_category($id);
		if(empty($data['category'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->helper('category_management/category');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Category';
		$data['cat'] =get_category_all();
		if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('slug', 'Slug', 'required');
			//$this->form_validation->set_rules('parent_id', 'Parent Id', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
            //$this->form_validation->set_rules('image', 'Image', 'required');
              
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
			$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/category_image/",
						'allowed_types' => "gif|jpg|png|doc|pdf|txt|jpge|docx",
						'overwrite' => TRUE,
						'max_size' => "2048000", 
						'file_name' => $filename
						);
						$this->load->library('upload', $config);
						if($this->upload->do_upload('fileToUpload'))
						{
						$data = array('upload_data' => $this->upload->data());
						$image=$data['upload_data']['file_name'];
						}
						else
						{
						$error = array('error' => $this->upload->display_errors());
						echo $error['error'];die;
						}
		}
			$this->category_model->set_category($image,$id);
			redirect('category_management/admin/edit/'.$id.'/1');
 
    }
	  }
		$data['view']='/category_management/edit';
        $this->load->view('backend/layout', $data);
	}
	
	
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->category_model->remove_category($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('category_management/admin/');
		}
	}
}
