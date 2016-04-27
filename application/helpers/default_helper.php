<?php

function send_mail($email,$subject,$message){
	$from = "noreply@phakamoney.com";
	$sender_name = "Phakamoney";
	
	$ci = &get_instance();
	$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://e1.ehosts.com',
		'smtp_port' => 465,
		'smtp_user' => 'noreply@phakamoney.com',
		'smtp_pass' => '3454',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1'
	);
	$ci->load->library('email');	
	$ci->email->initialize($config);
	$ci->email->from($from, $sender_name);
	$ci->email->to(trim($email)); 			
	$ci->email->subject($subject);

	
	//$data = $ci->load->view('template/templete_layout',$ci->data, TRUE);
	$ci->email->message($message);
	if($ci->email->send()){
		return true;
	}else{
		return false;
	}	
}

function getMenu(){
	
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('menu');
	$ci->db->order_by('order','desc');
	return $ci->db->get()->result();
	
	

	
}

function get_pages($id){
	
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('chapter_pages');
	$ci->db->where('chapter_id', $id);
	return $ci->db->get()->result();
	
	

	
}


function get_loged_admin_id(){
		$ci =& get_instance();
		$session = $ci->session->all_userdata();
		if(!isset($session['user_id'])){
			return FALSE;
		}
		
		return $session['user_id'];
	}
	