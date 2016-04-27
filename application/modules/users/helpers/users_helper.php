<?php
function get_admin_name($user_id = -1){
 $ci = & get_instance();
 $sql = "SELECT firstname FROM tbl_login WHERE user_id = ".$user_id;
 $query = $ci->db->query($sql);
 $result = $query->row();
 if(empty($result)){
  return '';
 }
 return $result->firstname;
}