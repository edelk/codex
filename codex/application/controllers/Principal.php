<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			set_msg('msgerro', 'Erro: Você precisa estar logado no sistema.', 'erro');
			redirect('login');
		}
		$this->load->model('dashboard_model', 'dashboard');
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('principal/index');
		$this->load->view('layout/footer');
	}
}
