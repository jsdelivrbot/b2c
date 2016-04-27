<?php
	function get_category_all(){
		 $ci = & get_instance();
		 $sql = "SELECT * FROM category ";
		 $query = $ci->db->query($sql);
		 //$result = $query->row();
		 if(empty($query)){
		  return '';
		 }
		 //echo $ci->db->last_query();die;
		 return $query->result();
}

	function get_category(){
		 $ci = & get_instance();
		 $sql = "SELECT * FROM category order by id ASC limit 3  ";
		 $query = $ci->db->query($sql);
		 //$result = $query->row();
		 if(empty($query)){
		  return '';
		 }
		 //echo $ci->db->last_query();die;
		 return $query->result();
}

	function get_category_by_DESC(){
		 $ci = & get_instance();
		 $sql = "SELECT * FROM category order by id DESC limit 4  ";
		 $query = $ci->db->query($sql);
		 //$result = $query->row();
		 if(empty($query)){
		  return '';
		 }
		 //echo $ci->db->last_query();die;
		 return $query->result();
}

