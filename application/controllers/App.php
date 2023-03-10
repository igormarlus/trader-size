<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {


	function index() {

		
		$this->load->model('betfront_model');
		//$this->load->model('bet_model');

		if($this->session->userdata('token')){
		 	$this->load->model('bet_model');
		 }
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		
		if(isset($_POST['q'])){
			$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,1);
		}
		

		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);

		$hora = date("h:i:s");
		
		$this->load->view("2019/eventos" , $dados);

	}


	function index_bk(){
		$this->load->helper('language');
		$this->load->model('betfront_model');


		//////// CONF ATUAL
	/*	
		$url_atual = $_SERVER['REQUEST_URI'];
		#echo $this->uri->total_segments();
		$seg = $this->uri->segment(1);
		$exp_url_barra = explode("/",$url_atual);
		#echo "<br>";
		#print_r($exp_url_barra);
		#echo "<br /><hr>";
		$exp_sufixo_url = explode("?",$exp_url_barra[4]);
		#print_r($exp_sufixo_url);
		if(strlen($exp_url_barra[2]) > 1){
			redirect($exp_url_barra[1]."/".$exp_url_barra[2]."/".$exp_url_barra[3]."/".$exp_sufixo_url[0]."/");
		}
		
*/
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
		
		$this->load->view('2019/novo-index' , $dados);
		//$this->load->view('2019/novo-index-estatico' , $dados);
	}
	
	
}
