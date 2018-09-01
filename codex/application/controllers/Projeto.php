<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			set_msg('msgerro', 'Erro: Você precisa estar logado no sistema.', 'erro');
			redirect('login');
		}
		$this->load->model('projeto_model', 'projeto');
	}


	public function index()
	{
		
		$data['projetos'] = $this->projeto->GetAllProjeto();

		$this->load->view('layout/header');
		$this->load->view('projeto/index', $data);
		$this->load->view('layout/footer');

	}


	public function create()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('edital', 'Edital', 'required');
		$this->form_validation->set_rules('area', 'Área Temática', 'required');
		$this->form_validation->set_rules('data_inicio', 'Data Início', 'required');
		$this->form_validation->set_rules('idcoordenador', 'Coordenador', 'required');
		$this->form_validation->set_rules('idunidade', 'Unidade', 'required');

		if ($this->form_validation->run() == TRUE) {
			
			$dados = elements(array('nome','idcoordenador', 'edital', 'area', 'data_inicio', 'data_fim','idunidade'), $this->input->post());

			//GRAVA NO DB E PEGA A ID DO PROJETO
			$this->base_model->DoInsert('projeto', $dados, TRUE);
			$idprojeto = $this->session->userdata('last_id');
			$idaluno = $this->input->post('idaluno');
			$data_entrada = $this->input->post('data_entrada');
			$data_saida = $this->input->post('data_saida');
			$status = 1;

			//CONTA QUANTOS ALUNOS FORAM PASSADOS
			$q_aluno = count($idaluno);
			$status = 1;
			$status_aluno = 1;

			//FAZ A FOR PARA ADD CADA ALUNO
			for ($i=0; $i < $q_aluno; $i++) { 
				$aluno['idaluno'] = $idaluno[$i];
				$aluno['data_entrada'] = $data_entrada[$i];
				$aluno['data_saida'] = $data_saida[$i];
				$aluno['idprojeto'] = $idprojeto;
				$aluno['status'] = $status;
				$aluno['status_aluno'] = $status_aluno;
				
				//ADD ALUNO
				$this->base_model->DoInsert('projeto_aluno', $aluno);
			}

			redirect('projeto');

		} else {
			$data['unidade'] = $this->base_model->GetALL('unidade', array('status'=>1));
			$data['coordenador'] = $this->base_model->GetALL('coordenador', array('status'=>1));
			$data['alunos'] = $this->base_model->GetALL('aluno', array('status'=>1));

			$this->load->view('layout/header');
			$this->load->view('projeto/create', $data);
			$this->load->view('layout/footer');
		}

	}


	public function edit($id=NULL)
	{

		//CONSULTA NO DB PELO ID
		$query = $this->projeto->getProjetoByID($id);

		if ($id && $query) {
			//$this->form_validation->set_rules('nome', 'Nome', 'required');
			$this->form_validation->set_rules('edital', 'Edital', 'required');
			$this->form_validation->set_rules('area', 'Área Temática', 'required');
			$this->form_validation->set_rules('data_inicio', 'Data Início', 'required');
			//$this->form_validation->set_rules('data_entrada', 'Data Entrada', 'required');
			$this->form_validation->set_rules('idcoordenador', 'Coordenador', 'required');
			$this->form_validation->set_rules('idunidade', 'Unidade', 'required');

			if ($this->form_validation->run() == TRUE) {
				
				$dados = elements(array('idcoordenador', 'edital', 'area', 'data_inicio', 'data_fim', 'idunidade'), $this->input->post());

				//GRAVA NO DB E PEGA A ID DO PROJETO
				$this->base_model->DoUpdate('projeto', $dados, 
					array('idprojeto' => $this->input->post('idprojeto') ));

				
				//REMOVE OS ALUNOS DO PROJETO
				$this->projeto->removerAlunos($query->idaluno);
				//CONTA QUANTOS ALUNOS FORAM PASSADOS
				$status = 1;
				$status_aluno = 1;

				$idaluno = $this->input->post('idaluno');
				$data_entrada = $this->input->post('data_entrada');
				$data_saida = $this->input->post('data_saida');
				$status = $status;
				$status_aluno = $status_aluno;

				$q_aluno = count($idaluno);
				

				//FAZ A FOR PARA ADD CADA ALUNO
				for ($i=0; $i < $q_aluno; $i++) { 
					$aluno['idaluno'] = $idaluno[$i];
					$aluno['data_entrada'] = $data_entrada[$i];
					$aluno['data_saida'] = $data_saida[$i];
					$aluno['idprojeto'] = $query->idprojeto;
					$aluno['status'] = $status;
					$aluno['status_aluno'] = $status_aluno;
					
					//ADD ALUNO
					$this->base_model->DoInsert('projeto_aluno', $aluno);
				}

				redirect('projeto');

			} else {
				$data['unidade'] = $this->base_model->GetALL('unidade', array('status'=>1));
				$data['coordenador'] = $this->base_model->GetALL('coordenador', array('status'=>1));
				$data['alunos'] = $this->projeto->getAllAlunoByIdProjeto($query->idprojeto);
				$data['aluno'] = $this->projeto->GetAllAluno();
				$data['dados'] = $query;

				$this->load->view('layout/header');
				$this->load->view('projeto/edit', $data);
				$this->load->view('layout/footer');
			}

		} else {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('projeto');
		}
}


	public function situacao($id=NULL)
	{
		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('projeto');
		}

		$query = $this->base_model->GetByID('projeto', array('idprojeto'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('projeto');
		}

		if ($query->status == 1) {
			$dados['status'] = 0;
		} else {
			$dados['status'] = 1;
		}
		$this->base_model->DoUpdate('projeto', $dados, array('idprojeto'=>$id));
		redirect('projeto');
	}


	public function excluir($id=NULL)
	{

		$query = $this->base_model->GetByID('projeto', array('idprojeto'=>$id));

		if ($id && $query == NULL) {
			$this->base_model->DoDelete('projeto', array('idprojeto'=>$query->idprojeto));
			redirect('projeto');
		} else {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('aluno');
		}
	}

}

/* End of file aluno.php */
/* Location: ./application/controllers/aluno.php */