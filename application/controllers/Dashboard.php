<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public $harga = 100000;


	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('dashboard_model');
	}

	public function rupiah($angka){
		$rupiah = number_format($angka,0,',','.');
		return $rupiah;
	}

	public function get_latest_no_pemesanan(){
			$no_pemesanan = $this->dashboard_model->get_latest_no_pemesanan('tbl_pemesanan_bangku');
			echo $no_pemesanan[0]->no_pemesanan;
	}


	public function index()
	{
		if ($this->session->has_userdata('logged')) {
					$this->load->model('auth_model');
					$this->load->model('dashboard_model');


					for ($i=1; $i <= 7 ; $i++) {
						$total[0][] = $this->dashboard_model->get_count_bulanan($i)[0];
						$total[1][] = $this->dashboard_model->get_count_bulanan($i)[1];
					}


					$username = $this->session->userdata('username');
					$data['bulan_bangku'] = [$total[0][0],$total[0][1],$total[0][2],$total[0][3],$total[0][4],$total[0][5],$total[0][6]];
					$data['bulan_paket'] = [$total[1][0],$total[1][1],$total[1][2],$total[1][3],$total[1][4],$total[1][5],$total[1][6]];
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
					$data['pendapatan']['total'] = $this->rupiah($this->dashboard_model->get_count_total_pendapatan());
					$data['pendapatan']['total_bulan_ini'] = $this->rupiah($this->dashboard_model->get_count_total_bulan_ini_dan_lalu(date('m')));
					$data['pendapatan']['total_bulan_lalu'] = $this->rupiah($this->dashboard_model->get_count_total_bulan_ini_dan_lalu(date('m')-1));
					$data['pendapatan']['persentase'] = ($this->dashboard_model->get_count_total_bulan_ini_dan_lalu(date('m')) - $this->dashboard_model->get_count_total_bulan_ini_dan_lalu(date('m')-1)) * (100 / $this->dashboard_model->get_count_total_bulan_ini_dan_lalu(date('m')));

					$this->load->view('dashboard2',$data);
					//

		    // $this->load->view('invoice/index');
					// echo '<pre>';
					// print_r($data);

		}
		else{
			redirect('auth');
		}
	}

	public function status_mobil(){
		if ($this->session->has_userdata('logged')) {
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

					$this->load->view('status',$data);
					//
					// echo '<pre>';
					// print_r($data);

		}
		else{
			redirect('auth');
		}
	}

	public function status_supir(){

	}


	public function insert_identitas()
	{
				$tabel = array('tbl_identitas_pemesan','tbl_pemesanan_paket');
				$this->load->model('dashboard_model');

				$datanya[0] = array(
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'no_telp' => $this->input->post('no_telp')
				);


				$query[0] = $this->dashboard_model->insert_identitas($tabel[0], $datanya[0]);

				flush();
				$datanya[1] = array(
					'id_pemesan' => $this->dashboard_model->get_id_pemesan(),
					'paket' => $this->input->post('paket'),
					'tgl_pemesanan' => date('Y-m-d'),
					'tgl_mulai' => $this->input->post('tgl_mulai')
				);


				$query[1] = $this->dashboard_model->insert_pemesanan_paket($tabel[1], $datanya[1]);

				flush();

				$no_pemesanan = $this->dashboard_model->get_latest_no_pemesanan('tbl_pemesanan_paket');
				// if ($query[0] && $query[1]) {
					echo $no_pemesanan[0]->no_pemesanan;
					// echo 1;
				// }
				// else {
				// 	echo 0;
				// }


	}

	public function insert_pemesanan_paket(){
		$tabel = 'tbl_pemesanan_paket';

		$data = array(
				'id_pemesan' => $this->input->post('id_pemesan'),
				'paket' => $this->input->post('paket'),
				'tgl_pemesanan' => date('Y-m-d'),
				'tgl_mulai' => $this->input->post('tgl_mulai')
		);

		$this->load->model('dashboard_model');
		$query = $this->dashboard_model->insert_pemesanan_paket($tabel, $data);

		flush();

		$no_pemesanan = $this->dashboard_model->get_latest_no_pemesanan('tbl_pemesanan_paket');
		$ver = $query ? 1 : 0;
		echo $no_pemesanan[0]->no_pemesanan;
		// echo $ver;
	}

	public function insert_mobil()
	{
		$tabel = 'tbl_mobil';

		$plat_mobil = $this->input->post('plat_mobil_depan')." ";
		$plat_mobil .= $this->input->post('plat_mobil_tengah')." ";
		$plat_mobil .= $this->input->post('plat_mobil_akhir');

		$data = array(
			'plat_mobil' => $plat_mobil,
			'nama_mobil' => $this->input->post('nama_mobil'),
			'status' => 'Tersedia',
			'id_jenis' => $this->input->post('id_jenis'),
			'waktu' => date('Y-m-d H:i:s')
		);

		$this->load->model('dashboard_model');
		$query = $this->dashboard_model->insert_mobil_supir($tabel,$data);

		if ($query) {
			echo 1;
		}
		else{
			echo 0;
		}

	}

	public function insert_supir(){
		$tabel = 'tbl_supir';

		$jadwal_kerja = implode(',',$this->input->post('jadwal_kerja'));

		$data = array(
			'nama_supir' => $this->input->post('nama_supir'),
			'jadwal_kerja' => $jadwal_kerja,
			'plat_mobil' => $this->input->post('plat_mobil')
		);

		$this->load->model('dashboard_model');

		$veri =	$this->dashboard_model->insert_mobil_supir($tabel,$data) ? 1 : 0;

		echo $veri;

	}

	public function insert_jenis_mobil(){
		$tabel = 'tbl_jenis_mobil';

		$datanya = array(
			'nama_jenis' => $this->input->post('nama_jenis'),
			'kapasitas' => $this->input->post('kapasitas'),
			'jumlah_mobil' => 0
		);

		$this->load->model('dashboard_model');

		$veri = $this->dashboard_model->insert_mobil_supir($tabel, $datanya) ? 1 : 0 ;

		echo $veri;
	}

	public function get_all_supir(){
		$query = $this->db->get('tbl_supir')->result_array();

		echo '<pre>';

		print_r(explode(',',$query[0]['jadwal_kerja']));
		print_r($query);
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


	public function insert_bangku_with_identitas(){
		$tabel = 'tbl_pemesanan_bangku';



		$sekarang = $this->input->post('tgl_mulai');
		$tahun = substr($sekarang,0,-6);
		$bulan = substr($sekarang,5,-3);
		$tanggal = substr($sekarang,8);

		$hari_mulai = getdate(mktime(0,0,0,$bulan,$tanggal,$tahun))['weekday'];


		$day = array(
			'Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'
		);

		$hari = array(
			'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
		);

		$now = str_replace($day,$hari,$hari_mulai);



		$this->load->model('dashboard_model');
		$supir = $this->dashboard_model->get_supir($now);
		$random = rand(0,count($supir)-1);
		$id_supir = $supir[$random]->id_supir;



		// echo $id_supir;


		$data = array(
			'id_pemesan' => $this->input->post('id_pemesan'),
			'jumlah_bangku' => $this->input->post('jumlah_bangku'),
			'tujuan' => $this->input->post('tujuan'),
			'tgl_mulai' => $this->input->post('tgl_mulai'),
			'tgl_pemesanan' => date('Y-m-d'),
			'total' => $this->input->post('jumlah_bangku') * $this->harga,
			'id_supir' => $id_supir
		);


		$veri = $this->dashboard_model->insert_bangku_with_identitas($tabel, $data) ? 1 : 0;

		flush();


		$no_pemesanan = $this->dashboard_model->get_latest_no_pemesanan('tbl_pemesanan_bangku');


		// echo $veri;
		// if ($veri == 1) {
			echo $no_pemesanan[0]->no_pemesanan;
		// }



	}


	public function insert_bangku(){

		$this->load->model('dashboard_model');


		$data_identitas = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp')
		);

		$query[0] = $this->dashboard_model->insert_identitas('tbl_identitas_pemesan', $data_identitas);

		flush();


		// SUPIR
		$sekarang = $this->input->post('tgl_mulai');
		$tahun = substr($sekarang,0,-6);
		$bulan = substr($sekarang,5,-3);
		$tanggal = substr($sekarang,8);

		$hari_mulai = getdate(mktime(0,0,0,$bulan,$tanggal,$tahun))['weekday'];


		$day = array(
			'Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'
		);

		$hari = array(
			'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
		);

		$now = str_replace($day,$hari,$hari_mulai);



		$this->load->model('dashboard_model');
		$supir = $this->dashboard_model->get_supir($now);
		$random = rand(0,count($supir)-1);
		$id_supir = $supir[$random]->id_supir;

		// END SUPIR

		$data_bangku = array(
			'id_pemesan' => $this->dashboard_model->get_id_pemesan(),
			'jumlah_bangku' => $this->input->post('jumlah_bangku'),
			'tujuan' => $this->input->post('tujuan'),
			'tgl_mulai' => $this->input->post('tgl_mulai'),
			'tgl_pemesanan' => date('Y-m-d'),
			'total' => $this->input->post('jumlah_bangku') * $this->harga,
			'id_supir' => $id_supir
		);

		$query[1] = $this->dashboard_model->insert_bangku_with_identitas('tbl_pemesanan_bangku', $data_bangku);


		flush();

		$no_pemesanan = $this->dashboard_model->get_latest_no_pemesanan('tbl_pemesanan_bangku');

		// if ($query[0] && $query[1]) {
			echo $no_pemesanan[0]->no_pemesanan;
			// echo 1;
		// }
		// else {
		// 	echo 0;
		// }

	}

}
