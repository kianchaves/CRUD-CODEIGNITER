<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends MY_Controller {

	/**
	 * Carrega o formulário para novo cadastro
	 * @param nenhum
	 * @return view
	 */
	public function create()
	{
		$variaveis['titulo'] = 'Novo Cadastro';
		$this->load->view('v_cadastro', $variaveis);
	}
	/**
	 * Salva o registro no banco de dados.
	 * Caso venha o valor id, indica uma edição, caso contrário, um insert.
	 * @param campos do formulário
	 * @return view
	 */
	public function store(){
		
		$this->load->library('form_validation');
		
		$regras = array(
		        array(
		                'field' => 'nome',
		                'label' => 'nome',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'nome_hospital',
		                'label' => 'nome_hospital',
		                'rules' => 'required'		                
		        ),
		       
		);
		
		$this->form_validation->set_rules($regras);

		if ($this->form_validation->run() == FALSE) {
			$variaveis['titulo'] = 'Novo Registro';
			$this->load->view('v_cadastro', $variaveis);
		} else {
			
			$id = $this->input->post('id');
			
			$dados = array(
			
				"nome" => $this->input->post('nome'),
				"nome_hospital" => $this->input->post('nome_hospital'),

			);
			if ($this->m_cadastros->store($dados, $id)) {
				$this->load->view('v_sucesso');
				$variaveis['mensagem'] = "DEU CERTO BUCETAO";
			} else {
				$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
				$this->load->view('errors/html/v_erro', $variaveis);
			}
				
		}
	}
	/**
	 * Chama o formulário com os campos preenchidos pelo registro selecioando.
	 * @param $id do registro
	 * @return view
	 */
	public function edit($id = null){
		
		if ($id) {
			
			$cadastros = $this->m_cadastros->get($id);
			
			if ($cadastros->num_rows() > 0 ) {
				$variaveis['titulo'] = 'Edição de Registro';
				$variaveis['id'] = $cadastros->row()->id;
				$variaveis['nome'] = $cadastros->row()->nome;
				$variaveis['nome_hospital'] = $cadastros->row()->nome_hospital;
				$this->load->view('v_cadastro', $variaveis);
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $variaveis);
			}
			
		}
		
	}
	/**
	 * Função que exclui o registro através do id.
	 * @param $id do registro a ser excluído.
	 * @return boolean;
	 */
	public function delete($id = null) {
		if ($this->m_cadastros->delete($id)) {
			$this->load->view('v_home');
		}
	}

}
