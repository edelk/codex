<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Relatorios_model extends CI_Model {
	
		public function getByPagamentos($data_inicial, $data_final, $tipo)
		{
			$this->db->select('pagamento.idpagamento, 
							pagamento.data,
							pagamento.tipo,
							pagamento.valor,
							aluno.nome,
							aluno.rga,
							aluno.cpf,
							aluno.banco,
							aluno.agencia,
							aluno.conta');
			$this->db->from('pagamento');
			$this->db->join('aluno', 'aluno.idaluno = pagamento.idaluno');
			//$this->db->join('unidade', 'unidade.idunidade = aluno.idunidade');
			//$this->db->join('projeto', 'projeto.idunidade = unidade.idunidade');
			$this->db->group_by('pagamento.idpagamento');

			if ($data_inicial && $data_final && $tipo) { //LISTAR POR PERÍODO, CAMPUS, EDITAL E TIPO
				$this->db->where('pagamento.data BETWEEN "
						'.$data_inicial.'" and "
						'.$data_final.'"
					');
				$this->db->where('pagamento.tipo', $tipo);
				//$this->db->where('projeto.edital', $edital);
				//$this->db->where('unidade.campus', $campus);

			// } elseif ($data_inicial && $data_final && $edital && $campus) { //LISTAR POR PERÍODO, CAMPUS E EDITAL
				
			// 	$this->db->where('pagamento.data BETWEEN "
			// 			'.$data_inicial.'" and "
			// 			'.$data_final.'"
			// 		');
			// 	$this->db->where('projeto.edital', $edital);
			// 	$this->db->where('unidade.campus', $campus);

			// } elseif ($data_inicial && $data_final && $edital) { //LISTAR POR PERÍODO E EDITAL
			// 	$this->db->where('pagamento.data BETWEEN "
			// 			'.$data_inicial.'" and "
			// 			'.$data_final.'"
			// 		');
			// 	$this->db->where('projeto.edital', $edital);

			// } elseif ($data_inicial && $data_final) { //LISTAR POR PERÍODO
			// 	$this->db->where('pagamento.data BETWEEN "
			// 			'.$data_inicial.'" and "
			// 			'.$data_final.'"
			// 		');

			// } elseif ($campus) { //LISTAR POR CAMPUS
			// 	$this->db->where('unidade.campus', $campus);

			// } elseif ($edital) { //LISTAR POR EDITAL
			// 	$this->db->where('projeto.edital', $edital);

			} elseif ($tipo) { //LISTAR POR TIPO
				$this->db->where('pagamento.tipo', $tipo); 

			} else { //LISTAR POR DATA INICIAL
				$this->db->where('pagamento.data', $data_inicial);
			}

			$this->db->order_by('pagamento.data');
			$query = $this->db->get();

			return $query->result();
		}
	
}
	
/* End of file Relatorios_model.php */
/* Location: ./application/models/Relatorios_model.php */

