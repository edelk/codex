<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagamento_model extends CI_Model {
	/* Funcao que lista todos os dados da tabela */
	public function GetAllPagamento()
	{
		$this->db->select('pagamento.*, aluno.idaluno, aluno.nome as aluno, aluno.rga, aluno.cpf, aluno.banco, aluno.agencia, aluno.conta, unidade.nome as unidade, unidade.campus');
		$this->db->from('pagamento');
		$this->db->join('aluno', 'aluno.idaluno = pagamento.idaluno');
		$this->db->join('unidade', 'aluno.idunidade = unidade.idunidade');
		//$this->db->group_by('aluno.idaluno');
		$this->db->order_by('pagamento.data');
		$query = $this->db->get();
		
		return $query->result();

	}
}
/* End of file pagamento_model.php */
/* Location: ./application/models/pagamento_model.php */
/*

QUERY REALIZADA NO WORKBENCH PARA LISTAR PAGAMENTOS
select pgto.data, pgto.valor, a.nome, a.rga, a.cpf, a.banco, a.agencia, a.conta, p.nome, p.edital, p.area, c.nome, u.campus, u.nome from dbcodex.pagamento as pgto
join aluno as a 
on a.idaluno = pgto.idaluno
join projeto_aluno as pa
on pa.idaluno = a.idaluno
join projeto as p
on pa.idprojeto = p.idprojeto
join coordenador as c
on p.idcoordenador = c.idcoordenador
join unidade as u
on c.idunidade = u.idunidade
order by pgto.data;
*/