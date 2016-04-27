<?php

function get_all_menus(){
	$ci = &get_instance();
	$sql = "SELECT * FROM menu ORDER BY parent_id";
	$query = $ci->db->query($sql);
	$result = $query->result();
	return $result;
}

function get_menu($parent_id = -1){
	$ci = &get_instance();
	$sql = "SELECT * FROM menu WHERE parent_id = $parent_id ORDER BY `order`";
	$query = $ci->db->query($sql);
	$result = $query->result();
	return $result;
}