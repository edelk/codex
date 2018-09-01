<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_model extends CI_Model {
	/* Funcao que lista todos os dados da tabela */
	public function GetAll($table=NULL, $condicao=NULL)
	{
		/* Verifica se foi passado a tabela  */
		if ($table) {
			/* Verifica se foi passado uma condicao do tipo array  */
			if (is_array($condicao)) {
				$this->db->where($condicao);
			}
			$query = $this->db->get($table);
			return $query->result();

		} else {
			return false;
		}
	}


	/* Funcao que lista os dados da tabela a partir de uma determinada condicao */
	public function GetByID($table=NULL, $condicao=NULL)
	{
		/* Verifica se foi passado a tabela e condicao do tipo array  */
		if ($table && is_array($condicao)) {
			$this->db->where($condicao);
			$this->db->limit(1);
			$query = $this->db->get($table);
			return $query->row();
		} else {
			return false;
		}
	}


	/* Funcao que insere dados na tabela */
	public function DoInsert($table=NULL, $dados=NULL, $getID=NULL)
	{	
		/* Verifica se foi passado a tabela com dados do tipo array */
		if ($table && is_array($dados)) {

			$this->db->insert($table, $dados);
			
			if ($getID) {
				$last_id = $this->db->insert_id();
				$this->session->set_userdata('last_id', $last_id);
			}

			/* Verifica se a insercao foi realizada */
			if ($this->db->affected_rows()>0) {
				set_msg('msgsucess', 'Cadastro realizado com sucesso!', 'sucesso');
			} else {
				set_msg('msgerro', 'Ocorreu um erro ao tentar cadastrar, tente novamente!', 'erro');
			}
		} else {
			return false;
		}
	}


	/* Funcao que atualiza os dados da tabela a partir de uma determinada condicao */
	public function DoUpdate($table=NULL, $dados=NULL, $condicao=NULL)
	{
		/* Verifica se foi passado a tabela, dados e condicao do tipo array  */
		if ($table && is_array($dados) && is_array($condicao)) {
			$this->db->update($table, $dados, $condicao);
			/* Verifica se a atualizacao foi realizada */
			if ($this->db->affected_rows()>0) {
				set_msg('msgsucess', 'Cadastro atualizado com sucesso!', 'sucesso');
			} else {
				set_msg('msgerro', 'Ocorreu um erro ao tentar atualizar, tente novamente!', 'erro');
			}
		} else {
			return false;
		}
	}


	/* Funcao que apaga os dados da tabela a partir de uma determinada condicao */
	public function DoDelete($table=NULL, $condicao=NULL)
	{	
		/* Verifica se foi passado a tabela e condicao do tipo array */
		if ($table && is_array($condicao)) {
			$this->db->delete($table, $condicao);
			/* Verifica se a remocao foi realizada */
			if ($this->db->affected_rows()>0) {
				set_msg('msgsucess', 'Cadastro excluído com sucesso!', 'sucesso');
			} else {
				set_msg('msgerro', 'Ocorreu um erro ao tentar excluir, tente novamente!', 'erro');
			}
		} else {
			return false;
		}
		
	}


	// FUNCAO PARA AUTO COMPLETE DE UNIDADE
	public function autocompleteUnidade($busca=NULL)
	{
		if ($busca) {
			$this->db->like('nome', $busca, 'after');
			$query = $this->db->get('unidade');
			return $query->result();
		} else {
			return FALSE;
		}
	}

	// FUNCAO PARA AUTO COMPLETE DE COORDENADOR
	public function autocompleteCoordenador($busca=NULL)
	{
		if ($busca) {
			$this->db->like('nome', $busca, 'after');
			$query = $this->db->get('coordenador');
			return $query->result();
		} else {
			return FALSE;
		}
	}
}


/* End of file base_model.php */
/* Location: ./application/models/base_model.php */