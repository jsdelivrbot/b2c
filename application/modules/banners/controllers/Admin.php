<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('tbl_banners_model');
		$this->load->helper('url');
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->tbl_banners_model->get_row_count();
		$data['per_page'] = 10;
		$data['current_page'] = $page;
	
		$data['title'] = 'Banners';
		$data['tbl_banners'] = $this->tbl_banners_model->get_tbl_banner(NULL,$page,$data['per_page']);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Tbl_banner created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Banner';
	if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('title', 'Title', 'required');
$this->form_validation->set_rules('link', 'Link', 'required');
$this->form_validation->set_rules('subtitle', 'Subtitle', 'required');
//$this->form_validation->set_rules('image', 'Image', 'required');
$this->form_validation->set_rules('sequence', 'Sequence', 'required');
$this->form_validation->set_rules('status', 'Status', 'required');
//$this->form_validation->set_rules('created_on', 'Created On', 'required');
//$this->form_validation->set_rules('updated_on', 'Updated On', 'required');

		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		//print_r($_FILES);die;
				$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/banner_image/",
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
			$this->tbl_banners_model->set_tbl_banner($image);
			redirect('banners/admin/create');

  }
	}
		$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Banner View';
		$data['tbl_banner'] = $this->tbl_banners_model->get_tbl_banner($id);
		if(empty($data['tbl_banner'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Banner updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['tbl_banner'] = $this->tbl_banners_model->get_tbl_banner($id);
		if(empty($data['tbl_banner'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Banner';
	if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		$this->form_validation->set_rules('subtitle', 'Subtitle', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('sequence', 'Sequence', 'required');
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		//	print_r($_FILES);die;
				$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/banner_image/",
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
			$this->tbl_banners_model->set_tbl_banner($image,$id);
			
			redirect('banners/admin/edit/'.$id.'/1');

		
		
		
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
		$this->tbl_banners_model->remove_tbl_banner($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('banners/');
		}
	}

	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');
	
		

		if($status == 1){
			 $this->tbl_banners_model->update_status($id,$status);
		
		}
		else{
			$this->tbl_banners_model->update_status($id,$status);
		}
		
		redirect('banners/admin');

	}
}