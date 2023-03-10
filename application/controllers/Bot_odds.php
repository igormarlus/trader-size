<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bot_odds extends CI_Controller {

	function index() {
		if($this->session->userdata('nivel') <> '1'){
			#redirect('dash');
		}
		#$this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		#$this->load->view('bo/base' , $dados);	
		#$dados['eventos'] = $this->padrao_model->get_qr('bot_eventos');
		$dados['cb'] = "";
		$dados['mkts'] = $this->db->query("SELECT DISTINCT id_mkt FROM selections_types  ORDER BY id asc ");
		$this->load->view('bot_marlus/painel' , $dados);	
	}

	function filtro($tipo="data") {
		if($this->session->userdata('nivel') <> '1'){
			#redirect('dash');
		}
		#$this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		#$this->load->view('bo/base' , $dados);	
		#$dados['eventos'] = $this->padrao_model->get_qr('bot_eventos');
		$dados['cb'] = "";

		$dados['mkts'] = $this->db->query("SELECT DISTINCT id_mkt FROM selections_types  ORDER BY id asc ");

		if($tipo == 'data'){
			$dados['mkts'] = $this->db->query("SELECT DISTINCT id_mkt FROM selections_types WHERE dt_cadastro BETWEEN '".date("Y-m-d")." 00:00:01' AND '".date("Y-m-d")." 23:59:59'   ORDER BY id asc ");
		}
		$this->load->view('bot_marlus/painel' , $dados);	
	}

	function clear_mkt(){
		$this->db->query("TRUNCATE TABLE mercados");
		redirect('bot_oods','refresh');
	}
	
	
		
}
