<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			set_msg('msgerro', 'Erro: Você precisa estar logado no sistema.', 'erro');
			redirect('login');
		}
		$this->load->model('aluno_model', 'aluno');
	}


	public function index()
	{
		
		$data['alunos'] = $this->aluno->GetALLAluno('aluno');

		$this->load->view('layout/header');
		$this->load->view('aluno/index', $data);
		$this->load->view('layout/footer');

	}


	public function create()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('rga', 'RGA', 'trim|required|min_length[12]|max_length[12]|is_unique[aluno.rga]', array('min_length'=>'O campo RGA deve ter 12 caractere(s).', 'max_length'=>'O campo RGA deve ter 12 caractere(s).'));
		$this->form_validation->set_rules('cpf', 'CPF', 'required|is_unique[aluno.cpf]');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[aluno.email]');
		$this->form_validation->set_rules('telefone', 'Telefone', 'required');
		$this->form_validation->set_rules('banco', 'Banco', 'required');
		$this->form_validation->set_rules('agencia', 'Agência', 'required');
		$this->form_validation->set_rules('conta', 'Conta', 'required');
		$this->form_validation->set_rules('idunidade', 'Unidade', 'required');
		$this->form_validation->set_rules('status', 'Situação', 'required');

		if ($this->form_validation->run() == TRUE) {
			
			$dados = elements(array('nome', 'rga', 'cpf', 'email', 'telefone', 'curso', 'banco', 'agencia', 'conta', 'status', 'idunidade'), $this->input->post());

			$this->base_model->DoInsert('aluno', $dados);
			redirect('aluno');

		} else {
			$data['unidade'] = $this->base_model->GetALL('unidade', array('status'=>1));

			$this->load->view('layout/header');
			$this->load->view('aluno/create', $data);
			$this->load->view('layout/footer');
		}

	}


	public function edit($id=NULL)
	{

		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('aluno');
		}

		$query = $this->base_model->GetByID('aluno', array('idaluno'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('aluno');
		}

		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('rga', 'RGA', 'trim|required|min_length[12]|max_length[12]', array('min_length'=>'O campo RGA deve ter 12 caractere(s).', 'max_length'=>'O campo RGA deve ter 12 caractere(s).'));
		$this->form_validation->set_rules('cpf', 'CPF', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
		$this->form_validation->set_rules('telefone', 'Telefone', 'required');
		$this->form_validation->set_rules('banco', 'Banco', 'required');
		$this->form_validation->set_rules('agencia', 'Agência', 'required');
		$this->form_validation->set_rules('conta', 'Conta', 'required');
		$this->form_validation->set_rules('status', 'Situação', 'required');

		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('idaluno');
			$dados = elements(array('nome', 'rga', 'cpf', 'email', 'telefone', 'curso', 'banco', 'agencia', 'conta', 'status'), $this->input->post());

			$this->base_model->DoUpdate('aluno', $dados, array('idaluno'=>$id));
			redirect('aluno');

		} else {
			$data['dados'] = $query;
			$data['unidade'] = $this->base_model->GetALL('unidade', array('status'=>1));

			$this->load->view('layout/header');
			$this->load->view('aluno/edit', $data);
			$this->load->view('layout/footer');
		}
	}


	public function situacao($id=NULL)
	{
		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('aluno');
		}

		$query = $this->base_model->GetByID('aluno', array('idaluno'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('aluno');
		}

		if ($query->status == 1) {
			$dados['status'] = 0;
		} else {
			$dados['status'] = 1;
		}
		$this->base_model->DoUpdate('aluno', $dados, array('idaluno'=>$id));
		redirect('aluno');
	}


	public function excluir($id=NULL)
	{
		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('aluno');
		}

		$query = $this->base_model->GetByID('aluno', array('idaluno'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('aluno');
		}

		$this->base_model->DoDelete('aluno', array('idaluno'=>$query->idaluno));
		redirect('aluno');

	}

}

/* End of file aluno.php */
/* Location: ./application/controllers/aluno.php */