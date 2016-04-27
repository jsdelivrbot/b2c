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
		
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Notification';
		

		$data['view']='index';
        $this->load->view('backend/layout', $data);
        
	}
	
	
}