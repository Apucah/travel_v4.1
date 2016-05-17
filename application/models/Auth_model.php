<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  public function login($username, $password){
    $this->db->from('tbl_admin');
    $this->db->where('username',$username);
    $this->db->where('password',$password);
    return $this->db->get()->num_rows();
  }

  public function data_login($username){
    $this->db->where('username',$username);
    return $this->db->get('tbl_admin')->row();
  }
}
