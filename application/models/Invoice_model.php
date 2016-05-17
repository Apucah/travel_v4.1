<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends CI_Model {

  public function get_bangku($tabel,$id){
  // $this->db->select("{$tabel[0]}.*");
  // $this->db->select("{$tabel[1]}.*");
  // $this->db->from([$tabel[0],$tabel[1]]);
  // $this->db->where("{$tabel[0]}.id_pemesan","{$tabel[1]}.id_pemesan");
  // $this->db->where("{$tabel[1]}.no_pemesanan =",$id);

    $query = "SELECT tbl_identitas_pemesan.*, {$tabel[0]}.* , tbl_supir.nama_supir, tbl_supir.plat_mobil, tbl_mobil.nama_mobil
FROM tbl_identitas_pemesan,{$tabel[0]},tbl_supir,tbl_mobil
WHERE {$tabel[0]}.id_pemesan = tbl_identitas_pemesan.id_pemesan AND {$tabel[0]}.id_supir = tbl_supir.id_supir AND tbl_supir.plat_mobil = tbl_mobil.plat_mobil AND {$tabel[0]}.no_pemesanan = {$id} ";
    $query = $this->db->query($query);
    return $query->row();


    // return
  }

  public function get_paket($id){
    $query = "SELECT tbl_pemesanan_paket.*, tbl_identitas_pemesan.*, tbl_supir.*, tbl_mobil.*, tbl_paket.* FROM tbl_pemesanan_paket, tbl_identitas_pemesan, tbl_supir, tbl_mobil, tbl_paket WHERE tbl_identitas_pemesan.id_pemesan = tbl_pemesanan_paket.id_pemesan AND tbl_pemesanan_paket.paket = tbl_paket.paket AND tbl_paket.mobil = tbl_mobil.plat_mobil AND tbl_pemesanan_paket.no_pemesanan = {$id}";
    $query = $this->db->query($query);
    return $query->row();
  }

}
