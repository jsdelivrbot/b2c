<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('pages_model');
		$this->load->helper('url');
		
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->pages_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Pages';
		$data['pages'] = $this->pages_model->get_tbl_page(NULL,$page,$data['per_page']);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'page created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create page';
	
		$this->form_validation->set_rules('page_title', 'Page Title', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('short_content', 'Short Content', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
		//$this->form_validation->set_rules('images', 'Image', 'required');
		$this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'required');
		$this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
		
		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		//print_r($_FILES);die;
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
			$this->pages_model->set_tbl_page($image);
			redirect('/pages/create/1');
		}
		
		$data['view']='/pages/create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'pages View';
		$data['pages'] = $this->pages_model->get_tbl_page($id);
		if(empty($data['pages'])){
			show_404();
		}
		
		$data['view']='/pages/view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'pages updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['pages'] = $this->pages_model->get_tbl_page($id);
		if(empty($data['pages'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify pages';
	
		$this->form_validation->set_rules('page_title', 'Page Title', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('short_content', 'Short Content', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
		//$this->form_validation->set_rules('images', 'Image', 'required');
		$this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'required');
		$this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
		

		
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
			$this->pages_model->set_tbl_page($image,$id);
			redirect('/pages/admin/edit/'.$id.'/1');
		}
		$data['view']='/pages/edit';
        $this->load->view('backend/layout', $data);
	}
	
	
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->pages_model->remove_tbl_page($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('pages/');
		}
	}
	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');
	
		

		if($status == 1){
			 $this->pages_model->update_status($id,$status);
		
		}
		else{
			$this->pages_model->update_status($id,$status);
		}
		
		redirect('pages/admin');

	}
}