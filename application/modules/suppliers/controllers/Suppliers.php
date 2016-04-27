<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suppliers extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('suppliers_model');
		$this->load->helper('url');
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->suppliers_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Suppliers';
		$data['suppliers'] = $this->suppliers_model->get_supplier(NULL,$page,$data['per_page']);
		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Supplier created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Supplier';
	if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('varified', 'Varified', 'required');
		$this->form_validation->set_rules('about', 'About', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{ //print_r($_FILES);die;
				$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/",
						'allowed_types' => "gif|jpg|png",
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
			$this->suppliers_model->set_supplier($image);
			redirect('/suppliers/create/1');
		}
		}
				$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Supplier View';
		$data['supplier'] = $this->suppliers_model->get_supplier($id);
		if(empty($data['supplier'])){
			show_404();
		}
		
				$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Supplier updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['supplier'] = $this->suppliers_model->get_supplier($id);
		if(empty($data['supplier'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Supplier';
	
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('varified', 'Varified', 'required');
		$this->form_validation->set_rules('about', 'About', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			//	print_r($_FILES);die;
				$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/",
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
			$this->suppliers_model->set_supplier($image,$id);
			redirect('/suppliers/edit/'.$id.'/1');
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
		$this->suppliers_model->remove_supplier($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('suppliers/');
		}
	}
}