<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {	

	public function getValorTotal()
	{
		$query = $this->db->get('pagamento')->result();
		$total = 0;

		foreach ($query as $p) {
			$total = $total + $p->valor;
		}
		return $total;
	}

	public function getTotalProjeto()
	{
		$query = $this->db->get('projeto')->result();
		$total = 0;

		foreach ($query as $proj) {
			$total = $total + 1;
		}
		return $total;
	}

	public function getTotalBolsista()
	{
		$query = $this->db->get('aluno')->result();
		$total = 0;

		foreach ($query as $a) {
			$total = $total + 1;
		}
		return $total;
	}
}


/* End of file base_model.php */
/* Location: ./application/models/base_model.php */