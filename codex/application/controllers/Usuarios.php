
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Usuarios extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			if (!$this->ion_auth->logged_in()){
				set_msg('msgerro', 'Erro: Você precisa estar logado no sistema.', 'erro');
				redirect('login');
			}

			if (!$this->ion_auth->in_group(1))
			{
				//$this->session->set_flashdata('message', 'You must be an admin to view this page');
				set_msg('msgerro', 'Erro: Você não tem permissão para acessar essa página.', 'erro');
				redirect('principal');
			}

			$this->load->model('ion_auth_model');
		}

		public function index()
		{
			$data['users'] = $this->ion_auth->users()->result();
			$this->load->view('layout/header');
			$this->load->view('Usuarios/index', $data);
			$this->load->view('layout/footer');
			
		}

		public function create()
		{

			$this->form_validation->set_rules('nome_usuario', 'Nome', 'required|min_length[4]', array('min_length'=>'O campo Nome do usuário deve ter pelo menos 4 caractere(s).'));
			$this->form_validation->set_rules('email_usuario', 'E-mail', 'required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('senha_usuario', 'Senha', 'required|min_length[6]|max_length[8]', array('min_length'=>'O campo Senha deve ter pelo menos 6 caractere(s) e no máximo 8.', 'max_length'=>'O campo Senha deve ter no máximo 8 caractere(s).'));
			$this->form_validation->set_rules('senha_usuario2', 'Confirmar Senha', 'required|matches[senha_usuario]', array('matches'=>'O campo Senha não confere!'));

			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('nome_usuario');
				$password = $this->input->post('senha_usuario');
				$email = $this->input->post('email_usuario');
				$tipo = $this->input->post('tipo_usuario');
				$campus = $this->input->post('campus');

				$additional_data = array(
										'username' => $username,
										'campus' => $campus
									);

				$group = array($tipo); 

				$this->ion_auth->register($username, $password, $email, $additional_data, $group);
				set_msg('msgsuccess', 'Cadastro realizado com sucesso.', 'sucesso');
				redirect('usuarios','refresh');
			} else {
				$this->load->view('layout/header');
				$this->load->view('Usuarios/create');
				$this->load->view('layout/footer');
			}

		}

		public function edit($id=NULL){
			if ($id == NULL) {
				set_msg('msgerro', 'Você precisa selecionar um usuário para alterar.', 'erro');
				redirect('usuarios', 'refresh');
			}

			$user = $this->ion_auth->user($id)->row();
			if ($user == NULL) {
				set_msg('msgerro', 'Você precisa selecionar um usuário para alterar.', 'erro');
				redirect('usuarios', 'refresh');
			}

			$this->form_validation->set_rules('nome_usuario', 'Nome', 'required|min_length[4]', array('min_length'=>'O campo Nome do usuário deve ter pelo menos 4 caractere(s).'));

			$this->form_validation->set_rules('email_usuario', 'E-mail', 'required|valid_email');

			if ($this->input->post('senha_usuario')) {
				$this->form_validation->set_rules('senha_usuario', 'Senha', 'min_length[6]|max_length[8]', array('min_length'=>'O campo Senha deve ter pelo menos 6 caractere(s) e no máximo 8.', 'max_length'=>'O campo Senha deve ter no máximo 8 caractere(s).'));
				$this->form_validation->set_rules('senha_usuario2', 'Confirmar Senha', 'matches[senha_usuario]', array('matches'=>'O campo Senha não confere!'));
			}
			

			if ($this->form_validation->run() == TRUE) {

				$id = $this->input->post('id_usuario');
				$tipo = $this->input->post('tipo_usuario');

				$dados['username'] = $this->input->post('nome_usuario');
				$dados['campus'] = $this->input->post('campus');
				$dados['email'] = $this->input->post('email_usuario');
				if ($this->input->post('senha_usuario')) {
					$dados['password'] = $this->input->post('senha_usuario');
				}
				$this->ion_auth->update($id, $dados);

				if ($tipo) {
					$this->ion_auth->remove_from_group(NULL, $id);
					$this->ion_auth->add_to_group($tipo, $id);
				}
				
				set_msg('msgsuccess', 'Alteração realizada com sucesso.', 'sucesso');
				redirect('usuarios','refresh');

			} else {
				$group = $this->ion_auth->get_users_groups($user->id)->row();
				$data['user'] = $user;
				$data['group'] = $group->id;
				
				$this->load->view('layout/header');
				$this->load->view('Usuarios/edit', $data);
				$this->load->view('layout/footer');
			}

		}

		public function excluir($id=NULL){
			if ($id == NULL or $id == 1 or $this->session->user_id == $id) {
				set_msg('msgerro', 'Você precisa selecionar um usuário para excluir.', 'erro');
				redirect('usuarios', 'refresh');
			}

			$user = $this->ion_auth->user($id)->row();

			if ($user == NULL) {
				set_msg('msgerro', 'Você precisa selecionar um usuário para excluir.', 'erro');
				redirect('usuarios', 'refresh');
			}

			if ($this->ion_auth->delete_user($user->id)) {
				set_msg('msgsuccess', 'Usuário excluído com sucesso.', 'sucesso');
				redirect('usuarios', 'refresh');
			} else {
				set_msg('msgerro', 'Ocorreu algum erro, tente novamente.', 'erro');
				redirect('usuarios', 'refresh');
			}
			
		}

		public function situacao($id=NULL){
			if ($this->session->user_id == 1) {

				if ($id == NULL) {
					set_msg('msgerro', 'Você precisa selecionar um usuário para alterar.', 'erro');
					redirect('usuarios', 'refresh');
				}

				$user = $this->ion_auth->user($id)->row();
				if ($user == NULL) {
					set_msg('msgerro', 'Você precisa selecionar um usuário para alterar.', 'erro');
					redirect('usuarios', 'refresh');
				}

				if ($user->active == 1) {
					$dados['active'] = 0;
				} else {
					$dados['active'] = 1;
				}

				if($this->ion_auth->update($id, $dados)){
					set_msg('msgsuccess', 'Status atualizado com sucesso.', 'sucesso');
					redirect('usuarios', 'refresh');
				} else {
					set_msg('msgerro', 'Ocorreu algum erro, tente novamente.', 'erro');
					redirect('usuarios', 'refresh');
				}

			} else {
				set_msg('msgerro', 'Você não tem permissão.', 'erro');
				redirect('usuarios', 'refresh');
			}
		}
	}

	
	/* End of file Usuarios.php */
	/* Location: ./application/controllers/Usuarios.php */
?>