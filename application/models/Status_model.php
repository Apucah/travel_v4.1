<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_model extends CI_Model {


  public function get_data($tabel,$limit){
    return $this->db->limit($limit)->get($tabel)->result_array();
  }

  public function get_data_bangku(){
      // return $this->db->limit(10)->get($tabel)->result_array();
      $query = "SELECT tbl_pemesanan_bangku.*, tbl_identitas_pemesan.nama, tbl_supir.nama_supir FROM tbl_pemesanan_bangku, tbl_identitas_pemesan, tbl_supir WHERE tbl_pemesanan_bangku.id_pemesan = tbl_identitas_pemesan.id_pemesan AND tbl_supir.id_supir = tbl_pemesanan_bangku.id_supir ORDER BY tbl_pemesanan_bangku.no_pemesanan ASC LIMIT 10 ";
      $query = $this->db->query($query)->result_array();
      return $query;
  }

  public function get_data_paket(){
      $query = "SELECT tbl_pemesanan_paket.*, tbl_identitas_pemesan.*, tbl_paket.*, tbl_mobil.* FROM tbl_pemesanan_paket, tbl_identitas_pemesan, tbl_paket, tbl_mobil WHERE tbl_pemesanan_paket.id_pemesan = tbl_identitas_pemesan.id_pemesan AND tbl_pemesanan_paket.paket = tbl_paket.paket AND tbl_paket.mobil = tbl_mobil.plat_mobil
";
      $query = $this->db->query($query)->result_array();
      return $query;
  }

  public function get_count($tabel){
    $this->db->select('COUNT(*) as total');
    return $this->db->get($tabel)->row();
  }


  public function hapus($tabel, $where = array()){
    $this->db->delete($tabel, $where);
  }

  public function update($tabel,$data = array(),$where = array()){
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }
}
