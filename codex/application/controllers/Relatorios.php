<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			set_msg('msgerro', 'Erro: Você precisa estar logado no sistema.', 'erro');
			redirect('login');
		}
		$this->load->model('relatorios_model', 'relatorios');
	}

	public function index()
	{
		redirect('/');
	}

	public function pagamentos()
	{
		$this->form_validation->set_rules('data_inicial', 'Data Inicial', 'required');

		if ($this->form_validation->run() == TRUE) {

			if ($this->input->post('data_inicial')) {
				$data_inicial = $this->input->post('data_inicial');
			} else {
				$data_inicial = NULL;
			}

			if ($this->input->post('data_final')) {
				$data_final = $this->input->post('data_final');
			} else {
				$data_final = NULL;
			}

			if ($this->input->post('tipo')) {
				$tipo = $this->input->post('tipo');
			} else {
				$tipo = NULL;
			}

			/*if ($this->input->post('campus')) {
				$campus = $this->input->post('campus');
			} else {
				$campus = NULL;
			}

			if ($this->input->post('tipo')) {
				$tipo = $this->input->post('tipo');
			} else {
				$tipo = NULL;
			}

			if ($this->input->post('edital')) {
				$edital = $this->input->post('edital');
			} else {
				$edital = NULL;
			}*/

			$pagamentos = $this->relatorios->getByPagamentos($data_inicial, $data_final, $tipo);

			/*echo '<pre>';
				print_r($pagamentos);
			*/

			$total_bolsista = 0;
			$valor_total = 0;
			foreach ($pagamentos as $p) {
				$valor_total += $p->valor;
				$total_bolsista++;
			}

			$this->load->helper('dompdf');
			$nome_arquivo = 'relatorio_pagamento';

			$html = '<p align="center">
						<b>MINISTÉRIO DA EDUCAÇÃO / UNIVERSIDADE FEDERAL DE MATO GROSSO / PROCEV</b> <br />
						<b>RELAÇÃO DE PAGAMENTOS</b><br /> <br />
						<b>TOTAL DE BOLSISTAS:</b> '.$total_bolsista.'<br />
						<b>VALOR TOTAL PAGO:</b> '.formatoMoedaView($valor_total).'<br />
						<b>DATA:</b> '.formataDataView($this->input->post('data_inicial')).'<br />
					</p>';
			$html .= '<hr />';

			$html .= '<p align="center">RELATÓRIO</p>';
			$html .= '<br />';

			$html .= '<table border="0" style="width: 100%; border: solid #000 1px;">';
				$html .= '<tr>';
					$html .= '<td>#</td>';
					$html .= '<td>Nome do Bolsista(a)</td>';
					$html .= '<td>RGA</td>';
					$html .= '<td>CPF</td>';
					$html .= '<td>Banco</td>';
					$html .= '<td>Agência</td>';
					$html .= '<td>Conta</td>';
					$html .= '<td>Valor R$</td>';
				$html .= '</tr>';

				$cont = 1;
				foreach ($pagamentos as $p) {
					$html .= '<tr>';
					$html .= '<td>'.$cont.'</td>';
					$html .= '<td>'.$p->nome.'</td>';
					$html .= '<td>'.$p->rga.'</td>';
					$html .= '<td>'.$p->cpf.'</td>';
					$html .= '<td>'.$p->banco.'</td>';
					$html .= '<td>'.$p->agencia.'</td>';
					$html .= '<td>'.$p->conta.'</td>';
					$html .= '<td>'.formatoMoedaView($p->valor).'</td>';

					$valor_total += $p->valor;
					$total_bolsista++;
					$cont++;
				}

			$html .= '</table>';

			echo $html;

			//pdf_create($html, $nome_arquivo);


		} else {
			$this->load->view('layout/header');
			$this->load->view('relatorios/pagamentos');
			$this->load->view('layout/footer');
		}
		
	}
	
}

/* End of file Relatorio.php */
/* Location: ./application/controllers/Relatorio.php */