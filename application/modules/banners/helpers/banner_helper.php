<?php
function get_banners(){
 $ci = & get_instance();
 $sql = "SELECT * FROM tbl_banners WHERE status = '1' ORDER BY sequence ASC ";
 $query = $ci->db->query($sql);
 //$result = $query->row();
 if(empty($query)){
  return '';
 }
 //echo $ci->db->last_query();die;
 return $query->result();
}