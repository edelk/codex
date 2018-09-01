<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordenador_model extends CI_Model {
	/* Funcao que lista todos os dados da tabela */
	public function GetAllCoordenador()
	{
		$this->db->select('coordenador.*, unidade.nome as unidade, unidade.campus');
		$this->db->from('coordenador');
		//$this->db->where('coordenador.status != 0');
		$this->db->join('unidade', 'unidade.idunidade = coordenador.idunidade');
		$query = $this->db->get();
		
		return $query->result();

	}

}
/* End of file projeto_model.php */
/* Location: ./application/models/projeto_model.php */