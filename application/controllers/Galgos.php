<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galgos extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->padrao_model->indexador();
    }

	
	function index() {
		#echo "ss";
		#return false;
		
		#$dados['title'] = '';
		if(!$this->session->userdata('id')){
			redirect('galgos/login ','refresh');
			
		}else{ 
			#$this->load->view('site/index' , $dados);	
		}
		
		
		
		$this->load->model('betfront_model');
		//$this->load->model('bet_model');

		if($this->session->userdata('token')){
		 	$this->load->model('bet_model');
		 }
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;

		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['brasileirao_b'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 321319 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['mls'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 141 ORDER BY inicio desc LIMIT 5,10"); // MLS
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 LIMIT 10"); // brasileiro seiria A
		#$dados['frances'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 55 AND inicio > NOW() ORDER BY inicio desc  LIMIT 10"); // brasileiro seiria A
		#$dados['la_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 117 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['uefa'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 228 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['uefa_league'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 2005 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['italia'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 81 AND inicio > NOW()  LIMIT 10"); // brasileiro seiria A
		
		#$dados['primeira_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 99 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['premier_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 10932509 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['amistoso'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 8616348 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A

		#$dados['copa2018'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 5614746 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		
		if(isset($_POST['q'])){
			$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,1);
		}
		

		#$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		#$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$dados['proximos'] = $this->betfront_model->getSoccers($APP_KEY, $SESSION_TOKEN) ;
		$hoje = date("Y-d-m");
		$hora = date("h:i:s");
		
		#$dados['proximos'] = $this->db->query("SELECT * FROM partidas WHERE data_betfair BETWEEN '$hoje $hora' AND '$hoje 23:59:00' ORDER BY data_betfair asc LIMIT 100 ");
		#$dados['proximos'] = $this->db->query("SELECT * FROM partidas WHERE data_betfair > NOW()  ORDER BY data_betfair asc LIMIT 100 ");

		#echo $dados['proximos']->num_rows();
		#return false;
		


		#$this->load->view('front/home-list' , $dados);	
		#$this->load->view('front/new/eventos' , $dados);
		$this->load->view("galgos/lista" , $dados);

	}


	function login($cb='') {
		#echo "ss";
		$dados['cb'] = $cb;
		#$this->load->view('site/login' , $dados);	
		$this->load->view('galgos/login' , $dados);	
		//redirect('');

	}

	function jogo_by_mkt($id_mkt){
		if($this->session->userdata('token')){
		 	$this->load->model('bet_model');
		 }
		$this->load->model('betfront_model');
		echo $id_mkt;
		return false;

		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		#echo $APP_KEY;
		$dd_evento_qr = $this->betfront_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$id_mkt);
		#echo "opa 3";
		#print_r($dd_evento_qr);
		#print_r($dd_evento_qr);
		$dd_evento = $dd_evento_qr[0]->event;
		#echo $dd_evento->id;
		#echo $dd_evento->name;
		redirect('futebol/jogo/'.url_title($dd_evento->name).'/'.$dd_evento->id);
		#echo "opa 3";
		#return false;
	}


	function run($id_mkt='',$id_evento=0) {
		
		if(!$this->session->userdata('id')){
			#redirect('home/login');
		}
		$this->load->model('betfront_model');
		 if($this->session->userdata('token')){
		 	$this->load->model('bet_model');
		 }

		 $dados['id_mkt'] = $id_mkt;
		#echo "a";
		#return false;
		 /*
		if($id_evento == 0){
			redirect('futebol');
		}
		$qr_dd = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas');
		if($qr_dd->num_rows() == 0){
			$qr_dd_bk = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas_bk');
			if($qr_dd_bk->num_rows() == 0){
				redirect('futebol');
			}else{
				$dados['dd'] = $qr_dd_bk->row();
			}
			
		}else{
			$dados['dd'] = $qr_dd->row();
		}
		$dados['id_evento'] = $id_evento;
		
		$dados['champ'] = $this->padrao_model->get_by_matriz('id_competition',$dados['dd']->id_competition,'betfair_competitions');
		*/
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#if($this->session->userdata('id')) { $limit_mkt = 20; }else{ $limit_mkt = 5; }
		#$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,$limit_mkt);
		#print_r($dados['mercados']);
		
		//return false;

		#echo $qr_dd->num_rows()."<br />";
		#echo count($dados['mercados'])." <-";

		// INSERT REGISTRO ####################
		#$dados['mercados_mais'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'1');
		

		#$matchodds = $this->betfront_model->getMarketings_matchodds($APP_KEY, $SESSION_TOKEN,$id_evento);
		#print_r($dados['mercados_mais']);
		#echo "<br>";
		#echo $dados['mercados_mais'][0]->marketId;
		#$mkts = $this->betfront_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_evento,$dados['mercados_mais'][0]->marketId);
		#foreach($mkts as $odd){ 
			#$marketBook = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
			#print_r($marketBook);
			#$this->mostrar($odd, $marketBook,$dados['mercados_mais'][0]->marketId,$id_evento);
		#}
		#return false;
		########################## FIM INSERT
		

		#$dados['mais'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = '".$dados['dd']->id_competition."'  LIMIT 10"); // brasileiro seiria A
		
		#$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		
		#$this->load->view('front/jogo' , $dados);	
		#$dados['title'] = str_replace(" v "," x ",$dados['dd']->evento)." ".$this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10)).' - '.$$dados['champ']->row()->nome." - Apostas Online Futebol";
		$titulo = "Galgos";
		$dados['titulo'] = $titulo;
		//$this->load->view('front/new/evento' , $dados);	
		$this->load->view('galgos/corrida' , $dados);	

	} // X FN

	function cao(){
		echo "11";
	}
	
	
}
