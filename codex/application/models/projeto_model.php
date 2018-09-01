<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto_model extends CI_Model {
	/* Funcao que lista todos os dados da tabela */
	public function GetAllProjeto()
	{
		$this->db->select('projeto.*, coordenador.nome as coordenador, aluno.nome as aluno, aluno.idaluno, unidade.nome as unidade, unidade.campus as campus');
		$this->db->from('projeto');
		//$this->db->where('projeto.status != 0');
		$this->db->join('coordenador', 'coordenador.idcoordenador = projeto.idcoordenador');
		$this->db->join('unidade', 'unidade.idunidade = projeto.idunidade');
		$this->db->join('projeto_aluno', 'projeto_aluno.idprojeto = projeto.idprojeto');
		$this->db->join('aluno', 'aluno.idaluno = projeto_aluno.idaluno');
		$this->db->group_by('idprojeto');
		$query = $this->db->get();
		
		return $query->result();

	}

	public function getProjetoByID($id=NULL)
	{
		if ($id) {
			$this->db->select('projeto.*, aluno.nome as aluno, coordenador.nome as coordenador, coordenador.idcoordenador, projeto_aluno.data_entrada, projeto_aluno.data_saida');
			$this->db->from('projeto');
			$this->db->join('coordenador', 'coordenador.idcoordenador = projeto.idcoordenador');
			$this->db->join('projeto_aluno', 'projeto_aluno.idprojeto = projeto.idprojeto');
			$this->db->join('aluno', 'projeto_aluno.idaluno = aluno.idaluno');
			$this->db->where('projeto.idprojeto', $id);
			$query = $this->db->get();
			return $query->row();
		} 
	}

	public function removerAlunos($id=NULL)
	{
		if ($id) {
			$this->db->delete('projeto_aluno', array('idprojeto' => $id));
		}
	}

	public function getAllAlunoByIdProjeto($id=NULL)
	{
		if ($id) {
			$this->db->select('projeto_aluno.*, aluno.nome as aluno, aluno.idaluno');
			$this->db->from('projeto_aluno');
			$this->db->join('aluno', 'projeto_aluno.idaluno = aluno.idaluno');
			$this->db->where('projeto_aluno.idprojeto', $id);
			$query = $this->db->get();
			return $query->result();
		}
	}

	public function getAllAluno()
	{
		$this->db->select('aluno.*');
		$this->db->from('aluno');
		$this->db->where('aluno.status <> 0');
		$query = $this->db->get();
		return $query->result();
	}

}
/* End of file projeto_model.php */
/* Location: ./application/models/projeto_model.php */