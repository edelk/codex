<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('login_email', 'E-mail', 'required');
		$this->form_validation->set_rules('login_senha', 'Senha', 'required');

		if ($this->form_validation->run() == TRUE) {
			$identity = $this->input->post('login_email');
			$password = $this->input->post('login_senha');
			$remember = TRUE; // remember the user
			if ($this->ion_auth->login($identity, $password, $remember)) {
				redirect('principal', 'refresh');
			} else {
				set_msg('msgerro', 'Os dados de acesso estão incorretos.', 'erro');
				redirect('login', 'refresh');
			}
			
		} else {
			$this->load->view('layout/header');
			$this->load->view('login/index');
			$this->load->view('layout/footer');
		}
	}

	public function logout(){
		$logout = $this->ion_auth->logout();
		redirect('login', 'refresh');
	}
}


/*
* Nome controller: Login
* Pasta: application/controllers/login.php
*/