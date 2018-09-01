<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			set_msg('msgerro', 'Erro: Você precisa estar logado no sistema.', 'erro');
			redirect('login');
		}
	}


	public function index()
	{
		redirect('/', 'refresh');
	}

	public function grafico()
	{
		$this->load->model('dashboard_model', 'dashboard');

		$data['titulo'] = array('TOTAL BOLSAS', 'TOTAL PROJETOS', 'TOTAL BOLSISTAS');
		$data['valores'] = array($this->dashboard->getValorTotal(), $this->dashboard->getTotalProjeto(), $this->dashboard->getTotalBolsista());

		echo json_encode($data);
	}


}
