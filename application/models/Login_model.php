<?php
class Login_model extends CI_Model{
 
  function validate($email,$password){
    $this->db->where('user_name',$email);
    $this->db->where('password',$password);
    $result = $this->db->get('tbl_login',1);
     // print_r($this->db->last_query());
     // exit;
    return $result;
  }
 
}