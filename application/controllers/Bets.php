<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bets extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->padrao_model->indexador();
    }

	function index() {
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

	

	function jogo_by_mkt($id_mkt){
		#if($this->session->userdata('token')){
		 	$this->load->model('bet_model');
		 #}
		$this->load->model('betfront_model');

		
		


		#echo "***";
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		#echo $APP_KEY;
		$dd_evento_qr = $this->betfront_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$id_mkt);

		#echo "opa 3";
		#print_r($dd_evento_qr);
		#print_r($dd_evento_qr);
		$dd_evento = $dd_evento_qr[0]->event;
		#echo "<br />";
		#echo $dd_evento->id;
		#echo "<br />";
		#echo $dd_evento->name;

		redirect('futebol/jogo/'.url_title($dd_evento->name).'/'.$dd_evento->id.'/' , 'refresh');
		#$title = url_title($dd_evento->name);
		#echo $title;
		#$this->jogo($title,$dd_evento->id);
		#echo "opa 3";
		#return false;
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
		
		$this->load->model('bet_model');
		
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
	
	function jogo($evento='',$id_evento=0,$nm_competicao='') {
		#echo "Site em manutenção";
		#return false;
		if($this->session->userdata('token')){
		 	$this->load->model('bet_model');
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
		#$this->load->view('2019/jogo' , $dados);	
		$this->load->view("2020/jogo" , $dados);

	}

	function prognostico($evento='',$id_evento=0) {
		$this->load->model('betfront_model');
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
		
		
		*/
		
		#$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		$dados['competition'] = $this->padrao_model->get_by_matriz('id_competition',$id_competition,'betfair_competitions')->row();
		$dados['jogos'] = $this->betfront_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$id_competition);

		#$this->load->view('front/competition-by-db' , $dados);	
		#$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$this->load->view('front/new/competitions' , $dados);	
		$this->load->view('front/new/competitions-betfair' , $dados);	
		
		
	}
	function competition_bk($nm_competiion,$id_competition){
		echo "opa 1";
		return false;

		if($id_competition == ''){
			$id_competition = '8616348'; 
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
		*/
		
		#$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		
		$dados['competition'] = $this->padrao_model->get_by_matriz('id_competition',$id_competition,'betfair_competitions')->row();
		$jogos_ = $this->db->query("SELECT * FROM partidas WHERE id_competition = ".$id_competition." AND inicio > NOW() ");

		if($jogos_->num_rows() == 0){
			$dados['jogos'] =  $this->db->query("SELECT * FROM partidas");
		}else{
			$dados['jogos'] = $jogos_; // brasileiro seiria A
		}
		#$this->load->view('front/competition-by-db' , $dados);	
		$this->load->view('front/new/competitions' , $dados);	
		#$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$this->load->view('front/competition' , $dados);	
		
		
	}


	// nova area mais leve
	function campeonato($nm_competiion,$id_competition){
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
	


function competition_sitemaps($nm_competiion,$id_competition){
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
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
		
		$dados['competition'] = $this->padrao_model->get_by_matriz('id_competition',$id_competition,'betfair_competitions')->row();
		$dados['copa2018'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 5614746 AND inicio > NOW()  ORDER BY inicio desc "); // brasileiro seiria A
		
		
		echo "<textarea style='width:80%;height:80%'>";
		foreach($dados['copa2018']->result() as $jogo){ 
			#echo $jogo->inicio." ".$jogo->evento<?=$jogo->id_evento?
			#echo "OPa";
			#return false;
			echo "
			<url>
				<loc>".base_url()."bets/jogo/".url_title($jogo->evento)."/".$jogo->id_evento."</loc>
				<lastmod>".date("Y-m-d")."</lastmod>
				<changefreq>daily</changefreq>
				<priority>0.9</priority>
			</url> 
			";
         } 
         echo "</textarea>";

		
	}

function sitemaps_campeonatos(){
	echo "Opa";
#	return false;
	$this->load->model("betfront_model");
	require_once('includes/betapi/jsonrpc-futbol.php'); 
	$campeonatos = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
	#print_r($campeonatos);
	#echo count( $campeonatos);
	#return false;
	echo "<textarea style='width:80%;height:80%'>";
	 foreach($campeonatos as $dd){                    
		#$url = base_url()."bets/competition/".=url_title($dd->competition->name)."/".$dd->competition->id."/".$dd->competition->name;
		#echo $url;
	
		echo "
			<url>
				<loc>".base_url()."bets/competition/".url_title($dd->competition->name)."/".$dd->competition->id."</loc>
				<lastmod>".date("Y-m-d")."</lastmod>
				<changefreq>daily</changefreq>
				<priority>0.9</priority>
			</url> 
			";
			
			#echo $dd->name;
			#echo $dd->competition->name;
			#echo $dd->competition->id;
			#print_r($dd);
		#echo "<br />";
     }  
     echo "</textarea>";
}

function fdata(){
	include ('includes/fdata/FootballData.php');
	// Create instance of API class
    #$api = new FootballData();
    // fetch and dump summary data for premier league' season 2015/16
    #$soccerseason = $api->getSoccerseasonById(398);
   # echo "<p><hr><p>";

    #echo count($soccerseason);
   # echo print_r($soccerseason);
   # echo "<br />";

	#echo "OK3";
	#foreach ($soccerseason->getFixturesByMatchday(1) as $fixture) {
	#	echo $fixture->homeTeamName." x ".echo $fixture->awayTeamName;;
	#}
	$this->load->view('fdata/index');
} // x fn

function get_by_data(){

	// These code snippets use an open-source library. http://unirest.io/php
/*
$response = Unirest\Request::get("https://stroccoli-futbol-science-v1.p.mashape.com/s1/calendar/2017-01-01/2017-01-10?tournament_name=Premier+League",
  	#array(
	    "X-Mashape-Key" => "yUyG9Jvbl5mshc1WyNKDpvx7YPCAp13qDvajsnInE0HCjxy8gu",
	    "Accept" => "application/json"
	#);
); 
*/



#echo count($response);
echo "Opa 1";
} // x fn

///////////////////// get porcentagem dos mercados
function get_percentual_selecions($id_evento,$id_mkt=0,$side="lay"){
	$this->load->model('betfront_model');
	#echo $id_evento;
	$this->set_odds($id_evento,$id_mkt);
	#return false;
	// credito


	#echo "<link rel='stylesheet' href='".base_url()."css-front/style.css' type='text/css' />";
	#echo "<link rel='stylesheet' href='".base_url()."css-front/bootstrap.css' type='text/css' />";
	/*
	echo '
		
		<link rel="stylesheet" href="https://tradersize.com/css-front/style.css" type="text/css" />
		<link rel="stylesheet" href="https://tradersize.com/css-front/bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="https://tradersize.com/css-front/font-icons.css" type="text/css" />
		<link rel="stylesheet" href="https://tradersize.com/css-front/animate.css" type="text/css" />
	
	';
	*/
	
	$this->betfront_model->get_percentual_selecions($id_evento,$id_mkt,$side);

	#echo "<script type='text/javascript' src='".base_url()."js-front/jquery.js'></script>";
	#echo "<script type='text/javascript' src='".base_url()."js-front/plugins.js'></script>";
	#echo "<script type='text/javascript' src='".base_url()."js-front/functions.js'></script>";
	
	


} // x fn

function get_percentual_selecions_light($id_evento,$id_mkt=0,$side="lay"){
	$this->load->model('betfront_model');
	
	#echo $id_evento;
	$odds = $this->set_odds($id_evento,$id_mkt);
	#print_r($odds);
	$this->betfront_model->get_percentual_selecions_light($id_evento,$id_mkt,$side,$odds);
} // x fn





function get_odds_api($id_evento,$id_mkt=0,$side="lay"){
	header('Access-Control-Allow-Origin: *');
	$this->load->model('betfront_model');
	#echo $id_mkt;
	/*
	$qr = $this->db->query("SELECT dt_update FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND dt_update <> '' ORDER BY dt_update desc LIMIT 1");
	$data_atual = date('Y-m-d H:i:s');
	$data_now = strtotime($data_atual);
	foreach($qr->result() as $dd){
		$last_data = strtotime($dd->dt_update);
		$dif      = $data_atual - $last_data;
		$nMinutos = ((  $last_data - $data_atual) % 3600) / 60;
		#echo $last_data." ".$data_now." = ".$dif." (".$nMinutos." )";
		#echo "<br>";
	}
	#echo $qr->num_rows();
	#return false;
	
	#echo $id_evento;
	if($nMinutos > 10){
		$odds = $this->set_odds($id_evento,$id_mkt);
	}
	*/
	//print_r($odds);
	$this->betfront_model->get_odds_api($id_evento,$id_mkt);
} // x fn

// function  PARA ATUALIZAR APENAS O LABEL ODD E NA~OTODOS OS ELEMENTOS
function get_odds_selecions($id_evento,$id_mkt=0,$side="lay"){
	$this->load->model('betfront_model');
	#echo $id_evento;
	$odds = $this->set_odds($id_evento,$id_mkt);
	echo jsonencode( $odds);
	#$this->betfront_model->get_percentual_selecions_light($id_evento,$id_mkt,$side,$odds);
} // x fn


// set_odds
	function set_odds($id_evento,$id_mkt){

		#echo "OK";
		#return false;
		
		$this->load->model('betfront_model');
	#	foreach($qr->result() as $dd_mkt){
			
			

			$id_jogo = $id_evento;
			
			$id_mkt = $id_mkt;
			
			#return false;
			############################## GET ODDS DO MERCADO
			require_once('includes/betapi/jsonrpc-futbol.php'); 
			#$APP_KEY = 'qD8D8WZ300PJGjbN';
			#$APP_KEY = '6A1cQNtoRmi0GDOS'; //ccccccccc     meu id vendor
			#$APP_KEY = 'qD8D8WZ300PJGjbN'; // LIVE
			#$SESSION_TOKEN = 'cnEEv5hjDUcY9/BDPOq3xMX2K478JFihZiYY3Ov+eeI='; // igormarlus
			if($this->session->userdata('token')){
				$this->load->model('bet_model');
				$mkts = $this->bet_model->getMkt_logado($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt);
				echo "logado";
			}else{
				$mkts = $this->betfront_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt);
			}
			#echo $APP_KEY." ".$SESSION_TOKEN." - ".$id_jogo." - ".$id_mkt;
			#echo "<br><br>";
			$mkts_rows = count($mkts);
			#print_r($mkts);
			#echo "<h1>".$mkts_rows."</h1>";
			// remove mercados encerrados
			if($mkts_rows == 0){

				// cadastra em outra tabela para registro
				/*
				mysqli_query("INSERT INTO `historico` SET 
					`id_evento`=111, 
					`id_mkt`='".$id_mkt."', 
					`nm_evento`='nome evento',
					`nm_mkt`='nome mkt',
					`result`='win' 
					");
				*/
				#mysql_query("DELETE FROM mercados WHERE id_mkt = '".$id_mkt."'");
				#mysql_query("DELETE FROM odds_mkt WHERE id_mkt = '".$id_mkt."'");
				#mysql_query("DELETE FROM odds_hot WHERE id_mkt = '".$id_mkt."'");
			}
			#echo $id_mkt.' - 2 -  '.$id_jogo;
			#echo "<br>";
			#print_r($mkts);
			foreach($mkts as $odd){ 
				/*
				print_r($odd);
				if(is_array($odd)){
					echo "sim";
				}else{
					echo "nao";
				}
				*/
				########## 	MOSTRA AS ODDS
				#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
				$marketBook = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);

				

				function mostrar($odd, $marketBook,$id_mkt,$id_jogo)
					{
						$dd_odds = array();
						$f = 0;
						$ff = 0;
						$odds_back = array();
						$odds_lay = array();
						$odds_bck = array();
						$odd_back = "";
						$odd_lay = "";
						#function printAvailablePrices_odd($selectionId, $marketBook,$id_mkt,$id_jogo)
						#{
						//print_r($marketBook);
							foreach ($marketBook->runners as $runner) {
									#print_r($marketBook);
									#echo "<br><hr>";
									#$selection_name = $runner->runnerName;
									$selection_name = "";
									#if ($runner->selectionId == $selectionId) break;
									$selectionId = $runner->selectionId;
									#echo "<br><br>--------";
									#print_r($runner);
									#echo "<br>^^^<br>";
									#echo "<br>";
									#echo "***************";
									if($f == 1){
										$atual = '1';
									}else{
										$atual = '0';
									}

									#echo "<h1>BACK ".$selection_name."</h1>";	
									#echo "<p>(".$runner->selectionId.")</p>";	
									include("includes/mysqli_con.php");
									foreach ($runner->ex->availableToBack as $availableToBack){$f++;
										#print_r($availableToBack);
										$qr_num = mysqli_query($con,"SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 	

										
										if(mysqli_num_rows($qr_num) == 0){
											mysqli_query($con,"INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_name`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual` ,`dt`,`dt_update`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selection_name."' , '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', '0','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')");
										}else{
											mysqli_query($con,"UPDATE `odds_mkt` SET `tamanho` = ".$availableToBack->size."  , dt_update = '".date("Y-m-d H:i:s")."'  WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = '".$id_mkt."'" )or die(mysqli_error($con));
										}

										//$odds_bck[$selectionId] = $availableToBack->price;
										//$odds_bck[$selectionId] = $f;
										if($f == 1){
											//$odds_bck['atual'] = $availableToBack->price;
											$odds_bck[$selectionId] = $availableToBack->price;
											#echo "OOOOOOOOOOOOoo oooo o oOOOOOOOOOOOOOO"

											#if(mysqli_num_rows($qr_num) > 0){

												mysqli_query($con,"UPDATE `odds_mkt` SET  dt_update = '".date("Y-m-d H:i:s")."' ,  atual = '1'  WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = '".$id_mkt."'" )or die(mysqli_error($con));
											#}
											

											// manda pra outra função mostrar a odd
											
											// define odd atual
											#$qr_up_atual = mysqli_query($con,"SELECT * FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = ".$id_mkt."" )or die(mysqli_error($con));
												#$atual = $qr_up_atual;
												#mysqli_query($con,"UPDATE `odds_mkt` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt`.`id` = 1 ")or die(mysqli_error($con));
										
												//  ################ HOTS
												$soma_back_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'lay' order by id desc LIMIT 5  ");
												$soma_back = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'lay' order by id desc LIMIT 5  ");
												$soma_total_sel_back = mysqli_fetch_assoc($soma_back_sel);
												$soma_total_back = mysqli_fetch_assoc($soma_back);
												if($soma_total_sel_back['soma'] > 0){
													$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
												}else{
													$pecentual_back = 0;
												}
												#echo number_format($pecentual_back, 2, ',', '.').'%';
												if($pecentual_back > 85){
														
													
													if($availableToBack->price > 1.3 && $pecentual_back < 100){
													
														$qr_hot = mysqli_query($con,"SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
														if(mysqli_num_rows($qr_hot) == 0 ){
															mysqli_query($con,"INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
																					 VALUES ( ".$id_jogo." ,'".$id_mkt."', 'back', '".$selectionId."', '".$selection_name."', '".$availableToBack->price."' , ".$pecentual_back.")")or die(mysql_error());
														}else{
															mysqli_query($con,"UPDATE `odds_hot` SET `odd` = '".$availableToBack->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_back." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND `side` =  'back' ");
														}
													}
													
												} // x if 85

										} // x if f == 1
										if($f == 3){
											$f=0;
										}
										


										#echo " <br> @".$availableToBack->price." | ".$availableToBack->size;;
									}
									#echo "<h1>Lay - ".$selection_name."</h1>";
									#echo "<p>(".$runner->selectionId.")</p>";	
									$L = 0;
									foreach ($runner->ex->availableToLay as $availableToLay){$L++;
										
										if($L == 1){
											$atual = 1;
										}else{
											$atual = 0;
										}

										$qr_num = mysqli_query($con,"SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' ")or die(mysql_error()); 
										
										if(mysqli_num_rows($qr_num) == 0){
											mysqli_query($con,"INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_name`,  `selection_id`, `tamanho`, `odd`, `tipo`, `atual`,`dt`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selection_name."', '".$selectionId."', '".$availableToLay->size."', '".$availableToLay->price."', 'lay', '".$atual."',CURRENT_TIMESTAMP)");
										}else{
											mysqli_query($con,"UPDATE `odds_mkt` SET `tamanho` = '".$availableToLay->size."' , `atual` = '".$atual."' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = '".$id_mkt."' "  );
										}
										

										if($L == 1){

												$odds_lay[$selectionId] = $availableToLay->price;
												

												mysqli_query($con,"UPDATE `odds_mkt` SET  `atual` = '1'  WHERE selection_id = '".$selectionId."'  AND tipo = 'lay' AND id_mkt = '".$id_mkt."'  " );
												
												$qr_up_atual_lay = mysqli_query($con,"SELECT * FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = ".$id_mkt."" )or die(mysqli_error($con));
												$atual_lay = mysqli_fetch_assoc( $qr_up_atual_lay);
												mysqli_query($con,"UPDATE `odds_mkt` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt`.`id` = ".$atual_lay['id']." ");

												$soma_lay_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'back' order by id desc LIMIT 5  ");
												$soma_lay = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by id desc LIMIT 5  ")or die(mysqli_error($con));
												$soma_total_sel_lay = mysqli_fetch_assoc( $soma_lay_sel);
												$soma_total_lay = mysqli_fetch_assoc($soma_lay);
												


												if($soma_total_sel_lay['soma'] > 0){
													$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
												}else{
													$pecentual_lay = 0;
												}


													## HOTS ############################		
												if($pecentual_lay > 85){
														########## LAY - IONSERI NO BANCO
													if($availableToLay->price > 1.3 && $pecentual_lay < 100){
															$qr_hot = mysqli_query($con,"SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
															if(mysqli_num_rows($qr_hot) == 0 ){
																mysqli_query($con,"INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
												 						VALUES ( ".$id_jogo." ,'".$id_mkt."', 'lay', '".$selectionId."', '".$selection_name."', '".$availableToLay->price."' , ".$pecentual_lay.")")or die(mysql_error());
															}else{
																mysqli_query($con,"UPDATE `odds_hot` SET `odd` = '".$availableToLay->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_lay." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND  `side` = 'lay' ");
															}

													}
												} // x if 85



										}	

										#echo "<br> @".$availableToLay->price." ".$availableToLay->size;;
									}
									

									


								#
								#echo "BACK<br>";	
								#print_r($runner->ex->availableToBack);
								#echo "<br>";	
								#echo "<br>";	
								#echo "<br>";	
								#echo "LAY<br>";	
								#print_r($runner->ex->availableToLay);
							}
							$odds_geral = array('back' => $odds_bck , 'lay' => $odds_lay);
							return $odds_geral;
						
					}


			}
			#$this->load->view('bot/get_odds' , $dados);
			#$this->load->view('bot/get_odds_mkt' , $dados);
			
			

		#} // x qr result
			#echo $odd." - ".$marketBook." - ".$id_mkt." - ".$id_jogo;
		$result_odds = mostrar($odd, $marketBook,$id_mkt,$id_jogo);	


		#echo "*****************************";
		include("includes/mysqli_con.php");
			foreach($mkts as $dd){
				#print_r($dd);
				#echo "<h2> - ".$dd->marketName."</h2>";
				foreach($dd->runners as $run){
					#echo "*-*-*<h2>".$run->runnerName." (".$dd->marketId.")</h2>";
					#echo "<h4> --".$run->selectionId."</h4>";
					if($run->runnerName != ""){
						$qr_up = mysqli_query($con,"UPDATE `odds_mkt` SET `selection_name` = '".$run->runnerName."'  WHERE selection_id = '".$run->selectionId."' AND id_mkt = '".$dd->marketId."'   ")or die(mysqli_error($con));
					}
					
				}
				
			}
			return $result_odds;
		#echo "OK";

	} // fn

	//////////  GRAFICOS
	function graph($id_mkt,$id_selection,$tipo="size",$side="lay"){

		

		$dados['id_mkt'] = $id_mkt;
		$dados['id_selection'] = $id_selection;
		$dados['tipo'] = $tipo;
		$dados['side'] = $side;

		// selecions
		$qr_sels = $this->db->query("SELECT DISTINCT selection_id FROM odds_mkt WHERE id_mkt = '$id_mkt' ");
		$dados['sels'] = $qr_sels;

		//echo $qr_sels->num_rows();
		//return false;

		if($tipo == "size" || $tipo == "odd"){
			$this->load->view('2019/graph' , $dados);
		}

		if($tipo == "pizza"){
			$this->load->view('2019/graph_pizza' , $dados);
		}		

	}

function filtrar_odd(){
			$qr = $this->db->query("SELECT o.id_mkt, m.id_mkt as mkt_n , o.selection_name,o.tipo,o.odd,o.id_partida,o.atual, m.name 
		FROM odds_mkt as o
		INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
		WHERE o.odd < 1.8 AND o.odd > 1.3 AND o.tipo = 'back' AND o.atual = 1");
}



##################### PÓS-JOGO
function resultado($evento='',$id_evento=0,$nm_competicao='') {
		if($id_evento == 0){
			redirect('');
		}
		$qr_dd = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas');
		if($qr_dd->num_rows() == 0){
			$id_evento = 0;
			#redirect('');
		}
		
		$dados['dd'] = $qr_dd->row();
		$dados['id_evento'] = $id_evento;
		
		$dados['champ'] = $this->padrao_model->get_by_matriz('id_competition',$dados['dd']->id_competition,'betfair_competitions');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'5');
		#$dados['mais'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = '".$dados['dd']->id_competition."'  LIMIT 10"); // brasileiro seiria A
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A

		$dados['mkts'] = $this->db->query("SELECT DISTINCT id_mkt FROM odds_mkt WHERE id_partida = '$id_evento' ORDER BY id_mkt asc");
		
		#$this->load->view('front/jogo' , $dados);	
		$this->load->view('front/new/resultado' , $dados);	

	}
	############################### EXPETATIVA
	function set_cc($id_evento){
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$marketBook_mo = $this->betfront_model->3$APP_KEY, $SESSION_TOKEN, $id_mkt_mo);
		#$marketBook_05 = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $id_mkt_05);
		$qrcc = $this->betfront_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_evento,"CORRECT_SCORE");
		$id_mkt_cc = $qrcc[0]->marketId;
		$marketBook_cc = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $id_mkt_cc);		
		$this->set_odds($id_evento,$id_mkt_cc);
		echo "opa 2";
	}
	function expectativ($id_evento){
		$this->load->model('betfront_model');

		/*
		MATCH_ODDS
		OVER_UNDER_05
		CORRECT_SCORES
		*/
		$dados['id_evento'] = $id_evento;
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$status_mo = "Sem dados";
		$status_05 = "Sem dados";
		$status_cc = "Sem dados";


		$qrmo = $this->betfront_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_evento,"MATCH_ODDS");
		$qr05 = $this->betfront_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_evento,"OVER_UNDER_05");
		$qrcc = $this->betfront_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_evento,"CORRECT_SCORE");

		$id_mkt_mo = $qrmo[0]->marketId;
		$id_mkt_05 = $qr05[0]->marketId;
		$id_mkt_cc = $qrcc[0]->marketId;
		#echo $id_mkt_cc;
		#echo $id_mkt_cc;
		
		$marketBook_mo = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $id_mkt_mo);
		$marketBook_05 = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $id_mkt_05);
		$marketBook_cc = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $id_mkt_cc);
		################# FAVORITO
		#echo "<h1>Match Odds</h1>";
		$odd_home = 0;
		$odd_away = 0;
		$odd_draw = 0;
		$fav_odd = 0;
		$fav = "";
		$cont_sel_mo = 0;
		foreach($marketBook_mo->runners as $run){
			
			foreach($run->ex->availableToBack as $odd_mo){ $cont_sel_mo++;
				//echo $cont_sel_mo."---- ".$odd_mo->price." <br>";
				if($cont_sel_mo == 1){
					$odd_home = $odd_mo->price;
					
				}
				if($cont_sel_mo == 4){
					$odd_away = $odd_mo->price;
					
				}
				if($cont_sel_mo == 7){
					$odd_draw = $odd_mo->price;
					
				}

			}
		}
		#echo "Home:".$odd_home." Away: ".$odd_away." Draw: ".$odd_draw;
		#echo "<br />";

		if($odd_home < $odd_away){
			$status_mo = "Visitado Favorito ";
			$fav = 'Visitado';
			$fav_odd = $odd_home;
		}

		if($odd_home > $odd_away){
			$status_mo = "Visitante Favorito ";
			$fav = 'Visitante';
			$fav_odd = $odd_away;
		}
		#echo "<br>$odd_home <> $odd_away<br>";
		if($fav_odd < 1.41){
			$status_mo .= " $fav_odd Dominando o Jogo";	
		}

		if($fav_odd > 1.41 && $fav_odd < 1.9){
			$status_mo .= " Controlando o Jogo";	
		}
		
		if($fav_odd > 2 && $fav_odd < 2.7 ){
			$status_mo = $fav." com pouco favoritismo";	
		}
		if($fav_odd >= 2.7){
			$status_mo = " Equilibrado com um pouco de favoritismo para o ".$fav;	
		}
		$dados['status_mo'] = $status_mo;
		
		#print_r($marketBook_mo);
		#echo "<br><br>";



		############# GOLS
		#echo "<h1>Over under 0.5</h1>";
		$cont_sel_05=0;
		foreach($marketBook_05->runners as $run){

			foreach($run->ex->availableToBack as $odd_05){ $cont_sel_05++;
				if($cont_sel_05 ==4){
					$odd_u05 = $odd_05->price;
					#echo "(".$cont_sel_05.")".$odd_05->price;
				}
				#print_r($odd_05);
				#echo "<br>--<br>";
			}
		}
		// STATUS DO MERCAODS DE GOLS
		#echo "Odds Under 0.5 = ".$odd_u05." ";
		if($odd_u05 <= 1.08){
			$status_05 = "Expectativa  <strong>Muito</strong> OVER";
		}

		if($odd_u05 >= 1.08 && $odd_u05 <= 1.1){
			$status_05 = "Expectativa  OVER";
		}

		if($odd_u05 <= 1.2 && $odd_u05 >= 1.1){
			$status_05 = "Expectativa  UNDER";
		}

		if($odd_u05 >= 1.2){
			$status_05 = "Expectativa  <strong>Muito</strong> UNDER";
		}
		$dados['status_05'] = $status_05;

		############# CORRECT SCORE
		#echo "<h1>Over under 0.5</h1>";
		$cont_sel_cc=0;
		$status_cc = "";
		$status_jp = ""; // jackpot
		#echo "opa";
		#print_r($marketBook_cc);
		#echo "<br><br><br>";
		$resultados_arr = array();
		foreach($marketBook_cc->runners as $run){
			#print_r($run);
			$qr_selection = $this->db->query(" SELECT selection_name FROM odds_mkt WHERE id_mkt = '".$id_mkt_cc."' AND selection_id = ".$run->selectionId." AND selection_name <> '' ");
			#$status_cc .= "<br><hr><h1>".$run->selectionId."(".$qr_selection->row()->selection_name.")";
			$cont_odd = 0;
			foreach($run->ex->availableToBack as $odd_cc){ $cont_sel_cc++; $cont_odd++;
				#print_r($odd_cc);
				#echo "<br>";
				#if($cont_sel_cc ==4){
				if($cont_odd == 1){

					$resultados_arr[$run->selectionId] = $odd_cc->price;
					if($odd_cc->price < 12){
						$status_cc .= "<hr><h1 title='".$odd_cc->price."'>".$qr_selection->row()->selection_name." <label class='badge badge-warning' style='float:right'>".$odd_cc->price."</label></h1><br>";
					}

					if($odd_cc->price > 20){
						$status_jp .= "<hr><h1 title='".$odd_cc->price."'>".$qr_selection->row()->selection_name." <label class='badge badge-primary' style='float:right'>".$odd_cc->price."</label> </h1><br>";
					}

					
					#echo "(".$cont_sel_cc.")".$odd_cc->price."[".$cont_odd."]";
					
				}
				if($cont_odd == 3){
					$cont_odd = 0;
				}
				#}
				#print_r($odd_05);
				#echo "<br>--<br>";
			}
		}
		#asort($resultados_arr);
        #arsort($resultados_arr);
        #rsort($resultados_arr);
		/*
        array_multisort($resultados_arr);
		#echo count($resultados_arr);
		#echo "<br>";
		#print_r($resultados_arr);
		foreach($resultados_arr as  $r => $res){
			#print_r($res);
			$key_cur = current($res); 
			$key_arr = key($key_cur);
			#echo $key_arr.' <- <br />';
			#echo $res." ** ".$r." <br>";
		}
		*/
		$dados['status_cc'] = $status_cc;

		$dados['status_jp'] = $status_jp;

		#print_r($marketBook_05);
		#echo "<br><br>";
		#echo "<h1>CC</h1>";
		#print_r($marketBook_cc);
		#echo "<br><br>";
		#echo "<br>".$id_evento;
		$dados['info'] = "";
		$dados['$id_mkt_cc'] = $id_mkt_cc;
		$this->load->view('front/new/analise' ,$dados);
	}	

	function get_id_mkt($id_evento,$nm_mkt="MATCH_ODDS"){
		$this->load->model('betfront_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$qrmo = $this->betfront_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_evento,$nm_mkt);
		$id_mkt = $qrmo[0]->marketId;
		echo $id_mkt;
	}



	#################### HORSES SIZE ########################



	function get_percentual_selecions_light_horses($id_evento,$id_mkt=0,$side="lay"){
		return false;
		#header('Access-Control-Allow-Origin: https://traderhorserace.com');
		#header("Access-Control-Allow-Origin: \*");
		#header("Access-Control-Allow-Headers: Authorization, Content-Type");
		#header("Access-Control-Allow-Origin: *");
		#header('content-type: application/json; charset=utf-8');

		#$this->db->where('id_mkt',$id_mkt);
		#$this->db->delete('odds_mkt_horses');

		$this->load->model('betfront_model');
		#echo $id_mkt;
		$odds = $this->set_odds_horses($id_evento,$id_mkt);

		#print_r($odds);
		$this->betfront_model->get_percentual_selecions_light_horses($id_evento,$id_mkt,$side,$odds);
	} // x fn



	// set_odds
	function set_odds_horses($id_evento=0,$id_mkt){
		
		$this->load->model('betfront_model');
	#	foreach($qr->result() as $dd_mkt){
			
			

			$id_jogo = $id_evento;
			
			$id_mkt = $id_mkt;


			
			
			#return false;
			############################## GET ODDS DO MERCADO
			require_once('includes/betapi/jsonrpc-futbol.php'); 
			#$APP_KEY = 'qD8D8WZ300PJGjbN';
			#$APP_KEY = '6A1cQNtoRmi0GDOS'; //ccccccccc     meu id vendor
			#$APP_KEY = 'qD8D8WZ300PJGjbN'; // LIVE
			#$SESSION_TOKEN = 'cnEEv5hjDUcY9/BDPOq3xMX2K478JFihZiYY3Ov+eeI='; // igormarlus
			if($this->session->userdata('token')){
				$this->load->model('bet_model');
				$mkts = $this->bet_model->getMkt_logado($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt);
			}else{
				$mkts = $this->betfront_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt);
			}

			#echo "<br><br>";
			$mkts_rows = count($mkts);
			#print_r($mkts);
			#echo "<h1>".$mkts_rows."</h1>";
			// remove mercados encerrados
			if($mkts_rows == 0){

				#echo "Mercado Fechado.";
				redirect('corridasdecavalos/fim');

				return false;

				// cadastra em outra tabela para registro
				/*
				mysqli_query("INSERT INTO `historico` SET 
					`id_evento`=111, 
					`id_mkt`='".$id_mkt."', 
					`nm_evento`='nome evento',
					`nm_mkt`='nome mkt',
					`result`='win' 
					");
				*/
				#mysql_query("DELETE FROM mercados WHERE id_mkt = '".$id_mkt."'");
				#mysql_query("DELETE FROM odds_mkt WHERE id_mkt = '".$id_mkt."'");
				#mysql_query("DELETE FROM odds_hot WHERE id_mkt = '".$id_mkt."'");
			}
			#echo $id_mkt.' - 2 -  '.$id_jogo;
			#echo "<br>";
			#print_r($mkts);
			foreach($mkts as $odd){ 

				#echo "<h1 style='color:blue'> **** * * * * * ** *".$odd->runners[0]->runnerName." *****</h2>";
				#echo "<h4 style='color:red'> **** * * * * * ** *".$odd->runners[0]->sortPriority." *****</h4>";

				#$ordem_pri = $odd->runners[0]->sortPriority;

				#foreach($dds as $dd){
					#echo "<h1> ".$odd->marketName." ".$odd->marketId."</h1>";
					#echo "<h1> ".count($odd->runners)."</h1>";
					#echo "<br>";
					include("includes/mysqli_con.php");
					for($c=0; $c<count($odd->runners); $c++){
						#print_r($odd->runners[$c]);
						foreach($odd->runners[$c] as $key => $val){
							if($key != 'metadata'){
								if($key == "selectionId"){
									$selectionId = $val;
								}

								#echo "<h4>".$key.": ".$val." ** </h4>";
							}else{
								// gerar array do insert
								$odd_horse = array();
								$odd_horse['id_mkt'] = $odd->marketId;
								$CLOTH_NUMBER = "0";
								$STALL_DRAW = "0";
								$COLOURS_FILENAME = "";
								#echo "<ul>";
									foreach($val as $key2 => $dd2){
										if($key2 == "STALL_DRAW"){
											$STALL_DRAW = $dd2;
										}
										if($key2 == "CLOTH_NUMBER"){
											$CLOTH_NUMBER = $dd2;
										}
										if($key2 == "COLOURS_FILENAME"){
											$COLOURS_FILENAME = $dd2;
										}
										
											#echo "<li><strong>".$key2."</strong>: <label style='color:darkgreen'> ".$dd2." </label></li>";
										
										$dd_horse[$key2] = $dd2;
									}
									//  ATUALIZA OS NUMEROS DOS CAVALOS
									#mysqli_query($con,"UPDATE `odds_mkt_horses` SET `track` = ".$STALL_DRAW." , `numero` = ".$CLOTH_NUMBER." , `icon` = '".$COLOURS_FILENAME."'   WHERE selection_id = '".$selectionId."'  AND id_mkt = '".$id_mkt."'" )or die(mysqli_error($con));

									$this->db->where($dd_horse);
									$qr_verifica = $this->db->get('runs_dd_horses');
									if($qr_verifica->num_rows() == 0){
										$this->db->insert('runs_dd_horses' , $dd_horse);
									}
								#echo "</ul>";

							}
						}
						echo  "<br><hr>";
					}
				#}

				
				#echo "<br>";
				#print_r($odd);
				echo "<br>";
				/*
				print_r($odd);
				if(is_array($odd)){
					echo "sim";
				}else{
					echo "nao";
				}
				*/
				########## 	MOSTRA AS ODDS
				#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
				$marketBook = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);

				#print_r($marketBook);
				$ordem_pri = 1;
				#echo $id_mkt." id jogo: ".$id_jogo." ordem pri: ".$ordem_pri." fim";
				#echo "<br>";

				

				function mostrar($odd, $marketBook,$id_mkt,$id_jogo,$ordem_pri="1")
					{
						#echo $id_mkt. "opa 4";
						$dd_odds = array();
						$f = 0;
						$ff = 0;
						$odds_back = array();
						$odds_lay = array();
						$odds_bck = array();
						$odd_back = "";
						$odd_lay = "";
						$ordem_pri = $ordem_pri;
						#function printAvailablePrices_odd($selectionId, $marketBook,$id_mkt,$id_jogo)
						#{
						#print_r($marketBook);
							foreach ($marketBook->runners as $runner) {
									#$selection_name = $runner->runnerName;
									$selection_name = "";
									#if ($runner->selectionId == $selectionId) break;
									$selectionId = $runner->selectionId;
									#echo "<br><br>--------";
									#print_r($runner->metadata);
									#echo "<br>^^^<br>";
									#echo "<br>";
									#echo "***************";
									if($f == 1){
										$atual = '1';
									}else{
										$atual = '0';
									}

									#echo "<h1 style='color:purple'>ORDEM".$ordem_pri."</h1>";	
									#echo "<p>(".$runner->selectionId.")</p>";	
									include("includes/mysqli_con.php");
									foreach ($runner->ex->availableToBack as $availableToBack){$f++;
										#print_r($availableToBack);
										$qr_num = mysqli_query($con,"SELECT * FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 	

										
										if(mysqli_num_rows($qr_num) == 0){
											mysqli_query($con,"INSERT INTO `odds_mkt_horses` (`id_partida`,`id_mkt`, `selection_name`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual` ,`dt`,`dt_update`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selection_name."' , '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', '0','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')");
										}else{
											mysqli_query($con,"UPDATE `odds_mkt_horses` SET `tamanho` = ".$availableToBack->size."  , dt_update = '".date("Y-m-d H:i:s")."'  WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = '".$id_mkt."'" )or die(mysqli_error($con));
										}

										//$odds_bck[$selectionId] = $availableToBack->price;
										//$odds_bck[$selectionId] = $f;
										if($f == 1){
											//$odds_bck['atual'] = $availableToBack->price;
											$odds_bck[$selectionId] = $availableToBack->price;
											#echo "OOOOOOOOOOOOoo oooo o oOOOOOOOOOOOOOO"

											#if(mysqli_num_rows($qr_num) > 0){

												mysqli_query($con,"UPDATE `odds_mkt_horses` SET  dt_update = '".date("Y-m-d H:i:s")."' ,  atual = '1'  WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = '".$id_mkt."'" )or die(mysqli_error($con));
											#}
											

											// manda pra outra função mostrar a odd
											
											// define odd atual
											#$qr_up_atual = mysqli_query($con,"SELECT * FROM `odds_mkt_horses` WHERE selection_id = ".$selectionId." AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = ".$id_mkt."" )or die(mysqli_error($con));
												#$atual = $qr_up_atual;
												#mysqli_query($con,"UPDATE `odds_mkt_horses` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt_horses`.`id` = 1 ")or die(mysqli_error($con));
										
												//  ################ HOTS
												$soma_back_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'lay' order by id desc LIMIT 5  ");
												$soma_back = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt." AND tipo = 'lay' order by id desc LIMIT 5  ");
												$soma_total_sel_back = mysqli_fetch_assoc($soma_back_sel);
												$soma_total_back = mysqli_fetch_assoc($soma_back);
												if($soma_total_sel_back['soma'] > 0){
													$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
												}else{
													$pecentual_back = 0;
												}
												#echo number_format($pecentual_back, 2, ',', '.').'%';
												if($pecentual_back > 85){
														
													
													if($availableToBack->price > 1.3 && $pecentual_back < 100){
													
														$qr_hot = mysqli_query($con,"SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
														if(mysqli_num_rows($qr_hot) == 0 ){
															mysqli_query($con,"INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
																					 VALUES ( ".$id_jogo." ,'".$id_mkt."', 'back', '".$selectionId."', '".$selection_name."', '".$availableToBack->price."' , ".$pecentual_back.")")or die(mysql_error());
														}else{
															mysqli_query($con,"UPDATE `odds_hot` SET `odd` = '".$availableToBack->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_back." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND `side` =  'back' ");
														}
													}
													
												} // x if 85

										} // x if f == 1
										if($f == 3){
											$f=0;
										}
										


										#echo " <br> @".$availableToBack->price." | ".$availableToBack->size;;
									}
									#echo "<h1>Lay - ".$selection_name."</h1>";
									#echo "<p>(".$runner->selectionId.")</p>";	
									$L = 0;
									foreach ($runner->ex->availableToLay as $availableToLay){$L++;
										
										if($L == 1){
											$atual = 1;
										}else{
											$atual = 0;
										}

										$qr_num = mysqli_query($con,"SELECT * FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' AND selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' ")or die(mysqli_error($con)); 
										#echo "<h1>".mysqli_num_rows($qr_num)."</h1>";
										if(mysqli_num_rows($qr_num) == 0){
											mysqli_query($con,"INSERT INTO `odds_mkt_horses` (`id_mkt`, `selection_name`,  `selection_id`, `tamanho`, `odd`, `tipo`, `atual`,`dt`) VALUES ('".$id_mkt."', '".$selection_name."', '".$selectionId."', '".$availableToLay->size."', '".$availableToLay->price."', 'lay', '".$atual."',CURRENT_TIMESTAMP)")or die(mysqli_error($con));
										}else{
											mysqli_query($con,"UPDATE `odds_mkt_horses` SET `tamanho` = '".$availableToLay->size."' , `atual` = '".$atual."' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = '".$id_mkt."' "  );
										}
										

										if($L == 1){

												$odds_lay[$selectionId] = $availableToLay->price;
												

												mysqli_query($con,"UPDATE `odds_mkt_horses` SET  `atual` = '1'  WHERE selection_id = '".$selectionId."'  AND tipo = 'lay' AND id_mkt = '".$id_mkt."'  " );
												
												$qr_up_atual_lay = mysqli_query($con,"SELECT * FROM `odds_mkt_horses` WHERE selection_id = ".$selectionId." AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = ".$id_mkt."" )or die(mysqli_error($con));
												$atual_lay = mysqli_fetch_assoc( $qr_up_atual_lay);
												mysqli_query($con,"UPDATE `odds_mkt_horses` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt_horses`.`id` = ".$atual_lay['id']." ");

												$soma_lay_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'back' order by id desc LIMIT 5  ");
												$soma_lay = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by id desc LIMIT 5  ")or die(mysqli_error($con));
												$soma_total_sel_lay = mysqli_fetch_assoc( $soma_lay_sel);
												$soma_total_lay = mysqli_fetch_assoc($soma_lay);
												


												if($soma_total_sel_lay['soma'] > 0){
													$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
												}else{
													$pecentual_lay = 0;
												}


													## HOTS ############################		
												if($pecentual_lay > 85){
														########## LAY - IONSERI NO BANCO
													if($availableToLay->price > 1.3 && $pecentual_lay < 100){
															$qr_hot = mysqli_query($con,"SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
															if(mysqli_num_rows($qr_hot) == 0 ){
																mysqli_query($con,"INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
												 						VALUES ( ".$id_jogo." ,'".$id_mkt."', 'lay', '".$selectionId."', '".$selection_name."', '".$availableToLay->price."' , ".$pecentual_lay.")")or die(mysql_error());
															}else{
																mysqli_query($con,"UPDATE `odds_hot` SET `odd` = '".$availableToLay->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_lay." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND  `side` = 'lay' ");
															}

													}
												} // x if 85



										}	

										#echo "<br> @".$availableToLay->price." ".$availableToLay->size;;
									}
									

									


								#
								#echo "BACK<br>";	
								#print_r($runner->ex->availableToBack);
								#echo "<br>";	
								#echo "<br>";	
								#echo "<br>";	
								#echo "LAY<br>";	
								#print_r($runner->ex->availableToLay);
							}
							$odds_geral = array('back' => $odds_bck , 'lay' => $odds_lay);
							return $odds_geral;
						
					}


			}
			#$this->load->view('bot/get_odds' , $dados);
			#$this->load->view('bot/get_odds_mkt_horses' , $dados);
			
			

		#} // x qr result
			#echo "opa 33";
		$result_odds = mostrar($odd, $marketBook,$id_mkt,$id_jogo);	


		#echo "*****************************";
		include("includes/mysqli_con.php");
			foreach($mkts as $dd){
				#print_r($dd);
				#echo "<h2> - ".$dd->marketName."</h2>";
				foreach($dd->runners as $run){
					#echo "*-*-*<h2>".$run->runnerName." (".$dd->marketId.")</h2>";
					#echo "<h4> --".$run->selectionId."</h4>";
					if($run->runnerName != ""){
						$qr_up = mysqli_query($con,"UPDATE `odds_mkt_horses` SET `selection_name` = '".$run->runnerName."'  WHERE selection_id = '".$run->selectionId."' AND id_mkt = '".$dd->marketId."'   ")or die(mysqli_error($con));
					}
					
				}
				
			}
			return $result_odds;
		#echo "OK";

	} // fn
		
}
