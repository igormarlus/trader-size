<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contatos extends CI_Controller {
	
	
	function index() {
		$dados['title'] = "Central de Atendimento - Dampeças";
		$dados['description'] = "";
		$this->load->view('contatos/central-atendimento' , $dados);	
	}


///////////////
// CONTATOS //
/////////////
	
	function centralDeAtendimento() {
		$dados['title'] = "Central de Atendimento - Dampeças";
		$dados['description'] = "";
		$this->load->view('contatos/central_atendimento' , $dados);	
	}
	
	function perguntasFrequentes() {
		$dados['title'] = "Perguntas Frequentes - Dampeças";
		$dados['description'] = "";
		$dados['faqs'] = $this->db->query("SELECT * FROM faq");
		$this->load->view('contatos/perguntas' , $dados);	
	}	
	
	function localizacaoMapa() {
		$dados['title'] = "Localização no Mapa - Dampeças";
		$dados['description'] = "";
		$this->load->view('contatos/localizacao_mapa' , $dados);	
	}
	
	function faleConosco() {
		$dados['title'] = "Fale Conosco - Dampeças";
		$dados['description'] = "";
		$this->load->view('contatos/fale_conosco' , $dados);	
	}
	
	function trabalheConosco() {
		$dados['title'] = "Trabalhe Conosco - Dampeças";
		$dados['description'] = "";
		$this->load->view('contatos/trabalhe_conosco' , $dados);	
	}			
				

} // x class