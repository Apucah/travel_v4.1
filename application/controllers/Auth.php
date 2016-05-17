<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($error = NULL)
	{
		if ($this->session->has_userdata('logged')) {
				redirect('dashboard');
		}

		$data = array(
			'error' => $error
		);
		$this->load->view('login',$data);
	}


	public function login()
	{
		$this->load->model('auth_model');
		$login = $this->auth_model->login($this->input->post('username'),$this->input->post('password'));

		if ($login == 1) {
			$row = $this->auth_model->data_login($this->input->post('username'));

			$data = array(
				'logged' => TRUE,
				'username' => $row->username
			);

			$this->session->set_userdata($data);

			redirect('dashboard');
		}
		else{
			$this->index('Username atau Password Salah');
		}

	}

  public function logout()
	{
		$this->session->unset_userdata(array('logged','username'));
		$this->session->sess_destroy();
		redirect('auth');
	}
}
