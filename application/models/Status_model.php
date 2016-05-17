<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_model extends CI_Model {
  public function get_data($tabel,$label){
      return $this->db->limit(10)->get($tabel)->result_array();
  }
}
