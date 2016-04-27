<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Header extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('header_model');
		$this->load->helper('url');
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->header_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Header';
		$data['header'] = $this->header_model->get_header(NULL,$page,$data['per_page']);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Header created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Header';
	if(isset($_POST)&&!empty($_POST)){
		//$this->form_validation->set_rules('fileToUpload', 'Logo', 'required');
		$this->form_validation->set_rules('site_name', 'Site Name', 'required');
		$this->form_validation->set_rules('contactus', 'Contactus', 'required');
		$this->form_validation->set_rules('social_links', 'Social Links', 'required');
if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		
		     $filename=time() . date('Ymd');
			 $logo='';
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
						$logo=$data['upload_data']['file_name'];//print_r($_FILES);die;
						}
						else
						{
						$error = array('error' => $this->upload->display_errors());
						echo $error['error'];die;
						}
			}
			$this->header_model->set_header($logo);//print_r($logo);die;
			redirect('header/header/create');

		
		
		
}
	}
		$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Header View';
		$data['header'] = $this->header_model->get_header($id);
		if(empty($data['header'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Header updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['header'] = $this->header_model->get_header($id);
		if(empty($data['header'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Header';
		if(isset($_POST)&&!empty($_POST)){
		//$this->form_validation->set_rules('logo', 'Logo', 'required');
$this->form_validation->set_rules('site_name', 'Site Name', 'required');
$this->form_validation->set_rules('contactus', 'Contactus', 'required');
$this->form_validation->set_rules('social_links', 'Social Links', 'required');
if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		
		     $filename=time() . date('Ymd');
			 $logo='';
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
						$logo=$data['upload_data']['file_name'];//print_r($_FILES);die;
						}
						else
						{
						$error = array('error' => $this->upload->display_errors());
						echo $error['error'];die;
						}
			}
			$this->header_model->set_header($logo,$id);//print_r($logo);die;
			redirect('/header/edit/'.$id.'/1');
}
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
		$this->header_model->remove_header($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('header/');
		}
	}
}