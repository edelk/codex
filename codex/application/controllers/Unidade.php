<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidade extends CI_Controller {

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
		
		$data['unidade'] = $this->base_model->GetALL('unidade');

		$this->load->view('layout/header');
		$this->load->view('unidade/index', $data);
		$this->load->view('layout/footer');

	}


	public function create()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'required');

		if ($this->form_validation->run() == TRUE) {
			
			$dados = elements(array('nome', 'campus', 'status'), $this->input->post());

			$this->base_model->DoInsert('unidade', $dados);
			redirect('unidade');

		} else {
			$this->load->view('layout/header');
			$this->load->view('unidade/create');
			$this->load->view('layout/footer');
		}

	}


	public function edit($id=NULL)
	{

		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('unidade');
		}

		$query = $this->base_model->GetByID('unidade', array('idunidade'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('unidade');
		}

		$this->form_validation->set_rules('nome', 'Nome', 'required');

		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('idunidade');
			$dados = elements(array('nome', 'campus', 'status'), $this->input->post());

			$this->base_model->DoUpdate('unidade', $dados, array('idunidade'=>$id));
			redirect('unidade');

		} else {
			$data['dados'] = $query;
			$this->load->view('layout/header');
			$this->load->view('unidade/edit', $data);
			$this->load->view('layout/footer');
		}
	}


	public function situacao($id=NULL)
	{
		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('unidade');
		}

		$query = $this->base_model->GetByID('unidade', array('idunidade'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('unidade');
		}

		if ($query->status == 1) {
			$dados['status'] = 0;
		} else {
			$dados['status'] = 1;
		}
		$this->base_model->DoUpdate('unidade', $dados, array('idunidade'=>$id));
		redirect('unidade');
	}


	public function excluir($id=NULL)
	{
		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('unidade');
		}

		$query = $this->base_model->GetByID('unidade', array('idunidade'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('unidade');
		}

		if ($query->status == 1) {
			$dados['status'] = 0;
		}

		$this->base_model->DoUpdate('unidade', $dados, array('idunidade'=>$id));
		redirect('unidade');

	}

}

/* End of file Unidade.php */
/* Location: ./application/controllers/Unidade.php */