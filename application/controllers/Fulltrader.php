<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fulltrader extends CI_Controller {

	
	function index() {
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		$dados['jogos'] = $this->db->query(" SELECT DISTINCT p.id_evento, p.inicio, p.evento, o.id_mkt, m.name FROM  partidas as p 
			INNER JOIN odds_mkt o ON p.id_evento = o.id_partida
			INNER JOIN mercados m ON o.id_mkt = m.id_mkt
			ORDER BY p.inicio desc LIMIT 9999");
		#$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		#echo " Pá";
		#if($dados['dd']->nivel == '0'){ 
#			redirect('bet/hots');
		#}
		
		// get corridas
		#$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');		
		$this->load->view('fulltrader/jogos' , $dados);	
		#echo "OK";
	}

	

	
	
}
