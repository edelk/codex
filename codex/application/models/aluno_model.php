<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno_model extends CI_Model {
	/* Funcao que lista todos os dados da tabela */
	public function GetAllAluno()
	{
		$this->db->select('aluno.*, unidade.nome as unidade, unidade.campus');
		$this->db->from('aluno');
		//$this->db->where('aluno.status != 0');
		$this->db->join('unidade', 'unidade.idunidade = aluno.idunidade');
		$query = $this->db->get();
		
		return $query->result();

	}

}
/* End of file projeto_model.php */
/* Location: ./application/models/projeto_model.php */