<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {


    public function get_count_bulanan($bulan){
      $query1 = "SELECT COUNT(*) as jumlah FROM tbl_pemesanan_bangku WHERE tgl_pemesanan LIKE '%-0{$bulan}-%'";
      $bangku = $this->db->query($query1)->row_array();

      $query2 = "SELECT COUNT(*) as jumlah FROM tbl_pemesanan_paket WHERE tgl_pemesanan LIKE '%-0{$bulan}-%'";
      $paket = $this->db->query($query2)->row_array();

      return $total = [$bangku['jumlah'],$paket['jumlah']];
    }



  public function get_count_total_pendapatan(){
    $this->db->select('SUM(total) as total');
    $total_pendapatan_bangku = $this->db->get('tbl_pemesanan_bangku')->row();

    $query = $this->db->query("SELECT SUM(tbl_paket.harga) AS harga FROM tbl_pemesanan_paket,tbl_paket WHERE tbl_pemesanan_paket.paket = tbl_paket.paket ");
    $total_pendapatan_paket = $query->row();

    return $total_pendapatan_bangku->total + $total_pendapatan_paket->harga;
  }

  public function get_count_total_bulan_ini_dan_lalu($bulan){
    $query = "SELECT SUM(total) AS total FROM tbl_pemesanan_bangku WHERE tgl_pemesanan LIKE \"%-{$bulan}-%\"";
    $query = $this->db->query($query);
    $total_bangku = $query->row();


    $query = "SELECT SUM(tbl_paket.harga) AS harga FROM tbl_pemesanan_paket, tbl_paket WHERE tbl_pemesanan_paket.paket = tbl_paket.paket AND tbl_pemesanan_paket.tgl_pemesanan LIKE \"%-{$bulan}-%\"";
    $query = $this->db->query($query);
    $total_paket = $query->row();
    return $total_bangku->total + $total_paket->harga;
  }

  public function get_latest_no_pemesanan($tabel){
    $this->db->order_by('no_pemesanan','DESC');
    return $this->db->get($tabel)->result();
  }
  public function get_all_plat_mobil(){
    $this->db->select(array('plat_mobil','nama_mobil'));
    return $this->db->get('tbl_mobil')->result_array();
  }

  public function insert_mobil_supir($tabel,$data = array()){

    $ver = $this->db->insert($tabel, $data) ? TRUE : FALSE;

    return $ver;
  }

  public function insert_identitas($tabel, $data = array()){
    $ver = $this->db->insert($tabel, $data) ? TRUE : FALSE;

    return $ver;
  }

  public function insert_pemesanan_paket($tabel, $data = array()){
    $ver = $this->db->insert($tabel, $data) ? TRUE : FALSE;
    return $ver;
  }

  public function insert_bangku_with_identitas($tabel, $data=array()){
    $ver = $this->db->insert($tabel, $data) ? TRUE : FALSE;
  }

  public function get_id_pemesan(){
    $this->db->select('id_pemesan');
    $this->db->order_by('id_pemesan', 'DESC');
    return $this->db->get('tbl_identitas_pemesan')->result_array()[0]['id_pemesan'];
  }


  public function get_some_car(){
    $this->db->limit(5,0);
    $this->db->where('status','Tersedia');
    $this->db->order_by('waktu','DESC');
    return $this->db->get('tbl_mobil')->result();
  }
  public function get_some_driver(){
    $this->db->order_by('id_supir','DESC');
    return $this->db->get('tbl_supir')->result();
  }

  public function get_count_driver(){
    return $this->db->get('tbl_supir')->num_rows();
  }
  public function get_count_car(){
    return $this->db->get('tbl_mobil')->num_rows();
  }
  public function get_count_pelanggan(){
    return $this->db->get('tbl_identitas_pemesan')->num_rows();
  }

  public function get_all_admin(){
    return $this->db->get('tbl_admin')->result();
  }

  public function get_jenis_mobil(){
    return $this->db->get('tbl_jenis_mobil')->result();
  }

  public function get_paket(){
    return $this->db->get('tbl_paket')->result();
  }

  public function get_all_pelanggan(){
    return $this->db->get('tbl_identitas_pemesan')->result();
  }

  public function get_supir($now){
    // $this->db->where('jadwal_kerja');
    // $this->db->like('%'.$now.'%');
    // return $this->db->get('tbl_supir')->result_array();

    return $this->db->query("SELECT * FROM `tbl_supir` WHERE `jadwal_kerja` LIKE '%{$now}%'")->result();
  }

  public function get_count_order(){
    $bangku =  $this->db->get('tbl_pemesanan_bangku')->num_rows();
    $paket = $this->db->get('tbl_pemesanan_paket')->num_rows();
    return $bangku+$paket;
  }
}
