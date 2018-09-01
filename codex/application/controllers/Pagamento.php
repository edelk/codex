<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagamento extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			set_msg('msgerro', 'Erro: Você precisa estar logado no sistema.', 'erro');
			redirect('login');
		}
		$this->load->model('pagamento_model', 'pagamento');
	}


	public function index()
	{
		
		$data['pagamentos'] = $this->pagamento->GetAllPagamento();

		$this->load->view('layout/header');
		$this->load->view('pagamento/index', $data);
		$this->load->view('layout/footer');

	}


	public function create()
	{

		$this->form_validation->set_rules('tipo', 'Tipo', 'required');

		if ($this->form_validation->run() == TRUE) {
			
			$dados = elements(array('valor', 'tipo', 'data', 'idaluno'), $this->input->post());

			$cont = count($this->input->post('idaluno'));

			for ($i=0; $i < $cont; $i++) { 
				$aluno['idaluno'] = $this->input->post('idaluno['.$i.']');
				$aluno['valor'] = $this->input->post('valor['.$i.']');
				$aluno['data'] = $this->input->post('data['.$i.']');
				$aluno['tipo'] = $this->input->post('tipo');

				echo '<pre>';
					print_r($aluno);

				$this->base_model->DoInsert('pagamento', $aluno);
			}

			redirect('pagamento');

		} else {
			$data['pagamentos'] = $this->pagamento->GetAllPagamento();

			$this->load->view('layout/header');
			$this->load->view('pagamento/create', $data);
			$this->load->view('layout/footer');
		}

	}



	public function excluir($id=NULL)
	{
		if ($id == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('pagamento');
		}

		$query = $this->base_model->GetByID('pagamento', array('idpagamento'=>$id));

		if ($query == NULL) {
			set_msg('msgerro', 'Você precisa passar um id.', 'erro');
			redirect('pagamento');
		}

		$this->base_model->DoDelete('pagamento', array('idpagamento'=>$query->idpagamento));
		redirect('pagamento');

	}
}

/* End of file aluno.php */
/* Location: ./application/controllers/aluno.php */