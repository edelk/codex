<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordenador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			set_msg('msgerro', 'Erro: Você precisa estar logado no sistema.', 'erro');
			redirect('login');
		}
		$this->load->model('coordenador_model', 'coordenador');
	}


	public function index()
	{
		
		$data['coordenador'] = $this->coordenador->GetALLCoordenador('coordenador');
		$this->load->view('layout/header');
		$this->load->view('coordenador/index', $data);
		$this->load->view('layout/footer');

	}


	public function create()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('telefone', 'Telefone', 'required');
		$this->form_validation->set_rules('idunidade', 'Unidade', 'required');

		if ($this->form_validation->run() == TRUE) {
			
			$dados = elements(array('nome', 'email', 'telefone', 'idunidade', 'status'), $this->input->post());

			$this->base_model->DoInsert('coordenador', $dados);
			redirect('coordenador');

		} else {
			$data['unidade'] = $this->base_model->GetALL('unidade', array('status'=>1));

			$this->load->view('layout/header');
			$this->load->view('coordenador/create', $data);
			$this->load->view('layout/footer');
		}

	}


	public function edit($id=NULL)
	{
		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('coordenador');
		}

		$query = $this->base_model->GetByID('coordenador', array('idcoordenador'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('coordenador');
		}

		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('telefone', 'Telefone', 'required');
		$this->form_validation->set_rules('idunidade', 'Unidade', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array('nome', 'email', 'telefone', 'idunidade', 'status'), $this->input->post());

			$id = $this->input->post('id');

			$this->base_model->DoUpdate('coordenador', $dados, array('idcoordenador'=>$id));
			redirect('coordenador');
		} else {
			$data['dados'] = $query;
			$data['unidade'] = $this->base_model->GetALL('unidade', array('status'=>1));
			
			$this->load->view('layout/header');
			$this->load->view('coordenador/edit', $data);
			$this->load->view('layout/footer');
		}
	}


	public function situacao($id=NULL)
	{
		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('coordenador');
		}

		$query = $this->base_model->GetByID('coordenador', array('idcoordenador'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('coordenador');
		}

		if ($query->status == 1) {
			$dados['status'] = 0;
		} else {
			$dados['status'] = 1;
		}
		$this->base_model->DoUpdate('coordenador', $dados, array('idcoordenador'=>$query->idcoordenador));
		redirect('coordenador');
	}


	public function excluir($id=NULL)
	{
		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('coordenador');
		}

		$query = $this->base_model->GetByID('coordenador', array('idcoordenador'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('coordenador');
		}

		$this->base_model->DoDelete('coordenador', array('idcoordenador'=>$query->idcoordenador));
		redirect('coordenador');

	}

}

/* End of file Unidade.php */
/* Location: ./application/controllers/Unidade.php */