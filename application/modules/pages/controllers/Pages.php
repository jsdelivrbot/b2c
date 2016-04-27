<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('pages_model');
		$this->load->helper('url');
	}
	
	public function index(){
		/*$data = array();
		//$chapter = $this->pages_model->getAllChapter();
		//$data['chapter'] = $chapter;
		*/
		$this->load->view('frontend/home');
		//$this->view('home');
	}
	public function view($slug = NULL){
		if($slug == NULL){
			show_404();
		}
		if($this->pages_model->page_exist($slug) === FALSE){
			show_404();
		}
		$data = array();
		$data['content'] = $this->pages_model->get_page_by_slug($slug);

		$data['title'] = $data['content']->page_title;

		$this->load->view('frontend/layout', $data);
	}
		
}