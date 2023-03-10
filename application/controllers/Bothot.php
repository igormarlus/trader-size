<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bothot extends CI_Controller {

		function index(){
			if($this->session->userdata('vendor_cliente') == "" ){
				redirect("");
			}
		#echo "OK";
		#return false;
		$this->load->helper('language');
		#if($this->session->userdata('id')){
			$this->load->model('bet_model');
		#}
		$this->load->model('betfront_model');


		#$this->lang->load('lp','portuguese-brazilian');
		//////////////  X CONF ATUAL
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		
		if(isset($_POST['q'])){
			$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,1);
		}

		$mercado = "MATCH_ODDS";
		$dados['mercado'] = $mercado;
		
		//$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		$hoje = date("Y-d-m");
		$hora = date("h:i:s");
		
		#$this->load->view('2019/novo-index' , $dados);
		$this->load->view('bot/bot-hots' , $dados);
		//$this->load->view('2019/novo-index-estatico' , $dados);
	}

	
	
}
