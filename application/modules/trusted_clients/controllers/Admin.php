<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('trusted_clients_model');
		$this->load->helper('url');
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->trusted_clients_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Trusted Clients';
		$data['trusted_clients'] = $this->trusted_clients_model->get_trusted_client(NULL,$page,$data['per_page']);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
        
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Trusted Client created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Trusted_client';
	
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('sequence', 'Sequence', 'required');
		//$this->form_validation->set_rules('image', 'Image', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{

			 $filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/trusted_client_images/",
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
			$this->trusted_clients_model->set_trusted_client($image);
			redirect('/trusted_clients/admin/create/1');
		}
		
		$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Trusted_client View';
		$data['trusted_client'] = $this->trusted_clients_model->get_trusted_client($id);
		if(empty($data['trusted_client'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Trusted_client updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['trusted_client'] = $this->trusted_clients_model->get_trusted_client($id);
		if(empty($data['trusted_client'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Trusted_client';
	
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('sequence', 'Sequence', 'required');
		//$this->form_validation->set_rules('image', 'Image', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			//	print_r($_FILES);die;
				$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/trusted_client_images/",
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
			$this->trusted_clients_model->set_trusted_client($image,$id);
			redirect('trusted_clients/admin/edit/'.$id.'/1');
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
		$this->trusted_clients_model->remove_trusted_client($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('trusted_clients/admin');
		}
	}

	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');
	
		

		if($status == 1){
			 $this->trusted_clients_model->update_status($id,$status);
		
		}
		else{
			$this->trusted_clients_model->update_status($id,$status);
		}
		
		redirect('trusted_clients/admin');

	}
}