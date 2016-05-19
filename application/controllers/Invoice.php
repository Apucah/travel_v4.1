<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->load->model('invoice_model');
    $data['identitas'] = $this->invoice_model->get('tbl_identitas');
    // $data['pemesanan'] = $this->invoice_model->get('')
    // $this->load->view('invoice/index');

    return $data;
  }


  function paket($id){

    // $id = $this->input->get('id');

    $this->load->model('invoice_model');
    // $tabel = ['tbl_pemesanan_paket'];
    $data['datanya'] = $this->invoice_model->get_paket($id);
    $data['barang'] = "Travel Paket";
    $this->load->view('invoice/paket_invoice', $data);
  }

  function bangku($id){

    // $id = $this->input->get('id');

    $this->load->model('invoice_model');
    // $tabel = ['tbl_pemesanan_bangku'];
    $data['datanya'] = $this->invoice_model->get_bangku($id);
    $data['barang'] = "Travel Bangku";
    $this->load->view('invoice/index', $data);
    // echo '<pre>';
    // print_r($data);

    // print_r($tabel);
  }

}
