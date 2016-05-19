<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('dashboard_model');
    $this->load->model('status_model');
  }

  public function data_data(){
    $this->load->model('auth_model');
    $this->load->model('dashboard_model');



    $username = $this->session->userdata('username');
    $data['data_user'] = $this->auth_model->data_login($username);
    $data['plat_mobil'] = $this->dashboard_model->get_all_plat_mobil();
    $data['mobil_tersedia'] = $this->dashboard_model->get_some_car();
    $data['supir'] = $this->dashboard_model->get_some_driver();
    $data['admin_list'] = $this->dashboard_model->get_all_admin();
    $data['total_mobil'] = $this->dashboard_model->get_count_car();
    $data['total_supir'] = $this->dashboard_model->get_count_driver();
    $data['total_pelanggan'] = $this->dashboard_model->get_count_pelanggan();
    $data['total_order'] = $this->dashboard_model->get_count_order();
    $data['jenis_mobil'] = $this->dashboard_model->get_jenis_mobil();
    $data['daftar_paket'] = $this->dashboard_model->get_paket();
    $data['identitas_pelanggan'] = $this->dashboard_model->get_all_pelanggan();
    $data['jadwal_supir'] = $this->jadwal_supir();

    return $data;
  }

  function index()
  {
    if ($this->session->has_userdata('logged')) {

          $data = $this->data_data();

					$this->load->view('status',$data);
          //
          // echo '<pre>';
          // print_r($data);

    }
    else{
      redirect('auth');
    }
  }

  public function jadwal_supir(){
    $today = date('D');

    $day = array(
      'Sun','Mon','Tue','Wed','Thu','Fri','Sat'
    );

    $hari = array(
      'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
    );

    $now = str_replace($day,$hari,$today);

    $this->load->model('dashboard_model');
    $query = $this->dashboard_model->get_supir($now);

    return $query;
  }


  public function mobil(){
    $this->load->model('status_model');
    $data = $this->data_data();

    $data['data_mobil'] = $this->status_model->get_data('tbl_mobil',0);


    // echo '<pre>';
    // print_r($data);
		$this->load->view('status_mobil',$data);

  }

  public function supir(){
    $this->load->model('status_model');
    $data = $this->data_data();

    $data['data_supir'] = $this->status_model->get_data('tbl_supir',0);


    // echo '<pre>';
    // print_r($data);
    $this->load->view('status_supir',$data);
  }

  public function pelanggan(){
    $this->load->model('status_model');
    $data = $this->data_data();

    $data['data_pelanggan'] = $this->status_model->get_data('tbl_identitas_pemesan',0);

    $this->load->view('status_pelanggan', $data);
  }

  public function pesanan(){
    $this->load->model('status_model');
    $data = $this->data_data();

    $data['data_pesanan_paket'] = $this->status_model->get_data_paket();
    $data['data_pesanan_bangku'] = $this->status_model->get_data_bangku();
    $data['total_pemesan_paket'] = $this->status_model->get_count('tbl_pemesanan_paket')->total;
    $data['total_pemesan_bangku'] = $this->status_model->get_count('tbl_pemesanan_bangku')->total;
    $this->load->view('status_pesanan', $data);

    // echo '<pre>';
    // print_r($data);
  }



  public function hapus_paket(){
    $tabel = 'tbl_pemesanan_paket';
    $where = ['no_pemesanan' => $this->input->post('no_pemesanan')];
    $this->status_model->hapus($tabel, $where);

    echo 'Berhasil Menghapus Pemesanan '.$this->input->post('no_pemesanan');
  }

  public function hapus_bangku(){
    $tabel = 'tbl_pemesanan_bangku';
    $where = ['no_pemesanan' => $this->input->post('no_pemesanan')];
    $this->status_model->hapus($tabel, $where);

    echo 'Berhasil Menghapus Pemesanan '.$this->input->post('no_pemesanan');
  }


  public function konfirmasi_bangku(){
    $tabel = 'tbl_pemesanan_bangku';
    $where = ['no_pemesanan' => $this->input->post('no_pemesanan')];
    $data = ['status' => 1];
    $this->status_model->update($tabel,$data,$where);

    echo 'Berhasil Mengupdate'.$this->input->post('no_pemesanan');;
  }

  public function konfirmasi_paket(){
    $tabel = 'tbl_pemesanan_paket';
    $where = ['no_pemesanan' => $this->input->post('no_pemesanan')];
    $data = ['status_konfirmasi' => 1];
    $this->status_model->update($tabel,$data,$where);

    echo 'Berhasil Mengupdate'.$this->input->post('no_pemesanan');;
  }
}
