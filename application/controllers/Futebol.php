<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Futebol extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->padrao_model->indexador();
    }

	
	function index() {
		//redirect("");
		#echo "ss";
		#return false;
		/*
		$dados['title'] = '';
		if($this->session->userdata('id')){
			$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=20,$inicio=0);
			//$this->load->view('site/hots_home' , $dados);	
			#$this->load->view('site/bts_home' , $dados);	
			
		}else{ 
			#$this->load->view('site/index' , $dados);	
		}
		*/
		
		
		$this->load->model('betfront_model');
		//$this->load->model('bet_model');

		if($this->session->userdata('token')){
		 	$this->load->model('bet_model');
		 }
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#return false; 
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
		

		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
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
		$this->load->view("2019/eventos" , $dados);
		

	}

	function sofascore(){
		$id_evento = $this->input->post('id_evento');
		$sofascore = $this->input->post('sofascore');
		$refer	= $this->agent->referrer();
		$dd_sofa = array('sofascore' => $sofascore);
		$this->db->where('id_evento',$id_evento);
		$this->db->update('partidas',$dd_sofa);
		$red = str_replace(base_url(), "", $refer);
		redirect($red,'refresh');
	}

	

	function proximos() {
		#echo "ss";
		#return false;
		/*
		$dados['title'] = '';
		if($this->session->userdata('id')){
			$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=20,$inicio=0);
			//$this->load->view('site/hots_home' , $dados);	
			#$this->load->view('site/bts_home' , $dados);	
			
		}else{
			#$this->load->view('site/index' , $dados);	
		}
		*/
		
		#$this->load->model('bet_model');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
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
		

		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		#$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$dados['proximos'] = $this->betfront_model->getSoccers($APP_KEY, $SESSION_TOKEN) ;
		$hoje = date("Y-d-m");
		$hora = date("h:i:s");
		
		#$dados['proximos'] = $this->db->query("SELECT * FROM partidas WHERE data_betfair BETWEEN '$hoje $hora' AND '$hoje 23:59:00' ORDER BY data_betfair asc LIMIT 100 ");
		$dados['proximos'] = $this->db->query("SELECT * FROM partidas WHERE data_betfair > NOW()  ORDER BY data_betfair asc LIMIT 100 ");

		#echo $dados['proximos']->num_rows();
		#return false;

		#$this->load->view('front/home-list' , $dados);	
		#$this->load->view('front/new/eventos-proximos' , $dados);
		redirect("futebol");

	}
	
	
	function team($team_str="") {
		$this->load->model('bet_model');
		#$this->load->helper('language');

		#$this->lang->load('front','english');
		$dados['q'] = str_replace("-"," ",$team_str);
		#$this->load->model('bet_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		
		$dados['team_str'] = $team_str;
		if($team_str != '' ){

			$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,$team_str);
		}
		
		$this->load->view('front/new/busca' , $dados);	

	}
	function time($team_str="") {
		#$this->load->helper('language');
		#echo "OK";
		$this->load->model('bet_model');

		$team_str = str_replace("%20", " ", $team_str);
		


		#$this->lang->load('front','portuguese-brazilian');
		
		$dados['q'] = str_replace("-"," ",$team_str);
		#$this->load->model('bet_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		
		$dados['team_str'] = $team_str;
		if($team_str != '' ){

			$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,$team_str);
		}
		$dados['home'] = $team_str;

		$home = $team_str;
		$qr_home = $this->db->query("SELECT * FROM selections WHERE name = '".$team_str."' ");

		#echo $qr_home->num_rows()." ** ";
		#return false;

		if($qr_home->num_rows() > 0){

			$qr_home = $this->db->query("SELECT * FROM selections WHERE name = '".$home."' ");
	        #$qr_away = $this->db->query("SELECT * FROM selections WHERE name = '".$away."' ");
	        if($qr_home->num_rows() > 0){
	          $id_home = $qr_home->row()->id_selection;     
	        }else{
	          $id_home = 0;
	        }
	        $qr_home_results = $this->db->query("SELECT * FROM resultados WHERE id_home = $id_home  ORDER BY id_partida asc");
	        $dados['id_home'] = $id_home;
	         $dados['qr_home_results'] = $qr_home_results;
		}else{
			$dados['id_home'] = 0;
			$dados['qr_home_results'] = [];
		}
		#echo $qr_home->num_rows();
		#return false;
		#print_r($dados['busca']);
		$this->load->view('front/new/busca' , $dados);	

	}



	function q($qr=""){
		#if(isset($_POST['q'])){
		#echo "no data";
		#return false;
		#echo "Ik";
		$this->load->model('bet_model');
		$this->load->model('betfront_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,$qr);
		#}
		#echo "Opa";
		#return false;
		$qr = str_replace("%20", " ", $qr);
		$dados['q'] = $qr;
		if($_POST){
			$dados['q'] = $this->input->post('q');
		}
		
		$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		$team_str = $qr;
		$dados['home'] = $team_str;
		$qr_home = $this->db->query("SELECT * FROM selections WHERE name = '".$team_str."' ");
		#echo $qr_home->num_rows();
		#echo "<br />";
		if($qr_home->num_rows() > 0){

			$qr_home = $this->db->query("SELECT * FROM selections WHERE name = '".$team_str."' ");
	        #$qr_away = $this->db->query("SELECT * FROM selections WHERE name = '".$away."' ");
	        if($qr_home->num_rows() > 0){
	          $id_home = $qr_home->row()->id_selection;     
	        }else{
	          $id_home = 0;
	        }
	        #echo $id_home;
	        #return false;
	        $qr_home_results = $this->db->query("SELECT * FROM resultados WHERE id_home = $id_home  ORDER BY id_partida asc");
	        $dados['id_home'] = $id_home;
	         $dados['qr_home_results'] = $qr_home_results;
		}else{
			$dados['id_home'] = 0;
			$dados['qr_home_results'] = [];
		}
		#$this->load->view('front/busca' , $dados);	
		$this->load->view('front/new/busca' , $dados);	
	}
	
	function tabelas() {
		#echo "ss";
		/*
		$dados['title'] = '';
		if($this->session->userdata('id')){
			$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=20,$inicio=0);
			//$this->load->view('site/hots_home' , $dados);	
			#$this->load->view('site/bts_home' , $dados);	
			
		}else{
			#$this->load->view('site/index' , $dados);	
		}
		*/
		
		#$this->load->model('bet_model');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['brasileirao_b'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 321319  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['mls'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 141 ORDER BY inicio desc LIMIT 5,10"); // MLS
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 LIMIT 10"); // brasileiro seiria A
		$dados['frances'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 55 ORDER BY inicio desc  LIMIT 10"); // brasileiro seiria A
		$dados['la_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 117 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 228 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa_league'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 2005 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['italia'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 81 LIMIT 10"); // brasileiro seiria A
		
		$dados['primeira_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 99 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['premier_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 10932509 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['amistoso'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 8616348 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		
		if(isset($_POST['q'])){
			$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,1);
		}
		
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		$this->load->view('front/tabelas' , $dados);	

	}
	
	function jogo($evento='',$id_evento=0) {
		#echo "Site em manutenção";
		#return false;
		if(!$this->session->userdata('id')){
			#redirect('home/login');
		}
		$this->load->model('betfront_model');
		 if($this->session->userdata('token')){
		 	$this->load->model('bet_model');
		 }
		#echo "a";
		#return false;
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

		#echo $id_evento;
		#return false;
		
		$dados['champ'] = $this->padrao_model->get_by_matriz('id_competition',$dados['dd']->id_competition,'betfair_competitions');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		if($this->session->userdata('id')) { $limit_mkt = 20; }else{ $limit_mkt = 5; }
		#echo "OK";
		#return false;
		$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,$limit_mkt);
		#print_r($dados['mercados']);
		if (empty($dados['mercados'])) {
		    //echo 'redirect';
		    redirect('futebol');
		}
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
		

		$dados['mais'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = '".$dados['dd']->id_competition."'  LIMIT 10"); // brasileiro seiria A
		
		#$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		
		#$this->load->view('front/jogo' , $dados);	
		#$dados['title'] = str_replace(" v "," x ",$dados['dd']->evento)." ".$this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10)).' - '.$$dados['champ']->row()->nome." - Apostas Online Futebol";
		$titulo = str_replace(" v "," x ",$dados['dd']->evento)." - AO VIVO - ";
		if($this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10)) == "Data invalida"){
			$titulo .= $this->padrao_model->converte_data(substr($dados['dd']->inicio,0,10));
			$dados['start_data'] =substr($dados['dd']->inicio,0,10)."".substr($dados['dd']->inicio,10,10);  
		}else{
			$titulo .= $this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10));
			$dados['start_data'] = substr($dados['dd']->data_betfair,0,10)."".substr($dados['dd']->data_betfair,10,10);  
		}
		if(!empty($champ)){
			if(strlen($dados['champ']->row()->nome) > 2){
				$titulo .= " - ".$dados['champ']->row()->nome;
			}
		}
		$dados['titulo'] = $titulo;
		//$this->load->view('front/new/evento' , $dados);	
		#$this->load->view('2019/jogo' , $dados);	
		$this->load->view("2020/jogo" , $dados);

	} // X FN

	


	function amp($evento='',$id_evento=0) {
		
		$this->load->model('betfront_model');
		if($id_evento == 0){
			redirect('futbol');
		}
		$qr_dd = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas');
		if($qr_dd->num_rows() == 0){
			$qr_dd_bk = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas_bk');
			if($qr_dd_bk->num_rows() == 0){
				redirect('futebol');
			}else{
				$dados['dd'] = $qr_dd_bk->row();
				$dados['dd_evento'] = $qr_dd_bk->row();
			}
			
		}else{
			$dados['dd'] = $qr_dd->row();
			$dados['dd_evento'] = $qr_dd->row();
		}
		$dados['id_evento'] = $id_evento;
		
		$dados['champ'] = $this->padrao_model->get_by_matriz('id_competition',$dados['dd']->id_competition,'betfair_competitions');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		if($this->session->userdata('id')) { $limit_mkt = 20; }else{ $limit_mkt = 5; }
		$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,$limit_mkt);

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
		

		$dados['mais'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = '".$dados['dd']->id_competition."'  LIMIT 10"); 
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		
		$this->load->view("amp/jogo" , $dados);
		#$this->load->view("amp/jogo-amp" , $dados);

	} // X FN


	function evento($evento='',$id_evento=0) {
		if(!$this->session->userdata('id')){
			#redirect('home/login');
		}
		$this->load->model('betfront_model');
		 if($this->session->userdata('token')){
		 	$this->load->model('bet_model');
		 }
		#echo "a";
		#return false;
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
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		if($this->session->userdata('id')) { $limit_mkt = 20; }else{ $limit_mkt = 5; }
		$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,$limit_mkt);
		#print_r($dados['mercados']);
		if (empty($dados['mercados'])) {
		    //echo 'redirect';
		    redirect('futebol');
		}
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
		

		$dados['mais'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = '".$dados['dd']->id_competition."'  LIMIT 10"); // brasileiro seiria A
		
		#$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		
		#$this->load->view('front/jogo' , $dados);	
		#$dados['title'] = str_replace(" v "," x ",$dados['dd']->evento)." ".$this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10)).' - '.$$dados['champ']->row()->nome." - Apostas Online Futebol";
		$titulo = str_replace(" v "," x ",$dados['dd']->evento)." - ";
		if($this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10)) == "Data invalida"){
			$titulo .= $this->padrao_model->converte_data(substr($dados['dd']->inicio,0,10));
			$dados['start_data'] =substr($dados['dd']->inicio,0,10)."".substr($dados['dd']->inicio,10,10);  
		}else{
			$titulo .= $this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10));
			$dados['start_data'] = substr($dados['dd']->data_betfair,0,10)."".substr($dados['dd']->data_betfair,10,10);  
		}
		if(!empty($champ)){
			if(strlen($dados['champ']->row()->nome) > 2){
				$titulo .= " - ".$dados['champ']->row()->nome;
			}
		}
		$dados['titulo'] = $titulo;
		//$this->load->view('front/new/evento' , $dados);	
		$this->load->view('2020/jogo' , $dados);	

	} // X FN

	function prognostico($evento='',$id_evento=0) {
		echo "Site em manutenção.";
		return false;
		$this->load->model("betfront_model");
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
				$dados['dd_evento'] = $qr_dd_bk->row();
			}
			
		}else{
			$dados['dd'] = $qr_dd->row();
			$dados['dd_evento'] = $qr_dd->row();
		}
		$dados['id_evento'] = $id_evento;
		
		$dados['champ'] = $this->padrao_model->get_by_matriz('id_competition',$dados['dd']->id_competition,'betfair_competitions');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		if($this->session->userdata('id')) { $limit_mkt = 20; }else{ $limit_mkt = 5; }
		$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,$limit_mkt);


		$dados['mais'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = '".$dados['dd']->id_competition."'  LIMIT 10"); // brasileiro seiria A
		
		$titulo = "Prognóstico ".str_replace(" v "," x ",$dados['dd']->evento)." - ";
		if($this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10)) == "Data invalida"){
			$titulo .= $this->padrao_model->converte_data(substr($dados['dd']->inicio,0,10));
			$dados['start_data'] =substr($dados['dd']->inicio,0,10)."".substr($dados['dd']->inicio,10,10);  
		}else{
			$titulo .= $this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10));
			$dados['start_data'] = substr($dados['dd']->data_betfair,0,10)."".substr($dados['dd']->data_betfair,10,10);  
		}
		if(strlen($dados['champ']->row()->nome) > 2){
			$titulo .= " - ".$dados['champ']->row()->nome;
		}
		$dados['titulo'] = $titulo;
		//$this->load->view('front/new/evento' , $dados);	
		#$this->load->view('2019/prognostico' , $dados);	
		$this->load->view("2020/jogo" , $dados);

	}

	function event($evento='',$id_evento=0) {
		#echo "a";
		#return false;
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
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		if($this->session->userdata('id')){
			$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'5');
		}




		####  GET MKTS PADROES
		#require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$status_mo = "Sem dados";
		#$status_05 = "Sem dados";
		#$status_cc = "Sem dados";


		#$qrmo = $this->betfront_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_evento,"MATCH_ODDS");
		#$qr05 = $this->betfront_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_evento,"OVER_UNDER_05");
		#$qrcc = $this->betfront_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_evento,"CORRECT_SCORE");

		#$id_mkt_mo = $qrmo[0]->marketId;
		#$id_mkt_05 = $qr05[0]->marketId;
		#$id_mkt_cc = $qrcc[0]->marketId;
		#echo $id_mkt_cc;
		#echo $id_mkt_cc;
		
		#$marketBook_mo = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $id_mkt_mo);
		#$marketBook_05 = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $id_mkt_05);
		#$marketBook_cc = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $id_mkt_cc);
		########################  X MKT PADROES



		// DADOS PADRÕES DA PÁGINA	
		$titulo = str_replace(" v "," x ",$dados['dd']->evento)." - ";
		if($this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10)) == "Data invalida"){
			$titulo .= $this->padrao_model->converte_data(substr($dados['dd']->inicio,0,10));
			$dados['start_data'] =substr($dados['dd']->inicio,0,10)."".substr($dados['dd']->inicio,10,10);  
		}else{
			$titulo .= $this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10));
			$dados['start_data'] = substr($dados['dd']->data_betfair,0,10)."".substr($dados['dd']->data_betfair,10,10);  
		}
		if(strlen($dados['champ']->row()->nome) > 2){
			$titulo .= " - ".$dados['champ']->row()->nome;
		}
		$dados['titulo'] = $titulo;
		$this->load->view('front/new/event' , $dados);	

	} // X FN event

	function mostrar($odd, $marketBook,$id_mkt,$id_jogo)
					{
						$dd_odds = array();
						$f = 0;
						$ff = 0;
						#function printAvailablePrices_odd($selectionId, $marketBook,$id_mkt,$id_jogo)
						#{
							foreach ($marketBook->runners as $runner) {
									$selection_name = $runner->runnerName;
									if ($runner->selectionId == $selectionId) break;
									$selectionId = $runner->selectionId;
									
									if($f == 1){
										$atual = 1;
									}else{
										$atual = 0;
									}

									echo "<h1>BACK ".$selection_name." ---- ".$selection_name."</h1>";	
									echo "<p>(".$runner->selectionId.")</p>";	
									#print_r($runner);
									foreach ($runner->ex->availableToBack as $availableToBack){$f++;
										#print_r($availableToBack);
										$qr_num = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 	
										echo "################";
										echo "<br>";
										echo mysql_num_rows($qr_num);
										echo "<br>";
										if(mysql_fetch_assoc($qr_num) == 0){
											mysql_query("INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_name`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual` ,`dt`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selection_name."' , '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', '".$atual."',CURRENT_TIMESTAMP)");
										}else{
											mysql_query("UPDATE `odds_mkt` SET `tamanho` = ".$availableToBack->size."  WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = '".$id_mkt."'" );
										}

										
										if($f == 1){
											// define odd atual
											$qr_up_atual = mysql_query("SELECT * FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = ".$id_mkt."" )or die(mysql_error());
												$atual = mysql_fetch_assoc($qr_up_atual);
												mysql_query("UPDATE `odds_mkt` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt`.`id` = ".$atual['id']." ");
										
												//  ################ HOTS
												$soma_back_sel = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'lay' order by id desc LIMIT 5  ");
												$soma_back = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'lay' order by id desc LIMIT 5  ");
												$soma_total_sel_back = mysql_fetch_assoc($soma_back_sel);
												$soma_total_back = mysql_fetch_assoc($soma_back);
												if($soma_total_sel_back['soma'] > 0){
													$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
												}else{
													$pecentual_back = 0;
												}
												#echo number_format($pecentual_back, 2, ',', '.').'%';
												if($pecentual_back > 85){
														
													
													if($availableToBack->price > 1.3 && $pecentual_back < 100){
													
														$qr_hot = mysql_query("SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
														if(mysql_num_rows($qr_hot) == 0 ){
															mysql_query("INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
																					 VALUES ( ".$id_jogo." ,'".$id_mkt."', 'lay', '".$selectionId."', '".$selection_name."', '".$availableToBack->price."' , ".$pecentual_back.")")or die(mysql_error());
														}else{
															mysql_query("UPDATE `odds_hot` SET `odd` = '".$availableToBack->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_back." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND `side` =  'lay' ");
														}
													}
													
												}

										} // x if f == 1
										


										echo " <br> @".$availableToBack->price." | ".$availableToBack->size;;
									}
									echo "<h1>Lay - ".$selection_name."</h1>";
									echo "<p>(".$runner->selectionId.")</p>";	
									$L = 0;
									foreach ($runner->ex->availableToLay as $availableToLay){$L++;
										
										if($L == 1){
											$atual = 1;
										}else{
											$atual = 0;
										}

										$qr_num = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' ")or die(mysql_error()); 
										
										if(mysql_num_rows($qr_num) == 0){
											mysql_query("INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_name`,  `selection_id`, `tamanho`, `odd`, `tipo`, `atual`,`dt`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selection_name."', '".$selectionId."', '".$availableToLay->size."', '".$availableToLay->price."', 'lay', '".$atual."',CURRENT_TIMESTAMP)");
										}else{
											mysql_query("UPDATE `odds_mkt` SET `tamanho` = '".$availableToLay->size."' , `atual` = '".$atual."' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = '".$id_mkt."' "  );
										}

										if($L == 1){

												#mysql_query("UPDATE `odds_mkt` SET  `agora` = 0  WHERE selection_id = '".$selectionId."'  AND tipo = 'lay' AND id_mkt = '".$id_mkt."'  " );
												
												$qr_up_atual_lay = mysql_query("SELECT * FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = ".$id_mkt."" )or die(mysql_error());
												$atual_lay = mysql_fetch_assoc($qr_up_atual_lay);
												mysql_query("UPDATE `odds_mkt` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt`.`id` = ".$atual_lay['id']." ");

												$soma_lay_sel = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'back' order by id desc LIMIT 5  ");
												$soma_lay = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by id desc LIMIT 5  ");
												$soma_total_sel_lay = mysql_fetch_assoc($soma_lay_sel);
												$soma_total_lay = mysql_fetch_assoc($soma_lay);
												if($soma_total_sel_lay['soma'] > 0){
													$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
												}else{
													$pecentual_lay = 0;
												}
													## HOTS ############################		
												if($pecentual_lay > 85){
														########## LAY - IONSERI NO BANCO
													if($availableToLay->price > 1.3 && $pecentual_lay < 100){
															$qr_hot = mysql_query("SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
															if(mysql_num_rows($qr_hot) == 0 ){
																mysql_query("INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
												 						VALUES ( ".$id_jogo." ,'".$id_mkt."', 'back', '".$selectionId."', '".$selection_name."', '".$availableToLay->price."' , ".$pecentual_lay.")")or die(mysql_error());
															}else{
																mysql_query("UPDATE `odds_hot` SET `odd` = '".$availableToLay->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_lay." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND  `side` = 'back' ");
															}

													}
												}

										}	

										echo "<br> @".$availableToLay->price." ".$availableToLay->size;;
									}


								#
								#echo "BACK<br>";	
								#print_r($runner->ex->availableToBack);
								#echo "<br>";	
								echo "<br>";	
								echo "<br>";	
								#echo "LAY<br>";	
								#print_r($runner->ex->availableToLay);
							}
						
					}
	
	function competition($nm_competiion,$id_competition){
		$this->load->model('betfront_model');
		if($id_competition == ""){
			redirect('/bets');
		}
		#echo "opa1";
		#return false;
		if( strpos($id_competition, "html") == true){
			#echo "É";
			redirect('/bets');
		}
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		/*
		$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 ORDER BY inicio asc LIMIT 10"); // brasileiro seiria A
		$dados['brasileirao_b'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 321319  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['mls'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 141 ORDER BY inicio desc LIMIT 5,10"); // MLS
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 LIMIT 10"); // brasileiro seiria A
		$dados['frances'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 55 ORDER BY inicio desc  LIMIT 10"); // brasileiro seiria A
		$dados['la_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 117 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 228 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa_league'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 2005 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['italia'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 81 LIMIT 10"); // brasileiro seiria A
		
		$dados['primeira_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 99 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['premier_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 10932509 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['amistoso'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 8616348 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		*/
		#$dados['competition'] = $this->padrao_model->get_by_matriz('id_competition',$id_competition,'betfair_competitions')->row();
		
		#$dados['jogos'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = ".$id_competition." AND inicio > NOW()  ORDER BY inicio asc "); // brasileiro seiria A
		$dados['jogos'] = $this->betfront_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$id_competition);

		#$this->load->view('front/competition-by-db' , $dados);	
		#$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$this->load->view('front/new/competitions' , $dados);	
		$this->load->view('front/new/competitions-betfair' , $dados);	
		
		
		
	}


	// nova area mais leve
	function campeonato($nm_competiion,$id_competition){
		$this->load->model('betfront_model');
		if($id_competition == ""){
			redirect('/bets');
		}
		#echo "opa1";
		#return false;
		if( strpos($id_competition, "html") == true){
			#echo "É";
			redirect('/bets');
		}

		$champ = $this->padrao_model->get_by_matriz('id_competition',$id_competition,'betfair_competitions');
		$dados['champ'] = $champ;

		#echo $id_competition.' - '.$champ->num_rows();
		#return false;

		require_once('includes/betapi/jsonrpc-futbol.php'); 		
		$dados['jogos'] = $this->betfront_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$id_competition);
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);

		$this->load->view('2019/champs' , $dados);	
	}


	function eventos(){
		$dados['copa2018'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 5614746 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A

		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'5');

		$this->load->view('front/new/eventos' , $dados);
	}

	function apostas($evento='',$id_evento=0) {
		$dados['copa2018'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 5614746 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#echo "opa 1";
		#return false;
		if($id_evento == 0){
			redirect('');
		}
		$qr_dd = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas');
		if($qr_dd->num_rows() == 0){
			redirect('');
		}
		
		$dados['dd'] = $qr_dd->row();
		$dados['id_evento'] = $id_evento;
		
		$dados['champ'] = $this->padrao_model->get_by_matriz('id_competition',$dados['dd']->id_competition,'betfair_competitions');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'5');

		// INSERT REGISTRO ####################
		$dados['mercados_mais'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'1');
		#$matchodds = $this->betfront_model->getMarketings_matchodds($APP_KEY, $SESSION_TOKEN,$id_evento);
		#print_r($dados['mercados_mais']);
		#echo "<br>";
		#echo $dados['mercados_mais'][0]->marketId;
		$mkts = $this->betfront_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_evento,$dados['mercados_mais'][0]->marketId);
		foreach($mkts as $odd){ 
			$marketBook = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
			#print_r($marketBook);
			#$this->mostrar($odd, $marketBook,$dados['mercados_mais'][0]->marketId,$id_evento);
		}
		#return false;
		########################## FIM INSERT
		

		$dados['mais'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = '".$dados['dd']->id_competition."'  LIMIT 10"); // brasileiro seiria A
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		
		#$this->load->view('front/jogo' , $dados);	
		$this->load->view('front/new/evento' , $dados);	
	}


	############## FILTRAR ODDS
	function filtro_odds($expect="") {
		$this->load->model('betfront_model');
		
		$qr = $this->db->query("SELECT DISTINCT p.evento, p.id_evento, p.inicio ,o.id_mkt , o.dt_update, o.selection_name,o.tipo,o.odd,o.id_partida,o.atual , m.name 
FROM odds_mkt as o
INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
INNER JOIN partidas as p ON o.id_partida = p.id_evento
WHERE o.odd < 1.5 AND o.odd > 1.2 AND o.tipo = 'back'  AND m.name = 'Match Odds' ");
		
		#$dados['champ'] = $this->padrao_model->get_by_matriz('id_competition',$dados['dd']->id_competition,'betfair_competitions');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'5');

		// INSERT REGISTRO ####################
		#$dados['mercados_mais'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'1');
		#$matchodds = $this->betfront_model->getMarketings_matchodds($APP_KEY, $SESSION_TOKEN,$id_evento);
		#print_r($dados['mercados_mais']);
		#echo "<br>";
		#echo $dados['mercados_mais'][0]->marketId;
		/*
		$mkts = $this->betfront_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_evento,$dados['mercados_mais'][0]->marketId);
		foreach($mkts as $odd){ 
			$marketBook = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
			#print_r($marketBook);
			#$this->mostrar($odd, $marketBook,$dados['mercados_mais'][0]->marketId,$id_evento);
		}
		*/
		#return false;
		########################## FIM INSERT
		$resultados = 0;

		if($expect == "over"){
			$qr = $this->db->query("SELECT DISTINCT p.evento, p.data_betfair, p.id_evento, p.inicio ,o.id_mkt , o.dt_update, o.selection_name,o.tipo,o.odd,o.id_partida,o.atual , m.name 
FROM odds_mkt as o
INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
INNER JOIN partidas as p ON o.id_partida = p.id_evento
WHERE o.odd < 1.3 AND o.tipo = 'back'  AND m.name = 'Over/Under 0.5 Goals' AND o.selection_name LIKE '%over%' ");
		}

		if($expect == "under"){
			$qr = $this->db->query("SELECT DISTINCT p.evento, p.data_betfair, p.id_evento, p.inicio ,o.id_mkt , o.dt_update, o.selection_name,o.tipo,o.odd,o.id_partida,o.atual , m.name 
FROM odds_mkt as o
INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
INNER JOIN partidas as p ON o.id_partida = p.id_evento
WHERE o.odd > 1 AND o.odd < 1.3 AND o.tipo = 'back'  AND m.name = 'Over/Under 0.5 Goals' AND o.selection_name LIKE '%under%' ");
		}



		if($_POST){
			$de = $this->input->post('de');
			$ate = $this->input->post('ate');
			$mercado = $this->input->post('mercado');
			
			$qr = $this->db->query("SELECT DISTINCT p.evento, p.data_betfair, p.id_evento, p.inicio ,o.id_mkt , o.dt_update, o.selection_name,o.tipo,o.odd,o.id_partida,o.atual , m.name 
FROM odds_mkt as o
INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
INNER JOIN partidas as p ON o.id_partida = p.id_evento
WHERE o.odd < '".$ate."' AND o.odd > '".$de."' AND o.tipo = 'back'  AND m.name = '".$mercado."' AND (p.inicio < NOW() OR p.data_betfair < NOW()  ) ");

			#$resultados =  $qr->num_rows();
			#$dados['qr'] = $qr;
			#print_r($qr->result());
			#return false;

		} // X IF POST

		
		$resultados =  $qr->num_rows();
		#echo "opa 6";
		#return false;
		$dados['qr'] = $qr;

		$dados['expect'] = $expect;
		$dados['resultados'] = $resultados;


		#echo $resultados;
		#return false;
		$dados['mais'] = $this->db->query("SELECT * FROM partidas   LIMIT 10"); // brasileiro seiria A
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A

		$dados['tem'] = "";


		
		#$this->load->view('front/jogo' , $dados);	
		$this->load->view('front/new/filtro_odds' , $dados);	

	} // X FN

	function novo(){
		$this->load->helper('language');
		#$this->load->model('betfront_model');


		//////// CONF ATUAL
		
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
		

		$this->lang->load('lp','portuguese-brazilian');
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



	########################### NOVA AREA 2019
	function jogonew($evento='',$id_evento=0) {
		#echo "a";
		#return false;
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
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'10');

		$dados['mais'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = '".$dados['dd']->id_competition."'  LIMIT 10"); // brasileiro seiria A
		
		
		$titulo = str_replace(" v "," x ",$dados['dd']->evento)." - ";

		if($this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10)) == "Data invalida"){
			$titulo .= $this->padrao_model->converte_data(substr($dados['dd']->inicio,0,10));
			$dados['start_data'] =substr($dados['dd']->inicio,0,10)."".substr($dados['dd']->inicio,10,10);  
		}else{
			$titulo .= $this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10));
			$dados['start_data'] = substr($dados['dd']->data_betfair,0,10)."".substr($dados['dd']->data_betfair,10,10);  
		}
		if(strlen($dados['champ']->row()->nome) > 2){
			$titulo .= " - ".$dados['champ']->row()->nome;
		}
		$dados['titulo'] = $titulo;
		//$this->load->view('front/new/evento' , $dados);	

		$this->load->view('2019/jogo' , $dados);	

	} // X FN


	#########################  HOTS
	function hots($live='',$status=0) {
		
		#if($this->session->userdata('nivel') <> '1'){
		#	redirect('dash');
		#}
		#$this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$dados['live'] = $live;
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();

		$dados['status'] = $status;
		
		// caso não espeja adimplente 
		#if($dados['dd']->status == '0'){ 
			#redirect('bet');
		#}
		
		// get campeonatos
		#$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');

		/*
		SELECT a.vei_nome, a.vei_cor, b.mar_nome FROM Veiculo a
		INNER JOIN Marca b ON a.mar_id = b.mar_id
		*/
		if($live == 2){

			$dados['hots'] = $this->db->query("SELECT h.id, h.id_partida, h.id_mkt, h.selection_id, h.tamanho ,h.odd, h.side, h.tipo, h.resultado, h.dt FROM odds_hot  h 
				INNER JOIN mercados m ON h.id_mkt = m.id_mkt
				WHERE h.resultado = 22 AND h.side = 'back'  AND m.status = $status");

		}else{
			#$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=100,$inicio=0);
			
			#$dados['hots'] = $this->db->query("SELECT * FROM odds_hot WHERE resultado = 0");

			/*$dados['hots'] = $this->db->query("SELECT h.id, h.id_partida, h.id_mkt, h.selection_id, h.tamanho ,h.odd, h.side, h.tipo, h.resultado, h.dt FROM odds_hot  h 
				INNER JOIN mercados m ON h.id_mkt = m.id_mkt
				WHERE h.resultado = 0 AND h.side = 'back' ");*/

			$dados['hots'] = $this->db->query("SELECT h.id, h.id_partida, h.id_mkt, h.selection_id, h.tamanho ,h.odd, h.side, h.tipo, h.resultado, h.dt FROM odds_hot  h 
				INNER JOIN mercados m ON h.id_mkt = m.id_mkt
				");
			#$dados['hots'] = $this->db->query("SELECT * FROM odds_hot");
		}

		if($live == '33'){

			$dados['hots'] = $this->db->query("SELECT h.id, h.id_partida, h.id_mkt, h.selection_id, h.tamanho ,h.odd, h.side, h.tipo, h.resultado, h.dt FROM odds_hot  h 
				INNER JOIN mercados m ON h.id_mkt = m.id_mkt
				WHERE h.resultado = 33");

		}
		
		if($status > 0){ //query com mais de 100K correspondido
			#$dados['hots'] = $this->db->query("SELECT * FROM odds_hot WHERE "'',$ord='desc',$campo='id',$limit=100,$inicio=0);
		}
		
		
		#$this->load->view('bo/base' , $dados);	
		#$dados['eventos'] = $this->padrao_model->get_qr('bot_eventos');
		#if($live != 2){
		$this->load->view('2019/hotsdark' , $dados);	 
		#}else{
			#$this->load->view('2019/hots' , $dados);	 
		#}
		#echo "OK";
	}

	function hotsdark($live='',$min=0) {
		
		#if($this->session->userdata('nivel') <> '1'){
		#	redirect('dash');
		#}
		#$this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$dados['live'] = $live;
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		// caso não espeja adimplente 
		if($dados['dd']->status == '0'){ 
			#redirect('bet');
		}
		
		// get campeonatos
		#$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');
		if($live == 2){
			$dados['hots'] = $this->db->query("SELECT * FROM odds_hot WHERE resultado = 22");

		}else{
			#$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=100,$inicio=0);
			$dados['hots'] = $this->db->query("SELECT * FROM odds_hot WHERE resultado = 0");
		}
		
		if($min > 0){ //query com mais de 100K correspondido
			#$dados['hots'] = $this->db->query("SELECT * FROM odds_hot WHERE "'',$ord='desc',$campo='id',$limit=100,$inicio=0);
		}
		
		
		#$this->load->view('bo/base' , $dados);	
		#$dados['eventos'] = $this->padrao_model->get_qr('bot_eventos');
		$this->load->view('2019/hotsdark' , $dados);	 
		#echo "OK";
	}

	function rem_hots($id){

		#$this->db->where('id',$id);
		#$dd_hot = $this->db->get('odds_hot')->row();

		#$this->db->where('id_mkt',$dd_hot->id_mkt);
		#$this->db->delete('odds_mkt');
		

		$this->db->where('id',$id);
		$this->db->delete('odds_hot');
		redirect('futebol/hots');
	}



	#################### RESULTADOS
	function winner(){
		$total = 0;
		$qr_regs = $this->db->query("SELECT COUNT(id) as total_regs  FROM mkt_result WHERE winner <> '' ");
		$qr_regs_win = $this->db->query("SELECT COUNT(id) as total_regs_win  FROM mkt_result ");

		// filtra mercados e elimina nomes dos times
		$qr_sels = $this->db->query("SELECT DISTINCT winner,id_selection  FROM mkt_result WHERE winner <> '' AND 
			(winner LIKE '%Over %' OR winner LIKE '%Under %' OR winner LIKE '%0 -%' OR winner LIKE '%1 -%' OR winner LIKE '%2 -%' OR winner LIKE '%3 -%' OR winner LIKE '%Any Other%'   )
			ORDER BY winner asc");



		echo "<h1>".$qr_regs->row()->total_regs." de ".$qr_regs_win->row()->total_regs_win."</h1>";
		foreach($qr_sels->result() as $sel){

			// INSERT NA TB selections
			/*
			$where_sel = array("id_selection" => $sel->id_selection , 'name' => $sel->winner);
			$this->db->where($where_sel);
			$qr_sel_tb = $this->db->get('selections');
			if($qr_sel_tb->num_rows() == 0){
				$this->db->insert('selections' , $where_sel);
			}
			*/

			#$qr_wins = $this->db->query("SELECT COUNT(id) as total  FROM mkt_result WHERE winner = '".$sel->winner."' ORDER BY winner asc");
			$qr_wins = $this->db->query("SELECT COUNT(id) as total  FROM mkt_result WHERE id_selection = '".$sel->id_selection."' ORDER BY winner asc");

			$total += $qr_wins->row()->total;
			#echo "<p>". $sel->id_selection." ". $sel->winner."</p>";
			echo "<h3> <a href='".base_url()."futebol/winner_odds/".$sel->id_selection."' target='_blank'>".$sel->winner." </a>: <strong style='color:green'>".$qr_wins->row()->total."</strong></h3>";
			#echo "<p>".print_r($qr_wins->row())."</p>";
		}
		echo "TOTAL: ".$total;

	}

	function winner_odds($mkt=""){
		$qr_wins = $this->db->query("SELECT *  FROM mkt_result WHERE id_selection = '".$mkt."'  ORDER BY winner asc LIMIT 100");
		echo "<h2>".$qr_wins->num_rows()."</h2>";

		foreach($qr_wins->result() as $dd){
			$qr_regs = $this->db->query("SELECT COUNT(id) as total_regs  FROM odds_mkt WHERE id_mkt = '".$dd->id_mercado."' ");
			$qr_regs_bk = $this->db->query("SELECT *  FROM odds_mkt_bk WHERE id_mkt = '".$dd->id_mercado."' ");
			#echo "<p>".$dd->id_mercado." (".$qr_regs->row()->total_regs.") (".$qr_regs_bk->row()->odd.") </p>";
			echo "<p>".$dd->id_mercado." (@".$qr_regs_bk->row()->odd.") </p>";
		}

	}

	// RESULTADOS
	function resultados(){
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#return false; 
		$this->load->model("betfront_model");
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);

		$dia = date("Y-m-d");
		if(isset($_POST['dia'])){
			$dia = $this->input->post('dia');
		}
		#$qr_result = $this->db->query("SELECT * FROM mkt_result WHERE id_partida > 0 ORDER BY id desc");
		$qr_result = $this->db->query("SELECT m.id ,m.winner, m.id_mkt, m.id_mercado ,p.evento, p.id, p.inicio, CONVERT(p.data_betfair, DATETIME) as dt_betfair, p.id_evento as pid FROM mkt_result as m 
			INNER JOIN partidas as p ON m.id_partida = p.id_evento
			WHERE m.id_partida > 0 AND (CONVERT(p.data_betfair, DATETIME) BETWEEN '".$dia." 00:00:01' AND '".$dia." 23:59:59')  ORDER BY p.id_evento desc LIMIT 100");
		#echo $qr_result->num_rows();
		#return false;
		#echo "<h1>".$qr_result->num_rows()."</h1>";
		#echo "<table><tr><th>Jogo</th><th>Resultado</th></tr>";
		/*
		foreach ($qr_result->result() as $dd) {
			if($dd->id_partida != 0){
				#$types = $this->padrao_model->get_by_matriz('id_mkt',$dd->id_mkt,'selections_types');
				$qr_partida = $this->padrao_model->get_by_matriz("id_evento",$dd->id_partida,'partidas');
				if($qr_partida->num_rows() == 0){
					$qr_partida = $this->padrao_model->get_by_matriz("id_evento",$dd->id_partida,'partidas_bk');
				}
				if($qr_partida->num_rows() > 0){
					$partida = $qr_partida->row()->evento; 
				}else{
					$partida = "Indefinida";
				}
				echo "<tr>";
				echo "<td>".$partida."  </td>  ";
				echo "<td>".$dd->winner."  </td>  ";
				#echo "<h4>".$dd->id_partida." (".$qr_partida->num_rows().") [".$types->num_rows()."] </h4>  ";
				#print_r($dd);
				echo "</tr>";
				#if($types->num_rows() > 0){
				#	print_r($types->row());
				#}
				#echo "<br><hr>";
			} // x if != 0
		} */
		$dados['qr'] = $qr_result;
		#echo "OK";
		$this->load->view('2021/resultados' , $dados);
	}
	
	function sofascore_list(){
		#$qr = $this->db->query("SELECT * FROM partidas WHERE sofascore <> '' AND (inicio BETWEEN '".date("Y-m-d")." 00:00:01' AND '".date("Y-m-d")." 23:59:59') ");
		$qr = $this->db->query("SELECT * FROM partidas WHERE sofascore <> '' AND fim = 0 ORDER BY id desc LIMIT 10 ");
		echo $qr->num_rows();
		echo "<br>";
		if($qr->num_rows() > 0){
			foreach($qr->result() as $dd){
				echo $dd->sofascore;
				echo "<br><hr>";
			}
		}

	}
	
}
