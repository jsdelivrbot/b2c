<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('footer_model');
		$this->load->helper('url');
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->footer_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Footer';
		$data['footer'] = $this->footer_model->get_footer(NULL,$page,$data['per_page']);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Footer created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Footer';
	
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('value', 'Value', 'required');
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->footer_model->set_footer();
			redirect('/footer/admin/create/1');
		}
		
		$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Footer View';
		$data['footer'] = $this->footer_model->get_footer($id);
		if(empty($data['footer'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Footer updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['footer'] = $this->footer_model->get_footer($id);
		if(empty($data['footer'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Footer';
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('value', 'Value', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->footer_model->set_footer($id);
			redirect('/footer/admin/edit/'.$id.'/1');
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
		$this->footer_model->remove_footer($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('footer/');
		}
	}
}