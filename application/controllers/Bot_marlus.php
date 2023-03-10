<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bot_marlus extends CI_Controller {

	function index() {
		if($this->session->userdata('nivel') <> '1'){
			#redirect('dash');
		}
		#$this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		#$this->load->view('bo/base' , $dados);	
		#$dados['eventos'] = $this->padrao_model->get_qr('bot_eventos');
		$dados['cb'] = "";
		$this->load->view('bot_marlus/painel' , $dados);	
	}

	function clear_mkt(){
		$this->db->query("TRUNCATE TABLE mercados");
		redirect('bot_marlus','refresh');
	}
	
	
		
}
