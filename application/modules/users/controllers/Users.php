<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('url');
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->users_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Users';
		$data['users'] = $this->users_model->get_user(NULL,$page,$data['per_page']);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'User created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create User';
	   if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('surname', 'Surname', 'required');
		$this->form_validation->set_rules('stret_no', 'Stret No', 'required');
		$this->form_validation->set_rules('building_name', 'Building Name', 'required');
		$this->form_validation->set_rules('street', 'Street', 'required');
		$this->form_validation->set_rules('suburb', 'Suburb', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		//$this->form_validation->set_rules('image', 'Image', 'required');

		
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
			$this->users_model->set_user($image);
			redirect('/users/create/1');
		}
	}
		$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($user_id = NULL){
		if($user_id == NULL){
			show_404();
		}
		$data['title'] = 'User View';
		$data['user'] = $this->users_model->get_user($user_id);
		if(empty($data['user'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($user_id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'User updated';
		}
		if($user_id == NULL){
			show_404();
		}
		$data['user'] = $this->users_model->get_user($user_id);
		if(empty($data['user'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify User';
	
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		//$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('surname', 'Surname', 'required');
		$this->form_validation->set_rules('stret_no', 'Stret No', 'required');
		$this->form_validation->set_rules('building_name', 'Building Name', 'required');
		$this->form_validation->set_rules('street', 'Street', 'required');
		$this->form_validation->set_rules('suburb', 'Suburb', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		//$this->form_validation->set_rules('image', 'Image', 'required');

		
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
			$this->users_model->set_user($image,$user_id);
			redirect('/users/edit/'.$user_id.'/1');
		}
		$data['view']='edit';
        $this->load->view('backend/layout', $data);
	}
	
	
	public function remove($user_id = NULL){
		if($user_id== NULL || !is_numeric($user_id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->users_model->remove_user($user_id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('users/');
		}
	}
	
	public function customer_register(){

//print_r($_POST);

		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Register Your Self';
	
		//$this->form_validation->set_rules('DecisionBox', 'You must agree to terms and conditions', 'required');
		$this->form_validation->set_rules('firstname', 'Name', 'required');
		$this->form_validation->set_rules('surname', 'Lastname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('contact', 'Contact', 'required|numeric');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('country', 'Country', 'required');
		

		if ($this->form_validation->run() === FALSE){	
			//$this->session->set_flashdata('error', validation_errors());
				}else{
					$email = $this->input->post('email');
					$getEmail= $this->users_model->get_user_email($email);
					
					if(!empty($getEmail) && ($getEmail->email == $email)){
						$this->session->set_flashdata('error', 'Email already registerd with us.');
						redirect('/users/customer_register/');
					}else{
						$this->users_model->set_user();
						//print'<pre>';print_r($user_id);die;
						$this->session->set_flashdata('message', 'Registerd Successfully! ');
						redirect('/users/customer_register/');
						
				}
			}

		
		$data['view'] = 'users/register';
		$this->load->view('frontend/layout', $data);

	}
	
	public function customer_login(){

//print_r($_POST);

		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Customer Login ';
	
		//$this->form_validation->set_rules('DecisionBox', 'You must agree to terms and conditions', 'required');
		$this->form_validation->set_rules('firstname', 'Name', 'required');
		$this->form_validation->set_rules('surname', 'Lastname', 'required');
		
		

		if ($this->form_validation->run() === FALSE){	
			//$this->session->set_flashdata('error', validation_errors());
				}else{
					
						redirect('/users/customer_register/');
						
				}
			

		
		$data['view'] = 'users/customer_login';
		$this->load->view('frontend/layout', $data);

	}
}